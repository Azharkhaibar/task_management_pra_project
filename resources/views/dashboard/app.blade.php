<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Management</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased font-sans bg-gray-100">
    <div class="h-screen flex flex-col">
        @include('components.dashboardnavbar')

        <div class="flex flex-1">
            <div class="w-1/6 bg-slate-900 text-white flex flex-col">
                <div class="p-4 text-xl font-semibold text-center border-b border-slate-700">
                    Menu
                </div>
                <nav class="flex-1 p-4 space-y-4">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard.statistik') }}"
                                class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                                Informasi
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
                @hasSection('content')
                    @yield('content')
                @else
                    <div class="bg-slate-800 text-white p-8 rounded-lg shadow-lg text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-16 h-16 text-blue-300" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M2 10a8 8 0 1116 0A8 8 0 012 10zm10 0a2 2 0 10-4 0 2 2 0 004 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <h1 class="text-3xl font-semibold mb-2">Welcome to Dashboard Management Task!</h1>
                        <h3 class="text-lg font-medium text-blue-200 mb-6">Created by Azhar as a result task to Ka Nurul</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
