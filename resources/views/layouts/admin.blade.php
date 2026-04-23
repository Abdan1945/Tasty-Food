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
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Content Area --}}
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
                            {{-- LOGIKA ROLE DINAMIS DI SINI --}}
                            <p class="text-[10px] text-gray-500 mt-1 uppercase font-semibold tracking-wider">
                                {{ Auth::user()->role == 'admin' ? 'Administrator' : 'Tasty Member' }}
                            </p>
                        </div>
                        <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-orange-200">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
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