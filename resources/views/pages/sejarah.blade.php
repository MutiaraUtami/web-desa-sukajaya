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
                    Kisah transformasi dari kawasan tambang batu Gunung Sembung
                    menjadi desa wisata kebanggaan di Purwakarta.
                </p>
            </div>
        </div>
    </section>

    {{-- Content (Narasi Baru) --}}
    <section class="bg-gray-50 py-16">

        <div class="max-w-4xl mx-auto px-6">

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
                        Desa {{ $profil->nama_desa }} pada awalnya lebih dikenal sebagai kawasan <strong>Gunung Sembung</strong>, sebuah area pegunungan batu yang kokoh. Pada masa lampau, sebagian besar masyarakat desa menggantungkan mata pencahariannya dengan menambang batu di kawasan ini.
                    </p>

                    <p>
                        Karakteristik tanah yang berbatu dan keras di lereng gunung membuat area ini cukup sulit untuk ditanami. Hasil perkebunan atau pertanian tidak dapat tumbuh dengan optimal di atas struktur tanah tersebut. Kondisi alam yang menantang ini sempat menjadi kendala bagi kemajuan ekonomi warga, sehingga menuntut adanya inovasi dan perubahan arah gerak desa.
                    </p>

                    <p>
                        Namun, di balik kerasnya bebatuan, Gunung Sembung menyimpan pesona alam yang luar biasa. Masyarakat dan pemerintah desa kemudian menyadari bahwa lanskap alam <em>(landscape view)</em> tebing-tebing batu yang menjulang serta pemandangan dari ketinggian memiliki nilai jual pariwisata yang sangat tinggi. Bekas-bekas area tambang pun mulai ditata ulang agar lebih aman dan estetis.
                    </p>

                    <p>
                        Hingga akhirnya, arah pengembangan desa secara resmi dialihkan dari sektor pertambangan menjadi sektor pariwisata. Kini, Desa {{ $profil->nama_desa }} telah bertransformasi menjadi sebuah <strong>Desa Wisata</strong> yang sangat ramai dikunjungi oleh wisatawan dari berbagai daerah. Pemandangan alam eksotis yang dahulu merupakan sisa galian batu kini menjadi daya tarik utama, membawa kesejahteraan baru bagi masyarakat tanpa merusak keseimbangan alam.
                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- Timeline (Disesuaikan dengan Sejarah) --}}
    <section class="py-16 bg-white">

        <div class="max-w-5xl mx-auto px-6">

            <div class="text-center mb-12">

                <h2 class="text-3xl font-bold text-[#1e6306]">
                    Tonggak Perubahan Desa
                </h2>

                <div class="w-24 h-1 bg-[#fac81b] mx-auto mt-4 rounded-full"></div>

            </div>

            <div class="space-y-8">

                <div class="border-l-4 border-[#1e6306] pl-6">
                    <h3 class="text-xl font-semibold text-[#1e6306]">
                        Masa Pertambangan
                    </h3>
                    <p class="text-[#313131] mt-2 leading-7">
                        Kawasan Gunung Sembung menjadi area tambang batu aktif. Sebagian besar warga berprofesi sebagai pemecah dan penambang batu karena sulitnya bercocok tanam.
                    </p>
                </div>

                <div class="border-l-4 border-[#fac81b] pl-6">
                    <h3 class="text-xl font-semibold text-[#1e6306]">
                        Masa Transisi
                    </h3>
                    <p class="text-[#313131] mt-2 leading-7">
                        Menyadari keterbatasan lahan tani dan potensi kerusakan lingkungan akibat tambang, masyarakat dan aparat desa mulai melihat potensi keindahan lanskap batu.
                    </p>
                </div>

                <div class="border-l-4 border-[#1e6306] pl-6">
                    <h3 class="text-xl font-semibold text-[#1e6306]">
                        Era Desa Wisata
                    </h3>
                    <p class="text-[#313131] mt-2 leading-7">
                        Bekas area tambang disulap menjadi destinasi wisata alam. Keindahan <em>landscape view</em> pegunungan batu menjadikan desa ini ramai dikunjungi wisatawan dan meningkatkan ekonomi lokal.
                    </p>
                </div>

            </div>

        </div>

    </section>

</x-layouts.app>