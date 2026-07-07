<?php

namespace App\Livewire\Admin;

use App\Models\ProfilDesa;
use Livewire\Component;

class ProfilManager extends Component
{
    public $nama_desa, $sambutan, $visi, $misi, $sejarah, $geografis;
    public $luas_wilayah, $batas_utara, $batas_selatan, $batas_timur, $batas_barat;
    public $peta_embed, $alamat_kantor, $telepon, $email;

    public function mount()
    {
        $profil = ProfilDesa::get();
        $this->nama_desa = $profil->nama_desa;
        $this->sambutan = $profil->sambutan;
        $this->visi = $profil->visi;
        $this->misi = $profil->misi;
        $this->sejarah = $profil->sejarah;
        $this->geografis = $profil->geografis;
        $this->luas_wilayah = $profil->luas_wilayah;
        $this->batas_utara = $profil->batas_utara;
        $this->batas_selatan = $profil->batas_selatan;
        $this->batas_timur = $profil->batas_timur;
        $this->batas_barat = $profil->batas_barat;
        $this->peta_embed = $profil->peta_embed;
        $this->alamat_kantor = $profil->alamat_kantor;
        $this->telepon = $profil->telepon;
        $this->email = $profil->email;
    }

    protected function rules()
    {
        return [
            'nama_desa' => 'nullable|string|max:255',
            'sambutan' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'geografis' => 'nullable|string',
            'luas_wilayah' => 'nullable|string|max:255',
            'batas_utara' => 'nullable|string|max:255',
            'batas_selatan' => 'nullable|string|max:255',
            'batas_timur' => 'nullable|string|max:255',
            'batas_barat' => 'nullable|string|max:255',
            'peta_embed' => 'nullable|string',
            'alamat_kantor' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.admin.profil-manager')->layout('layouts.admin');
    }

    public function save()
    {
        $data = $this->validate();
        $profil = ProfilDesa::get();
        $profil->update($data);

        session()->flash('message', 'Profil desa berhasil diperbarui.');
    }
}
