@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#FDFDFC] px-4">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 rounded-xl shadow-sm border border-[#e3e3e0]">
            <h2 class="text-2xl font-semibold text-[#1B1B18] mb-2 text-center">Buat Akun</h2>
            <p class="text-sm text-[#706f6c] mb-8 text-center">Mulai petualangan kuliner Anda di Tasty Food</p>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-md bg-red-50 text-red-600 text-sm border border-red-200">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-[#1B1B18] mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all" placeholder="Nama Anda" required shadow-sm>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-[#1B1B18] mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all" placeholder="nama@email.com" required shadow-sm>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-[#1B1B18] mb-1">Password</label>
                        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all" placeholder="••••••••" required shadow-sm>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#1B1B18] mb-1">Konfirmasi</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all" placeholder="••••••••" required shadow-sm>
                    </div>
                </div>

                <button type="submit" class="w-full bg-[#1b1b18] text-white py-2 rounded-md font-medium hover:bg-black transition-colors shadow-sm">
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-[#706f6c]">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-[#f53003] hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection