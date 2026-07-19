<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $photo;
    public $caption;
    public $galleries;

    public function mount()
    {
        $this->loadGalleries();
    }

    public function loadGalleries()
    {
        $this->galleries = Gallery::latest()->get();
    }

    public function save()
    {
        $this->validate([
            'photo' => 'required|image|max:2048', // Maksimal 2MB
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $this->photo->store('galleries', 'public');

        Gallery::create([
            'image_path' => $path,
            'caption' => $this->caption,
        ]);

        $this->reset(['photo', 'caption']);
        $this->loadGalleries();
        session()->flash('message', 'Foto berhasil diunggah!');
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            Storage::disk('public')->delete($gallery->image_path);
            $gallery->delete();
            $this->loadGalleries();
        }
    }

    public function render()
    {
        return view('livewire.admin.gallery-manager')->layout('components.layouts.admin');
    }
}