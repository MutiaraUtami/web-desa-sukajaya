<div class="max-w-5xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold mb-8 text-gray-800 border-b-4 border-[#1e6306] pb-2 inline-block">Agenda Desa Sukajaya</h1>

    @php
        // Logika untuk membuat kalender bulan ini
        $currentDate = \Carbon\Carbon::now();
        $daysInMonth = $currentDate->daysInMonth;
        $firstDayOfMonth = $currentDate->copy()->startOfMonth()->dayOfWeek; // 0 = Minggu, 1 = Senin, dst.

        // Mengelompokkan agenda berdasarkan tanggal (Y-m-d) agar bisa menampilkan judulnya
        $agendaByDate = [];
        foreach($agendas as $a) {
            $dateKey = $a->tanggal->format('Y-m-d');
            if(!isset($agendaByDate[$dateKey])) {
                $agendaByDate[$dateKey] = [];
            }
            $agendaByDate[$dateKey][] = $a; 
        }
    @endphp

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-12">
        
        <div class="bg-[#0e2206] text-white px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-bold uppercase tracking-wider">{{ $currentDate->translatedFormat('F Y') }}</h2>
            <div class="flex items-center gap-2 text-sm font-medium">
                <span class="w-3 h-3 rounded-full bg-[#fac81b] animate-pulse"></span>
                <span>Jadwal Kegiatan</span>
            </div>
        </div>

        <div class="grid grid-cols-7 bg-gray-100 border-b border-gray-200">
            @foreach(['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                <div class="py-3 text-center text-xs font-bold text-gray-600 uppercase">{{ $day }}</div>
            @endforeach
        </div>

        <div class="grid grid-cols-7 gap-px bg-gray-200">
            
            @for ($i = 0; $i < $firstDayOfMonth; $i++)
                <div class="bg-gray-50/50 p-2 h-28 md:h-32"></div>
            @endfor

            @for ($day = 1; $day <= $daysInMonth; $day++)
                @php
                    $dateString = $currentDate->copy()->day($day)->format('Y-m-d');
                    $dayAgendas = $agendaByDate[$dateString] ?? [];
                    $isToday = $dateString === \Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                
                <div class="bg-white p-2 h-28 md:h-32 hover:bg-green-50 transition relative group flex flex-col overflow-hidden">
                    
                    <div class="flex justify-between items-start mb-1">
                        <span class="inline-flex items-center justify-center w-7 h-7 rounded-full text-sm 
                            {{ $isToday ? 'bg-[#1e6306] text-white font-bold shadow' : 'text-gray-700 font-medium group-hover:text-[#1e6306]' }}">
                            {{ $day }}
                        </span>
                    </div>

                    <div class="flex flex-col gap-1 overflow-y-auto no-scrollbar mt-1">
                        @foreach($dayAgendas as $agenda)
                            <div class="text-[10px] md:text-xs leading-tight bg-[#fac81b] text-[#0e2206] font-semibold px-1.5 py-1 rounded truncate shadow-sm" title="{{ $agenda->judul }}">
                                {{ $agenda->judul }}
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            @endfor

            @php
                $totalCells = $firstDayOfMonth + $daysInMonth;
                $remainingCells = $totalCells % 7 == 0 ? 0 : 7 - ($totalCells % 7);
            @endphp
            @for ($i = 0; $i < $remainingCells; $i++)
                <div class="bg-gray-50/50 p-2 h-28 md:h-32"></div>
            @endfor
        </div>
    </div>


    <h3 class="text-xl font-bold mb-5 text-gray-800 flex items-center gap-2">
        <svg class="w-6 h-6 text-[#1e6306]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
        Rincian Agenda
    </h3>
    
    <div class="space-y-4">
        @forelse ($agendas as $a)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-5 flex flex-col sm:flex-row gap-5 hover:shadow-md transition-shadow duration-200">
                
                <div class="text-center bg-gradient-to-b from-[#1e6306] to-[#0e2206] text-white rounded-lg p-3 w-full sm:w-24 shrink-0 flex flex-col justify-center items-center">
                    <div class="text-xs uppercase tracking-widest opacity-90 font-medium">{{ $a->tanggal->translatedFormat('M') }}</div>
                    <div class="text-3xl font-extrabold my-0.5">{{ $a->tanggal->format('d') }}</div>
                    <div class="text-xs opacity-75">{{ $a->tanggal->format('Y') }}</div>
                </div>
                
                <div class="flex-1 py-1 flex flex-col justify-center">
                    <h2 class="font-bold text-lg text-gray-900 leading-tight">{{ $a->judul }}</h2>
                    
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mt-2 mb-3">
                        <span class="flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-[#fac81b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $a->waktu }} WIB
                        </span>
                        @if($a->lokasi)
                            <span class="flex items-center gap-1.5 font-medium">
                                <svg class="w-4 h-4 text-[#fac81b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $a->lokasi }}
                            </span>
                        @endif
                    </div>
                    
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $a->deskripsi }}</p>
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-white rounded-xl border-2 border-dashed border-gray-200">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p class="text-gray-500 font-medium">Belum ada agenda mendatang.</p>
            </div>
        @endforelse
    </div>
    
    <div class="mt-8">{{ $agendas->links() }}</div>
</div>

<style>
/* Menyembunyikan scrollbar agar kalender tetap rapi saat ada banyak agenda di satu hari */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>