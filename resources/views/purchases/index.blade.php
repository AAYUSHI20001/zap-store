@extends('layouts.app')

@section('title', 'Purchases - Zap Store')
@section('header', 'Purchases')

@section('header-buttons')
<a href="{{ route('purchases.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-plus-circle"></i> New Purchase
</a>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Search and Filter Section -->
    <div class="mb-6 flex justify-between items-center">
        <div class="flex-1 max-w-md">
            <div class="relative">
                <input type="text" 
                       placeholder="Search by reference..." 
                       class="w-full pl-10 pr-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <span class="absolute left-3 top-3 text-gray-400">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
        <div class="flex space-x-4">
            <select class="px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <option value="">All Payment Status</option>
                <option value="paid">Paid</option>
                <option value="partial">Partial</option>
                <option value="pending">Pending</option>
            </select>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                <i class="fa fa-filter mr-2"></i> Filter
            </button>
        </div>
    </div>

    <!-- Purchases Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-2">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 rounded-l-lg">Reference</th>
                    <th class="p-4">Date</th>
                    <th class="p-4">Supplier</th>
                    <th class="p-4">Items</th>
                    <th class="p-4">Total Amount</th>
                    <th class="p-4">Paid Amount</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 rounded-r-lg text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $purchase)
                <tr class="bg-white hover:bg-gray-50 border-b">
                    <td class="p-4 font-medium">{{ $purchase->reference_no }}</td>
                    <td class="p-4">{{ $purchase->created_at->format('d M Y') }}</td>
                    <td class="p-4">{{ $purchase->supplier->name }}</td>
                    <td class="p-4">
                        <div class="flex flex-col">
                            @foreach($purchase->items as $item)
                                <span class="text-sm">
                                    {{ $item->product->name }} × {{ $item->quantity }}
                                </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="p-4 font-semibold">₹{{ number_format($purchase->total_amount, 2) }}</td>
                    <td class="p-4">₹{{ number_format($purchase->paid_amount, 2) }}</td>
                    <td class="p-4">
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
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('purchases.show', $purchase) }}" 
                               class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fa fa-eye"></i>
                            </a>
                            <button onclick="printPurchase({{ $purchase->id }})"
                                    class="bg-gray-500 text-white px-3 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                                <i class="fa fa-print"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-8 text-gray-500">
                        <i class="fa fa-shopping-cart text-4xl mb-4"></i>
                        <div>No purchases found</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $purchases->links() }}
    </div>
</div>

@push('scripts')
<script>
function printPurchase(id) {
    window.open(`/purchases/${id}/print`, '_blank');
}
</script>
@endpush
@endsection 