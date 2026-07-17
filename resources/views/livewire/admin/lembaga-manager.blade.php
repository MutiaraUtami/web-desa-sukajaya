<div>
    <div class="flex justify-between items-center mb-6">
       <h2 class="text-2xl font-bold text-[#0e2206]">Kelola Lembaga Desa</h2>
        <button wire:click="create" class="bg-[#1e6306] hover:bg-[#154604] text-white px-4 py-2 rounded-lg font-semibold transition">
            + Tambah Lembaga
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-[#0e2206] text-white">
                <tr>
                    <th class="px-4 py-3">Nama Lembaga</th>
                    <th class="px-4 py-3">File Struktur</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($organisasi as $org)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-semibold text-gray-800">{{ $org->nama_lembaga }}</td>
                    <td class="px-4 py-3">
                        @if($org->file_pdf)
                            <a href="{{ asset('storage/' . $org->file_pdf) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                        @else
                            <span class="text-gray-400 italic">Belum ada file</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <button wire:click="edit({{ $org->id }})" class="text-blue-500 hover:text-blue-700">Edit</button>
                        <button wire:click="delete({{ $org->id }})" class="text-red-500 hover:text-red-700" onclick="confirm('Yakin hapus data ini?') || event.stopImmediatePropagation()">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4 border-t">{{ $organisasi->links() }}</div>
    </div>

    <!-- Modal Form -->
    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
        <div class="bg-white p-6 rounded-xl w-full max-w-2xl shadow-xl max-h-[90vh] overflow-y-auto">
            <h3 class="text-xl font-bold mb-4">{{ $lembaga_id ? 'Edit' : 'Tambah' }} Lembaga</h3>
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Nama Lembaga (Contoh: BPD / PKK)</label>
                    <input type="text" wire:model="nama_lembaga" class="w-full border p-2 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Deskripsi / Penjelasan Singkat</label>
                    <textarea wire:model="deskripsi" rows="5" class="w-full border p-2 rounded-lg" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Upload File Struktur (PDF / PNG / JPG)</label>
                    <input type="file" wire:model="file_pdf" accept=".pdf, .png, .jpg, .jpeg" class="w-full border p-2 rounded-lg">
                    <div wire:loading wire:target="file_pdf" class="text-sm text-blue-500 mt-1">Mengunggah file...</div>
                    @if($old_pdf)
                        <p class="text-xs text-gray-500 mt-1">File saat ini: <a href="{{ asset('storage/'.$old_pdf) }}" target="_blank" class="text-blue-500 hover:underline">Lihat File</a></p>
                    @endif
                </div>
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" wire:click="$set('isModalOpen', false)" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-[#1e6306] text-white rounded-lg hover:bg-green-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>