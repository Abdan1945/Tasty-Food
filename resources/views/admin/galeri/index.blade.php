@extends('layouts.admin')

@section('page_title', 'Manajemen Galeri')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Koleksi Galeri</h2>
            <p class="text-sm text-gray-500 mt-1 flex items-center">
                <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                Total terdapat <span class="font-bold text-gray-800 mx-1">{{ $galeries->count() }}</span> foto dipublikasikan.
            </p>
        </div>
        <a href="{{ route('galeri.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-orange-200 group transform hover:-translate-y-1">
            <i class="bi bi-plus-lg mr-2 group-hover:rotate-90 transition-transform"></i>
            Tambah Foto Baru
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-6 flex items-center p-4 text-sm text-green-800 border-l-4 border-green-500 rounded-r-xl bg-green-50 shadow-sm animate-fade-in" role="alert">
            <i class="bi bi-check-circle-fill mr-3 text-lg text-green-500"></i>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Table Card --}}
    <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100">
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest w-20 text-center">No</th>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest">Preview Foto</th>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest">Informasi Foto</th>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($galeries as $index => $item)
                    <tr class="hover:bg-orange-50/30 transition-colors group">
                        {{-- NOMOR BERSIH --}}
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-bold text-gray-500 group-hover:text-orange-600 transition-colors">{{ $index + 1 }}</span>
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="relative w-32 h-20 overflow-hidden rounded-2xl shadow-sm border-2 border-white ring-1 ring-gray-100 group-hover:ring-orange-200 transition-all">
                                {{-- LOAD FOTO --}}
                                <img src="{{ asset('storage/galeri/' . $item->foto) }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                                     alt="{{ $item->judul }}"
                                     onerror="this.onerror=null;this.src='https://placehold.co/600x400?text=Foto+Tidak+Ada';">
                                <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-colors"></div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <h6 class="text-base font-bold text-gray-800 mb-2 group-hover:text-orange-600 transition-colors line-clamp-1">{{ $item->judul }}</h6>
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                    <i class="bi bi-calendar3 mr-1.5"></i>
                                    {{ $item->created_at->format('d M Y') }}
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-600 border border-orange-100">
                                    <i class="bi bi-clock mr-1.5"></i>
                                    {{ $item->created_at->format('H:i') }} WIB
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('galeri.show', $item->id) }}" 
                                   class="w-10 h-10 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm"
                                   title="Lihat Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('galeri.edit', $item->id) }}" 
                                   class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white transition-all duration-300 shadow-sm"
                                   title="Edit Foto">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-300 shadow-sm"
                                            title="Hapus Foto">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                    <i class="bi bi-image text-4xl text-gray-200"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-700">Galeri Masih Kosong</h3>
                                <p class="text-gray-400 text-sm max-w-xs mx-auto">Klik tombol "Tambah Foto Baru" untuk mulai mengisi koleksi.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.4s ease-out forwards;
    }
</style>
@endsection