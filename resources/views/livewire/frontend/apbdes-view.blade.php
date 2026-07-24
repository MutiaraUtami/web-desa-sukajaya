<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-[#0e2206] mb-6">Informasi APBDes dan Realisasi Anggaran</h1>

    <!-- Dropdown Filter Tahun -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 mb-8 flex items-center gap-4 w-full md:w-auto inline-flex">
        <label for="tahun" class="text-sm font-medium text-gray-700 whitespace-nowrap">Tahun Anggaran:</label>
        <select wire:model.live="tahun_anggaran" id="tahun" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
            @forelse($listTahun as $tahun)
                <option value="{{ $tahun }}">{{ $tahun }}</option>
            @empty
                <option value="">Belum ada data</option>
            @endforelse
        </select>
    </div>

    @if(!empty($listTahun))
        <div class="space-y-12">
            
            <!-- 1. Bagian APBDes (Atas) -->
            <div>
                <h2 class="text-2xl font-bold text-[#0e2206] mb-4 border-b-2 border-brand-yellow pb-2 inline-block">
                    APBDes (Anggaran Pendapatan dan Belanja Desa)
                </h2>
                @if($apbdesPdf)
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <iframe src="{{ asset('storage/'.$apbdesPdf) }}" width="100%" height="800px" class="rounded border"></iframe>
                        <div class="mt-4 flex justify-end">
                            <a href="{{ asset('storage/'.$apbdesPdf) }}" target="_blank" class="bg-[#1e6306] text-white px-6 py-2 rounded hover:bg-green-800 font-medium flex items-center gap-2 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download PDF APBDes
                            </a>
                        </div>
                    </div>
                @else
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded shadow-sm">
                        <p class="text-yellow-700">Dokumen APBDes untuk tahun <strong>{{ $tahun_anggaran }}</strong> belum diunggah oleh pihak desa.</p>
                    </div>
                @endif
            </div>

            <!-- 2. Bagian Realisasi APBDes (Bawah) -->
            <div>
                <h2 class="text-2xl font-bold text-[#0e2206] mb-4 border-b-2 border-brand-yellow pb-2 inline-block">
                    Laporan Realisasi APBDes
                </h2>
                @if($realisasiPdf)
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <iframe src="{{ asset('storage/'.$realisasiPdf) }}" width="100%" height="800px" class="rounded border"></iframe>
                        <div class="mt-4 flex justify-end">
                            <a href="{{ asset('storage/'.$realisasiPdf) }}" target="_blank" class="bg-[#1e6306] text-white px-6 py-2 rounded hover:bg-green-800 font-medium flex items-center gap-2 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download PDF Realisasi
                            </a>
                        </div>
                    </div>
                @else
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded shadow-sm">
                        <p class="text-yellow-700">Dokumen Laporan Realisasi APBDes untuk tahun <strong>{{ $tahun_anggaran }}</strong> belum diunggah oleh pihak desa.</p>
                    </div>
                @endif
            </div>

        </div>
    @else
        <!-- Jika database APBDes dan Realisasi masih kosong total -->
        <div class="bg-gray-50 border-l-4 border-gray-400 p-4 rounded shadow-sm">
            <p class="text-gray-700">Belum ada dokumen APBDes maupun Realisasi yang diunggah ke sistem saat ini.</p>
        </div>
    @endif
</div>