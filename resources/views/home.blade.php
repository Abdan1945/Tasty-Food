@extends('layouts.app')

@section('title', 'Healthy & Delicious')

@section('content')
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
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-gray-100 rounded-full -z-10"></div>
            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" 
                 alt="Healthy Food" 
                 class="w-full max-w-[500px] aspect-square object-cover rounded-full shadow-2xl border-[15px] border-white">
        </div>
    </header>

    <section class="py-24 px-10 text-center max-w-4xl mx-auto">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest mb-8">Tentang Kami</h3>
        <p class="text-gray-600 leading-loose text-lg italic px-4">
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem. Nullam vitae dignissim neque, sed pulvinar sem."
        </p>
        <div class="mt-8 flex justify-center">
            <div class="w-12 h-1 bg-black"></div>
        </div>
    </section>

    <section class="relative py-40 px-10 min-h-[600px] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" class="w-full h-full object-cover brightness-[0.25]">
        </div>
        
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10 w-full">
            @php 
                $cards = [
                    ['title' => 'Salad Segar', 'img' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd'],
                    ['title' => 'Sayuran', 'img' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061'],
                    ['title' => 'COFFEE', 'img' => 'https://images.unsplash.com/photo-1547592166-23ac45744acd'], 
                    ['title' => 'LOREM IPSUM', 'img' => 'https://images.unsplash.com/photo-1467003909585-2f8a72700288']
                ]; 
            @endphp
    
            @foreach($cards as $card)
                <div class="bg-white p-8 pt-20 rounded-[40px] shadow-2xl text-center relative mt-16 md:mt-0 group hover:-translate-y-2 transition-transform duration-300">
                    <div class="absolute -top-16 left-1/2 -translate-x-1/2 w-32 h-32 border-[8px] border-white rounded-full overflow-hidden shadow-lg bg-gray-200">
                        <img src="{{ $card['img'] }}?w=400&auto=format&fit=crop" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-black text-xl mb-4 tracking-tight uppercase">{{ $card['title'] }}</h4>
                    <p class="text-gray-400 text-xs leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-24 max-w-7xl mx-auto px-10">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16">Berita Kami</h3>
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2 relative group overflow-hidden rounded-[40px] shadow-2xl h-[550px]">
                <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent p-10 flex flex-col justify-end text-white">
                    <h4 class="text-2xl font-extrabold leading-tight uppercase mb-4">Ulasan Kuliner Terbaik Pekan Ini</h4>
                    <p class="text-sm text-gray-300 mb-6 line-clamp-2">Temukan rahasia dibalik hidangan lezat yang kami sajikan setiap harinya dengan bahan organik pilihan.</p>
                    <a href="{{ url('/berita') }}" class="text-yellow-400 font-bold text-xs uppercase tracking-widest">Baca Selengkapnya →</a>
                </div>
            </div>

            <div class="md:w-1/2 grid grid-cols-2 gap-6">
                @for($i = 1; $i <= 4; $i++)
                    <div class="bg-white border border-gray-100 rounded-[35px] overflow-hidden hover:shadow-2xl transition-shadow p-5 flex flex-col">
                        <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?w=400" class="w-full h-36 object-cover rounded-[25px] mb-4">
                        <h5 class="font-bold text-sm uppercase mb-2">Resep Sehat #{{ $i }}</h5>
                        <p class="text-[10px] text-gray-500 mb-4 line-clamp-2">Tips mengolah sayuran agar nutrisi tetap terjaga sempurna.</p>
                        <a href="#" class="text-yellow-500 font-extrabold text-[10px] uppercase mt-auto">Baca Selengkapnya</a>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-24 max-w-7xl mx-auto px-10">
        <h3 class="text-3xl font-extrabold uppercase tracking-widest text-center mb-16">Galeri Kami</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @php 
                $gallery = [
                    'https://images.unsplash.com/photo-1504674900247-0877df9cc836',
                    'https://images.unsplash.com/photo-1543353071-873f17a7a088',
                    'https://images.unsplash.com/photo-1555939594-58d7cb561ad1',
                    'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe',
                    'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38',
                    'https://images.unsplash.com/photo-1547592166-23ac45744acd'
                ]; 
            @endphp
            
            @foreach($gallery as $url)
                <div class="overflow-hidden rounded-[30px] group shadow-lg aspect-[4/3]">
                    <img src="{{ $url }}?w=600&auto=format&fit=crop" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                         alt="Tasty Food Gallery">
                </div>
            @endforeach
        </div>
        <div class="mt-16 text-center">
            <a href="{{ url('/galeri') }}" class="inline-block bg-black text-white px-16 py-4 text-xs font-bold uppercase tracking-widest shadow-xl hover:bg-gray-900 transition">
                Lihat Lebih Banyak
            </a>
        </div>
    </section>
@endsection