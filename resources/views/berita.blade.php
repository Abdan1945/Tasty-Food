@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    {{-- Bootstrap JS untuk Modal --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Agar Modal tidak tertutup backdrop hitam */
        .modal-backdrop { z-index: 1040 !important; }
        .modal { z-index: 1050 !important; }
        a { text-decoration: none !important; }
        
        /* Transisi halus untuk hover kartu */
        .card-hover:hover {
            transform: translateY(-10px);
        }
    </style>

    {{-- 1. Hero Section --}}
    <header class="relative w-full h-[400px] flex items-center overflow-hidden">
        {{-- Gambar Latar --}}
        <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
             class="absolute inset-0 w-full h-full object-cover" alt="Banner">
        
        {{-- Overlay Gelap --}}
        <div class="absolute inset-0 bg-black/40"></div>

        {{-- Konten Judul - px-18 disesuaikan agar sejajar dengan TASTY FOOD --}}
        <div class="w-full px-18 lg:px-20 relative z-10">
            <h1 class="text-6xl font-black text-white uppercase tracking-tighter m-0">
                BERITA KAMI
            </h1>
        </div>
    </header>

    {{-- 2. Berita Utama --}}
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

    {{-- 3. Daftar Berita --}}
    <section id="daftar-berita" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-10">
            <h3 class="text-2xl font-black uppercase mb-12 tracking-tighter text-slate-900">BERITA LAINNYA</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                $berita = [
                    [
                        'id' => 1, 
                        'img' => 'images/sanket-shah-SVA7TyHxojY-unsplash.jpg', 
                        'title' => 'Lorem Ipsum', 
                        'desc' => 'Sayuran.'
                    ],
                    [
                        'id' => 2, 
                        'img' => 'images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg', 
                        'title' => 'GADO-GADO JAKARTA', 
                        'desc' => 'Salad tradisional Indonesia dengan sayuran segar dan saus kacang.'
                    ],
                    [
                        'id' => 3, 
                        'img' => 'images/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg', 
                        'title' => 'RENDANG DAGING', 
                        'desc' => 'Olahan daging sapi dengan rempah melimpah yang dimasak lama.'
                    ],
                    [
                        'id' => 4, 
                        'img' => 'images/luisa-brimble-HvXEbkcXjSk-unsplash.jpg', 
                        'title' => 'SOTO LAMONGAN', 
                        'desc' => 'Kuah kuning hangat yang kaya akan rempah, disajikan dengan koya.'
                    ],
                    [
                        'id' => 5, 
                        'img' => 'images/sanket-shah-SVA7TyHxojY-unsplash.jpg', 
                        'title' => 'NASI GORENG JAWA', 
                        'desc' => 'Hidangan ikonik dengan bumbu kecap manis dan terasi segar.'
                    ],
                    [
                        'id' => 6, 
                        'img' => 'images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg', 
                        'title' => 'MIE ACEH PEDAS', 
                        'desc' => 'Mie kuning tebal dengan bumbu kari pedas khas Serambi Mekkah.'
                    ],
                    [
                        'id' => 7, 
                        'img' => 'images/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg', 
                        'title' => 'AYAM BETUTU BALI', 
                        'desc' => 'Hidangan khas Bali yang dimasak dengan bumbu genep melimpah.'
                    ],
                    [
                        'id' => 8, 
                        'img' => 'images/luisa-brimble-HvXEbkcXjSk-unsplash.jpg', 
                        'title' => 'PEMPEK PALEMBANG', 
                        'desc' => 'Olahan ikan tenggiri kenyal dengan kuah cuko pedas asam manis.'
                    ],
                ];
                @endphp

                @foreach($berita as $item)
                    {{-- Card Berita --}}
                    <div class="flex flex-col bg-white rounded-[35px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 card-hover h-full border border-gray-100">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ $item['img'] }}" class="w-full h-full object-cover" alt="{{ $item['title'] }}">
                        </div>
                        
                        <div class="p-8 flex flex-col flex-grow text-left">
                            <h5 class="font-bold text-lg uppercase mb-4 text-slate-900 min-h-[3rem]">{{ $item['title'] }}</h5>
                            <p class="text-gray-400 text-[13px] leading-relaxed mb-6 flex-grow">{{ $item['desc'] }}</p>
                            
                            <button type="button" 
                                    class="text-amber-500 font-black text-[11px] uppercase tracking-widest bg-transparent border-none p-0 cursor-pointer text-left hover:text-amber-700 transition"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalBerita{{ $item['id'] }}">
                                Baca Selengkapnya
                            </button>
                        </div>
                    </div>

                    {{-- Modal Detail --}}
                    <div class="modal fade" id="modalBerita{{ $item['id'] }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-[40px] border-none overflow-hidden shadow-2xl">
                                <div class="modal-header border-none absolute right-6 top-6 z-20">
                                    <button type="button" class="btn-close bg-white rounded-full p-3 shadow-md" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0 text-left">
                                    <img src="{{ $item['img'] }}" class="w-full h-[400px] object-cover" alt="Detail">
                                    <div class="p-12 bg-white">
                                        <h2 class="text-3xl font-black uppercase mb-6 text-slate-900">{{ $item['title'] }}</h2>
                                        <p class="text-gray-600 leading-relaxed text-lg">{{ $item['desc'] }}</p>
                                        <p class="text-gray-500 mt-4">Ini adalah hidangan autentik yang dibuat dengan bahan pilihan untuk menjaga cita rasa asli Nusantara.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach {{-- Penutup Foreach Tunggal --}}

            </div> {{-- Penutup Grid --}}
        </div> {{-- Penutup Container --}}
    </section>
@endsection