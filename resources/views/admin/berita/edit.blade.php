@extends('layouts.admin')

@section('page_title', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- Header & Navigasi --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Berita</h1>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi artikel agar tetap relevan bagi pembaca.</p>
        </div>
        <a href="{{ route('berita.index') }}" class="flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-orange-500 transition-colors">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('berita.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" 
                    class="w-full px-4 py-3 rounded-xl border @error('title') border-red-500 bg-red-50 @else border-gray-200 @enderror focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none"
                    placeholder="Masukkan judul berita...">
                @error('title')
                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Konten --}}
            <div>
                <label for="content" class="block text-sm font-bold text-gray-700 mb-2">Isi Berita</label>
                <textarea name="content" id="content" rows="10" 
                    class="w-full px-4 py-3 rounded-xl border @error('content') border-red-500 bg-red-50 @else border-gray-200 @enderror focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none resize-none"
                    placeholder="Tuliskan isi berita di sini...">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Bagian Gambar --}}
            <div class="space-y-4">
                <label class="block text-sm font-bold text-gray-700">Gambar Unggulan</label>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Preview Gambar Saat Ini --}}
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-2">Gambar Saat Ini</p>
                        <div class="relative h-48 w-full rounded-2xl overflow-hidden border border-gray-100 shadow-sm bg-gray-50">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300 italic text-sm">Tidak ada gambar</div>
                            @endif
                        </div>
                    </div>

                    {{-- Preview Gambar Baru --}}
                    <div id="new-preview-container" class="hidden">
                        <p class="text-[10px] uppercase tracking-widest text-orange-500 font-bold mb-2">Preview Gambar Baru</p>
                        <div class="relative h-48 w-full rounded-2xl overflow-hidden border-2 border-orange-100 shadow-md bg-orange-50">
                            <img id="image-preview" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                {{-- Input File --}}
                <div class="relative group mt-4">
                    <input type="file" name="image" id="image" accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                        onchange="previewImage(event)">
                    
                    <div class="border-2 border-dashed border-gray-200 group-hover:border-orange-400 rounded-2xl p-6 transition-all flex flex-col items-center justify-center bg-gray-50/50 group-hover:bg-white">
                        <i class="bi bi-upload text-xl text-gray-400 group-hover:text-orange-500 transition-colors"></i>
                        <p class="mt-1 text-sm text-gray-500">Klik untuk mengganti gambar</p>
                        <p class="text-[10px] text-gray-400 mt-1 italic">Biarkan kosong jika tidak ingin mengubah gambar</p>
                    </div>
                </div>
                @error('image')
                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="h-[1px] bg-gray-50 w-full pt-4"></div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="flex-1 md:flex-none px-12 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-95">
                    Update Berita
                </button>
                <a href="{{ route('berita.index') }}" class="flex-1 md:flex-none px-10 py-3.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl text-center transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Script Preview Gambar --}}
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('image-preview');
            const container = document.getElementById('new-preview-container');
            output.src = reader.result;
            container.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection