@extends('layouts.app')

@section('title', 'Tentang Kami - Tasty Food')

@section('content')
    {{-- HEADER --}}
    <header class="relative h-[400px] flex items-center px-16 lg:px-24 mb-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
                 class="w-full h-full object-cover" alt="Banner">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        
        <div class="w-full relative z-10">
            <h1 class="text-6xl font-black text-white uppercase tracking-tighter italic drop-shadow-2xl text-center md:text-left">
                Tentang Kami
            </h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-10 py-10 space-y-32">
        
        {{-- SECTION TASTY FOOD (GAMBAR KANAN) --}}
        <section class="grid md:grid-cols-2 gap-16 items-center">
            <div class="pr-6">
                <h2 class="text-4xl font-black uppercase mb-8 tracking-tight">Tasty Food</h2>
                <div class="text-sm text-gray-600 leading-relaxed space-y-6">
                    <p class="font-bold text-gray-900 text-lg">
                        Menyajikan kelezatan otentik dengan sentuhan modern di setiap piring.
                    </p>
                    <p>
                        Tasty Food bermula dari semangat untuk menghadirkan kuliner nusantara yang tidak hanya memanjakan lidah, tetapi juga menjaga kualitas bahan yang digunakan. Kami percaya bahwa makanan yang baik bermula dari bahan yang jujur.
                    </p>
                </div>
            </div>
            
            {{-- Fix: Menggunakan aspect-ratio supaya tidak lonjong --}}
            <div class="flex items-center gap-6">
                <div class="w-1/2 aspect-[3/4]">
                    <img src="{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[35px] shadow-xl">
                </div>
                <div class="w-1/2 aspect-[3/4]">
                    <img src="{{ asset('images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[35px] shadow-xl">
                </div>
            </div>
        </section>

        {{-- SECTION VISI (GAMBAR KIRI) --}}
        <section class="grid md:grid-cols-2 gap-16 items-center bg-gray-50 rounded-[60px] p-12">
            {{-- Fix: Gambar Visi dibuat proporsional --}}
            <div class="grid grid-cols-2 gap-6 order-2 md:order-1">
                <div class="aspect-square"> {{-- Pakai aspect-square biar kotak sempurna --}}
                    <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[25px] shadow-md">
                </div>
                <div class="aspect-square">
                    <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" 
                         class="w-full h-full object-cover rounded-[25px] shadow-md">
                </div>
            </div>
            
            <div class="order-1 md:order-2 px-8">
                <h2 class="text-4xl font-black uppercase mb-6 tracking-tight">Visi</h2>
                <p class="text-xl text-gray-800 leading-relaxed font-semibold italic">
                    "Menjadi pelopor gaya hidup sehat melalui hidangan lezat yang diolah dengan bahan organik terbaik."
                </p>
            </div>
        </section>

        {{-- SECTION MISI (GAMBAR BAWAH) --}}
        <section class="grid md:grid-cols-2 gap-16 items-center pb-20">
            <div>
                <h2 class="text-4xl font-black uppercase mb-8 tracking-tight">Misi</h2>
                <p class="text-base text-gray-500 leading-loose">
                    Kami berkomitmen untuk terus berinovasi dalam menciptakan menu-menu baru yang memanjakan lidah dan memberikan nutrisi seimbang bagi tubuh.
                </p>
            </div>
            <div class="aspect-video w-full"> {{-- Pakai aspect-video biar melebar rapi --}}
                <img src="{{ asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" 
                     class="w-full h-full object-cover rounded-[45px] shadow-2xl border-[12px] border-white">
            </div>
        </section>
    </main>
@endsection