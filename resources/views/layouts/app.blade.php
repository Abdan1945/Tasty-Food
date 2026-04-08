<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Tasty Food</title>
    
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; overflow-x: hidden; margin: 0; padding: 0; }
        
        /* Utility untuk link footer agar tidak membingungkan */
        .footer-link { color: #6c757d; text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
        .footer-link:hover { color: #fff; padding-left: 5px; }

        .social-box { width: 40px; height: 40px; background: #222; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; transition: 0.3s; }
        .social-box:hover { background: #fff; color: #000; transform: translateY(-3px); }
    </style>
</head>

<body class="bg-white text-gray-900">

  <nav class="absolute top-0 left-0 w-full flex justify-between items-center px-16 lg:px-24 py-12 z-50 bg-transparent">
    
    {{-- LOGO: Hitam di Home/Tentang/Kontak, Putih di Berita/Galeri --}}
    <div class="{{ Request::is('berita', 'galeri','kontak','tentang') ? 'text-white' : 'text-black' }} font-extrabold italic tracking-tighter text-2xl uppercase transition-all duration-300">
        TASTY FOOD
    </div>

    {{-- MENU --}}
    <div class="hidden md:flex space-x-10 text-xs font-bold uppercase tracking-[0.2em]">
        @php 
            $links = ['home', 'tentang', 'berita', 'galeri', 'kontak']; 
            // Cek apakah halaman saat ini butuh teks putih (Berita & Galeri punya banner gelap)
            $isDarkPage = Request::is('berita', 'galeri', 'kontak','tentang');
        @endphp
        
        @foreach($links as $link)
            @php
                $isActive = Request::is($link) || (Request::is('/') && $link == 'home');
                
                // Tentukan warna dasar berdasarkan halaman
                $baseTextColor = $isDarkPage ? 'text-white' : 'text-black';
                
                // Tentukan opacity untuk yang tidak aktif
                $finalColor = $isActive ? $baseTextColor : ($isDarkPage ? 'text-white/50' : 'text-black/40');
            @endphp

            <a href="{{ url('/'.$link) }}" 
               class="{{ $finalColor }} {{ $isActive ? 'border-b-2' : '' }} {{ $isDarkPage ? 'border-white' : 'border-black' }} pb-1 hover:text-opacity-100 transition-all duration-300 no-underline">
               {{ ucfirst($link) }}
            </a>
        @endforeach
    </div>
</nav>
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-black text-white pt-20 pb-10 mt-20">
        <div class="w-full px-16 lg:px-24">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-2xl font-black italic uppercase mb-6 tracking-tighter">Tasty Food</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 pr-10">
                        Tempat terbaik untuk mengeksplorasi dunia kuliner nusantara dan internasional.
                    </p>
                   <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-6 shadow-2xl text-white text-2xl">
                    <img src="{{ asset('images/001-facebook.png') }}">
                    <img src="{{ asset('images/Group 67@2x.png') }}">
                </div>
                </div>

                <div>
                    <h6 class="font-bold uppercase mb-8 tracking-widest text-sm">Useful links</h6>
                    <ul class="list-none p-0 space-y-4">
                        <li><a href="#" class="footer-link">Blog</a></li>
                        <li><a href="#" class="footer-link">Hewan</a></li>
                        <li><a href="" class="footer-link">Galeri</a></li>
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
                    <h6 class="font-bold uppercase mb-8 tracking-widest text-sm">Contact Info</h6>
                    <ul class="list-none p-0 space-y-5 text-gray-400 text-sm">
                        <li class="flex items-center"><i class="bi bi-envelope-fill mr-4 text-white"></i> tastyfood@gmail.com</li>
                        <li class="flex items-center"><i class="bi bi-telephone-fill mr-4 text-white"></i> +62 89528446317</li>
                        <li class="flex items-start"><i class="bi bi-geo-alt-fill mr-4 text-white"></i> Kota Bandung, Jawa Barat</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-20 pt-8 text-center text-gray-500 text-[10px] uppercase tracking-widest">
                COPYRIGHT ©2026 ALL RIGHTS RESERVED | TASTY FOOD
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>