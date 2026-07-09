<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-6">Daftar UMKM Desa</h1>
    <input type="text" wire:model.live.debounce.400ms="search" placeholder="Cari nama usaha atau kategori..." class="border rounded p-2 w-full max-w-md mb-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($umkms as $u)
            <div class="bg-white rounded shadow overflow-hidden">
                @if ($u->foto)
                    <img src="{{ asset('storage/'.$u->foto) }}" class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-gray-200"></div>
                @endif
                <div class="p-4">
                    <h2 class="font-semibold">{{ $u->nama_usaha }}</h2>
                    <p class="text-xs text-green-700 mb-1">{{ $u->kategori }}</p>
                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($u->deskripsi, 80) }}</p>
                    <p class="text-xs text-gray-500">Pemilik: {{ $u->pemilik }}</p>
                    @if ($u->kontak)
                        <p class="text-xs text-gray-500">Kontak: {{ $u->kontak }}</p>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada UMKM terdaftar.</p>
        @endforelse
    </div>
    <div class="mt-6">{{ $umkms->links() }}</div>
</div>
