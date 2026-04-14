@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#FDFDFC] px-4">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 rounded-xl shadow-sm border border-[#e3e3e0]">
            <h2 class="text-2xl font-semibold text-[#1B1B18] mb-2 text-center">Selamat Datang</h2>
            <p class="text-sm text-[#706f6c] mb-8 text-center">Silakan masuk ke akun Tasty Food Anda</p>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-md bg-red-50 text-red-600 text-sm border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-3 rounded-md bg-green-50 text-green-600 text-sm border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-[#1B1B18] mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all" placeholder="nama@email.com" required>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-[#1B1B18] mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all" placeholder="••••••••" required>
                </div>

                <button type="submit" class="w-full bg-[#1b1b18] text-white py-2 rounded-md font-medium hover:bg-black transition-colors">
                    Masuk
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-[#706f6c]">
                Belum punya akun? <a href="{{ route('register') }}" class="text-[#f53003] hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection