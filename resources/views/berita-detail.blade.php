@extends('layouts.app')

@section('title', $item->title)

@section('content')
<style>
    /* Sembunyikan Navbar & Footer bawaan layouts.app khusus di halaman ini */
    nav, footer { 
        display: none !important; 
    }

    body {
        background-color: #f8fafc; /* bg-slate-50 */
    }

    .article-card {
        margin-top: -100px;
        background: white;
        border-radius: 40px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        padding: 60px;
    }

    .content-text {
        line-height: 1.8;
        color: #334155; /* text-slate-700 */
        font-size: 1.15rem;
    }

    .back-btn {
        position: absolute;
        top: 40px;
        left: 40px;
        z-index: 50;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        padding: 12px 24px;
        border-radius: 99px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.75rem;
        transition: all 0.3s;
    }

    .back-btn:hover {
        background: white;
        color: black;
    }
</style>

<div class="relative w-full">
    {{-- Tombol Back --}}
    <a href="{{ route('berita.front') }}" class="back-btn">
        ← Kembali ke Berita
    </a>

    {{-- Hero Image Full Width --}}
    <div class="w-full h-[500px] relative">
        <img src="{{ asset('storage/' . $item->image) }}" 
             class="w-full h-full object-cover" 
             alt="{{ $item->title }}">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    {{-- Container Utama --}}
    <div class="max-w-4xl mx-auto px-6 relative">
        <div class="article-card">
            {{-- Category & Date --}}
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-amber-500 text-white px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">
                    Tasty News
                </span>
                <span class="text-gray-400 text-xs font-bold uppercase tracking-widest">
                    {{ $item->created_at->format('d M Y') }}
                </span>
            </div>

            {{-- Judul --}}
            <h1 class="text-4xl lg:text-5xl font-black text-slate-900 uppercase leading-tight mb-8 tracking-tighter">
                {{ $item->title }}
            </h1>

            {{-- Separator --}}
            <div class="w-20 h-1.5 bg-amber-500 mb-10"></div>

            {{-- Konten Berita --}}
            <div class="content-text">
                {!! nl2br(e($item->content)) !!}
            </div>

            {{-- Share Section --}}
            <div class="mt-16 pt-10 border-t border-gray-100 flex items-center justify-between">
                <span class="text-sm font-black uppercase tracking-widest text-slate-400">Bagikan Berita</span>
                <div class="flex gap-3">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-400 hover:bg-amber-500 hover:text-white transition cursor-pointer">FB</div>
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-400 hover:bg-amber-500 hover:text-white transition cursor-pointer">TW</div>
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-400 hover:bg-amber-500 hover:text-white transition cursor-pointer">WA</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer Baru Khusus Halaman Ini --}}
<footer class="py-20 text-center bg-slate-50">
    <p class="text-[11px] font-black text-slate-300 uppercase tracking-[0.3em]">
        © 2026 TastyFood - Crafted with Passion
    </p>
</footer>

@endsection