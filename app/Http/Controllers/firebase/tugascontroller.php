<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tugascontroller extends Controller
{
    public function tugasPage()
    {
        $projects = Project::with('tugas')->get();
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
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048', // Validasi jenis file
        ]);

        $task = Tugas::findOrFail($taskId);

        // Simpan file di storage
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $path = $document->store('documents', 'public'); // Simpan di folder 'documents'

            // Simpan path file di database jika perlu
            $task->document_path = $path;
            $task->save();
        }

        // Redirect kembali ke halaman yang sama setelah dokumen berhasil diunggah
        return redirect()->route('taskmanagement.tugas.show', $taskId)->with('message', 'Dokumen berhasil diunggah!');
    }


}
