<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth;
use App\Models\Project;

class MemberController extends Controller
{

    public function MemberPage(Request $request) {
        $searchMemberInput = $request->input('search');
        if ($searchMemberInput) {
            $allmembers = auth::where('name', 'like', '%' . $searchMemberInput . '%')->get();
        } else {
            $allmembers = auth::all();
        }
        $totalproject = Project::count();
        $totalmember = auth::count();
        return view('taskmanagement.member', compact('totalmember', 'totalproject', 'allmembers'));
    }


}
