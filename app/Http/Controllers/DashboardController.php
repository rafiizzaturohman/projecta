<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        // Ambil semua project + total task dan task selesai untuk progress
        $projects = Project::withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => function ($query) {
                    $query->where('status', 'selesai');
                },
            ])
            ->with(['tasks' => function ($query) use ($user) {
                $query->where('user_nim', $user->nim)->limit(1);
            }])
            ->get();

        // Jumlah tugas milik mahasiswa
        $totalTasks = Task::where('user_nim', $user->nim)->count();

        // Jumlah proyek yang mahasiswa terlibat (misal dia ketua/anggota)
        $activeProjects = Project::whereHas('tasks', function ($query) use ($user) {
                $query->where('user_nim', $user->nim);
            })->count();

        // Tugas dengan deadline < 3 hari ke depan (dan belum selesai)
        $nearDeadlineTasks = Task::where('user_nim', $user->nim)
            ->where('status', '!=', 'selesai')
            ->whereDate('deadline', '<=', Carbon::now()->addDays(3))
            ->whereDate('deadline', '>=', Carbon::now())
            ->count();
            
        // Jumlah tugas yang baru saja ditambahkan
        $recentProjects = Project::where('created_at', '>=', Carbon::now()->subWeek())
            ->whereHas('tasks', function ($query) use ($user) {
                $query->where('user_nim', $user->nim);
            })->count();

        return view('dashboard', compact(
            'projects',
            'totalTasks',
            'activeProjects',
            'nearDeadlineTasks',
            'recentProjects'
        ));
    }
}
