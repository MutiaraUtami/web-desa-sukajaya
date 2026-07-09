<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Data Statistik Penduduk</h2>
        <button wire:click="create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah Data
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

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
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->tahun }}</td>
                        <td class="p-2">{{ $item->dusun_rw ?? '-' }}</td>
                        <td class="p-2">{{ $item->jumlah_kk }}</td>
                        <td class="p-2">{{ $item->laki_laki }}</td>
                        <td class="p-2">{{ $item->perempuan }}</td>
                        <td class="p-2">{{ $item->total_jiwa }}</td>
                        <td class="p-2 space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus data ini?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="p-4 text-center text-gray-500">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    {{-- Modal Form --}}
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg max-h-[90vh] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4">{{ $statistik_id ? 'Edit' : 'Tambah' }} Data Statistik</h3>
                <form wire:submit="save" class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium">Tahun</label>
                        <input type="number" wire:model="tahun" class="w-full border rounded p-2">
                        @error('tahun') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Dusun/RW</label>
                        <input type="text" wire:model="dusun_rw" class="w-full border rounded p-2">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Jumlah KK</label>
                            <input type="number" wire:model="jumlah_kk" class="w-full border rounded p-2">
                            @error('jumlah_kk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Laki-laki</label>
                            <input type="number" wire:model="laki_laki" class="w-full border rounded p-2">
                            @error('laki_laki') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Perempuan</label>
                            <input type="number" wire:model="perempuan" class="w-full border rounded p-2">
                            @error('perempuan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Usia 0-14</label>
                            <input type="number" wire:model="usia_0_14" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Usia 15-64</label>
                            <input type="number" wire:model="usia_15_64" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Usia 65+</label>
                            <input type="number" wire:model="usia_65_keatas" class="w-full border rounded p-2">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Keterangan</label>
                        <textarea wire:model="keterangan" class="w-full border rounded p-2"></textarea>
                    </div>
                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 rounded border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
