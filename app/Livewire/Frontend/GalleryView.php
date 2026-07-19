<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Gallery;

class GalleryView extends Component
{
    public function render()
    {
        $galleries = Gallery::latest()->get();
        return view('livewire.frontend.gallery-view', compact('galleries'))->layout('components.layouts.app');
    }
}