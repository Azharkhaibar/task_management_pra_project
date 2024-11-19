<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->projectname }} - Project Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-gray-900 text-gray-300">
    @include('components.navbar')

    <div class="w-full max-w-7xl mx-auto px-0 py-8">
        <h1 class="text-4xl font-extrabold text-white mb-4">{{ $project->projectname }}</h1>
        <p class="text-lg mb-4">{{ $project->description }}</p>
        <p class="text-sm text-gray-400 mb-6">
            <span class="font-medium">Created on:</span>
            {{ \Carbon\Carbon::parse($project->created_at)->format('l, F j, Y') }}
        </p>

        <div class="mb-6">
            @if ($project->status == 'belum dikerjakan')
                <span class="text-red-500 font-medium text-sm">Belum Dikerjakan</span>
            @elseif ($project->status == 'sedang dikerjakan')
                <span class="text-yellow-500 font-medium text-sm">Sedang Dikerjakan</span>
            @else
                <span class="text-green-500 font-medium text-sm">Selesai</span>
            @endif
        </div>

        <form action="{{ route('project.updateStatus', $project->id) }}" method="POST" class="flex items-center gap-4 mb-6">
            @csrf
            @method('PUT')
            <select name="status" class="py-2 px-4 text-sm font-medium text-gray-700 bg-gray-800 border border-gray-600 rounded-md focus:ring-2 focus:ring-blue-500">
                <option value="belum dikerjakan" {{ $project->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                <option value="sedang dikerjakan" {{ $project->status == 'sedang dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                <option value="selesai" {{ $project->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <button type="submit" class="py-2 px-6 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                Update
            </button>
        </form>

        <div>
            <h2 class="text-2xl font-semibold text-white mb-6">Related Tasks</h2>
            @if ($project->tugas && $project->tugas->isNotEmpty())
                <div class="space-y-6">
                    @foreach ($project->tugas as $task)
                        <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-md p-6">
                            <h5 class="text-3xl font-bold text-white">{{ $task->taskname }}</h5>
                            <p class="text-gray-400 mb-4">{{ $task->description }}</p>

                            <form action="{{ route('task.uploadDocument', $task->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                                @csrf
                                <label for="document" class="block text-sm font-medium text-white mb-2">Upload Document</label>
                                <div class="relative mb-4">
                                    <input type="file" name="document" id="document" class="w-full text-sm text-gray-700 bg-gray-800 border border-gray-600 rounded-md py-2 px-3 focus:ring-2 focus:ring-blue-500" {{ $task->document_path ? 'disabled' : '' }}>
                                </div>

                                @if ($task->document_path)
                                    <p class="text-green-500 mt-2">Dokumen sudah diupload. <a href="{{ Storage::url($task->document_path) }}" target="_blank" class="text-blue-500">Lihat Dokumen</a></p>
                                @else
                                    <p class="text-red-500 mt-2">Dokumen belum diupload.</p>
                                    <button type="submit" class="mt-4 py-2 px-6 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                        Upload Dokumen
                                    </button>
                                @endif
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-red-500">Silahkan konfirmasi status tugas terlebih dahulu.</p>
            @endif
        </div>
    </div>
</body>

</html>
