@php
    // Data Demografi hasil rekapitulasi Registrasi Penduduk (Juni 2026)
    $statistik = collect([
        (object) ['dusun_rw' => 'RW 01', 'jumlah_kk' => 151, 'laki_laki' => 193, 'perempuan' => 210, 'total_jiwa' => 403],
        (object) ['dusun_rw' => 'RW 02', 'jumlah_kk' => 276, 'laki_laki' => 468, 'perempuan' => 465, 'total_jiwa' => 933],
        (object) ['dusun_rw' => 'RW 03', 'jumlah_kk' => 274, 'laki_laki' => 465, 'perempuan' => 486, 'total_jiwa' => 951],
        (object) ['dusun_rw' => 'RW 04', 'jumlah_kk' => 338, 'laki_laki' => 536, 'perempuan' => 594, 'total_jiwa' => 1130],
        (object) ['dusun_rw' => 'RW 05', 'jumlah_kk' => 204, 'laki_laki' => 301, 'perempuan' => 303, 'total_jiwa' => 604],
        (object) ['dusun_rw' => 'RW 06', 'jumlah_kk' => 235, 'laki_laki' => 372, 'perempuan' => 360, 'total_jiwa' => 732],
    ]);

    $total_kk = $statistik->sum('jumlah_kk');
    $total_lk = $statistik->sum('laki_laki');
    $total_pr = $statistik->sum('perempuan');
    $total_semua = $statistik->sum('total_jiwa');
@endphp

<div class="bg-white rounded-3xl shadow-sm border border-zinc-200 overflow-hidden mb-8">
    
    <div class="p-6 border-b border-zinc-100 flex flex-col sm:flex-row items-start sm:items-center justify-between bg-zinc-50/50 gap-4">
        <h3 class="text-xl font-extrabold text-[#1e6306] flex items-center gap-2">
            📊 Statistik Penduduk Desa Sukajaya
        </h3>
        <span class="text-xs font-bold bg-[#fac81b] text-[#0e2206] px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm">
            Data Per Juni 2026
        </span>
    </div>

    <div class="p-6 border-b border-zinc-100 bg-white">
        <div class="relative w-full h-[300px] md:h-[400px]">
            <canvas id="demografiChart"></canvas>
        </div>
    </div>

    <div class="overflow-x-auto p-4 md:p-6">
        <table class="w-full text-left text-sm text-zinc-600 rounded-2xl overflow-hidden shadow-sm border border-zinc-100">
            <thead class="bg-[#1e6306] text-white">
                <tr>
                    <th class="px-6 py-4 font-semibold tracking-wide">RW / Dusun</th>
                    <th class="px-6 py-4 font-semibold tracking-wide text-center">Jumlah KK</th>
                    <th class="px-6 py-4 font-semibold tracking-wide text-center">Laki-laki</th>
                    <th class="px-6 py-4 font-semibold tracking-wide text-center">Perempuan</th>
                    <th class="px-6 py-4 font-bold text-[#fac81b] tracking-wide text-center">Total Jiwa</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100">
                @foreach ($statistik as $s)
                <tr class="hover:bg-green-50/50 transition duration-200 bg-white">
                    <td class="px-6 py-4 font-bold text-zinc-800">{{ $s->dusun_rw }}</td>
                    <td class="px-6 py-4 text-center">{{ number_format($s->jumlah_kk, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center text-blue-600 font-medium">{{ number_format($s->laki_laki, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center text-pink-500 font-medium">{{ number_format($s->perempuan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center font-extrabold text-[#1e6306] bg-green-50/30">
                        {{ number_format($s->total_jiwa, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
                <tr class="bg-zinc-50 border-t-2 border-[#1e6306]">
                    <td class="px-6 py-4 font-extrabold text-zinc-900 uppercase">Total Keseluruhan</td>
                    <td class="px-6 py-4 text-center font-bold text-zinc-900">{{ number_format($total_kk, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center font-bold text-blue-700">{{ number_format($total_lk, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center font-bold text-pink-600">{{ number_format($total_pr, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center font-black text-[#1e6306] bg-[#fac81b]/20">
                        {{ number_format($total_semua, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('demografiChart').getContext('2d');
        
        // Menarik data dari collection PHP ke JavaScript
        const labels = {!! json_encode($statistik->pluck('dusun_rw')) !!};
        const dataLaki = {!! json_encode($statistik->pluck('laki_laki')) !!};
        const dataPerempuan = {!! json_encode($statistik->pluck('perempuan')) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Laki-laki',
                        data: dataLaki,
                        backgroundColor: '#3b82f6', 
                        borderRadius: 6,
                        borderSkipped: false,
                    },
                    {
                        label: 'Perempuan',
                        data: dataPerempuan,
                        backgroundColor: '#ec4899', 
                        borderRadius: 6,
                        borderSkipped: false,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: { family: "'Inter', sans-serif", weight: 'bold' }
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleFont: { size: 14 },
                        bodyFont: { size: 13 },
                        padding: 12,
                    }
                },
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    });
</script>