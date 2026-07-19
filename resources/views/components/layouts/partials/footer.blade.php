<footer class="bg-[#0e2206] text-gray-300 pt-16 pb-8 border-t-4 border-[#fac81b]">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        
        {{-- Kolom 1: Branding Desa --}}
        <div class="space-y-4">
            <div class="flex items-center gap-3">
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
                <!-- Alamat -->
                <li class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-[#fac81b] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <span>Jl. Raya Sukatani, Desa Sukajaya, Kecamatan Sukatani, Kabupaten Purwakarta, Jawa Barat 41167.</span>
                </li>
                <!-- Email -->
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-[#fac81b] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0l-7.5-4.615a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                    <a href="mailto:sukajaya-purwakarta@desa.id" class="hover:text-[#fac81b] transition-colors duration-200">sukajaya-purwakarta@desa.id</a>
                </li>
                <!-- WhatsApp -->
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-[#fac81b] shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    <a href="https://wa.me/6281973492210" target="_blank" rel="noopener noreferrer" class="hover:text-[#fac81b] transition-colors duration-200">081973492210</a>
                </li>
                <!-- Instagram -->
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-[#fac81b] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                    <a href="https://instagram.com/sukajaya_utama" target="_blank" rel="noopener noreferrer" class="hover:text-[#fac81b] transition-colors duration-200">@sukajaya_utama</a>
                </li>
            </ul>
        </div>

        {{-- Kolom 3: Navigasi / Tautan Cepat --}}
        <div class="space-y-4">
            <h4 class="text-lg font-semibold text-white border-b border-gray-800 pb-2">Tautan Navigasi</h4>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <a href="{{ route('home') }}" class="hover:text-[#fac81b] transition-colors duration-200">Beranda</a>
                <a href="{{ route('profil') }}" class="hover:text-[#fac81b] transition-colors duration-200">Profil Desa</a>
                <a href="{{ route('struktur-organisasi') }}" class="hover:text-[#fac81b] transition-colors duration-200">Struktur Kelompok</a>
                <a href="{{ route('umkm') }}" class="hover:text-[#fac81b] transition-colors duration-200">Potensi UMKM</a>
                <a href="{{ route('geografis') }}" class="hover:text-[#fac81b] transition-colors duration-200">Data Geografis</a>
            </div>
        </div>

    </div>

    {{-- Baris Hak Cipta --}}
    <div class="max-w-6xl mx-auto px-4 pt-8 border-t border-gray-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-zinc-300">
        <p>&copy; {{ date('Y') }} Pemerintah Desa Sukajaya. Hak Cipta Dilindungi.</p>
        <p>Dikembangkan untuk Sistem Informasi Geografis Terpadu</p>
    </div>
</footer>