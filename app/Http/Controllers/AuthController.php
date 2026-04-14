<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Logika proses login
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba mencocokkan data dengan database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Berhasil login, arahkan ke DASHBOARD
            return redirect()->intended('/dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Logika proses register
    public function register(Request $request)
    {
        // 1. Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Simpan user baru ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // 3. Otomatis login setelah berhasil daftar
        Auth::login($user);

        // Arahkan ke DASHBOARD setelah sukses
        return redirect('/dashboard')->with('success', 'Akun berhasil dibuat!');
    }

    // Logika Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Setelah logout kembali ke login
        return redirect('/login');
    }
}