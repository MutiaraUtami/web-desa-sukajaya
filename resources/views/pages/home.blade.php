<x-layouts.app :title="($profil->nama_desa ?? 'Desa') . ' - Beranda'">
    <section class="bg-green-700 text-white py-20 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Selamat Datang di Website {{ $profil->nama_desa ?? 'Desa Kami' }}</h1>
        <p class="max-w-2xl mx-auto text-green-100">{{ $profil->sambutan ?? 'Website resmi desa untuk informasi, transparansi, dan pelayanan publik.' }}</p>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('profil') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
            <div class="text-3xl mb-2">🏘️</div>
            <div class="font-semibold">Profil Desa</div>
        </a>
        <a href="{{ route('berita') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
            <div class="text-3xl mb-2">📰</div>
            <div class="font-semibold">Berita Terbaru</div>
        </a>
        <a href="{{ route('umkm') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
            <div class="text-3xl mb-2">🛍️</div>
            <div class="font-semibold">UMKM Desa</div>
        </a>
        <a href="{{ route('agenda') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
            <div class="text-3xl mb-2">📅</div>
            <div class="font-semibold">Agenda</div>
        </a>
        <a href="{{ route('apbdes') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
            <div class="text-3xl mb-2">💰</div>
            <div class="font-semibold">APBDes</div>
        </a>
        <a href="{{ route('demografis') }}" class="bg-white p-6 rounded shadow hover:shadow-lg transition text-center">
            <div class="text-3xl mb-2">📊</div>
            <div class="font-semibold">Demografis</div>
        </a>
    </section>

    <section class="max-w-6xl mx-auto px-4 pb-16">
        <h2 class="text-xl font-bold mb-4">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($beritaTerbaru as $b)
                <a href="{{ route('berita.show', $b->slug) }}" class="bg-white rounded shadow overflow-hidden hover:shadow-lg transition">
                    @if ($b->gambar)
                        <img src="{{ asset('storage/'.$b->gambar) }}" class="w-full h-36 object-cover">
                    @else
                        <div class="w-full h-36 bg-gray-200"></div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-sm mb-1">{{ $b->judul }}</h3>
                        <p class="text-xs text-gray-500">{{ optional($b->tanggal_terbit)->format('d M Y') }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Belum ada berita.</p>
            @endforelse
        </div>
    </section>
</x-layouts.app>
