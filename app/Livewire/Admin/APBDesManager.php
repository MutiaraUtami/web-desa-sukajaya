<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Apbdes;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.admin')]
class ApbdesManager extends Component
{
    use WithPagination, WithFileUploads;

    public $tahun_anggaran, $file_pdf, $pdfLama, $item_id;
    public $showModal = false;

    // Aturan Validasi
    protected function rules()
    {
        return [
            // Tambahkan rule 'unique' ke tabel apbdes, tapi abaikan jika sedang mode Edit ($this->item_id)
            'tahun_anggaran' => 'required|string|max:4|unique:apbdes,tahun_anggaran,' . $this->item_id,
            'file_pdf' => 'nullable|mimes:pdf|max:10240', // Maksimal 10MB
        ];
    }

    // Pesan Error Kustom yang lebih ramah buat Admin
    protected function messages()
    {
        return [
            'tahun_anggaran.unique' => 'Dokumen APBDes untuk tahun ini sudah ada! Silakan edit data yang sudah ada.',
            'tahun_anggaran.required' => 'Tahun anggaran wajib diisi.',
            'file_pdf.mimes' => 'File dokumen wajib berformat PDF.',
            'file_pdf.max' => 'Ukuran file PDF maksimal 10MB.',
        ];
    }

    public function render()
    {
        $data = Apbdes::orderBy('tahun_anggaran', 'desc')->paginate(10);
        return view('livewire.admin.apbdes-manager', compact('data'));
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetFields();
        $item = Apbdes::findOrFail($id);
        $this->item_id = $item->id;
        $this->tahun_anggaran = $item->tahun_anggaran;
        $this->pdfLama = $item->file_pdf;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = ['tahun_anggaran' => $this->tahun_anggaran];

        if ($this->file_pdf) {
            // Hapus file lama kalau lagi edit
            if ($this->item_id && $this->pdfLama) {
                Storage::disk('public')->delete($this->pdfLama);
            }
            $data['file_pdf'] = $this->file_pdf->store('apbdes', 'public');
        } elseif (!$this->item_id) {
            $this->addError('file_pdf', 'Dokumen PDF wajib diunggah!');
            return;
        }

        Apbdes::updateOrCreate(['id' => $this->item_id], $data);
        session()->flash('message', 'Dokumen APBDes berhasil disimpan!');
        $this->closeModal();
    }

    public function delete($id)
    {
        $item = Apbdes::findOrFail($id);
        if ($item->file_pdf) {
            Storage::disk('public')->delete($item->file_pdf);
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
        $this->tahun_anggaran = '';
        $this->file_pdf = null;
        $this->pdfLama = null;
        $this->resetErrorBag();
    }
}