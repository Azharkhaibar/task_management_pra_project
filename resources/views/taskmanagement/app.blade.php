<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Figtree dari Bunny.net -->
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

    <!-- Menambahkan Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Heroicons -->
    <script src="https://unpkg.com/heroicons@2.0.13/dist/outline.min.js"></script>
</head>
<body class="antialiased bg-slate-900">
    <div>
        <!-- Pastikan navbar ada dan berfungsi -->
        @include('components.navbar')
            <div class=""></div>
            <h1 class="text-white text-7xl font-bold font-sans text-center pt-80">Management Task Website</h1>
        </div>
    </div>
</body>
</html>
