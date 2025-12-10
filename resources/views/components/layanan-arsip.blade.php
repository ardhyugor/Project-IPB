<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Arsip Lengkap</title>
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

        .delay-5 {
            transition-delay: 0.9s;
        }

        /* Original Fade In Animation */
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
</head>
<body class="bg-white min-h-screen">

<!-- Navigation -->
<nav class=" bg-blue-900/80 backdrop-blur-sm border-b sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <div class="flex items-center gap-2">
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

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  
  <!-- Header -->
  <div class="text-center mb-16 animate-on-scroll">
    <h2 class="text-4xl sm:text-5xl font-bold text-blue-900 mb-4">Layanan Arsip Digital</h2>
    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Solusi komprehensif untuk penyimpanan, pengelolaan, dan penelusuran dokumen arsip dengan teknologi terdepan</p>
  </div>

  <!-- Services Overview -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <div class="bg-blue-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-blue-600 animate-on-scroll delay-1">
      <div class="text-4xl mb-4">📁</div>
      <h3 class="text-xl font-bold mb-2">Penyimpanan Aman</h3>
      <p class="text-blue-100 text-sm">Kapasitas unlimited dengan enkripsi tingkat enterprise dan backup otomatis</p>
    </div>
    <div class="bg-purple-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-purple-600 animate-on-scroll delay-2">
      <div class="text-4xl mb-4">🔍</div>
      <h3 class="text-xl font-bold mb-2">Pencarian Cerdas</h3>
      <p class="text-purple-100 text-sm">Mesin pencari AI yang dapat menemukan dokumen dalam hitungan detik</p>
    </div>
    <div class="bg-green-700 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:scale-105 border-2 border-green-600 animate-on-scroll delay-3">
      <div class="text-4xl mb-4">👥</div>
      <h3 class="text-xl font-bold mb-2">Kolaborasi Mudah</h3>
      <p class="text-green-100 text-sm">Berbagi akses dan permission kontrol yang granular untuk tim Anda</p>
    </div>
  </div>

  <!-- Detailed Services -->
  <h3 class="text-3xl font-bold text-blue-900 mb-8 animate-on-scroll delay-1">📋 Layanan Utama</h3>
  <div class="space-y-6 mb-12">
    
    <!-- Service 1 -->
    <div class="bg-white border-2 border-blue-300 rounded-xl overflow-hidden shadow-lg hover:border-blue-500 transition animate-on-scroll delay-1">
      <div class="p-8">
        <div class="flex gap-4 mb-4">
          <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-lg bg-blue-700">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <div>
            <h4 class="text-2xl font-bold text-blue-900">Digitalisasi Dokumen</h4>
            <p class="text-gray-500 text-sm mt-1">Konversi dokumen fisik ke format digital berkualitas tinggi</p>
          </div>
        </div>
        <p class="text-gray-700 mb-4">Kami menyediakan layanan digitalisasi profesional dengan standar internasional. Tim ahli kami akan mengkonversi dokumen kertas Anda menjadi file digital yang dapat diakses dengan mudah.</p>
        <div class="bg-blue-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-3 gap-4 border border-blue-200">
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Resolusi</p>
            <p class="text-gray-600 text-sm">300+ DPI</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Format Output</p>
            <p class="text-gray-600 text-sm">PDF, TIFF, PNG</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Waktu Proses</p>
            <p class="text-gray-600 text-sm">5-10 hari kerja</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Service 2 -->
    <div class="bg-white border-2 border-purple-300 rounded-xl overflow-hidden shadow-lg hover:border-purple-500 transition animate-on-scroll delay-2">
      <div class="p-8">
        <div class="flex gap-4 mb-4">
          <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-lg bg-purple-700">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h4 class="text-2xl font-bold text-blue-900">Katalogisasi & Indexing</h4>
            <p class="text-gray-500 text-sm mt-1">Pengorganisasian dokumen dengan sistem metadata komprehensif</p>
          </div>
        </div>
        <p class="text-gray-700 mb-4">Setiap dokumen dikatalogisasi dengan detail lengkap, termasuk judul, tanggal, penulis, departemen, dan kata kunci yang relevan untuk memudahkan pencarian.</p>
        <div class="bg-purple-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-3 gap-4 border border-purple-200">
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Metadata Field</p>
            <p class="text-gray-600 text-sm">25+ kategori</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Standar</p>
            <p class="text-gray-600 text-sm">ISO 27001</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Update Otomatis</p>
            <p class="text-gray-600 text-sm">Real-time</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Service 3 -->
    <div class="bg-white border-2 border-green-300 rounded-xl overflow-hidden shadow-lg hover:border-green-500 transition animate-on-scroll delay-3">
      <div class="p-8">
        <div class="flex gap-4 mb-4">
          <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-lg bg-green-700">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
          </div>
          <div>
            <h4 class="text-2xl font-bold text-blue-900">Manajemen Akses & Keamanan</h4>
            <p class="text-gray-500 text-sm mt-1">Kontrol akses berbasis peran dengan audit trail lengkap</p>
          </div>
        </div>
        <p class="text-gray-700 mb-4">Sistem permission granular memastikan hanya pengguna yang berwenang yang dapat mengakses dokumen sensitif. Setiap akses dicatat untuk keperluan audit dan compliance.</p>
        <div class="bg-green-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-3 gap-4 border border-green-200">
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Enkripsi</p>
            <p class="text-gray-600 text-sm">AES-256</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Autentikasi</p>
            <p class="text-gray-600 text-sm">2FA/MFA</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Logging</p>
            <p class="text-gray-600 text-sm">100% Coverage</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Service 4 -->
    <div class="bg-white border-2 border-amber-300 rounded-xl overflow-hidden shadow-lg hover:border-amber-500 transition animate-on-scroll delay-4">
      <div class="p-8">
        <div class="flex gap-4 mb-4">
          <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-lg bg-amber-700">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
          </div>
          <div>
            <h4 class="text-2xl font-bold text-blue-900">Sertifikasi & Compliance</h4>
            <p class="text-gray-500 text-sm mt-1">Memenuhi standar regulasi dan hukum yang berlaku</p>
          </div>
        </div>
        <p class="text-gray-700 mb-4">Layanan kami telah tersertifikasi sesuai standar internasional dan regulasi pemerintah. Kami melakukan audit berkala untuk memastikan compliance berkelanjutan.</p>
        <div class="bg-amber-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-3 gap-4 border border-amber-200">
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Sertifikat</p>
            <p class="text-gray-600 text-sm">ISO 27001, SOC 2</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Audit</p>
            <p class="text-gray-600 text-sm">Triwulanan</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Compliance</p>
            <p class="text-gray-600 text-sm">100%</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Service 5 -->
    <div class="bg-white border-2 border-red-300 rounded-xl overflow-hidden shadow-lg hover:border-red-500 transition animate-on-scroll delay-5">
      <div class="p-8">
        <div class="flex gap-4 mb-4">
          <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-lg bg-red-700">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.172l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <div>
            <h4 class="text-2xl font-bold text-blue-900">Pencarian & Retrieval</h4>
            <p class="text-gray-500 text-sm mt-1">Teknologi AI untuk menemukan dokumen dengan presisi tinggi</p>
          </div>
        </div>
        <p class="text-gray-700 mb-4">Mesin pencarian berbasis AI kami dapat mencari dokumen berdasarkan kata kunci, metadata, OCR teks, bahkan kesamaan visual. Temukan dokumen yang Anda cari dalam waktu singkat.</p>
        <div class="bg-red-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-3 gap-4 border border-red-200">
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Kecepatan Pencarian</p>
            <p class="text-gray-600 text-sm">&lt; 1 detik</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">Filter Lanjutan</p>
            <p class="text-gray-600 text-sm">20+ parameter</p>
          </div>
          <div>
            <p class="font-semibold text-blue-900 text-sm mb-1">AI Recognition</p>
            <p class="text-gray-600 text-sm">OCR + Vision</p>
          </div>
        </div>
      </div>
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