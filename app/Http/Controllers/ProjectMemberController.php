<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectMemberController extends Controller
{
    // Menampilkan semua anggota proyek
    public function index()
    {
        $members = ProjectMember::with(['project', 'user'])->get();
        return view('projectMember.index', compact('members'));
    }

    // Menambahkan anggota ke proyek
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id'   => 'required|exists:users,id',
            'role'      => 'in:ketua,anggota'
        ]);

        $userToAdd = User::find($validated['user_id']);

        $currentUser = Auth::user();
        if (!$currentUser) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        // 🚫 Cegah admin ditambahkan
        if ($userToAdd->role === 'admin') {
            return back()->withErrors(['user_id' => 'User dengan peran admin tidak dapat ditambahkan ke proyek.'])->withInput();
        }

        // 👨‍🎓 Jika user yang login adalah mahasiswa & menambahkan dosen
        if ($currentUser->role === 'mahasiswa' && $userToAdd->role === 'dosen') {
            // Cek apakah proyek ini sudah punya dosen
            $projectHasDosen = ProjectMember::where('project_id', $validated['project_id'])
                ->whereHas('user', function ($query) {
                    $query->where('role', 'dosen');
                })->exists();

            if ($projectHasDosen) {
                return back()->withErrors(['user_id' => 'Setiap proyek hanya boleh memiliki satu dosen pembimbing.'])->withInput();
            }
        }

        // ✔️ Simpan jika valid
        ProjectMember::create($validated);

        return redirect()->route('project_members.index')->with('success', 'Anggota proyek berhasil ditambahkan');
    }

    // Menampilkan detail anggota proyek tertentu
    public function create()
    {
        $projects = Project::with('matakuliah.dosen')->get();
        $users = User::where('role', 'mahasiswa')->get(); // hanya mahasiswa yang dipilih manual

        return view('projectMember.create', compact('users', 'projects'));
    }

    public function edit($id)
    {
        $projmember = ProjectMember::findOrFail($id);
        $users = User::All();
        $projects = Project::All();

        return view('projectMember.edit', compact('projmember', 'users', 'projects'));
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
