<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Tasty Food</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-[#1b1b18] text-white flex flex-col sticky top-0 h-screen">
            <div class="p-6">
                <h1 class="text-xl font-black italic tracking-tighter uppercase">TASTY FOOD</h1>
                <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">Admin Panel</p>
            </div>
            
            <nav class="flex-1 px-4 space-y-2">
                {{-- Menu Dashboard --}}
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg {{ Request::is('dashboard') ? 'bg-orange-500 text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }} transition-all duration-300">
                    <i class="bi bi-speedometer2"></i> 
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                {{-- Link Lihat Website --}}
                <a href="{{ url('/home') }}" target="_blank" class="flex items-center gap-3 p-3 rounded-lg text-gray-400 hover:bg-white/5 hover:text-white transition-all duration-300 border border-transparent hover:border-white/10">
                    <i class="bi bi-globe"></i> 
                    <span class="text-sm font-medium">Lihat Website</span>
                </a>

                <div class="pt-4 pb-2 px-3">
                    <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Manajemen</p>
                </div>

                {{-- Kelola Berita --}}
                <a href="{{ route('berita.index') }}" 
                   class="flex items-center gap-3 p-3 rounded-lg transition-all duration-300 {{ Request::is('dashboard/berita*') ? 'bg-orange-500 text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-newspaper"></i> 
                    <span class="text-sm font-medium">Kelola Berita</span>
                </a>

                {{-- Galeri Foto (DISESUAIKAN: admin.galeri -> galeri.index) --}}
                <a href="{{ route('galeri.index') }}" 
                   class="flex items-center gap-3 p-3 rounded-lg transition-all duration-300 {{ Request::is('dashboard/galeri*') ? 'bg-orange-500 text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-images"></i> 
                    <span class="text-sm font-medium">Galeri Foto</span>
                </a>

                {{-- Kelola User --}}
                <a href="{{ route('admin.users') }}" 
                   class="flex items-center gap-3 p-3 rounded-lg transition-all duration-300 {{ Request::is('dashboard/users*') ? 'bg-orange-500 text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                    <i class="bi bi-people"></i> 
                    <span class="text-sm font-medium">Kelola User</span>
                </a>
            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-white/10">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 p-3 w-full text-red-400 hover:bg-red-500/10 rounded-lg transition-all duration-300 group">
                        <i class="bi bi-box-arrow-left group-hover:-translate-x-1 transition-transform"></i> 
                        <span class="text-sm font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <h2 class="font-bold text-gray-800 tracking-tight">@yield('page_title')</h2>
                </div>

                <div class="flex items-center gap-6">
                    <a href="{{ url('/home') }}" target="_blank" class="text-xs font-bold text-gray-400 hover:text-orange-500 transition-colors flex items-center gap-2 uppercase tracking-tighter">
                        Web Depan <i class="bi bi-arrow-up-right"></i>
                    </a>

                    <div class="h-6 w-[1px] bg-gray-200"></div>

                    <div class="flex items-center gap-3">
                        @auth
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-bold text-gray-900 leading-none">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-gray-500 mt-1">Administrator</p>
                        </div>
                        <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-orange-200">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        @endauth
                    </div>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>