<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('items.product')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function pos()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('pos', compact('products'));
    }

    public function getProduct(Request $request)
    {
        $product = Product::where('code', $request->code)
                         ->where('stock', '>', 0)
                         ->first();
        
        if (!$product) {
            return response()->json(['error' => 'Product not found or out of stock'], 404);
        }

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,card,upi'
        ]);

        try {
            DB::beginTransaction();

            // Create sale
            $sale = Sale::create([
                'reference_no' => 'SALE-' . time(),
                'total_amount' => $request->total_amount,
                'paid_amount' => $request->paid_amount,
                'payment_status' => $request->paid_amount >= $request->total_amount ? 'paid' : 'partial',
                'payment_method' => $request->payment_method
            ]);

            // Create sale items and update stock
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Insufficient stock for product: {$product->name}");
                }

                // Create sale item
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->selling_price,
                    'total_price' => $product->selling_price * $item['quantity']
                ]);

                // Update stock
                $product->decrement('stock', $item['quantity']);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Sale completed successfully',
                'sale' => $sale
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function invoice(Sale $sale)
    {
        return view('sales.invoice', compact('sale'));
    }

    public function getDetails(Sale $sale)
    {
        $sale->load('items.product');
        return response()->json([
            'sale' => $sale,
            'items' => $sale->items->map(function($item) {
                return [
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'total_price' => $item->total_price
                ];
            }),
            'formatted_date' => $sale->created_at->format('d M Y h:i A'),
            'payment_status' => ucfirst($sale->payment_status),
            'payment_method' => ucfirst($sale->payment_method),
        ]);
    }
} 