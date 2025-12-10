<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infografis Layanan Arsip</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body class="bg-gray-50">

<!-- Navigation -->
<nav class="bg-blue-900/80 backdrop-blur-sm border-b sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <div class="flex items-center gap-2">
        <img src="img/logos.png" class="h-10 w-10" alt="Logo">
          <h1 class="text-xl font-bold text-white">ARSIPINAJA</h1>
        </div>
      <div class="flex items-center gap-6">
        <!-- Dropdown Tentang -->
        <div class="relative group">
          <button class="text-white hover:text-gray-300 font-medium transition flex items-center gap-1">
            Tentang
            <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <div class="absolute left-0 mt-0 w-80 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-3 top-full">

            <!-- OVERVIEW Section -->
            <div class="px-4 py-2">
              <a href="infografis"
                  class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                <div class="flex-shrink-0 mt-1">
                  <i class="fas fa-chart-bar text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-sm text-gray-900">Infografis</h4>
                  <p class="text-xs text-gray-600">Statistik dan data visual</p>
                </div>
              </a>

              <a href="layanan-arsip"
                  class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                <div class="flex-shrink-0 mt-1">
                  <i class="fas fa-briefcase text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-sm text-gray-900">Layanan</h4>
                  <p class="text-xs text-gray-600">Daftar layanan kami</p>
                </div>
              </a>

              <a href="unit-kerja"
                  class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition">
                <div class="flex-shrink-0 mt-1">
                  <i class="fas fa-building text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-sm text-gray-900">Unit Kerja</h4>
                  <p class="text-xs text-gray-600">Struktur organisasi kami</p>
                </div>
              </a>
            </div>

            <!-- Divider -->
            <div class="border-t my-2"></div>

            <!-- PRIVACY Section -->
            <div class="px-4 py-2">
              <a href="kebijakan"
                  class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                <div class="flex-shrink-0 mt-1">
                  <i class="fas fa-shield-alt text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-sm text-gray-900">Kebijakan Privasi</h4>
                  <p class="text-xs text-gray-600">Perlindungan data Anda</p>
                </div>
              </a>

              <a href="ketentuan-pengguna"
                  class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition">
                <div class="flex-shrink-0 mt-1">
                  <i class="fas fa-file-contract text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-sm text-gray-900">Ketentuan Pengguna</h4>
                  <p class="text-xs text-gray-600">Syarat & kondisi layanan</p>
                </div>
              </a>
            </div>

          </div>
        </div>
        
        <a href="/" class="text-slate-300 hover:text-white transition">← Kembali</a>
      </div>
    </div>
  </div>
</nav>

<section id="infografis">
<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

  <!-- Header -->
  <div class="text-center mb-16 animate-fade-in">
    <h2 class="text-4xl sm:text-5xl font-bold text-blue-900 mb-4 flex items-center justify-center gap-3">
      <span class="material-symbols-outlined text-6xl">
        grouped_bar_chart
      </span>
      Infografis Layanan Arsip
    </h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Visualisasi data dan statistik lengkap mengenai layanan
      pengarsipan digital kami</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
    <div
      class="bg-blue-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-blue-600">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-blue-100 text-sm font-semibold">Total Dokumen</p>
          <p class="text-4xl font-bold mt-2">45,829</p>
        </div>
        <svg class="w-12 h-12 opacity-30" fill="currentColor" viewBox="0 0 20 20">
          <path d="M4 3a2 2 0 012-2h6a1 1 0 01.894.553l2 4H4V3zm0 5h12v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
        </svg>
      </div>
      <div class="flex items-center gap-2 text-green-300 font-semibold">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414-1.414L13.586 7H12z" />
        </svg>
        <span class="text-sm">+12% bulan ini</span>
      </div>
    </div>

    <div
      class="bg-amber-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-amber-600">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-amber-100 text-sm font-semibold">Pengguna Aktif</p>
          <p class="text-4xl font-bold mt-2">1,234</p>
        </div>
        <svg class="w-12 h-12 opacity-30" fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V6.5m-5-5v5m0 0H8m2.5 0h2.5"
            stroke="currentColor" stroke-width="2" />
        </svg>
      </div>
      <p class="text-sm text-amber-100">Dari berbagai unit kerja</p>
    </div>

    <div
      class="bg-green-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-green-600">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-green-100 text-sm font-semibold">Akses Berhasil</p>
          <p class="text-4xl font-bold mt-2">98.5%</p>
        </div>
        <svg class="w-12 h-12 opacity-30" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
        </svg>
      </div>
      <p class="text-sm text-green-100">Sistem uptime sempurna</p>
    </div>

    <div
      class="bg-red-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-red-600">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-red-100 text-sm font-semibold">Waktu Respons</p>
          <p class="text-4xl font-bold mt-2">0.8s</p>
        </div>
        <svg class="w-12 h-12 opacity-30" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" />
        </svg>
      </div>
      <p class="text-sm text-red-100">Rata-rata per dokumen</p>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
    <!-- Chart 1: Distribusi Jenis Dokumen -->
    <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-lg">
      <h3 class="text-xl font-bold text-blue-900 mb-6">Distribusi Jenis Dokumen</h3>
      <div class="relative h-80">
        <canvas id="chartJenisDoc"></canvas>
      </div>
      <div class="grid grid-cols-2 gap-4 mt-6 text-sm">
        <div class="flex items-center gap-2">
          <div class="w-3 h-3 rounded-full bg-blue-600"></div>
          <span class="text-gray-700">Surat Masuk (28%)</span>
        </div>
        <div class="flex items-center gap-2">
          <div class="w-3 h-3 rounded-full bg-amber-600"></div>
          <span class="text-gray-700">Surat Keluar (22%)</span>
        </div>
        <div class="flex items-center gap-2">
          <div class="w-3 h-3 rounded-full bg-green-600"></div>
          <span class="text-gray-700">Laporan (25%)</span>
        </div>
        <div class="flex items-center gap-2">
          <div class="w-3 h-3 rounded-full bg-red-600"></div>
          <span class="text-gray-700">Lainnya (25%)</span>
        </div>
      </div>
    </div>

    <!-- Chart 2: Akses Per Bulan -->
    <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-lg">
      <h3 class="text-xl font-bold text-blue-900 mb-6">Akses Per Bulan</h3>
      <div class="relative h-80">
        <canvas id="chartAksesBulan"></canvas>
      </div>
    </div>
  </div>

  <!-- Timeline -->
  <div class="bg-white border border-gray-300 rounded-xl p-8 shadow-lg mb-12">
    <h3 class="text-2xl font-bold text-blue-900 mb-8">📈 Perkembangan Layanan Arsip</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="flex gap-4">
        <div class="flex flex-col items-center">
          <div class="w-4 h-4 rounded-full bg-blue-600 mb-2"></div>
          <div class="w-1 h-24 bg-gradient-to-b from-blue-600 to-amber-600"></div>
        </div>
        <div>
          <h4 class="font-semibold text-blue-900 mb-2">2021 - Digitalisasi Awal</h4>
          <p class="text-gray-600 text-sm">Mulai mengdigitalisasi dokumen-dokumen lama. Sistem database pertama
            diimplementasikan.</p>
        </div>
      </div>

      <div class="flex gap-4">
        <div class="flex flex-col items-center">
          <div class="w-4 h-4 rounded-full bg-amber-600 mb-2"></div>
          <div class="w-1 h-24 bg-gradient-to-b from-amber-600 to-green-600"></div>
        </div>
        <div>
          <h4 class="font-semibold text-blue-900 mb-2">2022 - Integrasi Sistem</h4>
          <p class="text-gray-600 text-sm">Menghubungkan dengan berbagai unit kerja. Pengguna dapat mengakses dari
            berbagai lokasi.</p>
        </div>
      </div>

      <div class="flex gap-4">
        <div class="flex flex-col items-center">
          <div class="w-4 h-4 rounded-full bg-green-600 mb-2"></div>
          <div class="w-1 h-24 bg-green-600"></div>
        </div>
        <div>
          <h4 class="font-semibold text-blue-900 mb-2">2023 - Optimisasi & Ekspansi</h4>
          <p class="text-gray-600 text-sm">Meningkatkan kapasitas dan keamanan. Menambah fitur pencarian dan filtering
            canggih.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Kategori Dokumen -->
  <div class="bg-white border border-gray-300 rounded-xl p-8 shadow-lg">
    <h3 class="text-2xl font-bold text-blue-900 mb-8">📁 Kategori Dokumen yang Tersimpan</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div
        class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-300 hover:border-blue-500 transition">
        <div class="flex items-center gap-3 mb-2">
          <div class="text-2xl">📄</div>
          <h4 class="font-semibold text-blue-900">Surat Masuk/Keluar</h4>
        </div>
        <p class="text-gray-700 text-sm">12,841 dokumen tersimpan dengan indexing lengkap</p>
      </div>

      <div
        class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg p-4 border border-amber-300 hover:border-amber-500 transition">
        <div class="flex items-center gap-3 mb-2">
          <div class="text-2xl">📊</div>
          <h4 class="font-semibold text-amber-900">Laporan & Analisis</h4>
        </div>
        <p class="text-gray-700 text-sm">11,456 dokumen hasil analisis mendalam</p>
      </div>

      <div
        class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4 border border-green-300 hover:border-green-500 transition">
        <div class="flex items-center gap-3 mb-2">
          <div class="text-2xl">📋</div>
          <h4 class="font-semibold text-green-900">Memorandum & Keputusan</h4>
        </div>
        <p class="text-gray-700 text-sm">8,923 dokumen resmi dan keputusan penting</p>
      </div>

      <div
        class="bg-gradient-to-br from-red-50 to-red-100 rounded-lg p-4 border border-red-300 hover:border-red-500 transition">
        <div class="flex items-center gap-3 mb-2">
          <div class="text-2xl">🗂️</div>
          <h4 class="font-semibold text-red-900">Arsip Historis</h4>
        </div>
        <p class="text-gray-700 text-sm">7,432 dokumen sejarah dan referensi</p>
      </div>

      <div
        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4 border border-purple-300 hover:border-purple-500 transition">
        <div class="flex items-center gap-3 mb-2">
          <div class="text-2xl">🔐</div>
          <h4 class="font-semibold text-purple-900">Dokumen Terkunci</h4>
        </div>
        <p class="text-gray-700 text-sm">3,177 dokumen dengan akses terbatas</p>
      </div>

      <div
        class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg p-4 border border-pink-300 hover:border-pink-500 transition">
        <div class="flex items-center gap-3 mb-2">
          <div class="text-2xl">📅</div>
          <h4 class="font-semibold text-pink-900">Kalender & Jadwal</h4>
        </div>
        <p class="text-gray-700 text-sm">2,000 dokumen perencanaan dan jadwal</p>
      </div>
    </div>
  </div>

</div>
</section>

<style>
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fade-in {
    animation: fadeIn 0.8s ease-out;
  }
</style>

<script>
  // Chart 1: Jenis Dokumen (Pie Chart)
  const ctx1 = document.getElementById('chartJenisDoc').getContext('2d');
  new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: ['Surat Masuk', 'Surat Keluar', 'Laporan', 'Lainnya'],
      datasets: [{
        data: [28, 22, 25, 25],
        backgroundColor: [
          'rgba(37, 99, 235, 0.9)',
          'rgba(217, 119, 6, 0.9)',
          'rgba(22, 163, 74, 0.9)',
          'rgba(220, 38, 38, 0.9)'
        ],
        borderColor: [
          'rgba(37, 99, 235, 1)',
          'rgba(217, 119, 6, 1)',
          'rgba(22, 163, 74, 1)',
          'rgba(220, 38, 38, 1)'
        ],
        borderWidth: 2,
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      }
    }
  });

  // Chart 2: Akses Per Bulan (Line Chart)
  const ctx2 = document.getElementById('chartAksesBulan').getContext('2d');
  new Chart(ctx2, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: [{
        label: 'Akses Per Bulan',
        data: [2400, 2210, 2290, 2000, 2181, 2500, 2100, 2200, 2500, 2800, 3200, 3500],
        borderColor: 'rgba(37, 99, 235, 1)',
        backgroundColor: 'rgba(37, 99, 235, 0.1)',
        borderWidth: 3,
        fill: true,
        tension: 0.4,
        pointBackgroundColor: 'rgba(37, 99, 235, 1)',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointRadius: 5,
        pointHoverRadius: 7
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          labels: {
            color: '#1e40af'
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: '#1e40af'
          },
          grid: {
            color: 'rgba(59, 130, 246, 0.1)'
          }
        },
        x: {
          ticks: {
            color: '#1e40af'
          },
          grid: {
            display: false
          }
        }
      }
    }
  });
</script>

</body>
</html>