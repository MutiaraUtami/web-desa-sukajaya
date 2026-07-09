<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Struktur Organisasi</h2>
        <button wire:click="create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($data as $item)
            <div class="bg-white rounded shadow p-4 text-center">
                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://ui-avatars.com/api/?name='.urlencode($item->nama) }}" class="w-20 h-20 rounded-full mx-auto object-cover mb-2">
                <div class="font-semibold">{{ $item->nama }}</div>
                <div class="text-sm text-gray-500 mb-2">{{ $item->jabatan }}</div>
                <div class="space-x-2">
                    <button wire:click="edit({{ $item->id }})" class="text-blue-600 text-sm hover:underline">Edit</button>
                    <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus?" class="text-red-600 text-sm hover:underline">Hapus</button>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-3 text-center">Belum ada data.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">{{ $item_id ? 'Edit' : 'Tambah' }} Anggota</h3>
                <form wire:submit="save" class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" wire:model="nama" class="w-full border rounded p-2">
                        @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Jabatan</label>
                        <input type="text" wire:model="jabatan" class="w-full border rounded p-2">
                        @error('jabatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Urutan Tampil</label>
                        <input type="number" wire:model="urutan" class="w-full border rounded p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Foto</label>
                        <input type="file" wire:model="foto" class="w-full border rounded p-2">
                        @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        @if ($fotoLama && !$foto)
                            <img src="{{ asset('storage/'.$fotoLama) }}" class="w-16 h-16 rounded-full mt-2 object-cover">
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
