<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->projectname }} - Project Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-slate-900">
    @include('components.navbar')

    <div class="w-full max-w-7xl mx-auto px-4 py-6">
        <h1 class="text-5xl font-extrabold text-white mt-7">{{ $project->projectname }}</h1>
        <p class="text-gray-400 mt-2">{{ $project->description }}</p>
        <p class="text-sm text-gray-500">
            <span class="font-medium">Created on:</span>
            {{ \Carbon\Carbon::parse($project->created_at)->format('l, F j, Y') }}
        </p>
        <!-- Menampilkan status project -->
        <div class="mb-4 mt-4">
            @if ($project->status == 'belum dikerjakan')
                <span class="text-red-500 font-bold text-sm">Belum Dikerjakan</span>
            @elseif ($project->status == 'sedang dikerjakan')
                <span class="text-yellow-500 font-bold text-sm">Sedang Dikerjakan</span>
            @else
                <span class="text-green-500 font-bold text-sm">Selesai</span>
            @endif
        </div>

        <form action="{{ route('project.updateStatus', $project->id) }}" method="POST" class="flex items-center gap-4">
            @csrf
            @method('PUT')
            <select name="status"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="belum dikerjakan" {{ $project->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum
                    Dikerjakan</option>
                <option value="sedang dikerjakan" {{ $project->status == 'sedang dikerjakan' ? 'selected' : '' }}>Sedang
                    Dikerjakan</option>
                <option value="selesai" {{ $project->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 flex items-center gap-2">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
            </button>

        </form>

        <!-- Related Tasks Section -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-white">Related Tasks</h2>
            @if ($project->tugas && $project->tugas->isNotEmpty())
                <div class="">
                    @foreach ($project->tugas as $task)
                        <div class="border-gray-200 shadow-lg dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-3 mt-5 text-5xl font-bold text-white dark:text-white">{{ $task->taskname }}
                            </h5>
                            <p class="text-white dark:text-gray-400 mb-4">{{ $task->description }}</p>
                            <form action="{{ route('task.uploadDocument', $task->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="document" class="block text-white font-medium text-sm mb-2">Upload
                                        Dokumen Bukti Pengumpulan</label>
                                    <div class="relative">
                                        <input type="file" name="document" id="document"
                                            class="block w-full text-sm text-gray-700 bg-gray-800 border border-gray-600 rounded-lg py-2 px-3 file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.6 4.4a3 3 0 0 0-4.2 0L4.5 6.9a3 3 0 0 0 0 4.2l3 3a3 3 0 0 0 4.2 0l2.9-2.9a3 3 0 0 0 0-4.2l-3-3zM10 5.8a1 1 0 0 1 1.4 1.4l-4.2 4.2a1 1 0 0 1-1.4-1.4l4.2-4.2z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>


                                @if ($task->document_path)
                                    <p class="text-green-500">Dokumen sudah diupload. <a
                                            href="{{ Storage::url($task->document_path) }}" target="_blank"
                                            class="text-blue-500">Lihat Dokumen</a></p>
                                @else
                                    <p class="text-red-500">Dokumen belum diupload.</p>
                                @endif

                                <!-- Tombol untuk mengupload dokumen -->
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 mt-2">
                                    Upload Dokumen
                                </button>
                            </form>

                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-red-500">Silahkan Confirm selesai Status Task</p>
                {{-- tambahkan lihat dokumen --}}
            @endif
        </div>
    </div>

</body>

</html>
