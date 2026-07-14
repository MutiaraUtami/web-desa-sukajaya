<div>
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <!-- ============================================== -->
    <!-- BAGIAN 1: BAGAN STRUKTUR ORGANISASI (BARU) -->
    <!-- ============================================== -->
    <div class="bg-white rounded shadow p-6 mb-8 border border-gray-100">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Bagan Struktur Organisasi</h2>
                <p class="text-sm text-gray-500">Visualisasi hierarki pemerintahan desa.</p>
            </div>
            <button wire:click="openModalBagan" class="bg-blue-600 text-white px-5 py-2.5 rounded font-semibold hover:bg-blue-700 transition-colors">
                {{ $bagan ? 'Ubah Bagan' : '+ Tambah Bagan' }}
            </button>
        </div>

        <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg p-6 flex flex-col items-center justify-center min-h-[250px]">
            @if($bagan && $bagan->gambar)
                <!-- Jika filenya PDF -->
                @if(str_ends_with(strtolower($bagan->gambar), '.pdf'))
                    <div class="text-center">
                        <svg class="w-20 h-20 text-red-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        <a href="{{ asset('storage/'.$bagan->gambar) }}" target="_blank" class="text-blue-600 font-bold hover:underline text-lg">Lihat Dokumen PDF Bagan</a>
                    </div>
                <!-- Jika filenya Gambar -->
                @else
                    <img src="{{ asset('storage/'.$bagan->gambar) }}" class="max-h-96 w-auto object-contain rounded border shadow-sm">
                @endif
                <button wire:click="deleteBagan({{ $bagan->id }})" wire:confirm="Yakin ingin menghapus bagan ini?" class="mt-6 text-red-600 text-sm hover:underline font-bold">Hapus Bagan Saat Ini</button>
            @else
                <svg class="w-16 h-16 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p class="text-gray-400 font-medium">Belum ada gambar bagan struktur yang diunggah.</p>
            @endif
        </div>
    </div>

    <!-- MODAL UPLOAD BAGAN -->
    @if ($showModalBagan)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-xl">
                <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $baganId ? 'Ubah' : 'Upload' }} Bagan Struktur</h3>
                <form wire:submit="saveBagan" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Pilih File (JPG, PNG, PDF)</label>
                        <span class="text-xs text-gray-500 block mb-2">Maksimal ukuran file: 5MB</span>
                        <input type="file" wire:model="fileBagan" class="w-full border rounded p-2 focus:ring-blue-500 focus:border-blue-500" accept=".jpg,.jpeg,.png,.pdf">
                        @error('fileBagan') <span class="text-red-500 text-xs font-medium">{{ $message }}</span> @enderror
                        
                        <div wire:loading wire:target="fileBagan" class="text-sm text-blue-600 mt-2 font-medium">
                            Sedang memproses file... mohon tunggu.
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <button type="button" wire:click="closeModalBagan" class="px-4 py-2 rounded border font-medium hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white font-medium hover:bg-blue-700 disabled:opacity-50" wire:loading.attr="disabled" wire:target="saveBagan, fileBagan">Simpan Bagan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif


    <!-- ============================================== -->
    <!-- BAGIAN 2: DAFTAR ANGGOTA ORGANISASI (LAMA) -->
    <!-- ============================================== -->
    <div class="flex justify-between items-center mb-4 mt-12 border-t pt-8">
        <h2 class="text-xl font-bold text-gray-800">Daftar Anggota Organisasi</h2>
        <button wire:click="create" class="bg-green-600 text-white px-4 py-2 rounded font-semibold hover:bg-green-700">+ Tambah Anggota</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($data as $item)
            <div class="bg-white rounded shadow p-4 text-center border border-gray-100">
                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://ui-avatars.com/api/?name='.urlencode($item->nama).'&background=16a34a&color=fff' }}" class="w-20 h-20 rounded-full mx-auto object-cover mb-2 border-2 border-gray-100">
                <div class="font-bold text-gray-800">{{ $item->nama }}</div>
                <div class="text-sm font-semibold text-green-600 mb-3">{{ $item->jabatan }}</div>
                <div class="space-x-3 pt-3 border-t">
                    <button wire:click="edit({{ $item->id }})" class="text-blue-600 text-sm font-medium hover:underline">Edit</button>
                    <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus {{ $item->nama }}?" class="text-red-600 text-sm font-medium hover:underline">Hapus</button>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-3 text-center py-6">Belum ada data anggota organisasi.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $data->links() }}</div>

    <!-- MODAL CRUD ANGGOTA -->
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-xl">
                <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $item_id ? 'Edit' : 'Tambah' }} Anggota</h3>
                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Nama</label>
                        <input type="text" wire:model="nama" class="w-full border rounded p-2 focus:ring-green-500 focus:border-green-500">
                        @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Jabatan</label>
                        <input type="text" wire:model="jabatan" class="w-full border rounded p-2 focus:ring-green-500 focus:border-green-500" placeholder="Cth: Kepala Desa">
                        @error('jabatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Urutan Tampil</label>
                        <input type="number" wire:model="urutan" class="w-full border rounded p-2 focus:ring-green-500 focus:border-green-500" placeholder="1, 2, 3...">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Foto</label>
                        <input type="file" wire:model="foto" class="w-full border rounded p-2 focus:ring-green-500 focus:border-green-500" accept="image/*">
                        @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        @if ($fotoLama && !$foto)
                            <img src="{{ asset('storage/'.$fotoLama) }}" class="w-16 h-16 rounded-full mt-2 object-cover border">
                        @endif
                    </div>
                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 rounded border font-medium hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white font-medium hover:bg-green-700">Simpan Anggota</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>