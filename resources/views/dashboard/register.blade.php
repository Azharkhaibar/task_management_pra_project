<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.13/dist/outline.min.js"></script>
</head>

<body class="bg-slate-900 flex items-center justify-center min-h-screen">
    <div class="bg-slate-800 p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Admin Register</h2>

        <form action="{{ route('register.dashboard') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 bg-slate-700 border border-slate-600 text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                    placeholder="Enter your name" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 bg-slate-700 border border-slate-600 text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                    placeholder="Enter your email" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 bg-slate-700 border border-slate-600 text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                    placeholder="Enter your password" required>
            </div>

            <button type="submit"
                class="w-full py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Register
            </button>
        </form>

        <p class="text-center text-gray-400 mt-4">
            Already have an account? <a href="/login" class="text-indigo-400 hover:text-indigo-500 hover:underline">Login</a>
        </p>
    </div>
</body>

</html>
