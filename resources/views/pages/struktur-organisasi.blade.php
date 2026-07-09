<x-layouts.app title="Struktur Organisasi">
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6">Struktur Organisasi Pemerintah Desa</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse ($organisasi as $o)
                <div class="bg-white rounded shadow p-4 text-center">
                    <img src="{{ $o->foto ? asset('storage/'.$o->foto) : 'https://ui-avatars.com/api/?name='.urlencode($o->nama) }}" class="w-20 h-20 rounded-full mx-auto object-cover mb-2">
                    <div class="font-semibold">{{ $o->nama }}</div>
                    <div class="text-sm text-gray-500">{{ $o->jabatan }}</div>
                </div>
            @empty
                <p class="text-gray-500 col-span-4 text-center">Belum ada data struktur organisasi.</p>
            @endforelse
        </div>
    </div>
</x-layouts.app>
