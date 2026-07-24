<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class StatistikView extends Component
{
    public $filterTahun, $filterBulan;
    public $listTahun = [];

    public function mount()
    {
        // Ambil daftar tahun unik dari database
        $this->listTahun = StatistikPenduduk::pluck('tahun')->unique()->sortDesc()->values()->toArray();
        
        if (!empty($this->listTahun)) {
            // Set default ke tahun dan bulan terbaru
            $latest = StatistikPenduduk::orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->first();
            $this->filterTahun = $latest->tahun;
            $this->filterBulan = $latest->bulan;
        } else {
            // Kalau database kosong, pakai tahun dan bulan saat ini
            $this->filterTahun = date('Y');
            $this->filterBulan = date('m');
        }
    }

    public function render()
    {
        // Tarik data 1 bulan yang sesuai (tanpa ada orderBy dusun_rw)
        $data = StatistikPenduduk::where('tahun', $this->filterTahun)
                    ->where('bulan', $this->filterBulan)
                    ->get();
                    
        return view('livewire.frontend.statistik-view', compact('data'));
    }
}