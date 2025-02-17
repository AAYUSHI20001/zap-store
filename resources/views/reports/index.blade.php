@extends('layouts.app')

@section('title', 'Reports - Zap Store')
@section('header', 'Reports')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Stock Report Card -->
    <a href="{{ route('reports.stock') }}" 
       class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Stock Report</h3>
            <i class="fa fa-boxes text-2xl text-blue-500"></i>
        </div>
        <p class="text-gray-600">View current stock levels, purchases, and sales history for all products.</p>
    </a>

    <!-- Stock Value Report Card -->
    <a href="{{ route('reports.stock-value') }}" 
       class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold">Stock Value Report</h3>
            <i class="fa fa-chart-line text-2xl text-green-500"></i>
        </div>
        <p class="text-gray-600">Analysis of inventory value and stock worth at current purchase prices.</p>
    </a>

    <!-- Add more report cards here -->
</div>
@endsection 