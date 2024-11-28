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
                    <img class="m-auto h-28" src="{{ url('/img/padlock.png') }}" alt="locked" />
                    <h2 class="text-slate-500 text-center text-3xl mt-10">Anda belum login. Silakan login untuk
                        mengakses halaman tugas.</h2>
                </div>
            @else
                <div class="w-full p-4 flex items-center bg-slate-950 rounded-md">
                    <form class="flex gap-4 items-center" method="GET" action="{{ route('taskmanagement.tugas') }}">
                        <label for="kategori_tugas" class="text-sm font-medium text-slate-700">
                            <select id="kategori_tugas" name="kategori_tugas"
                                class="p-2 border border-slate-400 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Kategori</option>
                                <option value="all" {{ request('kategori_tugas') == 'all' ? 'selected' : '' }}>Semua
                                </option>
                                <option value="web" {{ request('kategori_tugas') == 'web' ? 'selected' : '' }}>Web
                                </option>
                                <option value="design" {{ request('kategori_tugas') == 'design' ? 'selected' : '' }}>
                                    Design</option>
                                <option value="maintance"
                                    {{ request('kategori_tugas') == 'maintance' ? 'selected' : '' }}>Maintance</option>
                            </select>
                        </label>
                        <label for="status" class="text-sm font-medium text-slate-700">
                            <select id="status" name="status"
                                class="p-2 border border-slate-400 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Status</option>
                                <option value="belum dikerjakan"
                                    {{ request('status') == 'belum dikerjakan' ? 'selected' : '' }}>Belum
                                    Dikerjakan</option>
                                <option value="sedang dikerjakan"
                                    {{ request('status') == 'sedang dikerjakan' ? 'selected' : '' }}>Sedang
                                    Dikerjakan</option>
                                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </label>

                        <button type="submit"
                            class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                            Filter
                        </button>
                    </form>
                </div>

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
                                    detail tugas
                                </button>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center w-full h-80 mx-auto mt-20">
                            <img src="{{ asset('img/empty-box.png') }}" class="h-32 mb-6" alt="No Projects Found" />
                            <p class="text-center text-gray-500 text-lg">Project Atau Tugas belum ada.</p>
                        </div>
                    @endforelse
                </div>
            @endif

        </div>
    </div>
</body>

</html>
