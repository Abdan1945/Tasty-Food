<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            // 1. Cek berdasarkan google_id terlebih dahulu (lebih akurat)
            // 2. Atau cek berdasarkan email (jika sebelumnya dia daftar manual)
            $finduser = User::where('google_id', $user->id)
                            ->orWhere('email', $user->email)
                            ->first();

            if($finduser){
                // Jika user ditemukan tapi belum punya google_id di DB, kita update
                if (!$finduser->google_id) {
                    $finduser->update([
                        'google_id' => $user->id
                    ]);
                }

                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                // Jika user benar-benar baru, buat akun dengan google_id
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id, // Tambahkan ini agar sinkron dengan database
                    'password' => Hash::make(Str::random(16)), 
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (\Exception $e) {
            // Tips: log error-nya jika perlu untuk debugging: \Log::error($e->getMessage());
            return redirect()->route('login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}