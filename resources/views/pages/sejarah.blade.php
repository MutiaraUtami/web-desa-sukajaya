<x-layouts.app title="Sejarah Desa">
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6">Sejarah Desa</h1>
        <div class="bg-white rounded shadow p-6">
            <p class="text-gray-700 whitespace-pre-line">{{ $profil->sejarah ?? 'Belum diisi.' }}</p>
        </div>
    </div>
</x-layouts.app>
