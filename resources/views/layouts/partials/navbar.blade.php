<nav class="absolute top-0 left-0 w-full flex items-center px-6 md:px-16 lg:px-24 py-8 md:py-12 z-[110] bg-transparent">
    <div class="flex items-center w-full">
        {{-- LOGO --}}
        <div class="{{ Request::is('berita*', 'galeri','kontak','tentang', 'dashboard') ? 'text-white' : 'text-black' }} font-extrabold italic tracking-tighter text-xl md:text-2xl uppercase z-[120] mr-16">
            TASTY FOOD
        </div>

        {{-- MENU NAVIGASI --}}
        <div class="hidden md:flex items-center space-x-10 text-xs font-bold uppercase tracking-[0.2em]">
            @php 
                $links = ['home', 'tentang', 'berita', 'galeri', 'kontak']; 
                $isDarkPage = Request::is('berita*', 'galeri*', 'kontak*', 'tentang*', 'dashboard*');
            @endphp
            
            @foreach($links as $link)
                @php
                    $isActive = Request::is($link) || (Request::is('/') && $link == 'home');
                    $baseTextColor = $isDarkPage ? 'text-white' : 'text-black';
                    $finalColor = $isActive ? $baseTextColor : ($isDarkPage ? 'text-white/50' : 'text-black/40');
                @endphp
                <a href="{{ url('/'.$link) }}" class="nav-link-item {{ $finalColor }} {{ $isActive ? 'border-b-2' : '' }} {{ $isDarkPage ? 'border-white' : 'border-black' }} pb-1 no-underline uppercase">
                    {{ ucfirst($link) }}
                </a>
            @endforeach
        </div>

        {{-- LOGIN / HAMBURGER --}}
        <div class="ml-auto flex items-center">
            <div class="hidden md:flex items-center border-l {{ $isDarkPage ? 'border-white/20' : 'border-black/10' }} pl-8 ml-4">
                @auth
                    <div class="w-10 h-10 {{ $isDarkPage ? 'bg-white text-black' : 'bg-black text-white' }} rounded-full flex items-center justify-center text-[11px] font-black border-2 {{ $isDarkPage ? 'border-white' : 'border-black' }}">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="{{ $isDarkPage ? 'bg-white text-black' : 'bg-black text-white' }} px-8 py-2.5 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-orange-500 transition-all no-underline">Login</a>
                @endguest
            </div>

            <button id="hamburger-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 z-[120]">
                <span class="w-6 h-0.5 {{ $isDarkPage ? 'bg-white' : 'bg-black' }} mb-1.5 transition-all duration-300" id="line1"></span>
                <span class="w-6 h-0.5 {{ $isDarkPage ? 'bg-white' : 'bg-black' }} mb-1.5 transition-all duration-300" id="line2"></span>
                <span class="w-6 h-0.5 {{ $isDarkPage ? 'bg-white' : 'bg-black' }} transition-all duration-300" id="line3"></span>
            </button>
        </div>
    </div>
</nav>

{{-- MOBILE MENU OVERLAY --}}
<div id="mobile-menu" class="fixed inset-0 bg-black z-[115] flex flex-col items-center justify-center space-y-8 md:hidden">
    @foreach(['home', 'tentang', 'berita', 'galeri', 'kontak'] as $link)
        <a href="{{ url('/'.$link) }}" class="text-white text-2xl font-black uppercase tracking-widest no-underline hover:text-orange-500 transition">{{ $link }}</a>
    @endforeach
</div>