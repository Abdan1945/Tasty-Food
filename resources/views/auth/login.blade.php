@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-50 flex items-center justify-center px-4 py-12">
    <div class="max-w-6xl w-full">
        <div class="grid md:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100">
            
            <!-- Left Side - Visual -->
            <div class="hidden md:block relative bg-orange-600 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" 
                     alt="Tasty Food" 
                     class="absolute inset-0 w-full h-full object-cover opacity-80">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-900/60 via-orange-900/40 to-transparent"></div>
                
                <div class="relative h-full p-12 flex flex-col justify-between">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-4xl shadow-md">
                            🍜
                        </div>
                        <h1 class="text-white text-4xl font-bold tracking-tight">Tasty Food</h1>
                    </div>

                    <!-- Text -->
                    <div class="text-white">
                        <h2 class="text-5xl font-semibold leading-tight mb-6">
                            Rasakan kenikmatan<br>sejati setiap hari
                        </h2>
                        <p class="text-orange-100 text-lg max-w-sm">
                            Bergabunglah dengan ribuan pecinta kuliner yang sudah menemukan makanan favorit mereka.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="p-10 md:p-14 lg:p-16 flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <div class="mb-10">
                        <h2 class="text-3xl font-bold text-[#1B1B18] mb-2">Selamat Datang Kembali</h2>
                        <p class="text-[#706f6c]">Masuk untuk melanjutkan petualangan kuliner Anda</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-600 text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-600 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                   class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all text-base"
                                   placeholder="nama@email.com" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                            <input type="password" name="password" 
                                   class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all text-base"
                                   placeholder="••••••••" required>
                        </div>

                        <button type="submit" 
                                class="w-full bg-[#1B1B18] hover:bg-black transition-all text-white font-semibold py-4 rounded-2xl text-base shadow-sm">
                            Masuk ke Akun
                        </button>
                    </form>

                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-white px-6 text-sm text-gray-500">atau</span>
                        </div>
                    </div>

                    <!-- Google Button -->
                    <a href="{{ route('google.login') }}" 
                       class="w-full flex items-center justify-center gap-3 border border-gray-300 hover:bg-gray-50 py-4 rounded-2xl font-medium transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Masuk dengan Google
                    </a>

                    <p class="mt-8 text-center text-sm text-[#706f6c]">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700 font-medium">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection