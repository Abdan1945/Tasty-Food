<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Admin\GaleriController; 
use App\Models\User;
use App\Models\News;
use App\Models\Gallery;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- HALAMAN PUBLIK ---
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/tentang', function () { return view('tentang'); });
Route::get('/berita', function () { return view('berita'); });

// PERBAIKAN DI SINI: Mengambil data Gallery langsung untuk halaman publik
Route::get('/galeri', function () { 
    $galeries = Gallery::latest()->get(); // Ambil data foto terbaru
    return view('galeri', compact('galeries')); // Kirim ke galeri.blade.php
});

Route::get('/kontak', function () { return view('kontak'); });

// --- AUTH ROUTES ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tambahan untuk Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// --- HALAMAN ADMIN (TERPROTEKSI) ---
Route::middleware(['auth'])->group(function () {
    
    // DASHBOARD UTAMA
    Route::get('/dashboard', function () {
        $totalUser   = User::count(); 
        $totalBerita = News::count(); 
        $totalFoto   = Gallery::count(); 

        return view('dashboard', compact('totalUser', 'totalBerita', 'totalFoto'));
    })->name('dashboard');

    // KELOLA BERITA (Resource)
    Route::resource('dashboard/berita', BeritaController::class)->names([
        'index'   => 'berita.index',
        'create'  => 'berita.create',
        'store'   => 'berita.store',
        'show'    => 'berita.show',
        'edit'    => 'berita.edit',
        'update'  => 'berita.update',
        'destroy' => 'berita.destroy',
    ]);

    // KELOLA GALERI (Resource - Menggunakan GaleriController untuk CRUD Admin)
    Route::resource('dashboard/galeri', GaleriController::class)->names([
        'index'   => 'galeri.index',
        'create'  => 'galeri.create',
        'store'   => 'galeri.store',
        'show'    => 'galeri.show',
        'edit'    => 'galeri.edit',
        'update'  => 'galeri.update',
        'destroy' => 'galeri.destroy',
    ]);

    // KELOLA USER
    Route::get('/dashboard/users', function () {
        $users = User::all();
        return view('admin.users', compact('users'));
    })->name('admin.users');
    
});