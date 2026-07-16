<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Kolom Utama: Isi Berita -->
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $berita->judul }}</h1>

            <div class="flex items-center text-sm text-gray-500 mb-6 gap-4">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    {{ $berita->penulis ?? 'Admin Desa' }}
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $berita->tanggal_terbit ? date('d M Y', strtotime($berita->tanggal_terbit)) : date('d M Y', strtotime($berita->created_at)) }}
                </span>
            </div>

            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto rounded-lg mb-8 object-cover max-h-[500px]">
            @endif

            <div class="prose max-w-none text-gray-700 leading-relaxed text-justify">
                {{-- Gunakan nl2br dan e() agar enter/paragraf dari textarea tetap terbaca dengan aman --}}
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <div class="mt-10 border-t pt-6">
                <!-- Nanti tombol ini bisa diarahkan ke halaman daftar berita buatan Muti -->
                <a href="/" class="text-blue-600 hover:underline font-medium inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- Kolom Sidebar: Berita Lainnya -->
        <div class="lg:col-span-1">
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100 sticky top-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Berita Terbaru</h3>
                <div class="space-y-4">
                    @forelse ($beritaLainnya as $item)
                        <!-- Link mengarah ke rute detail berita ini sendiri -->
                        <a href="{{ route('berita.detail', $item->slug) }}" class="group block">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-20 h-20 rounded bg-gray-200 overflow-hidden">
                                    <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://via.placeholder.com/150?text=No+Image' }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-800 group-hover:text-blue-600 line-clamp-2 transition-colors">{{ $item->judul }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">{{ date('d M Y', strtotime($item->created_at)) }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-gray-500">Belum ada berita lain.</p>
                    @endforelse
                </div>
            </div>
        </div>
        
    </div>
</div>