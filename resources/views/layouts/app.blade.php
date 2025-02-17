<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zap Store - POS')</title>
    {{-- <link href="{{ asset('css/output.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .gradient-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }
        .nav-item {
            @apply px-4 py-2 text-white hover:bg-blue-700 rounded transition-colors;
        }
        .nav-item.active {
            @apply bg-blue-700;
        }
        .nav-item i {
            @apply mr-2;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100">
    <!-- Main Navigation -->
    <nav class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="text-white font-bold text-2xl">
                    Zap Store
                </div>
    
                <!-- Navigation Items -->   
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('dashboard') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
    
                    <a href="{{ route('products.index') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('products.*') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-box"></i> Products
                    </a>
    
                    <a href="{{ route('suppliers.index') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('suppliers.*') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-truck"></i> Suppliers
                    </a>
    
                    <a href="{{ route('pos') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('pos') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-calculator"></i> POS
                    </a>
    
                    <a href="{{ route('sales.index') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('sales.*') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-shopping-cart"></i> Sales
                    </a>
    
                    <a href="{{ route('purchases.index') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('purchases.*') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-shopping-bag"></i> Purchases
                    </a>
    
                    <a href="{{ route('reports.index') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('reports.*') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-chart-bar"></i> Reports
                    </a>
    
                    <a href="{{ route('users.index') }}" 
                       class="   px-4 py-2 rounded-lg transition duration-300 ease-in-out hover:bg-blue-700 {{ request()->routeIs('users.*') ? 'bg-white text-blue-500 font-bold shadow-lg p-3 rounded-lg' : '' }}">
                        <i class="fa fa-users"></i> Users
                    </a>
    
                        
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="    hover:bg-red-600 px-4 py-2 rounded-lg text-white">
                            <i class="fa fa-sign-out"></i> Logout
                        </button>
                    </form>
                </div>
    
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white focus:outline-none">
                    <i class="fa fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>
    
    

    <!-- Page Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto py-4 px-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                <div>
                    @yield('header-buttons')
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-6 px-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html> 