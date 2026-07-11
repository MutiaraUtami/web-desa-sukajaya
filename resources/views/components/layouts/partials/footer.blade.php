
    <footer class="bg-[#0e2206] text-gray-300 pt-16 pb-8 border-t-4 border-[#fac81b]">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            
            {{-- Kolom 1: Branding Desa --}}
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <!-- Anda bisa mengganti SVG ini dengan tag <img> untuk logo Pemkab Purwakarta jika ada -->
                    <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Sukajaya" class="h-12 w-auto object-contain">
                    <div>
                        <h3 class="text-xl font-bold text-white tracking-wide">Desa Sukajaya</h3>
                        <p class="text-xs text-zinc-300">Kec. Sukatani, Kab. Purwakarta</p>
                    </div>
                </div>
                <p class="text-sm text-zinc-300 leading-relaxed">
                    Website resmi pusat informasi publik, transparansi tata kelola pemerintahan, dan portal profil potensi geografis serta UMKM masyarakat Desa Sukajaya.
                </p>
            </div>

            {{-- Kolom 2: Kontak & Operasional --}}
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-white border-b border-gray-800 pb-2">Kontak Kantor Desa</h4>
                <ul class="space-y-3 text-sm text-zinc-300">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#fac81b] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span>Jl. Raya Sukatani, Desa Sukajaya, Kecamatan Sukatani, Kabupaten Purwakarta, Jawa Barat 41167.</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#fac81b] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>kontak@desasukajaya.id</span>
                    </li>
                </ul>
            </div>

            {{-- Kolom 3: Navigasi / Tautan Cepat --}}
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-white border-b border-gray-800 pb-2">Tautan Navigasi</h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <a href="#" class="hover:text-[#fac81b] transition-colors duration-200">Beranda</a>
                    <a href="#" class="hover:text-[#fac81b] transition-colors duration-200">Profil Desa</a>
                    <a href="#" class="hover:text-[#fac81b] transition-colors duration-200">Struktur Kelompok</a>
                    <a href="#" class="hover:text-[#fac81b] transition-colors duration-200">Potensi UMKM</a>
                    <a href="#" class="hover:text-[#fac81b] transition-colors duration-200">Data Geografis</a>
                    <a href="#" class="hover:text-[#fac81b] transition-colors duration-200">Kontak Resmi</a>
                </div>
            </div>

        </div>

        {{-- Baris Hak Cipta --}}
        <div class="max-w-6xl mx-auto px-4 pt-8 border-t border-gray-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-zinc-300">
            <p>&copy; {{ date('Y') }} Pemerintah Desa Sukajaya. Hak Cipta Dilindungi.</p>
            <p>Dikembangkan untuk Sistem Informasi Geografis Terpadu</p>
        </div>
    </footer>

</x-layouts.app>