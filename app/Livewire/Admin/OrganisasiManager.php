<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Organisasi;
use App\Models\OrganizationChart; // Tambahan Model Bagan
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.admin')]
class OrganisasiManager extends Component
{
    use WithPagination, WithFileUploads;

    // --- VARIABEL UNTUK ANGGOTA ORGANISASI ---
    public $nama, $jabatan, $urutan, $foto;
    public $item_id, $fotoLama;
    public $showModal = false;

    // --- VARIABEL UNTUK BAGAN STRUKTUR ---
    public $fileBagan, $baganLama, $baganId;
    public $showModalBagan = false;

    // Aturan validasi form anggota
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
        // Ambil data anggota
        $data = Organisasi::orderBy('urutan', 'asc')->paginate(9);
        // Ambil data bagan (cukup ambil data pertama karena bagan cuma 1)
        $bagan = OrganizationChart::first(); 
        
        return view('livewire.admin.organisasi-manager', compact('data', 'bagan'));
    }

    /* =======================================================
       LOGIKA CRUD BAGAN STRUKTUR (BARU)
       ======================================================= */
    
    public function openModalBagan()
    {
        $bagan = OrganizationChart::first();
        if ($bagan) {
            $this->baganId = $bagan->id;
            // Disesuaikan dengan nama kolom Muti: 'gambar'
            $this->baganLama = $bagan->gambar; 
        } else {
            $this->baganId = null;
            $this->baganLama = null;
        }
        $this->fileBagan = null;
        $this->resetErrorBag();
        $this->showModalBagan = true;
    }

    public function closeModalBagan()
    {
        $this->showModalBagan = false;
        $this->fileBagan = null;
    }

    public function saveBagan()
    {
        $this->validate([
            // Support upload gambar dan PDF, maksimal 5MB
            'fileBagan' => 'required|mimes:jpg,jpeg,png,pdf|max:5120', 
        ]);

        $path = $this->baganLama;

        if ($this->fileBagan) {
            if ($this->baganLama) {
                Storage::disk('public')->delete($this->baganLama);
            }
            $path = $this->fileBagan->store('bagan-struktur', 'public');
        }

        OrganizationChart::updateOrCreate(
            ['id' => $this->baganId],
            ['gambar' => $path] // Disesuaikan dengan nama kolom Muti
        );

        session()->flash('message', 'Bagan Struktur berhasil disimpan!');
        $this->closeModalBagan();
    }

    public function deleteBagan($id)
    {
        $bagan = OrganizationChart::find($id);
        if ($bagan) {
            if ($bagan->gambar) { // Disesuaikan dengan nama kolom Muti
                Storage::disk('public')->delete($bagan->gambar);
            }
            $bagan->delete();
            session()->flash('message', 'Bagan Struktur berhasil dihapus!');
        }
    }

    /* =======================================================
       LOGIKA CRUD ANGGOTA ORGANISASI (LAMA/ASLI)
       ======================================================= */

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

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

    public function save()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'urutan' => $this->urutan ?? 0,
        ];

        if ($this->foto) {
            if ($this->item_id && $this->fotoLama) {
                Storage::disk('public')->delete($this->fotoLama);
            }
            $data['foto'] = $this->foto->store('organisasi', 'public');
        }

        Organisasi::updateOrCreate(['id' => $this->item_id], $data);

        session()->flash('message', $this->item_id ? 'Data berhasil diupdate!' : 'Data berhasil ditambahkan!');
        $this->closeModal();
    }

    public function delete($id)
    {
        $item = Organisasi::findOrFail($id);
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }
        $item->delete();
        session()->flash('message', 'Data berhasil dihapus!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

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