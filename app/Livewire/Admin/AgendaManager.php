<?php

namespace App\Livewire\Admin;

use App\Models\Agenda;
use Livewire\Component;
use Livewire\WithPagination;

class AgendaManager extends Component
{
    use WithPagination;

    public $item_id, $judul, $deskripsi, $tanggal, $waktu, $lokasi;
    public bool $showModal = false;

    protected function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
        ];
    }

    public function render()
    {
        return view('livewire.admin.agenda-manager', [
            'data' => Agenda::orderByDesc('tanggal')->paginate(10),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = Agenda::findOrFail($id);
        $this->item_id = $item->id;
        $this->judul = $item->judul;
        $this->deskripsi = $item->deskripsi;
        $this->tanggal = $item->tanggal->format('Y-m-d');
        $this->waktu = $item->waktu;
        $this->lokasi = $item->lokasi;
        $this->showModal = true;
    }

    public function save()
    {
        $data = $this->validate();
        Agenda::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', 'Agenda berhasil disimpan.');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Agenda::findOrFail($id)->delete();
        session()->flash('message', 'Agenda berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['item_id', 'judul', 'deskripsi', 'tanggal', 'waktu', 'lokasi']);
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
}
