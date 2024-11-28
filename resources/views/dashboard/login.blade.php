<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

<body class="bg-slate-900 flex items-center justify-center min-h-screen antialiased font-sans">
    <div class="bg-slate-800 p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Admin Login</h2>

        @if (session('success'))
            <div class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded-md shadow-md z-50">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded-md shadow-md z-50">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.dashboardstore') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Your email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 bg-slate-700 border border-slate-600 text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    placeholder="email@domain.com" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Your password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 bg-slate-700 border border-slate-600 text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    required>
            </div>

            <div class="flex items-center">
                <input id="remember" type="checkbox" name="remember"
                    class="w-4 h-4 text-indigo-600 bg-gray-700 border-gray-600 rounded focus:ring-indigo-500">
                <label for="remember" class="ml-2 text-sm text-gray-300">Remember me</label>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Submit
            </button>
        </form>

        <p class="text-center text-gray-400 mt-4">
            Don't have an account? <a href="{{ route('dashboard.register') }}" class="text-indigo-400 hover:underline">Register</a>
        </p>
    </div>
</body>

</html>
