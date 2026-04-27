@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Breadcrumbs / Judul Halaman --}}
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Berita /</span> Detail Berita
    </h4>

    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <div class="card mb-4 shadow-sm">
                {{-- Header Card --}}
                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-calendar me-2 text-primary"></i>
                        <span class="badge bg-label-primary">Diposting: {{ $news->created_at->format('d M Y') }}</span>
                    </div>
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>

                {{-- Konten Utama --}}
                <div class="card-body mt-4">
                    {{-- Judul --}}
                    <h2 class="display-6 fw-bold mb-4 text-dark">{{ $news->title }}</h2>

                    {{-- Gambar Utama --}}
                    @if($news->image)
                        <div class="text-center mb-4 overflow-hidden rounded-3 shadow-sm border">
                            <img src="{{ asset('storage/' . $news->image) }}" 
                                 alt="{{ $news->title }}" 
                                 class="img-fluid" 
                                 style="width: 100%; max-height: 500px; object-fit: cover;">
                        </div>
                    @endif

                    {{-- Isi Berita --}}
                    <div class="news-content px-2" style="font-size: 1.05rem; color: #566a7f; line-height: 1.8;">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>

                {{-- Footer dengan Aksi --}}
                <div class="card-footer border-top bg-light">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('berita.edit', $news->id) }}" class="btn btn-warning">
                            <i class="bx bx-edit-alt me-1"></i> Edit Berita
                        </a>
                        <form action="{{ route('berita.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bx bx-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style tambahan biar teks konten enak dibaca */
    .news-content {
        text-align: justify;
    }
    .bg-label-primary {
        background-color: #e7e7ff !important;
        color: #696cff !important;
    }
    .card {
        border: none;
    }
</style>
@endsection