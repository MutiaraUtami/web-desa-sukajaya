<?php

namespace App\Livewire\Admin;

use App\Models\Organisasi;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OrganisasiManager extends Component
{
    use WithPagination, WithFileUploads;

    public $item_id, $nama, $jabatan, $urutan = 0;
    public $foto;
    public $fotoLama;
    public bool $showModal = false;

    protected function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
            'foto' => 'nullable|image|max:2048',
        ];
    }

    public function render()
    {
        return view('livewire.admin.organisasi-manager', [
            'data' => Organisasi::orderBy('urutan')->paginate(10),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = Organisasi::findOrFail($id);
        $this->item_id = $item->id;
        $this->nama = $item->nama;
        $this->jabatan = $item->jabatan;
        $this->urutan = $item->urutan;
        $this->fotoLama = $item->foto;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'urutan' => $this->urutan ?? 0,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('organisasi', 'public');
        }

        Organisasi::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', 'Data berhasil disimpan.');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Organisasi::findOrFail($id)->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['item_id', 'nama', 'jabatan', 'urutan', 'foto', 'fotoLama']);
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
}
