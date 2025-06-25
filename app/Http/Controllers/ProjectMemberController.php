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
        return response()->json($members);
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
        return response()->json($member, 201);
    }

    // Menampilkan detail anggota proyek tertentu
    public function show($id)
    {
        $member = ProjectMember::with(['project', 'user'])->findOrFail($id);
        return response()->json($member);
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
        return response()->json($member);
    }

    // Menghapus anggota dari proyek
    public function destroy($id)
    {
        $member = ProjectMember::findOrFail($id);
        $member->delete();

        return response()->json(['message' => 'Anggota proyek berhasil dihapus']);
    }
}
