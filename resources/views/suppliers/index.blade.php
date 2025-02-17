@extends('layouts.app')

@section('title', 'Suppliers - Zap Store')
@section('header', 'Suppliers')

@section('header-buttons')
<a href="{{ route('suppliers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-plus-circle"></i> Add Supplier
</a>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Search -->
    <div class="mb-6">
        <div class="relative max-w-md">
            <input type="text" 
                   placeholder="Search suppliers..." 
                   class="w-full pl-10 pr-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            <span class="absolute left-3 top-3 text-gray-400">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>

    <!-- Suppliers Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-2">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 rounded-l-lg">Name</th>
                    <th class="p-4">Contact</th>
                    <th class="p-4">Address</th>
                    <th class="p-4">Tax Number</th>
                    <th class="p-4 rounded-r-lg text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                <tr class="bg-white hover:bg-gray-50 border-b">
                    <td class="p-4 font-medium">{{ $supplier->name }}</td>
                    <td class="p-4">
                        <div>{{ $supplier->phone }}</div>
                        <div class="text-sm text-gray-500">{{ $supplier->email }}</div>
                    </td>
                    <td class="p-4">{{ $supplier->address }}</td>
                    <td class="p-4">{{ $supplier->tax_number }}</td>
                    <td class="p-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('suppliers.edit', $supplier) }}" 
                               class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('suppliers.destroy', $supplier) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this supplier?');">
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
                    <td colspan="5" class="text-center py-8 text-gray-500">
                        <i class="fa fa-users text-4xl mb-4"></i>
                        <div>No suppliers found</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $suppliers->links() }}
    </div>
</div>
@endsection 