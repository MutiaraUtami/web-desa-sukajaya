<div>
    <div class="mb-6 bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-bold mb-4">Tambah Foto Galeri</h2>
        
        @if (session()->has('message'))
            <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit="save">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" wire:model="photo" class="mt-1 block w-full">
                @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Caption (Opsional)</label>
                <input type="text" wire:model="caption" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Masukkan keterangan foto">
                @error('caption') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                Unggah
            </button>
        </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-bold mb-4">Daftar Galeri</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($galleries as $gallery)
                <div class="border rounded-lg p-2">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->caption }}" class="w-full h-48 object-cover rounded mb-2">
                    <p class="text-sm text-gray-600 mb-2">{{ $gallery->caption ?? 'Tanpa Caption' }}</p>
                    <button wire:click="delete({{ $gallery->id }})" wire:confirm="Yakin ingin menghapus foto ini?" class="text-red-600 text-sm hover:underline">
                        Hapus Foto
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>