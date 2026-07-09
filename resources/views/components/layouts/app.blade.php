<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Website Desa' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-green-700 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-bold text-lg">🏡 Website Desa</a>
            <button class="md:hidden" onclick="document.getElementById('menu').classList.toggle('hidden')">☰</button>
            <div id="menu" class="hidden md:flex gap-4 text-sm flex-wrap">
                <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                <a href="{{ route('profil') }}" class="hover:underline">Profil</a>
                <a href="{{ route('visi-misi') }}" class="hover:underline">Visi &amp; Misi</a>
                <a href="{{ route('sejarah') }}" class="hover:underline">Sejarah</a>
                <a href="{{ route('geografis') }}" class="hover:underline">Geografis</a>
                <a href="{{ route('demografis') }}" class="hover:underline">Demografis</a>
                <a href="{{ route('struktur-organisasi') }}" class="hover:underline">Struktur Organisasi</a>
                <a href="{{ route('agenda') }}" class="hover:underline">Agenda</a>
                <a href="{{ route('berita') }}" class="hover:underline">Berita</a>
                <a href="{{ route('umkm') }}" class="hover:underline">UMKM</a>
                <a href="{{ route('apbdes') }}" class="hover:underline">APBDes</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline font-semibold">Dashboard Admin</a>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-gray-300 text-center py-6 mt-10 text-sm">
        &copy; {{ date('Y') }} Pemerintah Desa. Seluruh hak cipta dilindungi.
    </footer>

    @livewireScripts
</body>
</html>
