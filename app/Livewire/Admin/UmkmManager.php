<?php

namespace App\Livewire\Admin;

use App\Models\Umkm;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UmkmManager extends Component
{
    use WithPagination, WithFileUploads;

    public $item_id, $nama_usaha, $pemilik, $kategori, $deskripsi, $alamat, $kontak;
    public $foto;
    public $fotoLama;
    public bool $showModal = false;

    protected function rules()
    {
        return [
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ];
    }

    public function render()
    {
        return view('livewire.admin.umkm-manager', [
            'data' => Umkm::orderByDesc('created_at')->paginate(10),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = Umkm::findOrFail($id);
        $this->item_id = $item->id;
        $this->nama_usaha = $item->nama_usaha;
        $this->pemilik = $item->pemilik;
        $this->kategori = $item->kategori;
        $this->deskripsi = $item->deskripsi;
        $this->alamat = $item->alamat;
        $this->kontak = $item->kontak;
        $this->fotoLama = $item->foto;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'nama_usaha' => $this->nama_usaha,
            'pemilik' => $this->pemilik,
            'kategori' => $this->kategori,
            'deskripsi' => $this->deskripsi,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('umkm', 'public');
        }

        Umkm::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', 'Data UMKM berhasil disimpan.');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Umkm::findOrFail($id)->delete();
        session()->flash('message', 'Data UMKM berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['item_id', 'nama_usaha', 'pemilik', 'kategori', 'deskripsi', 'alamat', 'kontak', 'foto', 'fotoLama']);
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
}
