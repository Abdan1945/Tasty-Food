<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Tasty Food</title>
    
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    @stack('styles')
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden; 
            margin: 0; 
            padding: 0; 
        }
        
        main {
            flex-grow: 1;
        }

        .footer-link { 
            color: #6c757d; 
            text-decoration: none; 
            font-size: 0.9rem; 
            transition: 0.3s; 
        }
        .footer-link:hover { 
            color: #fff; 
            padding-left: 5px; 
        }

        .social-box { 
            width: 40px; 
            height: 40px; 
            background: #222; 
            color: #fff; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            border-radius: 50%; 
            text-decoration: none; 
            transition: 0.3s; 
        }
        .social-box:hover { 
            background: #fff; 
            color: #000; 
            transform: translateY(-3px); 
        }
    </style>
</head>

<body class="bg-white text-gray-900">

    {{-- NAVBAR --}}
    @if(!Request::is('login') && !Request::is('register'))
    <nav class="absolute top-0 left-0 w-full flex items-center px-16 lg:px-24 py-12 z-[100] bg-transparent">
        <div class="flex items-center w-full">
            
            {{-- 1. LOGO --}}
            <div class="{{ Request::is('berita', 'galeri','kontak','tentang', 'dashboard') ? 'text-white' : 'text-black' }} font-extrabold italic tracking-tighter text-2xl uppercase mr-16">
                TASTY FOOD
            </div>

            {{-- 2. MENU NAVIGASI (DI KIRI) --}}
            <div class="hidden md:flex items-center space-x-10 text-xs font-bold uppercase tracking-[0.2em] flex-1">
                @php 
                    $links = ['home', 'tentang', 'berita', 'galeri', 'kontak']; 
                    $isDarkPage = Request::is('berita', 'galeri', 'kontak','tentang', 'dashboard');
                @endphp
                
                @foreach($links as $link)
                    @php
                        $isActive = Request::is($link) || (Request::is('/') && $link == 'home');
                        $baseTextColor = $isDarkPage ? 'text-white' : 'text-black';
                        $finalColor = $isActive ? $baseTextColor : ($isDarkPage ? 'text-white/50' : 'text-black/40');
                    @endphp

                    <a href="{{ url('/'.$link) }}" 
                       class="{{ $finalColor }} {{ $isActive ? 'border-b-2' : '' }} {{ $isDarkPage ? 'border-white' : 'border-black' }} pb-1 hover:text-opacity-100 transition-all duration-300 no-underline">
                       {{ ucfirst($link) }}
                    </a>
                @endforeach
            </div>

            {{-- 3. PROFILE AREA (DI KANAN POJOK) --}}
            <div class="flex items-center border-l {{ $isDarkPage ? 'border-white/20' : 'border-black/10' }} pl-8 ml-4">
                @auth
                    <div class="flex items-center gap-6">
                        {{-- Tombol Dashboard Baru --}}
                        <a href="{{ url('/dashboard') }}" class="text-[10px] font-black {{ $isDarkPage ? 'text-white' : 'text-black' }} uppercase tracking-widest border border-current px-4 py-2 rounded-full hover:bg-orange-500 hover:border-orange-500 hover:text-white transition-all">
                            Dashboard
                        </a>

                        <div class="flex items-center gap-3">
                            <div class="flex flex-col items-end leading-tight">
                                <span class="text-[10px] font-black {{ $isDarkPage ? 'text-white' : 'text-black' }} uppercase tracking-tighter">
                                    {{ Auth::user()->name }}
                                </span>
                                {{-- Tombol Logout yang lebih rapi --}}
                                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 leading-none mt-1">
                                    @csrf
                                    <button type="submit" class="text-[9px] font-bold text-red-500 uppercase hover:text-red-700 transition-colors">
                                        <i class="bi bi-power"></i> Logout
                                    </button>
                                </form>
                            </div>
                            {{-- Avatar Lingkaran --}}
                            <div class="w-10 h-10 {{ $isDarkPage ? 'bg-white text-black' : 'bg-black text-white' }} rounded-full flex items-center justify-center text-[11px] font-black shadow-lg border-2 {{ $isDarkPage ? 'border-white' : 'border-black' }}">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" 
                       class="{{ $isDarkPage ? 'bg-white text-black' : 'bg-black text-white' }} px-8 py-2.5 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-orange-500 hover:text-white transition-all shadow-md">
                        Login
                    </a>
                @endguest
            </div>

        </div>
    </nav>
    @endif

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @if(!Request::is('login') && !Request::is('register'))
    <footer class="bg-black text-white pt-20 pb-10 mt-20">
        <div class="w-full px-16 lg:px-24">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-2xl font-black italic uppercase mb-6 tracking-tighter">Tasty Food</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 pr-10">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores incidunt mollitia iure.
                    </p>
                    <div class="flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 bg-[#3b5998] rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition overflow-hidden">
                            <img src="{{ asset('images/001-facebook.png') }}" class="w-7 h-7 object-contain" alt="Facebook">
                        </div>
                        <div class="w-10 h-10 bg-[#55acee] rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
                            <img src="{{ asset('images/002-twitter.png') }}" class="w-7 h-7 object-contain" alt="Twitter">
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="font-bold uppercase mb-8 tracking-widest text-sm">Useful links</h6>
                    <ul class="list-none p-0 space-y-4">
                        <li><a href="#" class="footer-link">Blog</a></li>
                        <li><a href="#" class="footer-link">Hewan</a></li>
                        <li><a href="{{ url('/galeri') }}" class="footer-link">Galeri</a></li>
                        <li><a href="#" class="footer-link">Testimonial</a></li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold uppercase mb-8 tracking-widest text-sm">Privacy</h6>
                    <ul class="list-none p-0 space-y-4">
                        <li><a href="#" class="footer-link">Karir</a></li>
                        <li><a href="#" class="footer-link">Tentang Kami</a></li>
                        <li><a href="#" class="footer-link">Kontak Kami</a></li>
                        <li><a href="#" class="footer-link">Servis</a></li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold uppercase mb-8 tracking-widest text-sm text-white">Contact Info</h6>
                    <ul class="list-none p-0 space-y-4 text-gray-400 text-sm">
                        <li class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0 mr-4 flex items-center justify-center">
                                <img src="{{ asset('images/Group 66.png') }}" class="max-w-full max-h-full object-contain" alt="Mail">
                            </div>
                            <span>tastyfood@gmail.com</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0 mr-4 flex items-center justify-center">
                                <img src="{{ asset('images/Group 67.png') }}" class="max-w-full max-h-full object-contain" alt="Phone">
                            </div>
                            <span>+62 89528446317</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-10 h-10 flex-shrink-0 mr-4 flex items-center justify-center">
                                <img src="{{ asset('images/Group 68.png') }}" class="max-w-full max-h-full object-contain" alt="Location">
                            </div>
                            <span>Kota Bandung, Jawa Barat</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-20 pt-8 text-center text-gray-500 text-[10px] uppercase tracking-widest">
                COPYRIGHT ©2026 ALL RIGHTS RESERVED | TASTY FOOD
            </div>
        </div>
    </footer>
    @endif

    @stack('scripts')
</body>
</html>