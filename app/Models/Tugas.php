<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $fillable = [
        'taskname',
        'description',
        'status',
        'project_id',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
