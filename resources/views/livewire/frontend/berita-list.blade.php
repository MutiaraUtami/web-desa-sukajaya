<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-6">Berita Desa</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($beritas as $b)
            <a href="{{ route('berita.show', $b->slug) }}" class="bg-white rounded shadow overflow-hidden hover:shadow-lg transition">
                @if ($b->gambar)
                    <img src="{{ asset('storage/'.$b->gambar) }}" class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-gray-200"></div>
                @endif
                <div class="p-4">
                    <h2 class="font-semibold mb-1">{{ $b->judul }}</h2>
                    <p class="text-xs text-gray-500 mb-2">{{ optional($b->tanggal_terbit)->format('d M Y') }}</p>
                    <p class="text-sm text-gray-600">{{ Str::limit($b->ringkasan, 100) }}</p>
                </div>
            </a>
        @empty
            <p class="text-gray-500">Belum ada berita.</p>
        @endforelse
    </div>
    <div class="mt-6">{{ $beritas->links() }}</div>
</div>
