<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class StatistikManager extends Component
{
    public $statistik_id, $tahun, $dusun_rw, $jumlah_kk, $laki_laki, $perempuan, $usia_0_14, $usia_15_64, $usia_65_keatas;
    public $isModalOpen = false;

    public function render()
    {
        $statistik = StatistikPenduduk::orderBy('tahun', 'desc')->orderBy('dusun_rw', 'asc')->get();
        return view('livewire.admin.statistik-manager', compact('statistik'));
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function openModal() { $this->isModalOpen = true; }
    public function closeModal() { $this->isModalOpen = false; }

    public function resetFields()
    {
        $this->statistik_id = null;
        $this->tahun = date('Y');
        $this->dusun_rw = '';
        $this->jumlah_kk = 0;
        $this->laki_laki = 0;
        $this->perempuan = 0;
        $this->usia_0_14 = 0;
        $this->usia_15_64 = 0;
        $this->usia_65_keatas = 0;
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

        // Cek apakah kombinasi Tahun dan Dusun/RW sudah ada di database
        $cekDuplikat = StatistikPenduduk::where('tahun', $this->tahun)
                                        ->where('dusun_rw', $this->dusun_rw);

        // Kalau statusnya lagi "Edit" (bukan tambah baru), kecualikan data yang sedang diedit ini dari pengecekan
        if ($this->statistik_id) {
            $cekDuplikat->where('id', '!=', $this->statistik_id);
        }

        // Jika terdeteksi ada data yang sama persis
        if ($cekDuplikat->exists()) {
            session()->flash('error', "Gagal! Data untuk {$this->dusun_rw} pada tahun {$this->tahun} sudah ada. Silakan edit data yang sudah tersedia.");
            $this->closeModal();
            return; // Hentikan proses simpan
        }

        // Jika aman dari duplikat, baru simpan datanya
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
        $stat = StatistikPenduduk::findOrFail($id);
        $this->statistik_id = $id;
        $this->tahun = $stat->tahun;
        $this->dusun_rw = $stat->dusun_rw;
        $this->jumlah_kk = $stat->jumlah_kk;
        $this->laki_laki = $stat->laki_laki;
        $this->perempuan = $stat->perempuan;
        $this->usia_0_14 = $stat->usia_0_14;
        $this->usia_15_64 = $stat->usia_15_64;
        $this->usia_65_keatas = $stat->usia_65_keatas;
        $this->openModal();
    }

    public function delete($id)
    {
        StatistikPenduduk::findOrFail($id)->delete();
        session()->flash('message', 'Data Statistik dihapus!');
    }
}