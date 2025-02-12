<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Sign In</h2>

        <form action="#" method="POST">
           
            <div class="mb-4">
                <label class="block text-gray-700">Username</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3 top-3 text-gray-500"></i>
                    <input type="text" class="pl-10 p-2 w-full border rounded focus:ring-2 focus:ring-blue-500" placeholder="Enter Username" required>
                </div>
            </div>

          
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-3 text-gray-500"></i>
                    <input type="password" class="pl-10 p-2 w-full border rounded focus:ring-2 focus:ring-blue-500" placeholder="Enter Password" required>
                </div>
            </div>

          
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-2 rounded-lg shadow-lg hover:from-blue-600 hover:to-purple-700 transition">
    Login
</button>

        </form>

       
        <div class="flex justify-between mt-4 text-sm">
            <a href="#" class="text-blue-500 hover:underline">Forgot Password?</a>
            <a href="#" class="text-blue-500 hover:underline">Sign Up</a>
        </div>
    </div>

</body>
</html>
