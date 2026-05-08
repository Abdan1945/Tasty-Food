@extends('layouts.app')

@section('title', 'Tentang Kami - Tasty Food')

@section('content')
    {{-- HEADER --}}
    <header class="relative h-[300px] md:h-[400px] flex items-center px-6 md:px-24 mb-10 md:mb-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
                 class="w-full h-full object-cover" alt="Banner">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        
        <div class="w-full relative z-10 text-center md:text-left">
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter italic drop-shadow-2xl">
                Tentang Kami
            </h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 md:px-10 py-5 space-y-24 md:space-y-32">
        
        {{-- SECTION TASTY FOOD --}}
        <section class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
            {{-- Teks --}}
            <div class="order-1">
                <h2 class="text-3xl md:text-4xl font-black uppercase mb-6 tracking-tight text-gray-900">Tasty Food</h2>
                <div class="text-base text-gray-600 leading-relaxed space-y-4">
                    <p class="font-bold text-gray-900 text-lg">
                        Menyajikan kelezatan otentik dengan sentuhan modern di setiap piring.
                    </p>
                    <p>
                        Tasty Food bermula dari semangat untuk menghadirkan kuliner nusantara yang tidak hanya memanjakan lidah, tetapi juga menjaga kualitas bahan yang digunakan. Kami percaya bahwa makanan yang baik bermula dari bahan yang jujur.
                    </p>
                </div>
            </div>
            
            {{-- Gambar (Dibuat Lebih Besar) --}}
            <div class="flex items-center gap-6 md:gap-8 order-2 px-2">
                <div class="w-[55%] aspect-[3/4]"> {{-- Ukuran dinaikkan ke 55% --}}
                    <img src="{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[35px] md:rounded-[40px] shadow-2xl">
                </div>
                <div class="w-[55%] aspect-[3/4] mt-12 md:mt-20"> {{-- Ukuran dinaikkan ke 55% --}}
                    <img src="{{ asset('images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[35px] md:rounded-[40px] shadow-2xl">
                </div>
            </div>
        </section>

        {{-- SECTION VISI --}}
        <section class="grid md:grid-cols-2 gap-12 md:gap-16 items-center bg-gray-50 rounded-[45px] md:rounded-[60px] p-8 md:p-16">
            {{-- Gambar Visi (Dibuat Lebih Besar) --}}
            <div class="grid grid-cols-2 gap-6 order-2 md:order-1 px-2">
                <div class="aspect-[3/4] md:aspect-square">
                    <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[30px] shadow-lg">
                </div>
                <div class="aspect-[3/4] md:aspect-square mt-10 md:mt-0">
                    <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[30px] shadow-lg">
                </div>
            </div>
            
            <div class="order-1 md:order-2 text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-black uppercase mb-6 tracking-tight text-gray-900">Visi</h2>
                <p class="text-lg md:text-xl text-gray-800 leading-relaxed font-semibold italic">
                    "Menjadi pelopor gaya hidup sehat melalui hidangan lezat yang diolah dengan bahan organik terbaik."
                </p>
            </div>
        </section>

        {{-- SECTION MISI --}}
        <section class="grid md:grid-cols-2 gap-12 md:gap-16 items-center pb-20">
            <div class="text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-black uppercase mb-6 tracking-tight text-gray-900">Misi</h2>
                <p class="text-base text-gray-500 leading-relaxed md:leading-loose px-2">
                    Kami berkomitmen untuk terus berinovasi dalam menciptakan menu-menu baru yang memanjakan lidah dan memberikan nutrisi seimbang bagi tubuh. Setiap langkah kami dedikasikan untuk kualitas tanpa kompromi.
                </p>
            </div>
            <div class="aspect-video w-full px-2">
                <img src="{{ asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" 
                     class="w-full h-full object-cover rounded-[40px] md:rounded-[50px] shadow-2xl border-[10px] md:border-[15px] border-white">
            </div>
        </section>
    </main>
@endsection