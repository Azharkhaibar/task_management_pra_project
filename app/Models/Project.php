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
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'project_id');
    }
}
