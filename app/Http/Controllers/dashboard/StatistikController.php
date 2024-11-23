<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth;
use App\Models\authdashboard;
use App\Models\Project;
use App\Models\Tugas;

class StatistikController extends Controller
{
    public function Statistik()
    {
        $totalmember = auth::count();
        $totalproject = Project::count();
        $totalTasks = Tugas::count();
        $fetchalladmin = authdashboard::all();
        $fetchallmember = auth::all();
        $tasksCompleted = Project::where('status', 'selesai')->count();
        $tasksInProgress = Project::where('status', 'sedang dikerjakan')->count();
        $tasksPending = Project::where('status', 'belum dikerjakan')->count();
        $totaladmin = authdashboard::count();
        return view('dashboard.statistik.statistik', compact(
            'totalmember',
            'totalproject',
            'totalTasks',
            'tasksCompleted',
            'tasksInProgress',
            'tasksPending',
            'totaladmin',
            'fetchalladmin',
            'fetchallmember'
        ));
    }

}
