@extends('dashboard.app')

@section('title', 'Statistik')

@section('content')
    <div class="p-8 bg-slate-50">
        <h1 class="text-3xl font-semibold mb-8">Informasi</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ([
                ['label' => 'Total Pelajar', 'value' => $totalmember, 'color' => 'gray-800'],
                ['label' => 'Jumlah Proyek', 'value' => $totalproject, 'color' => 'gray-800'],
                ['label' => 'Total Tugas', 'value' => $totalTasks, 'color' => 'gray-800'],
            ] as $stat)
                <div class="bg-white shadow-sm rounded-lg p-8 border-2 border-gray-300 text-center">
                    <h2 class="text-lg font-medium text-gray-600 mb-4">{{ $stat['label'] }}</h2>
                    <p class="text-3xl font-semibold text-{{ $stat['color'] }}">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
            @foreach ([
                ['label' => 'Tugas Selesai', 'value' => $tasksCompleted, 'color' => 'green-500'],
                ['label' => 'Tugas Dalam Proses', 'value' => $tasksInProgress, 'color' => 'yellow-500'],
                ['label' => 'Tugas Belum Dikerjakan', 'value' => $tasksPending, 'color' => 'red-500'],
            ] as $stat)
                <div class="bg-white shadow-sm rounded-lg p-8 border-2 border-gray-300 text-center">
                    <h2 class="text-lg font-medium text-gray-600 mb-4">{{ $stat['label'] }}</h2>
                    <p class="text-3xl font-semibold text-{{ $stat['color'] }}">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-slate-50 mt-8 p-8">
        <h3 class="text-3xl font-semibold mb-8">Members</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach ([
                ['title' => 'Pelajar', 'total' => $totalmember, 'data' => $fetchallmember, 'columns' => ['Name', 'Instansi', 'Email']],
                ['title' => 'Admin', 'total' => $totaladmin, 'data' => $fetchalladmin, 'columns' => ['Name', 'Email']],
            ] as $table)
                <div class="bg-white shadow-sm rounded-lg p-8 border-2 border-gray-300">
                    <h3 class="text-xl font-semibold mb-6">{{ $table['title'] }}</h3>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ $table['total'] }}</h2>
                    <table class="min-w-full table-auto border-collapse border border-gray-300">
                        <thead class="bg-slate-200">
                            <tr>
                                <th class="border-b-2 border-gray-400 px-6 py-4 text-left text-sm font-medium text-gray-600">No</th>
                                @foreach ($table['columns'] as $column)
                                    <th class="border-b-2 border-gray-400 px-6 py-4 text-left text-sm font-medium text-gray-600">{{ $column }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            @foreach ($table['data'] as $index => $item)
                                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100 transition">
                                    <td class="border-b border-gray-300 px-6 py-4">{{ $index + 1 }}</td>
                                    @foreach ($table['columns'] as $column)
                                        <td class="border-b border-gray-300 px-6 py-4">{{ $item->{strtolower($column)} }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
