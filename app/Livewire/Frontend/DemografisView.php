<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class DemografisView extends Component
{
    public $filterRw = 'Semua';

    public function render()
    {
        // 1. Ambil list RW untuk Dropdown
       $listRw = StatistikPenduduk::whereNotNull('dusun_rw')
        ->where('dusun_rw', '!=', '')
        ->distinct()
        ->pluck('dusun_rw');

        // 2. Query Data sesuai Filter
       $query = StatistikPenduduk::query();
    if ($this->filterRw !== 'Semua') {
        $query->where('dusun_rw', $this->filterRw);
    }

        // Data untuk Tabel
        $statistik = (clone $query)->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->get();
        
        // 3. Olah Data untuk Chart (Tahun Terlama ke Terbaru)
        $rawData = (clone $query)->orderBy('tahun', 'asc')->get();
        $labels = [];
        $laki_laki = [];
        $perempuan = [];

        foreach ($rawData->groupBy('tahun') as $tahun => $data) {
            $labels[] = $tahun;
            $laki_laki[] = $data->sum('laki_laki');
            $perempuan[] = $data->sum('perempuan');
        }

        $chartData = [
            'labels' => $labels,
            'laki_laki' => $laki_laki,
            'perempuan' => $perempuan
        ];

        // 4. Kirim sinyal (event) ke JavaScript untuk perbarui grafik!
        $this->dispatch('update-chart', chartData: $chartData);

        return view('livewire.frontend.demografis-view', compact('statistik', 'listRw', 'chartData'));
    }
}