<div class="max-w-7xl mx-auto px-4 py-12" 
    x-data="{
        chartData: @entangle('chartData'),
        chart: null,
        init() {
            this.renderChart();
            // Setiap kali filter diubah, Livewire akan mengupdate chartData,
            // Alpine akan mendeteksi perubahannya dan menggambar ulang grafiknya.
            this.$watch('chartData', () => {
                this.renderChart();
            });
        },
        renderChart() {
            if (this.chart) this.chart.destroy(); // Hancurkan chart lama
            const ctx = document.getElementById('demografiChart').getContext('2d');
            this.chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // Gunakan dusun_rw (Atau ditambah tahun jika RW difilter)
                    labels: this.chartData.labels,
                    datasets: [
                        { label: 'Laki-laki', data: this.chartData.laki_laki, backgroundColor: '#3b82f6', borderRadius: 4 },
                        { label: 'Perempuan', data: this.chartData.perempuan, backgroundColor: '#ec4899', borderRadius: 4 },
                        // Kategori usia (di-hidden secara default agar tidak terlalu ramai, bisa diklik di legenda untuk menampilkannya)
                        { label: 'Usia 0-14', data: this.chartData.usia_0_14, backgroundColor: '#f59e0b', borderRadius: 4, hidden: true },
                        { label: 'Usia 15-64', data: this.chartData.usia_15_64, backgroundColor: '#10b981', borderRadius: 4, hidden: true },
                        { label: 'Usia 65+', data: this.chartData.usia_65_keatas, backgroundColor: '#6366f1', borderRadius: 4, hidden: true }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'top' } }
                }
            });
        }
    }">

    <div class="bg-white rounded-3xl shadow-sm border border-zinc-200 overflow-hidden mb-8">
        
        <div class="p-6 border-b border-zinc-100 flex flex-col md:flex-row items-center justify-between bg-zinc-50/50 gap-4">
            <h3 class="text-xl font-extrabold text-[#1e6306] flex items-center gap-2">
                📊 Statistik & Demografi Penduduk
            </h3>
            
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <select wire:model.live="filterTahun" class="border border-zinc-300 rounded-lg px-4 py-2 text-sm text-zinc-700 bg-white focus:ring-[#1e6306] focus:border-[#1e6306]">
                    <option value="">Semua Tahun</option>
                    @foreach ($availableTahun as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>

                <select wire:model.live="filterRw" class="border border-zinc-300 rounded-lg px-4 py-2 text-sm text-zinc-700 bg-white focus:ring-[#1e6306] focus:border-[#1e6306]">
                    <option value="">Semua Dusun/RW</option>
                    @foreach ($availableRw as $rw)
                        <option value="{{ $rw }}">{{ $rw }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="p-6 border-b border-zinc-100 bg-white" wire:ignore>
            <div class="relative w-full h-[300px] md:h-[400px]">
                <canvas id="demografiChart"></canvas>
            </div>
        </div>

        <div class="overflow-x-auto p-4 md:p-6">
            <table class="w-full text-left text-sm text-gray-600 rounded-2xl overflow-hidden shadow-sm border border-zinc-100 whitespace-nowrap">
                <thead class="bg-[#1e6306] text-white">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-center">Tahun</th>
                        <th class="px-6 py-4 font-semibold">Dusun / RW</th>
                        <th class="px-6 py-4 font-semibold text-center">Jml KK</th>
                        <th class="px-6 py-4 font-semibold text-center">Laki-laki</th>
                        <th class="px-6 py-4 font-semibold text-center">Perempuan</th>
                        <th class="px-6 py-4 font-semibold text-center bg-[#fac81b] text-[#0e2206]">Total Jiwa</th>
                        <th class="px-6 py-4 font-semibold text-center">0-14 Thn</th>
                        <th class="px-6 py-4 font-semibold text-center">15-64 Thn</th>
                        <th class="px-6 py-4 font-semibold text-center">65+ Thn</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @forelse ($statistik as $s)
                    <tr class="hover:bg-green-50/50 transition duration-200 bg-white">
                        <td class="px-6 py-4 text-center font-bold text-gray-500">{{ $s->tahun }}</td>
                        <td class="px-6 py-4 font-bold text-gray-800">{{ $s->dusun_rw }}</td>
                        <td class="px-6 py-4 text-center">{{ number_format($s->jumlah_kk, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center text-blue-600 font-medium">{{ number_format($s->laki_laki, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center text-pink-500 font-medium">{{ number_format($s->perempuan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center font-extrabold text-[#1e6306] bg-green-50/30">
                            {{ number_format($s->total_jiwa, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-center text-zinc-500">{{ number_format($s->usia_0_14, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center text-zinc-500">{{ number_format($s->usia_15_64, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center text-zinc-500">{{ number_format($s->usia_65_keatas, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-8 text-center text-gray-500">Data statistik tidak ditemukan untuk filter ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>