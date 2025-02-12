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
        <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6 text-blue-700">Create Product</h2>
        <div class="flex-1 bg-white shadow-lg rounded-lg p-6 m-4">

            <table class="w-full text-left border-separate border-spacing-y-4"></table>
            
            <form>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="form-label">Product Name:<span class="text-red-500">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter product name" required>
                    </div>
                    <div>
                        <label class="form-label">SKU (Barcode):<span class="text-red-500">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter Code" required>
                    </div>
                    <div>
                        <label class="form-label">Product Category:<span class="text-red-500">*</span></label>
                        <select class="input-field">
                            <option>Choose Category</option>
                            <option>Electronic</option>
                            <option>Clothing</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="form-label">Purchase Invoice Number:<span class="text-red-500">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter invoice number">
                    </div>
                    <div>
                        <label class="form-label">Class:</label>
                        <input type="text" class="input-field" placeholder="Enter class">
                    </div>
                    <div>
                        <label class="form-label">Brand:<span class="text-red-500">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter brand">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="form-label">Supplier:<span class="text-red-500">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter supplier">
                    </div>
                    <div   class="grid grid-cols-2 gap-3 mb-4">
                        <label class="form-label">Product Unit:<span class="text-red-500">*</span></label>
                        <input type="text" class="input-field" placeholder="Enter unit">
                    </div>
                    <div>
                        <label class="form-label">Quantity Limitation:</label>
                        <input type="number" class="input-field" placeholder="Enter quantity limit">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Note:</label>
                    <textarea class="input-field" rows="3" placeholder="Enter additional notes"></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label">Upload Images:</label>
                    <input type="file" class="input-field" multiple>
                </div>
               
                <form>
            
                <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600">Save</button>
                <button type="button" class="bg-gray-500 text-black px-6 py-2 rounded-lg shadow hover:bg-gray-600">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>

 



