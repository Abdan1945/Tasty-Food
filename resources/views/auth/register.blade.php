@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-50 flex items-center justify-center px-4 py-12">
    <div class="max-w-6xl w-full">
        <div class="grid md:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100">
            
            <!-- Left Side - Visual -->
            <div class="hidden md:block relative bg-orange-600 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5" 
                     alt="Tasty Food" 
                     class="absolute inset-0 w-full h-full object-cover opacity-75">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-900/70 to-transparent"></div>
                
                <div class="relative h-full p-12 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3">
                            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-4xl shadow-md">
                                🍜
                            </div>
                            <h1 class="text-white text-4xl font-bold tracking-tight">Tasty Food</h1>
                        </div>
                    </div>

                    <div class="text-white">
                        <h2 class="text-5xl font-semibold leading-tight mb-6">
                            Mulai petualangan<br>kuliner Anda
                        </h2>
                        <p class="text-orange-100 text-lg">
                            Daftar sekarang dan temukan berbagai makanan lezat di sekitar Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <div class="mb-10 text-center md:text-left">
                        <h2 class="text-3xl font-bold text-[#1B1B18] mb-2">Buat Akun</h2>
                        <p class="text-[#706f6c]">Bergabung dan nikmati pengalaman kuliner terbaik</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-600 text-sm">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" 
                                   class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                   placeholder="Nama lengkap Anda" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                   class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                   placeholder="nama@email.com" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                                <input type="password" name="password" 
                                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                       placeholder="••••••••" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" 
                                       class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition-all"
                                       placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" 
                                class="w-full bg-[#1B1B18] hover:bg-black transition-all text-white font-semibold py-4 rounded-2xl text-base shadow-sm">
                            Daftar Sekarang
                        </button>
                    </form>

                    <p class="mt-8 text-center text-sm text-[#706f6c]">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-700 font-medium">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection