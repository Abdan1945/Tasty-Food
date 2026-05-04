@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-black flex items-center justify-center px-4 py-12 font-sans overflow-hidden" 
     style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836'); background-size: cover; background-position: center;">
    
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 w-full max-w-[440px]">
        
        <div class="text-center mb-8">
            <div class="flex justify-center mb-2">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 17C2 17 4 11 12 11C20 11 22 17 22 17V19H2V17Z" stroke="#F97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 8V4M12 4L9 5M12 4L15 5" stroke="#F97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white tracking-widest uppercase">Tasty</h1>
            <h2 class="text-2xl font-bold text-orange-500 tracking-[0.2em] uppercase -mt-1">Food</h2>
            <p class="text-gray-400 italic text-sm mt-2">Good food, good mood.</p>
        </div>

        <div class="bg-[#1A1A1A] rounded-[32px] p-8 md:p-10 shadow-2xl border border-white/5">
            <div class="text-center mb-8">
                <h3 class="text-white text-xl font-semibold">Selamat datang kembali!</h3>
                <p class="text-gray-500 text-sm mt-1">Masuk untuk melanjutkan ke Tasty Food</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                
                <div class="relative">
                    <span class="absolute inset-y-0 left-4 flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <input type="text" name="email" class="w-full bg-[#242424] border-none text-white rounded-xl py-4 pl-12 pr-4 focus:ring-2 focus:ring-orange-500 transition-all placeholder-gray-600" placeholder="Email atau nomor telepon">
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-4 flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <input type="password" name="password" class="w-full bg-[#242424] border-none text-white rounded-xl py-4 pl-12 pr-12 focus:ring-2 focus:ring-orange-500 transition-all placeholder-gray-600" placeholder="Kata sandi">
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center text-gray-400 cursor-pointer">
                        <input type="checkbox" class="rounded bg-[#242424] border-none text-orange-500 focus:ring-0 mr-2">
                        Ingat saya
                    </label>
                    <a href="#" class="text-orange-500 hover:underline">Lupa kata sandi?</a>
                </div>

                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-orange-500/20 transition-all">
                    Masuk
                </button>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-800"></div></div>
                <div class="relative flex justify-center text-xs uppercase"><span class="bg-[#1A1A1A] px-4 text-gray-500 font-medium">atau</span></div>
            </div>

            <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 bg-white hover:bg-gray-100 py-4 rounded-xl transition-all">
                <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5" alt="Google">
                <span class="text-gray-900 font-semibold">Google</span>
            </a>

            <p class="text-center mt-8 text-gray-500 text-sm">
                Belum punya akun? <a href="{{ route('register') }}" class="text-orange-500 font-semibold hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection