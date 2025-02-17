@extends('layouts.app')

@section('title', 'New Purchase - Zap Store')
@section('header', 'Create New Purchase')

@section('header-buttons')
<a href="{{ route('purchases.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-arrow-left"></i> Back to Purchases
</a>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <form action="{{ route('purchases.store') }}" method="POST" id="purchase-form">
        @csrf
        <!-- Hidden Fields -->
        <input type="hidden" name="total_amount" id="total-amount-input">
        
        <div class="grid grid-cols-3 gap-6">
            <!-- Left Column -->
            <div class="col-span-2 space-y-6">
                <!-- Supplier Selection -->
                <div>
                    <label class="block text-gray-700 text-lg mb-2">Select Supplier <span class="text-red-500">*</span></label>
                    <select name="supplier_id" 
                            class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('supplier_id') border-red-500 @enderror"
                            required>
                        <option value="">Select a supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Search -->
                <div>
                    <label class="block text-gray-700 text-lg mb-2">Add Products</label>
                    <div class="relative">
                        <input type="text" 
                               id="product-search" 
                               class="w-full p-3 pl-10 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                               placeholder="Search products...">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                    <div id="product-list" class="mt-2 max-h-48 overflow-y-auto hidden border rounded-lg">
                        @foreach($products as $product)
                            <div class="p-2 hover:bg-gray-100 cursor-pointer"
                                 onclick="addToCart({{ json_encode([
                                     'id' => $product->id,
                                     'name' => $product->name,
                                     'purchase_price' => $product->purchase_price
                                 ]) }})">
                                {{ $product->name }} - ₹{{ number_format($product->purchase_price, 2) }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Selected Products Table -->
                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-4">Product</th>
                                <th class="p-4">Quantity</th>
                                <th class="p-4">Unit Price</th>
                                <th class="p-4">Total</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <!-- Cart items will be added here -->
                        </tbody>
                    </table>
                </div>
                @error('items')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Right Column - Summary -->
            <div class="space-y-6">
                <div class="border rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-4">Purchase Summary</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span>Total Amount:</span>
                            <span id="total-amount" class="font-semibold">₹0.00</span>
                        </div>

                        <div>
                            <label class="block mb-2">Payment Method <span class="text-red-500">*</span></label>
                            <select name="payment_method" 
                                    class="w-full p-3 border rounded-lg @error('payment_method') border-red-500 @enderror"
                                    required>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="bank" {{ old('payment_method') == 'bank' ? 'selected' : '' }}>Bank Transfer</option>
                                <option value="upi" {{ old('payment_method') == 'upi' ? 'selected' : '' }}>UPI</option>
                            </select>
                            @error('payment_method')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block mb-2">Paid Amount <span class="text-red-500">*</span></label>
                            <input type="number" 
                                   name="paid_amount" 
                                   value="{{ old('paid_amount', 0) }}"
                                   class="w-full p-3 border rounded-lg @error('paid_amount') border-red-500 @enderror"
                                   step="0.01"
                                   min="0"
                                   required>
                            @error('paid_amount')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block mb-2">Note</label>
                            <textarea name="note" 
                                      rows="3" 
                                      class="w-full p-3 border rounded-lg">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                        class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-colors">
                    <i class="fa fa-save mr-2"></i>Save Purchase
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
let cart = [];

// Product search functionality
document.getElementById('product-search').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const productList = document.getElementById('product-list');
    
    if (searchTerm.length > 0) {
        productList.classList.remove('hidden');
        Array.from(productList.children).forEach(product => {
            const productName = product.textContent.toLowerCase();
            product.style.display = productName.includes(searchTerm) ? 'block' : 'none';
        });
    } else {
        productList.classList.add('hidden');
    }
});

// Add to cart function
function addToCart(product) {
    const existingItem = cart.find(item => item.product_id === product.id);
    
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({
            product_id: product.id,
            name: product.name,
            quantity: 1,
            unit_price: product.purchase_price
        });
    }
    
    updateCartDisplay();
    document.getElementById('product-search').value = '';
    document.getElementById('product-list').classList.add('hidden');
}

// Update quantity
function updateQuantity(index, change) {
    const newQuantity = cart[index].quantity + change;
    if (newQuantity > 0) {
        cart[index].quantity = newQuantity;
        updateCartDisplay();
    }
}

// Remove from cart
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
}

// Update cart display
function updateCartDisplay() {
    const cartDiv = document.getElementById('cart-items');
    cartDiv.innerHTML = '';
    
    cart.forEach((item, index) => {
        const total = item.quantity * item.unit_price;
        cartDiv.innerHTML += `
            <tr class="border-t">
                <td class="p-4">${item.name}</td>
                <td class="p-4">
                    <div class="flex items-center space-x-2">
                        <button type="button" onclick="updateQuantity(${index}, -1)" 
                                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                        <span>${item.quantity}</span>
                        <button type="button" onclick="updateQuantity(${index}, 1)" 
                                class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                    </div>
                </td>
                <td class="p-4">₹${item.unit_price}</td>
                <td class="p-4">₹${total.toFixed(2)}</td>
                <td class="p-4">
                    <button type="button" onclick="removeFromCart(${index})" 
                            class="text-red-500 hover:text-red-600">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    });
    
    updateTotal();
}

// Update total
function updateTotal() {
    const total = cart.reduce((sum, item) => sum + (item.unit_price * item.quantity), 0);
    document.getElementById('total-amount').textContent = `₹${total.toFixed(2)}`;
    document.getElementById('total-amount-input').value = total;
}

// Form submission
document.getElementById('purchase-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (cart.length === 0) {
        alert('Please add at least one product to the purchase.');
        return;
    }
    
    // Create an array of items with the correct format
    cart.forEach((item, index) => {
        const itemInput = document.createElement('input');
        itemInput.type = 'hidden';
        itemInput.name = `items[${index}][product_id]`;
        itemInput.value = item.product_id;
        this.appendChild(itemInput);

        const quantityInput = document.createElement('input');
        quantityInput.type = 'hidden';
        quantityInput.name = `items[${index}][quantity]`;
        quantityInput.value = item.quantity;
        this.appendChild(quantityInput);

        const priceInput = document.createElement('input');
        priceInput.type = 'hidden';
        priceInput.name = `items[${index}][unit_price]`;
        priceInput.value = item.unit_price;
        this.appendChild(priceInput);
    });
    
    this.submit();
});
</script>
@endpush
@endsection 