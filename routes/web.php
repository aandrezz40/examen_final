<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('category.store');

Route::get('/task', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('task');
Route::post('/task', [TaskController::class, 'store'])->middleware(['auth', 'verified'])->name('task.store');
Route::get('/reminders', [TaskController::class, 'reminders'])->name('reminders');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'updateEdit'])->name('tasks.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
