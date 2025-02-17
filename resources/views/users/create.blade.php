@extends('layouts.app')

@section('title', 'Add User - Zap Store')
@section('header', 'Add New User')

@section('header-buttons')
<a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-arrow-left"></i> Back to Users
</a>
@endsection

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('users.store') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        @csrf
        <div class="space-y-6">
            <!-- Name -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Name <span class="text-red-500">*</span></label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Email <span class="text-red-500">*</span></label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('email') border-red-500 @enderror" 
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Password <span class="text-red-500">*</span></label>
                <input type="password" 
                       name="password" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('password') border-red-500 @enderror" 
                       required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Confirm Password <span class="text-red-500">*</span></label>
                <input type="password" 
                       name="password_confirmation" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                       required>
            </div>

            <!-- Role -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Role <span class="text-red-500">*</span></label>
                <select name="role" 
                        class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('role') border-red-500 @enderror"
                        required>
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Phone</label>
                <input type="text" 
                       name="phone" 
                       value="{{ old('phone') }}" 
                       class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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

            <!-- Status -->
            <div>
                <label class="block text-gray-700 text-lg mb-2">Status <span class="text-red-500">*</span></label>
                <select name="status" 
                        class="w-full p-3 border rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                        required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
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
                    Create User
                </button>
            </div>
        </div>
    </form>
</div>
@endsection 