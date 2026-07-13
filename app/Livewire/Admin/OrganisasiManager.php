<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Organisasi;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.admin')]
class OrganisasiManager extends Component
{
    use WithPagination, WithFileUploads;

    public $nama, $jabatan, $urutan, $foto;
    public $item_id, $fotoLama;
    public $showModal = false;

    // Aturan validasi form
    protected function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'nullable|integer',
            'foto' => 'nullable|image|max:2048', // Maksimal 2MB
        ];
    }

    public function render()
    {
        // Menampilkan data urut berdasarkan kolom 'urutan'
        $data = Organisasi::orderBy('urutan', 'asc')->paginate(9);
        return view('livewire.admin.organisasi-manager', compact('data'));
    }

    // Fungsi dipanggil saat tombol "+ Tambah" diklik
    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    // Fungsi dipanggil saat tombol "Edit" diklik
    public function edit($id)
    {
        $this->resetFields();
        
        $item = Organisasi::findOrFail($id);
        $this->item_id = $item->id;
        $this->nama = $item->nama;
        $this->jabatan = $item->jabatan;
        $this->urutan = $item->urutan;
        $this->fotoLama = $item->foto;
        
        $this->showModal = true;
    }

    // Fungsi untuk menyimpan data (Tambah baru / Update)
    public function save()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'urutan' => $this->urutan ?? 0,
        ];

        // Logika jika ada upload foto baru
        if ($this->foto) {
            // Hapus foto lama jika ada
            if ($this->item_id && $this->fotoLama) {
                Storage::disk('public')->delete($this->fotoLama);
            }
            // Simpan foto baru ke folder 'organisasi' di public storage
            $data['foto'] = $this->foto->store('organisasi', 'public');
        }

        Organisasi::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', $this->item_id ? 'Data berhasil diupdate!' : 'Data berhasil ditambahkan!');
        
        $this->closeModal();
    }

    // Fungsi dipanggil saat tombol "Hapus" diklik
    public function delete($id)
    {
        $item = Organisasi::findOrFail($id);
        
        // Hapus file foto fisik sebelum menghapus data dari database
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }
        
        $item->delete();
        session()->flash('message', 'Data berhasil dihapus!');
    }

    // Fungsi untuk menutup modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    // Membersihkan variabel form
    public function resetFields()
    {
        $this->item_id = null;
        $this->nama = '';
        $this->jabatan = '';
        $this->urutan = null;
        $this->foto = null;
        $this->fotoLama = null;
        
        $this->resetErrorBag();
    }
}