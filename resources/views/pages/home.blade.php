<x-layouts.app :title="($profil->nama_desa ?? 'Website Sukajaya') . ' - Beranda'">
    
    @include('components.layouts.partials.hero-slider')
    
    <!-- 1. GRID MENU UTAMA (3 Menu: Agenda, APBDes, Organisasi - Style Hijau Gelap) -->
    <section class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
            $menus = [
                ['route' => 'agenda', 'title' => 'Agenda Desa', 'emoji' => '📅'],
                ['route' => 'apbdes', 'title' => 'APBDes', 'emoji' => '💰'],
                ['route' => 'organisasi', 'title' => 'Organisasi Desa', 'emoji' => '👥'],
            ];
        @endphp

        @foreach($menus as $menu)
        <!-- Menggunakan Latar Gelap #0e2206 (--color-brand-dark) -->
        <a href="{{ Route::has($menu['route']) ? route($menu['route']) : '#' }}" class="group relative bg-[#1e6306] text-white p-8 rounded-3xl shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between h-48 border border-[#1e6306]/20">
            <!-- Ikon Bulat Minimalis di Pojok Kiri Atas dengan Aksen Kuning #fac81b -->
            <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-2xl backdrop-blur-sm group-hover:bg-[#fac81b] group-hover:text-[#0e2206] transition-all duration-300">
                {{ $menu['emoji'] }}
            </div>
            <!-- Teks di Bagian Bawah -->
            <div class="font-bold font-sans text-lg tracking-wide leading-snug mt-auto z-10 group-hover:text-[#fac81b] transition-colors">
                {{ $menu['title'] }}
            </div>
            <!-- Aksen dekoratif lingkaran samar di latar belakang -->
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-[#0e2206]/40 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        </a>
        @endforeach
    </section>

    <!-- 2. SECTION BERITA (Image Overlay Card - Style Latar Gelap & Aksen Kuning) -->
    <section class="max-w-6xl mx-auto px-4 pb-16">
        <h2 class="text-2xl font-bold mb-6 text-[#313131] border-b-4 border-[#1e6306] pb-2 inline-block">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($beritaTerbaru as $b)
                <a href="{{ route('berita.show', $b->slug) }}" class="group relative h-80 rounded-3xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col justify-end border border-zinc-100">
                    
                    <!-- Latar Belakang Gambar -->
                    @if ($b->gambar)
                        <img src="{{ asset('storage/'.$b->gambar) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="absolute inset-0 w-full h-full bg-zinc-300"></div>
                    @endif
                    
                    <!-- Gradient Overlay (Menggelapkan bagian bawah gambar) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0e2206]/90 via-[#0e2206]/50 to-transparent"></div>

                    <!-- Ikon Bulat di Kiri Atas Berita -->
                    <div class="absolute top-4 left-4 w-9 h-9 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white z-10 group-hover:bg-[#fac81b] group-hover:text-[#0e2206] transition-colors text-sm">
                        📰
                    </div>

                    <!-- Konten Teks Berita -->
                    <div class="p-6 z-10 text-white">
                        <p class="text-[10px] tracking-wider uppercase text-[#fac81b] mb-1 font-semibold">
                            {{ optional($b->tanggal_terbit)->format('d M Y') }}
                        </p>
                        <h3 class="font-bold text-base md:text-lg leading-tight text-white line-clamp-3 group-hover:text-[#fac81b] transition-colors">
                            {{ $b->judul }}
                        </h3>
                    </div>
                </a>
            @empty
                <div class="col-span-full p-8 bg-zinc-50 rounded-2xl text-center text-zinc-500 border border-dashed">
                    Belum ada berita terbaru saat ini.
                </div>
            @endforelse
        </div>
    </section>

    <!-- 3. SECTION DAFTAR UMKM (Menggunakan Palet Hijau Utama & Aksen Kuning) -->
    <section class="max-w-6xl mx-auto px-4 pb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-[#313131] border-b-4 border-[#1e6306] pb-2 inline-block">UMKM Unggulan Desa</h2>
            <a href="{{ route('umkm') }}" class="text-sm font-bold text-[#1e6306] hover:text-[#0e2206] hover:underline">Lihat Semua →</a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($daftarUmkm ?? [] as $umkm)
                <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden flex flex-col hover:shadow-xl transition-all duration-300">
                    @if($umkm->foto)
                        <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-40 object-cover" alt="{{ $umkm->nama_usaha }}">
                    @else
                        <div class="w-full h-40 bg-[#0e2206]/5 flex items-center justify-center text-[#1e6306] font-bold text-xl">
                            🛍️
                        </div>
                    @endif
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-2.5 py-0.5 bg-[#fac81b]/20 text-[#0e2206] text-[10px] font-bold rounded-full mb-2">
                                {{ $umkm->kategori ?? 'Produk Lokal' }}
                            </span>
                            <h3 class="font-bold text-[#313131] text-sm line-clamp-1">{{ $umkm->nama_usaha }}</h3>
                            <p class="text-xs text-zinc-500 line-clamp-2 mt-1">{{ $umkm->deskripsi }}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-zinc-100 flex items-center justify-between text-xs">
                            <span class="font-medium text-[#313131]">👤 {{ $umkm->nama_pemilik }}</span>
                            @if($umkm->whatsapp)
                                <a href="https://wa.me/{{ $umkm->whatsapp }}" target="_blank" class="px-3 py-1 bg-[#1e6306] hover:bg-[#0e2206] text-white rounded-xl font-semibold text-[11px] transition-colors shadow-sm shadow-[#1e6306]/30">
                                    Hubungi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Data Dummy Jika Belum Ada Data Database -->
                @foreach(range(1, 4) as $index)
                <div class="bg-white rounded-3xl shadow-sm border border-zinc-100 overflow-hidden flex flex-col hover:shadow-lg transition">
                    <div class="w-full h-40 bg-zinc-100 flex items-center justify-center text-2xl">🏪</div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-2.5 py-0.5 bg-[#fac81b] text-[#0e2206] text-[10px] font-bold rounded-full mb-2">Unggulan</span>
                            <h3 class="font-bold text-[#313131] text-sm">Produk UMKM Sukajaya {{ $index }}</h3>
                            <p class="text-xs text-zinc-500 mt-1">Produk lokal berkualitas tinggi buatan warga asli Desa Sukajaya.</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-zinc-100 text-xs text-zinc-400">
                            Hubungi kontak desa untuk informasi lengkap.
                        </div>
                    </div>
                </div>
                @endforeach
            @endforelse
        </div>
    </section>

    <!-- 4. SECTION PETA DESA -->
    <section class="max-w-6xl mx-auto px-4 pb-16">
    <h2 class="text-2xl font-bold mb-6 text-[#313131] border-b-4 border-[#1e6306] pb-2 inline-block">Peta Fasilitas Wilayah Desa</h2>
    
    <div class="w-full h-[500px] rounded-3xl overflow-hidden shadow-md border border-zinc-200 bg-zinc-100 relative group">
        
        <iframe 
            src="https://www.google.com/maps/d/u/0/embed?mid=1-cOvqsP7cQ7sckZOyhQNKpQ2ybqMTSk&ehbc=2E312F" 
            class="w-full h-full border-0" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        
        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-sm border border-gray-100 text-xs font-medium text-gray-700 pointer-events-none">
            <span class="inline-block w-3 h-3 bg-blue-500 rounded-full mr-1"></span> Sekolah &nbsp;
            <span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-1"></span> Rumah Ibadah &nbsp;
            <span class="inline-block w-3 h-3 bg-yellow-500 rounded-full mr-1"></span> Industri
        </div>
        
    </div>
</section>

</x-layouts.app>