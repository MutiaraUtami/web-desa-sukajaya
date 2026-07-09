<x-layouts.app :title="($profil->nama_desa ?? 'Website Sukajaya') . ' - Beranda'">
    
    @include('components.layouts.partials.hero-slider')

    <div class="w-full bg-green-700 text-white py-3 overflow-hidden border-b border-emerald-700 shadow-sm relative z-30">
    <div class="max-w-7xl mx-auto px-4 flex items-center">
        <div class="bg-green-800 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-md mr-4 shadow-inner whitespace-nowrap relative z-10">
            Pengumuman / Sambutan:
        </div>
        
        <div class="relative w-full overflow-hidden flex items-center h-5 select-none gap-4">
            <div class="flex whitespace-nowrap gap-4 animate-marquee">
                <p class="text-sm font-medium tracking-wide">
                    {{ $profil->sambutan ?? 'Selamat Datang di Website Resmi Desa Sukajaya. Website ini hadir sebagai wujud transparansi, pusat informasi, dan peningkatan pelayanan publik digital untuk seluruh lapisan masyarakat desa.' }}
                </p>
                <span class="text-emerald-300 font-bold">•</span>
            </div>
            
            <div class="flex whitespace-nowrap gap-4 animate-marquee" aria-hidden="true">
                <p class="text-sm font-medium tracking-wide">
                    {{ $profil->sambutan ?? 'Selamat Datang di Website Resmi Desa Sukajaya. Website ini hadir sebagai wujud transparansi, pusat informasi, dan peningkatan pelayanan publik digital untuk seluruh lapisan masyarakat desa.' }}
                </p>
                <span class="text-emerald-300 font-bold">•</span>
            </div>
        </div>
    </div>
</div>
    
    <section class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('profil') }}" class="bg-white p-6 rounded shadow-sm hover:shadow-lg hover:-translate-y-1 transition text-center border border-zinc-100">
            <div class="text-3xl mb-2">🏘️</div>
            <div class="font-semibold font-sans">Profil Desa</div>
        </a>
        <a href="{{ route('berita') }}" class="bg-white p-6 rounded shadow-sm hover:shadow-lg hover:-translate-y-1 transition text-center border border-zinc-100">
            <div class="text-3xl mb-2">📰</div>
            <div class="font-semibold font-sans">Berita Terbaru</div>
        </a>
        <a href="{{ route('umkm') }}" class="bg-white p-6 rounded shadow-sm hover:shadow-lg hover:-translate-y-1 transition text-center border border-zinc-100">
            <div class="text-3xl mb-2">🛍️</div>
            <div class="font-semibold font-sans">UMKM Desa</div>
        </a>
        <a href="{{ route('agenda') }}" class="bg-white p-6 rounded shadow-sm hover:shadow-lg hover:-translate-y-1 transition text-center border border-zinc-100">
            <div class="text-3xl mb-2">📅</div>
            <div class="font-semibold font-sans">Agenda</div>
        </a>
        <a href="{{ route('apbdes') }}" class="bg-white p-6 rounded shadow-sm hover:shadow-lg hover:-translate-y-1 transition text-center border border-zinc-100">
            <div class="text-3xl mb-2">💰</div>
            <div class="font-semibold font-sans">APBDes</div>
        </a>
        <a href="{{ route('demografis') }}" class="bg-white p-6 rounded shadow-sm hover:shadow-lg hover:-translate-y-1 transition text-center border border-zinc-100">
            <div class="text-3xl mb-2">📊</div>
            <div class="font-semibold font-sans">Demografis</div>
        </a>
    </section>

    <section class="max-w-6xl mx-auto px-4 pb-16">
        <h2 class="text-2xl font-bold mb-6 text-zinc-800">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($beritaTerbaru as $b)
                <a href="{{ route('berita.show', $b->slug) }}" class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition flex flex-col border border-zinc-100">
                    @if ($b->gambar)
                        <img src="{{ asset('storage/'.$b->gambar) }}" class="w-full h-44 object-cover">
                    @else
                        <div class="w-full h-44 bg-zinc-200"></div>
                    @endif
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h3 class="font-semibold text-zinc-800 text-sm mb-2 line-clamp-2 leading-snug">{{ $b->judul }}</h3>
                        <p class="text-xs text-zinc-400 font-medium">{{ optional($b->tanggal_terbit)->format('d M Y') }}</p>
                    </div>
                </a>
            @empty
                <p class="text-zinc-500">Belum ada berita terbaru saat ini.</p>
            @endforelse
        </div>
    </section>
</x-layouts.app>