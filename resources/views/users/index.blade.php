@extends('layouts.app')

@section('title', 'Users - Zap Store')
@section('header', 'Users')

@section('header-buttons')
<a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
    <i class="fa fa-plus-circle"></i> Add User
</a>
@endsection

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6">
    <!-- Search -->
    <div class="mb-6">
        <div class="relative max-w-md">
            <input type="text" 
                   placeholder="Search users..." 
                   class="w-full pl-10 pr-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            <span class="absolute left-3 top-3 text-gray-400">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>

    <!-- Users Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Created At</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($users as $user)
                <tr>
                    <td class="p-4">
                        <div class="flex items-center">
                            <span class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center mr-3">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="p-4">{{ $user->email }}</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-sm
                            {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-sm
                            {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td class="p-4">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="p-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('users.edit', $user) }}" 
                               class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fa fa-edit"></i>
                            </a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('users.destroy', $user) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">
                        <i class="fa fa-users text-4xl mb-4"></i>
                        <div>No users found</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection 