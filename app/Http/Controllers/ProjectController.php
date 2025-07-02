<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan semua project
    public function index()
    {
        $projects = Project::with(['prodi', 'matakuliah', 'mahasiswa'])->get();
        return view('projects.index', compact('projects'));
    }

    // Menyimpan project baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'kd_prodi' => 'required|exists:prodis,kd_prodi',
            'kd_matakuliah' => 'required|exists:matakuliahs,kd_matakuliah',
            'mahasiswa_nim' => 'required|exists:users,nim',
            'status' => 'in:belum,proses,selesai',
        ]);

        $project = Project::create($validated);
        return redirect('projects')->with('success', 'Project created successfully');
    }

    // Menampilkan detail satu project
    public function create()
    {
        return view('projects.create');
    }

    // Memperbarui data project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'sometimes|required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'kd_prodi' => 'sometimes|required|exists:prodis,kd_prodi',
            'kd_matakuliah' => 'sometimes|required|exists:matakuliahs,kd_matakuliah',
            'mahasiswa_nim' => 'sometimes|required|exists:users,nim',
            'status' => 'in:belum,proses,selesai',
        ]);

        $project->update($validated);
        return redirect('projects')->with('success', 'Project updated successfully');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

       return view('projects.edit', compact('project'));
    }

    // Menghapus project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('projects')->with('success', 'Project deleted successfully');
    }
}
