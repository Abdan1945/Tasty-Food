@extends('layouts.app')

@section('title', 'Kontak - Tasty Food')

@section('content')
    <section class="relative h-[350px] flex items-center px-10 mb-20">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
             class="absolute inset-0 w-full h-full object-cover" alt="Banner">
        </div>
        <div class="w-full px-12 relative z-10">
            <h1 class="text-5xl font-black text-white uppercase tracking-tighter italic">Kontak Kami</h1>
        </div>
    </section>

    <section class="py-10 px-10 max-w-7xl mx-auto">
        <h2 class="text-2xl font-black uppercase mb-10 tracking-tight">Kontak Kami</h2>
        
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <input type="text" placeholder="Subject" class="w-full border-2 border-gray-100 rounded-xl px-5 py-4 focus:border-black outline-none transition text-sm font-light">
                <input type="text" placeholder="Name" class="w-full border-2 border-gray-100 rounded-xl px-5 py-4 focus:border-black outline-none transition text-sm font-light">
                <input type="email" placeholder="Email" class="w-full border-2 border-gray-100 rounded-xl px-5 py-4 focus:border-black outline-none transition text-sm font-light">
            </div>
            
            <div>
                <textarea placeholder="Message" class="w-full h-full border-2 border-gray-100 rounded-xl px-5 py-4 focus:border-black outline-none transition text-sm font-light min-h-[180px]"></textarea>
            </div>
            
            <div class="md:col-span-2">
                <button type="submit" class="w-full bg-black text-white font-bold uppercase py-4 rounded-xl tracking-[0.4em] hover:bg-gray-800 transition shadow-lg text-xs">
                    Kirim
                </button>
            </div>
        </form>
    </section>

    <section class="py-24 bg-white px-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16 text-center">
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-6 shadow-2xl text-white text-2xl">
                     <img src="{{ asset('images/Group 66@2x.png') }}" alt="Email Icon">
                </div>
                <h4 class="font-black uppercase mb-2 tracking-widest text-sm">Email</h4>
                <p class="text-gray-500 text-xs italic">tastyfood@gmail.com</p>
            </div>
            
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-6 shadow-2xl text-white text-2xl">
                    <img src="{{ asset('images/Group 67@2x.png') }}" alt="Phone Icon">
                </div>
                <h4 class="font-black uppercase mb-2 tracking-widest text-sm">Phone</h4>
                <p class="text-gray-500 text-xs italic">+62 89528446317</p>
            </div>
            
            <div id="btn-location" class="flex flex-col items-center cursor-pointer hover:scale-105 transition-transform duration-300">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-6 shadow-2xl text-white text-2xl">
                    <img src="{{ asset('images/Group 68@2x.png') }}" alt="Location Icon">
                </div>
                <h4 class="font-black uppercase mb-2 tracking-widest text-sm">Location</h4>
                <p class="text-gray-500 text-xs italic">Jl. Terusan Mars Utara III No.8D, Kota Bandung</p>
            </div>
        </div>
    </section>

    <section class="px-10 pb-32">
        <div class="max-w-7xl mx-auto rounded-[40px] overflow-hidden shadow-2xl h-[450px] border-[10px] border-white relative">
            <iframe 
                id="main-maps"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.5731164!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e63982510777%3A0x1461f005c10fa32d!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <script>
        const btnLocation = document.getElementById('btn-location');
        const mainMaps = document.getElementById('main-maps');

        // Link lokasi CyberLabs
        const cyberLabsUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.558830113885!2d107.66173497448234!3d-6.943211367965742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7df07279321%3A0x69680327f12e84!2sCyberLabs%20-%20Digital%20Marketing%20Company%20%26%20Software%20Developer!5e0!3m2!1sid!2sid!4v1711424177265!5m2!1sid!2sid";
        
        // Link lokasi default (Bandung)
        const defaultUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.5731164!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e63982510777%3A0x1461f005c10fa32d!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000";

        btnLocation.addEventListener('click', function() {
            // Cek jika peta sekarang sudah CyberLabs, kita balikkan ke default (toggle)
            // Atau jika hanya ingin sekali klik langsung berubah selamanya:
            if (mainMaps.src !== cyberLabsUrl) {
                mainMaps.src = cyberLabsUrl;
            } else {
                mainMaps.src = defaultUrl;
            }
        });
    </script>
@endsection