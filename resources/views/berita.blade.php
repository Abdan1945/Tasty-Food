@extends('layouts.app')

@section('title', 'Berita Kuliner')

@section('content')
{{-- Link Bootstrap untuk Modal & Grid --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .modal-backdrop { z-index: 1040 !important; }
    .modal { z-index: 1050 !important; }
    a { text-decoration: none !important; }
    
    .card-hover {
        transition: all 0.5s ease;
    }
    .card-hover:hover {
        transform: translateY(-10px);
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>

{{-- 1. Hero Section --}}
<header class="relative w-full h-[400px] flex items-center overflow-hidden">
    <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover" alt="Banner">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="w-full px-10 lg:px-20 relative z-10">
        <h1 class="text-6xl font-black text-white uppercase tracking-tighter m-0">
            BERITA KAMI
        </h1>
    </div>
</header>

{{-- 2. Berita Utama (Statis) --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <img src="{{ asset('images/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" 
                     class="w-full rounded-[40px] shadow-2xl object-cover h-[450px]" alt="Main Food">
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-4xl font-black uppercase leading-tight tracking-tighter text-slate-900">
                    APA SAJA MAKANAN KHAS NUSANTARA?
                </h2>
                <p class="text-gray-500 my-8 text-lg leading-relaxed">
                    Indonesia memiliki keberagaman kuliner yang tak terhitung jumlahnya. Dari Sabang sampai Merauke, setiap daerah memiliki cita rasa unik menggunakan rempah asli pilihan.
                </p>
                <a href="#daftar-berita" class="inline-block bg-black text-white px-12 py-4 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-gray-800 transition shadow-lg">
                    BACA SELENGKAPNYA
                </a>
            </div>
        </div>
    </div>
</section>

{{-- 3. Daftar Berita (Dinamis dari Admin) --}}
<section id="daftar-berita" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-10">
        <h3 class="text-2xl font-black uppercase mb-12 tracking-tighter text-slate-900 border-l-8 border-amber-500 pl-4">
            BERITA LAINNYA
        </h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($berita as $item)
                <div class="flex flex-col bg-white rounded-[35px] overflow-hidden shadow-sm card-hover h-full border border-gray-100 group">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                             alt="{{ $item->title }}">
                    </div>
                    
                    <div class="p-8 flex flex-col flex-grow text-left">
                        <h5 class="font-bold text-lg uppercase mb-4 text-slate-900 min-h-[3rem] line-clamp-2">
                            {{ $item->title }}
                        </h5>
                        <p class="text-gray-400 text-[13px] leading-relaxed mb-6 flex-grow">
                            {{ Str::limit($item->content, 100) }}
                        </p>
                        
                        @auth
                <a href="{{ route('berita.show.front', $item->id) }}" class="text-amber-500 font-black text-[11px] uppercase tracking-widest">
                    BACA SELENGKAPNYA
                </a>
                @else
                    <a href="{{ route('login') }}" class="text-amber-500 font-black text-[11px] uppercase tracking-widest">
                        BACA SELENGKAPNYA (LOGIN)
                    </a>
                @endauth
                    </div>
                </div>

                {{-- Modal --}}
                @auth
                <div class="modal fade" id="modalBerita{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded-[40px] border-none overflow-hidden shadow-2xl">
                            <div class="modal-body p-0 text-left">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-[400px] object-cover" alt="Detail">
                                <div class="p-12 bg-white">
                                    <h2 class="text-3xl font-black uppercase mb-6 text-slate-900">{{ $item->title }}</h2>
                                    <p class="text-gray-600 leading-relaxed text-lg">{{ $item->content }}</p>
                                    <button type="button" class="mt-6 bg-black text-white px-6 py-2 rounded-lg text-xs font-bold uppercase tracking-widest" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth

            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-400 italic">Belum ada berita terbaru dari admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection