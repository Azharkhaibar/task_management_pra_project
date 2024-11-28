@extends('dashboard.app')

@section('title', 'Statistik')

@section('content')
    <div class="p-5 bg-slate-50">
        <h1 class="text-2xl font-semibold mb-6">Statistik</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ([
                ['label' => 'Total Pelajar', 'value' => $totalmember, 'color' => 'gray-800'],
                ['label' => 'Jumlah Proyek', 'value' => $totalproject, 'color' => 'gray-800'],
                ['label' => 'Total Tugas', 'value' => $totalTasks, 'color' => 'gray-800'],
            ] as $stat)
                <div class="bg-white shadow rounded p-4 text-center">
                    <h2 class="text-lg font-medium text-gray-600 mb-2">{{ $stat['label'] }}</h2>
                    <p class="text-2xl font-semibold text-{{ $stat['color'] }}">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @foreach ([
                ['label' => 'Tugas Selesai', 'value' => $tasksCompleted, 'color' => 'green-500'],
                ['label' => 'Tugas Dalam Proses', 'value' => $tasksInProgress, 'color' => 'yellow-500'],
                ['label' => 'Tugas Belum Dikerjakan', 'value' => $tasksPending, 'color' => 'red-500'],
            ] as $stat)
                <div class="bg-white shadow rounded p-4 text-center">
                    <h2 class="text-lg font-medium text-gray-600 mb-2">{{ $stat['label'] }}</h2>
                    <p class="text-2xl font-semibold text-{{ $stat['color'] }}">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-slate-50 mt-7 p-3">
        <h3 class="text-2xl font-semibold mb-6">Members</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach ([
                ['title' => 'Pelajar', 'total' => $totalmember, 'data' => $fetchallmember, 'columns' => ['Name', 'Instansi', 'Email']],
                ['title' => 'Admin', 'total' => $totaladmin, 'data' => $fetchalladmin, 'columns' => ['Name', 'Email']],
            ] as $table)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-4">{{ $table['title'] }}</h3>
                    <h2 class="text-3xl font-bold mb-4">{{ $table['total'] }}</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                @foreach ($table['columns'] as $column)
                                    <th class="border border-gray-300 px-4 py-2 text-left">{{ $column }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table['data'] as $index => $item)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    @foreach ($table['columns'] as $column)
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->{strtolower($column)} }}</td>
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
