<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //project routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.list');
    Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/project/update/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/project', [ProjectController::class, 'create'])->name('project.create');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
    //project task routes
    Route::post('/project/{project_id}/task', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/project/{task}/task', [TaskController::class, 'show'])->name('project.task.show');
    Route::put('/project/{task}/task', [TaskController::class, 'update'])->name('project.task.update');
    Route::delete('/project/{task}/task', [TaskController::class, 'destroy'])->name('project.task.destroy');

});

require __DIR__.'/auth.php';
