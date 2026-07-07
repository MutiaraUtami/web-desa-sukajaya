<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-700 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow p-8 w-full max-w-sm">
        <h1 class="text-xl font-bold mb-6 text-center">Login Admin Desa</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2" required autofocus>
            </div>
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>
            <button type="submit" class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800">Masuk</button>
        </form>
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:underline">&larr; Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
