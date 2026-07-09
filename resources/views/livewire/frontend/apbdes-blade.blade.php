<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-6">APBDes (Anggaran Pendapatan dan Belanja Desa)</h1>

    <div class="mb-6">
        <label class="text-sm font-medium mr-2">Tahun Anggaran:</label>
        <select wire:model.live="tahun" class="border rounded p-2">
            @foreach ($tahunList as $t)
                <option value="{{ $t }}">{{ $t }}</option>
            @endforeach
        </select>
    </div>

    @forelse (['pendapatan', 'belanja', 'pembiayaan'] as $jenis)
        <div class="mb-8">
            <h2 class="text-lg font-semibold capitalize mb-2 bg-green-600 text-white px-3 py-2 rounded">{{ $jenis }}</h2>
            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 text-left">Bidang</th>
                            <th class="p-2 text-left">Uraian</th>
                            <th class="p-2 text-right">Anggaran</th>
                            <th class="p-2 text-right">Realisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data[$jenis] ?? [] as $item)
                            <tr class="border-t">
                                <td class="p-2">{{ $item->bidang ?? '-' }}</td>
                                <td class="p-2">{{ $item->uraian }}</td>
                                <td class="p-2 text-right">Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
                                <td class="p-2 text-right">Rp {{ number_format($item->realisasi, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="p-3 text-center text-gray-500">Tidak ada data.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
