<?php

namespace App\Livewire\Admin;

use App\Models\Apbdes;
use Livewire\Component;
use Livewire\WithPagination;

class ApbdesManager extends Component
{
    use WithPagination;

    public $item_id, $tahun_anggaran, $jenis = 'pendapatan', $bidang, $uraian, $anggaran = 0, $realisasi = 0, $keterangan;
    public bool $showModal = false;
    public $filterTahun = '';

    protected function rules()
    {
        return [
            'tahun_anggaran' => 'required|integer|min:2000|max:2100',
            'jenis' => 'required|in:pendapatan,belanja,pembiayaan',
            'bidang' => 'nullable|string|max:255',
            'uraian' => 'required|string|max:255',
            'anggaran' => 'required|numeric|min:0',
            'realisasi' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable|string',
        ];
    }

    public function render()
    {
        $query = Apbdes::orderByDesc('tahun_anggaran')->orderBy('jenis');

        if ($this->filterTahun) {
            $query->where('tahun_anggaran', $this->filterTahun);
        }

        return view('livewire.admin.apbdes-manager', [
            'data' => $query->paginate(15),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = Apbdes::findOrFail($id);
        $this->item_id = $item->id;
        $this->tahun_anggaran = $item->tahun_anggaran;
        $this->jenis = $item->jenis;
        $this->bidang = $item->bidang;
        $this->uraian = $item->uraian;
        $this->anggaran = $item->anggaran;
        $this->realisasi = $item->realisasi;
        $this->keterangan = $item->keterangan;
        $this->showModal = true;
    }

    public function save()
    {
        $data = $this->validate();
        Apbdes::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', 'Data APBDes berhasil disimpan.');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Apbdes::findOrFail($id)->delete();
        session()->flash('message', 'Data APBDes berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['item_id', 'tahun_anggaran', 'bidang', 'uraian', 'anggaran', 'realisasi', 'keterangan']);
        $this->jenis = 'pendapatan';
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
}
