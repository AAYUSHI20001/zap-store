@extends('layouts.app')

@section('title', 'Purchase Details - Zap Store')
@section('header', 'Purchase Details')

@section('header-buttons')
<div class="flex space-x-4">
    <a href="{{ route('purchases.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
        <i class="fa fa-arrow-left"></i> Back to Purchases
    </a>
    <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
        <i class="fa fa-print"></i> Print
    </button>
</div>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Purchase Header -->
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Purchase Information</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Reference No:</span> {{ $purchase->reference_no }}</p>
                <p><span class="font-medium">Date:</span> {{ $purchase->created_at->format('d M Y h:i A') }}</p>
                <p><span class="font-medium">Status:</span> 
                    <span class="px-3 py-1 rounded-full text-sm
                        @if($purchase->payment_status == 'paid') 
                            bg-green-100 text-green-800
                        @elseif($purchase->payment_status == 'partial')
                            bg-yellow-100 text-yellow-800
                        @else
                            bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($purchase->payment_status) }}
                    </span>
                </p>
                <p><span class="font-medium">Payment Method:</span> {{ ucfirst($purchase->payment_method) }}</p>
            </div>
        </div>
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Supplier Information</h3>
            <div class="space-y-2">
                <p><span class="font-medium">Name:</span> {{ $purchase->supplier->name }}</p>
                <p><span class="font-medium">Phone:</span> {{ $purchase->supplier->phone }}</p>
                <p><span class="font-medium">Email:</span> {{ $purchase->supplier->email ?? 'N/A' }}</p>
                <p><span class="font-medium">Tax Number:</span> {{ $purchase->supplier->tax_number ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <!-- Purchase Items -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Purchase Items</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 rounded-l-lg">Product</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Unit Price</th>
                        <th class="p-4 rounded-r-lg">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($purchase->items as $item)
                    <tr>
                        <td class="p-4">{{ $item->product->name }}</td>
                        <td class="p-4">{{ $item->quantity }}</td>
                        <td class="p-4">₹{{ number_format($item->unit_price, 2) }}</td>
                        <td class="p-4">₹{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Purchase Summary -->
    <div class="border-t pt-6">
        <div class="w-1/3 ml-auto space-y-3">
            <div class="flex justify-between">
                <span class="font-medium">Total Amount:</span>
                <span>₹{{ number_format($purchase->total_amount, 2) }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium">Paid Amount:</span>
                <span>₹{{ number_format($purchase->paid_amount, 2) }}</span>
            </div>
            <div class="flex justify-between text-red-600">
                <span class="font-medium">Balance:</span>
                <span>₹{{ number_format($purchase->total_amount - $purchase->paid_amount, 2) }}</span>
            </div>
        </div>
    </div>

    @if($purchase->note)
    <div class="mt-6 border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Note</h3>
        <p class="text-gray-600">{{ $purchase->note }}</p>
    </div>
    @endif
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