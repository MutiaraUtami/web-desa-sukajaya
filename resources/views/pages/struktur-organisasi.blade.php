<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    @forelse($aparatur as $item)
        <div class="bg-white p-4 rounded-xl shadow border text-center">
            @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
            @else
                <!-- Gambar default kalau admin gak upload foto -->
                <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 flex items-center justify-center mb-4 text-gray-500">No Foto</div>
            @endif
            
            <h3 class="text-lg font-bold text-gray-800">{{ $item->nama }}</h3>
            <p class="text-sm text-green-700 font-semibold">{{ $item->role }}</p>
        </div>
    @empty
        <div class="col-span-3 p-8 bg-gray-50 border rounded-xl text-center text-gray-500">
            Belum ada data struktur organisasi.
        </div>
    @endforelse
</div>