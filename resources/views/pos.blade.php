@extends('layouts.app')

@section('title', 'POS - Zap Store')
@section('header', 'Point of Sale')

@section('content')
<div class="flex h-[calc(100vh-100px)]">
    <!-- Left Side - Products -->
    <div class="flex-1 bg-white p-4 mr-4 rounded-lg shadow-lg overflow-hidden flex flex-col">
        <!-- Search and Filters -->
        <div class="flex gap-4 mb-4">
            <!-- Barcode Scanner -->
            <div class="flex-1">
                <div class="relative">
                    <input type="text" 
                           id="barcode" 
                           class="w-full p-3 pl-10 border rounded-lg" 
                           placeholder="Scan/Enter Product Code"
                           autofocus>
                    <i class="fa fa-barcode absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            
            <!-- Product Search -->
            <div class="flex-1">
                <div class="relative">
                    <input type="text" 
                           id="search-products" 
                           class="w-full p-3 pl-10 border rounded-lg" 
                           placeholder="Search Products...">
                    <i class="fa fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <!-- Category Filter -->
            <select id="category-filter" class="p-3 border rounded-lg w-48">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="food">Food & Beverages</option>
            </select>
        </div>

        <!-- Products Grid -->
        <div class="flex-1 overflow-y-auto">
            <div class="grid grid-cols-6 gap-4" id="products-grid">
                @foreach($products as $product)
                <div class="product-card border rounded-lg p-3 cursor-pointer hover:border-blue-500 transition-colors"
                     data-category="{{ $product->category }}"
                     onclick="addToCart({{ json_encode($product) }})">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://placehold.co/600x400/png' }}" 
                         alt="{{ $product->name }}"
                         class="w-full h-24 object-cover rounded-lg mb-2">
                    <h4 class="font-semibold text-gray-800 text-sm truncate">{{ $product->name }}</h4>
                    <p class="text-xs text-gray-600">Stock: {{ $product->stock }}</p>
                    <p class="text-sm font-bold text-green-600 mt-1">₹{{ number_format($product->selling_price, 2) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Side - Cart -->
    <div class="w-1/3 bg-white rounded-lg shadow-lg flex flex-col">
        <!-- Cart Header -->
        <div class="p-4 border-b">
            <h2 class="text-xl font-bold text-gray-800">Current Sale</h2>
        </div>

        <!-- Cart Items -->
        <div class="flex-1 p-4 overflow-y-auto" id="cart-items">
            <!-- Cart items will be added here dynamically -->
        </div>

        <!-- Cart Summary -->
        <div class="border-t p-4">
            <div class="space-y-3">
                <div class="flex justify-between text-lg">
                    <span>Subtotal:</span>
                    <span id="subtotal" class="font-semibold">₹0.00</span>
                </div>
                <div class="flex justify-between text-lg">
                    <span>Tax (18%):</span>
                    <span id="tax" class="font-semibold">₹0.00</span>
                </div>
                <div class="flex justify-between text-xl font-bold border-t pt-2">
                    <span>Total:</span>
                    <span id="total">₹0.00</span>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="space-y-3 mt-4">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-gray-700 mb-1">Payment Method</label>
                        <select id="payment-method" class="w-full p-2 border rounded-lg">
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Amount Paid</label>
                        <input type="number" 
                               id="amount-paid" 
                               class="w-full p-2 border rounded-lg" 
                               value="0"
                               step="0.01">
                    </div>
                </div>
                <div class="flex justify-between text-lg text-green-600 font-bold">
                    <span>Change:</span>
                    <span id="change">₹0.00</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-3 mt-4">
                <button onclick="clearCart()" 
                        class="p-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                    <i class="fa fa-trash mr-2"></i>Clear
                </button>
                <button onclick="processSale()" 
                        class="p-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                    <i class="fa fa-check-circle mr-2"></i>Complete
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let cart = [];
const TAX_RATE = 0.18; // 18% tax

// Add to cart function
function addToCart(product) {
    const existingItem = cart.find(item => item.product_id === product.id);
    
    if (existingItem) {
        if (existingItem.quantity >= product.stock) {
            alert('Maximum stock reached!');
            return;
        }
        existingItem.quantity++;
    } else {
        cart.push({
            product_id: product.id,
            name: product.name,
            price: product.selling_price,
            quantity: 1,
            stock: product.stock
        });
    }
    
    updateCartDisplay();
    playAddToCartSound();
}

// Update quantity
function updateQuantity(index, change) {
    const item = cart[index];
    const newQuantity = item.quantity + change;
    
    if (newQuantity > 0 && newQuantity <= item.stock) {
        item.quantity = newQuantity;
        updateCartDisplay();
    }
}

// Remove from cart
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
}

// Clear cart
function clearCart() {
    if (confirm('Are you sure you want to clear the cart?')) {
        cart = [];
        updateCartDisplay();
    }
}

// Update cart display
function updateCartDisplay() {
    const cartDiv = document.getElementById('cart-items');
    cartDiv.innerHTML = '';
    
    cart.forEach((item, index) => {
        cartDiv.innerHTML += `
            <div class="flex justify-between items-center mb-4 p-2 border-b">
                <div class="flex-1">
                    <h4 class="font-semibold">${item.name}</h4>
                    <p class="text-sm text-gray-600">₹${item.price} × ${item.quantity}</p>
                    <p class="text-sm font-bold text-green-600">₹${(item.price * item.quantity).toFixed(2)}</p>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="updateQuantity(${index}, -1)" 
                            class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                    <span class="w-8 text-center">${item.quantity}</span>
                    <button onclick="updateQuantity(${index}, 1)" 
                            class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                    <button onclick="removeFromCart(${index})" 
                            class="ml-2 text-red-500 hover:text-red-600">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
    });
    
    updateTotals();
}

// Update totals
function updateTotals() {
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const tax = subtotal * TAX_RATE;
    const total = subtotal + tax;
    
    document.getElementById('subtotal').textContent = `₹${subtotal.toFixed(2)}`;
    document.getElementById('tax').textContent = `₹${tax.toFixed(2)}`;
    document.getElementById('total').textContent = `₹${total.toFixed(2)}`;
    
    // Update change amount
    updateChange();
}

// Update change amount
function updateChange() {
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * (1 + TAX_RATE);
    const amountPaid = parseFloat(document.getElementById('amount-paid').value) || 0;
    const change = amountPaid - total;
    document.getElementById('change').textContent = `₹${Math.max(0, change).toFixed(2)}`;
}

// Process sale
function processSale() {
    if (cart.length === 0) {
        alert('Cart is empty!');
        return;
    }
    
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * (1 + TAX_RATE);
    const amountPaid = parseFloat(document.getElementById('amount-paid').value) || 0;
    
    if (amountPaid < total) {
        alert('Insufficient payment amount!');
        return;
    }
    
    const saleData = {
        items: cart.map(item => ({
            product_id: item.product_id,
            quantity: item.quantity
        })),
        total_amount: total,
        paid_amount: amountPaid,
        payment_method: document.getElementById('payment-method').value
    };
    
    // Send sale data to server
    fetch('/sales', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(saleData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Sale completed successfully!');
            // Open invoice in new window
            window.open(`/sales/${data.sale.id}/invoice`, '_blank');
            // Clear cart
            cart = [];
            updateCartDisplay();
            document.getElementById('amount-paid').value = '0';
        } else {
            alert(data.message || 'Error processing sale');
        }
    })
    .catch(error => {
        alert('Error processing sale');
        console.error('Error:', error);
    });
}

// Barcode/product code input handler
document.getElementById('barcode').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        const code = this.value;
        fetch(`/get-product?code=${code}`)
            .then(response => response.json())
            .then(product => {
                if (product.error) {
                    alert(product.error);
                } else {
                    addToCart(product);
                }
                this.value = '';
            })
            .catch(error => {
                alert('Error finding product');
                console.error('Error:', error);
            });
    }
});

// Product search handler
document.getElementById('search-products').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const category = document.getElementById('category-filter').value;
    filterProducts(searchTerm, category);
});

// Category filter handler
document.getElementById('category-filter').addEventListener('change', function(e) {
    const category = e.target.value;
    const searchTerm = document.getElementById('search-products').value.toLowerCase();
    filterProducts(searchTerm, category);
});

// Filter products
function filterProducts(searchTerm, category) {
    const products = document.querySelectorAll('.product-card');
    products.forEach(product => {
        const productName = product.querySelector('h4').textContent.toLowerCase();
        const productCategory = product.dataset.category;
        const matchesSearch = productName.includes(searchTerm);
        const matchesCategory = !category || productCategory === category;
        
        product.style.display = matchesSearch && matchesCategory ? 'block' : 'none';
    });
}

// Amount paid input handler
document.getElementById('amount-paid').addEventListener('input', updateChange);

// Play sound when adding to cart
function playAddToCartSound() {
    // You can add a sound effect here if desired
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateCartDisplay();
});
</script>
@endpush
@endsection