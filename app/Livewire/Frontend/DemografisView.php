<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use App\Models\InformasiDemografi;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class DemografisView extends Component
{
    public function render()
    {
        $statistik = StatistikPenduduk::orderBy('tahun', 'desc')->get();
        
        $tahunTerbaru = StatistikPenduduk::max('tahun');
        
        // --- INI YANG DIUBAH BANG ---
        // Kita ambil datanya dulu (get), baru kita jumlahin kolom laki_laki + perempuan
        $jumlahPenduduk = $tahunTerbaru ? StatistikPenduduk::where('tahun', $tahunTerbaru)->get()->sum(function ($item) {
            return $item->laki_laki + $item->perempuan;
        }) : 0;
        // ----------------------------

        $infoDasar = InformasiDemografi::first();

        return view('livewire.frontend.demografis-view', compact('statistik', 'jumlahPenduduk', 'infoDasar'));
    }
}