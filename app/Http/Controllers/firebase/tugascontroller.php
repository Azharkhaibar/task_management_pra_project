<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tugascontroller extends Controller
{
    public function tugasPage(Request $request)
    {
        $kategori_tugas = $request->input('kategori_tugas'); 
        $status = $request->input('status');
        $query = Project::with('tugas');
        if ($kategori_tugas && $kategori_tugas !== 'all') {
            $query->where('kategori_tugas', $kategori_tugas);
        }
        if ($status) {
            $query->where('status', $status);
        }

        $projects = $query->get();
        // Return data ke view
        return view('taskmanagement.tugas', compact('projects'));
    }



    public function showProject($id)
    {
        $project = Project::with('tugas')->find($id);
        if (!$project) {
            return redirect()->route('taskmanagement.tugas')->with('error', 'Project not found');
        }
        return view('taskmanagement.project_detail', compact('project'));
    }

    public function updateStatus(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:belum dikerjakan,sedang dikerjakan,selesai',
        ]);
        $project->status = $validated['status'];
        $project->save();
        return redirect()->route("taskmanagement.project.show", $project->id)->with('message', 'Status proyek berhasil diperbarui!');
    }

    public function showTask($id)
    {
        $project = Tugas::find($id);
        if (!$project) {
            return redirect()->route('taskmanagement.tugas')->with('error', 'Tugas tidak ditemukan');
        }
        return view('taskmanagement.project_detail', compact('project'));
    }

    public function uploadDocument(Request $request, $taskId)
    {
        // validasi dan cek file
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        $task = Tugas::findOrFail($taskId);
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $path = $document->store('documents', 'public');
            $task->document_path = $path;
            $task->save();
        }
        return redirect()->route('taskmanagement.tugas.show', $taskId)->with('message', 'Dokumen berhasil diunggah!');
    }
}
