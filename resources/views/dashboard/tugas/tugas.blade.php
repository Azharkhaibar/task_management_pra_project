@extends('dashboard.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Daftar Proyek</h1>
        <a href="{{ route('dashboard.tugas.tambah') }}"
            class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i> Tambah Tugas
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($allproject as $project)
            <div
                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow transition hover:shadow-lg">
                <div class="p-6">
                    <h5 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        {{ $project->projectname }}
                    </h5>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        {{ Str::limit($project->description, 100) }}
                    </p>

                    <div class="mb-4">
                        @if ($project->status == 'belum dikerjakan')
                            <span
                                class="inline-block px-2 py-1 text-xs font-medium text-red-600 bg-red-100 rounded dark:bg-red-800 dark:text-red-200">
                                Belum Dikerjakan
                            </span>
                        @elseif ($project->status == 'sedang dikerjakan')
                            <span
                                class="inline-block px-2 py-1 text-xs font-medium text-yellow-600 bg-yellow-100 rounded dark:bg-yellow-800 dark:text-yellow-200">
                                Sedang Dikerjakan
                            </span>
                        @else
                            <span
                                class="inline-block px-2 py-1 text-xs font-medium text-green-600 bg-green-100 rounded dark:bg-green-800 dark:text-green-200">
                                Selesai
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('dashboard.tugas.project_detail', ['id' => $project->id]) }}"
                            class="block text-center">
                            <button
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                Lihat Detail Tugas
                            </button>
                        </a>
                        <form method="POST" action="{{ route('dashboard.tugas.destroy', $project->id) }}"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center justify-center p-2 bg-red-500 hover:bg-red-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center w-96 h-96 ml-96">
                <img src="{{ url('img/empty-box.png') }}" class="w-44 h-44 mb-4" alt="Empty Box" />
                <p class="text-center text-gray-500 dark:text-gray-300">
                    Belum ada Proyek Bro
                </p>
            </div>
        @endforelse
    </div>
@endsection
