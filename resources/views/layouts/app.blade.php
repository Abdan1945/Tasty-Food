<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Tasty Food</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .footer-link { color: #6c757d; text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
        .footer-link:hover { color: #fff; padding-left: 5px; }
        .social-box { width: 40px; height: 40px; background: #222; color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; transition: 0.3s; }
        .social-box:hover { background: #fff; color: #000; transform: translateY(-3px); }
        .footer-grid { display: grid; gap: 2rem; }
        @media (min-width: 768px) { .footer-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1024px) { .footer-grid { grid-template-columns: 2fr 1fr 1fr 2fr; } }
    </style>
</head>
<body class="bg-white text-gray-900">

    <nav class="flex justify-between items-center px-10 py-8 max-w-7xl mx-auto">
        <div class="text-2xl font-extrabold tracking-tighter italic">TASTY FOOD</div>
        <div class="hidden md:flex space-x-10 text-xs font-bold uppercase tracking-[0.2em] text-gray-400">
            <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'text-black border-b-2 border-black pb-1' : 'hover:text-black transition' }}">Home</a>
            <a href="{{ url('/tentang') }}" class="{{ Request::is('tentang') ? 'text-black border-b-2 border-black pb-1' : 'hover:text-black transition' }}">Tentang</a>
            <a href="{{ url('/berita') }}" class="{{ Request::is('berita') ? 'text-black border-b-2 border-black pb-1' : 'hover:text-black transition' }}">Berita</a>
            <a href="{{ url('/galeri') }}" class="{{ Request::is('galeri') ? 'text-black border-b-2 border-black pb-1' : 'hover:text-black transition' }}">Galeri</a>
            <a href="{{ url('/kontak') }}" class="{{ Request::is('kontak') ? 'text-black border-b-2 border-black pb-1' : 'hover:text-black transition' }}">Kontak</a>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-black text-white pt-20 pb-10 px-10 mt-20">
        <div class="max-w-7xl mx-auto">
            <div class="footer-grid">
                <div>
                    <h4 class="text-2xl font-black italic uppercase mb-6 tracking-tighter">Tasty Food</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8 pr-10">
                        Tempat terbaik untuk mengeksplorasi dunia kuliner nusantara dan internasional dengan ulasan mendalam dari para ahli masak.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="social-box"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-box"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>

                <div>
                    <h6 class="font-bold text-white uppercase mb-8 tracking-widest text-sm">Useful links</h6>
                    <ul class="space-y-4 list-none p-0">
                        <li><a href="#" class="footer-link">Blog</a></li>
                        <li><a href="#" class="footer-link">Hewan</a></li>
                        <li><a href="#" class="footer-link">Galeri</a></li>
                        <li><a href="#" class="footer-link">Testimonial</a></li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-white uppercase mb-8 tracking-widest text-sm">Privacy</h6>
                    <ul class="space-y-4 list-none p-0">
                        <li><a href="#" class="footer-link">Karir</a></li>
                        <li><a href="#" class="footer-link">Tentang Kami</a></li>
                        <li><a href="#" class="footer-link">Kontak Kami</a></li>
                        <li><a href="#" class="footer-link">Servis</a></li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-bold text-white uppercase mb-8 tracking-widest text-sm">Contact Info</h6>
                    <ul class="space-y-5 list-none p-0">
                        <li class="flex items-center text-gray-400 text-sm">
                            <i class="bi bi-envelope-fill mr-4 text-white"></i> tastyfood@gmail.com
                        </li>
                        <li class="flex items-center text-gray-400 text-sm">
                            <i class="bi bi-telephone-fill mr-4 text-white"></i> +62 89528446317
                        </li>
                        <li class="flex items-start text-gray-400 text-sm">
                            <i class="bi bi-geo-alt-fill mr-4 text-white"></i> Kota Bandung, Jawa Barat
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-20 pt-8 text-center text-gray-500 text-[10px] uppercase tracking-widest">
                COPYRIGHT ©2026 ALL RIGHTS RESERVED | TASTY FOOD
            </div>
        </div>
    </footer>

</body>
</html>