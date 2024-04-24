<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('Auth/login');
})->name('login');

Route::get('/system', [SystemController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('system');

Route::get('/inventario', [ProductoController::class, 'index'])
     ->middleware('auth')->name('inventario');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
