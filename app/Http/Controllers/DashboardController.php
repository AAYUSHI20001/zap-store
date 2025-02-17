<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get today's date
        $today = Carbon::today();

        // Calculate total revenue
        $totalRevenue = Sale::sum('total_amount');
        
        // Get total orders
        $totalOrders = Sale::count();
        
        // Get total products
        $totalProducts = Product::count();
        
        // Calculate growth (comparing this month to last month)
        $thisMonth = Sale::whereMonth('created_at', $today->month)->sum('total_amount');
        $lastMonth = Sale::whereMonth('created_at', $today->subMonth()->month)->sum('total_amount');
        $growth = $lastMonth > 0 ? (($thisMonth - $lastMonth) / $lastMonth) * 100 : 0;

        // Get low stock products
        $lowStockCount = Product::where('stock', '<=', 10)->count();

        // Get recent transactions
        $recentTransactions = Sale::with('items.product')
            ->latest()
            ->take(5)
            ->get()
            ->map(function($sale) {
                return [
                    'id' => $sale->reference_no,
                    'date' => $sale->created_at->format('d M Y'),
                    'amount' => $sale->total_amount,
                    'status' => $sale->payment_status,
                    'items' => $sale->items->count()
                ];
            });

        // Get top selling products
        $topProducts = DB::table('sale_items')
            ->join('products', 'sale_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(sale_items.quantity) as total_sold'))
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        return view('index', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'growth',
            'lowStockCount',
            'recentTransactions',
            'topProducts'
        ));
    }
} 