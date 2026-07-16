<div class="max-w-7xl mx-auto px-4 py-10">
    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Demografis & Statistik Penduduk</h1>
        <p class="text-gray-500 mt-2">Informasi kependudukan desa berdasarkan data riil dari sistem.</p>
    </div>

    <!-- ================== BLOK DIAGRAM DINAMIS ================== -->
    <div class="bg-white rounded-3xl shadow-sm border border-zinc-200 p-6 mb-8">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-xl font-bold text-gray-800">Visualisasi Pertumbuhan Penduduk</h2>
            
            <!-- Dropdown Filter RW -->
            <select wire:model.live="filterRw" class="border border-zinc-300 rounded-lg p-2 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-50 cursor-pointer">
                <option value="Semua">Tampilkan Semua RW</option>
                @if(isset($listRw))
                    @foreach($listRw as $rw)
                        <option value="{{ $rw }}">{{ $rw }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <!-- Canvas Grafik dibungkus wire:ignore biar aman dari Livewire reload -->
        <div wire:ignore>
            <div class="relative w-full h-[350px]">
                <canvas id="pendudukChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>


    <!-- ================== BLOK TABEL STATISTIK ================== -->
    @php
        $total_kk = $statistik->sum('jumlah_kk');
        $total_lk = $statistik->sum('laki_laki');
        $total_pr = $statistik->sum('perempuan');
        $total_0_14 = $statistik->sum('usia_0_14');
        $total_15_64 = $statistik->sum('usia_15_64');
        $total_65 = $statistik->sum('usia_65_keatas');
        $total_semua = $total_lk + $total_pr;
    @endphp

    <div class="bg-white rounded-3xl shadow-sm border border-zinc-200 overflow-hidden mb-8">
        <div class="p-6 border-b border-zinc-100 flex flex-col sm:flex-row items-start sm:items-center justify-between bg-zinc-50/50 gap-4">
            <h3 class="text-xl font-extrabold text-[#1e6306] flex items-center gap-2">
                📊 Rincian Data Penduduk
            </h3>
            <span class="text-xs font-bold bg-[#fac81b] text-[#0e2206] px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm">
                {{ $filterRw === 'Semua' ? 'Keseluruhan RW' : 'Filter: ' . $filterRw }}
            </span>
        </div>

        <div class="overflow-x-auto p-4 md:p-6">
            <table class="w-full text-left text-sm text-zinc-600 rounded-2xl overflow-hidden shadow-sm border border-zinc-100 whitespace-nowrap">
                <thead class="bg-[#1e6306] text-white">
                    <tr>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Tahun</th>
                        <th class="px-4 py-4 font-semibold tracking-wide">Dusun/RW</th>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Jml KK</th>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Laki-laki</th>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Perempuan</th>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Usia 0-14</th>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Usia 15-64</th>
                        <th class="px-4 py-4 font-semibold tracking-wide text-center">Usia 65+</th>
                        <th class="px-4 py-4 font-bold text-[#fac81b] tracking-wide text-center">Total Jiwa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse ($statistik as $s)
                    <tr class="hover:bg-green-50/50 transition duration-200 bg-white">
                        <td class="px-4 py-4 font-bold text-zinc-800 text-center">{{ $s->tahun }}</td>
                        <td class="px-4 py-4 font-bold text-zinc-800">{{ $s->dusun_rw ?? 'Semua' }}</td>
                        <td class="px-4 py-4 text-center">{{ number_format($s->jumlah_kk, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center text-blue-600 font-medium">{{ number_format($s->laki_laki, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center text-pink-500 font-medium">{{ number_format($s->perempuan, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center text-zinc-500">{{ number_format($s->usia_0_14, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center text-zinc-500">{{ number_format($s->usia_15_64, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center text-zinc-500">{{ number_format($s->usia_65_keatas, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-extrabold text-[#1e6306] bg-green-50/30">
                            {{ number_format(($s->laki_laki + $s->perempuan), 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-8 text-center text-zinc-400 font-medium">Belum ada data statistik kependudukan. Silakan tambahkan melalui menu Admin.</td>
                    </tr>
                    @endforelse

                    @if($statistik->count() > 0)
                    <tr class="bg-zinc-50 border-t-2 border-[#1e6306]">
                        <td colspan="2" class="px-4 py-4 font-extrabold text-zinc-900 uppercase text-right">Total Akumulasi:</td>
                        <td class="px-4 py-4 text-center font-bold text-zinc-900">{{ number_format($total_kk, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-bold text-blue-700">{{ number_format($total_lk, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-bold text-pink-600">{{ number_format($total_pr, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-bold text-zinc-600">{{ number_format($total_0_14, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-bold text-zinc-600">{{ number_format($total_15_64, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-bold text-zinc-600">{{ number_format($total_65, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-center font-black text-[#1e6306] bg-[#fac81b]/20">
                            {{ number_format($total_semua, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- ================== SCRIPT JAVASCRIPT & CHART ================== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            const ctx = document.getElementById('pendudukChart').getContext('2d');
            
            // Ambil data pertama kali saat halaman dimuat
            let initialData = @json($chartData);
            
            // Render Chart
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: initialData.labels,
                    datasets: [
                        {
                            label: 'Laki-laki',
                            backgroundColor: '#3b82f6',
                            borderRadius: 4,
                            data: initialData.laki_laki
                        },
                        {
                            label: 'Perempuan',
                            backgroundColor: '#ec4899',
                            borderRadius: 4,
                            data: initialData.perempuan
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top', labels: { usePointStyle: true, padding: 20, font: { weight: 'bold' } } }
                    },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // Mendengarkan Sinyal 'update-chart' dari Backend Livewire
            Livewire.on('update-chart', (event) => {
                // Ekstrak data dari Event Livewire 3
                let data = event[0].chartData || event.chartData;
                
                if (data) {
                    // Masukkan data baru dan paksa update
                    myChart.data.labels = data.labels;
                    myChart.data.datasets[0].data = data.laki_laki;
                    myChart.data.datasets[1].data = data.perempuan;
                    myChart.update();
                }
            });
        });
    </script>
</div>