<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Products - Zap Store</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            border-radius: 12px;
            overflow: hidden;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .input-field {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: 0.3s;
            outline: none;
        }
        .input-field:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }
        .btn-submit {
    background: linear-gradient(135deg, #007bff, #0056b3); 
    color: white;
    padding: 12px;
    border-radius: 8px;
    width: 100%;
    font-size: 1rem;
    font-weight: bold;  
    text-transform: uppercase;
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #0056b3, #004494); 
    box-shadow: 0 4px 12px rgba(0, 91, 187, 0.3);
    transform: scale(1.05);
}

        .form-label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #520dc2);
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
        
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    
    <header class="p-6 text-white gradient-header shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-bold">Zap Store - Purchases</h1>
        <button class="btn-primary text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
        <i class="fas fa-plus-circle"></i>
        Create Purchases
    </button>
        </a>
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
            <h2 class="text-2xl font-bold mb-4 text-blue-700">Purchases</h2>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <table class="w-full text-left border-separate border-spacing-y-4">
                    <thead>
                        <tr class="bg-blue-700 text-black font-bold">
                            <th class="p-3">Reference</th>
                            <th class="p-3">Supplier</th>
                            <th class="p-3">Warehouse</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Grand Total</th>
                            <th class="p-3">Paid</th>
                            <th class="p-3">Due</th>
                            <th class="p-3">Payment Type</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
    <tr class="bg-gray-100 text-gray-800">
        <td class="p-4">PUR-001</td>
        <td class="p-4">ABC Suppliers</td>
        <td class="p-4"> Warehouse</td>
        <td class="p-4 text-green-600 font-semibold">Received</td>
        <td class="p-4">Rs.1,200</td>
        <td class="p-4">Rs.1,200</td>
        <td class="p-4">Rs.0</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                               
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>

        </td>
    </tr>
    <tr class="bg-white text-gray-800">
        <td class="p-4">PUR-002</td>
        <td class="p-4">XYZ Traders</td>
        <td class="p-4"> Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Pending</td>
        <td class="p-4">Rs.8950</td>
        <td class="p-4">Rs.500</td>
        <td class="p-4">Rs.450</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-gray-100 text-gray-800">
        <td class="p-4">PUR-003</td>
        <td class="p-4">LMN Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-red-600 font-semibold">Pending</td>
        <td class="p-4">Rs.2100</td>
        <td class="p-4">Rs.0</td>
        <td class="p-4">Rs.2,100</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-white text-gray-800">
        <td class="p-4">PUR-004</td>
        <td class="p-4">PQR Suppliers</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-green-600 font-semibold">Pending</td>
        <td class="p-4">Rs.3500</td>
        <td class="p-4">Rs.3,500</td>
        <td class="p-4">Rs.0</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-gray-100 text-gray-800">
        <td class="p-4">PUR-005</td>
        <td class="p-4">EFG Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Received</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.0</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-white text-gray-800">
        <td class="p-4">PUR-006</td>
        <td class="p-4">EFG Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Received</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-gray-100 text-gray-800">
        <td class="p-4">PUR-007</td>
        <td class="p-4">LMN Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Received</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-white text-gray-800">
        <td class="p-4">PUR-008</td>
        <td class="p-4">GHI Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Received</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-gray-100 text-gray-800">
        <td class="p-4">PUR-009</td>
        <td class="p-4">ABC Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Pending</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-white text-gray-800">
        <td class="p-4">PUR-010</td>
        <td class="p-4">EFG Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Pending</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-gray-100 text-gray-800">
        <td class="p-4">PUR-011</td>
        <td class="p-4">EFG Distributors</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Pending</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
    <tr class="bg-white text-gray-800">
        <td class="p-4">PUR-012</td>
        <td class="p-4">XYZ Traders</td>
        <td class="p-4">Warehouse</td>
        <td class="p-4 text-yellow-600 font-semibold">Received</td>
        <td class="p-4">Rs.4800</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Rs.400</td>
        <td class="p-4">Cash</td>
        <td class="p-4">
        <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black p-3 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                                <button class="bg-blue-500 text-white p-3 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-eye mr-2"></i>
                                </button>
        </td>
    </tr>
</tbody>
    </body>
    </html>
