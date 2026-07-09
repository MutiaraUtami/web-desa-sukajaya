<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    // 1. Menampilkan halaman form profil desa
    public function index()
    {
        // Ambil data profil baris pertama. Kalau kosong, bikin instan kosong biar view nggak error
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        
        // Lempar datanya ke file tampilan (view) punya Muti nanti
        // Nama foldernya bebas, misal kita set 'profil.index'
        return view('profil.index', compact('profil'));
    }

    // 2. Memproses dan menyimpan perubahan data
    public function update(Request $request)
    {
        // Validasi inputan form biar sistemnya aman
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'sejarah'   => 'nullable|string',
            'visi'      => 'nullable|string',
            'misi'      => 'nullable|string',
            'geografis' => 'nullable|string',
            // Catatan: Untuk upload gambar 'logo', kita skip dulu validasinya sementara 
            // biar Abang fokus ke teksnya dulu. Upload file ada trik khususnya nanti.
        ]);

        // Cari data pertama di tabel, kalau belum ada sama sekali, bikin baru
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        
        // Masukkan data dari form ke dalam database
        $profil->nama_desa = $request->nama_desa;
        $profil->sejarah   = $request->sejarah;
        $profil->visi      = $request->visi;
        $profil->misi      = $request->misi;
        $profil->geografis = $request->geografis;
        
        $profil->save();

        // Redirect balik ke halaman form dengan pesan sukses
        return back()->with('success', 'Data Profil Desa berhasil diperbarui!');
    }
}