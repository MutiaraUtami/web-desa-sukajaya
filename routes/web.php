<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfilDesaController;
use App\Livewire\Admin\AgendaManager;
use App\Livewire\Admin\ApbdesManager;
use App\Livewire\Admin\BeritaManager;
use App\Livewire\Admin\OrganisasiManager;
use App\Livewire\Admin\ProfilManager;
use App\Livewire\Admin\StatistikManager;
use App\Livewire\Admin\UmkmManager;
use App\Livewire\Frontend\AgendaList;
use App\Livewire\Frontend\ApbdesView;
use App\Livewire\Frontend\BeritaList;
use App\Livewire\Frontend\DemografisView;
use App\Livewire\Frontend\StatistikView;
use App\Livewire\Frontend\UmkmList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\InformasiDemografiManager;
use App\Livewire\Admin\LembagaManager;

/*
|--------------------------------------------------------------------------
| FRONTEND (VISITOR) - Tidak perlu login
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/visi-misi', [PageController::class, 'visiMisi'])->name('visi-misi');
Route::get('/sejarah', [PageController::class, 'sejarah'])->name('sejarah');
Route::get('/geografis', [PageController::class, 'geografis'])->name('geografis');
Route::get('/struktur-organisasi', [PageController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
Route::get('/lembaga-desa', [PageController::class, 'lembagaDesa'])->name('lembaga-desa');
Route::get('/lembaga-desa/{slug}', [PageController::class, 'lembagaDesaShow'])->name('lembaga-desa.show');
Route::get('/demografis', DemografisView::class)->name('demografis');
Route::get('/statistik', StatistikView::class)->name('statistik');
Route::get('/agenda', AgendaList::class)->name('agenda');
Route::get('/berita', BeritaList::class)->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'beritaShow'])->name('berita.show');
Route::get('/umkm', UmkmList::class)->name('umkm');
Route::get('/apbdes', ApbdesView::class)->name('apbdes');

/*
|--------------------------------------------------------------------------
| USER TEROTENTIKASI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Alihkan rute /dashboard bawaan langsung ke dashboard admin
    Route::redirect('/dashboard', '/admin/dashboard')->name('dashboard');
    
    Route::get('/profil-desa', [ProfilDesaController::class, 'index'])->name('profil-desa.index');
    Route::post('/profil-desa/update', [ProfilDesaController::class, 'update'])->name('profil-desa.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN (Butuh login + role admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class . '@index')->name('dashboard');
    Route::get('/profil', ProfilManager::class)->name('profil');
    Route::get('/statistik', StatistikManager::class)->name('statistik');
    Route::get('/organisasi', OrganisasiManager::class)->name('organisasi');
    Route::get('/lembaga', LembagaManager::class)->name('lembaga');    
    Route::get('/agenda', AgendaManager::class)->name('agenda');
    Route::get('/berita', BeritaManager::class)->name('berita');
    Route::get('/umkm', UmkmManager::class)->name('umkm');
    Route::get('/apbdes', ApbdesManager::class)->name('apbdes');
    Route::get('/informasi-demografi', InformasiDemografiManager::class)->name('informasi-demografi');
});