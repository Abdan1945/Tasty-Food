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

// --- HALAMAN PUBLIK (DEPAN) ---
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/tentang', function () { return view('tentang'); });
Route::get('/kontak', function () { return view('kontak'); });

// --- PERBAIKAN: Route Berita & Galeri Depan (Tembak ke Controller) ---
// Biar data yang diinput Admin muncul di sini
Route::get('/berita', [BeritaController::class, 'indexFront'])->name('berita.front');
Route::get('/galeri', [GaleriController::class, 'indexFront'])->name('galeri.front');


// --- AUTH ROUTES ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// --- HALAMAN ADMIN (HANYA BISA DIAKSES JIKA SUDAH LOGIN) ---
Route::middleware(['auth'])->group(function () {
    
    // DASHBOARD ADMIN
    Route::get('/dashboard', function () {
        // Ambil jumlah data untuk statistik di dashboard
        $totalUser   = User::count(); 
        $totalBerita = News::count(); 
        $totalFoto   = Gallery::count(); 

        // Data terbaru untuk tabel/list di dashboard
        $recentNews = News::latest()->take(5)->get();
        $recentGalleries = Gallery::latest()->take(8)->get();

        return view('dashboard', compact(
            'totalUser', 
            'totalBerita', 
            'totalFoto', 
            'recentNews', 
            'recentGalleries'
        ));
    })->name('dashboard');

    // CRUD KELOLA BERITA
    Route::resource('dashboard/berita', BeritaController::class)->names([
        'index'   => 'berita.index',
        'create'  => 'berita.create',
        'store'   => 'berita.store',
        'show'    => 'berita.show',
        'edit'    => 'berita.edit',
        'update'  => 'berita.update',
        'destroy' => 'berita.destroy',
    ]);

    // CRUD KELOLA GALERI
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

    // Hapus User
    Route::delete('/dashboard/users/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    })->name('admin.users.destroy');

    // Block/Unblock User
    Route::patch('/dashboard/users/{id}/block', function ($id) {
        $user = User::findOrFail($id);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
        return back()->with('success', 'Status user berhasil diperbarui');
    })->name('admin.users.block');
    
});