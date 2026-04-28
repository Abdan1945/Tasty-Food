@extends('layouts.admin')

@section('title', 'Tambah Galeri Tasty Food')

@section('content')
{{-- TAMBAHKAN CDN ALPINE.JS DISINI BIAR PREVIEW JALAN --}}
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="p-6 md:p-10 max-w-5xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Tambah <span class="text-orange-500">Menu Baru</span></h1>
            <p class="text-slate-500 mt-1">Lengkapi form di bawah untuk menambah koleksi galeri kuliner.</p>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="inline-flex items-center text-slate-600 hover:text-orange-500 font-medium transition-colors">
            <i class="fas fa-arrow-left mr-2 text-sm"></i> Kembali ke Galeri
        </a>
    </div>

    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm animate-fade-up">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span class="font-bold">Terjadi Kesalahan:</span>
        </div>
        <ul class="list-disc list-inside text-sm opacity-90">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- x-data imagePreview harus terhubung dengan script di bawah --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden" x-data="imagePreview()">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/3 bg-slate-50 p-8 border-b lg:border-b-0 lg:border-r border-slate-100 flex flex-col items-center justify-center">
                    <label class="block text-sm font-bold text-slate-700 mb-4 text-center">Preview Foto</label>
                    
                    <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-slate-200 border-4 border-white shadow-md flex items-center justify-center group">
                        {{-- Menampilkan gambar saat sudah dipilih --}}
                        <template x-if="imageUrl">
                            <img :src="imageUrl" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </template>
                        
                        {{-- Menampilkan icon placeholder saat belum ada gambar --}}
                        <template x-if="!imageUrl">
                            <div class="text-center p-6 text-slate-400">
                                <i class="fas fa-utensils text-5xl mb-3 block opacity-20"></i>
                                <p class="text-xs uppercase tracking-widest font-semibold">Belum Ada Foto</p>
                            </div>
                        </template>
                        
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <p class="text-white text-xs font-bold uppercase tracking-wider">Ubah Foto</p>
                        </div>
                        {{-- Input file dengan trigger Alpine.js --}}
                        <input type="file" name="image" @change="fileChosen" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" required>
                    </div>
                    <p class="mt-4 text-[10px] text-slate-400 text-center leading-relaxed italic">
                        *Klik area di atas untuk mengunggah foto.<br>Gunakan rasio 1:1 untuk hasil terbaik.
                    </p>
                </div>

                <div class="lg:w-2/3 p-8 md:p-12 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Hidangan <span class="text-red-400">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Spicy Honey Chicken" required
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none font-medium">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Kategori <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <select name="category" required
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none appearance-none font-medium">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Main Course">Main Course</option>
                                    <option value="Appetizer">Appetizer</option>
                                    <option value="Dessert">Dessert</option>
                                    <option value="Beverages">Beverages</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Urutan Display (Opsional)</label>
                            <input type="number" name="order" placeholder="0" 
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none font-medium">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Menu <span class="text-slate-400 font-normal">(Opsional)</span></label>
                        <textarea name="description" rows="4" placeholder="Jelaskan kelezatan hidangan ini..."
                                  class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none font-medium resize-none">{{ old('description') }}</textarea>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
                        <button type="reset" @click="imageUrl = ''" class="px-6 py-3 text-slate-500 font-bold hover:text-slate-700 transition-colors">
                            Reset
                        </button>
                        <button type="submit" 
                                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-10 rounded-xl shadow-lg shadow-orange-500/30 hover:shadow-orange-500/40 hover:-translate-y-1 transition-all duration-300">
                            Simpan Menu <i class="fas fa-paper-plane ml-2 text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT --}}
<script>
    function imagePreview() {
        return {
            imageUrl: '',
            fileChosen(event) {
                this.fileToDataUrl(event, src => this.imageUrl = src)
            },
            fileToDataUrl(event, callback) {
                if (! event.target.files.length) return
                let file = event.target.files[0],
                    reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = e => callback(e.target.result)
            }
        }
    }
</script>
@endsection