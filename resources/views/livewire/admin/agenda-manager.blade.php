<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola Agenda</h2>
            <p class="text-sm text-gray-500">Jadwal kegiatan dan acara desa.</p>
        </div>
        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">+ Tambah Agenda</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-4 font-semibold text-gray-600">Tanggal</th>
                    <th class="p-4 font-semibold text-gray-600">Kegiatan</th>
                    <th class="p-4 font-semibold text-gray-600">Lokasi</th>
                    <th class="p-4 font-semibold text-gray-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 whitespace-nowrap">
                            <div class="font-bold text-blue-600">{{ date('d M Y', strtotime($item->tanggal)) }}</div>
                            <div class="text-sm text-gray-500">{{ $item->waktu ? date('H:i', strtotime($item->waktu)) . ' WIB' : 'Waktu menyusul' }}</div>
                        </td>
                        <td class="p-4">
                            <div class="font-bold">{{ $item->judul }}</div>
                            <div class="text-sm text-gray-500 truncate max-w-xs">{{ $item->deskripsi }}</div>
                        </td>
                        <td class="p-4 text-gray-700">{{ $item->lokasi ?? '-' }}</td>
                        <td class="p-4 space-x-2 text-right">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline font-medium">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus agenda ini?" class="text-red-600 hover:underline font-medium">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500">Belum ada agenda kegiatan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg">
                <h3 class="text-xl font-bold mb-4">{{ $item_id ? 'Edit' : 'Tambah' }} Agenda</h3>
                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Judul Kegiatan</label>
                        <input type="text" wire:model="judul" class="w-full border rounded p-2 focus:ring-blue-500">
                        @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Tanggal</label>
                            <input type="date" wire:model="tanggal" class="w-full border rounded p-2 focus:ring-blue-500">
                            @error('tanggal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Waktu (Opsional)</label>
                            <input type="time" wire:model="waktu" class="w-full border rounded p-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Lokasi (Opsional)</label>
                        <input type="text" wire:model="lokasi" class="w-full border rounded p-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Deskripsi (Opsional)</label>
                        <textarea wire:model="deskripsi" rows="3" class="w-full border rounded p-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="flex justify-end gap-2 pt-4">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 rounded border hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan Agenda</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>