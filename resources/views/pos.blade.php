<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>POS</title>
</head>
<body class="bg-gray-100 p-4">
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1 bg-white p-4 rounded-lg shadow-md">
        <button class="flex items-center space-x-2 p-2 border rounded-lg w-full text-left">
    <i class="fas fa-user text-gray-500"></i>
    <span class="text-gray-500">Choose User</span>
</button>

            <div class="mt-4 border-t pt-4">
                <h3 class="text-gray-600 text-lg">PRODUCT</h3>
                <p class="text-gray-400 text-center mt-4">No Data Available</p>
            </div>
            <div class="mt-4">
                <h4 class="text-gray-600">Discount</h4>
                <div class="flex items-center space-x-2 mt-2">
                    <input type="radio" name="discount" class="text-blue-500" checked> <span>Fixed</span>
                    <input type="radio" name="discount" class="text-blue-500"> <span>Percentage</span>
                </div>
                <input type="text" placeholder="Discount ₹" class="w-full border rounded-lg p-2 mt-2">
            </div>
            <div class="mt-4 text-gray-700">
    <p>Total QTY: <span class="float-right">0</span></p>
    <p>Sub Total: <span class="float-right">₹ 0.00</span></p>
    <h3 class="font-bold text-lg mt-2">Total: ₹ 0.00</h3>
    <button class="w-full bg-green-500 text-white py-2 mt-4 rounded-lg hover:bg-green-600 transition">
        <i class="fas fa-credit-card mr-2"></i> Pay Now
    </button>
</div>

        </div>
        
      
        <div class="col-span-3 bg-white p-4 rounded-lg shadow-md">
    <div class="flex items-center space-x-2 mb-4">
        <div class="relative w-full">
            <input type="text" placeholder="Search Product by Code Name" class="w-full border rounded-lg p-2 pl-10">
            <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
        </div>
        <button class="bg-pink-500 text-white p-2 rounded-lg">
            <i class="fas fa-list"></i>
        </button>
        <button class="bg-green-500 text-white p-2 rounded-lg">
            <i class="fas fa-shopping-cart"></i>
        </button>
    </div>
            <div class="flex flex-wrap gap-2 mb-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">All Categories</button>
                <button class="bg-gray-200 px-4 py-2 rounded-lg">Electronics</button>
                <button class="bg-gray-200 px-4 py-2 rounded-lg">Clothing</button>
           
            </div>
            <div class="grid grid-cols-4 gap-6">
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="nike.jpg" alt="Nike Shoes" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 1000.00</span>
        <p class="text-gray-600 text-sm">Nike</p>
        <p class="text-gray-400 text-xs">123346</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="tv.jpg" alt="T.V" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 20000.00</span>
        <p class="text-gray-600 text-sm">T.V</p>
        <p class="text-gray-400 text-xs">898670</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="smartphone.jpg" alt="Smartphone" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 25000.00</span>
        <p class="text-gray-600 text-sm">Smartphone</p>
        <p class="text-gray-400 text-xs">654980</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="adidas.jpg" alt="Adidas Shoes" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 1800.00</span>
        <p class="text-gray-600 text-sm">Adidas</p>
        <p class="text-gray-400 text-xs">615687</p>
    </div>
</div>

<div class="grid grid-cols-4 gap-6 mt-6">
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="puma-shoes.jpg" alt="Puma Shoes" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 3000.00</span>
        <p class="text-gray-600 text-sm">Puma Shoes</p>
        <p class="text-gray-400 text-xs">984321</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="watch.jpg" alt="Watch" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 750.00</span>
        <p class="text-gray-600 text-sm">Watch</p>
        <p class="text-gray-400 text-xs">741852</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="headphones.jpg" alt="Headphones" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 4200.00</span>
        <p class="text-gray-600 text-sm">Headphones</p>
        <p class="text-gray-400 text-xs">369852</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="laptop.jpg" alt="Laptop" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 35000.00</span>
        <p class="text-gray-600 text-sm">Laptop</p>
        <p class="text-gray-400 text-xs">159357</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="bag.jpg" alt="Bag" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 35000.00</span>
        <p class="text-gray-600 text-sm">Bag</p>
        <p class="text-gray-400 text-xs">456789</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="refrigerator.jpg" alt="Refrigerator" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 78000.00</span>
        <p class="text-gray-600 text-sm">Refrigerator</p>
        <p class="text-gray-400 text-xs">159787</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="shirt.jpg" alt="Shirt" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 25000.00</span>
        <p class="text-gray-600 text-sm">Shirt</p>
        <p class="text-gray-400 text-xs">199357</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="oven.jpg" alt="Oven" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 55000.00</span>
        <p class="text-gray-600 text-sm">Oven</p>
        <p class="text-gray-400 text-xs">159357</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="product1.jpg" alt="Product1" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 2000.00</span>
        <p class="text-gray-600 text-sm">Product1</p>
        <p class="text-gray-400 text-xs">145357</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="product2.jpg" alt="Product2" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 5000.00</span>
        <p class="text-gray-600 text-sm">Product2</p>
        <p class="text-gray-400 text-xs">190357</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="product3.jpg" alt="Product3" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 900.00</span>
        <p class="text-gray-600 text-sm">Product3</p>
        <p class="text-gray-400 text-xs">298397</p>
    </div>
    <div class="border p-3 rounded-lg text-center shadow-md bg-white">
        <img src="product4.jpg" alt="Product4" class="w-20 h-20 mx-auto mb-2">
        <span class="bg-blue-500 text-white px-2 py-1 text-sm rounded-full">₹ 4500.00</span>
        <p class="text-gray-600 text-sm">Product4</p>
        <p class="text-gray-400 text-xs">232397</p>
    </div>
</div>


            </div>
        </div>
    </div>
    
</body>
</html>