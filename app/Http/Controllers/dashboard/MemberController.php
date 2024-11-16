<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth;

class MemberController extends Controller
{
    public function ViewMemberDashboard()
    {
        $fetchmember = auth::all();
        $totalmember = auth::count();
        return view('dashboard.member.member', compact('totalmember', 'fetchmember'));
    }

    public function show($id)
    {
        $member = auth::findOrFail($id);
        return view('dashboard.member.member_detail', compact('member'));
    }

    public function edit($id)
    {
        $member = auth::findOrFail($id);
        return view('dashboard.member.member_edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = auth::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $member->update($request->only(['name', 'instansi', 'email']));
        return redirect()->route('dashboard.member')->with('success', 'Data member berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $member = auth::findOrFail($id);
        $member->delete();
        return redirect()->route('dashboard.member')->with('success', 'Member berhasil dihapus.');
    }

}
