@extends('layouts.app')

@section('title', 'Products - Zap Store')
@section('header', 'Products')

@section('header-buttons')
<a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fas fa-plus-circle mr-2"></i> Create Product
</a>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Search and Filter Section -->
    <div class="mb-6 flex justify-between items-center">
        <div class="flex-1 max-w-md">
            <div class="relative">
                <input type="text" 
                       placeholder="Search products..." 
                       class="w-full pl-10 pr-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <span class="absolute left-3 top-3 text-gray-400">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
        <div class="flex space-x-4">
            <select class="px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="food">Food & Beverages</option>
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                <i class="fa fa-filter mr-2"></i> Filter
            </button>
        </div>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-2">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 rounded-l-lg">Image</th>
                    <th class="p-4">Product Info</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Pricing</th>
                    <th class="p-4">Stock</th>
                    <th class="p-4 rounded-r-lg text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="bg-white hover:bg-gray-50 border-b">
                    <td class="p-4">
                        <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/80' }}" 
                             alt="{{ $product->name }}" 
                             class="w-20 h-20 rounded-lg object-cover">
                    </td>
                    <td class="p-4">
                        <div class="font-semibold text-lg text-gray-800">{{ $product->name }}</div>
                        <div class="text-gray-500 text-sm">Code: {{ $product->code }}</div>
                        @if($product->description)
                            <div class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $product->description }}</div>
                        @endif
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                            {{ $product->category ?? 'Uncategorized' }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="text-gray-800">
                            Purchase: ₹{{ number_format($product->purchase_price, 2) }}
                        </div>
                        <div class="text-green-600 font-semibold">
                            Selling: ₹{{ number_format($product->selling_price, 2) }}
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="font-semibold {{ $product->stock <= ($product->alert_quantity ?? 0) ? 'text-red-600' : 'text-green-600' }}">
                            {{ $product->stock }} units
                        </div>
                        @if($product->alert_quantity)
                            <div class="text-gray-500 text-sm">
                                Alert at: {{ $product->alert_quantity }}
                            </div>
                        @endif
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('products.edit', $product) }}" 
                               class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">
                        <i class="fa fa-box-open text-4xl mb-4"></i>
                        <div>No products found</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;   
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush 