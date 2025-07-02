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
        return view('tasks.index', compact('tasks'));
    }
    
    public function create()
    {
       return view('tasks.create');
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
        return redirect('tasks')->with('success', 'Task created successfully');
    }

    // Menampilkan detail satu task
    public function edit($id)
    {
        $task = Task::findOrFail($id);

       return view('tasks.edit');
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
        return redirect('tasks')->with('success', 'Task updated successfully');
    }

    // Menghapus task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('tasks')->with('success', 'Task deleted successfully');
    }
}
