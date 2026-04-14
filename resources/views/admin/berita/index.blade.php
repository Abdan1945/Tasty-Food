@extends('layouts.admin')

@section('page_title', 'Manajemen Berita')

@section('content')
<div class="space-y-6">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Daftar Berita Kuliner</h1>
            <p class="text-sm text-gray-500">Kelola konten berita dan artikel Tasty Food Anda di sini.</p>
        </div>
        <a href="{{ route('berita.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-orange-200 group">
            <i class="bi bi-plus-lg mr-2 group-hover:rotate-90 transition-transform"></i>
            Tambah Berita Baru
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 rounded-lg shadow-sm animate-bounce" role="alert">
        <i class="bi bi-check-circle-fill flex-shrink-0 text-xl"></i>
        <div class="ml-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-100 inline-flex h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    @endif

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold text-center w-16">No</th>
                        <th class="px-6 py-4 font-bold">Preview</th>
                        <th class="px-6 py-4 font-bold">Informasi Berita</th>
                        <th class="px-6 py-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($news as $item)
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-6 py-4 text-center font-medium text-gray-400">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="relative h-16 w-24 overflow-hidden rounded-lg border border-gray-100 shadow-sm">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="h-full w-full object-cover transform group-hover:scale-110 transition-transform duration-500" alt="thumb">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gray-100 text-gray-300">
                                        <i class="bi bi-image text-xl"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-base font-bold text-gray-800 group-hover:text-orange-500 transition-colors">{{ $item->title }}</span>
                                <p class="text-xs text-gray-400 mt-1 line-clamp-1 italic">
                                    {{ Str::limit($item->content, 100) }}
                                </p>
                                <div class="flex items-center gap-3 mt-2">
                                    <span class="text-[10px] px-2 py-0.5 bg-gray-100 text-gray-500 rounded-full font-medium">
                                        <i class="bi bi-calendar3 mr-1"></i> {{ $item->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Detail --}}
                                <a href="{{ route('berita.show', $item->id) }}" class="p-2 text-blue-500 bg-blue-50 hover:bg-blue-500 hover:text-white rounded-xl transition-all duration-300" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                {{-- Edit --}}
                                <a href="{{ route('berita.edit', $item->id) }}" class="p-2 text-amber-500 bg-amber-50 hover:bg-amber-500 hover:text-white rounded-xl transition-all duration-300" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                {{-- Hapus --}}
                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500 bg-red-50 hover:bg-red-500 hover:text-white rounded-xl transition-all duration-300" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <div class="p-4 bg-gray-50 rounded-full text-gray-300">
                                    <i class="bi bi-newspaper text-5xl"></i>
                                </div>
                                <p class="text-gray-400 font-medium text-base">Belum ada berita yang diterbitkan.</p>
                                <a href="{{ route('berita.create') }}" class="text-orange-500 text-sm font-bold hover:underline">Mulai buat berita pertama &rarr;</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection