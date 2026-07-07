<x-layouts.app :title="$berita->judul">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <a href="{{ route('berita') }}" class="text-green-700 text-sm hover:underline">&larr; Kembali ke Berita</a>
        <h1 class="text-2xl font-bold mt-4 mb-2">{{ $berita->judul }}</h1>
        <p class="text-sm text-gray-500 mb-6">Oleh {{ $berita->penulis ?? 'Admin Desa' }} &bull; {{ optional($berita->tanggal_terbit)->format('d M Y') }}</p>
        @if ($berita->gambar)
            <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-full h-64 object-cover rounded mb-6">
        @endif
        <div class="prose max-w-none whitespace-pre-line text-gray-700">{{ $berita->isi }}</div>
    </div>
</x-layouts.app>
