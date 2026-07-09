<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test CRUD Profil Desa</title>
</head>
<body style="padding: 20px; font-family: sans-serif;">

    <h2>Form Edit Profil Desa (Dummy Backend)</h2>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profil-desa.update') }}" method="POST">
        @csrf <div style="margin-bottom: 15px;">
            <label>Nama Desa:</label><br>
            <input type="text" name="nama_desa" value="{{ $profil->nama_desa }}" style="width: 300px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Sejarah:</label><br>
            <textarea name="sejarah" rows="4" style="width: 300px;">{{ $profil->sejarah }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Visi:</label><br>
            <textarea name="visi" rows="4" style="width: 300px;">{{ $profil->visi }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Misi:</label><br>
            <textarea name="misi" rows="4" style="width: 300px;">{{ $profil->misi }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Kondisi Geografis:</label><br>
            <textarea name="geografis" rows="4" style="width: 300px;">{{ $profil->geografis }}</textarea>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Simpan Data
        </button>
    </form>

</body>
</html>