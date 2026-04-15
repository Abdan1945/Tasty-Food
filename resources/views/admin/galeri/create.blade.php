@extends('layouts.admin')

@section('page_title', 'Tambah Foto')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('galeri.index') }}" class="text-sm font-semibold text-gray-500 hover:text-orange-500 transition-colors flex items-center gap-2">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
        <h2 class="text-2xl font-bold text-gray-800 mt-2">Unggah Foto Baru</h2>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            <div class="space-y-6">
                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Foto</label>
                    <input type="text" name="judul" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 transition-all outline-none @error('judul') border-red-500 @enderror" 
                           placeholder="Contoh: Menu Ayam Bakar Spesial" 
                           value="{{ old('judul') }}">
                    @error('judul') <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Upload File --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Berkas Foto</label>
                    <div class="relative group">
                        <input type="file" name="foto" 
                               class="w-full px-4 py-3 rounded-xl border border-dashed border-gray-300 group-hover:border-orange-500 transition-colors bg-gray-50/50 cursor-pointer file:hidden @error('foto') border-red-500 @enderror">
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                            <i class="bi bi-cloud-arrow-up text-xl"></i>
                        </div>
                    </div>
                    <p class="text-[11px] text-gray-400 mt-2 uppercase tracking-tighter font-bold">Format: JPG, PNG, JPEG (Maks. 2MB)</p>
                    @error('foto') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-orange-200">
                        Simpan ke Galeri
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection