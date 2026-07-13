<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Apbdes;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class APBDesManager extends Component
{
    use WithPagination;

    public $item_id;
    public $tahun_anggaran, $jenis, $bidang, $uraian, $anggaran, $realisasi, $keterangan;
    public $filterTahun; // Variabel untuk fitur filter/pencarian langsung dari Muti
    
    public $showModal = false;

    // Reset halaman pagination kalau Abang ngetik tahun di kotak filter
    public function updatingFilterTahun()
    {
        $this->resetPage();
    }

    // Aturan validasi form
    protected function rules()
    {
        return [
            'tahun_anggaran' => 'required|integer',
            'jenis'          => 'required|in:pendapatan,belanja,pembiayaan',
            'bidang'         => 'nullable|string|max:255',
            'uraian'         => 'required|string|max:255',
            'anggaran'       => 'required|numeric|min:0',
            'realisasi'      => 'nullable|numeric|min:0',
            'keterangan'     => 'nullable|string',
        ];
    }

    public function render()
    {
        $query = Apbdes::query();
        
        // Logika pencarian/filter: kalau kotak input tahun diisi, data otomatis tersaring
        if ($this->filterTahun) {
            $query->where('tahun_anggaran', 'like', '%' . $this->filterTahun . '%');
        }

        // Tampilkan data, urutkan dari tahun terbaru
        $data = $query->orderBy('tahun_anggaran', 'desc')->paginate(10);
        
        return view('livewire.admin.apbdes-manager', compact('data'));
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
        
        $item = Apbdes::findOrFail($id);
        $this->item_id        = $item->id;
        $this->tahun_anggaran = $item->tahun_anggaran;
        $this->jenis          = $item->jenis;
        $this->bidang         = $item->bidang;
        $this->uraian         = $item->uraian;
        $this->anggaran       = $item->anggaran;
        $this->realisasi      = $item->realisasi;
        $this->keterangan     = $item->keterangan;
        
        $this->showModal = true;
    }

    // Fungsi untuk menyimpan data (Tambah baru / Update)
    public function save()
    {
        $this->validate();

        Apbdes::updateOrCreate(
            ['id' => $this->item_id],
            [
                'tahun_anggaran' => $this->tahun_anggaran,
                'jenis'          => $this->jenis,
                'bidang'         => $this->bidang,
                'uraian'         => $this->uraian,
                'anggaran'       => $this->anggaran,
                'realisasi'      => $this->realisasi ?? 0, // Set bawaan 0 jika kolom realisasi dikosongkan
                'keterangan'     => $this->keterangan,
            ]
        );

        session()->flash('message', $this->item_id ? 'Data APBDes berhasil diupdate!' : 'Data APBDes berhasil ditambahkan!');
        
        $this->closeModal();
    }

    // Fungsi dipanggil saat tombol "Hapus" diklik
    public function delete($id)
    {
        Apbdes::findOrFail($id)->delete();
        session()->flash('message', 'Data APBDes berhasil dihapus!');
    }

    // Fungsi untuk menutup modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    // Membersihkan variabel form dan mematikan peringatan error
    public function resetFields()
    {
        $this->item_id        = null;
        $this->tahun_anggaran = date('Y'); // Langsung diset otomatis ke tahun sekarang
        $this->jenis          = 'pendapatan'; // Nilai bawaan dropdown
        $this->bidang         = '';
        $this->uraian         = '';
        $this->anggaran       = null;
        $this->realisasi      = null;
        $this->keterangan     = '';
        
        $this->resetErrorBag();
    }
}