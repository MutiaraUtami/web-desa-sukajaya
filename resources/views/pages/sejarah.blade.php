<x-layouts.app title="Sejarah Desa">

    {{-- Hero --}}
    <section class="relative h-72 overflow-hidden">
        <img src="{{ asset('images/slider-3.jpeg') }}"
            alt="Desa {{ $profil->nama_desa }}"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-[#0e2206]/70"></div>

        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-[#fac81b]">
                    Sejarah Desa {{ $profil->nama_desa }}
                </h1>

                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-100">
                    Mengenal perjalanan dan perkembangan
                    Desa {{ $profil->nama_desa }},
                    Kecamatan Sukatani, Kabupaten Purwakarta.
                </p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-gray-50 py-16">

        <div class="max-w-6xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-10 items-center">

                {{-- Gambar --}}
                <div>
                    <img
                        src="{{ asset('images/sejarah-desa.jpg') }}"
                        alt="Sejarah Desa"
                        class="rounded-2xl shadow-xl w-full object-cover h-[420px]">
                </div>

                {{-- Teks --}}
                <div>

                    <span class="inline-block bg-[#fac81b] text-[#0e2206] font-semibold px-4 py-2 rounded-full mb-5">
                        Sejarah Singkat
                    </span>

                    <h2 class="text-3xl font-bold text-[#1e6306] mb-6">
                        Perjalanan Desa {{ $profil->nama_desa }}
                    </h2>

                    <div class="space-y-5 text-[#313131] leading-8 text-justify">

                        <p>
                            Desa {{ $profil->nama_desa }} merupakan salah satu desa yang berada di
                            wilayah Kecamatan Sukatani, Kabupaten Purwakarta,
                            Provinsi Jawa Barat. Sejak awal perkembangannya,
                            kehidupan masyarakat desa didominasi oleh aktivitas
                            pertanian yang didukung oleh kondisi alam yang subur
                            dan semangat gotong royong yang terus terpelihara
                            hingga saat ini.
                        </p>

                        <p>
                            Seiring berjalannya waktu, Desa
                            {{ $profil->nama_desa }} mengalami berbagai perkembangan,
                            baik dari sisi pembangunan infrastruktur, pelayanan
                            pemerintahan, maupun pemberdayaan masyarakat.
                            Pemerintah desa terus berupaya meningkatkan kualitas
                            pelayanan publik melalui tata kelola pemerintahan
                            yang transparan, akuntabel, dan berbasis teknologi.
                        </p>

                        <p>
                            Nilai kebersamaan, kekeluargaan, serta partisipasi
                            aktif masyarakat menjadi modal utama dalam setiap
                            proses pembangunan desa. Berbagai potensi lokal,
                            mulai dari sektor pertanian, UMKM, hingga kegiatan
                            sosial kemasyarakatan, terus dikembangkan sebagai
                            upaya meningkatkan kesejahteraan masyarakat secara
                            berkelanjutan.
                        </p>

                        <p>
                            Hingga saat ini, Desa {{ $profil->nama_desa }}
                            terus berkomitmen menjadi desa yang maju,
                            mandiri, dan sejahtera dengan tetap menjaga
                            nilai-nilai budaya, kearifan lokal, serta
                            semangat gotong royong yang menjadi identitas
                            masyarakat desa.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Timeline --}}
    <section class="py-16 bg-white">

        <div class="max-w-5xl mx-auto px-6">

            <div class="text-center mb-12">

                <h2 class="text-3xl font-bold text-[#1e6306]">
                    Perkembangan Desa
                </h2>

                <div class="w-24 h-1 bg-[#fac81b] mx-auto mt-4 rounded-full"></div>

            </div>

            <div class="space-y-8">

                <div class="border-l-4 border-[#1e6306] pl-6">
                    <h3 class="text-xl font-semibold text-[#1e6306]">
                        Awal Perkembangan
                    </h3>
                    <p class="text-[#313131] mt-2 leading-7">
                        Masyarakat mulai mengembangkan wilayah dengan
                        mengandalkan sektor pertanian sebagai mata pencaharian utama.
                    </p>
                </div>

                <div class="border-l-4 border-[#fac81b] pl-6">
                    <h3 class="text-xl font-semibold text-[#1e6306]">
                        Pembangunan Desa
                    </h3>
                    <p class="text-[#313131] mt-2 leading-7">
                        Infrastruktur, pelayanan pemerintahan,
                        dan fasilitas umum terus ditingkatkan
                        untuk mendukung kebutuhan masyarakat.
                    </p>
                </div>

                <div class="border-l-4 border-[#1e6306] pl-6">
                    <h3 class="text-xl font-semibold text-[#1e6306]">
                        Transformasi Digital
                    </h3>
                    <p class="text-[#313131] mt-2 leading-7">
                        Pemerintah Desa mulai memanfaatkan teknologi
                        informasi melalui website desa sebagai media
                        pelayanan publik, penyebaran informasi,
                        dan transparansi pemerintahan.
                    </p>
                </div>

            </div>

        </div>

    </section>

</x-layouts.app>