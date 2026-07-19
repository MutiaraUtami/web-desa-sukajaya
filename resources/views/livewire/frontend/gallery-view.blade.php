<div class="w-full px-4 py-8">
    <!-- Header -->
    <div class="max-w-6xl mx-auto mb-10 px-4">
        <h1 class="text-4xl font-bold text-center text-[#0e2206] mb-6">Galeri Sukajaya</h1>
        <div class="border-t-2 border-[#1e6306] w-full mb-4"></div>
        <p class="text-center text-gray-600 text-lg max-w-2xl mx-auto">
            Kumpulan dokumentasi kegiatan, potensi alam, dan momen kebersamaan warga Desa Sukajaya.
        </p>
    </div>

    <!-- Layout Grid -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-2 auto-rows-[250px] grid-flow-dense">
        
        @forelse($galleries as $index => $gallery)
            <div class="relative group overflow-hidden 
                {{ $index % 5 === 0 ? 'md:col-span-2 md:row-span-1' : '' }} 
                {{ $index % 5 === 1 ? 'md:row-span-2' : '' }}
                {{ $index % 5 === 2 ? 'md:col-span-1' : '' }}
                {{ $index % 5 === 3 ? 'md:col-span-1' : '' }}
                {{ $index % 5 === 4 ? 'md:col-span-1' : '' }}">
                
                <!-- BUNGKUS DENGAN TAG A -->
                <a href="{{ asset('storage/' . $gallery->image_path) }}" class="glightbox" data-title="{{ $gallery->caption }}">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                         alt="{{ $gallery->caption }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 cursor-pointer">

                    <!-- Gradient Caption -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-medium truncate">
                            {{ $gallery->caption }}
                        </p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-3 p-10 text-center text-gray-500">Belum ada foto yang diunggah.</div>
        @endforelse
    </div>
</div>