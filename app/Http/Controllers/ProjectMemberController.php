<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    // Menampilkan semua anggota proyek
    public function index()
    {
        $members = ProjectMember::with(['project', 'user'])->get();
        return view('project_members.index', compact('members'));
    }

    // Menambahkan anggota ke proyek
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'role' => 'in:ketua,anggota'
        ]);

        $member = ProjectMember::create($validated);
        return redirect()->route('project_members.index')->with('success', 'Anggota proyek berhasil ditambahkan');
    }

    // Menampilkan detail anggota proyek tertentu
    public function create()
    {
        return view('project_members.create');
    }

    public function edit($id)
    {
        $projmember = ProjectMember::findOrFail($id);
        
        return view('project_members.create', compact('projmember'));
    }

    // Memperbarui data anggota proyek
    public function update(Request $request, $id)
    {
        $member = ProjectMember::findOrFail($id);

        $validated = $request->validate([
            'project_id' => 'sometimes|required|exists:projects,id',
            'user_id' => 'sometimes|required|exists:users,id',
            'role' => 'in:ketua,anggota'
        ]);

        $member->update($validated);
        return redirect()->route('project_members.index')->with('success', 'Anggota proyek berhasil diperbarui');
    }

    // Menghapus anggota dari proyek
    public function destroy($id)
    {
        $member = ProjectMember::findOrFail($id);
        $member->delete();
        return redirect()->route('project_members.index')->with('success', 'Anggota proyek berhasil dihapus');
    }
}
