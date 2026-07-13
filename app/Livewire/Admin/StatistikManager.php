<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatistikPenduduk;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class StatistikManager extends Component
{
    use WithPagination;

    public $statistik_id;
    public $tahun, $dusun_rw, $jumlah_kk, $laki_laki, $perempuan;
    public $usia_0_14, $usia_15_64, $usia_65_keatas, $keterangan;
    
    public $showModal = false;

    // Aturan validasi form
    protected function rules()
    {
        return [
            'tahun' => 'required|integer',
            'dusun_rw' => 'nullable|string|max:255',
            'jumlah_kk' => 'required|integer|min:0',
            'laki_laki' => 'required|integer|min:0',
            'perempuan' => 'required|integer|min:0',
            'usia_0_14' => 'nullable|integer|min:0',
            'usia_15_64' => 'nullable|integer|min:0',
            'usia_65_keatas' => 'nullable|integer|min:0',
            'keterangan' => 'nullable|string',
        ];
    }

    public function render()
    {
        // Menampilkan data urut berdasarkan tahun terbaru
        $data = StatistikPenduduk::orderBy('tahun', 'desc')->paginate(10);
        return view('livewire.admin.statistik-manager', compact('data'));
    }

    // Fungsi dipanggil saat tombol "+ Tambah Data" diklik
    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    // Fungsi dipanggil saat tombol "Edit" diklik
    public function edit($id)
    {
        $this->resetFields();
        
        $item = StatistikPenduduk::findOrFail($id);
        $this->statistik_id = $item->id;
        $this->tahun = $item->tahun;
        $this->dusun_rw = $item->dusun_rw;
        $this->jumlah_kk = $item->jumlah_kk;
        $this->laki_laki = $item->laki_laki;
        $this->perempuan = $item->perempuan;
        $this->usia_0_14 = $item->usia_0_14;
        $this->usia_15_64 = $item->usia_15_64;
        $this->usia_65_keatas = $item->usia_65_keatas;
        $this->keterangan = $item->keterangan;
        
        $this->showModal = true;
    }

    // Fungsi untuk menyimpan data (Tambah baru / Update)
    public function save()
    {
        $this->validate();

        // Hitung otomatis total jiwa biar admin nggak repot
        $total_jiwa = (int)$this->laki_laki + (int)$this->perempuan;

        StatistikPenduduk::updateOrCreate(
            ['id' => $this->statistik_id],
            [
                'tahun' => $this->tahun,
                'dusun_rw' => $this->dusun_rw,
                'jumlah_kk' => $this->jumlah_kk,
                'laki_laki' => $this->laki_laki,
                'perempuan' => $this->perempuan,
                'total_jiwa' => $total_jiwa, // Hasil hitungan otomatis
                'usia_0_14' => $this->usia_0_14 ?? 0,
                'usia_15_64' => $this->usia_15_64 ?? 0,
                'usia_65_keatas' => $this->usia_65_keatas ?? 0,
                'keterangan' => $this->keterangan,
            ]
        );

        session()->flash('message', $this->statistik_id ? 'Data statistik berhasil diupdate!' : 'Data statistik berhasil ditambahkan!');
        
        $this->closeModal();
    }

    // Fungsi dipanggil saat tombol "Hapus" diklik
    public function delete($id)
    {
        StatistikPenduduk::findOrFail($id)->delete();
        session()->flash('message', 'Data statistik berhasil dihapus!');
    }

    // Fungsi untuk menutup modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    // Membersihkan variabel form dan error
    public function resetFields()
    {
        $this->statistik_id = null;
        $this->tahun = date('Y'); // Langsung diset otomatis ke tahun sekarang
        $this->dusun_rw = '';
        $this->jumlah_kk = null;
        $this->laki_laki = null;
        $this->perempuan = null;
        $this->usia_0_14 = null;
        $this->usia_15_64 = null;
        $this->usia_65_keatas = null;
        $this->keterangan = '';
        
        $this->resetErrorBag();
    }
}