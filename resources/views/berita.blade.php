@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    {{-- Bootstrap JS untuk Modal --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Override Bootstrap agar tidak merusak layout Tailwind */
        .modal-backdrop { z-index: 1040 !important; }
        .modal { z-index: 1050 !important; }
        a { text-decoration: none !important; }
    </style>

    {{-- 1. Hero Section --}}
    <header class="relative w-full h-[450px] flex items-end overflow-hidden">
        {{-- Gambar Latar --}}
        <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
             class="absolute inset-0 w-full h-full object-cover" alt="Banner">
        
        {{-- Overlay Gelap (Penting agar teks putih terbaca) --}}
        <div class="absolute inset-0 bg-black/30"></div>

        {{-- Konten Judul (Posisikan di kiri bawah) --}}
        <div class="w-full px-16 lg:px-24 pb-16 relative z-10">
            <h1 class="text-5xl font-black text-white uppercase tracking-tighter m-0">
                BERITA KAMI
            </h1>
        </div>
    </header>

    {{-- 2. Berita Utama --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800" 
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

    {{-- 3. Daftar Berita --}}
    <section id="daftar-berita" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <h3 class="text-2xl font-black uppercase mb-12 tracking-tighter text-slate-900">BERITA LAINNYA</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                $berita = [
                    ['id' => 1, 'img' => 'photo-1603360946369-dc9bb6258143', 'title' => 'SATE AYAM MADURA',   'desc' => 'Daging ayam panggang dengan siraman bumbu kacang kental.'],
                    ['id' => 2, 'img' => 'photo-1546069901-ba9599a7e63c', 'title' => 'GADO-GADO JAKARTA',  'desc' => 'Salad tradisional Indonesia dengan sayuran segar dan saus kacang.'],
                    ['id' => 3, 'img' => 'photo-1606471191009-63994c53433b', 'title' => 'RENDANG DAGING',     'desc' => 'Olahan daging sapi dengan rempah melimpah yang dimasak lama.'],
                    ['id' => 4, 'img' => 'photo-1625398407796-82650a8c135f', 'title' => 'SOTO LAMONGAN',     'desc' => 'Kuah kuning hangat yang kaya akan rempah, disajikan dengan koya.'],
                    ['id' => 5, 'img' => 'photo-1604382354936-07c5d9983bd3', 'title' => 'NASI GORENG JAWA',   'desc' => 'Hidangan ikonik dengan bumbu kecap manis dan terasi segar.'],
                    ['id' => 6, 'img' => 'photo-1585032226651-759b368d7246', 'title' => 'MIE ACEH PEDAS',     'desc' => 'Mie kuning tebal dengan bumbu kari pedas khas Serambi Mekkah.'],
                    ['id' => 7, 'img' => 'photo-1598514983318-2f64f8f4796c', 'title' => 'AYAM BETUTU BALI',   'desc' => 'Hidangan khas Bali yang dimasak dengan bumbu genep melimpah.'],
                    ['id' => 8, 'img' => 'photo-1630409351241-e90e7f5e434d', 'title' => 'PEMPEK PALEMBANG',   'desc' => 'Olahan ikan tenggiri kenyal dengan kuah cuko pedas asam manis.'],
                ];
                @endphp

                @foreach($berita as $item)
                <div class="flex flex-col bg-white rounded-[35px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group h-full border border-gray-100">
                    <div class="h-52 overflow-hidden">
                        <img src="https://images.unsplash.com/{{ $item['img'] }}?q=80&w=500" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="{{ $item['title'] }}">
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h5 class="font-bold text-lg uppercase mb-4 leading-tight group-hover:text-amber-600 transition min-h-[3rem]">
                            {{ $item['title'] }}
                        </h5>
                        <p class="text-gray-400 text-[13px] leading-relaxed mb-6 flex-grow">
                            {{ $item['desc'] }}
                        </p>
                        <button type="button" class="text-amber-500 font-black text-[11px] uppercase tracking-widest hover:text-amber-700 bg-transparent p-0 cursor-pointer self-start transition border-none" data-bs-toggle="modal" data-bs-target="#modalBerita{{ $item['id'] }}">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>

                {{-- Modal --}}
                <div class="modal fade" id="modalBerita{{ $item['id'] }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded-[40px] border-none overflow-hidden shadow-2xl">
                            <div class="modal-header border-none absolute right-6 top-6 z-20">
                                <button type="button" class="btn-close bg-white rounded-full p-3 shadow-md" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-0 text-left">
                                <img src="https://images.unsplash.com/{{ $item['img'] }}?q=80&w=1200" class="w-full h-[400px] object-cover" alt="Detail">
                                <div class="p-12 bg-white">
                                    <h2 class="text-3xl font-black uppercase mb-6 text-slate-900">{{ $item['title'] }}</h2>
                                    <p class="text-gray-600 leading-relaxed mb-4">{{ $item['desc'] }} Ini adalah warisan kuliner yang kaya akan sejarah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection