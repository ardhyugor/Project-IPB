<div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">
    <h3 class="text-base font-semibold mb-4 text-gray-900 dark:text-gray-100">
        📊 Layanan per Bulan ({{ now()->year }})
    </h3>

    <div style="position: relative; height: 320px;">
        <canvas id="monthlyChart"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("livewire:navigated", () => {
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

