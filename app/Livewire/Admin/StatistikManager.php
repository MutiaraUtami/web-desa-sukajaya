<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StatistikPenduduk; // Menggunakan nama tabel/model yang benar

class StatistikManager extends Component
{
    public function render()
    {
        $data = StatistikPenduduk::all(); 

        return view('livewire.admin.statistik-manager', [
            'data' => $data
        ]);
    }
}