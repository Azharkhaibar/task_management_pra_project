@extends('dashboard.app')

@section('content')
    <div class="flex flex-col sm:flex-row items-center justify-between mb-6">
        <h1 class="text-2xl sm:text-4xl font-bold text-gray-800 dark:text-white text-center sm:text-left">Edit Proyek</h1>
        <a href="{{ route('dashboard.tugas.tugas') }}"
            class="flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200 mt-4 sm:mt-0">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <form action="{{ route('dashboard.tugas.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xl p-4 sm:p-8 space-y-6">
            <div>
                <label for="projectname" class="block text-sm sm:text-lg font-semibold text-gray-800 dark:text-white mb-2">Nama Proyek</label>
                <input type="text" id="projectname" name="projectname"
                    class="w-full px-4 py-2 sm:px-6 sm:py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    value="{{ old('projectname', $project->projectname) }}" required>
            </div>
            <div>
                <label for="description" class="block text-sm sm:text-lg font-semibold text-gray-800 dark:text-white mb-2">Deskripsi Proyek</label>
                <textarea id="description" name="description[]"
                    class="w-full px-4 py-2 sm:px-6 sm:py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    required>{{ old('description', $project->description) }}</textarea>
            </div>
            <div>
                <label for="kategori_tugas" class="block text-sm sm:text-lg font-semibold text-gray-800 dark:text-white mb-2">Kategori Tugas</label>
                <select name="kategori_tugas" id="kategori_tugas"
                    class="w-full px-4 py-2 sm:px-6 sm:py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    <option value="web" {{ old('kategori_tugas', $project->kategori_tugas) == 'web' ? 'selected' : '' }}>Web</option>
                    <option value="design" {{ old('kategori_tugas', $project->kategori_tugas) == 'design' ? 'selected' : '' }}>Design</option>
                    <option value="maintance" {{ old('kategori_tugas', $project->kategori_tugas) == 'maintance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <div class="space-y-6">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-white">Tugas</h3>
                @foreach ($tasks as $index => $task)
                    <div class="space-y-4 p-4 sm:p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-md">
                        <div>
                            <label for="taskname_{{ $index }}" class="block text-sm sm:text-lg font-semibold text-gray-800 dark:text-white mb-2">Nama Tugas</label>
                            <input type="text" name="taskname[]" id="taskname_{{ $index }}"
                                class="w-full px-4 py-2 sm:px-6 sm:py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                value="{{ old('taskname.' . $index, $task->taskname) }}" required>
                        </div>
                        <div>
                            <label for="taskdescription_{{ $index }}" class="block text-sm sm:text-lg font-semibold text-gray-800 dark:text-white mb-2">Deskripsi Tugas</label>
                            <textarea name="description[]" id="taskdescription_{{ $index }}"
                                class="w-full px-4 py-2 sm:px-6 sm:py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                required>{{ old('description.' . $index, $task->description) }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 sm:px-6 sm:py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Project
                </button>
            </div>
        </div>
    </form>
@endsection
