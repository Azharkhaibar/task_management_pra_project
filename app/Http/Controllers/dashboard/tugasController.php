<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class tugasController extends Controller
{
    public function ViewTugasDashboard() {
        return view('dashboard.tugas.tugas');
    }
}
