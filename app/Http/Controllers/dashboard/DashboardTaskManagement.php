<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth;
use App\Models\Project;

class DashboardTaskManagement extends Controller
{
    public function ViewDashboard() {
        return view('dashboard.app');
    }
}
