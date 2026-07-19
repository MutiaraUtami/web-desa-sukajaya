<div>
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Kelola Info Dasar Demografi</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('message') }}</div>
    @endif

    <div class="bg-white p-6 rounded shadow max-w-2xl">
        <form wire:submit="save" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold mb-1">Mata Pencaharian Utama</label>
                <input type="text" wire:model="mata_pencaharian" class="w-full border rounded p-2" placeholder="Contoh: Petani, Buruh Tani">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Perekonomian</label>
                <input type="text" wire:model="perekonomian" class="w-full border rounded p-2" placeholder="Contoh: Pabrik, Sawah, Kebun">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Sarana Pendidikan</label>
                <input type="text" wire:model="sarana_pendidikan" class="w-full border rounded p-2" placeholder="Contoh: PAUD, TK, SD">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Tempat Ibadah</label>
                <input type="text" wire:model="tempat_ibadah" class="w-full border rounded p-2" placeholder="Contoh: 5 Masjid, 10 Mushola">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">Simpan Perubahan</button>
        </form>
    </div>
</div>