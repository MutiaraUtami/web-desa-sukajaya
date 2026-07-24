<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Apbdes;
use App\Models\RealisasiApbdes;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app')] 
class ApbdesView extends Component
{
    public $tahun_anggaran;
    public $listTahun = [];
    public $apbdesPdf;
    public $realisasiPdf;

    public function mount()
    {
        // Ambil semua daftar tahun dari kedua tabel
        $tahunApbdes = Apbdes::pluck('tahun_anggaran')->toArray();
        $tahunRealisasi = RealisasiApbdes::pluck('tahun_anggaran')->toArray();
        
        // Gabungkan, buang yang duplikat, dan urutkan dari tahun terbaru
        $this->listTahun = collect(array_merge($tahunApbdes, $tahunRealisasi))
                            ->unique()
                            ->sortDesc()
                            ->values()
                            ->toArray();

        // Set tahun default ke yang paling baru saat halaman pertama kali dibuka
        if (!empty($this->listTahun)) {
            $this->tahun_anggaran = $this->listTahun[0];
            $this->loadData();
        }
    }

    public function updatedTahunAnggaran()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Tarik PDF APBDes
        $apbdes = Apbdes::where('tahun_anggaran', $this->tahun_anggaran)->first();
        $this->apbdesPdf = $apbdes ? $apbdes->file_pdf : null;

        // Tarik PDF Realisasi
        $realisasi = RealisasiApbdes::where('tahun_anggaran', $this->tahun_anggaran)->first();
        $this->realisasiPdf = $realisasi ? $realisasi->file_pdf : null;
    }

    public function render()
    {
        return view('livewire.frontend.apbdes-view');
    }
}