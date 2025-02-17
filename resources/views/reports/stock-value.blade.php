@extends('layouts.app')

@section('title', 'Stock Value Report - Zap Store')
@section('header', 'Stock Value Report')

@section('header-buttons')
<div class="flex space-x-4">
    <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
        <i class="fa fa-print"></i> Print Report
    </button>
    <a href="{{ route('reports.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
        <i class="fa fa-arrow-left"></i> Back to Reports
    </a>
</div>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-green-50 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-green-700">Total Stock Value</h3>
            <p class="text-3xl font-bold text-green-800">₹{{ number_format($totalValue, 2) }}</p>
        </div>
        <div class="bg-yellow-50 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-yellow-700">Low Stock Items</h3>
            <p class="text-3xl font-bold text-yellow-800">{{ $lowStock }}</p>
        </div>
        <div class="bg-red-50 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-red-700">Out of Stock</h3>
            <p class="text-3xl font-bold text-red-800">{{ $outOfStock }}</p>
        </div>
    </div>

    <!-- Stock Value Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4">Product</th>
                    <th class="p-4">Code</th>
                    <th class="p-4">Current Stock</th>
                    <th class="p-4">Purchase Price</th>
                    <th class="p-4">Total Value</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($products as $product)
                <tr>
                    <td class="p-4">
                        <div class="flex items-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}"
                                     class="w-10 h-10 rounded-lg object-cover mr-3">
                            @endif
                            {{ $product->name }}
                        </div>
                    </td>
                    <td class="p-4">{{ $product->code }}</td>
                    <td class="p-4 font-semibold">{{ $product->stock }}</td>
                    <td class="p-4">₹{{ number_format($product->purchase_price, 2) }}</td>
                    <td class="p-4 font-semibold">₹{{ number_format($product->value, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<style>
    @media print {
        .btn-primary, .bg-gray-500 { display: none; }
        .shadow-lg { box-shadow: none; }
        .rounded-lg { border-radius: 0; }
        @page { margin: 1cm; }
    }
</style>
@endpush
@endsection 