<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class auth extends Authenticatable
{
    use Notifiable;

    protected $table = 'auth'; // Pastikan nama tabelnya sesuai
    protected $fillable = ['name', 'instansi', 'email', 'password'];
    protected $hidden = ['password'];

    // Jika ada kebutuhan tambahan, tambahkan di sini.
}
