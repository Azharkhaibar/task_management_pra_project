<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class auth extends Authenticatable
{
    use Notifiable;

    protected $table = 'auth';
    protected $fillable = ['name', 'instansi', 'email', 'password'];
    protected $hidden = ['password'];
}
