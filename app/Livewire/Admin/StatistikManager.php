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

    public $statistik_id, $tahun, $bulan, $dusun_rw, $jumlah_kk, $laki_laki, $perempuan, $usia_0_14, $usia_15_64, $usia_65_keatas;
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
        // 1. CEK DUPLIKAT DULU SEBELUM NGAPA-NGAPAIN
        $cekDuplikat = StatistikPenduduk::where('tahun', $this->tahun)
            ->where('bulan', $this->bulan)
            ->where('dusun_rw', $this->dusun_rw);

        // Kalau lagi mode Edit, kecualikan ID data ini biar nggak bentrok sama dirinya sendiri
        if ($this->statistik_id) {
            $cekDuplikat->where('id', '!=', $this->statistik_id);
        }

        // Kalau ternyata datanya udah ada, STOP! Jangan disave.
        if ($cekDuplikat->exists()) {
            session()->flash('error', "Gagal! Data untuk {$this->dusun_rw} bulan {$this->bulan} tahun {$this->tahun} sudah ada. Silakan edit data yang sudah tersedia.");
            $this->closeModal();
            
            return; // <-- Perintah 'return' ini bakal menghentikan eksekusi, jadi kodingan save di bawahnya NGGAK AKAN dibaca.
        }


        // 2. KALAU AMAN (TIDAK DUPLIKAT), BARU DISIMPAN KE DATABASE (CUKUP 1 KALI SAJA)
        StatistikPenduduk::updateOrCreate(['id' => $this->statistik_id], [
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'dusun_rw' => $this->dusun_rw,
            'jumlah_kk' => $this->jumlah_kk,
            'laki_laki' => $this->laki_laki,
            'perempuan' => $this->perempuan,
            'usia_0_14' => $this->usia_0_14,
            'usia_15_64' => $this->usia_15_64,
            'usia_65_keatas' => $this->usia_65_keatas,
        ]);


        // 3. TAMPILKAN NOTIFIKASI SUKSES & BERSIHKAN FORM
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