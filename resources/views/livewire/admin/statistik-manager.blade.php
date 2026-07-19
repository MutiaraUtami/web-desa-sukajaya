<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Statistik Penduduk</h2>
        <button wire:click="create" class="bg-green-700 text-white px-4 py-2 rounded-lg font-bold hover:bg-green-800">+ Tambah Data</button>
    </div>

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 font-semibold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 font-semibold">
            ✅ {{ session('message') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-3 text-left">Bulan</th>
                    <th class="p-3 text-left">Tahun</th>
                    <th class="p-3 text-left">Dusun/RW</th> <!-- Kolom RW Dimunculkan -->
                    <th class="p-3 text-left">Jml KK</th>
                    <th class="p-3 text-left">Laki-laki</th>
                    <th class="p-3 text-left">Perempuan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statistik as $s)
                <tr class="border-t border-gray-100">
                    <td class="p-3 font-semibold">{{ $s->bulan }}</td>
                    <td class="p-3 font-semibold">{{ $s->tahun }}</td>
                    <td class="p-3 font-semibold text-gray-700">{{ $s->dusun_rw }}</td>
                    <td class="p-3">{{ $s->jumlah_kk }}</td>
                    <td class="p-3 text-blue-600">{{ $s->laki_laki ?? 0 }}</td>
                    <td class="p-3 text-pink-600">{{ $s->perempuan ?? 0 }}</td>
                    <td class="p-3 text-center space-x-2">
                        <button wire:click="edit({{ $s->id }})" class="text-blue-500 hover:underline">Edit</button>
                        <button wire:click="delete({{ $s->id }})" class="text-red-500 hover:underline" onclick="confirm('Yakin hapus data ini?') || event.stopImmediatePropagation()">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $statistik->links() }}
    </div>

    <!-- Modal Form -->
    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black/50">
        <div class="bg-white p-6 rounded-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">
            <h3 class="text-lg font-bold mb-4">{{ $statistik_id ? 'Edit' : 'Tambah' }} Data Statistik</h3>
            <form wire:submit="store" class="space-y-4">
                
                <!-- BARIS 1: Bulan, Tahun, Dusun/RW -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Bulan</label>
                        <select wire:model="bulan" class="w-full border rounded p-2" required>
                            <option value="">-- Pilih Bulan --</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Tahun</label>
                        <input type="number" wire:model="tahun" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Nama Dusun/RW</label>
                        <input type="text" wire:model="dusun_rw" class="w-full border rounded p-2" placeholder="Contoh: RW 01" required>
                    </div>
                </div>

                <!-- BARIS 2: Jumlah KK, Laki-laki, Perempuan -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Jumlah KK</label>
                        <input type="number" wire:model="jumlah_kk" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Laki-laki (Jiwa)</label>
                        <input type="number" wire:model="laki_laki" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Perempuan (Jiwa)</label>
                        <input type="number" wire:model="perempuan" class="w-full border rounded p-2" required>
                    </div>
                </div>
                
                <!-- BARIS 3: Input Usia -->
                <div class="grid grid-cols-3 gap-4 border-t pt-4 mt-2">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Usia 0-14</label>
                        <input type="number" wire:model="usia_0_14" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Usia 15-64</label>
                        <input type="number" wire:model="usia_15_64" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Usia 65+</label>
                        <input type="number" wire:model="usia_65_keatas" class="w-full border rounded p-2" required>
                    </div>
                </div>
                
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" wire:click="closeModal" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded font-bold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>