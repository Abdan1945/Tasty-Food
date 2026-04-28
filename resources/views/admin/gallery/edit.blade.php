@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
{{-- Lock Layar: h-screen dan overflow-hidden agar pas di layar monitor --}}
<div class="h-screen flex flex-col bg-[#f8fafc] overflow-hidden">

    <div class="p-6 lg:p-10 flex flex-col h-full max-w-5xl mx-auto w-full">

        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8 shrink-0 animate-fade-up">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Edit Foto Galeri</h2>
                <p class="text-slate-500 text-sm font-medium mt-1">Perbarui detail foto galeri Tasty Food.</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50 transition-all no-underline shadow-sm text-xs">
                <i class="fas fa-arrow-left text-xs"></i>
                <span>Kembali</span>
            </a>
        </div>

        {{-- Card Container --}}
        <div class="flex-1 bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl shadow-slate-200/50 flex flex-col overflow-hidden animate-fade-up delay-1">

            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col h-full">
                @csrf
                @method('PATCH')

                {{-- Form Body (Scrollable inside card) --}}
                <div class="flex-1 overflow-y-auto p-8 lg:p-12 custom-scroll">
                    <div class="grid grid-cols-1 gap-8">

                        {{-- Judul Foto --}}
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Judul Foto</label>
                            <input type="text" name="title"
                                class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-orange-500/10 transition-all font-semibold text-slate-700 outline-none"
                                placeholder="Masukkan judul foto..." value="{{ old('title', $gallery->title) }}" required>
                        </div>

                        {{-- Deskripsi Foto --}}
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Deskripsi Foto</label>
                            <textarea name="description" rows="4"
                                class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-orange-500/10 transition-all font-semibold text-slate-700 outline-none resize-none"
                                placeholder="Masukkan deskripsi foto...">{{ old('description', $gallery->description) }}</textarea>
                        </div>

                        {{-- BAGIAN PREVIEW FOTO --}}
                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Foto Galeri</label>

                            {{-- Area Drop & Preview --}}
                            <div class="relative w-full h-64 group">
                                <input type="file" name="image" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 z-50 cursor-pointer" accept="image/*">

                                <div id="previewWrapper" class="w-full h-full border-2 border-dashed border-slate-200 rounded-[2rem] bg-slate-50 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-orange-300">

                                    {{-- Tampilan Sebelum Pilih Foto --}}
                                    <div id="placeholderUI" class="flex flex-col items-center {{ $gallery->image ? 'hidden' : '' }}">
                                        <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-3">
                                            <i class="fas fa-camera text-slate-300 group-hover:text-orange-400 transition-colors text-xl"></i>
                                        </div>
                                        <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Klik atau Seret Foto ke Sini</p>
                                    </div>

                                    {{-- Tampilan Setelah Pilih Foto --}}
                                    <img id="imagePreview" src="{{ $gallery->image ? asset('images/gallery/' . $gallery->image) : '#' }}" alt="Preview" class="{{ $gallery->image ? '' : 'hidden' }} w-full h-full object-cover">

                                    {{-- Overlay untuk ganti foto --}}
                                    <div id="changeOverlay" class="hidden absolute inset-0 bg-black/40 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                        <span class="px-4 py-2 bg-white/20 backdrop-blur-md border border-white/30 text-white rounded-full text-[10px] font-black uppercase tracking-widest">Ganti Foto</span>
                                    </div>
                                </div>
                            </div>
                            @error('image') <p class="text-red-500 text-[10px] font-bold uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Footer Buttons (Fixed) --}}
                <div class="p-8 bg-slate-50/50 border-t border-slate-100 shrink-0 flex gap-4">
                    <button type="submit" class="flex-1 py-4 bg-orange-500 text-white font-black rounded-2xl shadow-xl shadow-orange-500/20 hover:bg-orange-600 hover:-translate-y-1 active:scale-95 transition-all uppercase tracking-widest text-xs">
                        Perbarui Foto
                    </button>
                    <button type="reset" onclick="resetPreview()" class="px-8 py-4 bg-white border border-slate-200 text-slate-400 font-black rounded-2xl hover:bg-slate-50 transition-all uppercase tracking-widest text-xs">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function resetPreview() {
    document.getElementById('imageInput').value = '';
    // Reset to original image if exists
    const originalImage = '{{ $gallery->image }}';
    if (originalImage) {
        document.getElementById('imagePreview').src = '{{ asset('images/gallery/' . $gallery->image) }}';
        document.getElementById('imagePreview').classList.remove('hidden');
        document.getElementById('placeholderUI').classList.add('hidden');
        document.getElementById('changeOverlay').classList.remove('hidden');
    } else {
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('placeholderUI').classList.remove('hidden');
        document.getElementById('changeOverlay').classList.add('hidden');
    }
}

document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('placeholderUI').classList.add('hidden');
            document.getElementById('changeOverlay').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection