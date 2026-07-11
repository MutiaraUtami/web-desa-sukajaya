<x-layouts.app title="Geografis Desa">
    {{-- Hero --}}
    <section class="relative h-72 overflow-hidden">
        <img src="{{ asset('images/slider-3.jpeg') }}"
            alt="Desa {{ $profil->nama_desa }}"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-[#0e2206]/70"></div>

        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-[#fac81b]">
                    Geografis Desa {{ $profil->nama_desa }}
                </h1>

                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-100">
                    Mengenal karakteristik alam, batas wilayah, dan topografi
                    Desa {{ $profil->nama_desa }}, Kecamatan Sukatani, Kabupaten Purwakarta.
                </p>
            </div>
        </div>
    </section>

    {{-- Content Geografis --}}
    <section class="max-w-6xl mx-auto px-4 py-12">
        
        {{-- Grid Indikator Alam --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Ketinggian Tempat</span>
                    <h3 class="text-3xl font-bold text-[#0e2206] mt-1">230 <span class="text-lg font-normal text-gray-500">m dpl</span></h3>
                </div>
                <p class="text-sm text-gray-500 mt-2">Tergolong kawasan dataran tinggi / perbukitan.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Curah Hujan</span>
                    <h3 class="text-3xl font-bold text-[#0e2206] mt-1">± 1.580 <span class="text-lg font-normal text-gray-500">mm/th</span></h3>
                </div>
                <p class="text-sm text-gray-500 mt-2">Intensitas sedang-tinggi mendukung ketahanan agraris.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Suhu Udara Rata-rata</span>
                    <h3 class="text-3xl font-bold text-[#0e2206] mt-1">30 <span class="text-lg font-normal text-gray-500">°C</span></h3>
                </div>
                <p class="text-sm text-gray-500 mt-2">Khas wilayah tropis dengan paparan sinar matahari stabil.</p>
            </div>
        </div>

        {{-- Detail Grid: Batas Wilayah & Aksesibilitas Terpisah --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start mb-12">
            
            {{-- Blok Batas Wilayah --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#0e2206] px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Batas Wilayah Administratif</h2>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-3">Arah Mata Angin</th>
                            <th class="px-6 py-3">Keterangan Batas</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900 bg-gray-50/50">Sebelah Utara</td>
                            <td class="px-6 py-4">Berbatasan dengan Desa Cilalawi atau wilayah Kecamatan Sukatani lainnya</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900 bg-gray-50/50">Sebelah Selatan</td>
                            <td class="px-6 py-4">Berbatasan dengan Desa Cijantung dan Kecamatan Darangdan</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900 bg-gray-50/50">Sebelah Timur</td>
                            <td class="px-6 py-4">Berbatasan dengan wilayah Kecamatan Darangdan</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900 bg-gray-50/50">Sebelah Barat</td>
                            <td class="px-6 py-4">Berbatasan dengan Desa Sindanglaya atau Desa Panyindangan</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Blok Aksesibilitas & Wilayah Kerja --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#0e2206] px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Aksesibilitas & Tipologi Wilayah</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-gray-50 rounded-lg text-[#fac81b]">
                            <!-- Icon Jarak / Map Pin -->
                            <svg class="w-6 h-6 text-[#0e2206]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">Jarak ke Pusat Pemerintahan</h4>
                            <p class="text-sm text-gray-600 mt-0.5">Berjarak sekitar <strong>4 Km</strong> menuju pusat administrasi Kecamatan Sukatani.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 border-t border-gray-100 pt-4">
                        <div class="p-2 bg-gray-50 rounded-lg">
                            <!-- Icon Tipologi Lahan -->
                            <svg class="w-6 h-6 text-[#0e2206]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h2m4-1c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">Tipologi Lahan Utama</h4>
                            <p class="text-sm text-gray-600 mt-0.5">Kawasan non-pantai dengan peruntukan pertanian lahan basah/kering, perkebunan, serta potensi industri tambang batuan alam.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Narasi Fisik/Geomorfologi (Full Width di Bawah) --}}
        <div class="bg-gray-50 rounded-xl p-8 border border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl font-bold text-[#0e2206] mb-2">Karakteristik Topografi</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Desa {{ $profil->nama_desa }} memiliki bentang alam bergelombang yang didominasi oleh perbukitan terjal dan lembah kecil. Ketinggian tempat berada pada zona dataran tinggi, yang secara alami memadukan lahan subur untuk sawah irigasi/tadah hujan di area landai dengan sabuk pengaman lingkungan bervegetasi tahunan di lereng atas.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-bold text-[#0e2206] mb-2">Proses Pembentukan Lahan</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Struktur geomorfologi kawasan terbentuk dari sejarah <strong>aktivitas vulkanik purba</strong> yang mendepositkan batuan beku masif di bawah permukaan. Dikombinasikan dengan pengangkatan tektonik serta gerak pelapukan intensif akibat curah hujan yang tinggi, siklus alam ini mengkaruniai wilayah Sukatani dengan material <strong>batu andesit</strong> berkualitas struktural tinggi.
                </p>
            </div>
        </div>
    </section>

</x-layouts.app>