<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tugas;

class tugasController extends Controller
{
    public function ViewTugasDashboard() {
        return view('dashboard.tugas.tugas');
    }

    public function ViewTambahTugas() {
        return view('dashboard.tugas.tambah');
    }

    public function ViewAndStoreProject(Request $request) {
    // Validasi input
    $request->validate([
        'projectname' => 'required|string',
        'description' => 'required|string',
        'kategori_tugas' => 'nullable|in:web,design,maintance',
        'taskname' => 'required|array',
        'taskname.*' => 'required|string',
        'description' => 'required|array', // Deskripsi tugas
        'description.*' => 'required|string',
    ]);

    // Gabungkan semua deskripsi tugas menjadi satu string
    $combinedDescription = implode(", ", $request->description);  // Gabungkan deskripsi tugas menjadi string

    // Menyimpan data ke tabel project
    $project = Project::create([
        'projectname' => $request->projectname,
        'description' => $combinedDescription,  // Pastikan disini adalah string
        'kategori_tugas' => $request->kategori_tugas,
        'status' => 'belum dikerjakan',  // Ganti 'active' dengan salah satu nilai enum yang valid
    ]);

    // Menyimpan tugas-tugas terkait ke tabel tugas
    foreach ($request->taskname as $key => $taskname) {
        Tugas::create([
            'project_id' => $project->id,
            'taskname' => $taskname,
            'description' => $request->description[$key], // Mengambil deskripsi untuk setiap tugas
        ]);
    }

    return redirect()->route('dashboard.tugas.tambah')->with('success', 'Anda berhasil mengupload tugas');
}






}
