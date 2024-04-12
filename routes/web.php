<?php

use App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/entities/{entity}', [Controllers\Entity\EntityController::class, 'show'])->name('entities.show');
    Route::get('/entities/{entity}/tree', [Controllers\Entity\EntityController::class, 'tree'])->name('entities.tree');
    Route::get('/entities/{entity}/d3-tree', [Controllers\Entity\EntityController::class, 'd3Tree'])->name('entities.d3-tree');

    Route::put('/entities/{entity}/links', [Controllers\Entity\EntityLinkController::class, 'update'])->name('entities.links.update');
    Route::post('/entities/{entity}', [Controllers\Entity\EntityLinkController::class, 'store'])->name('entities.links.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
