<div 
    x-data="{ showTable: false }"
    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5"
>
    <h3 class="text-base font-semibold mb-4 text-gray-900 dark:text-gray-100">
        📊 Layanan per Bulan ({{ now()->year }})
    </h3>

    {{-- Tombol Toggle --}}
    <div class="mb-4">
        <button 
            x-on:click="showTable = !showTable"
            class="px-3 py-2 rounded bg-blue-600 text-white text-sm"
        >
            <span x-show="!showTable">Ubah ke Tabel</span>
            <span x-show="showTable">Ubah ke Grafik</span>
        </button>
    </div>

    {{-- CHART --}}
    <div x-show="!showTable" style="position: relative; height: 320px;">
        <canvas id="monthlyChart"></canvas>
    </div>

    {{-- TABEL --}}
    <div x-show="showTable" class="mt-3">
        <table class="w-full text-left border border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">Bulan</th>
                    <th class="border px-2 py-1">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($this->getData()['labels'] as $i => $bulan)
                    <tr>
                        <td class="border px-2 py-1">{{ $bulan }}</td>
                        <td class="border px-2 py-1">{{ $this->getData()['totals'][$i] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById('monthlyChart')?.getContext('2d');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($this->getData()['labels']),
            datasets: [{
                label: 'Jumlah Berkas Masuk',
                data: @json($this->getData()['totals']),
                backgroundColor: 'rgba(59,130,246,0.8)',
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
});
</script>
@endpush
