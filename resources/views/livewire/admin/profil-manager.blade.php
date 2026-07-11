<div>
    <h2 class="text-xl font-bold mb-4">Edit Profil Desa</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="simpan" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Nama Desa</label>
            <input type="text" wire:model="nama_desa" class="w-full border rounded p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Sambutan Hero Web (Paragraf Singkat)</label>
            <textarea wire:model="sambutan" rows="2" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Tentang Desa (Sejarah/Deskripsi)</label>
            <textarea wire:model="sejarah" rows="5" class="w-full border rounded p-2" placeholder="Gunakan enter untuk membuat paragraf baru"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Visi</label>
            <textarea wire:model="visi" rows="3" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Misi (Pisahkan tiap poin dengan Enter)</label>
            <textarea wire:model="misi" rows="5" class="w-full border rounded p-2" placeholder="1. Meningkatkan pelayanan... &#10;2. Membangun infrastruktur..."></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Potensi & Geografis Desa</label>
            <textarea wire:model="geografis" rows="4" class="w-full border rounded p-2" placeholder="Jelaskan kondisi alam dan potensi desa di sini"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label class="block text-sm font-medium">Luas Wilayah</label>
                <input type="text" wire:model="luas_wilayah" placeholder="Contoh: 12,5 km2" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-sm font-medium">Link Embed Google Maps</label>
                <input type="text" wire:model="peta_embed" class="w-full border rounded p-2" placeholder="https://www.google.com/maps/embed?...">
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-3 gap-3">
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
        <div class="pt-4">
            <button type="submit" class="px-6 py-2 rounded bg-green-600 text-white font-bold hover:bg-green-700">Simpan Perubahan</button>
        </div>
    </form>
</div>