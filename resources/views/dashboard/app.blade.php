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
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</head>

<body class="antialiased font-sans bg-gray-100">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Navbar -->
        <header class="bg-slate-900 text-white p-4 flex items-center justify-between lg:hidden">
            <h1 class="text-lg font-semibold">Dashboard Management</h1>
            <button onclick="toggleSidebar()" class="text-white focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </header>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-slate-900 text-white flex flex-col absolute lg:relative lg:translate-x-0 transform -translate-x-full lg:flex lg:w-1/6 transition-transform duration-300 ease-in-out">
            <div class="p-4 text-xl font-semibold text-center border-b border-slate-700">
                Dashboard Menu
            </div>
            <nav class="flex-1 p-4 space-y-4">
                <ul>
                    <li>
                        <a href="{{ route('dashboard.statistik') }}"
                            class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                            <i class="fas fa-chart-line mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.member') }}"
                            class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                            <i class="fas fa-user-graduate mr-2"></i> Pelajar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.tugas') }}"
                            class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                            <i class="fas fa-tasks mr-2"></i> Tugas
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block p-3 text-white hover:bg-slate-700 rounded-md transition-colors duration-200">
                            <i class="fas fa-cogs mr-2"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4">
                <form action="{{ route('dashboard.logout') }}" method="POST" class="text-center">
                    @csrf
                    <button type="submit"
                        class="w-full p-3 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors duration-200">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </aside>
        <main class="flex-1 p-8 lg:ml-0">
            @hasSection('content')
                @yield('content')
            @else
                <div class="bg-slate-800 text-white p-8 rounded-lg shadow-lg text-center">
                    <div class="flex justify-center mb-4">
                        <svg class="w-16 h-16 text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M2 10a8 8 0 1116 0A8 8 0 012 10zm10 0a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-semibold mb-2">Welcome to Dashboard Management Task!</h1>
                    <h3 class="text-lg font-medium text-blue-200 mb-6">Created by Azhar as a result task to Ka Nurul</h3>
                </div>
            @endif
        </main>
    </div>
</body>

</html>
