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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth', 'verified'
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

// Dashboard - hanya untuk user yang sudah login dan verifikasi email
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Group khusus ADMIN
Route::middleware([
    'auth',
    RoleMiddleware::class . ':admin'
])->group(function () {
    Route::get('userManagement/search', [UserController::class, 'search'])->name('userManagement.search');

    Route::resource('userManagement', UserController::class);
    Route::resource('prodis', ProdiController::class);
});

Route::middleware([
    'auth',
    RoleMiddleware::class . ':dosen,admin'
])->group(function () {
    Route::resource('matakuliahs', MatakuliahController::class);
});

// Group untuk semua user setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // routes/web.php
    Route::resource('projects', ProjectController::class);
    Route::resource('project_members', ProjectMemberController::class);
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';
