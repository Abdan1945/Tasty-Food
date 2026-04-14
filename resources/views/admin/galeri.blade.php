@extends('layouts.admin')

@section('page_title', 'Kelola Galeri Foto')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Koleksi Foto Makanan</h3>
            <p class="text-sm text-gray-500">Update foto-foto terbaru untuk halaman galeri</p>
        </div>
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
            + Upload Foto
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="aspect-square bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-center">
            <i class="bi bi-image text-gray-300 text-2xl"></i>
        </div>
    </div>
</div>
@endsection