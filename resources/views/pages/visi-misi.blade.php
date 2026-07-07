<x-layouts.app title="Visi & Misi">
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6">Visi &amp; Misi</h1>
        <div class="bg-white rounded shadow p-6 mb-6">
            <h2 class="font-semibold mb-2">Visi</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $profil->visi ?? 'Belum diisi.' }}</p>
        </div>
        <div class="bg-white rounded shadow p-6">
            <h2 class="font-semibold mb-2">Misi</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $profil->misi ?? 'Belum diisi.' }}</p>
        </div>
    </div>
</x-layouts.app>
