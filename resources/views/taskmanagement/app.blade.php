<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style></style>
    @endif
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="antialiased bg-slate-900 text-white font-sans">
    <!-- Navbar -->
    <div class="w-full py-4 ">
        @include('components.navbar')
    </div>

    <section class="relative w-full h-[50vh] flex flex-col justify-center items-center bg-slate-900 px-4 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold leading-tight">Management Task Website</h1>
    </section>

    <section class="w-full bg-slate-800 py-12 px-4">
        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-center mb-6">Fitur Aplikasi Manajemen Tugas Kami
        </h2>
        <div id="accordion-collapse" data-accordion="collapse"
            class="max-w-3xl mx-auto bg-slate-700 rounded-lg shadow-md">
            <div class="border-b border-slate-600">
                <h2 id="accordion-authentication">
                    <button type="button"
                        class="flex items-center justify-between w-full px-4 py-3 sm:px-6 sm:py-4 text-sm sm:text-base font-medium hover:bg-slate-600"
                        data-accordion-target="#authentication-content" aria-expanded="false"
                        aria-controls="authentication-content">
                        <span>Otentikasi</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </h2>
                <div id="authentication-content" class="hidden" aria-labelledby="accordion-authentication">
                    <div class="px-4 sm:px-6 py-3 text-sm sm:text-base text-gray-300">
                        Fitur ini memastikan hanya pengguna yang terdaftar yang bisa mengakses aplikasi. Keamanan data
                        sangat dijaga, dan semua data pribadi dilindungi dengan sistem enkripsi yang canggih.
                    </div>
                </div>
            </div>
            <div class="border-b border-slate-600">
                <h2 id="accordion-dashboard">
                    <button type="button"
                        class="flex items-center justify-between w-full px-4 py-3 sm:px-6 sm:py-4 text-sm sm:text-base font-medium hover:bg-slate-600"
                        data-accordion-target="#dashboard-content" aria-expanded="false"
                        aria-controls="dashboard-content">
                        <span>Dashboard</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </h2>
                <div id="dashboard-content" class="hidden" aria-labelledby="accordion-dashboard">
                    <div class="px-4 sm:px-6 py-3 text-sm sm:text-base text-gray-300">
                        Dashboard ini membuat pengelolaan tugas jadi lebih mudah. Kamu bisa memantau progres tugas,
                        melihat siapa yang sedang mengerjakan apa, dan mengatur prioritas tugas yang perlu diselesaikan.
                    </div>
                </div>
            </div>
            <div>
                <h2 id="accordion-database">
                    <button type="button"
                        class="flex items-center justify-between w-full px-4 py-3 sm:px-6 sm:py-4 text-sm sm:text-base font-medium hover:bg-slate-600"
                        data-accordion-target="#database-content" aria-expanded="false"
                        aria-controls="database-content">
                        <span>Integrasi Database</span>
                        <svg data-accordion-icon class="w-5 h-5 shrink-0 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </h2>
                <div id="database-content" class="hidden" aria-labelledby="accordion-database">
                    <div class="px-4 sm:px-6 py-3 text-sm sm:text-base text-gray-300">
                        Aplikasi ini terhubung dengan database yang dirancang untuk menangani data dalam jumlah besar
                        dengan cepat. Kamu bisa dengan mudah mengakses data yang dibutuhkan tanpa menunggu lama.
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="w-full">
        @include('components.footer')
    </div>
</body>

</html>
