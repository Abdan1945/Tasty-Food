@extends('layouts.admin')

{{-- Judul Tab Browser --}}
@section('title', 'Kelola Galeri')

@section('content')
<div class="flex flex-col h-full bg-slate-50">

    <main class="flex-1 overflow-y-auto p-10">
        <div class="max-w-7xl mx-auto">
            
            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div class="animate-fade-up">
                    <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Galeri Foto</h2>
                    <p class="text-slate-500 font-medium mt-1">Dokumentasi visual menu dan suasana Tasty Food.</p>
                </div>
                
                {{-- Tombol Unggah --}}
                <a href="{{ route('admin.gallery.create') }}" class="flex items-center justify-center gap-2 px-6 py-3.5 bg-orange-500 text-white font-bold rounded-2xl shadow-xl shadow-orange-200 hover:bg-orange-600 hover:-translate-y-1 transition-all duration-300 no-underline">
                    <i class="fas fa-upload text-sm"></i>
                    <span class="text-sm uppercase tracking-wider">Unggah Foto Baru</span>
                </a>
            </div>

            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 font-medium rounded-r-xl animate-fade-in">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Grid Galeri --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @forelse($galleries as $gallery)
                    <div class="group relative bg-white rounded-[2rem] p-3 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
                        <div class="relative aspect-square overflow-hidden rounded-[1.5rem] mb-4 bg-slate-200">
                            
                            @php
                                // Logika cek lokasi gambar
                                $pathPublic = public_path('images/gallery/' . $gallery->image);
                                $pathRoot = public_path('images/' . $gallery->image);
                                
                                if($gallery->image && file_exists($pathPublic)) {
                                    $src = asset('images/gallery/' . $gallery->image);
                                } elseif ($gallery->image && file_exists($pathRoot)) {
                                    $src = asset('images/' . $gallery->image);
                                } else {
                                    $src = null;
                                }
                            @endphp

                            @if($src)
                                <img src="{{ $src }}"
                                     alt="{{ $gallery->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 bg-slate-100">
                                    <i class="fas fa-image text-3xl mb-2"></i>
                                    <span class="text-[10px]">Gambar Tidak Ditemukan</span>
                                </div>
                            @endif

                            {{-- Overlay Tombol Aksi --}}
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-xl text-white hover:bg-white hover:text-blue-500 transition-all flex items-center justify-center no-underline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-xl text-white hover:bg-red-500 transition-all flex items-center justify-center">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Informasi Foto --}}
                        <div class="px-2 pb-2">
                            <h4 class="font-bold text-slate-800 text-sm truncate" title="{{ $gallery->title }}">{{ $gallery->title }}</h4>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $gallery->category ?? 'Kuliner' }}</span>
                                <span class="text-[9px] font-bold text-orange-500 bg-orange-50 px-2 py-0.5 rounded-md">
                                    {{ $gallery->created_at ? $gallery->created_at->format('d M Y') : 'Original' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- TAMPILAN JIKA DATABASE KOSONG --}}
                    <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-[2rem] border-2 border-dashed border-slate-200">
                        <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-4">
                            <i class="fas fa-magic text-orange-500 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">Database Masih Kosong</h3>
                        <p class="text-sm text-slate-400 mt-1 mb-8 text-center">
                            Klik tombol di bawah untuk memasukkan koleksi foto kuliner <br> ke database agar bisa Anda edit di sini.
                        </p>
                        
                        {{-- PERBAIKAN ROUTE DI SINI --}}
                        <form action="{{ route('admin.gallery.init') }}" method="POST">
                            @csrf
                            <button type="submit" class="px-8 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-black transition-all shadow-lg">
                                <i class="fas fa-sync-alt mr-2"></i> ISI DATABASE OTOMATIS
                            </button>
                        </form>
                    </div>
                @endforelse

            </div>

        </div>
    </main> 
</div>
@endsection