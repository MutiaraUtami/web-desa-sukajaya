<?php

namespace App\Livewire\Admin;

use App\Models\StatistikPenduduk;
use Livewire\Component;
use Livewire\WithPagination;

class StatistikManager extends Component
{
    use WithPagination;

    public $statistik_id, $bulan, $tahun;
    public $awal_lk = 0, $awal_pr = 0;
    public $lahir_lk = 0, $lahir_pr = 0, $mati_lk = 0, $mati_pr = 0;
    public $pindah_lk = 0, $pindah_pr = 0, $datang_lk = 0, $datang_pr = 0;
    public $akhir_lk = 0, $akhir_pr = 0;
    public $jumlah_kk = 0, $wajib_ktp = 0, $ktp_sudah = 0, $ktp_belum = 0;
    public $kk_sudah = 0, $kk_belum = 0, $keterangan;

    public $isModalOpen = 0;

    protected $rules = [
        'bulan' => 'required|string',
        'tahun' => 'required|integer',
        'awal_lk' => 'required|integer', 'awal_pr' => 'required|integer',
        'lahir_lk' => 'required|integer', 'lahir_pr' => 'required|integer',
        'mati_lk' => 'required|integer', 'mati_pr' => 'required|integer',
        'pindah_lk' => 'required|integer', 'pindah_pr' => 'required|integer',
        'datang_lk' => 'required|integer', 'datang_pr' => 'required|integer',
        'akhir_lk' => 'required|integer', 'akhir_pr' => 'required|integer',
        'jumlah_kk' => 'required|integer', 'wajib_ktp' => 'required|integer',
        'ktp_sudah' => 'required|integer', 'ktp_belum' => 'required|integer',
        'kk_sudah' => 'required|integer', 'kk_belum' => 'required|integer',
    ];

    public function render()
    {
        return view('livewire.admin.statistik-manager', [
            'statistik' => StatistikPenduduk::orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->paginate(10)
        ]);
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
        $this->reset([
            'statistik_id', 'bulan', 'tahun', 'awal_lk', 'awal_pr',
            'lahir_lk', 'lahir_pr', 'mati_lk', 'mati_pr', 'pindah_lk', 'pindah_pr',
            'datang_lk', 'datang_pr', 'akhir_lk', 'akhir_pr', 'jumlah_kk',
            'wajib_ktp', 'ktp_sudah', 'ktp_belum', 'kk_sudah', 'kk_belum', 'keterangan'
        ]);
    }

    public function store()
    {
        $this->validate();

        StatistikPenduduk::updateOrCreate(['id' => $this->statistik_id], [
            'bulan' => $this->bulan, 'tahun' => $this->tahun,
            'awal_lk' => $this->awal_lk, 'awal_pr' => $this->awal_pr,
            'lahir_lk' => $this->lahir_lk, 'lahir_pr' => $this->lahir_pr,
            'mati_lk' => $this->mati_lk, 'mati_pr' => $this->mati_pr,
            'pindah_lk' => $this->pindah_lk, 'pindah_pr' => $this->pindah_pr,
            'datang_lk' => $this->datang_lk, 'datang_pr' => $this->datang_pr,
            'akhir_lk' => $this->akhir_lk, 'akhir_pr' => $this->akhir_pr,
            'jumlah_kk' => $this->jumlah_kk, 'wajib_ktp' => $this->wajib_ktp,
            'ktp_sudah' => $this->ktp_sudah, 'ktp_belum' => $this->ktp_belum,
            'kk_sudah' => $this->kk_sudah, 'kk_belum' => $this->kk_belum,
            'keterangan' => $this->keterangan,
        ]);

        session()->flash('message', $this->statistik_id ? 'Data diperbarui.' : 'Data ditambahkan.');
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $data = StatistikPenduduk::findOrFail($id);
        $this->statistik_id = $id;
        $this->fill($data->toArray());
        $this->openModal();
    }

    public function delete($id)
    {
        StatistikPenduduk::find($id)->delete();
        session()->flash('message', 'Data dihapus.');
    }
}