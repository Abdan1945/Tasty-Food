@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
    @if(auth()->user()->role == 'admin')
        {{-- ==============================
             TAMPILAN KHUSUS ADMIN
             ============================== --}}
        
        {{-- 1. Bento Grid Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-[30px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Total Berita</p>
                        <h3 class="text-4xl font-black text-slate-900 mt-2">{{ $totalBerita }}</h3>
                        <span class="text-[10px] text-green-500 font-bold bg-green-50 px-2 py-1 rounded-full mt-2 inline-block">Aktif</span>
                    </div>
                    <div class="w-12 h-12 bg-orange-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-orange-200 group-hover:rotate-12 transition-transform">
                        <i class="bi bi-newspaper text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[30px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Koleksi Galeri</p>
                        <h3 class="text-4xl font-black text-slate-900 mt-2">{{ $totalFoto }}</h3>
                        <span class="text-[10px] text-orange-500 font-bold bg-orange-50 px-2 py-1 rounded-full mt-2 inline-block">HD Quality</span>
                    </div>
                    <div class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-slate-200 group-hover:rotate-12 transition-transform">
                        <i class="bi bi-images text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[30px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Total Users</p>
                        <h3 class="text-4xl font-black text-slate-900 mt-2">{{ $totalUser }}</h3>
                        <span class="text-[10px] text-blue-500 font-bold bg-blue-50 px-2 py-1 rounded-full mt-2 inline-block">Terdaftar</span>
                    </div>
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-100 group-hover:rotate-12 transition-transform">
                        <i class="bi bi-people-fill text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-6 rounded-[30px] shadow-xl shadow-orange-200 flex flex-col justify-center items-center text-white">
                <p class="text-[10px] font-bold uppercase tracking-widest opacity-80">Server Status</p>
                <h4 class="text-xl font-black mt-1 uppercase">Optimal</h4>
                <div class="flex gap-1 mt-2">
                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-white/50 rounded-full"></div>
                </div>
            </div>
        </div>

        {{-- 2. Welcome Admin Section --}}
        <div class="mt-8 bg-slate-900 p-10 rounded-[40px] shadow-2xl relative overflow-hidden">
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
                <div class="text-white">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-orange-500 text-[10px] font-black uppercase rounded-full tracking-tighter">Admin Panel</span>
                        <span class="text-gray-400 text-xs tracking-widest uppercase">{{ date('d F Y') }}</span>
                    </div>
                    <h3 class="text-3xl font-black">Selamat bekerja, {{ Auth::user()->name }}! ⚡</h3>
                    <p class="text-gray-400 text-sm mt-3 max-w-md leading-relaxed">
                        Pantau performa konten Tasty Food hari ini. Semua sistem berjalan normal dan siap untuk update terbaru.
                    </p>
                </div>
                
                <div class="mt-8 md:mt-0 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('berita.create') }}" class="group flex items-center gap-3 bg-orange-500 text-white px-8 py-4 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-white hover:text-orange-500 transition-all duration-300 shadow-xl shadow-orange-500/20">
                        <i class="bi bi-plus-circle-fill text-lg"></i> Tambah Berita
                    </a>
                    <a href="{{ route('galeri.create') }}" class="flex items-center gap-3 bg-white/10 text-white border border-white/10 px-8 py-4 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-white/20 transition-all duration-300">
                        <i class="bi bi-cloud-arrow-up-fill text-lg text-orange-500"></i> Upload Galeri
                    </a>
                </div>
            </div>
            {{-- Dekorasi Abstract --}}
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-blue-500/10 rounded-full blur-2xl"></div>
        </div>

    @else
        {{-- ==============================
             TAMPILAN KHUSUS USER MEMBER
             ============================== --}}
        
        <div class="relative min-h-[500px] bg-white rounded-[50px] p-12 border border-gray-100 overflow-hidden shadow-2xl">
            {{-- Greeting User --}}
            <div class="relative z-10">
                <div class="w-16 h-1 bg-orange-500 mb-6"></div>
                <h4 class="text-gray-400 text-xs font-bold uppercase tracking-[0.3em] mb-2">Member Dashboard</h4>
                <h2 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">
                    HALO, <br> <span class="text-orange-500">{{ strtoupper(Auth::user()->name) }}!</span>
                </h2>
                <p class="mt-6 text-gray-500 max-w-sm leading-relaxed italic">
                    "Terima kasih telah bergabung menjadi bagian dari Tasty Food. Nikmati update kuliner sehat setiap harinya!"
                </p>

                {{-- Status Member Card --}}
                <div class="mt-10 bg-slate-50 border border-gray-100 p-6 rounded-3xl w-fit flex items-center gap-6 shadow-sm">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-md border border-gray-100">
                        <i class="bi bi-award-fill text-orange-500 text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Status Keanggotaan</p>
                        <p class="text-sm font-black text-slate-800 uppercase">Verified Tasty Member</p>
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="{{ url('/') }}" class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-orange-500 transition shadow-xl">
                        Lihat Menu Hari Ini
                    </a>
                </div>
            </div>

            {{-- Image Decoration --}}
            <div class="absolute top-0 right-0 h-full w-1/2 hidden md:block">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=2080&auto=format&fit=crop" 
                     class="w-full h-full object-cover opacity-20 md:opacity-100" 
                     style="clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);">
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-orange-50 p-8 rounded-[40px] border border-orange-100">
                <h5 class="font-black uppercase text-orange-600 tracking-widest text-xs mb-4">Tips Sehat</h5>
                <p class="text-slate-800 font-bold">Jangan lupa minum air mineral 2 Liter hari ini untuk menjaga metabolisme tubuh tetap prima!</p>
            </div>
            <div class="bg-slate-50 p-8 rounded-[40px] border border-slate-100">
                <h5 class="font-black uppercase text-slate-400 tracking-widest text-xs mb-4">Berita Terbaru</h5>
                <p class="text-slate-800 font-bold">Cek resep salad buah madu yang baru saja diupdate oleh Chef Tasty Food.</p>
            </div>
        </div>
    @endif
@endsection