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
        <h1 class="text-2xl font-bold">Zap Store - Products</h1>
        <button class="btn-primary text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
            <i class="fas fa-arrow-left"></i>
         Back to Products
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
        <main class="flex-1 p-6">
            <h2 class="text-2xl font-bold mb-4 text-blue-700">Product Category</h2>
            <div class="bg-white shadow-lg rounded-lg p-4">
                <table class="w-full text-left border-separate border-spacing-y-4">
                    <thead>
                        <tr class="bg-blue-700 text-black font-bold">
                            <th class="p-3">Image</th>
                            <th class="p-3">Name</th>
                            <th class="p-3">Class</th>
                            <th class="p-3">Code</th>
                            <th class="p-3">Brand</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Unit</th>
                            <th class="p-3">In Stock</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product A</td>
                            <td class="p-3">Electronics</td>
                            <td class="p-3">P12345</td>
                            <td class="p-3">Samsung</td>
                            <td class="p-3 text-green-600">Rs.5000</td>
                            <td class="p-3">5 Piece</td>
                            <td class="p-3 text-blue-500">Available</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>

                                </button>
                            </td>
                        </tr>

                        
                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product B</td>
                            <td class="p-3">Clothing</td>
                            <td class="p-3">P67890</td>
                            <td class="p-3">Nike</td>
                            <td class="p-3 text-green-600">Rs.8000</td>
                            <td class="p-3">1 Pair</td>
                            <td class="p-3 text-blue-500">Out of Stock</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product C</td>
                            <td class="p-3">Electronics</td>
                            <td class="p-3">P45674</td>
                            <td class="p-3">Sony</td>
                            <td class="p-3 text-green-600">Rs.12000</td>
                            <td class="p-3">19 Piece</td>
                            <td class="p-3 text-blue-500">Out of Stock</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>


                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product D</td>
                            <td class="p-3">Electronics</td>
                            <td class="p-3">P78650</td>
                            <td class="p-3">Apple</td>
                            <td class="p-3 text-green-600">Rs.6000</td>
                            <td class="p-3">25 Piece</td>
                            <td class="p-3 text-blue-500">Out of Stock</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product E</td>
                            <td class="p-3">Clothing</td>
                            <td class="p-3">P45329</td>
                            <td class="p-3">Adidas</td>
                            <td class="p-3 text-green-600">Rs.1500</td>
                            <td class="p-3">5 Pair</td>
                            <td class="p-3 text-blue-500">Available</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product F</td>
                            <td class="p-3">Clothing</td>
                            <td class="p-3">P98754</td>
                            <td class="p-3">Puma</td>
                            <td class="p-3 text-green-600">Rs.8700</td>
                            <td class="p-3">12 Pair</td>
                            <td class="p-3 text-blue-500">Available</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product G</td>
                            <td class="p-3">Electronics</td>
                            <td class="p-3">P12345</td>
                            <td class="p-3">OnePlus</td>
                            <td class="p-3 text-green-600">Rs.12000</td>
                            <td class="p-3">10 Piece</td>
                            <td class="p-3 text-blue-500">Available</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="p-4"><img src="https://via.placeholder.com/50" alt="Product Image" class="rounded"></td>
                            <td class="p-3">Product H</td>
                            <td class="p-3">Electronics</td>
                            <td class="p-3">P12345</td>
                            <td class="p-3">Samsung</td>
                            <td class="p-3 text-green-600">Rs.10000</td>
                            <td class="p-3">15 Piece</td>
                            <td class="p-3 text-blue-500">Available</td>
                            <td class="p-3">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600">
                                <i class="fas fa-edit"></i>
                                </button>
                                <button class="bg-red-500 text-black px-3 py-1 rounded shadow hover:bg-red-600">
                                <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>



       

     

       

     


       

     

       

     
