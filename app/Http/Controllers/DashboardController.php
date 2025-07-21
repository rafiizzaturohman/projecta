<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $projects = $this->getUserProjects($user->id, $user->nim);
        $completedTasksCount = $this->getCompletedTasksCount($user->nim);
        $completedTasksLast7Days = $this->getCompletedTasksLast7Days($user->nim);
        $recentActivities = $this->getRecentActivities($user->id, $user->nim);
        $nearDeadlineTasks = $this->getNearDeadlineTasks($user->nim);
        $stats = StatsController::getStats();

        return view('dashboard', array_merge([
            'projects' => $projects,
            'recentActivities' => $recentActivities,
            'completedTasksCount' => $completedTasksCount,
            'completedTasksLast7Days' => $completedTasksLast7Days,
            'nearDeadlineTasks' => $nearDeadlineTasks,
        ], $stats));

    }

    private function getUserProjects($userId, $userNim)
    {
        return Project::withCount([
                'tasks as total_tasks',
                'tasks as completed_tasks' => fn ($q) => $q->where('status', 'selesai'),
            ])
            ->with(['tasks' => fn ($q) => $q->where('user_nim', $userNim)->limit(1)])
            ->whereHas('members', fn ($q) => $q->where('user_id', $userId))
            ->get();
    }

    private function getCompletedTasksCount($userNim)
    {
        return Task::where('user_nim', $userNim)
            ->where('status', 'selesai')
            ->count();
    }

    private function getCompletedTasksLast7Days($userNim)
    {
        return Task::where('user_nim', $userNim)
            ->where('status', 'selesai')
            ->where('updated_at', '>=', Carbon::now()->subDays(7))
            ->count();
    }

    private function getNearDeadlineTasks($userNim)
    {
        // $tasks = Task::where('user_nim', $userNim)
        // ->where('status', '!=', 'selesai')
        // ->whereBetween('deadline', [now(), now()->addDays(7)])
        // ->orderBy('deadline', 'asc')
        // ->get();

        // dd($tasks);
        
        return Task::where('user_nim', $userNim)
            ->where('status', '!=', 'selesai')
            ->whereBetween('deadline', [now(), now()->addDays(7)])
            ->orderBy('deadline', 'asc')
            ->get()
            ->map(function ($task) {
                $task->days_remaining = Carbon::parse($task->deadline)->diffInDays(now());
                return $task;
            });
    }

    private function getRecentActivities($userId, $userNim)
    {
        $user = Auth::user();

        if ($user->role === 'dosen') {
            // Ambil semua proyek dari mata kuliah yang diampu dosen
            $projectIds = Project::whereHas('mataKuliah', function ($q) use ($userId) {
                $q->where('dosen_id', $userId);
            })->pluck('id');

            $recentTasks = Task::whereIn('project_id', $projectIds)
                ->latest('updated_at')
                ->take(5)
                ->get()
                ->map(fn ($task) => [
                    'type' => 'task',
                    'title' => $task->judul,
                    'status' => $task->status,
                    'updated_at' => $task->updated_at,
                ]);

            $recentProjects = Project::whereIn('id', $projectIds)
                ->latest('updated_at')
                ->take(5)
                ->get()
                ->map(fn ($project) => [
                    'type' => 'project',
                    'title' => $project->judul,
                    'status' => $project->status ?? 'aktif',
                    'updated_at' => $project->updated_at,
                ]);

        } else {
            // Mahasiswa
            $recentTasks = Task::where('user_nim', $userNim)
                ->latest('updated_at')
                ->take(5)
                ->get()
                ->map(fn ($task) => [
                    'type' => 'task',
                    'title' => $task->judul,
                    'status' => $task->status,
                    'updated_at' => $task->updated_at,
                ]);

            $recentProjects = Project::whereHas('members', fn ($q) => $q->where('user_id', $userId))
                ->latest('updated_at')
                ->take(5)
                ->get()
                ->map(fn ($project) => [
                    'type' => 'project',
                    'title' => $project->judul,
                    'status' => $project->status ?? 'aktif',
                    'updated_at' => $project->updated_at,
                ]);
        }

        return $recentProjects->merge($recentTasks)
            ->sortByDesc('updated_at')
            ->take(7);
    }

}
