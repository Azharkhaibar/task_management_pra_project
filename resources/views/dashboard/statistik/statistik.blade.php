@extends('dashboard.app')

@section('title', 'Statistik')

@section('content')
    <div class="p-5 bg-slate-50">
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
    </div>

    <div class="bg-slate-50 mt-7 p-3">
        <h3 class="text-2xl font-semibold rounded rounded-md">Members</h3>
        <div class="flex items-center gap-10 mt-3">
            <!-- Pelajar -->
            <div class="w-1/2 bg-slate-300 p-3 rounded-md mt-0">
                <h3 class="text-lg font-semibold">Pelajar</h3>
                <h2 class="text-3xl font-bold">{{ $totalmember }}</h2>
                <div class="bg-white shadow-md rounded-lg p-4 mt-7">
                    <h2 class="text-lg font-medium mb-4">Daftar Pelajar</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-slate-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Instansi</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fetchallmember as $index => $fetchmember)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $fetchmember->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $fetchmember->instansi }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $fetchmember->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Admin -->
            <div class="w-1/2 bg-slate-300 p-3 rounded-md mt-0">
                <h3 class="text-lg font-semibold">Admin</h3>
                <h2 class="text-3xl font-bold">{{ $totaladmin }}</h2>
                <div class="bg-white shadow-md rounded-lg p-4 mt-7">
                    <h2 class="text-lg font-medium mb-4">Daftar Admin</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-slate-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fetchalladmin as $index => $fetchadmin)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $fetchadmin->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $fetchadmin->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
