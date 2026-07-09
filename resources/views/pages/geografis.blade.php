<x-layouts.app title="Geografis Desa">
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6">Kondisi Geografis</h1>
        <div class="bg-white rounded shadow p-6 space-y-3">
            <p class="text-gray-700 whitespace-pre-line">{{ $profil->geografis ?? 'Belum diisi.' }}</p>
            <div class="grid grid-cols-2 gap-3 pt-4 text-sm">
                <p><strong>Batas Utara:</strong> {{ $profil->batas_utara ?? '-' }}</p>
                <p><strong>Batas Selatan:</strong> {{ $profil->batas_selatan ?? '-' }}</p>
                <p><strong>Batas Timur:</strong> {{ $profil->batas_timur ?? '-' }}</p>
                <p><strong>Batas Barat:</strong> {{ $profil->batas_barat ?? '-' }}</p>
                <p><strong>Luas Wilayah:</strong> {{ $profil->luas_wilayah ?? '-' }}</p>
            </div>
        </div>
        @if ($profil->peta_embed)
            <div class="mt-6 aspect-video">
                <iframe src="{{ $profil->peta_embed }}" class="w-full h-full rounded shadow" loading="lazy"></iframe>
            </div>
        @endif
    </div>
</x-layouts.app>
