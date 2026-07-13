<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Apbdes;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class ApbdesView extends Component
{
    public $tahun; // Variabel yang di-bind ke dropdown (wire:model.live)

    public function mount()
    {
        // Saat halaman pertama kali dibuka, cari tahun paling terbaru di database
        $tahunTerbaru = Apbdes::max('tahun_anggaran');
        
        // Set nilai default ke tahun terbaru (atau tahun saat ini jika database kosong)
        $this->tahun = $tahunTerbaru ?? date('Y');
    }

    public function render()
    {
        // 1. Ambil daftar tahun unik dari database untuk isi dropdown
        $tahunList = Apbdes::select('tahun_anggaran')
                           ->distinct()
                           ->orderBy('tahun_anggaran', 'desc')
                           ->pluck('tahun_anggaran');

        // 2. Ambil data APBDes KHUSUS untuk tahun yang dipilih di dropdown
        $rawData = Apbdes::query()->where('tahun_anggaran', $this->tahun)->get();
        
        // 3. Kelompokkan data biar Muti gampang nge-loop di frontend
        $data = [
            'pendapatan' => $rawData->where('jenis', 'pendapatan'),
            'belanja'    => $rawData->where('jenis', 'belanja'),
            'pembiayaan' => $rawData->where('jenis', 'pembiayaan'),
        ];

        return view('livewire.frontend.apbdes-blade', compact('tahunList', 'data'));
    }
}