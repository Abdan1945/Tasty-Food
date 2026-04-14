@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Berita</h1>
    
    <div class="card mb-4 shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Diterbitkan pada: {{ $news->created_at->format('d M Y') }}</span>
            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
        <div class="card-body text-center">
            <h2 class="mb-4">{{ $news->title }}</h2>
            
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid rounded mb-4" style="max-height: 400px;">
            @endif

            <div class="text-start mt-3" style="line-height: 1.8; font-size: 1.1rem;">
                {!! nl2br(e($news->content)) !!}
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('berita.edit', $news->id) }}" class="btn btn-warning">Edit Berita Ini</a>
        </div>
    </div>
</div>
@endsection