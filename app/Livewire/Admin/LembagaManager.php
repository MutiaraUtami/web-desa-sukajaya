<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\LembagaDesa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class LembagaManager extends Component
{
    use WithPagination, WithFileUploads;

    public $lembaga_id, $nama_lembaga, $deskripsi, $file_pdf, $old_pdf;
    public $isModalOpen = false;

    public function render()
    {
        // Kodingan ini otomatis nyari view di resources/views/livewire/admin/
        $organisasi = LembagaDesa::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.lembaga-manager', compact('organisasi'));
    }

    public function create()
    {
        $this->resetFields();
        $this->isModalOpen = true;
    }

    public function resetFields()
    {
        $this->reset(['lembaga_id', 'nama_lembaga', 'deskripsi', 'file_pdf', 'old_pdf']);
    }

    public function store()
    {
        $this->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_pdf' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $filePath = $this->old_pdf;

        if ($this->file_pdf) {
            if ($this->old_pdf) Storage::disk('public')->delete($this->old_pdf);
            $filePath = $this->file_pdf->store('lembaga-desa', 'public');
        }

        LembagaDesa::updateOrCreate(['id' => $this->lembaga_id], [
            'nama_lembaga' => $this->nama_lembaga,
            'slug' => Str::slug($this->nama_lembaga),
            'deskripsi' => $this->deskripsi,
            'file_pdf' => $filePath,
        ]);

        session()->flash('message', $this->lembaga_id ? 'Lembaga diperbarui!' : 'Lembaga ditambahkan!');
        $this->isModalOpen = false;
        $this->resetFields();
    }

    public function edit($id)
    {
        $lembaga = LembagaDesa::findOrFail($id);
        $this->lembaga_id = $id;
        $this->nama_lembaga = $lembaga->nama_lembaga;
        $this->deskripsi = $lembaga->deskripsi;
        $this->old_pdf = $lembaga->file_pdf;
        $this->isModalOpen = true;
    }

    public function delete($id)
    {
        $lembaga = LembagaDesa::findOrFail($id);
        if ($lembaga->file_pdf) Storage::disk('public')->delete($lembaga->file_pdf);
        $lembaga->delete();
        session()->flash('message', 'Lembaga dihapus!');
    }
}