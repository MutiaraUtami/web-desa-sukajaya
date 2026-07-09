<?php

namespace App\Livewire\Frontend;

use App\Models\Umkm;
use Livewire\Component;
use Livewire\WithPagination;

class UmkmList extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $query = Umkm::query();

        if ($this->search) {
            $query->where('nama_usaha', 'like', "%{$this->search}%")
                  ->orWhere('kategori', 'like', "%{$this->search}%");
        }

        return view('livewire.frontend.umkm-list', [
            'umkms' => $query->orderBy('nama_usaha')->paginate(9),
        ])->layout('layouts.app');
    }
}
