<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Menggunakan Vite jika ada manifest atau hot reload -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Atau bisa tambahkan fallback style di sini */
        </style>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.13/dist/outline.min.js"></script>
</head>

<body class="antialiased font-sans bg-slate-900">
    <div class="mt-24">
        <!-- Form Login -->
        <form action="{{ route('login.dashboardstore') }}" method="POST" class="max-w-sm mx-auto p-8 bg-slate-700 rounded-md shadow-lg">
            @csrf
            <h2 class="text-white font-sans text-4xl font-bold mb-6">Login Admin</h2>

            @if(session('message'))
                <div class="mb-4 text-white bg-red-500 p-2 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                <input type="email" name="email" id="email" class="bg-transparent border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" placeholder="email@domain.com" required />
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
                <input type="password" name="password" id="password" class="bg-transparent border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required />
            </div>

            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" name="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-white">Remember me</label>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5">Submit</button>
            <h3 class="text-white mt-5 text-center">Don't have an account? <a href="{{ route('dashboard.register')}}" class="text-white">Register</a></h3>
        </form>
    </div>
</body>

</html>
