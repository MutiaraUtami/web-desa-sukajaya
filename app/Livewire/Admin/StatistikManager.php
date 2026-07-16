<?php

namespace App\Livewire\Admin;

use App\Models\StatistikPenduduk;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class StatistikManager extends Component
{
    // Mengambil fitur Pagination dari branch Muti
    use WithPagination;

    public $statistik_id, $tahun, $dusun_rw, $jumlah_kk, $laki_laki, $perempuan, $usia_0_14, $usia_15_64, $usia_65_keatas;
    public $isModalOpen = false;

    public function render()
    {
        // Menggabungkan filter Abang dengan Pagination Muti (tampil 10 data per halaman)
        $statistik = StatistikPenduduk::orderBy('tahun', 'desc')->orderBy('dusun_rw', 'asc')->paginate(10);
        return view('livewire.admin.statistik-manager', compact('statistik'));
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function resetFields()
    {
        // Mengadopsi cara Muti yang lebih bersih pakai $this->reset()
        $this->reset([
            'statistik_id', 'dusun_rw', 'jumlah_kk', 'laki_laki', 
            'perempuan', 'usia_0_14', 'usia_15_64', 'usia_65_keatas'
        ]);
        $this->tahun = date('Y');
    }

    public function store()
    {
        $this->validate([
            'tahun' => 'required|numeric',
            'dusun_rw' => 'nullable|string',
            'jumlah_kk' => 'required|numeric',
            'laki_laki' => 'required|numeric',
            'perempuan' => 'required|numeric',
            'usia_0_14' => 'required|numeric',
            'usia_15_64' => 'required|numeric',
            'usia_65_keatas' => 'required|numeric',
        ]);

        // Fitur cegah duplikat (Tetap dipertahankan)
        $cekDuplikat = StatistikPenduduk::where('tahun', $this->tahun)
                                        ->where('dusun_rw', $this->dusun_rw);

        if ($this->statistik_id) {
            $cekDuplikat->where('id', '!=', $this->statistik_id);
        }

        if ($cekDuplikat->exists()) {
            session()->flash('error', "Gagal! Data untuk {$this->dusun_rw} pada tahun {$this->tahun} sudah ada. Silakan edit data yang sudah tersedia.");
            $this->closeModal();
            return; 
        }

        StatistikPenduduk::updateOrCreate(['id' => $this->statistik_id], [
            'tahun' => $this->tahun,
            'dusun_rw' => $this->dusun_rw,
            'jumlah_kk' => $this->jumlah_kk,
            'laki_laki' => $this->laki_laki,
            'perempuan' => $this->perempuan,
            'usia_0_14' => $this->usia_0_14,
            'usia_15_64' => $this->usia_15_64,
            'usia_65_keatas' => $this->usia_65_keatas,
        ]);

        session()->flash('message', $this->statistik_id ? 'Data Statistik diperbarui!' : 'Data Statistik ditambahkan!');
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $data = StatistikPenduduk::findOrFail($id);
        $this->statistik_id = $id;
        // Mengadopsi cara Muti memanggil data otomatis (lebih ringkas dari sebelumnya)
        $this->fill($data->toArray());
        $this->openModal();
    }

    public function delete($id)
    {
        StatistikPenduduk::findOrFail($id)->delete();
        session()->flash('message', 'Data Statistik dihapus!');
    }
}