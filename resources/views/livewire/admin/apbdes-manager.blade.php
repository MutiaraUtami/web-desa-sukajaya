<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">APBDes</h2>
        <button wire:click="create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Data</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="mb-4">
        <input type="number" wire:model.live="filterTahun" placeholder="Filter tahun anggaran..." class="border rounded p-2 w-48">
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Tahun</th>
                    <th class="p-2 text-left">Jenis</th>
                    <th class="p-2 text-left">Bidang</th>
                    <th class="p-2 text-left">Uraian</th>
                    <th class="p-2 text-right">Anggaran</th>
                    <th class="p-2 text-right">Realisasi</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->tahun_anggaran }}</td>
                        <td class="p-2 capitalize">{{ $item->jenis }}</td>
                        <td class="p-2">{{ $item->bidang ?? '-' }}</td>
                        <td class="p-2">{{ $item->uraian }}</td>
                        <td class="p-2 text-right">Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
                        <td class="p-2 text-right">Rp {{ number_format($item->realisasi, 0, ',', '.') }}</td>
                        <td class="p-2 space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="p-4 text-center text-gray-500">Belum ada data APBDes.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg max-h-[90vh] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4">{{ $item_id ? 'Edit' : 'Tambah' }} Data APBDes</h3>
                <form wire:submit="save" class="space-y-3">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Tahun Anggaran</label>
                            <input type="number" wire:model="tahun_anggaran" class="w-full border rounded p-2">
                            @error('tahun_anggaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Jenis</label>
                            <select wire:model="jenis" class="w-full border rounded p-2">
                                <option value="pendapatan">Pendapatan</option>
                                <option value="belanja">Belanja</option>
                                <option value="pembiayaan">Pembiayaan</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Bidang</label>
                        <input type="text" wire:model="bidang" placeholder="Contoh: Bidang Pembangunan" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Uraian</label>
                        <input type="text" wire:model="uraian" class="w-full border rounded p-2">
                        @error('uraian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Anggaran (Rp)</label>
                            <input type="number" step="0.01" wire:model="anggaran" class="w-full border rounded p-2">
                            @error('anggaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Realisasi (Rp)</label>
                            <input type="number" step="0.01" wire:model="realisasi" class="w-full border rounded p-2">
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
