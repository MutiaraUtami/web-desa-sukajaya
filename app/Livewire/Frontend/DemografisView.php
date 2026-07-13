<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')] // Nempelin ke layout utama (navbar & footer)
class DemografisView extends Component
{
    public function render()
    {
        // Tarik data, urutkan dari tahun terbaru, lalu berdasarkan Dusun/RW
        $statistik = StatistikPenduduk::orderBy('tahun', 'desc')
                                      ->orderBy('dusun_rw', 'asc')
                                      ->get();

        return view('livewire.frontend.demografis-view', compact('statistik'));
    }
}