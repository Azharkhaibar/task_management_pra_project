@extends('dashboard.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Tambah Proyek dan Tugas</h1>

<!-- Form Input Data Proyek -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <form action="{{route('dashboard.tugas.store')}}" method="POST" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label for="projectname" class="block text-sm font-medium text-gray-700">Nama Proyek</label>
            <input type="text" name="projectname" id="projectname"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan nama proyek" required>
        </div>
        <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Proyek</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan deskripsi proyek" required></textarea>
        </div>
        <div class="space-y-2">
            <label for="kategori_tugas" class="block text-sm font-medium text-gray-700">Kategori Tugas</label>
            <select name="kategori_tugas" id="kategori_tugas"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>Pilih kategori tugas</option>
                <option value="web">Web</option>
                <option value="design">Design</option>
                <option value="maintance">Maintenance</option>
            </select>
        </div>
        <div id="tugas-list" class="space-y-6">
            <label class="block text-sm font-medium text-gray-700">Tugas-Tugas Terkait</label>
            <div class="tugas-item bg-gray-50 p-6 rounded-lg border border-gray-300">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label for="taskname[]" class="block text-sm font-medium text-gray-700">Nama Tugas</label>
                        <input type="text" name="taskname[]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan nama tugas" required>
                    </div>
                    <div class="space-y-2">
                        <label for="description[]" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description[]" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan deskripsi tugas" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="button" id="add-tugas"
                class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none">
                Tambah Tugas
            </button>
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none">
                Simpan Proyek dan Tugas
            </button>
        </div>
    </form>
</div>

<!-- JavaScript untuk Tambah Tugas -->
<script>
    document.getElementById('add-tugas').addEventListener('click', function () {
        const tugasList = document.getElementById('tugas-list');
        const tugasItem = document.querySelector('.tugas-item').cloneNode(true);
        tugasList.appendChild(tugasItem);
    });
</script>
@endsection
