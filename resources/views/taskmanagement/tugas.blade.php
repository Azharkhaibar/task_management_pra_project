<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Fallback style */
        </style>
    @endif

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.13/dist/outline.min.js"></script>
</head>

<body class="antialiased font-sans bg-slate-900">
    <div>
        @include('components.navbar')

        <div class="w-full max-w-7xl mx-auto px-0 py-6">
            @if (!Auth::check())
                <div class="mt-28">
                    <img class="m-auto h-28" src="{{ url('/img/padlock.png')}}" alt="locked" />
                    <h2 class="text-slate-500 text-center text-3xl mt-10">Anda belum login. Silakan login untuk mengakses halaman tugas.</h2>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @forelse ($projects as $project)
                        <div
                            class="max-w-sm p-6 bg-transparent border border-gray-500 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">
                                    {{ $project->projectname }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-400 dark:text-gray-400">
                                {{ $project->description }}
                            </p>

                            <div class="mb-3">
                                @if ($project->status == 'belum dikerjakan')
                                    <span class="text-red-500 font-bold text-sm">Belum Dikerjakan</span>
                                @elseif ($project->status == 'sedang dikerjakan')
                                    <span class="text-yellow-500 font-bold text-sm">Sedang Dikerjakan</span>
                                @else
                                    <span class="text-green-500 font-bold text-sm">Selesai</span>
                                @endif
                            </div>

                            <a href="{{ route('taskmanagement.project.show', $project->id) }}">
                                <button
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                    Lihat detail tugas
                                </button>
                            </a>
                        </div>
                    @empty
                        <p class="text-center text-white col-span-3">Tidak ada proyek yang ditemukan.</p>
                    @endforelse
                </div>
            @endif

        </div>
    </div>
</body>

</html>
