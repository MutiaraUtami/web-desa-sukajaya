<div class="container mx-auto px-4 py-10">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-[#0e2206] uppercase tracking-wide">Laporan Registrasi Penduduk</h1>
        <p class="text-gray-600 mt-2">Rekapitulasi Data Penduduk Berdasarkan Registrasi Penduduk WNI</p>
    </div>

    <!-- Filter -->
    <div class="bg-white p-4 rounded-lg shadow-sm border mb-6 flex flex-wrap gap-4 items-center justify-center">
        <div class="flex items-center gap-2">
            <label class="font-bold text-gray-700">TAHUN:</label>
            <select wire:model.live="filterTahun" class="border rounded p-2 focus:ring-green-500">
                @foreach($listTahun as $t) <option value="{{ $t }}">{{ $t }}</option> @endforeach
            </select>
        </div>
        <div class="flex items-center gap-2">
            <label class="font-bold text-gray-700">BULAN:</label>
            <select wire:model.live="filterBulan" class="border rounded p-2 focus:ring-green-500">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ date('F', mktime(0,0,0,$i, 1, date('Y'))) }}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- Tabel Persis Excel -->
    <div class="bg-white shadow-xl rounded-lg overflow-x-auto border border-gray-300">
        <table class="w-full text-center border-collapse text-xs md:text-sm">
            <thead>
                <tr class="bg-green-700 text-white">
                    <th rowspan="3" class="border border-green-800 p-2">BULAN</th>
                    <th colspan="3" class="border border-green-800 p-2">PENDUDUK AWAL</th>
                    <th colspan="3" class="border border-green-800 p-2 bg-red-600">MATI</th>
                    <th colspan="3" class="border border-green-800 p-2 bg-blue-600">LAHIR</th>
                    <th colspan="3" class="border border-green-800 p-2 bg-red-600">PINDAH</th>
                    <th colspan="3" class="border border-green-800 p-2 bg-blue-600">DATANG</th>
                    <th colspan="3" class="border border-green-800 p-2 bg-yellow-600 text-black">PENDUDUK AKHIR</th>
                    <th rowspan="2" class="border border-green-800 p-2">JML KK</th>
                    <th rowspan="2" class="border border-green-800 p-2">WAJIB KTP</th>
                    <th colspan="2" class="border border-green-800 p-2">MMLK KTP</th>
                    <th colspan="2" class="border border-green-800 p-2">MMLK KK</th>
                </tr>
                <tr class="bg-green-600 text-white">
                    <th class="border border-green-800 p-1">LK</th><th class="border border-green-800 p-1">PR</th><th class="border border-green-800 p-1">JML</th>
                    <th class="border border-green-800 p-1">LK</th><th class="border border-green-800 p-1">PR</th><th class="border border-green-800 p-1">JML</th>
                    <th class="border border-green-800 p-1">LK</th><th class="border border-green-800 p-1">PR</th><th class="border border-green-800 p-1">JML</th>
                    <th class="border border-green-800 p-1">LK</th><th class="border border-green-800 p-1">PR</th><th class="border border-green-800 p-1">JML</th>
                    <th class="border border-green-800 p-1">LK</th><th class="border border-green-800 p-1">PR</th><th class="border border-green-800 p-1">JML</th>
                    <th class="border border-green-800 p-1">LK</th><th class="border border-green-800 p-1">PR</th><th class="border border-green-800 p-1">JML</th>
                    <th class="border border-green-800 p-1">SDH</th><th class="border border-green-800 p-1">BLM</th><th class="border border-green-800 p-1">SDH</th><th class="border border-green-800 p-1">BLM</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 font-medium bg-gray-50">
                @forelse ($data as $item)
                <tr class="hover:bg-green-50 transition">
                    <td class="border p-2 font-bold uppercase">{{ date('F', mktime(0,0,0,$item->bulan,1)) }}</td>
                    <td class="border p-2">{{ $item->awal_lk }}</td><td class="border p-2">{{ $item->awal_pr }}</td><td class="border p-2 font-bold">{{ $item->awal_jml }}</td>
                    <td class="border p-2">{{ $item->mati_lk }}</td><td class="border p-2">{{ $item->mati_pr }}</td><td class="border p-2 font-bold">{{ $item->mati_jml }}</td>
                    <td class="border p-2">{{ $item->lahir_lk }}</td><td class="border p-2">{{ $item->lahir_pr }}</td><td class="border p-2 font-bold">{{ $item->lahir_jml }}</td>
                    <td class="border p-2">{{ $item->pindah_lk }}</td><td class="border p-2">{{ $item->pindah_pr }}</td><td class="border p-2 font-bold">{{ $item->pindah_jml }}</td>
                    <td class="border p-2">{{ $item->datang_lk }}</td><td class="border p-2">{{ $item->datang_pr }}</td><td class="border p-2 font-bold">{{ $item->datang_jml }}</td>
                    <td class="border p-2 bg-yellow-100">{{ $item->akhir_lk }}</td><td class="border p-2 bg-yellow-100">{{ $item->akhir_pr }}</td><td class="border p-2 bg-yellow-200 font-bold text-black text-base">{{ $item->akhir_jml }}</td>
                    <td class="border p-2">{{ $item->jml_kk }}</td><td class="border p-2">{{ $item->wajib_ktp }}</td>
                    <td class="border p-2">{{ $item->ktp_sudah }}</td><td class="border p-2">{{ $item->ktp_belum }}</td>
                    <td class="border p-2">{{ $item->kk_sudah }}</td><td class="border p-2">{{ $item->kk_belum }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="23" class="p-8 text-center text-gray-500 font-normal">Data statistik untuk bulan ini belum diunggah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>