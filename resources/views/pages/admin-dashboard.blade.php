<x-layouts.admin>
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-green-700">{{ $totalBerita }}</div>
            <div class="text-sm text-gray-500">Berita</div>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-green-700">{{ $totalAgenda }}</div>
            <div class="text-sm text-gray-500">Agenda</div>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-green-700">{{ $totalUmkm }}</div>
            <div class="text-sm text-gray-500">UMKM</div>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <div class="text-2xl font-bold text-green-700">{{ $totalOrganisasi }}</div>
            <div class="text-sm text-gray-500">Anggota Struktur</div>
        </div>
    </div>
    <p class="text-gray-500 mt-6">Selamat datang, {{ auth()->user()->name }}. Gunakan menu di samping untuk mengelola konten website desa.</p>
</x-layouts.admin>
