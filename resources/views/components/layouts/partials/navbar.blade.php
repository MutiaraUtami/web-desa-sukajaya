<header class="sticky top-0 left-0 right-0 z-50 shadow-md transition-all duration-300">

    <div class="bg-[#0e2206] text-white text-xs border-b border-[#1e6306]/30">
        <div class="max-w-6xl mx-auto px-4 py-2 flex flex-col sm:flex-row justify-between items-center gap-2">
            <!-- Bagian Kiri: Email -->
            <div class="flex items-center gap-4 flex-wrap justify-center sm:justify-start">
                <a href="mailto:sukajaya-purwakarta@desa.id" class="flex items-center gap-1.5 hover:text-[#fac81b] transition">
                    <svg class="w-3.5 h-3.5 text-[#fac81b]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0l-7.5-4.615a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                    </svg>
                    <span>sukajaya-purwakarta@desa.id</span>
                </a>
            </div>

            <!-- Bagian Kanan: Sosial Media (WhatsApp & Instagram) -->
            <div class="flex items-center gap-4">
                <a href="https://wa.me/6281973492210" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1 hover:text-[#fac81b] transition group" title="WhatsApp Desa">
                    <!-- Ikon WhatsApp -->
                    <svg class="w-3.5 h-3.5 text-[#fac81b] group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
                    </svg>
                    <span class="hidden md:inline">081973492210</span>
                </a>
                
                <a href="https://instagram.com/sukajaya_utama" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1 hover:text-[#fac81b] transition group" title="Instagram Desa">
                    <!-- Ikon Instagram -->
                    <svg class="w-3.5 h-3.5 text-[#fac81b] group-hover:scale-110 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                    <span class="hidden md:inline">sukajaya_utama</span>
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
            
            <button class="md:hidden text-xl focus:outline-none p-1 border border-transparent rounded hover:border-white/30 transition" onclick="document.getElementById('menu').classList.toggle('hidden')">
                ☰
            </button>
            
            <div id="menu" class="hidden md:flex gap-6 text-sm flex-wrap items-center w-full md:w-auto">
                <div class="nav-item w-full md:w-auto border-b md:border-none border-white/10 pb-2 md:pb-0">
                    <a href="{{ route('home') }}" class="hover:text-[#fac81b] py-2 block transition duration-200">Beranda</a>
                </div>
                
                {{-- Dropdown 1 --}}
                <div class="relative group nav-item w-full md:w-auto border-b md:border-none border-white/10 pb-2 md:pb-0">
                    <button onclick="if(window.innerWidth < 768) { this.nextElementSibling.classList.toggle('hidden'); }" class="hover:text-[#fac81b] py-2 w-full md:w-auto flex justify-between items-center gap-1 cursor-pointer focus:outline-none transition duration-200">
                        Tentang Sukajaya 
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    {{-- class "hidden" di-toggle via JS saat mobile, otomatis terbuka saat hover (group-hover) di Desktop --}}
                    <div class="hidden md:group-hover:block static md:absolute left-0 mt-0 w-full md:w-48 bg-black/20 md:bg-white text-gray-200 md:text-[#313131] rounded-md shadow-none md:shadow-lg py-2 md:border md:border-gray-100 animate-fadeInMain">
                        <a href="{{ route('profil') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Profil Desa</a>
                        <a href="{{ route('sejarah') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Sejarah</a>
                        <a href="{{ route('geografis') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Geografis</a>
                        <a href="{{ route('demografis') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Demografis</a>
                    </div>
                </div>

              {{-- Dropdown 2 --}}
                <div class="relative group nav-item w-full md:w-auto border-b md:border-none border-white/10 pb-2 md:pb-0">
                    <button onclick="if(window.innerWidth < 768) { this.nextElementSibling.classList.toggle('hidden'); }" class="hover:text-[#fac81b] py-2 w-full md:w-auto flex justify-between items-center gap-1 cursor-pointer focus:outline-none transition duration-200">
                        Organisasi 
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Kotaknya dilebarin dikit jadi w-56 biar teksnya muat -->
                    <div class="hidden md:group-hover:block static md:absolute left-0 mt-0 w-full md:w-56 bg-black/20 md:bg-white text-gray-200 md:text-[#313131] rounded-md shadow-none md:shadow-lg py-2 md:border md:border-gray-100">
                        <a href="{{ route('struktur-organisasi') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Struktur Organisasi</a>
                        <a href="{{ route('lembaga-desa') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Lembaga Desa</a>
                    </div>
                </div>

                {{-- Dropdown 3 --}}
                <div class="relative group nav-item w-full md:w-auto border-b md:border-none border-white/10 pb-2 md:pb-0">
                    <button onclick="if(window.innerWidth < 768) { this.nextElementSibling.classList.toggle('hidden'); }" class="hover:text-[#fac81b] py-2 w-full md:w-auto flex justify-between items-center gap-1 cursor-pointer focus:outline-none transition duration-200">
                        Informasi 
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden md:group-hover:block static md:absolute left-0 mt-0 w-full md:w-48 bg-black/20 md:bg-white text-gray-200 md:text-[#313131] rounded-md shadow-none md:shadow-lg py-2 md:border md:border-gray-100">
                        <a href="{{ route('agenda') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Agenda</a>
                        <a href="{{ route('berita') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Berita</a>
                        <a href="{{ route('apbdes') }}" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">APBDes</a>
                        <a href="#" class="block px-6 md:px-4 py-2 md:hover:bg-green-50 hover:text-[#fac81b] md:hover:text-[#1e6306] font-medium transition">Galeri</a>
                    </div>
                </div>

                <div class="nav-item w-full md:w-auto pb-2 md:pb-0">
                    <a href="{{ route('umkm') }}" class="hover:text-[#fac81b] py-2 block transition duration-200">UMKM</a>
                </div>

                <div class="w-full md:w-auto pt-2 md:pt-0">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="block w-full md:w-auto text-center font-semibold bg-[#313131] text-white px-4 py-2 rounded-md hover:bg-zinc-800 transition shadow-md">Dashboard Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="block w-full md:w-auto text-center font-semibold bg-white md:bg-[#0e2206] text-[#1e6306] md:text-white px-5 py-2 rounded-md md:hover:text-[#fac81b] transition-all duration-200 shadow-md md:hover:shadow-lg md:hover:-translate-y-0.5">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>