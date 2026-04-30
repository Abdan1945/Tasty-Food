@extends('layouts.app')

@section('title', 'Healthy & Delicious')

@section('content')
    <style>
        /* --- Desktop Settings --- */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-320px * 4)); } 
        }

        .carousel-track {
            display: flex;
            width: max-content;
            animation: scroll 20s linear infinite;
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

        /* BACKGROUND CAROUSEL - DICERAHKAN */
        .card-section-bg {
            position: relative;
            background-image: url('{{ asset("images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 100px 0;
        }

        /* Overlay Hitam ditipisin dari 0.7 ke 0.4 biar lebih cerah */
        .card-section-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4); 
            z-index: 1;
        }

        .relative-content {
            position: relative;
            z-index: 2;
        }

        /* --- MOBILE ADJUSTMENTS (< 768px) --- */
        @media (max-width: 767px) {
            header { text-align: center; padding-top: 40px !important; }
            header h1 { font-size: 3rem !important; }
            header h2 { font-size: 3.5rem !important; }
            .hero-image-container { order: -1; margin-bottom: 30px; }
            .hero-image-container img { max-width: 250px !important; border-width: 8px !important; }
            .carousel-track { animation-duration: 12s; }
            .grid-news { grid-template-columns: 1fr !important; }
        }
    </style>

    {{-- 1. HERO SECTION --}}
    <header class="relative flex flex-col md:flex-row items-center px-10 py-12 max-w-7xl mx-auto min-h-[600px] bg-white">
        <div class="md:w-1/2 z-10">
            <div class="w-16 h-1 bg-black mb-6 hidden md:block"></div>
            <h1 class="text-5xl md:text-7xl font-light text-gray-400 leading-none uppercase">Healthy</h1>
            <h2 class="text-6xl md:text-8xl font-black text-black uppercase leading-[0.8] mb-8 tracking-tighter">Tasty Food</h2>
            <p class="text-gray-500 text-sm leading-relaxed max-w-md mb-8 mx-auto md:ml-0">
                Sajian kuliner nusantara yang diracik dengan bahan organik pilihan untuk menjaga kesehatan.
            </p>
            <a href="{{ url('/tentang') }}" class="inline-block bg-black text-white px-10 py-4 text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition shadow-xl">
                Tentang Kami
            </a>
        </div>
        
        <div class="md:w-1/2 relative mt-16 md:mt-0 flex justify-center hero-image-container">
            <img src="{{ asset('images/img-4-2000x2000.png') }}"
                 class="w-full max-w-[500px] aspect-square object-cover rounded-full shadow-2xl border-[15px] border-white">
        </div>
    </header>

    {{-- 2. TENTANG KAMI --}}
    <section class="py-24 px-10 text-center max-w-4xl mx-auto bg-white">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest mb-8 text-slate-800">Tentang Kami</h3>
        <p class="text-gray-600 leading-loose text-lg italic px-4">
            "Kami hadir untuk menyajikan hidangan nusantara dengan sentuhan modern dan bahan-bahan organik berkualitas."
        </p>
    </section>

    {{-- 3. SECTION CAROUSEL (HANYA AREA INI YANG ADA BACKGROUND FOTO) --}}
    <section class="card-section-bg overflow-hidden">
        <div class="relative-content">
            <div class="carousel-track">
                @php 
                    $cards = [
                        ['title' => 'Salad Bowl', 'img' => 'images/img-1.png', 'desc' => 'Keseimbangan dalam setiap suapan. Bahan alami pilihan.'],
                        ['title' => 'Salmon', 'img' => 'images/img-2.png', 'desc' =>'Nutrisi lengkap protein berkualitas dari salmon panggang.'],
                        ['title' => 'Ramen Udang', 'img' => 'images/img-3.png', 'desc' => 'Perpaduan udang dan kuah ramen yang nagih!'], 
                        ['title' => 'Charcuterie', 'img' => 'images/img-4.png', 'desc' => 'Sajian estetik yang lezat dinikmati bersama.']
                    ]; 
                    $infiniteCards = array_merge($cards, $cards, $cards);
                @endphp

                @foreach($infiniteCards as $card)
                    <div class="card-container">
                        <div class="bg-white p-8 pt-20 rounded-[40px] shadow-2xl text-center relative mt-16 group transition-all duration-300 border border-gray-100 min-h-[300px]">
                            <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 border-[8px] border-white rounded-full overflow-hidden shadow-xl bg-white z-20">
                                <img src="{{ asset($card['img']) }}" class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-black text-xl mb-4 uppercase text-slate-900 leading-tight">{{ $card['title'] }}</h4>
                            <p class="text-gray-500 text-[12px] leading-relaxed">{{ $card['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. BERITA KAMI --}}
    <section class="py-24 max-w-7xl mx-auto px-10 bg-white">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16 text-slate-900">Berita Kami</h3>
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2 relative group overflow-hidden rounded-[40px] shadow-2xl h-[550px]">
                <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 p-10 flex flex-col justify-end text-white">
                    <h4 class="text-2xl font-black uppercase mb-4">Ulasan Kuliner Pekan Ini</h4>
                    <a href="{{ url('/berita') }}" class="bg-yellow-400 text-black px-6 py-2 rounded-lg font-bold text-xs uppercase tracking-widest w-fit shadow-lg">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 grid grid-cols-2 gap-6 grid-news">
                @php 
                    $news = [
                        ['title' => 'Resep Salad', 'img' => 'images/sanket-shah-SVA7TyHxojY-unsplash.jpg'],
                        ['title' => 'Manfaat Sayur', 'img' => 'images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg'],
                        ['title' => 'Kopi Organik', 'img' => 'images/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg'],
                        ['title' => 'Tips Memasak', 'img' => 'images/luisa-brimble-HvXEbkcXjSk-unsplash.jpg']
                    ]; 
                @endphp
                @foreach($news as $item)
                    <div class="bg-white border border-gray-100 rounded-[35px] overflow-hidden p-5 flex flex-col shadow-md">
                        <img src="{{ asset($item['img']) }}" class="w-full h-36 object-cover rounded-[25px] mb-4">
                        <h5 class="font-bold text-sm uppercase mb-4 text-slate-800">{{ $item['title'] }}</h5>
                        <a href="{{ url('/berita') }}" class="text-amber-500 font-extrabold text-[10px] mt-auto uppercase">BACA SELENGKAPNYA →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. GALERI KAMI --}}
    <section class="py-24 max-w-7xl mx-auto px-10 bg-white">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16 text-slate-900">Galeri Kami</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @php 
                $gallery = [
                    'images/brooke-lark-oaz0raysASk-unsplash.jpg',
                    'images/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
                    'images/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg',
                    'images/jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
                    'images/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg',
                    'images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg'
                ]; 
            @endphp
            @foreach($gallery as $url)
                <div class="overflow-hidden rounded-[30px] shadow-lg aspect-[4/3] border-4 border-white group">
                    <img src="{{ asset($url) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
            @endforeach
        </div>
    </section>

    {{-- FLOATING LOGIN --}}
    @guest
    <div class="floating-login">
        <a href="{{ route('login') }}" class="flex items-center gap-3 bg-black text-white px-6 py-4 rounded-full shadow-2xl hover:bg-amber-500 transition-all">
            <i class="bi bi-person-fill"></i>
            <span class="text-xs font-black uppercase tracking-widest">Login</span>
        </a>
    </div>
    @endguest

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection