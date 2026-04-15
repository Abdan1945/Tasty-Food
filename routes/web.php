<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Admin\GaleriController; 
use App\Models\User;
use App\Models\News;
use App\Models\Gallery;

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
Route::get('/galeri', function () { return view('galeri'); });
Route::get('/kontak', function () { return view('kontak'); });

// --- AUTH ROUTES ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- HALAMAN ADMIN (TERPROTEKSI) ---
Route::middleware(['auth'])->group(function () {
    
    // DASHBOARD UTAMA
    Route::get('/dashboard', function () {
        $totalUser   = User::count(); 
        $totalBerita = News::count(); 
        $totalFoto   = Gallery::count(); // Menggunakan model Gallery

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

    // KELOLA GALERI (Resource - Sudah disesuaikan agar tidak bentrok)
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