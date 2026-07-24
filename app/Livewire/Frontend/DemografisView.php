<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class DemografisView extends Component
{
    public $filterTahun;
    public $filterGender = 'semua';
    public $listTahun = [];

    public function mount()
    {
        $this->listTahun = StatistikPenduduk::pluck('tahun')->unique()->sortDesc()->values()->toArray();
        $this->filterTahun = !empty($this->listTahun) ? $this->listTahun[0] : date('Y');
    }

    public function updatedFilterTahun() {
        $this->updateChart();
    }

    public function updatedFilterGender() {
        $this->updateChart();
    }

    public function updateChart()
    {
        $this->dispatch('update-chart', series: $this->getChartData());
    }

    public function getChartData()
    {
        $rawData = StatistikPenduduk::where('tahun', $this->filterTahun)->orderBy('bulan', 'asc')->get();
        
        $lkData = array_fill(0, 12, 0);
        $prData = array_fill(0, 12, 0);
        
        foreach($rawData as $item) {
            $idx = (int)$item->bulan - 1; 
            $lkData[$idx] = (int)$item->akhir_lk;
            $prData[$idx] = (int)$item->akhir_pr;
        }

        $series = [];
        
        if ($this->filterGender == 'semua' || $this->filterGender == 'lk') {
            $series[] = ['name' => 'Laki-laki', 'data' => $lkData, 'color' => '#2563eb']; 
        }
        if ($this->filterGender == 'semua' || $this->filterGender == 'pr') {
            $series[] = ['name' => 'Perempuan', 'data' => $prData, 'color' => '#e11d48']; 
        }

        return $series;
    }

    public function render()
    {
        $data = StatistikPenduduk::where('tahun', $this->filterTahun)->orderBy('bulan', 'asc')->get();
        
        $totalPop = 0;
        $avgMonthly = 0;
        $peakMonth = '-';

        if ($data->count() > 0) {
            $lastRecord = $data->last();
            
            // Logika baru: Sesuaikan angka kotak statistik dengan filter gender
            if ($this->filterGender == 'lk') {
                $totalPop = $lastRecord->akhir_lk;
                $avgMonthly = round($data->avg('akhir_lk'), 1);
                $peakRecord = $data->sortByDesc('akhir_lk')->first();
            } elseif ($this->filterGender == 'pr') {
                $totalPop = $lastRecord->akhir_pr;
                $avgMonthly = round($data->avg('akhir_pr'), 1);
                $peakRecord = $data->sortByDesc('akhir_pr')->first();
            } else {
                $totalPop = $lastRecord->akhir_jml;
                $avgMonthly = round($data->avg('akhir_jml'), 1);
                $peakRecord = $data->sortByDesc('akhir_jml')->first();
            }
            
            $peakMonth = $peakRecord ? date('F', mktime(0,0,0,$peakRecord->bulan,1)) : '-';
        }

        return view('livewire.frontend.demografis-view', [
            'data' => $data,
            'totalPop' => $totalPop,
            'avgMonthly' => $avgMonthly,
            'peakMonth' => $peakMonth,
            'chartData' => $this->getChartData()
        ]);
    }
}