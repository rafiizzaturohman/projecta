<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatsController extends Controller
{
    public static function getStats()
    {
        $user = Auth::user();

        // Ambil ID semua project yang user-nya terdaftar sebagai anggota
        $memberProjectIds = ProjectMember::where('user_id', $user->id)->pluck('project_id');

        // Hitung total proyek aktif berdasarkan keanggotaan user
        $activeProjects = Project::whereIn('id', $memberProjectIds)->count();

        // Hitung total tugas user
        $totalTasks = Task::where('user_nim', $user->nim)->count();

        // Hitung tugas yang mendekati deadline dalam 7 hari
        $nearDeadlineTasks = Task::where('user_nim', $user->nim)
            ->whereBetween('deadline', [now(), now()->addDays(7)])
            ->count();

        // Hitung proyek yang baru dibuat dalam seminggu terakhir dan user-nya adalah anggota
        $recentProjects = Project::whereIn('id', $memberProjectIds)
            ->where('created_at', '>=', now()->subWeek())
            ->count();

        return [
            'activeProjects' => $activeProjects,
            'totalTasks' => $totalTasks,
            'nearDeadlineTasks' => $nearDeadlineTasks,
            'recentProjects' => $recentProjects,
        ];
    }
}
