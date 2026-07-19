<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Berita;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Untuk auto generate slug

#[Layout('components.layouts.admin')]
class BeritaManager extends Component
{
    use WithPagination, WithFileUploads;

    public $judul, $gambar, $ringkasan, $isi, $penulis, $tanggal_terbit;
    public $item_id, $gambarLama;
    public $showModal = false;

    protected function rules()
    {
        return [
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048', // Maks 2MB
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:255',
            'tanggal_terbit' => 'nullable|date',
        ];
    }

    public function render()
    {
        $data = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.berita-manager', compact('data'));
    }

    public function create()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetFields();
        $item = Berita::findOrFail($id);
        $this->item_id = $item->id;
        $this->judul = $item->judul;
        $this->ringkasan = $item->ringkasan;
        $this->isi = $item->isi;
        $this->penulis = $item->penulis;
        $this->tanggal_terbit = $item->tanggal_terbit ? date('Y-m-d\TH:i', strtotime($item->tanggal_terbit)) : null;
        $this->gambarLama = $item->gambar;
        
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'judul' => $this->judul,
            // Otomatis bikin slug dari judul, ditambahin ID random sedikit biar unik kalau judulnya sama
            'slug' => Str::slug($this->judul) . '-' . Str::random(5),
            'ringkasan' => $this->ringkasan,
            'isi' => $this->isi,
            'penulis' => $this->penulis,
            'tanggal_terbit' => $this->tanggal_terbit,
        ];

        if ($this->gambar) {
            if ($this->item_id && $this->gambarLama) {
                Storage::disk('public')->delete($this->gambarLama);
            }
            $data['gambar'] = $this->gambar->store('berita', 'public');
        }

        Berita::updateOrCreate(['id' => $this->item_id], $data);
        session()->flash('message', 'Berita berhasil disimpan!');
        $this->closeModal();
    }

    public function delete($id)
    {
        $item = Berita::findOrFail($id);
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }
        $item->delete();
        session()->flash('message', 'Berita berhasil dihapus!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->item_id = null;
        $this->judul = '';
        $this->gambar = null;
        $this->gambarLama = null;
        $this->ringkasan = '';
        $this->isi = '';
        $this->penulis = '';
        $this->tanggal_terbit = null;
        $this->resetErrorBag();
    }
}