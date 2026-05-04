<footer class="bg-black text-white pt-20 pb-10 mt-20">
    <div class="w-full px-16 lg:px-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h4 class="text-2xl font-black italic uppercase mb-6 tracking-tighter">Tasty Food</h4>
                <p class="text-gray-400 text-sm leading-relaxed mb-8 pr-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores incidunt mollitia iure.
                </p>
                <div class="flex items-center gap-3 mt-6">
                    <div class="w-10 h-10 bg-[#3b5998] rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition overflow-hidden">
                        <img src="{{ asset('images/001-facebook.png') }}" class="w-7 h-7 object-contain" alt="Facebook">
                    </div>
                    <div class="w-10 h-10 bg-[#55acee] rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
                        <img src="{{ asset('images/002-twitter.png') }}" class="w-7 h-7 object-contain" alt="Twitter">
                    </div>
                </div>
            </div>

            <div>
                <h6 class="font-bold uppercase mb-8 tracking-widest text-sm text-white">Useful links</h6>
                <ul class="list-none p-0 space-y-4">
                    <li><a href="#" class="footer-link">Blog</a></li>
                    <li><a href="#" class="footer-link">Hewan</a></li>
                    <li><a href="{{ url('/galeri') }}" class="footer-link">Galeri</a></li>
                    <li><a href="#" class="footer-link">Testimonial</a></li>
                </ul>
            </div>

            <div>
                <h6 class="font-bold uppercase mb-8 tracking-widest text-sm text-white">Privacy</h6>
                <ul class="list-none p-0 space-y-4">
                    <li><a href="#" class="footer-link">Karir</a></li>
                    <li><a href="#" class="footer-link">Tentang Kami</a></li>
                    <li><a href="#" class="footer-link">Kontak Kami</a></li>
                    <li><a href="#" class="footer-link">Servis</a></li>
                </ul>
            </div>

            <div>
                <h6 class="font-bold uppercase mb-8 tracking-widest text-sm text-white">Contact Info</h6>
                <ul class="list-none p-0 space-y-4 text-gray-400 text-sm">
                    <li class="flex items-center">
                        <div class="w-10 h-10 flex-shrink-0 mr-4 flex items-center justify-center">
                            <img src="{{ asset('images/Group 66.png') }}" class="max-w-full max-h-full object-contain" alt="Mail">
                        </div>
                        <span>tastyfood@gmail.com</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-10 h-10 flex-shrink-0 mr-4 flex items-center justify-center">
                            <img src="{{ asset('images/Group 67.png') }}" class="max-w-full max-h-full object-contain" alt="Phone">
                        </div>
                        <span>+62 89528446317</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-10 h-10 flex-shrink-0 mr-4 flex items-center justify-center">
                            <img src="{{ asset('images/Group 68.png') }}" class="max-w-full max-h-full object-contain" alt="Location">
                        </div>
                        <span>Kota Bandung, Jawa Barat</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-20 pt-8 text-center text-gray-500 text-[10px] uppercase tracking-widest">
            COPYRIGHT ©2026 ALL RIGHTS RESERVED | TASTY FOOD
        </div>
    </div>
</footer>