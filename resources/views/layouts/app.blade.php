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

    {{-- 
        NAVBAR: 
        Dibuat 'absolute' agar menimpa konten di bawahnya (Hero Image).
        'z-50' memastikan navbar tetap di lapisan paling atas.
    --}}
    <nav class="absolute top-0 left-0 w-full flex justify-between items-center px-16 lg:px-24 py-10 z-50 bg-transparent">
        <div class="text-2xl font-extrabold tracking-tighter italic text-white">TASTY FOOD</div>

        <div class="hidden md:flex space-x-10 text-xs font-bold uppercase tracking-[0.2em]">
            @php $links = ['home', 'tentang', 'berita', 'galeri', 'kontak']; @endphp
            @foreach($links as $link)
                <a href="{{ url('/'.$link) }}" 
                   class="{{ Request::is($link) ? 'text-white border-b-2 border-white pb-1' : 'text-gray-300 hover:text-white transition' }} no-underline">
                   {{ ucfirst($link) }}
                </a>
            @endforeach
        </div>
    </nav>

    {{-- ISI KONTEN --}}
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
                    <div class="flex gap-4">
                        <a href="#" class="social-box"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-box"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>

                <div>
                    <h6 class="font-bold uppercase mb-8 tracking-widest text-sm">Useful links</h6>
                    <ul class="list-none p-0 space-y-4">
                        <li><a href="#" class="footer-link">Blog</a></li>
                        <li><a href="#" class="footer-link">Hewan</a></li>
                        <li><a href="#" class="footer-link">Galeri</a></li>
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