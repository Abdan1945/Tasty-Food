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

Route::get('/galeri', function () { 
    $galeries = Gallery::latest()->get(); 
    return view('galeri', compact('galeries')); 
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

    // KELOLA BERITA
    Route::resource('dashboard/berita', BeritaController::class)->names([
        'index'   => 'berita.index',
        'create'  => 'berita.create',
        'store'   => 'berita.store',
        'show'    => 'berita.show',
        'edit'    => 'berita.edit',
        'update'  => 'berita.update',
        'destroy' => 'berita.destroy',
    ]);

    // KELOLA GALERI
    Route::resource('dashboard/galeri', GaleriController::class)->names([
        'index'   => 'galeri.index',
        'create'  => 'galeri.create',
        'store'   => 'galeri.store',
        'show'    => 'galeri.show',
        'edit'    => 'galeri.edit',
        'update'  => 'galeri.update',
        'destroy' => 'galeri.destroy',
    ]);

    // KELOLA USER (DENGAN AKSI DELETE & BLOCK)
    Route::get('/dashboard/users', function () {
        $users = User::all();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    // Route untuk Delete User
    Route::delete('/dashboard/users/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    })->name('admin.users.destroy');

    // Route untuk Block User
    Route::patch('/dashboard/users/{id}/block', function ($id) {
        $user = User::findOrFail($id);
        $user->is_blocked = !$user->is_blocked; // Membalikkan status (0 jadi 1, atau sebaliknya)
        $user->save();
        return back()->with('success', 'Status user berhasil diperbarui');
    })->name('admin.users.block');
    
});