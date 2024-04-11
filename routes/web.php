<?php

use App\Http\Controllers\Entity\EntityController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/entities/{entity}', [EntityController::class, 'show'])->name('entities.show');
    Route::patch('/entities/{entity}', [EntityController::class, 'update'])->name('entities.update');
    Route::get('/entities/{entity}/tree', [EntityController::class, 'tree'])->name('entities.tree');
    Route::get('/entities/{entity}/chart', [EntityController::class, 'tree'])->name('entities.chart');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
