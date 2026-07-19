<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola UMKM Desa</h2>
            <p class="text-sm text-gray-500">Daftar pelaku usaha di Desa Sukajaya.</p>
        </div>
        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">+ Tambah UMKM</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($data as $item)
            <div class="bg-white rounded shadow p-4 border border-gray-100 relative">
                @if($item->kategori)
                    <span class="absolute top-2 right-2 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded shadow-sm">{{ $item->kategori }}</span>
                @endif
                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://via.placeholder.com/150' }}" class="w-full h-40 object-cover rounded mb-3">
                <h3 class="font-bold text-lg">{{ $item->nama_usaha }}</h3>
                <p class="text-sm text-gray-600 mb-1">Pemilik: {{ $item->pemilik }}</p>
                @if($item->kontak)
                    <p class="text-xs text-gray-500 mb-1">📞 {{ $item->kontak }}</p>
                @endif
                @if($item->alamat)
                    <p class="text-xs text-gray-500 mb-4 truncate">📍 {{ $item->alamat }}</p>
                @else
                    <div class="mb-4"></div>
                @endif
                
                <div class="flex justify-end gap-2 border-t pt-3">
                    <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline text-sm font-medium">Edit</button>
                    <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus data ini?" class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10 text-gray-500">Belum ada data UMKM.</div>
        @endforelse
    </div>
    
    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 overflow-y-auto">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg shadow-xl my-8">
                <h3 class="text-xl font-bold mb-4">{{ $item_id ? 'Edit' : 'Tambah' }} UMKM</h3>
                <form wire:submit="save" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Nama Usaha</label>
                            <input type="text" wire:model="nama_usaha" class="w-full border rounded p-2 focus:ring-blue-500">
                            @error('nama_usaha') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Pemilik</label>
                            <input type="text" wire:model="pemilik" class="w-full border rounded p-2 focus:ring-blue-500">
                            @error('pemilik') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Kategori</label>
                            <input type="text" wire:model="kategori" class="w-full border rounded p-2 focus:ring-blue-500" placeholder="Misal: Kuliner, Jasa">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Kontak / No. HP</label>
                            <input type="text" wire:model="kontak" class="w-full border rounded p-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Alamat Lengkap</label>
                        <textarea wire:model="alamat" rows="2" class="w-full border rounded p-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Deskripsi Usaha</label>
                        <textarea wire:model="deskripsi" rows="3" class="w-full border rounded p-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Foto/Produk</label>
                        <input type="file" wire:model="foto" accept="image/*" class="w-full border rounded p-2">
                        @if ($fotoLama && !$foto)
                            <img src="{{ asset('storage/'.$fotoLama) }}" class="h-16 mt-2 rounded">
                        @endif
                        @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex justify-end gap-2 pt-4 border-t mt-4">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 rounded border hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>