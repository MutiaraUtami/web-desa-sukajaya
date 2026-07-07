<x-layouts.app title="Profil Desa">
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-4">Profil Desa {{ $profil->nama_desa }}</h1>
        <div class="bg-white rounded shadow p-6 space-y-2">
            <p><strong>Alamat Kantor Desa:</strong> {{ $profil->alamat_kantor ?? '-' }}</p>
            <p><strong>Telepon:</strong> {{ $profil->telepon ?? '-' }}</p>
            <p><strong>Email:</strong> {{ $profil->email ?? '-' }}</p>
            <p><strong>Luas Wilayah:</strong> {{ $profil->luas_wilayah ?? '-' }}</p>
        </div>
        @if ($profil->peta_embed)
            <div class="mt-6 aspect-video">
                <iframe src="{{ $profil->peta_embed }}" class="w-full h-full rounded shadow" loading="lazy"></iframe>
            </div>
        @endif
    </div>
</x-layouts.app>
