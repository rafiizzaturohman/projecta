<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $projects = Project::with([
            'tasks' => function ($query) use ($user) {
                $query->where('user_nim', $user->nim); // atau user_id tergantung field foreign key
            }
        ])
        ->withCount([
            'tasks as total_tasks' => function ($q) use ($user) {
                $q->where('user_nim', $user->nim);
            },
            'tasks as completed_tasks' => function ($q) use ($user) {
                $q->where('user_nim', $user->nim)
                ->where('status', 'selesai');
            }
        ])
        ->get();

        return view('dashboard', compact('projects'));
    }
}
