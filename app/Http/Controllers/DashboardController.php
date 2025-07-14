<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke() {
        $projects = Project::withCount([
        'tasks as total_tasks',
        'tasks as completed_tasks' => function ($q) {
            $q->where('status', 'selesai');
        }
    ])->get();

    return view('dashboard', compact('projects'));
    }
}
