<?php

use App\Http\Controllers\ProfilDesaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/profil-desa', [ProfilDesaController::class, 'index'])->name('profil-desa.index');
    Route::post('/profil-desa/update', [ProfilDesaController::class, 'update'])->name('profil-desa.update');
    });

require __DIR__.'/settings.php';
