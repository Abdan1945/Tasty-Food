@extends('layouts.app')

@section('title', 'Tentang Kami - Tasty Food')

@section('content')
    <header class="relative h-[400px] flex items-center px-10 mb-20 bg-gray-200 overflow-hidden">
        <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
             class="absolute inset-0 w-full h-full object-cover" alt="Banner">
    </div>
        
        <div class="max-w-7xl mx-auto w-full relative z-10">
            <h1 class="text-6xl font-black text-white uppercase tracking-tighter italic">Tentang Kami</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-10 py-10 space-y-32">
        
        <section class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black uppercase mb-8 tracking-tight border-b-4 border-yellow-500 inline-block">Tasty Food</h2>
                <div class="text-sm text-gray-500 leading-relaxed space-y-6">
                    <p class="font-bold text-gray-900 text-lg">
                        Menyajikan kelezatan otentik dengan sentuhan modern di setiap piring.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus.
                    </p>
                </div>
            </div>
            <div class="flex gap-6">
                <img src="images/brooke-lark-oaz0raysASk-unsplash.jpg" 
                     class="w-1/2 h-[450px] object-cover rounded-[50px] shadow-2xl">
                <img src="images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg" 
                     class="w-1/2 h-[450px] object-cover rounded-[50px] shadow-2xl mt-16">
            </div>
        </section>

        <section class="grid md:grid-cols-2 gap-16 items-center bg-gray-50 rounded-[60px] p-12">
            <div class="grid grid-cols-2 gap-6 order-2 md:order-1">
                <img src="images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg" 
                     class="w-full h-64 object-cover rounded-[40px] shadow-lg">
                <img src="images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg" 
                     class="w-full h-64 object-cover rounded-[40px] shadow-lg mt-8">
            </div>
            <div class="order-1 md:order-2">
                <h2 class="text-4xl font-black uppercase mb-8 tracking-tight">Visi</h2>
                <p class="text-lg text-gray-600 leading-loose italic font-light">
                    "Menjadi pelopor gaya hidup sehat melalui hidangan lezat yang diolah dengan bahan organik terbaik."
                </p>
            </div>
        </section>

        <section class="grid md:grid-cols-2 gap-16 items-center pb-20">
            <div>
                <h2 class="text-4xl font-black uppercase mb-8 tracking-tight">Misi</h2>
                <p class="text-sm text-gray-500 leading-loose">
                    Kami berkomitmen untuk terus berinovasi dalam menciptakan menu-menu baru yang memanjakan lidah dan memberikan nutrisi seimbang.
                </p>
            </div>
            <div class="relative">
                <img src="images/sanket-shah-SVA7TyHxojY-unsplash.jpg" 
                     class="w-full h-[400px] object-cover rounded-[60px] shadow-2xl border-[15px] border-white">
            </div>
        </section>
    </main>
@endsection