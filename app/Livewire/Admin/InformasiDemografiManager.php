<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\InformasiDemografi;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class InformasiDemografiManager extends Component
{
    public $mata_pencaharian, $perekonomian, $sarana_pendidikan, $tempat_ibadah;

    public function mount()
    {
        // Ambil data pertama. Karena ini profil desa, kita cuma butuh 1 baris data aja.
        $info = InformasiDemografi::first();
        if ($info) {
            $this->mata_pencaharian = $info->mata_pencaharian;
            $this->perekonomian = $info->perekonomian;
            $this->sarana_pendidikan = $info->sarana_pendidikan;
            $this->tempat_ibadah = $info->tempat_ibadah;
        }
    }

    public function save()
    {
        $info = InformasiDemografi::first();
        
        $data = [
            'mata_pencaharian' => $this->mata_pencaharian,
            'perekonomian' => $this->perekonomian,
            'sarana_pendidikan' => $this->sarana_pendidikan,
            'tempat_ibadah' => $this->tempat_ibadah,
        ];

        if ($info) {
            $info->update($data);
        } else {
            InformasiDemografi::create($data);
        }

        session()->flash('message', 'Informasi Dasar Demografi berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.admin.informasi-demografi-manager');
    }
}