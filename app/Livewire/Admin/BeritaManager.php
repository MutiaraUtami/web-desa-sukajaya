<?php

namespace App\Livewire\Admin;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BeritaManager extends Component
{
    use WithPagination, WithFileUploads;

    public $item_id, $judul, $ringkasan, $isi, $penulis, $tanggal_terbit;
    public $gambar;
    public $gambarLama;
    public bool $showModal = false;

    protected function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:255',
            'tanggal_terbit' => 'nullable|date',
            'gambar' => 'nullable|image|max:2048',
        ];
    }

    public function render()
    {
        return view('livewire.admin.berita-manager', [
            'data' => Berita::orderByDesc('created_at')->paginate(10),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = Berita::findOrFail($id);
        $this->item_id = $item->id;
        $this->judul = $item->judul;
        $this->ringkasan = $item->ringkasan;
        $this->isi = $item->isi;
        $this->penulis = $item->penulis;
        $this->tanggal_terbit = optional($item->tanggal_terbit)->format('Y-m-d');
        $this->gambarLama = $item->gambar;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'judul' => $this->judul,
            'ringkasan' => $this->ringkasan,
            'isi' => $this->isi,
            'penulis' => $this->penulis,
            'tanggal_terbit' => $this->tanggal_terbit ?: now(),
        ];

        if ($this->gambar) {
            $data['gambar'] = $this->gambar->store('berita', 'public');
        }

        Berita::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', 'Berita berhasil disimpan.');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Berita::findOrFail($id)->delete();
        session()->flash('message', 'Berita berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['item_id', 'judul', 'ringkasan', 'isi', 'penulis', 'tanggal_terbit', 'gambar', 'gambarLama']);
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
}
