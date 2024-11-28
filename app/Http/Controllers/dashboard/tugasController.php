<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tugas;

class tugasController extends Controller
{
    public function ViewTugasDashboard()
    {
        $allproject = Project::all();
        return view('dashboard.tugas.tugas', compact('allproject'));
    }

    public function ViewEditProject($id)
    {
        $project = Project::findOrFail($id);
        $tasks = Tugas::where('project_id', $id)->get();

        return view('dashboard.tugas.edit', compact('project', 'tasks'));
    }

    public function UpdateProject(Request $request, $id)
    {
        $request->validate([
            'projectname' => 'required|string',
            'description' => 'required|string',
            'kategori_tugas' => 'nullable|in:web,design,maintance',
            'taskname' => 'required|array',
            'taskname.*' => 'required|string',
            'description' => 'required|array',
            'description.*' => 'required|string',
        ]);

        $project = Project::findOrFail($id);
        $project->update([
            'projectname' => $request->projectname,
            'description' => implode(", ", $request->description),
            'kategori_tugas' => $request->kategori_tugas,
            'status' => 'belum dikerjakan',
        ]);

        foreach ($request->taskname as $key => $taskname) {
            $task = Tugas::where('project_id', $id)->skip($key)->first();
            if ($task) {
                $task->update([
                    'taskname' => $taskname,
                    'description' => $request->description[$key],
                ]);
            }
        }

        return redirect()->route('dashboard.tugas.tugas')->with('success', 'Project dan tugas berhasil diperbarui');
    }

    public function ViewTambahTugas()
    {
        return view('dashboard.tugas.tambah');
    }

    // navigasitampilan detail project
    public function ShowDetail($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('dashboard.tugas.tugas')->with('error', 'Project not found');
        }
        return view('dashboard.tugas.project_detail', compact('project'));
    }

    public function ShowDetailTugas($id)
    {
        $project = Tugas::find($id);
        if ($project) {
            return redirect()->route('dashboard.tugas.tugas')->with('error', 'not found task id');
        }
        return redirect()->route('dashboard.tugas.project_detail', compact('project'))->with('success', 'success found id');
    }

    public function ViewAndStoreProject(Request $request)
    {
        $request->validate([
            'projectname' => 'required|string',
            'description' => 'required|string',
            'kategori_tugas' => 'nullable|in:web,design,maintance',
            'taskname' => 'required|array',
            'taskname.*' => 'required|string',
            'description' => 'required|array',
            'description.*' => 'required|string',
        ]);

        $combinedDescription = implode(", ", $request->description);
        $project = Project::create([
            'projectname' => $request->projectname,
            'description' => $combinedDescription,
            'kategori_tugas' => $request->kategori_tugas,
            'status' => 'belum dikerjakan',
        ]);
        foreach ($request->taskname as $key => $taskname) {
            Tugas::create([
                'project_id' => $project->id,
                'taskname' => $taskname,
                'description' => $request->description[$key],
            ]);
        }

        return redirect()->route('dashboard.tugas.tambah')->with('success', ' berhasil mengupload tugas');
    }

    // public function DestroyProject($id) {
    //     $project = Project::findOrFail($id);
    //     $project->delete();
    //     return redirect()->route('dashboard.tugas.tugas')->with('success', 'project dan task telah di hapus');
    // }

    public function DestroyProject(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->delete();
        return redirect()->route('dashboard.tugas.tugas')->with('success', 'project dan task telah di hapus');
    }
}
