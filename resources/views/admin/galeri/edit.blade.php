@extends('layouts.admin')

@section('page_title', 'Edit Foto')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('galeri.index') }}" class="text-sm font-semibold text-gray-500 hover:text-orange-500 transition-colors flex items-center gap-2">
            <i class="bi bi-arrow-left"></i> Batal & Kembali
        </a>
        <h2 class="text-2xl font-bold text-gray-800 mt-2">Perbarui Data Galeri</h2>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Preview Foto Lama --}}
                <div class="col-span-1 text-center">
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-3 tracking-widest text-left">Foto Saat Ini</label>
                    <div class="rounded-2xl overflow-hidden border-4 border-gray-50 shadow-sm ring-1 ring-gray-100">
                        <img src="{{ asset('storage/galeri/' . $galeri->foto) }}" class="w-full aspect-square object-cover">
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2 font-medium italic">Klik "Pilih Foto" jika ingin mengganti</p>
                </div>

                {{-- Form Input --}}
                <div class="col-span-1 md:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Foto</label>
                        <input type="text" name="judul" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 transition-all outline-none" 
                               value="{{ $galeri->judul }}">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto" 
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-600 hover:file:bg-orange-100 transition-all">
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-orange-200">
                            Update Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection