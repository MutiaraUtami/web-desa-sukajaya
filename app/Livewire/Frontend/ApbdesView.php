<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Apbdes;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class ApbdesView extends Component
{
    public $tahun; // Variabel yang diikat ke dropdown

    public function render()
    {
        // 1. Ambil semua tahun yang tersedia di database, urutkan dari terbaru
        $tahunList = Apbdes::orderBy('tahun_anggaran', 'desc')->pluck('tahun_anggaran')->toArray();

        // 2. Jika dropdown kosong (baru buka halaman), otomatis pilih tahun terbaru
        if (!$this->tahun && count($tahunList) > 0) {
            $this->tahun = $tahunList[0];
        }

        // 3. Cari URL file PDF berdasarkan tahun yang dipilih di dropdown
        $pdfUrl = null;
        if ($this->tahun) {
            $dataApbdes = Apbdes::where('tahun_anggaran', $this->tahun)->first();
            if ($dataApbdes) {
                $pdfUrl = $dataApbdes->file_pdf;
            }
        }

        return view('livewire.frontend.apbdes-view', compact('tahunList', 'pdfUrl'));
    }
}