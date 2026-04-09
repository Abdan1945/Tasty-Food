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
    <header class="relative w-full h-[400px] flex items-center overflow-hidden">
        {{-- Gambar Latar --}}
        <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
             class="absolute inset-0 w-full h-full object-cover" alt="Banner">
        
         <div class="w-full px-18 lg:px-20 relative z-10">
            <h1 class="text-6xl font-black text-white uppercase tracking-tighter m-0">
                GALERI KAMI
            </h1>
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
                            <img src="images/ella-olsson-mmnKI8kMxpc-unsplash.jpg" class="w-full h-full object-cover" alt="Food 1">
                        </div>
                    </div>
                    
                </div>
                
                {{-- Tombol Navigasi --}}
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            {{-- Grid Gallery --}}
            <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-6 md:grid-cols-4 gap-6">
        @php 
            // Pastikan total ada 12 gambar agar terbentuk 3 baris (4x3)
            $gambarGaleri = [
                'anh-nguyen-kcA-c3f_3FE-unsplash.jpg',
                'anna-pelzer-IGfIGP5ONV0-unsplash.jpg', 
                'brooke-lark-1Rm9GLHV0UA-unsplash.jpg', 
                'brooke-lark-nBtmglfY0HU-unsplash.jpg',
                'brooke-lark-oaz0raysASk-unsplash.jpg',
                'eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg',
                'fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
                'jimmy-dean-Jvw3pxgeiZw-unsplash.jpg',
                'luisa-brimble-HvXEbkcXjSk-unsplash.jpg',
                'sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
                'sanket-shah-SVA7TyHxojY-unsplash.jpg',
                'monika-grabkowska-P1aohbiT-EY-unsplash.jpg'
            ]; 
        @endphp

        @foreach($gambarGaleri as $img)
        <div class="group">
            {{-- Ukuran aspect-square dan rounded yang pas agar mirip referensi --}}
            <div class="aspect-square rounded-[30px] md:rounded-[40px] overflow-hidden shadow-lg bg-white">
                <img src="{{ asset('images/' . $img) }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                     alt="Tasty Food Gallery">
            </div>
        </div>
        @endforeach
    </div>
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