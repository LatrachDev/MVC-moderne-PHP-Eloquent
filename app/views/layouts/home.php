<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

    <header class="bg-white shadow-md py-4 px-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Welcome, <?php echo htmlspecialchars($user->name); ?> !</h1>
        <form action="/logout" method="post">
            <button type="submit">Logout</button>
        </form>
    </header>

    <main class="mx-auto p-6">
        
        <img 
            src="/assets/images/hello.jpg" 
            alt="Hello"
            class="w-4/12 mx-auto"
        >
        
    </main>

    <footer class="bg-white py-4 mt-6 text-center text-gray-600">
        &copy; 2025 YouCode Nador. All rights reserved.
    </footer>

</body>
</html>