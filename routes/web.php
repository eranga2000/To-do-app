<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route to show the list of tasks
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Route to store a new task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Route to mark a task as completed
Route::put('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Route to delete a task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
