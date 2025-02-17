@extends('layouts.app')

@section('title', 'Dashboard - Zap Store')
@section('header', 'Dashboard Overview')

@section('header-buttons')
<div class="flex space-x-4">
    <a href="{{ route('pos') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:scale-105 transition text-lg">
        <i class="fa fa-calculator"></i> Open POS
    </a>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:scale-105 transition text-lg">
        <i class="fa fa-plus-circle"></i> Add Product
    </a>
</div>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Stats Overview -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Total Revenue -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-green-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Total Revenue</h3>
                <i class="fa fa-dollar-sign text-2xl text-green-500"></i>
            </div>
            <p class="text-3xl font-bold text-green-600">₹{{ number_format($totalRevenue, 2) }}</p>
            <p class="text-sm text-gray-500 mt-2">All time sales revenue</p>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
                <i class="fa fa-shopping-cart text-2xl text-blue-500"></i>
            </div>
            <p class="text-3xl font-bold text-blue-600">{{ number_format($totalOrders) }}</p>
            <p class="text-sm text-gray-500 mt-2">Total sales transactions</p>
        </div>

        <!-- Total Products -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-purple-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
                <i class="fa fa-box text-2xl text-purple-500"></i>
            </div>
            <p class="text-3xl font-bold text-purple-600">{{ number_format($totalProducts) }}</p>
            <p class="text-sm text-gray-500 mt-2">Products in inventory</p>
        </div>

        <!-- Growth -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-yellow-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Monthly Growth</h3>
                <i class="fa fa-chart-line text-2xl text-yellow-500"></i>
            </div>
            <p class="text-3xl font-bold {{ $growth >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ number_format($growth, 1) }}%
            </p>
            <p class="text-sm text-gray-500 mt-2">Compared to last month</p>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('pos') }}" 
           class="bg-blue-600 text-white rounded-lg shadow p-6 hover:bg-blue-700 transition flex items-center justify-center">
            <i class="fa fa-calculator text-2xl mr-3"></i>
            <span class="text-lg font-semibold">Open POS</span>
        </a>

        <a href="{{ route('products.create') }}" 
           class="bg-green-600 text-white rounded-lg shadow p-6 hover:bg-green-700 transition flex items-center justify-center">
            <i class="fa fa-plus-circle text-2xl mr-3"></i>
            <span class="text-lg font-semibold">Add Product</span>
        </a>

        <a href="{{ route('reports.stock') }}" 
           class="bg-red-600 text-white rounded-lg shadow p-6 hover:bg-red-700 transition flex items-center justify-center">
            <i class="fa fa-boxes text-2xl mr-3"></i>
            <span class="text-lg font-semibold">Stock Report</span>
        </a>
    </section>

    <!-- Recent Transactions & Top Products -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Recent Transactions -->
        <section class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Transactions</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left">Order ID</th>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Amount</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($recentTransactions as $transaction)
                        <tr>
                            <td class="px-4 py-2">{{ $transaction['id'] }}</td>
                            <td class="px-4 py-2">{{ $transaction['date'] }}</td>
                            <td class="px-4 py-2">₹{{ number_format($transaction['amount'], 2) }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded-full text-xs
                                    {{ $transaction['status'] === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($transaction['status']) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No recent transactions</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Top Products -->
        <section class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Top Selling Products</h3>
            <div class="space-y-4">
                @forelse($topProducts as $product)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <span class="font-medium">{{ $product->name }}</span>
                    <span class="text-blue-600 font-semibold">{{ $product->total_sold }} sold</span>
                </div>
                @empty
                <p class="text-center text-gray-500">No sales data available</p>
                @endforelse
            </div>
        </section>
    </div>
</div>
@endsection
