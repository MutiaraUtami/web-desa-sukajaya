<header class="sticky top-0 left-0 right-0 z-50 shadow-md transition-all duration-300">

    <div class="bg-[#0e2206] text-white text-xs border-b border-[#1e6306]/30">
        <div class="max-w-6xl mx-auto px-4 py-2 flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4 flex-wrap justify-center sm:justify-start">
                <a href="mailto:desa.sukajaya@example.com" class="flex items-center gap-1.5 hover:text-[#fac81b] transition">
                    <svg class="w-3.5 h-3.5 text-[#fac81b]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0l-7.5-4.615a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                    </svg>
                    <span>desa.sukajaya@example.com</span>
                </a>
            </div>

            <div class="flex items-center gap-4">
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1 hover:text-[#fac81b] transition group" title="Facebook Desa">
                    <svg class="w-3.5 h-3.5 text-[#fac81b] group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.8z"></path>
                    </svg>
                    <span class="hidden md:inline">Facebook</span>
                </a>
                
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1 hover:text-[#fac81b] transition group" title="Instagram Desa">
                    <svg class="w-3.5 h-3.5 text-[#fac81b] group-hover:scale-110 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                    <span class="hidden md:inline">Instagram</span>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-[#1e6306] text-white">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            
            <a href="{{ route('home') }}" class="flex items-center gap-3 group/brand">
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Sukajaya" class="h-12 w-auto object-contain">
                <div class="flex flex-col leading-tight">
                    <span class="font-oswald font-bold text-lg tracking-wide uppercase">Desa Sukajaya</span>
                    <span class="font-sans text-xs text-zinc-200 font-medium tracking-wider uppercase">Sukatani - Purwakarta</span>
                </div>
            </a>
            
            <button class="md:hidden text-xl focus:outline-none" onclick="document.getElementById('menu').classList.toggle('hidden')">
                ☰
            </button>
            
            <div id="menu" class="hidden md:flex gap-6 text-sm flex-wrap items-center">
                <div class="nav-item">
                    <a href="{{ route('home') }}" class="hover:text-[#fac81b] py-2 block transition duration-200">Beranda</a>
                </div>
                
                <div class="relative group nav-item">
                    <button class="hover:text-[#fac81b] py-2 flex items-center gap-1 cursor-pointer focus:outline-none transition duration-200">
                        Tentang Sukajaya 
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-0 w-48 bg-white text-[#313131] rounded-md shadow-lg py-2 hidden group-hover:block border border-gray-100 animate-fadeInMain">
                        <a href="{{ route('profil') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Profil Desa</a>
                        <a href="{{ route('sejarah') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Sejarah</a>
                        <a href="{{ route('geografis') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Geografis</a>
                        <a href="{{ route('demografis') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Demografis</a>
                    </div>
                </div>

                <div class="relative group nav-item">
                    <button class="hover:text-[#fac81b] py-2 flex items-center gap-1 cursor-pointer focus:outline-none transition duration-200">
                        Organisasi 
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-0 w-48 bg-white text-[#313131] rounded-md shadow-lg py-2 hidden group-hover:block border border-gray-100">
                        <a href="{{ route('struktur-organisasi') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Struktur Organisasi</a>
                        <a href="#" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">BPD</a>
                        <a href="#" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">PKK</a>
                    </div>
                </div>

                <div class="relative group nav-item">
                    <button class="hover:text-[#fac81b] py-2 flex items-center gap-1 cursor-pointer focus:outline-none transition duration-200">
                        Informasi 
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-0 w-48 bg-white text-[#313131] rounded-md shadow-lg py-2 hidden group-hover:block border border-gray-100">
                        <a href="{{ route('agenda') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Agenda</a>
                        <a href="{{ route('berita') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Berita</a>
                        <a href="{{ route('apbdes') }}" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">APBDes</a>
                        <a href="#" class="block px-4 py-2 hover:bg-green-50 hover:text-[#1e6306] font-medium transition">Galeri</a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="{{ route('umkm') }}" class="hover:text-[#fac81b] py-2 block transition duration-200">UMKM</a>
                </div>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="font-semibold bg-[#313131] text-white px-4 py-2 rounded-md hover:bg-zinc-800 transition shadow-md">Dashboard Admin</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold bg-[#0e2206] text-white px-5 py-2 rounded-md hover:text-[#fac81b] transition-all duration-200 shadow-md hover:shadow-lg hover:-translate-y-0.5 text-center">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>