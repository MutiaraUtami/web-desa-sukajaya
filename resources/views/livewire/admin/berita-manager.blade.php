<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola Berita</h2>
            <p class="text-sm text-gray-500">Pusat informasi dan artikel kegiatan desa.</p>
        </div>
        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">+ Tulis Berita</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($data as $item)
            <div class="bg-white rounded shadow border border-gray-100 overflow-hidden">
                <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://via.placeholder.com/400x200?text=No+Image' }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2 truncate">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $item->ringkasan ?? Str::limit($item->isi, 100) }}</p>
                    <div class="flex justify-between items-center text-sm border-t pt-3">
                        <span class="text-gray-400">{{ $item->tanggal_terbit ? date('d M Y', strtotime($item->tanggal_terbit)) : 'Draft' }}</span>
                        <div class="space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline font-medium">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus berita ini?" class="text-red-600 hover:underline font-medium">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white rounded shadow text-gray-500">Belum ada berita yang diterbitkan.</div>
        @endforelse
    </div>
    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <h3 class="text-xl font-bold mb-4">{{ $item_id ? 'Edit' : 'Tulis' }} Berita</h3>
                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Judul Berita</label>
                        <input type="text" wire:model="judul" class="w-full border rounded p-2 focus:ring-blue-500">
                        @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Penulis</label>
                            <input type="text" wire:model="penulis" class="w-full border rounded p-2 focus:ring-blue-500" placeholder="Opsional">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Tanggal Terbit</label>
                            <input type="datetime-local" wire:model="tanggal_terbit" class="w-full border rounded p-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Gambar/Thumbnail</label>
                        <input type="file" wire:model="gambar" accept="image/*" class="w-full border rounded p-2 focus:ring-blue-500">
                        @if ($gambarLama && !$gambar)
                            <img src="{{ asset('storage/'.$gambarLama) }}" class="h-20 mt-2 rounded">
                        @endif
                        @error('gambar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Ringkasan (Opsional)</label>
                        <textarea wire:model="ringkasan" rows="2" class="w-full border rounded p-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Isi Berita</label>
                        <textarea wire:model="isi" rows="6" class="w-full border rounded p-2 focus:ring-blue-500"></textarea>
                        @error('isi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end gap-2 pt-4">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 rounded border hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan Berita</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>