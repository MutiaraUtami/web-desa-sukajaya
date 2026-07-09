<div>
    <h2 class="text-xl font-bold mb-4">Edit Profil Desa</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <form wire:submit="save" class="bg-white rounded shadow p-6 space-y-4">
        <div>
            <label class="block text-sm font-medium">Nama Desa</label>
            <input type="text" wire:model="nama_desa" class="w-full border rounded p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Sambutan (untuk Landing Page)</label>
            <textarea wire:model="sambutan" rows="3" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Visi</label>
            <textarea wire:model="visi" rows="3" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Misi</label>
            <textarea wire:model="misi" rows="4" class="w-full border rounded p-2" placeholder="Bisa ditulis per poin, pisahkan dengan baris baru"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Sejarah Desa</label>
            <textarea wire:model="sejarah" rows="5" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Geografis</label>
            <textarea wire:model="geografis" rows="4" class="w-full border rounded p-2"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-sm font-medium">Luas Wilayah</label>
                <input type="text" wire:model="luas_wilayah" placeholder="Contoh: 12,5 km2" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Link Embed Google Maps</label>
                <input type="text" wire:model="peta_embed" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Batas Utara</label>
                <input type="text" wire:model="batas_utara" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Batas Selatan</label>
                <input type="text" wire:model="batas_selatan" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Batas Timur</label>
                <input type="text" wire:model="batas_timur" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Batas Barat</label>
                <input type="text" wire:model="batas_barat" class="w-full border rounded p-2">
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-sm font-medium">Alamat Kantor Desa</label>
                <input type="text" wire:model="alamat_kantor" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Telepon</label>
                <input type="text" wire:model="telepon" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" wire:model="email" class="w-full border rounded p-2">
            </div>
        </div>
        <div class="pt-2">
            <button type="submit" class="px-6 py-2 rounded bg-green-600 text-white">Simpan Perubahan</button>
        </div>
    </form>
</div>
