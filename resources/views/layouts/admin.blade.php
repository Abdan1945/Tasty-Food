<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Tasty Food</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Animasi halus untuk dropdown */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Content Area --}}
        <main class="flex-1 flex flex-col">
            <header class="bg-white border-b border-gray-100 h-16 flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <h2 class="font-bold text-gray-800 tracking-tight">@yield('page_title')</h2>
                </div>

                <div class="flex items-center gap-6">
                    {{-- Target _blank dihapus agar halaman terbuka di tab yang sama --}}
                    <a href="{{ url('/home') }}" class="text-xs font-bold text-gray-400 hover:text-[#696cff] transition-colors flex items-center gap-2 uppercase tracking-tighter">
                        Web Depan <i class="bi bi-arrow-right"></i>
                    </a>

                    <div class="h-6 w-[1px] bg-gray-100"></div>

                    {{-- User Profile Dropdown --}}
                    @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center gap-3 focus:outline-none group">
                            <div class="text-right hidden sm:block">
                                <p class="text-xs font-bold text-gray-900 leading-none group-hover:text-[#696cff] transition-colors">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase font-semibold tracking-wider">
                                    {{ Auth::user()->role == 'admin' ? 'Administrator' : 'Tasty Member' }}
                                </p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-tr from-[#696cff] to-[#787aff] rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-[#696cff]/20 group-hover:scale-105 transition-all">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </button>

                        <div x-show="open" 
                             x-cloak
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                            
                            <div class="px-4 py-2 border-b border-gray-50 mb-1">
                                <p class="text-[10px] font-bold text-gray-400 uppercase">Menu Akun</p>
                            </div>

                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="bi bi-person text-[#696cff]"></i> Profil Saya
                            </a>

                            <div class="my-1 border-t border-gray-50"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                    <i class="bi bi-power"></i> Keluar / Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>