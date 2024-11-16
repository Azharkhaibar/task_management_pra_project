<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'projectname' => 'Website E-Commerce',
            'description' => 'Membangun sebuah website e-commerce untuk penjualan produk online.',
            'status' => 'sedang dikerjakan',
            'kategori_tugas' => 'web',
        ]);

        Project::create([
            'projectname' => 'Desain Logo',
            'description' => 'Mendesain logo untuk perusahaan baru.',
            'status' => 'belum dikerjakan',
            'kategori_tugas' => 'design',
        ]);

        Project::create([
            'projectname' => 'Pemeliharaan Server',
            'description' => 'Pemeliharaan server dan perbaikan bug.',
            'status' => 'selesai',
            'kategori_tugas' => 'maintance',
        ]);
        Project::create([
            'projectname' => 'Pembuatan Aplikasi Mobile',
            'description' => 'Membangun aplikasi mobile untuk pemesanan makanan online.',
            'status' => 'sedang dikerjakan',
            'kategori_tugas' => 'web',
        ]);

        Project::create([
            'projectname' => 'Perbaikan Bug Sistem',
            'description' => 'Melakukan perbaikan bug pada sistem perangkat lunak.',
            'status' => 'belum dikerjakan',
            'kategori_tugas' => 'maintance',
        ]);
        
    }
}
