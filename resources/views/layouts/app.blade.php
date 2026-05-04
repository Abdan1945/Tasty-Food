<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Tasty Food</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    @stack('styles')
    
    <style>
        body { font-family: 'Poppins', sans-serif; display: flex; flex-direction: column; min-height: 100vh; overflow-x: hidden; margin: 0; }
        main { flex-grow: 1; }
        .nav-link-item { position: relative; transition: all 0.3s ease; }
        .nav-link-item::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -4px; left: 0; background-color: currentColor; transition: width 0.3s ease; }
        .nav-link-item:hover::after { width: 100%; }
        #mobile-menu { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); transform: translateX(100%); }
        #mobile-menu.active { transform: translateX(0); }
        .footer-link { color: #6c757d; font-size: 0.9rem; transition: 0.3s; text-decoration: none; }
        .footer-link:hover { color: #fff; padding-left: 5px; }
    </style>
</head>
<body class="bg-white text-gray-900">

    {{-- PANGGIL NAVBAR --}}
    @if(!Request::is('login') && !Request::is('register'))
        @include('layouts.partials.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    {{-- PANGGIL FOOTER --}}
    @if(!Request::is('login') && !Request::is('register'))
        @include('layouts.partials.footer')
    @endif

    <script>
        // Script Hamburger tetap di sini biar global
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        const l1 = document.getElementById('line1');
        const l2 = document.getElementById('line2');
        const l3 = document.getElementById('line3');

        if(btn) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('active');
                l1.classList.toggle('rotate-45');
                l1.classList.toggle('translate-y-2');
                l2.classList.toggle('opacity-0');
                l3.classList.toggle('-rotate-45');
                l3.classList.toggle('-translate-y-2');

                const lines = [l1, l2, l3];
                lines.forEach(line => {
                    if(menu.classList.contains('active')) {
                        line.style.backgroundColor = 'white';
                        document.body.style.overflow = 'hidden'; 
                    } else {
                        line.style.backgroundColor = ''; 
                        document.body.style.overflow = 'auto';
                    }
                });
            });
        }
    </script>
    @stack('scripts')
</body>
</html>