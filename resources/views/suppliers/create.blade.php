@extends('layouts.app')

@section('title', 'Add Supplier - Zap Store')
@section('header', 'Add New Supplier')

@section('header-buttons')
<a href="{{ route('suppliers.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-arrow-left"></i> Back to Suppliers
</a>
@endsection

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('suppliers.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="space-y-6">
            <!-- Name -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Supplier Name <span class="text-red-500">*</span></label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contact Information -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 text-lg mb-2">Phone Number <span class="text-red-500">*</span></label>
                    <input type="text" 
                           name="phone" 
                           value="{{ old('phone') }}" 
                           class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('phone') border-red-500 @enderror" 
                           required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-lg mb-2">Email Address</label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Address</label>
                <textarea name="address" 
                          rows="3" 
                          class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tax Number -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Tax Number</label>
                <input type="text" 
                       name="tax_number" 
                       value="{{ old('tax_number') }}" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('tax_number') border-red-500 @enderror">
                @error('tax_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <button type="button" 
                        onclick="window.history.back()" 
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-600 transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-colors">
                    Save Supplier
                </button>
            </div>
        </div>
    </form>
</div>
@endsection 