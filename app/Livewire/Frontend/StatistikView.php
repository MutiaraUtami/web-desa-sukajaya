<?php

namespace App\Livewire\Frontend;

use App\Models\StatistikPenduduk;
use Livewire\Component;

class StatistikView extends Component
{
    public $filterTahun = '';
    public $filterRw = '';
    
    // Property publik ini agar bisa di-ikat (@entangle) oleh AlpineJS di Blade
    public $chartData = [];

    public function render()
    {
        $query = StatistikPenduduk::query();

        // 1. Logika Filter Tahun
        if ($this->filterTahun != '') {
            $query->where('tahun', $this->filterTahun);
        }

        // 2. Logika Filter RW
        if ($this->filterRw != '') {
            $query->where('dusun_rw', $this->filterRw);
        }

        $statistik = $query->orderBy('tahun', 'desc')->orderBy('dusun_rw', 'asc')->get();

        // 3. Format Data untuk disuntikkan ke Chart.js
        $this->chartData = [
            'labels' => $statistik->pluck('dusun_rw')->toArray(),
            'laki_laki' => $statistik->pluck('laki_laki')->toArray(),
            'perempuan' => $statistik->pluck('perempuan')->toArray(),
            'usia_0_14' => $statistik->pluck('usia_0_14')->toArray(),
            'usia_15_64' => $statistik->pluck('usia_15_64')->toArray(),
            'usia_65_keatas' => $statistik->pluck('usia_65_keatas')->toArray(),
        ];

        return view('livewire.frontend.statistik-view', [
            'statistik' => $statistik,
            // Ambil daftar tahun & RW unik yang ada di database untuk dropdown filter
            'availableTahun' => StatistikPenduduk::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun'),
            'availableRw' => StatistikPenduduk::select('dusun_rw')->distinct()->orderBy('dusun_rw', 'asc')->pluck('dusun_rw'),
        ])->layout('components.layouts.app'); // Pastikan layout ini sesuai dengan nama folder komponen layout Anda
    }
}