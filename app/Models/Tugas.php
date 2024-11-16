<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';  // Nama tabel di database, jika tidak sesuai dengan nama model

    // Menentukan kolom yang dapat diisi mass-assignable
    protected $fillable = [
        'taskname',
        'description',
        'status',
        'project_id',
    ];

    /**
     * Relasi Many-to-One dengan model Project
     */
    public function project()
    {
        return $this->belongsToMany(Project::class, 'project_tugas', 'tugas_id', 'project_id');
    }
}
