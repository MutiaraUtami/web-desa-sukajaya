<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">APBDes (Anggaran Pendapatan dan Belanja Desa)</h1>

    <div class="mb-6 flex items-center bg-white p-4 rounded-lg shadow-sm border border-gray-100">
        <label class="text-sm font-semibold text-gray-700 mr-3">Tahun Anggaran:</label>
        <select wire:model.live="tahun" class="border border-gray-300 rounded-md p-2 text-sm focus:ring-[#1e6306] focus:border-[#1e6306] bg-gray-50 outline-none transition-colors min-w-[150px] cursor-pointer">
            @foreach ($tahunList as $t)
                <option value="{{ $t }}">{{ $t }}</option>
            @endforeach
        </select>
    </div>

    <div class="bg-white rounded-lg shadow-md border border-gray-100 p-4">
        {{-- Asumsi variabel $pdfUrl berisi path file PDF dari database untuk tahun yang dipilih --}}
        @if (!empty($pdfUrl))
            
            <div class="w-full h-[600px] md:h-[800px] rounded border border-gray-200 overflow-hidden bg-gray-100">
                <iframe 
                    src="{{ asset('storage/' . $pdfUrl) }}" 
                    class="w-full h-full" 
                    frameborder="0"
                    title="Dokumen APBDes {{ $tahun }}">
                </iframe>
            </div>
            
            <div class="mt-4 flex justify-end">
                <a href="{{ asset('storage/' . $pdfUrl) }}" target="_blank" download class="bg-[#1e6306] text-white px-5 py-2.5 rounded-lg shadow hover:bg-[#0e2206] transition-colors text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download PDF
                </a>
            </div>

        @else
            <div class="py-24 text-center flex flex-col items-center justify-center bg-gray-50 rounded border-2 border-dashed border-gray-200">
                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-lg font-bold text-gray-700">Dokumen PDF belum tersedia</p>
                <p class="text-sm text-gray-500 mt-1">Belum ada file dokumen APBDes yang diunggah untuk tahun anggaran <span class="font-bold">{{ $tahun }}</span>.</p>
            </div>
        @endif
    </div>
</div>