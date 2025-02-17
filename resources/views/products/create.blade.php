@extends('layouts.app')

@section('title', 'Add Product - Zap Store')
@section('header', 'Add New Product')

@section('header-buttons')
<a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-arrow-left"></i> Back to Products
</a>
@endsection

@section('content')
<div class="container mx-auto p-8">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-3 gap-8">
            <!-- Left Column - Image Upload -->
            <div class="col-span-1">
                <div class="bg-white p-8 shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold mb-6 text-gray-700">
                        <i class="fa fa-image mr-2"></i>Product Image
                    </h3>
                    <div class="border-2 border-dashed border-gray-300 p-6 text-center rounded-lg hover:border-blue-500 transition-colors">
                        <img id="preview" src="https://via.placeholder.com/400x400?text=Upload+Image" 
                             alt="Preview" class="mx-auto mb-6 rounded-lg w-full h-80 object-cover">
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                        <button type="button" 
                                onclick="document.getElementById('image').click();" 
                                class="bg-blue-500 text-white px-8 py-4 rounded-lg hover:bg-blue-600 transition-colors w-full flex items-center justify-center text-lg">
                            <i class="fa fa-upload mr-2"></i> Upload Image
                        </button>
                        <p class="text-sm text-gray-500 mt-4">
                            Supported formats: JPG, PNG, GIF (Max size: 2MB)
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Product Information -->
            <div class="col-span-2">
                <div class="bg-white p-8 shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold mb-8 text-gray-700 border-b pb-4">
                        <i class="fa fa-box mr-2"></i>Product Information
                    </h3>

                    <div class="grid grid-cols-2 gap-8">
                        <!-- Basic Information -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 text-lg mb-3">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                   class="w-full p-4 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                                   placeholder="Enter product name"
                                   required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-lg mb-3">Product Code/SKU <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-4 text-gray-400 text-xl">
                                    <i class="fa fa-barcode"></i>
                                </span>
                                <input type="text" name="code" value="{{ old('code') }}" 
                                       class="w-full p-4 pl-12 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                                       placeholder="Enter product code"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-lg mb-3">Category</label>
                            <select name="category" class="w-full p-4 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                <option value="">Select Category</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="food">Food & Beverages</option>
                            </select>
                        </div>

                        <!-- Pricing Information -->
                        <div class="col-span-2">
                            <h4 class="text-lg font-semibold text-gray-700 mb-6 mt-4 border-b pb-4">
                                <i class="fa fa-tag mr-2"></i>Pricing Details
                            </h4>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-lg mb-3">Purchase Price <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-4 text-gray-400 text-xl">₹</span>
                                <input type="number" 
                                       name="purchase_price" 
                                       value="{{ old('purchase_price') }}" 
                                       step="0.01" 
                                       class="w-full p-4 pl-10 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('purchase_price') border-red-500 @enderror" 
                                       placeholder="0.00"
                                       required>
                            </div>
                            @error('purchase_price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 text-lg mb-3">Selling Price <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-4 top-4 text-gray-400 text-xl">₹</span>
                                <input type="number" 
                                       name="selling_price" 
                                       value="{{ old('selling_price') }}" 
                                       step="0.01" 
                                       class="w-full p-4 pl-10 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('selling_price') border-red-500 @enderror" 
                                       placeholder="0.00"
                                       required>
                            </div>
                            @error('selling_price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Inventory Information -->
                        <div class="col-span-2">
                            <h4 class="text-lg font-semibold text-gray-700 mb-6 mt-4 border-b pb-4">
                                <i class="fa fa-warehouse mr-2"></i>Inventory Information
                            </h4>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-lg mb-3">Stock Quantity <span class="text-red-500">*</span></label>
                            <input type="number" name="stock" value="{{ old('stock', 0) }}" 
                                   class="w-full p-4 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                                   placeholder="Enter quantity"
                                   required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-lg mb-3">Alert Quantity</label>
                            <input type="number" name="alert_quantity" value="{{ old('alert_quantity') }}" 
                                   class="w-full p-4 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                                   placeholder="Low stock alert quantity">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-gray-700 text-lg mb-3">Product Description</label>
                            <textarea name="description" rows="4" 
                                      class="w-full p-4 text-lg border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                      placeholder="Enter product description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-end space-x-6">
                    <button type="button" onclick="window.history.back()" 
                            class="bg-gray-500 text-white px-8 py-4 rounded-lg shadow hover:bg-gray-600 transition-colors flex items-center text-lg">
                        <i class="fa fa-times mr-2"></i> Cancel
                    </button>
                    <button type="submit" 
                            class="bg-blue-500 text-white px-10 py-4 rounded-lg shadow hover:bg-blue-600 transition-colors flex items-center text-lg">
                        <i class="fa fa-save mr-2"></i> Save Product
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Add price validation
document.querySelector('form').addEventListener('submit', function(e) {
    const purchasePrice = parseFloat(document.querySelector('[name="purchase_price"]').value);
    const sellingPrice = parseFloat(document.querySelector('[name="selling_price"]').value);
    
    if (sellingPrice < purchasePrice) {
        e.preventDefault();
        alert('Selling price cannot be less than purchase price');
    }
});
</script>
@endpush
@endsection 