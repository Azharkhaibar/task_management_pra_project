@extends('dashboard.app')

@section('title', 'Statistik')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Statistik</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded p-4 text-center">
            <h2 class="text-lg font-medium text-gray-600 mb-2">Total Pelajar</h2>
            <p class="text-2xl font-semibold text-gray-800">{{ $totalmember }}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h2 class="text-lg font-medium text-gray-600 mb-2">Jumlah Proyek</h2>
            <p class="text-2xl font-semibold text-gray-800">{{ $totalproject }}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h2 class="text-lg font-medium text-gray-600 mb-2">Total Tugas</h2>
            <p class="text-2xl font-semibold text-gray-800">{{ $totalTasks }}</p>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white shadow rounded p-4 text-center">
            <h2 class="text-lg font-medium text-gray-600 mb-2">Tugas Selesai</h2>
            <p class="text-2xl font-semibold text-green-500">{{ $tasksCompleted }}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h2 class="text-lg font-medium text-gray-600 mb-2">Tugas Dalam Proses</h2>
            <p class="text-2xl font-semibold text-yellow-500">{{ $tasksInProgress }}</p>
        </div>
        <div class="bg-white shadow rounded p-4 text-center">
            <h2 class="text-lg font-medium text-gray-600 mb-2">Tugas Belum Dikerjakan</h2>
            <p class="text-2xl font-semibold text-red-500">{{ $tasksPending }}</p>
        </div>
    </div>
@endsection
