<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Berita;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class DetailBerita extends Component
{
    public $berita;

    public function mount($slug)
    {
        // Cari berita berdasarkan slug. Kalau nggak ketemu, langsung keluar halaman 404
        $this->berita = Berita::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        // Ambil 5 berita terbaru selain berita yang lagi dibaca ini untuk ditampilkan di sidebar
        $beritaLainnya = Berita::where('id', '!=', $this->berita->id)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();

        return view('components.frontend.detail-berita', compact('beritaLainnya'));
    }
}