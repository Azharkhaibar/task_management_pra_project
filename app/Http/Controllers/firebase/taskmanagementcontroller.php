<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class taskmanagementcontroller extends Controller
{
    public function TaskManagementApp()
    {
        return view('taskmanagement.app');
    }
}
