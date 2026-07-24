<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Registrasi Penduduk</h2>
            <p class="text-sm text-gray-500">Kelola mutasi data kependudukan per bulan</p>
        </div>
        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Tambah Data Bulan Ini</button>
    </div>

    <!-- Filter Tahun -->
    <div class="bg-white p-4 rounded shadow mb-6 flex gap-4">
        <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Pilih Tahun</label>
            <input type="number" wire:model.live="filterTahun" class="border rounded px-3 py-1.5 w-32">
        </div>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <!-- Tabel Data -->
    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-center border-collapse text-sm whitespace-nowrap">
            <thead>
                <tr class="bg-gray-200 border-b border-gray-300">
                    <th rowspan="2" class="p-2 border-r font-bold">Bulan</th>
                    <th colspan="3" class="p-2 border-r">Awal Bulan</th>
                    <th colspan="3" class="p-2 border-r bg-red-100">Mutasi Keluar</th>
                    <th colspan="3" class="p-2 border-r bg-green-100">Mutasi Masuk</th>
                    <th colspan="3" class="p-2 border-r bg-blue-100 font-bold">AKHIR BULAN</th>
                    <th rowspan="2" class="p-2">Aksi</th>
                </tr>
                <tr class="bg-gray-100 border-b border-gray-300 text-xs">
                    <th class="p-2 border-r">LK</th><th class="p-2 border-r">PR</th><th class="p-2 border-r font-bold">JML</th>
                    <th class="p-2 border-r">LK</th><th class="p-2 border-r">PR</th><th class="p-2 border-r font-bold">JML</th>
                    <th class="p-2 border-r">LK</th><th class="p-2 border-r">PR</th><th class="p-2 border-r font-bold">JML</th>
                    <th class="p-2 border-r">LK</th><th class="p-2 border-r">PR</th><th class="p-2 border-r font-bold">JML</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-2 border-r font-bold uppercase">{{ date('F', mktime(0,0,0,$item->bulan,1)) }}</td>
                        <td class="p-2 border-r">{{ $item->awal_lk }}</td><td class="p-2 border-r">{{ $item->awal_pr }}</td><td class="p-2 border-r font-bold bg-gray-50">{{ $item->awal_jml }}</td>
                        <td class="p-2 border-r text-red-600">{{ $item->mati_lk + $item->pindah_lk }}</td><td class="p-2 border-r text-red-600">{{ $item->mati_pr + $item->pindah_pr }}</td><td class="p-2 border-r font-bold bg-red-50 text-red-600">{{ $item->mati_jml + $item->pindah_jml }}</td>
                        <td class="p-2 border-r text-green-600">{{ $item->lahir_lk + $item->datang_lk }}</td><td class="p-2 border-r text-green-600">{{ $item->lahir_pr + $item->datang_pr }}</td><td class="p-2 border-r font-bold bg-green-50 text-green-600">{{ $item->lahir_jml + $item->datang_jml }}</td>
                        <td class="p-2 border-r font-bold text-blue-700">{{ $item->akhir_lk }}</td><td class="p-2 border-r font-bold text-blue-700">{{ $item->akhir_pr }}</td><td class="p-2 border-r font-bold bg-blue-50 text-blue-800 text-base">{{ $item->akhir_jml }}</td>
                        <td class="p-2 space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Hapus data bulan ini?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="14" class="p-6 text-gray-500">Belum ada data untuk tahun ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Form -->
    @if ($showModal)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4 overflow-y-auto">
            <div class="bg-white rounded-lg p-6 w-full max-w-4xl my-8">
                <h3 class="text-xl font-bold mb-4 border-b pb-2">Form Data Penduduk</h3>
                <form wire:submit="save">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded border">
                            <h4 class="font-bold text-gray-700 mb-3">Periode</h4>
                            <div class="space-y-3">
                                <div><label class="text-xs font-semibold">Tahun</label><input type="text" wire:model="tahun" class="w-full border p-2 rounded"></div>
                                <div>
                                    <label class="text-xs font-semibold">Bulan</label>
                                    <select wire:model="bulan" class="w-full border p-2 rounded">
                                        <option value="">-- Pilih Bulan --</option>
                                        @for($i=1; $i<=12; $i++) <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ date('F', mktime(0,0,0,$i, 1)) }}</option> @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-50 p-4 rounded border border-blue-100">
                            <h4 class="font-bold text-blue-800 mb-3">Data Awal Bulan</h4>
                            <div class="space-y-3">
                                <div><label class="text-xs font-semibold text-blue-700">Laki-laki</label><input type="number" wire:model="awal_lk" class="w-full border p-2 rounded"></div>
                                <div><label class="text-xs font-semibold text-blue-700">Perempuan</label><input type="number" wire:model="awal_pr" class="w-full border p-2 rounded"></div>
                            </div>
                        </div>

                        <div class="bg-yellow-50 p-4 rounded border border-yellow-100">
                            <h4 class="font-bold text-yellow-800 mb-3">Kepemilikan Dokumen</h4>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="col-span-2"><label class="text-xs font-semibold">Jumlah KK</label><input type="number" wire:model="jml_kk" class="w-full border p-2 rounded"></div>
                                <div class="col-span-2"><label class="text-xs font-semibold">Wajib KTP</label><input type="number" wire:model="wajib_ktp" class="w-full border p-2 rounded"></div>
                                <div><label class="text-xs font-semibold">KTP (Sudah)</label><input type="number" wire:model="ktp_sudah" class="w-full border p-2 rounded"></div>
                                <div><label class="text-xs font-semibold">KTP (Belum)</label><input type="number" wire:model="ktp_belum" class="w-full border p-2 rounded"></div>
                                <div><label class="text-xs font-semibold">KK (Sudah)</label><input type="number" wire:model="kk_sudah" class="w-full border p-2 rounded"></div>
                                <div><label class="text-xs font-semibold">KK (Belum)</label><input type="number" wire:model="kk_belum" class="w-full border p-2 rounded"></div>
                            </div>
                        </div>
                    </div>

                    <!-- BAGIAN YANG DIEDIT: Data Mutasi (Perubahan) -->
                    <h4 class="font-bold text-gray-700 mb-3 border-b pb-1">Data Mutasi (Perubahan)</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        
                        <!-- Mati -->
                        <div class="border p-3 rounded bg-white">
                            <label class="block text-xs font-bold text-red-600 mb-2 border-b pb-1">Mati (Meninggal)</label>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs font-bold text-gray-500 w-6">LK</span>
                                <input type="number" wire:model="mati_lk" class="w-full border p-1 text-sm rounded focus:ring-red-500">
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-gray-500 w-6">PR</span>
                                <input type="number" wire:model="mati_pr" class="w-full border p-1 text-sm rounded focus:ring-red-500">
                            </div>
                        </div>

                        <!-- Lahir -->
                        <div class="border p-3 rounded bg-white">
                            <label class="block text-xs font-bold text-blue-600 mb-2 border-b pb-1">Lahir</label>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs font-bold text-gray-500 w-6">LK</span>
                                <input type="number" wire:model="lahir_lk" class="w-full border p-1 text-sm rounded focus:ring-blue-500">
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-gray-500 w-6">PR</span>
                                <input type="number" wire:model="lahir_pr" class="w-full border p-1 text-sm rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <!-- Pindah -->
                        <div class="border p-3 rounded bg-white">
                            <label class="block text-xs font-bold text-red-600 mb-2 border-b pb-1">Pindah (Keluar)</label>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs font-bold text-gray-500 w-6">LK</span>
                                <input type="number" wire:model="pindah_lk" class="w-full border p-1 text-sm rounded focus:ring-red-500">
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-gray-500 w-6">PR</span>
                                <input type="number" wire:model="pindah_pr" class="w-full border p-1 text-sm rounded focus:ring-red-500">
                            </div>
                        </div>

                        <!-- Datang -->
                        <div class="border p-3 rounded bg-white">
                            <label class="block text-xs font-bold text-blue-600 mb-2 border-b pb-1">Datang (Masuk)</label>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs font-bold text-gray-500 w-6">LK</span>
                                <input type="number" wire:model="datang_lk" class="w-full border p-1 text-sm rounded focus:ring-blue-500">
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-gray-500 w-6">PR</span>
                                <input type="number" wire:model="datang_pr" class="w-full border p-1 text-sm rounded focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 border-t pt-4">
                        <button type="button" wire:click="$set('showModal', false)" class="px-4 py-2 border rounded hover:bg-gray-100">Batal</button>
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white font-bold rounded hover:bg-green-700">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>