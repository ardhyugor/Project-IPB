<x-filament::page>


        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <div>
        <h2 class="text-xl font-bold mb-4">📂 Riwayat Layanan Arsip</h2>
        {{ $this->table }}
    </div>

    {{-- Modal Rekapitulasi --}}
    <x-filament::modal id="rekap-modal" width="7xl">
        <x-slot name="heading">
            📊 Rekapitulasi Layanan Arsip
        </x-slot>
        
        @php
            $totalLayanan = \App\Models\LayananBerkas::count();
            $layananTahunIni = \App\Models\LayananBerkas::where('TAHUN', now()->year)->count();
            $layananBulanIni = \App\Models\LayananBerkas::where('BULAN', now()->month)->where('TAHUN', now()->year)->count();
            
            // Get available years for filter
            $availableYears = \App\Models\LayananBerkas::select('TAHUN')
                ->distinct()
                ->orderBy('TAHUN', 'desc')
                ->pluck('TAHUN')
                ->toArray();
        @endphp

        {{-- Filter Section --}}
        <div class="mb-6 bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        🗓️ Filter Tahun
                    </label>
                    <select id="filterYear" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="all">Semua Tahun</option>
                        @foreach($availableYears as $year)
                            <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        📅 Filter Bulan
                    </label>
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
                    <button id="applyFilter" class="w-full block border-gray-300 border bg-red-600 hover:bg-blue-700 text-black font-medium py-2 px-4 rounded-md transition duration-150">
                        🔍 Terapkan Filter
                    </button>
                </div>
            </div>
        </div>

        {{-- Statistik Cards --}}
        <div class="mb-6 grid grid-cols-3 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-5 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Total Layanan</p>
                <p id="statTotal" class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $totalLayanan }}</p>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-5 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Tahun Ini</p>
                <p id="statYear" class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $layananTahunIni }}</p>
            </div>
            <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-5 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Bulan Ini</p>
                <p id="statMonth" class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $layananBulanIni }}</p>
            </div>
        </div>

        {{-- Charts --}}
        <div class="grid grid-cols-2 gap-6">
            {{-- Chart Layanan per Bulan --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                <h3 id="monthlyChartTitle" class="text-base font-semibold mb-4 text-gray-900 dark:text-gray-100">📊 Layanan per Bulan ({{ now()->year }})</h3>
                <div style="position: relative; height: 320px;">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>

            {{-- Chart Layanan per Tahun --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-5">
                <h3 class="text-base font-semibold mb-4 text-gray-900 dark:text-gray-100">📈 Layanan per Tahun</h3>
                <div style="position: relative; height: 320px;">
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-filament::button color="gray" x-on:click="$dispatch('close-modal', { id: 'rekap-modal' })">
                Tutup
            </x-filament::button>
        </x-slot>
    </x-filament::modal>

    {{-- Chart.js Scripts --}}
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        let monthlyChart = null;
        let yearlyChart = null;
        let allData = null;

        // Prepare all data
        @php
            // Get all data for JavaScript filtering
            $allLayananData = \App\Models\LayananBerkas::select('TAHUN', 'BULAN')->get();
            
            // Monthly data for current year
            $monthlyData = [];
            for ($month = 1; $month <= 12; $month++) {
                $monthlyData[] = \App\Models\LayananBerkas::where('TAHUN', now()->year)
                    ->where('BULAN', $month)
                    ->count();
            }

            // Yearly data (5 years)
            $currentYear = now()->year;
            $years = range($currentYear - 4, $currentYear);
            $yearlyData = [];
            foreach ($years as $year) {
                $yearlyData[] = \App\Models\LayananBerkas::where('TAHUN', $year)->count();
            }
        @endphp

        allData = @json($allLayananData);
        const initialMonthlyData = @json($monthlyData);
        const initialYearlyData = @json($yearlyData);
        const yearLabels = @json($years);

        document.addEventListener('livewire:init', () => {
            Livewire.on('openRekapModal', () => {
                window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'rekap-modal' } }));
                
                setTimeout(() => {
                    initCharts(initialMonthlyData, initialYearlyData);
                    setupFilterListeners();
                }, 100);
            });
        });

        function setupFilterListeners() {
            document.getElementById('applyFilter').addEventListener('click', function() {
                applyFilters();
            });

            // Enter key support
            document.getElementById('filterYear').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') applyFilters();
            });
            document.getElementById('filterMonth').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') applyFilters();
            });
        }

        function applyFilters() {
            const selectedYear = document.getElementById('filterYear').value;
            const selectedMonth = document.getElementById('filterMonth').value;

            // Filter data based on selection
            let filteredData = allData;

            if (selectedYear !== 'all') {
                filteredData = filteredData.filter(item => item.TAHUN == selectedYear);
            }

            if (selectedMonth !== 'all') {
                filteredData = filteredData.filter(item => item.BULAN == selectedMonth);
            }

            // Calculate new statistics
            updateStatistics(selectedYear, selectedMonth);

            // Calculate monthly data
            const newMonthlyData = [];
            const displayYear = selectedYear !== 'all' ? selectedYear : new Date().getFullYear();
            
            for (let month = 1; month <= 12; month++) {
                const count = allData.filter(item => {
                    const yearMatch = selectedYear === 'all' || item.TAHUN == selectedYear;
                    const monthMatch = item.BULAN == month;
                    return yearMatch && monthMatch;
                }).length;
                newMonthlyData.push(count);
            }

            // Update monthly chart title
            document.getElementById('monthlyChartTitle').textContent = 
                `📊 Layanan per Bulan (${displayYear})`;

            // Reinitialize charts with new data
            initCharts(newMonthlyData, initialYearlyData);
        }

        function updateStatistics(year, month) {
            let total = allData.length;
            let yearCount = year !== 'all' 
                ? allData.filter(item => item.TAHUN == year).length 
                : allData.filter(item => item.TAHUN == new Date().getFullYear()).length;
            
            let monthCount = 0;
            if (year !== 'all' && month !== 'all') {
                monthCount = allData.filter(item => item.TAHUN == year && item.BULAN == month).length;
            } else if (month !== 'all') {
                monthCount = allData.filter(item => item.BULAN == month && item.TAHUN == new Date().getFullYear()).length;
            } else {
                monthCount = allData.filter(item => 
                    item.BULAN == new Date().getMonth() + 1 && 
                    item.TAHUN == new Date().getFullYear()
                ).length;
            }

            document.getElementById('statTotal').textContent = total;
            document.getElementById('statYear').textContent = yearCount;
            document.getElementById('statMonth').textContent = monthCount;
        }

        function initCharts(monthlyData, yearlyData) {
            // Destroy existing charts
            if (monthlyChart) monthlyChart.destroy();
            if (yearlyChart) yearlyChart.destroy();

            // Chart Layanan per Bulan
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
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                },
                                callbacks: {
                                    label: function(context) {
                                        return 'Jumlah: ' + context.parsed.y + ' layanan';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Chart Layanan per Tahun
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
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                },
                                callbacks: {
                                    label: function(context) {
                                        return 'Jumlah: ' + context.parsed.y + ' layanan';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        }
    </script>
    @endpush
</x-filament::page>