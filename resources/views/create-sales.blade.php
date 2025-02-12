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
        <h1 class="text-2xl font-bold">Zap Store - Sales</h1>
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
        <h2 class="text-2xl font-bold mb-6 text-blue-700">Create Sale</h2>
        <div class="flex-1 bg-white shadow-lg rounded-lg p-6 m-4">
        <table class="w-full text-left border-separate border-spacing-y-4"></table>
            
            
            <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="relative">
<label class="form-label">Date:<span class="text-red-500">*</span></label>
<div class="flex items-center border border-gray-300 rounded-md px-3">
    <input type="date" class="input-field flex-1 border-none " required>
    <i class="fas fa-calendar-alt text-gray-500"></i>
</div>
</div>

                <div>
                    <label class="form-label">Customer:<span class="text-red-500">*</span></label>
                    <select class="input-field">
                        <option>Choose Customer</option>
                        
                      
                    </select>
                </div>

                </div>
            <div >
                <div>
                    <label class="form-label">Product:</label>
                    <input type="text" class="input-field" placeholder="Search Product By Code Name">
                </div>
                <div >
                <div>
                    <label class="form-label">Packages:<span class="text-red-500">*</span></label>
                    <input type="text" class="input-field" placeholder="Packages">
                </div>
                <div class="p-6 bg-white shadow-md rounded-lg">
<h2 class="text-lg font-semibold mb-2">Order Items:<span class="text-red-500">*</span></h2>


<div class="border border-gray-300 rounded-lg mb-4">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-2">PRODUCT</th>
                <th class="p-2">NET UNIT COST</th>
                <th class="p-2">STOCK</th>
                <th class="p-2">QTY</th>
                <th class="p-2">DISCOUNT</th>
                <th class="p-2">TAX</th>
                <th class="p-2">SUBTOTAL</th>
                <th class="p-2">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="8" class="text-center p-4 text-gray-500">No Data Available</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="flex justify-end mb-4">
    <div class="border border-gray-300 rounded-lg p-4 w-64">
        <p class="flex justify-between"><span>Order Tax:</span> <span>₹ 0.00 (0.00)%</span></p>
        <p class="flex justify-between"><span>Discount:</span> <span>₹ 0.00</span></p>
        <p class="flex justify-between"><span>Shipping:</span> <span>₹ 0.00</span></p>
        <p class="flex justify-between text-blue-600 font-semibold"><span>Grand Total:</span> <span>₹ 0.00</span></p>
    </div>
</div>


<div class="grid grid-cols-3 gap-4 mb-4">
    <div>
        <label class="block font-medium">Order Tax:</label>
        <div class="flex items-center">
            <input type="number" class="border rounded-l p-2 w-full" value="0.00">
            <span class="bg-gray-200 px-3 rounded-r">%</span>
        </div>
    </div>
    
    <div>
        <label class="block font-medium">Discount:</label>
        <div class="flex items-center">
            <input type="number" class="border rounded-l p-2 w-full" value="0.00">
            <span class="bg-gray-200 px-3 rounded-r">₹</span>
        </div>
    </div>

    <div>
        <label class="block font-medium">Shipping:</label>
        <div class="flex items-center">
            <input type="number" class="border rounded-l p-2 w-full" value="0.00">
            <span class="bg-gray-200 px-3 rounded-r">₹</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-3 gap-4 mb-4">
    <div>
        <label class="block font-medium">Status:<span class="text-red-500">*</span></label>
        <select class="border p-2 w-full rounded">
            <option>Received</option>
            <option>Pending</option>
            <option>Completed</option>
            <option>Cancelled</option>
        </select>
    </div>

    <div>
        <label class="block font-medium">Paid Status:</label>
        <select class="border p-2 w-full rounded">
            <option>Unpaid</option>
            <option>Paid</option>
           
        </select>
      
    </div>

    <div>
        <label class="block font-medium">Payment Type:</label>
        <select class="border p-2 w-full rounded">
            <option>Cash</option>
            <option>Partial Online</option>
            <option>Full Online</option>
            <option>Credit</option>
            <option>Cheque</option>
           
        </select>
    </div>
</div>

<div>
    <label class="block font-medium">Note:</label>
    <textarea class="border p-2 w-full rounded" placeholder="Enter Note"></textarea>
</div>
</div>

<form>
        
        <div class="flex justify-end space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600">Save</button>
        <button type="button" class="bg-gray-500 text-black px-6 py-2 rounded-lg shadow hover:bg-gray-600">Cancel</button>
    </div>
    </form>
               
