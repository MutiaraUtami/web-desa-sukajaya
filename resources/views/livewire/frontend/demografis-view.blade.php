<div class="container mx-auto px-4 py-10">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-[#0e2206] uppercase tracking-wide">Demografi Penduduk</h1>
        <p class="text-gray-600 mt-2">Data Perkembangan Penduduk Desa Sukajaya</p>
    </div>

    <!-- DASHBOARD GRAFIK COLORFUL MODE -->
    <div class="bg-white p-6 md:p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-gray-100 mb-12 font-sans w-full max-w-5xl mx-auto relative overflow-hidden">
        
        <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-3xl -mr-20 -mt-20 z-0 opacity-60"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-50 rounded-full blur-3xl -ml-20 -mb-20 z-0 opacity-60"></div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b border-gray-100 pb-6 gap-4">
                <h2 class="text-xl md:text-2xl font-extrabold text-[#0e2206] border-l-4 border-yellow-400 pl-3">
                    Grafik Populasi Desa
                </h2>
                
                <div class="flex flex-wrap items-center gap-3 bg-gray-50/80 p-2.5 rounded-xl border border-gray-200">
                    <div class="flex items-center gap-2">
                        <label class="text-sm font-bold text-gray-600">Gender:</label>
                        <select wire:model.live="filterGender" class="bg-white text-gray-800 border border-gray-300 rounded-lg px-3 py-1.5 focus:ring-green-500 focus:border-green-500 font-medium w-36 shadow-sm text-sm">
                            <option value="semua">Semua</option>
                            <option value="lk">Laki-laki</option>
                            <option value="pr">Perempuan</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-sm font-bold text-gray-600">Tahun:</label>
                        <select wire:model.live="filterTahun" class="bg-white text-gray-800 border border-gray-300 rounded-lg px-3 py-1.5 focus:ring-green-500 focus:border-green-500 font-medium w-28 shadow-sm text-sm">
                            @forelse($listTahun as $t)
                                <option value="{{ $t }}">{{ $t }}</option>
                            @empty
                                <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>

            <!-- KUNCI GRAFIK DI SINI: Bungkus dengan wire:ignore -->
            <div wire:ignore>
                <div id="populationChart" class="w-full h-80 mb-8 -ml-2"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-2xl border border-green-200 shadow-sm flex flex-col items-center justify-center transition hover:-translate-y-1">
                    <p class="text-xs font-bold uppercase tracking-wider text-green-800 mb-1">Total Populasi</p>
                    <p class="text-3xl font-extrabold text-green-900">{{ number_format($totalPop, 0, ',', '.') }} <span class="text-sm font-medium">Jiwa</span></p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-2xl border border-blue-200 shadow-sm flex flex-col items-center justify-center transition hover:-translate-y-1">
                    <p class="text-xs font-bold uppercase tracking-wider text-blue-800 mb-1">Rata-rata Bulanan</p>
                    <p class="text-3xl font-extrabold text-blue-900">{{ number_format($avgMonthly, 1, ',', '.') }} <span class="text-sm font-medium">Jiwa</span></p>
                </div>
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-5 rounded-2xl border border-yellow-200 shadow-sm flex flex-col items-center justify-center transition hover:-translate-y-1">
                    <p class="text-xs font-bold uppercase tracking-wider text-yellow-800 mb-1">Bulan Tertinggi</p>
                    <p class="text-3xl font-extrabold text-yellow-900">{{ $peakMonth }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
        @forelse($data as $item)
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h3 class="text-lg font-bold text-[#0e2206] mb-4 uppercase text-center border-b pb-2">
                    {{ date('F', mktime(0,0,0,$item->bulan,1)) }}
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center bg-blue-50 p-2 rounded text-sm">
                        <span class="font-semibold text-blue-800">Laki-laki</span>
                        <span class="font-bold text-blue-600">{{ number_format($item->akhir_lk, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center bg-rose-50 p-2 rounded text-sm">
                        <span class="font-semibold text-rose-800">Perempuan</span>
                        <span class="font-bold text-rose-600">{{ number_format($item->akhir_pr, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center bg-green-50 p-2 rounded border border-green-200 mt-4 text-sm">
                        <span class="font-bold text-green-900">Total Penduduk</span>
                        <span class="font-bold text-green-700 text-base">{{ number_format($item->akhir_jml, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-4 text-center bg-gray-50 p-10 rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500 font-medium">Belum ada data demografi yang dicatat untuk tahun {{ $filterTahun }}.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener('livewire:initialized', () => {
        var options = {
            series: @json($chartData),
            chart: {
                height: 350,
                type: 'line',
                toolbar: { show: false }, 
                background: 'transparent',
                fontFamily: 'inherit'
            },
            theme: { mode: 'light' },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 4 },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                labels: { style: { colors: '#6b7280', fontWeight: 600 } }, 
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: { 
                    style: { colors: '#6b7280', fontWeight: 600 },
                    formatter: function (val) { return Math.round(val); }
                }
            },
            grid: {
                borderColor: '#f3f4f6', 
                strokeDashArray: 4, 
                yaxis: { lines: { show: true } },
                xaxis: { lines: { show: false } }
            },
            legend: { 
                position: 'top', horizontalAlign: 'left',
                labels: { colors: '#374151', fontWeight: 600 },
                markers: { radius: 12 }
            },
            tooltip: {
                theme: 'light',
                y: { formatter: function (val) { return val + " Jiwa" } }
            }
        };

        var chart = new ApexCharts(document.querySelector("#populationChart"), options);
        chart.render();

        // INI YANG BARU
        window.addEventListener('update-chart', (event) => {
            chart.updateSeries(event.detail.series);
        });
    });
</script>