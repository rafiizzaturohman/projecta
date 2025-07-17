<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

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
        // Ambil 1 task milik user per project
        ->with(['tasks' => function ($query) use ($user) {
            $query->where('user_nim', $user->nim)->limit(1);
        }])
        ->get();

        return view('dashboard', compact('projects'));
    }
}
