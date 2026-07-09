<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Website Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-green-800 text-white">
            <div class="p-4 font-bold text-lg border-b border-green-700">Admin Desa</div>
            <nav class="p-4 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-green-700">Dashboard</a>
                <a href="{{ route('admin.profil') }}" class="block py-2 px-3 rounded hover:bg-green-700">Profil Desa</a>
                <a href="{{ route('admin.statistik') }}" class="block py-2 px-3 rounded hover:bg-green-700">Statistik Penduduk</a>
                <a href="{{ route('admin.organisasi') }}" class="block py-2 px-3 rounded hover:bg-green-700">Struktur Organisasi</a>
                <a href="{{ route('admin.agenda') }}" class="block py-2 px-3 rounded hover:bg-green-700">Agenda</a>
                <a href="{{ route('admin.berita') }}" class="block py-2 px-3 rounded hover:bg-green-700">Berita</a>
                <a href="{{ route('admin.umkm') }}" class="block py-2 px-3 rounded hover:bg-green-700">UMKM</a>
                <a href="{{ route('admin.apbdes') }}" class="block py-2 px-3 rounded hover:bg-green-700">APBDes</a>
                <a href="{{ route('home') }}" class="block py-2 px-3 rounded hover:bg-green-700">Lihat Website</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 px-3 rounded hover:bg-red-700">Logout</button>
                </form>
            </nav>
        </aside>
        <div class="flex-1 p-6">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>
</html>
