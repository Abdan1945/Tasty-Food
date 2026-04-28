<aside class="w-64 bg-white text-gray-600 flex flex-col sticky top-0 h-screen border-r border-gray-100 shadow-sm">
    {{-- Logo Section --}}
    <div class="p-6">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-[#696cff] rounded-lg flex items-center justify-center shadow-lg shadow-[#696cff]/30">
                <i class="bi bi-fire text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-lg font-extrabold tracking-tighter uppercase leading-none text-gray-800">
                    TASTY<span class="text-[#696cff]">FOOD</span>
                </h1>
                <p class="text-[9px] text-gray-400 uppercase tracking-widest mt-1 font-bold">
                    {{ auth()->user()->role == 'admin' ? 'Premium Admin' : 'User Member' }}
                </p>
            </div>
        </div>
    </div>
    
    {{-- Navigation --}}
    <nav class="flex-1 px-4 space-y-1 mt-4">
        <a href="{{ route('dashboard') }}" 
           class="group flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 {{ Request::is('dashboard') ? 'bg-[#e7e7ff] text-[#696cff] font-semibold' : 'hover:bg-gray-50 text-gray-500' }}">
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="bi bi-grid-1x2-fill {{ Request::is('dashboard') ? 'text-[#696cff]' : 'text-gray-400 group-hover:text-[#696cff]' }}"></i>
            </div>
            <span class="text-sm">Dashboard</span>
        </a>

        @if(auth()->user()->role == 'admin')
            <div class="pt-6 pb-2 px-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest">Main Menu</p>
            </div>

            <a href="{{ route('berita.index') }}" 
               class="group flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 {{ Request::is('dashboard/berita*') ? 'bg-[#e7e7ff] text-[#696cff] font-semibold' : 'hover:bg-gray-50 text-gray-500' }}">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="bi bi-journal-text {{ Request::is('dashboard/berita*') ? 'text-[#696cff]' : 'text-gray-400 group-hover:text-[#696cff]' }}"></i>
                </div>
                <span class="text-sm">Kelola Berita</span>
            </a>

            <a href="{{ route('admin.gallery.index') }}" 
               class="group flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 {{ Request::is('dashboard/galeri*') ? 'bg-[#e7e7ff] text-[#696cff] font-semibold' : 'hover:bg-gray-50 text-gray-500' }}">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="bi bi-images {{ Request::is('dashboard/galeri*') ? 'text-[#696cff]' : 'text-gray-400 group-hover:text-[#696cff]' }}"></i>
                </div>
                <span class="text-sm">Galeri Foto</span>
            </a>

            <a href="{{ route('admin.users') }}" 
               class="group flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 {{ Request::is('dashboard/users*') ? 'bg-[#e7e7ff] text-[#696cff] font-semibold' : 'hover:bg-gray-50 text-gray-500' }}">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="bi bi-people-fill {{ Request::is('dashboard/users*') ? 'text-[#696cff]' : 'text-gray-400 group-hover:text-[#696cff]' }}"></i>
                </div>
                <span class="text-sm">Kelola User</span>
            </a>
        @endif
    </nav>

    {{-- Footer/Signout --}}
    <div class="p-4 mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-4 py-2.5 w-full text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all duration-200 group">
                <i class="bi bi-power text-lg group-hover:rotate-90 transition-transform"></i> 
                <span class="text-sm font-semibold">Logout</span>
            </button>
        </form>
    </div>
</aside>