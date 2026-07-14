<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Agenda;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class AgendaManager extends Component
{
    use WithPagination;

    public $judul, $deskripsi, $tanggal, $waktu, $lokasi;
    public $item_id;
    public $showModal = false;

    protected function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu' => 'nullable', // format time
            'lokasi' => 'nullable|string|max:255',
        ];
    }

    public function render()
    {
        $data = Agenda::orderBy('tanggal', 'asc')->paginate(10);
        return view('livewire.admin.agenda-manager', compact('data'));
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetFields();
        $item = Agenda::findOrFail($id);
        $this->item_id = $item->id;
        $this->judul = $item->judul;
        $this->deskripsi = $item->deskripsi;
        $this->tanggal = $item->tanggal;
        $this->waktu = $item->waktu;
        $this->lokasi = $item->lokasi;
        
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        Agenda::updateOrCreate(
            ['id' => $this->item_id],
            [
                'judul' => $this->judul,
                'deskripsi' => $this->deskripsi,
                'tanggal' => $this->tanggal,
                'waktu' => $this->waktu,
                'lokasi' => $this->lokasi,
            ]
        );

        session()->flash('message', 'Agenda kegiatan berhasil disimpan!');
        $this->closeModal();
    }

    public function delete($id)
    {
        Agenda::findOrFail($id)->delete();
        session()->flash('message', 'Agenda berhasil dihapus!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->item_id = null;
        $this->judul = '';
        $this->deskripsi = '';
        $this->tanggal = '';
        $this->waktu = '';
        $this->lokasi = '';
        $this->resetErrorBag();
    }
}