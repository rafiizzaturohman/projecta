<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan semua task
    public function index()
    {
        $tasks = Task::with(['project', 'user'])->get();
        return response()->json($tasks);
    }

    // Menyimpan task baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
            'user_nim' => 'nullable|exists:users,nim',
            'project_id' => 'required|exists:projects,id',
            'status' => 'in:belum,proses,selesai',
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    // Menampilkan detail satu task
    public function show($id)
    {
        $task = Task::with(['project', 'user'])->findOrFail($id);
        return response()->json($task);
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
        return response()->json($task);
    }

    // Menghapus task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Tugas berhasil dihapus']);
    }
}
