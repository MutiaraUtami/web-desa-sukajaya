<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Umkm;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.admin')]
class UmkmManager extends Component
{
    use WithPagination, WithFileUploads;

    public $nama_usaha, $pemilik, $kategori, $deskripsi, $alamat, $kontak, $foto;
    public $item_id, $fotoLama;
    public $showModal = false;

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
        $data = Umkm::orderBy('nama_usaha', 'asc')->paginate(9);
        return view('livewire.admin.umkm-manager', compact('data'));
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetFields();
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
            if ($this->item_id && $this->fotoLama) {
                Storage::disk('public')->delete($this->fotoLama);
            }
            $data['foto'] = $this->foto->store('umkm', 'public');
        }

        Umkm::updateOrCreate(['id' => $this->item_id], $data);
        session()->flash('message', 'Data UMKM berhasil disimpan!');
        $this->closeModal();
    }

    public function delete($id)
    {
        $item = Umkm::findOrFail($id);
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }
        $item->delete();
        session()->flash('message', 'Data UMKM berhasil dihapus!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->item_id = null;
        $this->nama_usaha = '';
        $this->pemilik = '';
        $this->kategori = '';
        $this->deskripsi = '';
        $this->alamat = '';
        $this->kontak = '';
        $this->foto = null;
        $this->fotoLama = null;
        $this->resetErrorBag();
    }
}