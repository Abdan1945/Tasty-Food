@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="space-y-6">
            {{-- 1. Barisan Statistik Utama --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card Total Berita --}}
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div class="w-10 h-10 bg-[#e7e7ff] rounded-lg flex items-center justify-center">
                            <i class="bi bi-newspaper text-[#696cff] text-xl"></i>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-wider mt-4">Total Berita</p>
                    <div class="flex items-baseline gap-2 mt-1">
                        <h3 class="text-2xl font-bold text-gray-700">{{ $totalBerita }}</h3>
                        <span class="text-green-500 text-xs font-semibold flex items-center">
                            <i class="bi bi-chevron-up"></i> 12.5%
                        </span>
                    </div>
                    <p class="text-[10px] text-gray-400 mt-1">Konten aktif saat ini</p>
                </div>

                {{-- Card Koleksi Galeri --}}
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div class="w-10 h-10 bg-[#fff2e2] rounded-lg flex items-center justify-center">
                            <i class="bi bi-images text-[#ffab00] text-xl"></i>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-wider mt-4">Koleksi Galeri</p>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">{{ $totalFoto }}</h3>
                    <p class="text-[10px] text-orange-400 font-medium mt-1">Aset Visual HD</p>
                </div>

                {{-- Card Total Users --}}
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div class="w-10 h-10 bg-[#e1f0ff] rounded-lg flex items-center justify-center">
                            <i class="bi bi-people-fill text-[#03c3ec] text-xl"></i>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-wider mt-4">Total Users</p>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">{{ $totalUser }}</h3>
                    <p class="text-[10px] text-blue-400 font-medium mt-1">User terdaftar</p>
                </div>
            </div>

            {{-- 2. Tombol Shortcut Action --}}
            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-wrap gap-4 items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2"></span>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('berita.create') }}" class="flex items-center gap-2 px-4 py-2 bg-[#696cff] text-white rounded-lg text-xs font-bold shadow-sm hover:bg-[#5f61e6] transition-all">
                        <i class="bi bi-plus-lg"></i> Tambah Berita
                    </a>
                    <a href="{{ route('admin.gallery.create') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-200 text-gray-600 rounded-lg text-xs font-bold hover:bg-gray-50 transition-all">
                        <i class="bi bi-upload"></i> Upload Galeri
                    </a>
                </div>
            </div>

            {{-- 3. Bagian Konten Utama (Berurutan ke bawah) --}}
            <div class="flex flex-col gap-6 pb-10">
                
                {{-- Recent Stories (Lurus ke bawah, 1 kolom) --}}
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h5 class="text-sm font-black text-gray-700 uppercase tracking-widest">Berita Terkini</h5>
                        <a href="{{ route('berita.index') }}" class="text-[#696cff] text-[10px] font-bold uppercase hover:underline">View All</a>
                    </div>
                    
                    {{-- Container list berita lurus ke bawah --}}
                    <div class="flex flex-col gap-2">
                        @forelse($recentNews as $item)
                            <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-all border-b border-gray-50 last:border-0">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-14 h-14 rounded-lg object-cover shadow-sm">
                                <div class="flex-1">
                                    <h6 class="text-sm font-bold text-gray-700 line-clamp-1 uppercase">{{ $item->title }}</h6>
                                    <p class="text-[10px] text-gray-400 font-medium">
                                        <i class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <a href="{{ route('berita.edit', $item->id) }}" class="w-9 h-9 flex items-center justify-center text-gray-400 hover:text-[#696cff] bg-white border border-gray-100 rounded-lg transition-all shadow-sm">
                                    <i class="bi bi-pencil-square text-xs"></i>
                                </a>
                            </div>
                        @empty
                            <p class="text-xs text-gray-400 text-center py-4 italic">Belum ada berita terbaru.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Gallery Update (Pindah ke bawah Recent Stories) --}}
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h5 class="text-sm font-black text-gray-700 uppercase tracking-widest">Pembaruan Galeri</h5>
                        <a href="{{ route('admin.gallery.index') }}" class="text-[#696cff] text-[10px] font-bold uppercase hover:underline">Manage</a>
                    </div>
                    {{-- Tampilan Grid Galeri --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3">
                        @forelse($recentGalleries as $galeri)
                            <div class="aspect-square rounded-lg overflow-hidden border border-gray-50 shadow-sm group relative">
                                <img src="{{ asset('images/gallery/' . $galeri->image) }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                        @empty
                            <div class="col-span-full py-10 text-center border-2 border-dashed border-gray-100 rounded-xl">
                                <p class="text-xs text-gray-400 italic">Galeri masih kosong.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-50 flex justify-between items-center">
                        <span class="text-[10px] text-gray-400 font-bold uppercase">Total Visual Assets</span>
                        <span class="text-xs font-black text-gray-700">{{ $totalFoto }} Files</span>
                    </div>
                </div>

            </div>
        </div>
    @else
        {{-- Member View --}}
        <div class="bg-white rounded-2xl p-10 border border-gray-100 shadow-sm flex items-center justify-between overflow-hidden">
            <div class="z-10">
                <h2 class="text-4xl font-black text-gray-800 tracking-tighter uppercase">Welcome, <br><span class="text-[#696cff]">{{ Auth::user()->name }}</span></h2>
                <p class="text-gray-500 mt-4 max-w-xs leading-relaxed italic">Senang melihatmu kembali. Jelajahi menu Tasty Food sekarang.</p>
                <div class="mt-8">
                    <a href="{{ url('/') }}" class="bg-[#696cff] text-white px-8 py-3 rounded-lg text-xs font-bold uppercase tracking-widest shadow-lg shadow-[#696cff]/30 hover:bg-[#5f61e6] transition-all">Explore Menu</a>
                </div>
            </div>
            <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/sitting-girl-with-laptop-light.png" class="hidden md:block w-64 opacity-90" alt="Member Illustration">
        </div>
    @endif
@endsection