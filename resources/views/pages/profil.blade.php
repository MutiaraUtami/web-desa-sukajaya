<x-layouts.app title="Profil Desa">

    {{-- Hero --}}
    <section class="relative h-72 overflow-hidden">
        <img src="{{ asset('images/slider-3.jpeg') }}"
            alt="Desa {{ $profil->nama_desa }}"
            class="absolute inset-0 w-full h-full object-cover">

        {{-- Overlay menggunakan warna Hijau Gelap (#0e2206) dengan opasitas 60% agar teks putih menonjol --}}
        <div class="absolute inset-0 bg-[#0e2206]/60"></div>

        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white px-4">
                <h1 class="text-5xl text-[#fac81b]">
                    Profil Desa {{ $profil->nama_desa }}
                </h1>
                <p class="mt-3 max-w-2xl mx-auto text-gray-200">
                    Selamat datang di Website Resmi Desa {{ $profil->nama_desa }},
                    Kecamatan Sukatani, Kabupaten Purwakarta.
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-6xl mx-auto px-4 py-12 space-y-12">

        {{-- Tentang Desa --}}
        <section class="grid lg:grid-cols-2 gap-10 items-center">

            <div>
                <img src="{{ asset('images/slider-2.jpeg') }}"
                    class="rounded-2xl shadow-lg w-full h-[420px] object-cover border-2 border-[#fac81b]"
                    alt="Desa {{ $profil->nama_desa }}">
            </div>

            <div>
                {{-- Menggunakan Hijau Utama (#1e6306) --}}
                <h2 class="text-3xl font-bold text-[#1e6306] mb-5">
                    Tentang Desa
                </h2>

                {{-- Menggunakan Charcoal (#313131) untuk teks utama --}}
                <p class="text-[#313131] leading-8 text-justify">
                    Desa <strong>{{ $profil->nama_desa }}</strong> merupakan salah satu desa
                    yang berada di Kecamatan Sukatani, Kabupaten Purwakarta,
                    Provinsi Jawa Barat. Dengan lingkungan yang masih asri,
                    masyarakat Desa {{ $profil->nama_desa }} menjunjung tinggi nilai
                    gotong royong, kebersamaan, serta semangat dalam mendukung
                    pembangunan desa yang berkelanjutan.
                </p>

                <p class="mt-4 text-[#313131] leading-8 text-justify">
                    Pemerintah Desa berkomitmen menghadirkan pelayanan publik
                    yang cepat, transparan, dan akuntabel melalui pemanfaatan
                    teknologi informasi. Website ini menjadi media informasi,
                    komunikasi, serta pelayanan digital bagi seluruh masyarakat.
                </p>
            </div>

        </section>

        {{-- Visi Misi --}}
        <section class="grid md:grid-cols-2 gap-8">

            {{-- Visi: Border kiri menggunakan Hijau Utama (#1e6306) --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#1e6306]">
                <h3 class="text-2xl font-bold text-[#1e6306] mb-4">
                    Visi
                </h3>

                <p class="text-[#313131] leading-8">
                    Terwujudnya Desa {{ $profil->nama_desa }}
                    yang maju, mandiri, sejahtera, religius,
                    serta berdaya saing melalui pemerintahan
                    yang profesional, transparan, dan berorientasi
                    pada pelayanan masyarakat.
                </p>
            </div>

            {{-- Misi: Border kiri menggunakan Kuning Aksen (#fac81b) --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-[#1e6306]">
                <h3 class="text-2xl font-bold text-[#1e6306] mb-4">
                    Misi
                </h3>

                <ul class="space-y-3 text-[#313131] list-disc pl-5 marker:text-[#1e6306]">
                    <li>Meningkatkan kualitas pelayanan publik.</li>
                    <li>Mendorong pembangunan infrastruktur desa.</li>
                    <li>Mengembangkan potensi UMKM dan ekonomi masyarakat.</li>
                    <li>Meningkatkan kualitas SDM melalui pendidikan dan kesehatan.</li>
                    <li>Menjaga budaya gotong royong dan kelestarian lingkungan.</li>
                </ul>
            </div>

        </section>

        {{-- Informasi Desa --}}
        <section>

            <h2 class="text-3xl font-bold text-center text-[#1e6306] mb-8">
                Informasi Desa
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">
                        Alamat Kantor
                    </h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->alamat_kantor ?? 'Jl. Raya Citapen, Kec. Sukatani, Kab. Purwakarta, Jawa Barat' }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">
                        Telepon
                    </h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->telepon ?? '0813-3133-1370' }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">
                        Email
                    </h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->email ?? 'desa.sukajaya@example.com' }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-t-2 border-[#1e6306]">
                    <h4 class="font-semibold text-[#1e6306]">
                        Luas Wilayah
                    </h4>
                    <p class="mt-2 text-[#313131]/80 text-sm">
                        {{ $profil->luas_wilayah ?? '579.973 Ha' }}
                    </p>
                </div>

            </div>

        </section>

        {{-- Potensi Desa --}}
        {{-- Menggunakan background berbasis Hijau Utama dengan opasitas sangat tipis (5%) agar terkesan soft --}}
        <section class="bg-[#1e6306]/5 rounded-2xl p-8 border border-[#1e6306]/10">

            <h2 class="text-3xl font-bold text-[#1e6306] mb-6">
                Potensi Desa
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <ul class="space-y-3 list-disc pl-5 text-[#313131] marker:text-[#1e6306]">
                        <li>Sektor pertanian sebagai mata pencaharian utama.</li>
                        <li>UMKM dengan berbagai produk lokal.</li>
                        <li>Budaya gotong royong yang masih terjaga.</li>
                    </ul>
                </div>

                <div>
                    <ul class="space-y-3 list-disc pl-5 text-[#313131] marker:text-[#1e6306]">
                        <li>Pelayanan publik berbasis digital.</li>
                        <li>Pengembangan sumber daya manusia.</li>
                        <li>Peningkatan ekonomi masyarakat secara berkelanjutan.</li>
                    </ul>
                </div>

            </div>

        </section>

        {{-- Peta --}}
        @if ($profil->peta_embed)

            <section>

                <h2 class="text-3xl font-bold text-[#1e6306] mb-6 text-center">
                    Lokasi Kantor Desa
                </h2>

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