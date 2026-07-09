<?php

namespace App\Livewire\Admin;

use App\Models\StatistikPenduduk;
use Livewire\Component;
use Livewire\WithPagination;

class StatistikManager extends Component
{
    use WithPagination;

    public $statistik_id;
    public $dusun_rw, $tahun, $jumlah_kk, $laki_laki, $perempuan;
    public $usia_0_14, $usia_15_64, $usia_65_keatas, $keterangan;

    public bool $showModal = false;

    protected function rules()
    {
        return [
            'dusun_rw' => 'nullable|string|max:255',
            'tahun' => 'required|integer|min:2000|max:2100',
            'jumlah_kk' => 'required|integer|min:0',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
            'usia_0_14' => 'required|integer|min:0',
            'usia_15_64' => 'required|integer|min:0',
            'usia_65_keatas' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ];
    }

    public function render()
    {
        return view('livewire.admin.statistik-manager', [
            'data' => StatistikPenduduk::orderByDesc('tahun')->paginate(10),
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = StatistikPenduduk::findOrFail($id);
        $this->statistik_id = $item->id;
        $this->dusun_rw = $item->dusun_rw;
        $this->tahun = $item->tahun;
        $this->jumlah_kk = $item->jumlah_kk;
        $this->laki_laki = $item->laki_laki;
        $this->perempuan = $item->perempuan;
        $this->usia_0_14 = $item->usia_0_14;
        $this->usia_15_64 = $item->usia_15_64;
        $this->usia_65_keatas = $item->usia_65_keatas;
        $this->keterangan = $item->keterangan;
        $this->showModal = true;
    }

    public function save()
    {
        $data = $this->validate();

        StatistikPenduduk::updateOrCreate(['id' => $this->statistik_id], $data);

        session()->flash('message', $this->statistik_id ? 'Data berhasil diperbarui.' : 'Data berhasil ditambahkan.');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        StatistikPenduduk::findOrFail($id)->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset([
            'statistik_id', 'dusun_rw', 'tahun', 'jumlah_kk', 'laki_laki',
            'perempuan', 'usia_0_14', 'usia_15_64', 'usia_65_keatas', 'keterangan',
        ]);
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
}
