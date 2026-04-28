@extends('layouts.admin')

@section('page_title', 'Detail Foto')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('galeri.index') }}" class="text-sm font-semibold text-gray-500 hover:text-orange-500 transition-colors flex items-center gap-2">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <div class="flex gap-2">
            <a href="{{ route('galeri.edit', $galeri->id) }}" class="px-4 py-2 bg-amber-50 text-amber-600 text-xs font-bold rounded-lg hover:bg-amber-100 transition-colors">
                <i class="bi bi-pencil-square mr-1"></i> Edit
            </a>
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-3xl shadow-sm p-4 overflow-hidden">
        <div class="rounded-2xl overflow-hidden shadow-inner mb-6">
            <img src="{{ asset('storage/galeri/' . $galeri->foto) }}" class="w-full max-h-[500px] object-contain bg-gray-50">
        </div>
        
        <div class="px-4 pb-4">
            <span class="inline-block px-3 py-1 bg-orange-100 text-orange-600 text-[10px] font-black uppercase tracking-widest rounded-full mb-3">Tasty Food Gallery</span>
            <h2 class="text-3xl font-black text-gray-800 tracking-tight mb-4">{{ $galeri->judul }}</h2>
            
            <div class="flex items-center gap-6 text-sm text-gray-400 border-t border-gray-50 pt-6">
                <div class="flex items-center gap-2">
                    <i class="bi bi-calendar-check text-orange-500"></i>
                    <span class="font-medium">Diupload: {{ $galeri->created_at->format('d F Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="bi bi-clock text-orange-500"></i>
                    <span class="font-medium">{{ $galeri->created_at->format('H:i') }} WIB</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection