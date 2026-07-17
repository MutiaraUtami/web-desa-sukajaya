<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Manajemen Statistik Penduduk</h2>
        <button wire:click="create" class="bg-[#1e6306] text-white px-5 py-2 rounded-lg hover:bg-[#0e2206] transition shadow-md">
            + Tambah Data
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 border border-green-200">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-zinc-200">
        <table class="min-w-full text-sm">
            <thead class="bg-zinc-50 border-b border-zinc-100">
                <tr class="text-gray-600">
                    <th class="p-4 text-left">Tahun</th>
                    <th class="p-4 text-left">Dusun/RW</th>
                    <th class="p-4 text-left">KK</th>
                    <th class="p-4 text-left">L</th>
                    <th class="p-4 text-left">P</th>
                    <th class="p-4 text-left font-bold">Total</th>
                    <th class="p-4 text-left">0-14</th>
                    <th class="p-4 text-left">15-64</th>
                    <th class="p-4 text-left">65+</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100">
                @forelse ($data as $item)
                    <tr class="hover:bg-zinc-50 transition">
                        <td class="p-4">{{ $item->tahun }}</td>
                        <td class="p-4">{{ $item->dusun_rw ?? '-' }}</td>
                        <td class="p-4">{{ $item->jumlah_kk }}</td>
                        <td class="p-4">{{ $item->laki_laki }}</td>
                        <td class="p-4">{{ $item->perempuan }}</td>
                        <td class="p-4 font-bold">{{ $item->total_jiwa }}</td>
                        <td class="p-4">{{ $item->usia_0_14 }}</td>
                        <td class="p-4">{{ $item->usia_15_64 }}</td>
                        <td class="p-4">{{ $item->usia_65_keatas }}</td>
                        <td class="p-4 space-x-3">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus data ini?" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="10" class="p-6 text-center text-gray-500">Belum ada data tersedia.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $statistik->links() }}
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    {{-- Modal Form --}}
    @if ($showModal)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl p-8 w-full max-w-lg max-h-[90vh] overflow-y-auto shadow-2xl">
                <h3 class="text-xl font-bold mb-6 text-gray-800">{{ $statistik_id ? 'Edit' : 'Tambah' }} Data Statistik</h3>
                <form wire:submit="save" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Tahun</label>
                            <input type="number" wire:model="tahun" class="w-full border border-gray-300 rounded-lg p-2.5">
                            @error('tahun') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Dusun/RW</label>
                            <input type="text" wire:model="dusun_rw" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="block text-sm font-medium mb-1">Jml KK</label>
                            <input type="number" wire:model="jumlah_kk" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Laki-Laki</label>
                            <input type="number" wire:model="laki_laki" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Perempuan</label>
                            <input type="number" wire:model="perempuan" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="block text-sm font-medium mb-1">Usia 0-14</label>
                            <input type="number" wire:model="usia_0_14" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Usia 15-64</label>
                            <input type="number" wire:model="usia_15_64" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Usia 65+</label>
                            <input type="number" wire:model="usia_65_keatas" class="w-full border border-gray-300 rounded-lg p-2.5">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Keterangan</label>
                        <textarea wire:model="keterangan" rows="3" class="w-full border border-gray-300 rounded-lg p-2.5"></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" wire:click="closeModal" class="px-5 py-2.5 rounded-lg border border-gray-300 hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 rounded-lg bg-[#1e6306] text-white hover:bg-[#0e2206] transition">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>