<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-6">Demografis &amp; Statistik Penduduk</h1>

    <!-- Card Informasi Dasar Demografis -->
    <div class="bg-white rounded shadow p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Informasi Dasar Desa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Jumlah Penduduk</p>
                <p class="text-lg font-bold text-gray-900">{{ number_format($jumlahPenduduk, 0, ',', '.') }} Jiwa</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Mata Pencaharian Utama</p>
                <p class="text-base text-gray-800">{{ $infoDasar->mata_pencaharian ?? 'Belum ada data' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Perekonomian</p>
                <p class="text-base text-gray-800">{{ $infoDasar->perekonomian ?? 'Belum ada data' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Sarana Pendidikan</p>
                <p class="text-base text-gray-800 uppercase">{{ $infoDasar->sarana_pendidikan ?? 'Belum ada data' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Tempat Ibadah</p>
                <p class="text-base text-gray-800">{{ $infoDasar->tempat_ibadah ?? 'Belum ada data' }}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Statistik Penduduk -->
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Tahun</th>
                    <th class="p-2 text-left">Dusun/RW</th>
                    <th class="p-2 text-left">Jumlah KK</th>
                    <th class="p-2 text-left">Laki-laki</th>
                    <th class="p-2 text-left">Perempuan</th>
                    <th class="p-2 text-left">Total Jiwa</th>
                    <th class="p-2 text-left">0-14 th</th>
                    <th class="p-2 text-left">15-64 th</th>
                    <th class="p-2 text-left">65+ th</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statistik as $s)
                    <tr class="border-t">
                        <td class="p-2">{{ $s->tahun }}</td>
                        <td class="p-2">{{ $s->dusun_rw ?? '-' }}</td>
                        <td class="p-2">{{ $s->jumlah_kk }}</td>
                        <td class="p-2">{{ $s->laki_laki }}</td>
                        <td class="p-2">{{ $s->perempuan }}</td>
                        <td class="p-2 font-semibold">{{ $s->total_jiwa }}</td>
                        <td class="p-2">{{ $s->usia_0_14 }}</td>
                        <td class="p-2">{{ $s->usia_15_64 }}</td>
                        <td class="p-2">{{ $s->usia_65_keatas }}</td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="p-4 text-center text-gray-500">Belum ada data statistik.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>