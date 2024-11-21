<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tugas;  // Pastikan Anda mengimpor model Tugas

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tugas::create([
            'taskname' => 'Buat Halaman Utama',
            'description' => 'Membuat halaman utama dengan tampilan yang menarik.',
            'status' => 'sedang dikerjakan',
            'project_id' => 1,
        ]);

        Tugas::create([
            'taskname' => 'Integrasi Pembayaran',
            'description' => 'Menambahkan fitur pembayaran online menggunakan API gateway.',
            'status' => 'belum dikerjakan',
            'project_id' => 1,
        ]);

        Tugas::create([
            'taskname' => 'Desain Draft Logo',
            'description' => 'Membuat draft desain logo untuk perusahaan.',
            'status' => 'belum dikerjakan',
            'project_id' => 2,
        ]);

        Tugas::create([
            'taskname' => 'Backup Data',
            'description' => 'Melakukan backup data untuk mencegah kehilangan informasi.',
            'status' => 'selesai',
            'project_id' => 3,
        ]);
        Tugas::create([
            'taskname' => 'Desain UI Aplikasi',
            'description' => 'Mendesain antarmuka pengguna untuk aplikasi mobile.',
            'status' => 'belum dikerjakan',
            'project_id' => 4,
        ]);

        Tugas::create([
            'taskname' => 'Integrasi Fitur Pembayaran',
            'description' => 'Menambahkan fitur pembayaran dalam aplikasi mobile.',
            'status' => 'sedang dikerjakan',
            'project_id' => 4,
        ]);


        Tugas::create([
            'taskname' => 'Debugging Sistem Login',
            'description' => 'Memperbaiki bug pada sistem login pengguna.',
            'status' => 'belum dikerjakan',
            'project_id' => 5, 
        ]);

        Tugas::create([
            'taskname' => 'Testing Sistem',
            'description' => 'Melakukan pengujian sistem untuk menemukan bug lainnya.',
            'status' => 'belum dikerjakan',
            'project_id' => 5, 
        ]);
    }
}
