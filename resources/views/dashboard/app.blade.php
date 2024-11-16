<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Management</title>
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
</head>

<body class="antialiased font-sans bg-gray-100">
    <div class="h-screen flex flex-col">
        @include('components.dashboardnavbar')

        <div class="flex flex-1">
            <!-- Sidebar -->
            <div class="w-1/6 bg-slate-900 text-white flex flex-col">
                <div class="p-4 text-xl font-semibold text-center border-b border-slate-700">
                    Dashboard
                </div>
                <nav class="flex-1 p-4 space-y-4">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.statistik') }}"
                                class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                                Statistik
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.member') }}"
                                class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                                Pelajar
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.tugas') }}"
                                class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                                Tugas
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                                Settings
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex-1 p-8">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
