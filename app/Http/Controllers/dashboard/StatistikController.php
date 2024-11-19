<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth;
use App\Models\Project;
use App\Models\Tugas;

class StatistikController extends Controller
{
    public function Statistik()
    {
        $totalmember = auth::count();
        $totalproject = Project::count();
        $totalTasks = Tugas::count();
        $tasksCompleted = Project::where('status', 'selesai')->count();
        $tasksInProgress = Project::where('status', 'sedang dikerjakan')->count();
        $tasksPending = Project::where('status', 'belum dikerjakan')->count();

        return view('dashboard.statistik.statistik', compact(
            'totalmember',
            'totalproject',
            'totalTasks',
            'tasksCompleted',
            'tasksInProgress',
            'tasksPending'
        ));
    }

}
