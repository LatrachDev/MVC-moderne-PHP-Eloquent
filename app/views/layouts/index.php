<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="text-center">
        <h1 class="text-5xl font-bold text-gray-800 mb-8">Hello!</h1>
        <p class="text-xl text-gray-600 mb-8">Welcome to our application</p>
        
        <div class="space-x-4">
            <a href="/login" 
               class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">
                Login
            </a>
            <a href="/signup" 
               class="inline-block px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition duration-200">
                Sign Up
            </a>
        </div>
    </div>
</body>
</html>