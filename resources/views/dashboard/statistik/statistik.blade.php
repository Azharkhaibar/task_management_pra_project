@extends('dashboard.app')

@section('title', 'Statistik')

@section('content')
    <div class="p-8 bg-slate-50">
        <h1 class="text-3xl font-semibold mb-8">Informasi</h1>

        <!-- Informasi Umum -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ([['label' => 'Total Pelajar', 'value' => $totalmember, 'color' => 'gray-800'],
                      ['label' => 'Jumlah Proyek', 'value' => $totalproject, 'color' => 'gray-800'],
                      ['label' => 'Total Tugas', 'value' => $totalTasks, 'color' => 'gray-800']] as $stat)
                <div class="bg-white shadow-sm rounded-lg p-6 border border-gray-300 text-center">
                    <h2 class="text-lg font-medium text-gray-600 mb-4">{{ $stat['label'] }}</h2>
                    <p class="text-3xl font-semibold text-{{ $stat['color'] }}">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Statistik Tugas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
            @foreach ([['label' => 'Tugas Selesai', 'value' => $tasksCompleted, 'color' => 'green-500'],
                      ['label' => 'Tugas Dalam Proses', 'value' => $tasksInProgress, 'color' => 'yellow-500'],
                      ['label' => 'Tugas Belum Dikerjakan', 'value' => $tasksPending, 'color' => 'red-500']] as $stat)
                <div class="bg-white shadow-sm rounded-lg p-6 border border-gray-300 text-center">
                    <h2 class="text-lg font-medium text-gray-600 mb-4">{{ $stat['label'] }}</h2>
                    <p class="text-3xl font-semibold text-{{ $stat['color'] }}">{{ $stat['value'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-slate-50 mt-8 p-8">
        <h3 class="text-3xl font-semibold mb-8">Members</h3>

        <!-- Tabel Members -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ([['title' => 'Pelajar', 'total' => $totalmember, 'data' => $fetchallmember, 'columns' => ['Name', 'Instansi', 'Email']],
                      ['title' => 'Admin', 'total' => $totaladmin, 'data' => $fetchalladmin, 'columns' => ['Name', 'Email']]] as $table)
                <div class="bg-white shadow-sm rounded-lg p-6 border border-gray-300">
                    <h3 class="text-xl font-semibold mb-4">{{ $table['title'] }}</h3>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ $table['total'] }}</h2>

                    <!-- Tabel untuk Desktop -->
                    <div class="hidden md:block">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-slate-200">
                                <tr>
                                    <th class="border-b-2 border-gray-400 px-4 py-2 text-left text-sm font-medium text-gray-600">No</th>
                                    @foreach ($table['columns'] as $column)
                                        <th class="border-b-2 border-gray-400 px-4 py-2 text-left text-sm font-medium text-gray-600">{{ $column }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-700">
                                @foreach ($table['data'] as $index => $item)
                                    <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100 transition">
                                        <td class="border-b border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                        @foreach ($table['columns'] as $column)
                                            <td class="border-b border-gray-300 px-4 py-2">{{ $item->{strtolower($column)} }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Kartu untuk Mobile -->
                    <div class="md:hidden space-y-4">
                        @foreach ($table['data'] as $index => $item)
                            <div class="bg-gray-50 border border-gray-300 rounded-lg shadow-sm p-4">
                                <h4 class="font-semibold text-gray-700 mb-2">#{{ $index + 1 }} {{ $item->name }}</h4>
                                @foreach ($table['columns'] as $column)
                                    <p class="text-sm text-gray-600"><strong>{{ $column }}:</strong> {{ $item->{strtolower($column)} }}</p>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
