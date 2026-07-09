<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-6">Agenda Desa</h1>
    <div class="space-y-4">
        @forelse ($agendas as $a)
            <div class="bg-white rounded shadow p-4 flex gap-4">
                <div class="text-center bg-green-600 text-white rounded p-3 w-20">
                    <div class="text-xs">{{ $a->tanggal->translatedFormat('M') }}</div>
                    <div class="text-xl font-bold">{{ $a->tanggal->format('d') }}</div>
                </div>
                <div>
                    <h2 class="font-semibold">{{ $a->judul }}</h2>
                    <p class="text-sm text-gray-500">{{ $a->waktu }} @if($a->lokasi) &bull; {{ $a->lokasi }} @endif</p>
                    <p class="text-sm text-gray-600 mt-1">{{ $a->deskripsi }}</p>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada agenda mendatang.</p>
        @endforelse
    </div>
    <div class="mt-6">{{ $agendas->links() }}</div>
</div>
