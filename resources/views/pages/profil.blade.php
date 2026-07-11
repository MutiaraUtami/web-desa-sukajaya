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
                    {{ $profil->sambutan ?? 'Selamat datang di Website Resmi Desa ' . ($profil->nama_desa ?? 'Sukajaya') . ', Kecamatan Sukatani, Kabupaten Purwakarta.' }}
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
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">Alamat Kantor</h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->alamat_kantor ?? 'Belum diatur' }}
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">Telepon</h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->telepon ?? 'Belum diatur' }}
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">Email</h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->email ?? 'Belum diatur' }}
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">Luas Wilayah</h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->luas_wilayah ?? 'Belum diatur' }}
                    </p>
                </div>
            </div>
        </section>

        {{-- Potensi Desa (Tersambung ke kolom 'geografis') --}}
        <section class="bg-[#1e6306]/5 rounded-2xl p-8 border border-[#1e6306]/10">
            <h2 class="text-3xl font-bold text-[#1e6306] mb-6">Potensi & Geografis Desa</h2>
            <div class="text-[#313131] leading-8 text-justify">
                @if($profil->geografis)
                    {!! nl2br(e($profil->geografis)) !!}
                @else
                    <p>Data potensi dan geografis desa belum ditambahkan.</p>
                @endif
            </div>
        </section>

        {{-- Peta --}}
        @if ($profil->peta_embed)
            <section>
                <h2 class="text-3xl font-bold text-[#1e6306] mb-6 text-center">Lokasi Kantor Desa</h2>
                <div class="overflow-hidden rounded-2xl shadow-lg aspect-video border-2 border-[#1e6306]/20">
                    <iframe
                        src="{{ $profil->peta_embed }}"
                        class="w-full h-full"
                        loading="lazy"
                        allowfullscreen>
                    </iframe>
                </div>
            </section>
        @endif

    </div>
</x-layouts.app>