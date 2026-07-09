<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Berita Desa</h2>
        <button wire:click="create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Berita</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Gambar</th>
                    <th class="p-2 text-left">Judul</th>
                    <th class="p-2 text-left">Penulis</th>
                    <th class="p-2 text-left">Tanggal Terbit</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-t">
                        <td class="p-2">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}" class="w-16 h-12 object-cover rounded">
                            @endif
                        </td>
                        <td class="p-2">{{ $item->judul }}</td>
                        <td class="p-2">{{ $item->penulis ?? '-' }}</td>
                        <td class="p-2">{{ optional($item->tanggal_terbit)->format('d M Y') }}</td>
                        <td class="p-2 space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4">{{ $item_id ? 'Edit' : 'Tambah' }} Berita</h3>
                <form wire:submit="save" class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium">Judul</label>
                        <input type="text" wire:model="judul" class="w-full border rounded p-2">
                        @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Ringkasan</label>
                        <textarea wire:model="ringkasan" class="w-full border rounded p-2"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Isi Berita</label>
                        <textarea wire:model="isi" rows="6" class="w-full border rounded p-2"></textarea>
                        @error('isi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium">Penulis</label>
                            <input type="text" wire:model="penulis" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tanggal Terbit</label>
                            <input type="date" wire:model="tanggal_terbit" class="w-full border rounded p-2">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Gambar</label>
                        <input type="file" wire:model="gambar" class="w-full border rounded p-2">
                        @error('gambar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        @if ($gambarLama && !$gambar)
                            <img src="{{ asset('storage/'.$gambarLama) }}" class="w-24 h-16 object-cover mt-2 rounded">
                        @endif
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
