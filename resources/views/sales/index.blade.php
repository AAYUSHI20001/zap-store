@extends('layouts.app')

@section('title', 'Sales - Zap Store')
@section('header', 'Sales History')

@section('header-buttons')
<div class="flex space-x-4">
    <a href="{{ route('pos') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
        <i class="fa fa-cash-register"></i> Open POS
    </a>
</div>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Search and Filter Section -->
    <div class="mb-6 flex justify-between items-center">
        <div class="flex-1 max-w-md">
            <div class="relative">
                <input type="text" 
                       placeholder="Search by reference no..." 
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

    <!-- Sales Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-2">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 rounded-l-lg">Reference</th>
                    <th class="p-4">Date</th>
                    <th class="p-4">Items</th>
                    <th class="p-4">Total Amount</th>
                    <th class="p-4">Paid Amount</th>
                    <th class="p-4">Payment Status</th>
                    <th class="p-4">Payment Method</th>
                    <th class="p-4 rounded-r-lg text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                <tr class="bg-white hover:bg-gray-50 border-b">
                    <td class="p-4 font-medium">{{ $sale->reference_no }}</td>
                    <td class="p-4">{{ $sale->created_at->format('d M Y H:i') }}</td>
                    <td class="p-4">
                        <div class="flex flex-col">
                            @foreach($sale->items as $item)
                                <span class="text-sm">
                                    {{ $item->product->name }} × {{ $item->quantity }}
                                </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="p-4 font-semibold">₹{{ number_format($sale->total_amount, 2) }}</td>
                    <td class="p-4">₹{{ number_format($sale->paid_amount, 2) }}</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-sm
                            @if($sale->payment_status == 'paid') 
                                bg-green-100 text-green-800
                            @elseif($sale->payment_status == 'partial')
                                bg-yellow-100 text-yellow-800
                            @else
                                bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($sale->payment_status) }}
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="capitalize">{{ $sale->payment_method }}</span>
                    </td>
                    <td class="p-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <button onclick="viewSaleDetails({{ $sale->id }})" 
                                    class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button onclick="printInvoice({{ $sale->id }})"
                                    class="bg-gray-500 text-white px-3 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                                <i class="fa fa-print"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-8 text-gray-500">
                        <i class="fa fa-receipt text-4xl mb-4"></i>
                        <div>No sales found</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $sales->links() }}
    </div>
</div>

<!-- Sale Details Modal -->
<div id="sale-details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-2/3 max-h-[80vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold">Sale Details</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div id="sale-details-content" class="space-y-6">
            <!-- Sale Info -->
            <div class="grid grid-cols-2 gap-4 p-4 bg-gray-50 rounded-lg">
                <div>
                    <p class="text-gray-600">Reference No:</p>
                    <p class="font-semibold" id="modal-reference"></p>
                </div>
                <div>
                    <p class="text-gray-600">Date:</p>
                    <p class="font-semibold" id="modal-date"></p>
                </div>
                <div>
                    <p class="text-gray-600">Payment Method:</p>
                    <p class="font-semibold" id="modal-payment-method"></p>
                </div>
                <div>
                    <p class="text-gray-600">Payment Status:</p>
                    <p class="font-semibold" id="modal-payment-status"></p>
                </div>
            </div>

            <!-- Items Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4">Product</th>
                            <th class="p-4">Quantity</th>
                            <th class="p-4">Unit Price</th>
                            <th class="p-4">Total</th>
                        </tr>
                    </thead>
                    <tbody id="modal-items">
                        <!-- Items will be added here -->
                    </tbody>
                </table>
            </div>

            <!-- Totals -->
            <div class="space-y-2 border-t pt-4">
                <div class="flex justify-between">
                    <span class="font-semibold">Total Amount:</span>
                    <span id="modal-total" class="font-bold"></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Paid Amount:</span>
                    <span id="modal-paid" class="font-bold"></span>
                </div>
                <div class="flex justify-between text-green-600">
                    <span class="font-semibold">Change:</span>
                    <span id="modal-change" class="font-bold"></span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function viewSaleDetails(saleId) {
    // Show modal
    document.getElementById('sale-details-modal').classList.remove('hidden');
    
    // Fetch sale details
    fetch(`/sales/${saleId}/details`)
        .then(response => response.json())
        .then(data => {
            const sale = data.sale;
            
            // Update basic info
            document.getElementById('modal-reference').textContent = sale.reference_no;
            document.getElementById('modal-date').textContent = data.formatted_date;
            document.getElementById('modal-payment-method').textContent = data.payment_method;
            document.getElementById('modal-payment-status').textContent = data.payment_status;
            
            // Update items table
            const itemsBody = document.getElementById('modal-items');
            itemsBody.innerHTML = data.items.map(item => `
                <tr class="border-b">
                    <td class="p-4">${item.product_name}</td>
                    <td class="p-4">${item.quantity}</td>
                    <td class="p-4">₹${item.unit_price}</td>
                    <td class="p-4">₹${item.total_price}</td>
                </tr>
            `).join('');
            
            // Update totals
            document.getElementById('modal-total').textContent = `₹${sale.total_amount}`;
            document.getElementById('modal-paid').textContent = `₹${sale.paid_amount}`;
            const change = Math.max(0, sale.paid_amount - sale.total_amount);
            document.getElementById('modal-change').textContent = `₹${change.toFixed(2)}`;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading sale details');
        });
}

function closeModal() {
    document.getElementById('sale-details-modal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('sale-details-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

function printInvoice(saleId) {
    window.open(`/sales/${saleId}/invoice`, '_blank');
}
</script>
@endpush
@endsection 