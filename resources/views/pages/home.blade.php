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
        <div class="flex justify-between items-end mb-6">
            <h2 class="text-2xl font-bold text-[#313131] border-b-4 border-[#1e6306] pb-2 inline-block">UMKM Unggulan Desa</h2>
            <a href="/umkm" class="text-[#1e6306] font-bold hover:text-[#fac81b] transition-colors mb-2 text-sm md:text-base">
                Lihat Semua &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Mengambil 4 data UMKM terbaru --}}
            @foreach (\App\Models\Umkm::latest()->take(4)->get() as $item)
                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-zinc-100 overflow-hidden flex flex-col">
                    
                    <div class="h-48 bg-zinc-100 relative flex items-center justify-center overflow-hidden">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_usaha }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="text-5xl z-10 group-hover:scale-110 transition-transform duration-500">🏪</div>
                        @endif
                        
                        <div class="absolute top-4 right-4 bg-[#fac81b] text-[#0e2206] text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm z-20">
                            {{ $item->kategori ?? 'Unggulan' }}
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10 bg-white">
                        <h3 class="text-lg font-bold text-zinc-800 mb-2 group-hover:text-[#1e6306] transition-colors">
                            {{ $item->nama_usaha }}
                        </h3>
                        
                        <p class="text-sm text-zinc-500 mb-6 flex-1 line-clamp-2 leading-relaxed">
                            {{ $item->deskripsi ?? 'Produk lokal berkualitas tinggi buatan warga asli Desa Sukajaya.' }}
                        </p>
                        
                        <div class="border-t border-zinc-100 pt-4 mt-auto">
                            <p class="text-xs text-zinc-500 flex items-center gap-2">
                                @if($item->kontak)
                                    <span class="w-6 h-6 rounded-full bg-[#1e6306]/10 flex items-center justify-center text-[#1e6306]">📞</span>
                                    <span class="truncate"><span class="font-bold text-zinc-700">{{ $item->kontak }}</span> ({{ $item->pemilik }})</span>
                                @else
                                    <span class="w-6 h-6 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-400">ℹ️</span>
                                    <span>Hubungi desa untuk info.</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </section>
    
<!-- 4. SECTION PETA DESA -->
    <section class="max-w-6xl mx-auto px-4 pb-16">
        <h2 class="text-2xl font-bold mb-6 text-[#313131] border-b-4 border-[#1e6306] pb-2 inline-block">Peta Wilayah Desa</h2>
        
        <div class="w-full h-[500px] rounded-3xl overflow-hidden shadow-md border border-zinc-200 bg-zinc-100 relative group">
            
            <iframe 
                src="https://www.google.com/maps?q=Desa+Sukajaya,+Sukatani,+Purwakarta&output=embed" 
                class="w-full h-full border-0" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            
        </div>
    </section>

</x-layouts.app>