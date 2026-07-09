<?php

namespace App\Livewire\Frontend;

use App\Models\StatistikPenduduk;
use Livewire\Component;

class DemografisView extends Component
{
    public function render()
    {
        return view('livewire.frontend.demografis-view', [
            'statistik' => StatistikPenduduk::orderByDesc('tahun')->get(),
        ])->layout('layouts.app');
    }
}
