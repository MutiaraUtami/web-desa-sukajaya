<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class StatistikView extends Component
{
    public function render()
    {
        return view('livewire.frontend.statistik-view')->layout('layouts.app');
    }
}