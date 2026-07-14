<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola APBDes</h2>
            <p class="text-sm text-gray-500">Upload dokumen PDF laporan APBDes per tahun.</p>
        </div>
        <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">+ Upload Dokumen</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-4 font-semibold text-gray-600">Tahun</th>
                    <th class="p-4 font-semibold text-gray-600">Dokumen</th>
                    <th class="p-4 font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 font-bold">{{ $item->tahun_anggaran }}</td>
                        <td class="p-4">
                            <a href="{{ asset('storage/'.$item->file_pdf) }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                Lihat PDF
                            </a>
                        </td>
                        <td class="p-4 space-x-2">
                            <button wire:click="edit({{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus dokumen tahun {{ $item->tahun_anggaran }}?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-8 text-center text-gray-500">Belum ada dokumen APBDes yang diunggah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $data->links() }}</div>

    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h3 class="text-xl font-bold mb-4">{{ $item_id ? 'Edit' : 'Upload' }} APBDes</h3>
                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Tahun Anggaran</label>
                        <input type="text" wire:model="tahun_anggaran" class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: 2026">
                        @error('tahun_anggaran') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">File PDF</label>
                        <input type="file" wire:model="file_pdf" accept=".pdf" class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500">
                        @error('file_pdf') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="file_pdf" class="text-sm text-blue-600 mt-2">Uploading...</div>
                    </div>
                    <div class="flex justify-end gap-2 pt-4">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 rounded border hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700" wire:loading.attr="disabled">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>