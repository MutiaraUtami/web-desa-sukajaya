<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Desa Sukajaya</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-desa.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Faculty+Glyphic&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        /* CSS Variabel untuk konsistensi */
        :root {
            --color-brand-green: #1e6306;
            --color-brand-yellow: #fac81b;
            --color-brand-dark: #0e2206;
            --color-brand-charcoal: #313131;
        }
        .active-link {
            background-color: var(--color-brand-green);
            border-left: 4px solid var(--color-brand-yellow);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-[#0e2206] text-white flex flex-col shadow-xl">
            <div class="p-6 border-b border-white/10">
                <h1 class="text-xl font-bold tracking-tight text-white">
                    <span class="text-[#fac81b]">Admin</span> Sukajaya
                </h1>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                @php
                    $menu = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard'],
                        ['route' => 'admin.profil', 'label' => 'Profil Desa'],
                        ['route' => 'admin.statistik', 'label' => 'Statistik Penduduk'],
                        ['route' => 'admin.organisasi', 'label' => 'Struktur Organisasi'],
                        ['route' => 'admin.agenda', 'label' => 'Agenda'],
                        ['route' => 'admin.berita', 'label' => 'Berita'],
                        ['route' => 'admin.umkm', 'label' => 'UMKM'],
                        ['route' => 'admin.apbdes', 'label' => 'APBDes'],
                    ];
                @endphp

                @foreach($menu as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="block py-2.5 px-4 rounded-lg transition-all duration-200 {{ request()->routeIs($item['route']) ? 'active-link' : 'hover:bg-[#1e6306]/50 hover:pl-6' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="p-4 border-t border-white/10 space-y-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-[#313131] transition">
                    <span class="text-xs">← Lihat Website</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2.5 px-4 rounded-lg bg-[#313131] hover:bg-red-900 transition text-sm font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <header class="bg-white shadow-sm py-4 px-8 mb-6 flex justify-between items-center border-b border-gray-100">
                <h2 class="text-lg font-semibold text-[#0e2206]">Selamat Datang Kembali, Admin</h2>
                <div class="text-sm text-gray-500">{{ now()->format('d F Y') }}</div>
            </header>
            
            <div class="px-8 pb-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
</body>
</html>