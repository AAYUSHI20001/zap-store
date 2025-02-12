<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Zap Store</title>
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
        <h1 class="text-2xl font-bold">Zap Store -  Products</h1>
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
        <div class="container mx-auto p-8 flex flex-col items-left">
    <div class="mt-6">
        <h2 class="text-2xl font-bold mb-6 text-blue-700">Add New Product</h2>
    </div>

    <div class="grid grid-cols-2 gap-6 justify-center">
        
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-center">
            <h3 class="text-lg font-semibold mb-4">Product Image</h3>
            <div class="border-2 border-dashed p-4 flex flex-col items-center">
                <img id="productImage" src="https://via.placeholder.com/150" alt="Product Image" class="rounded-md mb-4">
                <input type="file" id="uploadImage" class="hidden">
                <button onclick="document.getElementById('uploadImage').click();" class="bg-blue-500 text-white px-4 py-2 rounded">Upload Image</button>
            </div>
        </div>

      
        <div class="bg-white p-6 shadow-lg rounded-lg">
    <h3 class="text-lg font-semibold mb-4">General Information</h3>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700">Product Name</label>
            <input type="text" class="w-full p-2 border rounded" placeholder="Enter product name">
        </div>
        <div>
            <label class="block text-gray-700">Brand</label>
            <input type="text" class="w-full p-2 border rounded" placeholder="Enter brand name">
        </div>
        <div>
            <label class="block text-gray-700">Product Type</label>
            <select class="w-full p-2 border rounded">
                <option>Select type</option>
                <option>Electronic</option>
                <option>Clothing</option>
                
            </select>
        </div>
        <div>
            <label class="block text-gray-700">Category</label>
            <select class="w-full p-2 border rounded">
                <option>Select category</option>
                <option>Mobiles</option>
                <option>Laptops</option>
                <option>Home Appliances</option>
                <option>Fashion</option>
                <option>Sports</option>
            </select>
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700">Description</label>
            <textarea class="w-full p-2 border rounded" rows="3" placeholder="Enter product description"></textarea>
        </div>
        <div>
            <label class="block text-gray-700">Price</label>
            <input type="text" class="w-full p-2 border rounded" placeholder="Enter price">
        </div>
        <div>
            <label class="block text-gray-700">Discount</label>
            <input type="text" class="w-full p-2 border rounded" placeholder="Enter discount %">
        </div>
        <div>
            <label class="block text-gray-700">Discount Price</label>
            <input type="text" class="w-full p-2 border rounded" placeholder="Auto-calculated">
        </div>
        <div>
            <label class="block text-gray-700">Tags</label>
            <input type="text" class="w-full p-2 border rounded" placeholder="e.g., trending, new">
        </div>
        <div>
            <label class="block text-gray-700">Availability</label>
            <select class="w-full p-2 border rounded">
                <option>In Stock</option>
                <option>Out of Stock</option>
                
            </select>
        </div>
    </div>
</div>

</body>
</html>
