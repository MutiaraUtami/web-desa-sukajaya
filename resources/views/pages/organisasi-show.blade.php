<x-layouts.app>
    <div class="max-w-4xl mx-auto px-4 py-12">
        <a href="{{ route('lembaga-desa') }}" class="text-[#1e6306] hover:underline mb-6 inline-block font-semibold">&larr; Kembali ke Daftar Lembaga</a>
        
        <h1 class="text-4xl font-extrabold text-[#0e2206] mb-6">{{ $lembaga->nama_lembaga }}</h1>
        
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mb-8 text-gray-700 leading-relaxed whitespace-pre-line">
            {{ $lembaga->deskripsi }}
        </div>

       @if($lembaga->file_pdf)
            @php
                // Cek ekstensi filenya
                $extension = pathinfo($lembaga->file_pdf, PATHINFO_EXTENSION);
            @endphp
            <h2 class="text-2xl font-bold text-[#1e6306] mb-4 border-l-4 border-[#fac81b] pl-3">Struktur Organisasi</h2>
            <div class="bg-gray-100 p-2 rounded-2xl border border-gray-200 text-center flex justify-center">
                
                @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png']))
                    <!-- Kalau Gambar -->
                    <img src="{{ asset('storage/' . $lembaga->file_pdf) }}" alt="Struktur {{ $lembaga->nama_lembaga }}" class="max-w-full rounded-xl object-contain shadow-sm" style="max-height: 75vh;">
                @else
                    <!-- Kalau PDF -->
                    <iframe src="{{ asset('storage/' . $lembaga->file_pdf) }}" class="w-full rounded-xl" style="height: 75vh;" frameborder="0"></iframe>
                @endif
                
            </div>
        @endif
    </div>
</x-layouts.app>