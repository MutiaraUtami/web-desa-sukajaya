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
</head>
<body class="bg-gray-50 text-gray-800 font-['Plus_Jakarta_Sans']">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-[#0e2206] text-white flex flex-col shadow-xl">
            <div class="p-6 border-b border-white/10">
                <h1 class="text-xl font-bold tracking-tight text-white">
                    <span class="text-[#fac81b]">Admin</span> Sukajaya
                </h1>
            </div>

           <nav class="flex-1 p-4 space-y-1.5 text-sm font-medium">
                @php
                    $menu = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard'],
                        ['route' => 'admin.profil', 'label' => 'Profil Desa'],
                        ['route' => 'admin.statistik', 'label' => 'Statistik Penduduk'],
                        ['route' => 'admin.informasi-demografi', 'label' => 'Info Demografi'],
                        ['route' => 'admin.organisasi', 'label' => 'Struktur Organisasi'],
                        ['route' => 'admin.agenda', 'label' => 'Agenda'],
                        ['route' => 'admin.berita', 'label' => 'Berita'],
                        ['route' => 'admin.umkm', 'label' => 'UMKM'],
                        ['route' => 'admin.apbdes', 'label' => 'APBDes'],
                    ];
                @endphp

                @foreach($menu as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="block py-3 px-4 transition-all duration-200 border-l-4 
                       {{ request()->routeIs($item['route']) 
                            ? '!bg-[#1e6306] !border-[#fac81b] rounded-r-lg font-bold text-white shadow-md' 
                            : '!bg-transparent !border-transparent rounded-lg hover:!bg-[#1e6306]/60 hover:pl-6 text-gray-200 hover:text-white' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="p-4 border-t border-white/10 space-y-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-300 hover:text-white hover:bg-[#313131] transition">
                    <span class="text-xs">← Lihat Website</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2.5 px-4 rounded-lg bg-[#313131] hover:bg-red-900 transition text-sm font-medium text-white">
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