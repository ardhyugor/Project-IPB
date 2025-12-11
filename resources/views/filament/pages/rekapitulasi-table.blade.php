<x-filament-panels::page>
    {{-- (Bagian HTML/PHP di atas ini tidak diubah) --}}
    {{-- ... (Filter Section, Statistik Cards, dan Struktur Tabel) ... --}}

    {{-- Container untuk data mentah JS dan Logika JavaScript --}}
    @push('scripts')
    <script>
        // Data mentah dari PHP untuk JavaScript
        const allData = @json($allLayananData->toArray());
        
        const monthNamesFull = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        
        function exportPdfWithFilter() {
            // ... (fungsi exportPdfWithFilter tidak diubah)
            const selectedYear = document.getElementById('filterYear').value;
            const selectedMonth = document.getElementById('filterMonth').value;
            const url = `/export/rekap-layanan-arsip/${selectedYear}/${selectedMonth}`; 
            
            const printBtn = document.getElementById('printPdfBtn');
            if (printBtn) {
                printBtn.disabled = true;
                printBtn.querySelector('span').textContent = 'Membuat dan Mengunduh PDF...';
            }

            window.open(url, '_blank'); 

            setTimeout(() => {
                if (printBtn) {
                    printBtn.disabled = false;
                    printBtn.querySelector('span').textContent = '📄 Cetak PDF';
                }
            }, 5000); 
        }
        
        function populateTableFromFilters() {
            const tableBody = document.querySelector('#rekapTable tbody');
            const selectedYear = document.getElementById('filterYear')?.value ?? 'all';
            const selectedMonth = document.getElementById('filterMonth')?.value ?? 'all';

            const map = {};

            // 1. Agregasi data
            allData.forEach(item => {
                const y = item.TAHUN;
                const m = item.BULAN;
                const key = `${y}|${m}`;

                // Logika Filter (Sudah Benar)
                const yearMatch = selectedYear === 'all' || String(y) === String(selectedYear);
                const monthMatch = selectedMonth === 'all' || String(m) === String(selectedMonth);

                if (yearMatch && monthMatch) {
                    if (!map[key]) map[key] = { year: y, month: m, count: 0 };
                    map[key].count++;
                }
            });

            // 2. Sortir data: ASCENDING (Januari ke Desember / Terlama ke Terbaru)
            const rows = Object.values(map)
                .sort((a, b) => {
                    // Logika Pengurutan (Sudah Benar untuk ASCENDING)
                    // Urutkan berdasarkan Tahun (a.year - b.year) kemudian Bulan (a.month - b.month)
                    if (a.year !== b.year) return a.year - b.year;
                    return a.month - b.month;
                });

            // 3. Kosongkan tbody
            tableBody.innerHTML = '';

            if (rows.length === 0) {
                tableBody.insertAdjacentHTML('beforeend', '<tr><td class="border p-3 text-center text-gray-500" colspan="4">Tidak ada data rekapitulasi untuk filter ini.</td></tr>');
                return;
            }

            // 4. Isi tabel
            rows.forEach((r, idx) => {
                const monthLabel = (r.month >= 1 && r.month <= 12) ? monthNamesFull[r.month - 1] : r.month;
                
                const tr = `<tr>
                    <td class="border p-3 text-center">${idx + 1}</td>
                    <td class="border p-3">${r.year}</td>
                    <td class="border p-3">${monthLabel}</td>
                    <td class="border p-3 font-semibold text-right">${r.count}</td>
                </tr>`;
                tableBody.insertAdjacentHTML('beforeend', tr);
            });
            
            // 5. Panggil update statistik
            updateStatistics(selectedYear, selectedMonth);
        }
        
        function updateStatistics(year, month) {
            // ... (fungsi updateStatistics tidak diubah)
            let totalOverall = allData.length;
            
            let filteredYearCount = allData.filter(item => {
                return year === 'all' || String(item.TAHUN) === String(year);
            }).length;
            
            let filteredMonthCount = allData.filter(item => {
                const yearMatch = year === 'all' || String(item.TAHUN) === String(year);
                const monthMatch = month === 'all' || String(item.BULAN) === String(month);
                return yearMatch && monthMatch;
            }).length;

            document.getElementById('statTotal').textContent = totalOverall;
            document.getElementById('statYear').textContent = filteredYearCount;
            document.getElementById('statMonth').textContent = filteredMonthCount;
        }


        // Inisialisasi: Panggil fungsi isi tabel saat dokumen siap
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(populateTableFromFilters, 100); 
        });

        // Event Listener untuk tombol "Terapkan Filter"
        window.addEventListener('rekap-filter-applied', () => {
            populateTableFromFilters();
        });

    </script>
    @endpush
    
</x-filament-panels::page>