<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan semua task
    public function index()
    {
        $user = Auth::user();

        $tasks = Task::with(['project', 'user'])
            ->when($user->role === 'mahasiswa' && $user->nim, function ($query) use ($user) {
                $query->where('user_nim', $user->nim);
            })
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function detail($id)
    {
        $user = Auth::user();

        $tasks = Task::with(['project', 'user'])
            ->where('id', $id)
            ->when($user->role === 'mahasiswa' && $user->nim, function ($query) use ($user) {
                $query->where('user_nim', $user->nim);
            })
            ->firstOrFail();

        return view('tasks.detail', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }


    // Menyimpan task baru
    public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string|max:500',
        'deadline' => 'nullable|date',
        'user_nim' => 'nullable|exists:users,nim',
        'project_id' => 'required|exists:projects,id',
    ]);

    // Default status
    $validated['status'] = 'belum';

    Task::create($validated);
    return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan.');
}


    // Menampilkan detail satu task
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all(); // ambil semua project

        return view('tasks.edit', compact('task', 'projects'));
    }

    // Memperbarui task
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'sometimes|required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'user_nim' => 'nullable|exists:users,nim',
            'project_id' => 'sometimes|required|exists:projects,id',
            'status' => 'in:belum,proses,selesai',
        ]);

        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    // Menghapus task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
