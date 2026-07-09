<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Daftar UMKM</h2>
        <button wire:click="create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah UMKM</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Nama Usaha</th>
                    <th class="p-2 text-left">Pemilik</th>
                    <th class="p-2 text-left">Kategori</th>
                    <th class="p-2 text-left">Kontak</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-t">
                        <td class="p-2">{{ $item->nama_usaha }}</td>
                        <td class="p-2">{{ $item->pemilik }}</td>
                        <td class="p-2">{{ $item->kategori ?? '-' }}</td>
                        <td class="p-2">{{ $item->kontak ?? '-' }}</td>
                        <td class="p-2 space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada data UMKM.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg max-h-[90vh] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4">{{ $item_id ? 'Edit' : 'Tambah' }} UMKM</h3>
                <form wire:submit="save" class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium">Nama Usaha</label>
                        <input type="text" wire:model="nama_usaha" class="w-full border rounded p-2">
                        @error('nama_usaha') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Pemilik</label>
                        <input type="text" wire:model="pemilik" class="w-full border rounded p-2">
                        @error('pemilik') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Kategori</label>
                        <input type="text" wire:model="kategori" placeholder="Kuliner, Kerajinan, Jasa, dll" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Deskripsi</label>
                        <textarea wire:model="deskripsi" class="w-full border rounded p-2"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <input type="text" wire:model="alamat" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Kontak (WA/Telp)</label>
                        <input type="text" wire:model="kontak" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Foto</label>
                        <input type="file" wire:model="foto" class="w-full border rounded p-2">
                        @if ($fotoLama && !$foto)
                            <img src="{{ asset('storage/'.$fotoLama) }}" class="w-24 h-16 object-cover mt-2 rounded">
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
