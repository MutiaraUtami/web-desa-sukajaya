<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StatistikPenduduk;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class StatistikManager extends Component
{
    use WithPagination;

    public $item_id, $tahun, $bulan;
    public $awal_lk = 0, $awal_pr = 0, $mati_lk = 0, $mati_pr = 0;
    public $lahir_lk = 0, $lahir_pr = 0, $pindah_lk = 0, $pindah_pr = 0;
    public $datang_lk = 0, $datang_pr = 0;
    public $jml_kk = 0, $wajib_ktp = 0, $ktp_sudah = 0, $ktp_belum = 0, $kk_sudah = 0, $kk_belum = 0;
    
    public $showModal = false;
    public $filterTahun;

    public function mount()
    {
        $this->filterTahun = date('Y');
    }

    public function render()
    {
        // Tarik data per bulan (tanpa dusun_rw)
        $data = StatistikPenduduk::where('tahun', $this->filterTahun)
                    ->orderBy('bulan', 'asc')
                    ->paginate(12);
                    
        return view('livewire.admin.statistik-manager', compact('data'));
    }

    public function create()
    {
        $this->resetFields();
        $this->tahun = $this->filterTahun;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $item = StatistikPenduduk::findOrFail($id);
        $this->item_id = $item->id;
        $this->tahun = $item->tahun; 
        $this->bulan = $item->bulan;
        $this->awal_lk = $item->awal_lk; $this->awal_pr = $item->awal_pr;
        $this->mati_lk = $item->mati_lk; $this->mati_pr = $item->mati_pr;
        $this->lahir_lk = $item->lahir_lk; $this->lahir_pr = $item->lahir_pr;
        $this->pindah_lk = $item->pindah_lk; $this->pindah_pr = $item->pindah_pr;
        $this->datang_lk = $item->datang_lk; $this->datang_pr = $item->datang_pr;
        $this->jml_kk = $item->jml_kk; $this->wajib_ktp = $item->wajib_ktp;
        $this->ktp_sudah = $item->ktp_sudah; $this->ktp_belum = $item->ktp_belum;
        $this->kk_sudah = $item->kk_sudah; $this->kk_belum = $item->kk_belum;
        
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'tahun' => 'required', 
            'bulan' => 'required'
        ]);

        StatistikPenduduk::updateOrCreate(['id' => $this->item_id], [
            'tahun' => $this->tahun, 'bulan' => $this->bulan,
            'awal_lk' => $this->awal_lk ?: 0, 'awal_pr' => $this->awal_pr ?: 0,
            'mati_lk' => $this->mati_lk ?: 0, 'mati_pr' => $this->mati_pr ?: 0,
            'lahir_lk' => $this->lahir_lk ?: 0, 'lahir_pr' => $this->lahir_pr ?: 0,
            'pindah_lk' => $this->pindah_lk ?: 0, 'pindah_pr' => $this->pindah_pr ?: 0,
            'datang_lk' => $this->datang_lk ?: 0, 'datang_pr' => $this->datang_pr ?: 0,
            'jml_kk' => $this->jml_kk ?: 0, 'wajib_ktp' => $this->wajib_ktp ?: 0,
            'ktp_sudah' => $this->ktp_sudah ?: 0, 'ktp_belum' => $this->ktp_belum ?: 0,
            'kk_sudah' => $this->kk_sudah ?: 0, 'kk_belum' => $this->kk_belum ?: 0,
        ]);

        session()->flash('message', 'Data statistik berhasil disimpan!');
        $this->showModal = false;
    }

    public function delete($id)
    {
        StatistikPenduduk::findOrFail($id)->delete();
    }

    public function resetFields()
    {
        $this->reset([
            'item_id', 'bulan', 'awal_lk', 'awal_pr', 'mati_lk', 'mati_pr', 
            'lahir_lk', 'lahir_pr', 'pindah_lk', 'pindah_pr', 'datang_lk', 'datang_pr', 
            'jml_kk', 'wajib_ktp', 'ktp_sudah', 'ktp_belum', 'kk_sudah', 'kk_belum'
        ]);
    }
}