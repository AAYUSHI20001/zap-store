<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'items.product'])->latest()->paginate(10);
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchases.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,bank,upi',
            'note' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $purchase = Purchase::create([
                'reference_no' => 'PUR-' . time(),
                'supplier_id' => $request->supplier_id,
                'total_amount' => $request->total_amount,
                'paid_amount' => $request->paid_amount,
                'payment_status' => $request->paid_amount >= $request->total_amount ? 'paid' : 'partial',
                'payment_method' => $request->payment_method,
                'note' => $request->note
            ]);

            foreach ($request->items as $item) {
                // Create purchase item
                PurchaseItem::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['unit_price'] * $item['quantity']
                ]);

                // Update product stock and purchase price
                $product = Product::find($item['product_id']);
                $product->stock += $item['quantity'];
                $product->purchase_price = $item['unit_price'];
                $product->save();
            }

            DB::commit();

            return redirect()->route('purchases.index')
                ->with('success', 'Purchase created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error creating purchase: ' . $e->getMessage());
        }
    }

    public function show(Purchase $purchase)
    {
        $purchase->load(['supplier', 'items.product']);
        return view('purchases.show', compact('purchase'));
    }

    public function print(Purchase $purchase)
    {
        $purchase->load(['supplier', 'items.product']);
        return view('purchases.print', compact('purchase'));
    }
} 