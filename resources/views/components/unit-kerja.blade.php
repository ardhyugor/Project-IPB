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
<nav class="bg-blue-900 shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <div class="flex items-center gap-3">
        <img src="img/logos.png" class="h-10 w-10">
        <h1 class="text-xl font-bold text-white">ARSIPINAJA</h1>
      </div>
      <a href="/" class="text-blue-200 hover:text-white transition font-medium">← Kembali</a>
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
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
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
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
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
              <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
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
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
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
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(animateOnScroll, 100);
    });
</script>

</body>
</html>