<?php

namespace App\Livewire\Frontend;

use App\Models\Apbdes;
use Livewire\Component;

class ApbdesView extends Component
{
    public $tahun;

    public function mount()
    {
        $this->tahun = Apbdes::max('tahun_anggaran') ?? date('Y');
    }

    public function render()
    {
        $data = Apbdes::where('tahun_anggaran', $this->tahun)->orderBy('jenis')->get()->groupBy('jenis');
        $tahunList = Apbdes::select('tahun_anggaran')->distinct()->orderByDesc('tahun_anggaran')->pluck('tahun_anggaran');

        return view('livewire.frontend.apbdes-view', [
            'data' => $data,
            'tahunList' => $tahunList,
        ])->layout('layouts.app');
    }
}
