<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';
    protected $fillable = [
        'projectname',
        'description',
        'status',
        'kategori_tugas',
    ];

    /**
     * Relasi One-to-Many dengan model Tugas
     */
    public function tugas()
    {
        return $this->belongsToMany(Tugas::class, 'project_tugas', 'project_id', 'tugas_id');
    }
}
