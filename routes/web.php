<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Admin\GaleriController; 
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\KontakController;
use App\Models\User;
use App\Models\News;
use App\Models\Gallery;

// --- HALAMAN PUBLIK (DEPAN) ---
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/tentang', function () { return view('tentang'); });

// --- FIX ROUTE KONTAK ---
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/berita', [BeritaController::class, 'indexFront'])->name('berita.front');
Route::get('/galeri', [GaleriController::class, 'publicIndex'])->name('galeri.public');

// --- AUTH ROUTES ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// --- HALAMAN ADMIN ---
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        $totalUser   = User::count(); 
        $totalBerita = News::count(); 
        $totalFoto   = Gallery::count(); 
        $recentNews = News::latest()->take(5)->get();
        $recentGalleries = Gallery::latest()->take(8)->get();

        return view('admin.dashboard', compact('totalUser', 'totalBerita', 'totalFoto', 'recentNews', 'recentGalleries'));
    })->name('dashboard');

    Route::resource('dashboard/berita', BeritaController::class)->names(['index'=>'berita.index','create'=>'berita.create','store'=>'berita.store','show'=>'berita.show','edit'=>'berita.edit','update'=>'berita.update','destroy'=>'berita.destroy']);
    Route::resource('dashboard/galeri', GaleriController::class)->names(['index'=>'admin.gallery.index','create'=>'admin.gallery.create','store'=>'admin.gallery.store','show'=>'admin.gallery.show','edit'=>'admin.gallery.edit','update'=>'admin.gallery.update','destroy'=>'admin.gallery.destroy']);
    Route::post('/dashboard/galeri/init', [GaleriController::class, 'initStatic'])->name('admin.gallery.init');

    Route::get('/dashboard/users', function () {
        $users = User::all();
        return view('admin.users', compact('users'));
    })->name('admin.users');

    Route::delete('/dashboard/users/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    })->name('admin.users.destroy');

    Route::patch('/dashboard/users/{id}/block', function ($id) {
        $user = User::findOrFail($id);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
        return back()->with('success', 'Status user berhasil diperbarui');
    })->name('admin.users.block');

    // Route Tambahan buat Kelola Pesan di Admin
    Route::get('/dashboard/kontak', [KontakController::class, 'adminIndex'])->name('admin.kontak.index');
    Route::delete('/dashboard/kontak/{id}', [KontakController::class, 'destroy'])->name('admin.kontak.destroy');
});