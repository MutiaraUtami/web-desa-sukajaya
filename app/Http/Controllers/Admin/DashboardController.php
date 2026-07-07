<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Organisasi;
use App\Models\Umkm;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin-dashboard', [
            'totalBerita' => Berita::count(),
            'totalAgenda' => Agenda::count(),
            'totalUmkm' => Umkm::count(),
            'totalOrganisasi' => Organisasi::count(),
        ]);
    }
}
