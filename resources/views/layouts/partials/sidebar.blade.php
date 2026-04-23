<aside class="w-64 bg-[#121210] text-white flex flex-col sticky top-0 h-screen border-r border-white/5 shadow-2xl">
    <div class="p-8">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center rotate-3 shadow-lg shadow-orange-500/20">
                <i class="bi bi-fire text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-black italic tracking-tighter uppercase leading-none text-white">
                    TASTY<span class="text-orange-500">FOOD</span>
                </h1>
                <p class="text-[9px] text-gray-500 uppercase tracking-[0.2em] mt-1 font-bold">
                    {{ auth()->user()->role == 'admin' ? 'Premium Admin' : 'User Member' }}
                </p>
            </div>
        </div>
    </div>
    
    <nav class="flex-1 px-4 space-y-1.5">
        <a href="{{ route('dashboard') }}" 
           class="group flex items-center gap-3.5 p-3 rounded-xl mt-4 transition-all duration-300 {{ Request::is('dashboard') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-xl shadow-orange-500/20' : 'text-gray-400 hover:bg-white/[0.03] hover:text-white' }}">
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="bi bi-grid-1x2-fill {{ Request::is('dashboard') ? 'text-white' : 'text-gray-500 group-hover:text-orange-500' }} transition-colors"></i>
            </div>
            <span class="text-sm font-semibold tracking-wide">Dashboard</span>
        </a>

        @if(auth()->user()->role == 'admin')
            <div class="pt-8 pb-3 px-4">
                <p class="text-[10px] text-gray-600 uppercase font-black tracking-[0.15em]">Main Menu</p>
            </div>

            <a href="{{ route('berita.index') }}" 
               class="group flex items-center gap-3.5 p-3 rounded-xl transition-all duration-300 {{ Request::is('dashboard/berita*') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-xl shadow-orange-500/20' : 'text-gray-400 hover:bg-white/[0.03] hover:text-white' }}">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="bi bi-journal-text {{ Request::is('dashboard/berita*') ? 'text-white' : 'text-gray-500 group-hover:text-orange-500' }} transition-colors"></i>
                </div>
                <span class="text-sm font-semibold tracking-wide">Kelola Berita</span>
            </a>

            <a href="{{ route('galeri.index') }}" 
               class="group flex items-center gap-3.5 p-3 rounded-xl transition-all duration-300 {{ Request::is('dashboard/galeri*') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-xl shadow-orange-500/20' : 'text-gray-400 hover:bg-white/[0.03] hover:text-white' }}">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="bi bi-images {{ Request::is('dashboard/galeri*') ? 'text-white' : 'text-gray-500 group-hover:text-orange-500' }} transition-colors"></i>
                </div>
                <span class="text-sm font-semibold tracking-wide">Galeri Foto</span>
            </a>

            <a href="{{ route('admin.users') }}" 
               class="group flex items-center gap-3.5 p-3 rounded-xl transition-all duration-300 {{ Request::is('dashboard/users*') ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-xl shadow-orange-500/20' : 'text-gray-400 hover:bg-white/[0.03] hover:text-white' }}">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="bi bi-people-fill {{ Request::is('dashboard/users*') ? 'text-white' : 'text-gray-500 group-hover:text-orange-500' }} transition-colors"></i>
                </div>
                <span class="text-sm font-semibold tracking-wide">Kelola User</span>
            </a>
        @endif
    </nav>

    <div class="p-4 mt-auto">
        <div class="bg-white/[0.03] rounded-2xl p-2 border border-white/5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 p-3 w-full text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-xl transition-all duration-300 group">
                    <i class="bi bi-power text-lg group-hover:scale-110 transition-transform"></i> 
                    <span class="text-sm font-bold tracking-wide">Sign Out</span>
                </button>
            </form>
        </div>
    </div>
</aside>