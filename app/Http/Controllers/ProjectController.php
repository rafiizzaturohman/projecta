<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Menampilkan semua project
    public function index()
    {
        $user = Auth::user();

        $projects = Project::with(['prodi', 'matakuliah', 'mahasiswa'])
            ->whereHas('members', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        return view('projects.index', compact('projects'));
    }

    public function detail($id) 
    {
        $user = Auth::user();

        $projects = Project::with(['prodi', 'matakuliah', 'mahasiswa'])
            ->where('id', $id)
            ->whereHas('members', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->firstOrFail();

        return view('projects.detail', compact('projects'));
    }

    // Menyimpan project baru
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'kd_prodi' => 'required|exists:prodis,kd_prodi',
            'kd_matakuliah' => 'required|exists:matakuliahs,kd_matakuliah',
            'mahasiswa_nim' => 'required|exists:users,nim',
            'status' => 'in:belum,proses,selesai',
        ]);

        // Simpan project
        $project = Project::create($validated);

        // Jika user yang login adalah mahasiswa → jadikan ketua otomatis
        if ($user->role === 'mahasiswa') {
            $project->members()->create([
                'user_id' => $user->id,
                'role' => 'ketua',
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Project berhasil dibuat.');
    }


    // Menampilkan detail satu project
    public function create()
    {
        $prodis = Prodi::All();
        $matakuliah = Matakuliah::All();

        return view('projects.create', compact('prodis', 'matakuliah'));
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
        $prodis = Prodi::All();
        $matakuliah = Matakuliah::All();

        return view('projects.edit', compact('project', 'prodis', 'matakuliah'));
    }

    // Menghapus project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('projects')->with('success', 'Project deleted successfully');
    }
}
