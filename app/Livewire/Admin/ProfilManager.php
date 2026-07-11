<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfilDesa;

class ProfilManager extends Component
{
    // Hanya menyimpan variabel yang dibutuhkan di UI
    public $nama_desa, $sambutan, $visi, $misi, $sejarah, $geografis;
    public $luas_wilayah, $peta_embed, $alamat_kantor, $telepon, $email;

    public function mount()
    {
        $profil = ProfilDesa::query()->firstOrCreate([]);
        
        $this->nama_desa     = $profil->nama_desa;
        $this->sambutan      = $profil->sambutan;
        $this->visi          = $profil->visi;
        $this->misi          = $profil->misi;
        $this->sejarah       = $profil->sejarah;
        $this->geografis     = $profil->geografis;
        $this->luas_wilayah  = $profil->luas_wilayah;
        $this->peta_embed    = $profil->peta_embed;
        $this->alamat_kantor = $profil->alamat_kantor;
        $this->telepon       = $profil->telepon;
        $this->email         = $profil->email;
    }

    public function simpan()
    {
        $profil = ProfilDesa::query()->firstOrCreate([]);
        
        $profil->nama_desa     = $this->nama_desa;
        $profil->sambutan      = $this->sambutan;
        $profil->visi          = $this->visi;
        $profil->misi          = $this->misi;
        $profil->sejarah       = $this->sejarah;
        $profil->geografis     = $this->geografis;
        $profil->luas_wilayah  = $this->luas_wilayah;
        $profil->peta_embed    = $this->peta_embed;
        $profil->alamat_kantor = $this->alamat_kantor;
        $profil->telepon       = $this->telepon;
        $profil->email         = $this->email;
        
        $profil->save();

        session()->flash('success', 'Data Profil Desa berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.admin.profil-manager')
            ->layout('components.layouts.admin');
    }
}