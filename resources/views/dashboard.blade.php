@extends('layouts.admin')

@section('page_title', 'Ringkasan Statistik')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Berita</p>
                <h3 class="text-2xl font-bold mt-1">{{ $totalBerita }}</h3>
                <a href="{{ route('berita.index') }}" class="text-xs text-blue-600 hover:underline mt-2 inline-block">
                    Kelola Berita &rarr;
                </a>
            </div>
            <div class="p-2 bg-blue-50 text-blue-500 rounded-lg">
                <i class="bi bi-newspaper text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Foto</p>
                <h3 class="text-2xl font-bold mt-1">{{ $totalFoto }}</h3>
                <a href="{{ route('admin.galeri') }}" class="text-xs text-green-600 hover:underline mt-2 inline-block">
                    Lihat Galeri &rarr;
                </a>
            </div>
            <div class="p-2 bg-green-50 text-green-500 rounded-lg">
                <i class="bi bi-images text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm text-gray-500 font-medium">User Terdaftar</p>
                <h3 class="text-2xl font-bold mt-1">{{ $totalUser }}</h3>
                <a href="{{ route('admin.users') }}" class="text-xs text-purple-600 hover:underline mt-2 inline-block">
                    Manajemen User &rarr;
                </a>
            </div>
            <div class="p-2 bg-purple-50 text-purple-500 rounded-lg">
                <i class="bi bi-people text-xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <h3 class="font-bold text-gray-800 mb-4">Selamat datang kembali, Admin {{ Auth::user()->name }}!</h3>
    <p class="text-gray-600 mb-2 leading-relaxed">
        Sistem Tasty Food saat ini mencatat secara real-time:
    </p>
    <ul class="text-sm space-y-1 text-gray-500 list-disc list-inside">
        <li><strong>{{ $totalBerita }}</strong> Berita kuliner telah diterbitkan.</li>
        <li><strong>{{ $totalFoto }}</strong> Foto telah diunggah ke galeri.</li>
        <li><strong>{{ $totalUser }}</strong> User aktif terdaftar dalam sistem.</li>
    </ul>
    
    <div class="mt-6 flex gap-3">
        <a href="{{ route('berita.create') }}" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
            <i class="bi bi-plus-lg me-1"></i> Tulis Berita Baru
        </a>
        <a href="/" target="_blank" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200 transition">
            <i class="bi bi-globe me-1"></i> Lihat Website
        </a>
    </div>
</div>
@endsection