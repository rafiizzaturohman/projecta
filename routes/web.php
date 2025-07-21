<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ProfileController,
    ProdiController,
    MatakuliahController,
    ProjectController,
    ProjectMemberController,
    TaskController,
    UserController
};
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\PreventBackHistory;

// Default route: Halaman login
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard: hanya user yang login & verified
Route::middleware(['auth', 'verified', PreventBackHistory::class])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

// Admin only: Role = admin
Route::middleware([
    'auth',
    PreventBackHistory::class,
    RoleMiddleware::class . ':admin'
])->group(function () {
    Route::get('userManagement/search', [UserController::class, 'search'])->name('userManagement.search');
    Route::resource('userManagement', UserController::class);

    Route::resource('prodis', ProdiController::class);
});

// Dosen & Admin: Role = dosen, admin
Route::middleware([
    'auth',
    PreventBackHistory::class,
    RoleMiddleware::class . ':dosen,admin'
])->group(function () {
    Route::resource('matakuliahs', MatakuliahController::class);
});

// Semua user login (mahasiswa, dosen, admin)
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project & Task management
    Route::resource('projects', ProjectController::class);
    Route::get('/project/{id}/detail', [ProjectController::class, 'detail'])->name('project.detail');

    Route::resource('project_members', ProjectMemberController::class);

    Route::resource('tasks', TaskController::class);
    Route::get('/task/{id}/detail', [TaskController::class, 'detail'])->name('tasks.detail');
});

// Auth scaffolding (breeze/jetstream/etc)
require __DIR__.'/auth.php';
