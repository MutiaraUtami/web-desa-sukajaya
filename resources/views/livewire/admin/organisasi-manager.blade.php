<div>
    <h2 class="text-2xl font-bold text-[#0e2206] mb-6">Kelola Struktur Desa</h2>

    <!-- BAGIAN 1: CRUD BAGAN -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-8">
        <h3 class="text-lg font-bold mb-4 border-b pb-2">1. Bagan Struktur Organisasi</h3>
        
        @if (session()->has('message_bagan'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message_bagan') }}</div>
        @endif

        <div class="mb-4">
            @if($bagan_aktif)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Bagan saat ini:</p>
                    <img src="{{ asset('storage/' . $bagan_aktif) }}" class="max-w-md border rounded">
                </div>
            @else
                <div class="p-8 border-2 border-dashed rounded text-center text-gray-400 mb-4">
                    <p>Belum ada gambar bagan struktur yang diunggah.</p>
                </div>
            @endif
        </div>

        <form wire:submit.prevent="uploadBagan" class="flex items-end gap-4">
            <div class="flex-1">
                <label class="block text-sm font-semibold mb-1">Upload/Ganti Gambar Bagan (PNG/JPG)</label>
                <input type="file" wire:model="file_bagan" accept="image/*" class="w-full border p-2 rounded-lg" required>
                <div wire:loading wire:target="file_bagan" class="text-sm text-blue-500 mt-1">Mempersiapkan gambar...</div>
            </div>
            <button type="submit" class="bg-[#1e6306] hover:bg-[#154604] text-white px-6 py-2 rounded-lg font-semibold transition h-[42px]">
                Simpan Bagan
            </button>
        </form>
    </div>

    <!-- BAGIAN 2: CRUD APARATUR -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex justify-between items-center mb-4 border-b pb-2">
            <h3 class="text-lg font-bold">2. Daftar Aparatur Pemerintah Desa</h3>
            <button wire:click="openModalAparatur" class="bg-[#1e6306] hover:bg-[#154604] text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                + Tambah Aparatur
            </button>
        </div>

        @if (session()->has('message_aparatur'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message_aparatur') }}</div>
        @endif

        <table class="w-full text-left text-sm text-gray-600 border">
            <thead class="bg-gray-50 text-gray-800">
                <tr>
                    <th class="px-4 py-3 border-b">Foto</th>
                    <th class="px-4 py-3 border-b">Nama</th>
                    <th class="px-4 py-3 border-b">Jabatan/Role</th>
                    <th class="px-4 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($daftar_aparatur as $orang)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border-b">
                        @if($orang->foto)
                            <img src="{{ asset('storage/' . $orang->foto) }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-xs">No Pic</div>
                        @endif
                    </td>
                    <td class="px-4 py-3 border-b font-semibold text-gray-800">{{ $orang->nama }}</td>
                    <td class="px-4 py-3 border-b">{{ $orang->role }}</td>
                    <td class="px-4 py-3 border-b text-center space-x-2">
                        <button wire:click="openModalAparatur({{ $orang->id }})" class="text-blue-500 hover:underline">Edit</button>
                        <button wire:click="hapusAparatur({{ $orang->id }})" onclick="confirm('Yakin hapus data ini?') || event.stopImmediatePropagation()" class="text-red-500 hover:underline">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada data aparatur.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- MODAL TAMBAH/EDIT APARATUR -->
    @if($isModalAparaturOpen)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
        <div class="bg-white p-6 rounded-xl w-full max-w-lg shadow-xl">
            <h3 class="text-xl font-bold mb-4">{{ $aparatur_id ? 'Edit' : 'Tambah' }} Aparatur</h3>
            <form wire:submit.prevent="simpanAparatur">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Nama Aparatur</label>
                    <input type="text" wire:model="nama" class="w-full border p-2 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Jabatan / Role (Contoh: Kepala Desa)</label>
                    <input type="text" wire:model="role" class="w-full border p-2 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Upload Foto Orang (JPG/PNG)</label>
                    <input type="file" wire:model="foto" accept="image/*" class="w-full border p-2 rounded-lg">
                    @if($foto_lama)
                        <p class="text-xs text-gray-500 mt-1">Sudah ada foto tersimpan.</p>
                    @endif
                </div>
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" wire:click="$set('isModalAparaturOpen', false)" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-[#1e6306] text-white rounded-lg">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>