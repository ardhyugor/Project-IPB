<x-filament::page>
    {{-- Hapus CDN html2canvas/jspdf yang tidak diperlukan lagi --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=sync_alt" />
    
    <div>
        <h2 class="text-xl font-bold mb-4">📂 Riwayat Layanan Arsip</h2>
        {{ $this->table }}
    </div>

    {{-- Modal Rekapitulasi --}}
    <x-filament::modal id="rekap-modal" width="7xl">
        <x-slot name="heading">
            <span id="rekapTitle">📊 Rekapitulasi Layanan Arsip (Grafik)</span>
        </x-slot>

        @php
            // [Kode PHP Statistik di sini]
            $totalLayanan = \App\Models\LayananBerkas::count();
            $layananTahunIni = \App\Models\LayananBerkas::where('TAHUN', now()->year)->count();
            $layananBulanIni = \App\Models\LayananBerkas::where('BULAN', now()->month)->where('TAHUN', now()->year)->count();
            $availableYears = \App\Models\LayananBerkas::select('TAHUN')->distinct()->orderBy('TAHUN', 'desc')->pluck('TAHUN')->toArray();
            $allLayananData = $this->getLayananData(); 
            $monthlyData = [];
            for ($month = 1; $month <= 12; $month++) {
                $monthlyData[] = \App\Models\LayananBerkas::where('TAHUN', now()->year)->where('BULAN', $month)->count();
            }
            $currentYear = now()->year;
            $years = range($currentYear - 4, $currentYear);
            $yearlyData = [];
            foreach ($years as $year) {
                $yearlyData[] = \App\Models\LayananBerkas::where('TAHUN', $year)->count();
            }
        @endphp

        {{-- 🛑 WRAPPER KONTEN YANG AKAN DICETAK (TARGET UTAMA) --}}
        <div id="printableRekapContent" class="p-4 sm:p-6 lg:p-8 bg-white dark:bg-gray-900 rounded-lg"> 
            
            {{-- Filter Section --}}
            <div id="filterSection" class="mb-6 bg-gray-50 dark:bg-gray-800/50 rounded-lg p-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">🗓️ Filter Tahun</label>
                        <select id="filterYear" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="all">Semua Tahun</option>
                            @foreach($availableYears as $year)
                                <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">📅 Filter Bulan</label>
                        <select id="filterMonth" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="all">Semua Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button id="applyFilter" class="w-full block border-gray-300 border bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150">🔍 Terapkan Filter</button>
                    </div>
                </div>
            </div>

            {{-- Statistik Cards --}}
            <div id="statsSection" class="mb-6 grid grid-cols-3 gap-4">
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-5 text-center shadow-md">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Total Layanan</p>
                    <p id="statTotal" class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $totalLayanan }}</p>
                </div>
                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-5 text-center shadow-md">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Tahun Ini</p>
                    <p id="statYear" class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $layananTahunIni }}</p>
                </div>
                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-5 text-center shadow-md">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Bulan Ini</p>
                    <p id="statMonth" class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $layananBulanIni }}</p>
                </div>
            </div>

            {{-- Chart Area --}}
            <div id="chartView" class="active-view grid grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5 shadow-md">
                    <h3 id="monthlyChartTitle" class="text-base font-semibold mb-4 text-gray-900 dark:text-gray-100">📊 Layanan per Bulan ({{ now()->year }})</h3>
                    <div style="position: relative; height: 320px;">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5 shadow-md">
                    <h3 class="text-base font-semibold mb-4 text-gray-900 dark:text-gray-100">📈 Layanan per Tahun</h3>
                    <div style="position: relative; height: 320px;">
                        <canvas id="yearlyChart"></canvas>
                    </div>
                </div>
            </div>
            
            {{-- Tabel Ringkasan Area --}}
            <div id="tableView" class="hidden">
                <h3 class="text-lg font-semibold mt-4 mb-3 text-gray-900 dark:text-gray-100">📋 Detail Rekapitulasi</h3>
                
                <div id="tableToPrint" class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg border dark:border-gray-700 shadow-md">
                    <table id="rekapTable" class="w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border p-2 text-left">No</th>
                                <th class="border p-2 text-left">Tahun</th>
                                <th class="border p-2 text-left">Bulan</th>
                                <th class="border p-2 text-left">Jumlah Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="4" class="p-4 text-center text-gray-500">Memuat data...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- AKHIR DARI WRAPPER #printableRekapContent --}}

        <x-slot name="footer">
            <div class="flex justify-between items-center w-full">
                <x-filament::button color="gray" x-on:click="$dispatch('close-modal', { id: 'rekap-modal' })">
                    Tutup
                </x-filament::button>
                
                {{-- 🔥 TOMBOL CETAK PDF BARU (Pemicu Fungsi JS) 🔥 --}}
                <x-filament::button 
                    id="printPdfBtn" 
                    color="danger" 
                    class="ml-4" 
                    style="display: none;" 
                    x-on:click="exportPdfWithFilter()" {{-- Panggil fungsi JS baru --}}
                >
                    <span>📄 Cetak PDF</span>
                </x-filament::button>

                {{-- Tombol Toggle Chart <-> Tabel --}}
                <x-filament::button id="toggleViewBtn" color="primary">
                    <span>🔄 Ubah ke Tabel</span>
                </x-filament::button>
            </div>
        </x-slot>

    </x-filament::modal>

    {{-- LOGIKA JAVASCRIPT --}}
    <script>
        let monthlyChart = null;
        let yearlyChart = null;
        let allData = @json($allLayananData); 
        const initialMonthlyData = @json($monthlyData);
        const initialYearlyData = @json($yearlyData);
        const yearLabels = @json($years);
        const monthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        // 🔥 FUNGSI UTAMA: Memicu Unduhan PDF melalui Route Standar Laravel
        function exportPdfWithFilter() {
            const selectedYear = document.getElementById('filterYear').value;
            const selectedMonth = document.getElementById('filterMonth').value;
            
            // 1. Konstruksi URL Route yang sudah didefinisikan di routes/web.php
            const url = `/export/rekap-layanan-arsip/${selectedYear}/${selectedMonth}`;
            
            // 2. Terapkan Visual Feedback (Loading)
            const printBtn = document.getElementById('printPdfBtn');
            if (printBtn) {
                printBtn.disabled = true;
                printBtn.querySelector('span').textContent = 'Membuat dan Mengunduh PDF...';
            }

            // 3. Panggil URL menggunakan window.open() untuk memicu download.
            // Ini menghindari masalah Livewire AJAX.
            window.open(url, '_blank'); 

            // 4. Reset tombol setelah waktu tunggu (karena kita tidak mendapat feedback dari route download)
            setTimeout(() => {
                 if (printBtn) {
                     printBtn.disabled = false;
                     printBtn.querySelector('span').textContent = '📄 Cetak PDF';
                 }
            }, 5000); // Tunggu 5 detik
        }

        // FUNGSI PENGATUR FILTER, CHART, dan TABLE
        function setupFilterListeners() {
            const applyFilterButton = document.getElementById('applyFilter');
            if (applyFilterButton) {
                // Menghapus dan memasang ulang listener untuk menghindari duplikasi
                const newApplyFilterButton = applyFilterButton.cloneNode(true);
                applyFilterButton.replaceWith(newApplyFilterButton);
                newApplyFilterButton.addEventListener('click', applyFilters);
            }
        }
        function applyFilters() { 
            const selectedYear = document.getElementById('filterYear').value;
            const selectedMonth = document.getElementById('filterMonth').value;

            // Sinkronisasi URL (opsional, tidak mempengaruhi PDF)
            const url = new URL(window.location);
            url.searchParams.set('filterYear', selectedYear);
            url.searchParams.set('filterMonth', selectedMonth);
            window.history.pushState({}, '', url);

            updateStatistics(selectedYear, selectedMonth);

            const newMonthlyData = [];
            const displayYear = selectedYear !== 'all' ? selectedYear : new Date().getFullYear();
            
            for (let month = 1; month <= 12; month++) {
                const count = allData.filter(item => {
                    const monthMatch = item.BULAN == month;
                    const chartYear = selectedYear === 'all' ? String(new Date().getFullYear()) : selectedYear;
                    const isChartYear = String(item.TAHUN) === chartYear;

                    return isChartYear && monthMatch;
                }).length;
                newMonthlyData.push(count);
            }

            document.getElementById('monthlyChartTitle').textContent = 
                `📊 Layanan per Bulan (${displayYear})`;

            initCharts(newMonthlyData, initialYearlyData);

            const tableView = document.getElementById('tableView');
            if (tableView && tableView.classList.contains('active-view')) {
                populateTableFromFilters();
            }
            
            // Setelah filter diterapkan, reset tombol PDF (jika sebelumnya ada loading)
            const printBtn = document.getElementById('printPdfBtn');
            if (printBtn) {
                printBtn.disabled = false;
                printBtn.querySelector('span').textContent = '📄 Cetak PDF';
            }
        }
        
        // ... (Fungsi updateStatistics, initCharts, populateTableFromFilters tetap sama)

        function updateStatistics(year, month) {
            let total = 0;

            allData.forEach(item => {
                const itemYear = String(item.TAHUN);
                const itemMonth = String(item.BULAN);
                const matchTotal = (year === 'all' || itemYear === year) && (month === 'all' || itemMonth === month);
                if (matchTotal) {
                    total++;
                }
            });
            document.getElementById('statTotal').textContent = total;
            document.getElementById('statYear').textContent = allData.filter(item => 
                year === 'all' || String(item.TAHUN) === year
            ).length;
            document.getElementById('statMonth').textContent = total; 
        }

        function initCharts(monthlyData, yearlyData) {
            if (monthlyChart) monthlyChart.destroy();
            if (yearlyChart) yearlyChart.destroy();

            const monthlyCtx = document.getElementById('monthlyChart');
            if (monthlyCtx) {
                monthlyChart = new Chart(monthlyCtx.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            label: 'Jumlah Layanan',
                            data: monthlyData,
                            backgroundColor: 'rgba(59, 130, 246, 0.8)',
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 2,
                            borderRadius: 5,
                            hoverBackgroundColor: 'rgba(59, 130, 246, 1)',
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false, }
                });
            }

            const yearlyCtx = document.getElementById('yearlyChart');
            if (yearlyCtx) {
                yearlyChart = new Chart(yearlyCtx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: yearLabels,
                        datasets: [{
                            label: 'Jumlah Layanan',
                            data: yearlyData,
                            backgroundColor: 'rgba(34, 197, 94, 0.2)',
                            borderColor: 'rgba(34, 197, 94, 1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 6,
                            pointBackgroundColor: 'rgba(34, 197, 94, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointHoverRadius: 8,
                            pointHoverBackgroundColor: 'rgba(34, 197, 94, 1)',
                            pointHoverBorderWidth: 3
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false, }
                });
            }
        }

        function populateTableFromFilters() {
            if (typeof allData === 'undefined' || allData === null) {
                document.querySelector('#rekapTable tbody').innerHTML = '<tr><td colspan="4" class="p-4 text-center text-red-500">Data rekapitulasi tidak tersedia.</td></tr>';
                return;
            }

            const selectedYear = document.getElementById('filterYear')?.value ?? 'all';
            const selectedMonth = document.getElementById('filterMonth')?.value ?? 'all';
            const rekaptableBody = document.querySelector('#rekapTable tbody');
            
            const map = {};

            allData.forEach(item => {
                const y = String(item.TAHUN);
                const m = String(item.BULAN);
                
                const yearMatch = selectedYear === 'all' || y === selectedYear;
                const monthMatch = selectedMonth === 'all' || m === selectedMonth;

                if (yearMatch && monthMatch) {
                    const key = `${y}|${m}`;
                    if (!map[key]) map[key] = { year: y, month: m, count: 0 };
                    map[key].count++;
                }
            });

            const rows = Object.values(map)
                .sort((a, b) => (b.year - a.year) || (b.month - a.month)); 

            rekaptableBody.innerHTML = '';

            if (rows.length === 0) {
                rekaptableBody.insertAdjacentHTML('beforeend', '<tr><td class="border p-4 text-center text-gray-500" colspan="4">Tidak ada data rekapitulasi untuk filter ini.</td></tr>');
                return;
            }
            
            rows.forEach((r, idx) => {
                const monthLabel = (r.month >=1 && r.month <=12) ? monthNames[r.month - 1] : r.month;

                const tr = `<tr>
                    <td class="border p-2">${idx + 1}</td>
                    <td class="border p-2">${r.year}</td>
                    <td class="border p-2">${monthLabel}</td>
                    <td class="border p-2 font-semibold">${r.count}</td>
                </tr>`;
                rekaptableBody.insertAdjacentHTML('beforeend', tr);
            });
        }
        
        function showTableView() { 
            const chartView = document.getElementById('chartView');
            const tableView = document.getElementById('tableView');
            const toggleBtn = document.getElementById('toggleViewBtn');
            const rekapTitle = document.getElementById('rekapTitle');
            const printPdfBtn = document.getElementById('printPdfBtn');
            
            chartView.classList.add('hidden');
            tableView.classList.remove('hidden');
            tableView.classList.add('active-view');
            chartView.classList.remove('active-view');

            toggleBtn.querySelector('span').innerText = '📊 Ubah ke Grafik';
            rekapTitle.innerText = '📋 Rekapitulasi Layanan Arsip (Tabel Ringkasan)';
            
            // Tampilkan tombol PDF saat tampilan Tabel
            if (printPdfBtn) printPdfBtn.style.display = 'block'; 
            populateTableFromFilters(); 
        }

        function showChartView(reinit = true) {
            const chartView = document.getElementById('chartView');
            const tableView = document.getElementById('tableView');
            const toggleBtn = document.getElementById('toggleViewBtn');
            const rekapTitle = document.getElementById('rekapTitle');
            const printPdfBtn = document.getElementById('printPdfBtn');

            tableView.classList.add('hidden');
            chartView.classList.remove('hidden');
            chartView.classList.add('active-view');
            tableView.classList.remove('active-view');

            toggleBtn.querySelector('span').innerText = '🔄 Ubah ke Tabel';
            rekapTitle.innerText = '📊 Rekapitulasi Layanan Arsip (Grafik)';
            
            // Sembunyikan tombol PDF saat tampilan Grafik
            if (printPdfBtn) printPdfBtn.style.display = 'none'; 

            if (reinit) {
                applyFilters(); 
            }
        }

        function setupToggleListener() {
            const toggleBtn = document.getElementById('toggleViewBtn');
            // Menghapus dan memasang ulang listener untuk menghindari duplikasi
            const newToggleBtn = toggleBtn.cloneNode(true);
            toggleBtn.replaceWith(newToggleBtn);
            
            newToggleBtn.addEventListener('click', () => {
                const isTableVisible = document.getElementById('tableView').classList.contains('active-view');
                if (isTableVisible) {
                    showChartView();
                } else {
                    showTableView();
                }
            });
        }

        // 3. INIT LISTENERS
        document.addEventListener('livewire:init', () => {
            Livewire.on('openRekapModal', () => {
                showChartView(false); 
                // Gunakan Livewire.dispatch untuk membuka modal
                Livewire.dispatch('open-modal', { id: 'rekap-modal' }); 
                
                setTimeout(() => {
                    initCharts(initialMonthlyData, initialYearlyData);
                    setupFilterListeners();
                    setupToggleListener(); 
                }, 100);
            });
            
            // 🔥 HAPUS: Hapus Livewire.on('downloadFinished', ...) karena download ditangani oleh window.open
        });
        
        document.addEventListener('DOMContentLoaded', () => {
             // Inisiasi Chart saat DOM siap (jika modal dibuka secara default)
        });
        
    </script>
    
</x-filament::page>