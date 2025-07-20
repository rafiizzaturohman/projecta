<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\StatsController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        // Ambil semua proyek dan progress tugas user (untuk tampilan dashboard)
        $projects = Project::withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => function ($query) {
                    $query->where('status', 'selesai');
                },
            ])
            ->with(['tasks' => function ($query) use ($user) {
                $query->where('user_nim', $user->nim)->limit(1);
            }])->whereHas('members', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

         // Recent Tasks milik user
        $recentTasks = Task::where('user_nim', $user->nim)
            ->latest('updated_at')
            ->take(5)
            ->get()
            ->map(function ($task) {
                return [
                    'type' => 'task',
                    'title' => $task->judul,
                    'status' => $task->status,
                    'updated_at' => $task->updated_at,
                ];
            });

        // Recent Projects yang user ikuti
        $recentProjects = Project::whereHas('members', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->latest('updated_at')
            ->take(5)
            ->get()
            ->map(function ($project) {
                return [
                    'type' => 'project',
                    'title' => $project->judul,
                    'status' => $project->status ?? 'aktif',
                    'updated_at' => $project->updated_at,
                ];
            });

        // Gabungkan dan urutkan berdasarkan waktu terbaru
        $recentActivities = $recentProjects
            ->merge($recentTasks)
            ->sortByDesc('updated_at')
            ->take(7);

        // Ambil statistik proyek & tugas (berdasarkan keanggotaan project)
        $stats = StatsController::getStats();

        // Gabungkan data ke view
        return view('dashboard', array_merge([
            'projects' => $projects,
            'recentActivities' => $recentActivities,
        ], $stats));
    }
}
