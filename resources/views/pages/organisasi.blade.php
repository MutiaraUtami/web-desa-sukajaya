<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center text-[#0e2206] mb-10">Lembaga & Organisasi Desa</h1>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($organisasi as $org)
            <a href="{{ route('lembaga-desa.show', $org->slug) }}" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md hover:border-[#fac81b] transition duration-300 group block">
                <h3 class="text-xl font-bold text-[#1e6306] group-hover:text-[#fac81b] transition">{{ $org->nama_lembaga }}</h3>
                <p class="text-gray-500 mt-2 line-clamp-3 text-sm">{{ $org->deskripsi }}</p>
                <div class="mt-4 text-[#fac81b] font-semibold text-sm flex items-center gap-1">
                    Lihat Detail Struktur &rarr;
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layouts.app>