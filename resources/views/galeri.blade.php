@extends('layouts.app')

@section('title', 'Tasty Food | Galeri Kami')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Container utama swiper */
    .mySwiper {
        width: 100%;
        padding: 40px 0;
    }

    /* Setiap slide */
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Styling gambar slider */
    .slide-image {
        width: 100%;
        height: 280px;
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    @media (min-width: 768px) {
        .slide-image {
            height: 420px;
        }
    }

    .slide-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Tombol navigasi */
    .swiper-button-next,
    .swiper-button-prev {
        background-color: #ffffff;
        width: 45px !important;
        height: 45px !important;
        border-radius: 50%;
        color: #000 !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 10;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 16px !important;
        font-weight: bold;
    }

    .swiper-button-prev {
        left: 10px;
    }

    .swiper-button-next {
        right: 10px;
    }
</style>
@endpush

@section('content')
    {{-- Hero Header --}}
    <header class="relative w-full h-[400px] flex items-center overflow-hidden">
        <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}"
             class="absolute inset-0 w-full h-full object-cover" alt="Banner">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="w-full px-10 lg:px-20 relative z-10">
            <h1 class="text-5xl md:text-6xl font-black text-white uppercase tracking-tight">
                GALERI KAMI
            </h1>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Swiper Slider --}}
            @php
                $sliderImages = [
                    'ella-olsson-mmnKI8kMxpc-unsplash.jpg',
                    'brooke-lark-1Rm9GLHV0UA-unsplash.jpg',
                    'brooke-lark-nBtmglfY0HU-unsplash.jpg',
                    'brooke-lark-oaz0raysASk-unsplash.jpg',
                ];
            @endphp

            <div class="swiper mySwiper mb-16 relative">
                <div class="swiper-wrapper">
                    @foreach($sliderImages as $img)
                        <div class="swiper-slide">
                            <div class="slide-image">
                                <img src="{{ asset('images/' . $img) }}" alt="Tasty Food Slider">
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Tombol Navigasi --}}
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            {{-- Grid Gallery: 3 Baris x 4 Kolom --}}
            @php 
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

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($gambarGaleri as $img)
                    <div class="group">
                        <div class="aspect-square rounded-[30px] overflow-hidden shadow-lg bg-white">
                            <img src="{{ asset('images/' . $img) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                 alt="Tasty Food Gallery">
                        </div>
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
        new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
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