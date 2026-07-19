<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
// Sesuaikan nama model di bawah dengan yang abang punya:
use App\Models\OrganizationChart;
use App\Models\AparaturDesa;

class OrganisasiManager extends Component
{
    use WithFileUploads;

    // == STATE UNTUK BAGAN ==
    public $file_bagan;
    public $bagan_aktif; // Untuk nampilin bagan yang udah ada

    // == STATE UNTUK APARATUR ==
    public $aparatur_id, $nama, $role, $foto, $foto_lama;
    public $isModalAparaturOpen = false;

    public function mount()
    {
        // Ambil data bagan pertama saat halaman dimuat
        $bagan = OrganizationChart::first();
        if ($bagan) {
           $this->bagan_aktif = $bagan->gambar; // Sesuaikan nama kolom di database
        }
    }

    public function render()
    {
        // Ambil data aparatur
        $aparatur = AparaturDesa::orderBy('created_at', 'desc')->get();

        return view('livewire.admin.organisasi-manager', [
            'daftar_aparatur' => $aparatur
        ])->layout('layouts.admin'); // Pastikan layout admin
    }

    // --- CRUD 1: UPLOAD BAGAN ---
    public function uploadBagan()
    {
        $this->validate([
            'file_bagan' => 'required|image|max:2048', // Maks 2MB, harus gambar
        ]);

        $path = $this->file_bagan->store('struktur/bagan', 'public');

        // Hapus bagan lama dari storage jika ada
        if ($this->bagan_aktif) {
            Storage::disk('public')->delete($this->bagan_aktif);
        }

        // Simpan ke DB (Asumsi cuma butuh 1 baris data bagan)
        $bagan = OrganizationChart::first();
        if ($bagan) {
          $bagan->update(['gambar' => $path]);
        } else {
            OrganizationChart::create(['gambar' => $path]);
        }

        $this->bagan_aktif = $path;
        $this->file_bagan = null;
        session()->flash('message_bagan', 'Bagan struktur berhasil diperbarui!');
    }

    // --- CRUD 2: KELOLA APARATUR ---
    public function openModalAparatur($id = null)
    {
        $this->resetAparatur();
        if ($id) {
            $data = AparaturDesa::find($id);
            $this->aparatur_id = $data->id;
            $this->nama = $data->nama;
            $this->role = $data->role;
            $this->foto_lama = $data->foto;
        }
        $this->isModalAparaturOpen = true;
    }

    public function simpanAparatur()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048', // Foto opsional pas edit
        ]);

        $pathFoto = $this->foto_lama;
        if ($this->foto) {
            if ($this->foto_lama) {
                Storage::disk('public')->delete($this->foto_lama);
            }
            $pathFoto = $this->foto->store('struktur/aparatur', 'public');
        }

        AparaturDesa::updateOrCreate(
            ['id' => $this->aparatur_id],
            [
                'nama' => $this->nama,
                'role' => $this->role,
                'foto' => $pathFoto,
            ]
        );

        $this->isModalAparaturOpen = false;
        $this->resetAparatur();
        session()->flash('message_aparatur', 'Data Aparatur berhasil disimpan!');
    }

    public function hapusAparatur($id)
    {
        $data = AparaturDesa::find($id);
        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }
        $data->delete();
        session()->flash('message_aparatur', 'Data Aparatur berhasil dihapus!');
    }

    public function resetAparatur()
    {
        $this->aparatur_id = null;
        $this->nama = '';
        $this->role = '';
        $this->foto = null;
        $this->foto_lama = null;
    }
}
