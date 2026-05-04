@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-black flex items-center justify-center px-4 py-12 font-sans overflow-hidden" 
     style="background-image: url('https://images.unsplash.com/photo-1493770348161-369560ae357d'); background-size: cover; background-position: center;">
    
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 w-full max-w-[440px]">
        
        <div class="text-center mb-8 text-white uppercase">
            <h1 class="text-3xl font-bold tracking-widest">Tasty <span class="text-orange-500">Food</span></h1>
            <p class="text-gray-400 italic text-sm mt-2 normal-case tracking-normal">Good food, good mood.</p>
        </div>

        <div class="bg-[#1A1A1A] rounded-[32px] p-8 md:p-10 shadow-2xl border border-white/5">
            <div class="text-center mb-8">
                <h3 class="text-white text-xl font-semibold">Buat Akun Baru</h3>
                <p class="text-gray-500 text-sm mt-1">Daftar untuk menikmati layanan kami</p>
            </div>

            <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 bg-white hover:bg-gray-100 py-4 rounded-xl transition-all mb-6">
                <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5" alt="Google">
                <span class="text-gray-900 font-semibold">Daftar dengan Google</span>
            </a>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-800"></div></div>
                <div class="relative flex justify-center text-xs uppercase">
                    <span class="bg-[#1A1A1A] px-4 text-gray-500 font-medium">Atau gunakan email</span>
                </div>
            </div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf
                
                <div class="relative">
                    <input type="text" name="name" 
                           class="w-full bg-[#242424] border-none text-white rounded-xl py-4 px-6 focus:ring-2 focus:ring-orange-500 transition-all placeholder-gray-600" 
                           placeholder="Nama Lengkap">
                </div>

                <div class="relative">
                    <input type="email" name="email" 
                           class="w-full bg-[#242424] border-none text-white rounded-xl py-4 px-6 focus:ring-2 focus:ring-orange-500 transition-all placeholder-gray-600" 
                           placeholder="Email">
                </div>

                <div class="relative">
                    <input type="password" name="password" 
                           class="w-full bg-[#242424] border-none text-white rounded-xl py-4 px-6 focus:ring-2 focus:ring-orange-500 transition-all placeholder-gray-600" 
                           placeholder="Kata sandi">
                </div>

                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-orange-500/20 transition-all mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center mt-8 text-gray-500 text-sm">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-orange-500 font-semibold hover:underline">Masuk</a>
            </p>
        </div>
    </div>
</div>
@endsection