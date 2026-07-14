<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Apbdes;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class ApbdesView extends Component
{
    public $tahun; // Variabel yang di-bind ke dropdown (wire:model.live)

    public function mount()
    {
        // Saat halaman pertama kali dibuka, cari tahun paling terbaru di database
        $tahunTerbaru = Apbdes::max('tahun_anggaran');
        
        // Set nilai default ke tahun terbaru (atau tahun saat ini jika database kosong)
        $this->tahun = $tahunTerbaru ?? date('Y');
    }

    public function render()
        {
            // Mengambil data APBDes berdasarkan kolom 'tahun_anggaran' yang dipilih
            $apbdes = \App\Models\Apbdes::where('tahun_anggaran', $this->tahun)->first();
            
            // Mengirim path file PDF ke view, atau null jika tidak ada
            return view('livewire.frontend.apbdes-view', [
                'pdfUrl' => $apbdes ? $apbdes->file_pdf : null, 
                'tahunList' => \App\Models\Apbdes::select('tahun_anggaran')
                                ->distinct()
                                ->orderBy('tahun_anggaran', 'desc')
                                ->pluck('tahun_anggaran')
            ])->layout('components.layouts.app');
        }
    }