<x-layouts.app title="Profil Desa">

    {{-- Hero --}}
    <section class="relative h-72 overflow-hidden">
        <img src="{{ asset('images/slider-3.jpeg') }}"
            alt="Desa {{ $profil->nama_desa ?? 'Sukajaya' }}"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-[#0e2206]/60"></div>

        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white px-4">
                <h1 class="text-5xl text-[#fac81b]">
                    Profil Desa {{ $profil->nama_desa ?? 'Sukajaya' }}
                </h1>
                <p class="mt-3 max-w-2xl mx-auto text-gray-200">
                    Selamat datang di Website Resmi Desa {{$profil->nama_desa ?? 'Sukajaya'}} Kecamatan Sukatani, Kabupaten Purwakarta.
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto px-4 py-12 space-y-12">

        {{-- Tentang Desa (Tersambung ke kolom 'sejarah') --}}
        <section class="grid lg:grid-cols-2 gap-10 items-center">
            <div>
                <img src="{{ asset('images/slider-2.jpeg') }}"
                    class="rounded-2xl shadow-lg w-full h-[420px] object-cover border-2 border-[#fac81b]"
                    alt="Desa {{ $profil->nama_desa ?? 'Sukajaya' }}">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-[#1e6306] mb-5">
                    Tentang Desa
                </h2>
                <div class="text-[#313131] leading-8 text-justify space-y-4">
                    @if($profil->sejarah)
                        {{-- Fitur nl2br agar enter di textarea terbaca sebagai ganti baris di HTML --}}
                        {!! nl2br(e($profil->sejarah)) !!}
                    @else
                        <p>Belum ada data sejarah atau profil tentang desa ini yang ditambahkan.</p>
                    @endif
                </div>
            </div>
        </section>

        {{-- Visi Misi --}}
        <section class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#1e6306]">
                <h3 class="text-2xl font-bold text-[#1e6306] mb-4">Visi</h3>
                <p class="text-[#313131] leading-8">
                    {{ $profil->visi ?? 'Visi desa belum diatur.' }}
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#1e6306]">
                <h3 class="text-2xl font-bold text-[#1e6306] mb-4">Misi</h3>
                <ul class="space-y-3 text-[#313131] list-disc pl-5 marker:text-[#1e6306]">
                    @if($profil->misi)
                        {{-- Memecah teks per baris (enter) menjadi list --}}
                        @foreach(explode("\n", $profil->misi) as $item)
                            @if(trim($item) !== '')
                                <li>{{ $item }}</li>
                            @endif
                        @endforeach
                    @else
                        <li>Misi desa belum diatur.</li>
                    @endif
                </ul>
            </div>
        </section>

{{-- Informasi Desa --}}
        <section>
            <h2 class="text-3xl font-bold text-center text-[#1e6306] mb-8">Informasi Desa</h2>
            
            {{-- Grid utama: 6 kolom di desktop. 3 item di baris 1, 2 item di baris 2 (tengah) --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-6 gap-6">
        


                {{-- Baris 2: 2 Kolom (Posisi di tengah dengan lg:col-start-2) --}}
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md p-6 border border-gray-100 border-t-4 border-t-[#1e6306] lg:col-span-2 lg:col-start-2 transition-all duration-300 hover:-translate-y-1 flex items-start gap-4">
                    <!-- Icon -->
                    <div class="p-3 bg-[#1e6306] rounded-xl text-[#fac81b] shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                        </svg>
                    </div>
                    <!-- Text -->
                    <div>
                        <h4 class="font-bold text-[#1e6306] text-lg leading-tight mb-1">Luas Wilayah</h4>
                        <p class="text-[#313131]/80 text-sm leading-relaxed">
                            {{ $profil->luas_wilayah ?? 'Belum diatur' }}
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm hover:shadow-md p-6 border border-gray-100 border-t-4 border-t-[#1e6306] lg:col-span-2 transition-all duration-300 hover:-translate-y-1 flex items-start gap-4">
                    <!-- Icon -->
                    <div class="p-3 bg-[#1e6306] rounded-xl text-[#fac81b] shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                    </div>
                    <!-- Text -->
                    <div>
                        <h4 class="font-bold text-[#1e6306] text-lg leading-tight mb-1">Tingkat Perkembangan</h4>
                        <p class="text-[#313131]/80 text-sm leading-relaxed">
                            {{ $profil->tingkat_perkembangan ?? 'Belum diatur' }}
                        </p>
                    </div>
                </div>
                
            </div>
        </section>
                            
        {{-- Potensi Desa (Tersambung ke kolom 'geografis') --}}
        <section class="bg-[#1e6306]/5 rounded-2xl p-8 border border-[#1e6306]/10">
            <h2 class="text-3xl font-bold text-[#1e6306] mb-6">Potensi Desa</h2>
            <div class="text-[#313131] leading-8 text-justify">
                @if($profil->geografis)
                    {!! nl2br(e($profil->geografis)) !!}
                @else
                    <p>Data potensi desa belum ditambahkan.</p>
                @endif
            </div>
        </section>

        {{-- Lokasi Kantor Desa (Desain Sesuai Mockup) --}}
        <section class="max-w-6xl mx-auto px-4 pb-16">
            <h2 class="text-3xl font-bold text-[#1e6306] border-b-4 border-[#1e6306] pb-2 inline-block mb-8">
                Lokasi Kantor Desa
            </h2>
            
            <div class="bg-white rounded-3xl shadow-xl border border-zinc-100 overflow-hidden flex flex-col lg:flex-row">
                
                <!-- Bagian Kiri: Gambar & Alamat -->
                <div class="w-full lg:w-5/12 flex flex-col">
                    <!-- Foto Kantor -->
                    <div class="h-64 lg:h-[300px] relative">
                        {{-- Ganti 'slider-1.jpeg' dengan gambar kantor desa Anda --}}
                        <img src="{{ asset('images/slider-3.jpeg') }}" 
                             alt="Kantor Desa {{ $profil->nama_desa ?? 'Sukajaya' }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Detail Alamat -->
                    <div class="bg-zinc-50 p-6 lg:p-8 flex items-start gap-4 flex-1">
                        <!-- Ikon Pin Kuning -->
                        <div class="w-12 h-12 rounded-full bg-[#fac81b] flex items-center justify-center text-xl shrink-0 shadow-sm">
                            📍
                        </div>
                        <!-- Teks -->
                        <div>
                            <h3 class="text-xl font-bold text-[#1e6306] mb-2">Alamat Kantor</h3>
                            <p class="text-[#313131] leading-relaxed text-sm md:text-base">
                                {{ $profil->alamat_kantor ?? 'Jalan Raya Citapen, Kecamatan Sukatani, Kabupaten Purwakarta, Jawa Barat, 41167.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bagian Kanan: Peta (Maps) Langsung Titik Kantor Desa -->
                <div class="w-full lg:w-7/12 h-80 lg:h-auto min-h-[450px] relative bg-zinc-200">
                    <iframe 
                        src="{{ $profil->peta_embed ?? 'https://www.google.com/maps?q=Kantor+Desa+Sukajaya,+Sukatani,+Purwakarta&output=embed' }}" 
                        class="absolute inset-0 w-full h-full border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </section>

    </div>
</x-layouts.app>