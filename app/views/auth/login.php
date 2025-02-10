<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="POST" class="space-y-4">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    minlength="6" 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200"
                >
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="mr-2 h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring focus:ring-blue-200"
                    >
                    <label for="remember" class="text-sm text-gray-600">Remember me</label>
                </div>
                <a href="#" class="text-sm text-blue-500 hover:text-blue-600">Forgot Password?</a>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200"
            >
                Sign In
            </button>
        </form>

        <p class="text-center mt-6 text-sm text-gray-600">
            Don't have an account? 
            <a href="signup" class="text-blue-500 hover:text-blue-600">Sign up</a>
        </p>
    </div>
</body>
</html>