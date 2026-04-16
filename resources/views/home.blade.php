@extends('layouts.app')

@section('title', 'Healthy & Delicious')

@section('content')
    {{-- CSS CUSTOM UNTUK CAROUSEL NGEBUT & FIX FOTO KEPOTONG --}}
    <style>
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-320px * 4)); } 
        }

        .carousel-track {
            display: flex;
            width: max-content;
            /* KECEPATAN: 10 detik biar makin sat-set */
            animation: scroll 10s linear infinite;
            padding-top: 100px; /* Ruang extra di atas biar lingkaran foto nggak kepotong */
            padding-bottom: 50px;
        }

        .carousel-track:hover {
            animation-play-state: paused; /* Berhenti kalau kursor di atasnya */
        }

        .card-container {
            width: 300px; 
            margin-right: 20px; 
            flex-shrink: 0;
            position: relative;
        }

        /* Biar tinggi card sama semua walaupun teks beda panjang */
        .card-fixed-height {
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

    {{-- 1. HERO SECTION --}}
    <header class="relative flex flex-col md:flex-row items-center px-10 py-12 max-w-7xl mx-auto min-h-[600px]">
        <div class="md:w-1/2 z-10">
            <div class="w-16 h-1 bg-black mb-6"></div>
            <h1 class="text-5xl md:text-7xl font-light text-gray-400 leading-none uppercase">Healthy</h1>
            <h2 class="text-6xl md:text-8xl font-black text-black uppercase leading-[0.8] mb-8 tracking-tighter">Tasty Food</h2>
            <p class="text-gray-500 text-sm leading-relaxed max-w-md mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem.
            </p>
            <a href="{{ url('/tentang') }}" class="inline-block bg-black text-white px-10 py-4 text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition shadow-xl text-center">
                Tentang Kami
            </a>
        </div>
        
        <div class="md:w-1/2 relative mt-16 md:mt-0 flex justify-center">
            <img src="{{ asset('images/img-4-2000x2000.png') }}"
                 class="w-full max-w-[500px] aspect-square object-cover rounded-full shadow-2xl border-[15px] border-white">
        </div>
    </header>

    {{-- 2. TENTANG KAMI SECTION --}}
    <section class="py-24 px-10 text-center max-w-4xl mx-auto">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest mb-8 text-slate-800">Tentang Kami</h3>
        <p class="text-gray-600 leading-loose text-lg italic px-4">
            "Indonesia memiliki keberagaman kuliner yang tak terhitung jumlahnya. Kami hadir untuk menyajikan hidangan nusantara dengan sentuhan modern dan bahan-bahan organik berkualitas."
        </p>
        <div class="mt-8 flex justify-center">
            <div class="w-12 h-1 bg-black"></div>
        </div>
    </section>

    {{-- 3. INFINITE CAROUSEL SECTION (PERBAIKAN FOTO & SPEED) --}}
    <section class="relative py-20 min-h-[650px] flex items-center overflow-hidden">
        {{-- Background Banner --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
                 class="absolute inset-0 w-full h-full object-cover" alt="Banner">
            <div class="absolute inset-0 bg-black/10"></div> {{-- Sedikit overlay biar card lebih pop-up --}}
        </div>
        
        {{-- Carousel Wrapper --}}
        <div class="relative z-10 w-full overflow-hidden">
            <div class="carousel-track">
                @php 
                    $cards = [
                        ['title' => 'Salad Bowl', 'img' => 'images/img-1.png', 'desc' => 'Keseimbangan dalam setiap suapan. Kadang yang kita butuhkan cuma semangkuk kebaikan alami.'],
                        ['title' => 'Salmon', 'img' => 'images/img-2.png', 'desc' =>'Nutrisi lengkap dalam satu piring. Protein berkualitas dari salmon panggang terbaik.'],
                        ['title' => 'Ramen Udang', 'img' => 'images/img-3.png', 'desc' => 'Jujur, perpaduan udang sama kuah ramennya nagih banget. Fix, ini favorit baru!'], 
                        ['title' => 'Charcuterie Board', 'img' => 'images/img-4.png', 'desc' => 'Berasa lagi piknik di Eropa kalau piringnya begini. Cakep dilihat dan enak dimakan.']
                    ]; 
                    // Kita gabung 3 kali biar transisi loopingnya nggak kelihatan patah
                    $infiniteCards = array_merge($cards, $cards, $cards);
                @endphp

                @foreach($infiniteCards as $card)
                    <div class="card-container">
                        <div class="bg-white p-8 pt-20 rounded-[40px] shadow-2xl text-center relative mt-16 group hover:-translate-y-3 transition-all duration-300 card-fixed-height border border-gray-100">
                            
                            {{-- Foto Melayang - Z-index ditinggiin supaya nggak ketutup --}}
                            <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 border-[8px] border-white rounded-full overflow-hidden shadow-xl bg-white z-20">
                                <img src="{{ asset($card['img']) }}" class="w-full h-full object-cover">
                            </div>

                            <h4 class="font-black text-xl mb-4 tracking-tight uppercase text-slate-900">{{ $card['title'] }}</h4>
                            <p class="text-gray-400 text-[12px] leading-relaxed">
                                {{ $card['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. BERITA KAMI SECTION --}}
    <section class="py-24 max-w-7xl mx-auto px-10">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16 text-slate-900">Berita Kami</h3>
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2 relative group overflow-hidden rounded-[40px] shadow-2xl h-[550px]">
                <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-10 flex flex-col justify-end text-white">
                    <h4 class="text-2xl font-extrabold leading-tight uppercase mb-4">Ulasan Kuliner Terbaik Pekan Ini</h4>
                    <p class="text-sm text-gray-300 mb-6 line-clamp-2">
                        Temukan rahasia dibalik hidangan lezat yang kami sajikan setiap harinya dengan bahan organik pilihan.
                    </p>
                    <a href="{{ url('/berita') }}" class="bg-yellow-400 text-black px-6 py-2 rounded-lg font-bold text-xs uppercase tracking-widest inline-block w-fit hover:bg-yellow-500 transition shadow-lg">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 grid grid-cols-2 gap-6">
                @php 
                    $news = [
                        ['title' => 'Resep Salad Buah', 'img' => 'images/sanket-shah-SVA7TyHxojY-unsplash.jpg', 'desc' => 'Kombinasi buah tropis dengan saus madu segar.'],
                        ['title' => 'Manfaat Sayur', 'img' => 'images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg', 'desc' => 'Mengapa sayuran hijau wajib ada di setiap piring Anda.'],
                        ['title' => 'Kopi Organik', 'img' => 'images/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg', 'desc' => 'Mengenal biji kopi tanpa pestisida untuk jantung.'],
                        ['title' => 'Tips Memasak', 'img' => 'images/luisa-brimble-HvXEbkcXjSk-unsplash.jpg', 'desc' => 'Teknik mengukus agar nutrisi tetap terjaga sempurna.']
                    ]; 
                @endphp
                @foreach($news as $item)
                    <div class="bg-white border border-gray-100 rounded-[35px] overflow-hidden hover:shadow-2xl transition-all duration-300 p-5 flex flex-col">
                        <img src="{{ asset($item['img']) }}" class="w-full h-36 object-cover rounded-[25px] mb-4 shadow-sm">
                        <h5 class="font-bold text-sm uppercase mb-2 text-slate-800">{{ $item['title'] }}</h5>
                        <p class="text-[10px] text-gray-500 mb-4 line-clamp-2">{{ $item['desc'] }}</p>
                        <a href="{{ url('/berita') }}" class="text-amber-500 font-extrabold text-[10px] uppercase mt-auto hover:text-amber-700"> Baca Selengkapnya → </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. GALERI SECTION --}}
    <section class="py-24 max-w-7xl mx-auto px-10">
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
                <div class="overflow-hidden rounded-[30px] group shadow-lg aspect-[4/3] border-4 border-white">
                    <img src="{{ asset($url) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Gallery">
                </div>
            @endforeach
        </div>
        <div class="mt-16 text-center">
            <a href="{{ url('/galeri') }}" class="inline-block bg-black text-white px-16 py-4 text-xs font-bold uppercase tracking-widest shadow-xl hover:bg-gray-900 transition rounded-xl">
                Lihat Lebih Banyak
            </a>
        </div>
    </section>
@endsection