<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unit Kerja</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Scroll Animation Classes */
    .animate-on-scroll {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .animate-on-scroll.animated {
      opacity: 1;
      transform: translateY(0);
    }

    /* Delay Classes untuk Stagger Effect */
    .delay-1 {
      transition-delay: 0.1s;
    }

    .delay-2 {
      transition-delay: 0.3s;
    }

    .delay-3 {
      transition-delay: 0.5s;
    }

    .delay-4 {
      transition-delay: 0.7s;
    }
  </style>
</head>

<body class="bg-white">
  <!-- Navigation -->
  <nav class="bg-blue-900/80 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center gap-3">
          <img src="img/logos.png" class="h-10 w-10">
          <h1 class="text-xl font-bold text-white">ARSIPINAJA</h1>
        </div>
        <div class="flex items-center gap-6">
          <!-- Dropdown Tentang -->
          <div class="relative group">
            <button class="text-white hover:text-gray-300 font-medium transition flex items-center gap-1">
              Tentang
              <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
              class="absolute left-0 mt-0 w-80 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-3 top-full">
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

  <!-- Main Content -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <div class="mb-12 animate-on-scroll">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Struktur Unit Kerja</h2>
      <p class="text-lg text-gray-600 max-w-3xl">Organisasi lengkap unit kerja layanan arsip dengan informasi kontak</p>
    </div>

    <!-- Organization Chart -->
    <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm mb-12 animate-on-scroll delay-1">
      <h3 class="text-2xl font-bold text-gray-900 mb-10">Struktur Organisasi</h3>
      <div class="space-y-10">

        <!-- Level 1: Kantor Pusat -->
        <div class="flex flex-col items-center">
          <div class="bg-blue-900 rounded-lg px-8 py-4 text-white font-semibold shadow-md">
            <div class="text-center">
              <svg class="w-8 h-8 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
              </svg>
              Kantor Pusat Layanan Arsip
            </div>
          </div>
          <div class="w-1 h-12 bg-gray-300"></div>
        </div>

        <!-- Level 2: Bagian-Bagian -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

          <!-- Bagian Digitalisasi -->
          <div class="flex flex-col items-center animate-on-scroll delay-2">
            <div class="bg-blue-600 rounded-lg px-6 py-3 text-white font-semibold shadow-md w-full text-center">
              <svg class="w-6 h-6 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                  clip-rule="evenodd" />
              </svg>
              Bagian Digitalisasi
            </div>
            <div class="w-1 h-8 bg-gray-300"></div>
            <div class="text-center text-sm text-gray-700 space-y-2 bg-gray-50 p-4 rounded w-full">
              <p><span class="font-semibold text-gray-900">Kepala:</span> Budi Santoso</p>
              <p><span class="font-semibold text-gray-900">Staf:</span> 8 orang</p>
              <p class="text-blue-600">email@arsip.go.id</p>
            </div>
          </div>

          <!-- Bagian Penyimpanan -->
          <div class="flex flex-col items-center animate-on-scroll delay-3">
            <div class="bg-blue-600 rounded-lg px-6 py-3 text-white font-semibold shadow-md w-full text-center">
              <svg class="w-6 h-6 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd" />
              </svg>
              Bagian Penyimpanan
            </div>
            <div class="w-1 h-8 bg-gray-300"></div>
            <div class="text-center text-sm text-gray-700 space-y-2 bg-gray-50 p-4 rounded w-full">
              <p><span class="font-semibold text-gray-900">Kepala:</span> Siti Nurhaliza</p>
              <p><span class="font-semibold text-gray-900">Staf:</span> 6 orang</p>
              <p class="text-blue-600">storage@arsip.go.id</p>
            </div>
          </div>

          <!-- Bagian Penelusuran -->
          <div class="flex flex-col items-center animate-on-scroll delay-4">
            <div class="bg-blue-600 rounded-lg px-6 py-3 text-white font-semibold shadow-md w-full text-center">
              <svg class="w-6 h-6 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd" />
              </svg>
              Bagian Penelusuran
            </div>
            <div class="w-1 h-8 bg-gray-300"></div>
            <div class="text-center text-sm text-gray-700 space-y-2 bg-gray-50 p-4 rounded w-full">
              <p><span class="font-semibold text-gray-900">Kepala:</span> Ahmad Wijaya</p>
              <p><span class="font-semibold text-gray-900">Staf:</span> 5 orang</p>
              <p class="text-blue-600">search@arsip.go.id</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm animate-on-scroll delay-1">
        <p class="text-blue-900 text-sm font-semibold">Total Unit Kerja</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">18</p>
        <p class="text-sm text-blue-700 mt-3">Unit yang terdaftar</p>
      </div>
      <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm animate-on-scroll delay-2">
        <p class="text-blue-900 text-sm font-semibold">Total Staf</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">127</p>
        <p class="text-sm text-blue-700 mt-3">Profesional terlatih</p>
      </div>
      <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm animate-on-scroll delay-3">
        <p class="text-blue-900 text-sm font-semibold">Lokasi Kantor</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">5</p>
        <p class="text-sm text-blue-700 mt-3">Tersebar di berbagai wilayah</p>
      </div>
      <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm animate-on-scroll delay-4">
        <p class="text-blue-900 text-sm font-semibold">Jam Layanan</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">40</p>
        <p class="text-sm text-blue-700 mt-3">Jam per minggu</p>
      </div>
    </div>

  </div>

  <!-- Scroll Animation Script -->
  <script>
    // Fungsi untuk mendeteksi elemen masuk viewport
    function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + 200 &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    // Fungsi untuk menambahkan class animated
    function animateOnScroll() {
      const elements = document.querySelectorAll('.animate-on-scroll');

      elements.forEach(element => {
        if (isInViewport(element)) {
          element.classList.add('animated');
        }
      });
    }

    // Jalankan saat page load
    window.addEventListener('load', animateOnScroll);

    // Jalankan saat scroll
    window.addEventListener('scroll', animateOnScroll);

    // Jalankan sekali di awal (untuk elemen yang sudah di viewport)
    document.addEventListener('DOMContentLoaded', function () {
      setTimeout(animateOnScroll, 100);
    });
  </script>

</body>

</html>