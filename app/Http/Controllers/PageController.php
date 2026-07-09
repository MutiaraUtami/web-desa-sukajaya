<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Organisasi;
use App\Models\ProfilDesa;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'profil' => ProfilDesa::get(),
            'beritaTerbaru' => Berita::orderByDesc('tanggal_terbit')->take(3)->get(),
        ]);
    }

    public function profil()
    {
        return view('pages.profil', ['profil' => ProfilDesa::get()]);
    }

    public function visiMisi()
    {
        return view('pages.visi-misi', ['profil' => ProfilDesa::get()]);
    }

    public function sejarah()
    {
        return view('pages.sejarah', ['profil' => ProfilDesa::get()]);
    }

    public function geografis()
    {
        return view('pages.geografis', ['profil' => ProfilDesa::get()]);
    }

    public function strukturOrganisasi()
    {
        return view('pages.struktur-organisasi', [
            'organisasi' => Organisasi::orderBy('urutan')->get(),
        ]);
    }

    public function beritaShow($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('pages.berita-show', ['berita' => $berita]);
    }
}
