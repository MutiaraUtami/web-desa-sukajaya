<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\LembagaDesa; // Pastikan model ini mengarah ke tabel yang benar
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LembagaManager extends Component
{
    use WithPagination, WithFileUploads;

    // Properti sesuai dengan form di Blade
    public $nama_lembaga, $deskripsi, $file_pdf, $old_pdf, $slug;
    public $lembaga_id;
    public $isModalOpen = false;

    // Menampilkan data
    public function render()
    {
        // Variabel dikirim sebagai 'organisasi' supaya cocok dengan @foreach($organisasi as $org) di Blade
        $data = LembagaDesa::orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.admin.lembaga-manager', [
            'organisasi' => $data
        ])->layout('layouts.admin');
    }

    // Membuka modal untuk Tambah Data
    public function create()
    {
        $this->resetFields();
        $this->isModalOpen = true;
    }

    // Membuka modal untuk Edit Data
    public function edit($id)
    {
        $lembaga = LembagaDesa::findOrFail($id);
        $this->lembaga_id = $id;
        $this->nama_lembaga = $lembaga->nama_lembaga;
        $this->deskripsi = $lembaga->deskripsi;
        $this->old_pdf = $lembaga->file_pdf;

        $this->isModalOpen = true;
    }

    // Menyimpan data (Tambah & Edit)
    public function store()
    {
        // 1. Pastikan validasinya cuma 3 ini aja, JANGAN ADA 'slug'
        $this->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_pdf' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // 2. Cek file
        $filePath = $this->old_pdf;
        if ($this->file_pdf) {
            if ($this->old_pdf) {
                Storage::disk('public')->delete($this->old_pdf);
            }
            $filePath = $this->file_pdf->store('lembaga', 'public');
        }

        // 3. Simpan data (slug ditaruh di sini aja, otomatis dibikin)
        LembagaDesa::updateOrCreate(
            ['id' => $this->lembaga_id],
            [
                'nama_lembaga' => $this->nama_lembaga,
                'slug' => Str::slug($this->nama_lembaga), // <--- Cukup di sini aja
                'deskripsi' => $this->deskripsi,
                'file_pdf' => $filePath,
            ]
        );

        session()->flash('message', $this->lembaga_id ? 'Lembaga berhasil diupdate!' : 'Lembaga berhasil ditambahkan!');

        $this->isModalOpen = false;
        $this->resetFields();
    }

    // Menghapus data
    public function delete($id)
    {
        $lembaga = LembagaDesa::findOrFail($id);

        // Hapus file dari storage jika ada
        if ($lembaga->file_pdf) {
            Storage::disk('public')->delete($lembaga->file_pdf);
        }

        $lembaga->delete();
        session()->flash('message', 'Lembaga berhasil dihapus!');
    }

    // Mengosongkan form
    public function resetFields()
    {
        $this->lembaga_id = null;
        $this->nama_lembaga = '';
        $this->deskripsi = '';
        $this->file_pdf = null;
        $this->old_pdf = null;
    }
}
