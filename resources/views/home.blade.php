@extends('layouts.app')

@section('title', 'Healthy & Delicious | Tasty Food')

@section('content')
    <style>
        /* --- Animation & Keyframes (Laptop & Mobile) --- */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-330px * 4)); } 
        }

        .carousel-track {
            display: flex;
            width: max-content;
            animation: scroll 25s linear infinite;
            padding-top: 80px; 
            padding-bottom: 80px;
        }

        .carousel-track:hover {
            animation-play-state: paused;
        }

        .card-container {
            width: 300px; 
            margin-right: 30px; 
            flex-shrink: 0;
        }

        /* --- Hover Zoom Effect --- */
        .card-hover-effect {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
        }

        .card-hover-effect:hover {
            transform: translateY(-20px) scale(1.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            z-index: 50;
        }

        /* --- Background Section --- */
        .card-section-bg {
            position: relative;
            background-image: url('{{ asset("images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 100px 0;
            overflow: hidden !important; /* Menghindari kebocoran gambar ke samping */
        }

        .card-section-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5); 
            z-index: 1;
        }

        .relative-content {
            position: relative;
            z-index: 2;
        }

        /* --- RESPONSIVE MOBILE FIX (Infinite Carousel di HP) --- */
        @media (max-width: 767px) {
            header { 
                text-align: center; 
                padding-top: 140px !important; 
                min-height: auto !important;
            }
            header h1 { font-size: 2.5rem !important; }
            header h2 { font-size: 3.5rem !important; }
            .hero-image-container { order: -1; margin-bottom: 30px; }
            .hero-image-container img { 
                max-width: 260px !important; 
                border-width: 8px !important; 
            }

            /* Aktifkan Infinite Scroll di Mobile */
            .card-section-bg {
                padding: 60px 0 !important;
            }

            @keyframes scroll-mobile {
                0% { transform: translateX(0); }
                100% { transform: translateX(calc(-280px * 4)); } /* Sesuaikan width card mobile */
            }

            .carousel-track {
                animation: scroll-mobile 20s linear infinite !important; /* Animasi tetap jalan di HP */
                padding-top: 60px;
                padding-bottom: 60px;
                display: flex !important;
            }

            .card-container {
                width: 250px !important; /* Sedikit lebih kecil agar cantik di HP */
                margin-right: 30px !important;
                margin-top: 20px !important;
            }

            .card-hover-effect {
                min-height: 260px !important;
                padding-top: 50px !important;
            }

            .card-hover-effect .absolute {
                width: 100px !important;
                height: 100px !important;
                top: -50px !important;
            }

            /* Fix Galeri & Berita */
            .news-grid-main { grid-template-columns: 1fr !important; gap: 20px !important; }
            .side-news-grid { grid-template-columns: repeat(2, 1fr) !important; gap: 12px !important; }
            .gallery-grid { 
                grid-template-columns: repeat(2, 1fr) !important; 
                gap: 12px !important;
            }
            .section-title { font-size: 1.8rem !important; margin-bottom: 30px !important; }
        }
    </style>

    {{-- 1. HERO SECTION --}}
    <header class="relative flex flex-col md:flex-row items-center px-8 md:px-16 lg:px-24 py-12 max-w-7xl mx-auto min-h-[700px] bg-white">
        <div class="md:w-1/2 z-10">
            <div class="w-16 h-1 bg-black mb-6 hidden md:block"></div>
            <h1 class="text-5xl md:text-7xl font-light text-gray-400 leading-none uppercase">Healthy</h1>
            <h2 class="text-6xl md:text-8xl font-black text-black uppercase leading-[0.8] mb-8 tracking-tighter">Tasty Food</h2>
            <p class="text-gray-500 text-sm leading-relaxed max-w-md mb-8 mx-auto md:ml-0 px-4 md:px-0">
                Sajian kuliner nusantara yang diracik dengan bahan organik pilihan untuk menjaga kesehatan tubuh dan memanjakan lidah Anda.
            </p>
            <a href="{{ url('/tentang') }}" class="inline-block bg-black text-white px-10 py-4 text-xs font-bold uppercase tracking-widest hover:bg-orange-500 transition shadow-xl no-underline">
                Tentang Kami
            </a>
        </div>
        
        <div class="md:w-1/2 relative mt-16 md:mt-0 flex justify-center hero-image-container">
            <div class="relative">
                <div class="absolute -inset-4 bg-orange-100 rounded-full blur-2xl opacity-50 md:block hidden"></div>
                <img src="{{ asset('images/img-4-2000x2000.png') }}"
                     class="relative w-full max-w-[500px] aspect-square object-cover rounded-full shadow-2xl border-[12px] md:border-[15px] border-white z-10">
            </div>
        </div>
    </header>

    {{-- 2. TENTANG KAMI --}}
    <section class="py-24 px-10 text-center max-w-4xl mx-auto bg-white">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest mb-8 text-slate-800 section-title">Tentang Kami</h3>
        <p class="text-gray-600 leading-loose text-base md:text-xl italic px-4">
            "Kami hadir untuk menyajikan hidangan nusantara dengan sentuhan modern dan bahan-bahan organik berkualitas tinggi demi gaya hidup sehat Anda."
        </p>
    </section>

    {{-- 3. MENU CAROUSEL (Infinite Scroll) --}}
    <section class="card-section-bg">
        <div class="relative-content">
            <div class="carousel-track">
                @php 
                    $cards = [
                        ['title' => 'SALAD BOWL', 'img' => 'images/img-1.png', 'desc' => 'Keseimbangan dalam setiap suapan.'],
                        ['title' => 'SALMON', 'img' => 'images/img-2.png', 'desc' =>'Nutrisi lengkap protein berkualitas.'],
                        ['title' => 'RAMEN UDANG', 'img' => 'images/img-3.png', 'desc' => 'Perpaduan udang dan kuah ramen.'], 
                        ['title' => 'CHARCUTERIE', 'img' => 'images/img-4.png', 'desc' => 'Sajian estetik yang lezat.']
                    ]; 
                    // Duplicate cards to create seamless infinite loop
                    $infiniteCards = array_merge($cards, $cards, $cards, $cards);
                @endphp

                @foreach($infiniteCards as $card)
                    <div class="card-container">
                        <div class="card-hover-effect bg-white p-8 pt-20 rounded-[40px] shadow-2xl text-center relative mt-16 group border border-gray-100 min-h-[320px]">
                            <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 border-[8px] border-white rounded-full overflow-hidden shadow-xl bg-white z-20">
                                <img src="{{ asset($card['img']) }}" class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-black text-xl mb-4 uppercase text-slate-900 tracking-tighter">{{ $card['title'] }}</h4>
                            <p class="text-gray-500 text-[13px] leading-relaxed px-2">{{ $card['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. BERITA KAMI --}}
    <section class="py-24 max-w-7xl mx-auto px-6 md:px-16 bg-white">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16 text-slate-900 section-title">Berita Kami</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 news-grid-main">
            {{-- Berita Utama --}}
            <div class="relative group overflow-hidden rounded-[30px] shadow-xl min-h-[350px] bg-gray-100 border-4 border-white">
                @if(isset($headlineNews) && $headlineNews)
                    <img src="{{ asset('storage/' . $headlineNews->image) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-all flex flex-col justify-end p-8 text-white">
                        <h4 class="text-lg md:text-xl font-black uppercase mb-4 leading-tight">{{ $headlineNews->title }}</h4>
                        <a href="{{ url('/berita/'.$headlineNews->id) }}" class="bg-orange-500 text-white px-6 py-2 rounded-full font-bold text-[10px] uppercase tracking-widest w-fit shadow-lg no-underline">
                            Baca Selengkapnya
                        </a>
                    </div>
                @endif
            </div>

            {{-- List Berita Samping --}}
            <div class="grid grid-cols-2 gap-4 side-news-grid">
                @if(isset($sideNews) && count($sideNews) > 0)
                    @foreach($sideNews as $item)
                        <div class="group relative overflow-hidden rounded-[25px] shadow-md aspect-square bg-white border-2 border-gray-50">
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-4 flex flex-col justify-end">
                                <h5 class="text-white font-bold text-[10px] md:text-[11px] uppercase line-clamp-2 mb-2">{{ $item->title }}</h5>
                                <a href="{{ url('/berita/'.$item->id) }}" class="text-orange-400 font-black text-[9px] uppercase no-underline">Detail →</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- 5. GALERI KAMI --}}
    <section class="py-24 max-w-7xl mx-auto px-4 md:px-16 bg-white">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16 text-slate-900 section-title">Galeri Kami</h3>
        
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 gallery-grid">
            @if(isset($galleries) && count($galleries) > 0)
                @foreach($galleries as $gal)
                    <div class="overflow-hidden rounded-[25px] md:rounded-[35px] shadow-lg aspect-[4/3] border-4 border-white group relative">
                        <img src="{{ asset('images/gallery/' . $gal->image) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-4">
                             <span class="text-white font-bold uppercase text-[10px] md:text-xs tracking-widest text-center">{{ $gal->title ?? 'LIHAT DETAIL' }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    {{-- FLOATING LOGIN --}}
    @guest
    <div class="fixed bottom-6 right-6 md:bottom-10 md:right-10 z-[100]">
        <a href="{{ route('login') }}" class="flex items-center gap-3 bg-black text-white px-6 py-4 rounded-full shadow-2xl hover:bg-orange-500 transition-all group no-underline">
            <span class="text-[10px] md:text-xs font-black uppercase tracking-widest">Login</span>
            <i class="bi bi-person-fill text-lg"></i>
        </a>
    </div>
    @endguest

@endsection