<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function stock()
    {
        $products = Product::withSum('purchaseItems', 'quantity')
            ->withSum('saleItems', 'quantity')
            ->get()
            ->map(function ($product) {
                $product->purchased = $product->purchase_items_sum_quantity ?? 0;
                $product->sold = $product->sale_items_sum_quantity ?? 0;
                return $product;
            });

        return view('reports.stock', compact('products'));
    }

    public function stockValue()
    {
        $totalValue = Product::sum(DB::raw('stock * purchase_price'));
        $lowStock = Product::where('stock', '<=', 10)->count();
        $outOfStock = Product::where('stock', '<=', 0)->count();
        
        $products = Product::orderBy('stock', 'asc')
            ->get()
            ->map(function ($product) {
                $product->value = $product->stock * $product->purchase_price;
                return $product;
            });

        return view('reports.stock-value', compact('products', 'totalValue', 'lowStock', 'outOfStock'));
    }
} 