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
        // Tugas untuk Project 1 (Website E-Commerce)
        Tugas::create([
            'taskname' => 'Buat Halaman Utama',
            'description' => 'Membuat halaman utama dengan tampilan yang menarik.',
            'status' => 'sedang dikerjakan',
            'project_id' => 1, // ID Project 'Website E-Commerce'
        ]);

        Tugas::create([
            'taskname' => 'Integrasi Pembayaran',
            'description' => 'Menambahkan fitur pembayaran online menggunakan API gateway.',
            'status' => 'belum dikerjakan',
            'project_id' => 1, // ID Project 'Website E-Commerce'
        ]);

        // Tugas untuk Project 2 (Desain Logo)
        Tugas::create([
            'taskname' => 'Desain Draft Logo',
            'description' => 'Membuat draft desain logo untuk perusahaan.',
            'status' => 'belum dikerjakan',
            'project_id' => 2, // ID Project 'Desain Logo'
        ]);

        // Tugas untuk Project 3 (Pemeliharaan Server)
        Tugas::create([
            'taskname' => 'Backup Data',
            'description' => 'Melakukan backup data untuk mencegah kehilangan informasi.',
            'status' => 'selesai',
            'project_id' => 3, // ID Project 'Pemeliharaan Server'
        ]);
        Tugas::create([
            'taskname' => 'Desain UI Aplikasi',
            'description' => 'Mendesain antarmuka pengguna untuk aplikasi mobile.',
            'status' => 'belum dikerjakan',
            'project_id' => 4, // ID Project 'Pembuatan Aplikasi Mobile'
        ]);

        Tugas::create([
            'taskname' => 'Integrasi Fitur Pembayaran',
            'description' => 'Menambahkan fitur pembayaran dalam aplikasi mobile.',
            'status' => 'sedang dikerjakan',
            'project_id' => 4, // ID Project 'Pembuatan Aplikasi Mobile'
        ]);

        // Tugas untuk Project 5 (Perbaikan Bug Sistem)
        Tugas::create([
            'taskname' => 'Debugging Sistem Login',
            'description' => 'Memperbaiki bug pada sistem login pengguna.',
            'status' => 'belum dikerjakan',
            'project_id' => 5, // ID Project 'Perbaikan Bug Sistem'
        ]);

        Tugas::create([
            'taskname' => 'Testing Sistem',
            'description' => 'Melakukan pengujian sistem untuk menemukan bug lainnya.',
            'status' => 'belum dikerjakan',
            'project_id' => 5, // ID Project 'Perbaikan Bug Sistem'
        ]);
    }
}
