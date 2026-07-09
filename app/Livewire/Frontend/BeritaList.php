<?php

namespace App\Livewire\Frontend;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class BeritaList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.frontend.berita-list', [
            'beritas' => Berita::orderByDesc('tanggal_terbit')->paginate(9),
        ])->layout('layouts.app');
    }
}
