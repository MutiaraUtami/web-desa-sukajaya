<?php

namespace App\Livewire\Frontend;

use App\Models\Agenda;
use Livewire\Component;
use Livewire\WithPagination;

class AgendaList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.frontend.agenda-list', [
            'agendas' => Agenda::orderBy('tanggal')->where('tanggal', '>=', now()->subDay())->paginate(10),
        ])->layout('layouts.app');
    }
}
