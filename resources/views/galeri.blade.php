@extends('layouts.app')

@section('title', 'Tasty Food | Galeri Kami')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Mengatur ukuran Swiper agar konsisten */
    .mySwiper {
        width: 100%;
        height: auto;
        padding-bottom: 20px;
    }

    /* Memastikan slide tidak bertumpuk */
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Custom Swiper Button agar putih bulat sempurna */
    .swiper-button-next, .swiper-button-prev {
        background-color: white;
        width: 45px !important;
        height: 45px !important;
        border-radius: 50%;
        color: black !important;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        z-index: 20;
    }

    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 18px !important;
        font-weight: bold;
    }
</style>
@endpush

@section('content')
    {{-- Hero Header Section --}}
    <header class="relative h-[450px] bg-cover bg-center px-12 flex items-center" 
            style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop');">
        
        <div class="relative z-10 max-w-7xl mx-auto w-full">
            <h1 class="text-6xl font-extrabold text-white uppercase tracking-tighter">GALERI KAMI</h1>
        </div>
        
        <div class="absolute inset-0 bg-black/40"></div>
    </header>

    {{-- Main Content --}}
    <main class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            
            {{-- Swiper Slider --}}
            <div class="swiper mySwiper mb-16 relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="w-full rounded-[30px] md:rounded-[50px] overflow-hidden shadow-2xl h-[300px] md:h-[500px]">
                            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" class="w-full h-full object-cover" alt="Food 1">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="w-full rounded-[30px] md:rounded-[50px] overflow-hidden shadow-2xl h-[300px] md:h-[500px]">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd" class="w-full h-full object-cover" alt="Food 2">
                        </div>
                    </div>
                </div>
                
                {{-- Tombol Navigasi --}}
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            {{-- Grid Gallery --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php 
                    $gambarGaleri = [
                        'photo-1490645935967-10de6ba17061', 'photo-1547592166-23ac45744acd', 
                        'photo-1504674900247-0877df9cc836', 'photo-1540189549336-e6e99c3679fe',
                        'photo-1565299624946-b28f40a0ae38', 'photo-1555939594-58d7cb561ad1',
                        'photo-1493770348161-369560ae357d', 'photo-1543353071-873f17a7a088'
                    ]; 
                @endphp

                @foreach($gambarGaleri as $img)
                <div class="aspect-square rounded-[30px] md:rounded-[40px] overflow-hidden shadow-lg group">
                    <img src="https://images.unsplash.com/{{ $img }}?w=600&auto=format&fit=crop" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                         alt="Tasty Food Gallery">
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, // Memastikan hanya 1 slide yang tampil
            spaceBetween: 30, // Jarak antar slide
            loop: true,
            centeredSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });
    });
</script>
@endpush