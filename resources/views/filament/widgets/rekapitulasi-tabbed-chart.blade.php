{{-- resources/views/filament/widgets/rekapitulasi-tabbed-chart.blade.php --}}
<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold mb-4">Rekapitulasi Pegawai</h2>

        {{-- Tombol Tabs --}}
        <div class="flex gap-2 mb-4">
            <x-filament::button
                :color="$chartType === 'bar' ? 'primary' : 'secondary'"
                wire:click="switchTab('bar')"
            >
                Bar Chart
            </x-filament::button>

            <x-filament::button
                :color="$chartType === 'pie' ? 'primary' : 'secondary'"
                wire:click="switchTab('pie')"
            >
                Pie Chart
            </x-filament::button>
        </div>

        {{-- Chart Canvas --}}
        <canvas
            x-data="{
                chart: null,
                init() {
                    this.renderChart(@js($labels), @js($data), @js($chartType))
                },
                renderChart(labels, data, type) {
                    // Destroy chart lama kalau ada
                    if (this.chart) this.chart.destroy()

                    // Buat chart baru
                    this.chart = new Chart(this.$el.getContext('2d'), {
                        type: type,
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Pegawai',
                                data: data,
                                // Warna setiap slice/bar
                                backgroundColor: [
                                    '#fbbf24', // Amber
                                    '#60a5fa', // Blue
                                    '#34d399', // Green
                                    '#f87171', // Red
                                ],
                                borderWidth: 1,
                                borderColor: '#fff',
                            }],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: { position: 'bottom' },
                            },
                        },
                    })
                }
            }"
            x-init="$watch('chartType', () => renderChart(@js($labels), @js($data), @js($chartType)))"
            class="w-full h-64"
        ></canvas>
    </x-filament::card>
</x-filament::widget>

{{-- Chart.js CDN --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush



