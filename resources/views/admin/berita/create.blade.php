@extends('layouts.admin')

@section('page_title', 'Tambah Berita Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- Header & Navigasi --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tulis Berita Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Bagikan info kuliner terbaru ke audiens Tasty Food.</p>
        </div>
        <a href="{{ route('berita.index') }}" class="flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-orange-500 transition-colors">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" 
                    class="w-full px-4 py-3 rounded-xl border @error('title') border-red-500 bg-red-50 @else border-gray-200 @enderror focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none placeholder:text-gray-400"
                    placeholder="Masukkan judul yang menarik...">
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
                    class="w-full px-4 py-3 rounded-xl border @error('content') border-red-500 bg-red-50 @else border-gray-200 @enderror focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none placeholder:text-gray-400 resize-none"
                    placeholder="Tuliskan isi berita selengkap mungkin...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Upload Gambar --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Unggulan</label>
                <div class="relative group">
                    <input type="file" name="image" id="image" accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                        onchange="previewImage(event)">
                    
                    <div id="drop-area" class="border-2 border-dashed @error('image') border-red-300 bg-red-50 @else border-gray-200 @enderror group-hover:border-orange-400 rounded-2xl p-8 transition-all flex flex-col items-center justify-center">
                        {{-- Placeholder --}}
                        <div id="preview-placeholder" class="text-center">
                            <i class="bi bi-cloud-arrow-up text-4xl text-gray-300 group-hover:text-orange-400 transition-colors"></i>
                            <p class="mt-2 text-sm text-gray-500 font-medium">Klik atau seret file ke sini</p>
                            <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">PNG, JPG up to 2MB</p>
                        </div>
                        
                        {{-- Preview Image --}}
                        <img id="image-preview" class="hidden max-h-64 rounded-xl shadow-lg border border-gray-100">
                    </div>
                </div>
                @error('image')
                    <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="h-[1px] bg-gray-50 w-full"></div>

            {{-- Button Aksi --}}
            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="flex-1 md:flex-none px-10 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-200 transition-all active:scale-95">
                    Simpan & Terbitkan
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
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function(){
            const dataURL = reader.result;
            const output = document.getElementById('image-preview');
            const placeholder = document.getElementById('preview-placeholder');
            const dropArea = document.getElementById('drop-area');

            output.src = dataURL;
            output.classList.remove('hidden');
            placeholder.classList.add('hidden');
            dropArea.classList.add('border-orange-200', 'bg-orange-50/30');
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection