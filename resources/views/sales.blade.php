<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Zap Store</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }
        .sidebar {
            background-color: rgb(31 41 55 / var(--tw-bg-opacity, 1));
        }
        .sidebar a {
            transition: color 0.3s;
        }
        .sidebar a:hover {
            color: rgb(96 165 250 / var(--tw-text-opacity, 1));
        }
        .table-row:nth-child(even) {
            background-color: #f8fafc;
        }
        .table-row:hover {
            background-color: #e0f2fe;
        }
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #520dc2);
        }

    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="p-6 text-white gradient-header shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-bold">Zap Store - Sales</h1>
        <button class="btn-primary text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
            <i class="fas fa-plus-circle"></i> Create Sales
        </button>
    </header>

    <div class="flex">
        <nav class="w-64 sidebar text-white min-h-screen p-4">
            <ul class="space-y-4">
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <a href="#">Dashboard</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-box-open mr-3"></i>
                    <a href="#">Products</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                <i class="fas fa-shopping-cart mr-3"></i>
                    <a href="#" class="hover:text-blue-400">Purchases</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                <i class="fas fa-money-bill-wave mr-3"></i>
                    <a href="#" class="hover:text-blue-400">Sales</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-chart-line mr-3"></i>
                    <a href="#" class="hover:text-blue-400">Reports</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-cogs mr-3"></i>
                    <a href="#">Settings</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <a href="#">Log Out</a>
                </li>
            </ul>
        </nav>
        <main class="flex-1  p-6 ">
            <h2 class="text-2xl font-bold mb-4 text-blue-700">Sales</h2>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <table class="w-full text-left border-separate border-spacing-y-4">
                    <thead>
                        <tr class="bg-blue-700 text-black font-bold">
                            <th class="p-4">Reference</th>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Store</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Total</th>
                            <th class="p-4">Paid</th>
                            <th class="p-4">Due </th>
                            <th class="p-4">Discount</th>
                            <th class="p-4">Payment Status</th>
                            <th class="p-4">Payment Type</th>
                            <th class="p-4">Action</th>
                        </tr>
                    </thead>
                    <tr class="bg-gray-100 hover:bg-gray-200">
                <td class="p-4">SA_01</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Completed</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">0</td>
                <td class="p-4">50.5</td>
                <td class="p-4 text-green-500 font-bold">Paid</td>
                <td class="p-4">Cash</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>




                </td>
            </tr>
            <tr class="bg-white-100 hover:bg-gray-200">
                <td class="p-4">SA_02</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Completed</td>
                <td class="p-4">Rs.545</td>
                <td class="p-4">Rs.545</td>
                <td class="p-4">0</td>
                <td class="p-4">0</td>
                <td class="p-4 text-green-500 font-bold">Paid</td>
                <td class="p-4">Cash</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>
            <tr class="bg-gray-100 hover:bg-gray-200">
                <td class="p-4">SA_03</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Completed</td>
                <td class="p-4">Rs.10</td>
                <td class="p-4">Rs.10</td>
                <td class="p-4">0</td>
                <td class="p-4">0</td>
                <td class="p-4 text-green-500 font-bold">Paid</td>
                <td class="p-4">Cash</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>    
               <tr class="bg-white-100 hover:bg-gray-200">
                <td class="p-4">SA_04</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Pending</td>
                <td class="p-4">Rs.100</td>
                <td class="p-4">Rs.50</td>
                <td class="p-4">0</td>
                <td class="p-4">50</td>
                <td class="p-4 text-green-500 font-bold">Unpaid</td>
                <td class="p-4">Partial payment</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>
            <tr class="bg-gray-100 hover:bg-gray-200">
                <td class="p-4">SA_05</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Completed</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">0</td>
                <td class="p-4">50.5</td>
                <td class="p-4 text-green-500 font-bold">Unpaid</td>
                <td class="p-4">Partial Payment</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>  
            <tr class="bg-white-100 hover:bg-gray-200">
                <td class="p-4">SA_06</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Completed</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">0</td>
                <td class="p-4">50.5</td>
                <td class="p-4 text-green-500 font-bold">Unpaid</td>
                <td class="p-4">Cash</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>
            <tr class="bg-gray-100 hover:bg-gray-200">
                <td class="p-4">SA_07</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Completed</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">0</td>
                <td class="p-4">50.5</td>
                <td class="p-4 text-green-500 font-bold">Paid</td>
                <td class="p-4">Cash</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>
            <tr class="bg-white-100 hover:bg-gray-200">
                <td class="p-4">SA_08</td>
                <td class="p-4">John Doe</td>
                <td class="p-4">Warehouse</td>
                <td class="p-4 text-green-600 font-bold">Pending</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">Rs.400</td>
                <td class="p-4">200</td>
                <td class="p-4">50.5</td>
                <td class="p-4 text-green-500 font-bold">Paid</td>
                <td class="p-4">Partial Payment</td>
                <td class="p-4">
                <div class="flex">
    <i class="fas fa-edit text-blue-500 hover:text-blue-700 text-xl px-2"></i>
    <i class="fas fa-trash text-red-500 hover:text-red-700 text-xl px-2"></i>
    <i class="fas fa-eye text-black hover:text-gray-700 text-xl px-2"></i>
</div>
                </td>
            </tr>
            