<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zap Store - POS Dashboard</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
   
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 <style>
 
    .header {
        background: linear-gradient(135deg, #007bff, #6610f2);
        color: white;
        padding: 16px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        font-size: 1.8rem;
        font-weight: bold;
    }

  
</style>

</head>

<body class="bg-gray-100 text-gray-800">
   
    <header class="header">
    <h1>Zap Store - POS</h1>
   
</header>


    <div class="flex">
       
        <nav class="w-64 bg-gray-800 text-white min-h-screen p-4">
            <ul class="space-y-4">
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <a href="#" class="hover:text-blue-400">Dashboard</a>
                </li>
               
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-box-open mr-3"></i>
                    <a href="#" class="hover:text-blue-400">Products</a>
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
                    <a href="#" class="hover:text-blue-400">Settings</a>
                </li>
                <li class="font-semibold text-lg flex items-center">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <a href="#" class="hover:text-blue-400">Log Out</a>
                </li>
            </ul>
        </nav>

      
        <main class="flex-1 p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Dashboard Overview</h2>
        <div class="flex space-x-2 mb-4">
    <button class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 flex items-center">
        <i class="fas fa-plus-circle mr-1"></i> New Order
    </button>
    <button class="bg-green-500 text-blue  px-3 py-1 rounded-full shadow hover:bg-green-600 flex items-center">
        <i class="fas fa-cash-register mr-1"></i> POS
    </button>
</div>

    </div>


          
<section class="mb-6">
    <h3 class="text-xl font-bold mb-4">Sales Overview</h3>
    <div class="flex justify-between gap-6">
        <div class="flex-1 p-6 bg-white shadow-lg rounded-lg text-center border-t-4 border-green-500">
            <i class="fas fa-dollar-sign text-4xl text-green-500"></i>
            <h4 class="text-lg font-semibold text-gray-700 mt-2">Total Revenue</h4>
            <p class="text-3xl font-bold text-green-600 mt-2">$150,000</p>
        </div>
        <div class="flex-1 p-6 bg-white shadow-lg rounded-lg text-center border-t-4 border-blue-500">
            <i class="fas fa-shopping-cart text-4xl text-blue-500"></i>
            <h4 class="text-lg font-semibold text-gray-700 mt-2">Total Orders</h4>
            <p class="text-3xl font-bold text-blue-500 mt-2">12,345</p>
        </div>
        <div class="flex-1 p-6 bg-white shadow-lg rounded-lg text-center border-t-4 border-purple-500">
            <i class="fas fa-users text-4xl text-purple-500"></i>
            <h4 class="text-lg font-semibold text-gray-700 mt-2">Total Customers</h4>
            <p class="text-3xl font-bold text-purple-500 mt-2">8,765</p>
        </div>
        <div class="flex-1 p-6 bg-white shadow-lg rounded-lg text-center border-t-4 border-yellow-500">
            <i class="fas fa-chart-line text-4xl text-yellow-500"></i>
            <h4 class="text-lg font-semibold text-gray-700 mt-2">Customer Growth</h4>
            <p class="text-3xl font-bold text-yellow-500 mt-2">25%</p>
        </div>
    </div>
</section>


        
            <section class="mb-6">
                <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
                <div class="grid grid-cols-3 gap-6">
                    <button class="p-4 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition flex items-center justify-center">
                        <i class="fas fa-plus-circle text-2xl mr-2"></i> New Order
                    </button>
                    <button class="p-4 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-file-invoice text-2xl mr-2"></i> Generate Invoice
                    </button>
                    <button class="p-4 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition flex items-center justify-center">
                        <i class="fas fa-box text-2xl mr-2"></i> Manage Inventory
                    </button>
                </div>
            </section>

           
            <section>
                <h3 class="text-xl font-bold mb-4">Recent Transactions</h3>
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-3">Order ID</th>
                                <th class="p-3">Customer</th>
                                <th class="p-3">Amount</th>
                                <th class="p-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="p-3">#12345</td>
                                <td class="p-3">John Doe</td>
                                <td class="p-3 text-green-600">$250</td>
                                <td class="p-3 text-blue-500">Completed</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">#12346</td>
                                <td class="p-3">Jane Smith</td>
                                <td class="p-3 text-green-600">$150</td>
                                <td class="p-3 text-yellow-500">Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>


