<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kebijakan Privasi</title>
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
      transition-delay: 0.2s;
    }

    .delay-3 {
      transition-delay: 0.2s;
    }

    .delay-4 {
      transition-delay: 0.2s;
    }

    .delay-5 {
      transition-delay: 0.2s;
    }

    .delay-6 {
      transition-delay: 0.2s;
    }

    html {
      scroll-behavior: smooth;
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
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <div class="mb-12 animate-on-scroll">
      <h2 class="text-4xl font-bold text-blue-900 mb-4 flex items-center justify-center">
        <span class="material-symbols-outlined px-3">
          assured_workload
        </span>
        Kebijakan Privasi
      </h2>
      <p class="text-lg text-gray-600 mb-2 flex items-center justify-center">Layanan Arsip Digital - Komitmen Kami
        Terhadap Keamanan Data Anda</p>
      <p class="text-sm text-gray-500 flex items-center justify-center">Terakhir diperbarui: 21 November 2025</p>
    </div>

    <!-- Table of Contents -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-12 shadow-sm animate-on-scroll delay-1">
      <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Isi</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <a href="#intro"
          class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z" />
          </svg>
          Pengantar
        </a>
        <a href="#collection"
          class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z" />
          </svg>
          Pengumpulan Data
        </a>
        <a href="#usage"
          class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z" />
          </svg>
          Penggunaan Data
        </a>
        <a href="#security"
          class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z" />
          </svg>
          Keamanan Data
        </a>
        <a href="#rights"
          class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z" />
          </svg>
          Hak-Hak Pengguna
        </a>
        <a href="#contact"
          class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center gap-2 transition">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5.951-1.429 5.951 1.429a1 1 0 001.169-1.409l-7-14z" />
          </svg>
          Hubungi Kami
        </a>
      </div>
    </div>

    <!-- Content Sections -->
    <div class="space-y-8">

      <!-- Section 1: Pengantar -->
      <section id="intro" class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-2">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Pengantar</h3>
        <p class="text-gray-700 leading-relaxed">
          Kami berkomitmen untuk melindungi privasi Anda dalam menggunakan Layanan Arsip Digital. Kebijakan Privasi ini
          menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi pribadi Anda. Dengan
          menggunakan layanan kami, Anda menyetujui praktik-praktik yang dijelaskan dalam kebijakan ini.
        </p>
      </section>

      <!-- Section 2: Pengumpulan Data -->
      <section id="collection"
        class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-3">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Pengumpulan Data</h3>
        <div class="space-y-4">
          <div class="border-l-4 border-blue-600 pl-4 py-2">
            <h4 class="font-semibold text-gray-900 mb-2">Informasi Identitas</h4>
            <p class="text-gray-700">Nama lengkap, NIP/NIK, jabatan, unit kerja, alamat email, dan nomor telepon</p>
          </div>
          <div class="border-l-4 border-blue-600 pl-4 py-2">
            <h4 class="font-semibold text-gray-900 mb-2">Data Akses</h4>
            <p class="text-gray-700">Waktu login, IP address, browser yang digunakan, dan dokumen yang diakses</p>
          </div>
          <div class="border-l-4 border-blue-600 pl-4 py-2">
            <h4 class="font-semibold text-gray-900 mb-2">Dokumen & Konten</h4>
            <p class="text-gray-700">File dokumen, metadata, dan informasi terkait yang Anda upload ke sistem</p>
          </div>
          <div class="border-l-4 border-blue-600 pl-4 py-2">
            <h4 class="font-semibold text-gray-900 mb-2">Informasi Teknis</h4>
            <p class="text-gray-700">Cookie, log file, dan data teknis lainnya untuk meningkatkan layanan</p>
          </div>
        </div>
      </section>

      <!-- Section 3: Penggunaan Data -->
      <section id="usage" class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Penggunaan Data</h3>
        <p class="text-gray-700 mb-6">Kami menggunakan data yang dikumpulkan untuk tujuan berikut:</p>
        <ul class="space-y-3">
          <li class="flex items-start gap-3">
            <span class="text-blue-600 font-bold mt-1">✓</span>
            <span class="text-gray-700"><strong class="text-gray-900">Verifikasi Pengguna:</strong> Memastikan identitas
              dan otorisasi akses ke sistem</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="text-blue-600 font-bold mt-1">✓</span>
            <span class="text-gray-700"><strong class="text-gray-900">Pelayanan:</strong> Memproses permintaan arsip dan
              memberikan dukungan teknis</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="text-blue-600 font-bold mt-1">✓</span>
            <span class="text-gray-700"><strong class="text-gray-900">Audit & Compliance:</strong> Memenuhi kepatuhan
              hukum dan regulasi pemerintah</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="text-blue-600 font-bold mt-1">✓</span>
            <span class="text-gray-700"><strong class="text-gray-900">Perbaikan Sistem:</strong> Menganalisis penggunaan
              untuk meningkatkan layanan</span>
          </li>
          <li class="flex items-start gap-3">
            <span class="text-blue-600 font-bold mt-1">✓</span>
            <span class="text-gray-700"><strong class="text-gray-900">Komunikasi:</strong> Mengirim notifikasi penting
              dan update layanan</span>
          </li>
        </ul>
      </section>

      <!-- Section 4: Keamanan Data -->
      <section id="security" class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-5">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Keamanan Data</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
          <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
            <h4 class="font-semibold text-gray-900 mb-2 flex items-center gap-2">
              <span>🔐</span> Enkripsi SSL/TLS
            </h4>
            <p class="text-sm text-gray-700">Semua data ditransmisikan dengan enkripsi 256-bit</p>
          </div>
          <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
            <h4 class="font-semibold text-gray-900 mb-2 flex items-center gap-2">
              <span>🛡️</span> Firewall & IDS
            </h4>
            <p class="text-sm text-gray-700">Proteksi berlapis dengan sistem deteksi intrusi</p>
          </div>
          <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
            <h4 class="font-semibold text-gray-900 mb-2 flex items-center gap-2">
              <span>👤</span> Autentikasi Multi-Faktor
            </h4>
            <p class="text-sm text-gray-700">Login memerlukan verifikasi lebih dari satu tahap</p>
          </div>
          <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
            <h4 class="font-semibold text-gray-900 mb-2 flex items-center gap-2">
              <span>📜</span> Audit Log
            </h4>
            <p class="text-sm text-gray-700">Pencatatan lengkap setiap akses dan perubahan data</p>
          </div>
        </div>
        <div class="bg-blue-50 border border-blue-300 rounded-lg p-4">
          <p class="text-gray-700">
            <strong class="text-blue-900">Catatan:</strong> Meskipun kami telah menerapkan keamanan terbaik, tidak ada
            sistem yang sepenuhnya aman. Kami akan segera menginformasikan jika terjadi pelanggaran data.
          </p>
        </div>
      </section>

      <!-- Section 5: Hak-Hak Pengguna -->
      <section id="rights" class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-6">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Hak-Hak Pengguna</h3>
        <p class="text-gray-700 mb-6">Anda memiliki hak-hak berikut terkait data pribadi Anda:</p>
        <div class="space-y-4">
          <div class="flex gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200 animate-on-scroll delay-1">
            <div class="text-2xl flex-shrink-0">📖</div>
            <div>
              <h4 class="font-semibold text-gray-900 mb-1">Hak Akses</h4>
              <p class="text-gray-700 text-sm">Anda dapat meminta salinan data pribadi Anda kapan saja</p>
            </div>
          </div>
          <div class="flex gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200 animate-on-scroll delay-2">
            <div class="text-2xl flex-shrink-0">✏️</div>
            <div>
              <h4 class="font-semibold text-gray-900 mb-1">Hak Koreksi</h4>
              <p class="text-gray-700 text-sm">Anda dapat meminta perbaikan data yang tidak akurat atau tidak lengkap
              </p>
            </div>
          </div>
          <div class="flex gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200 animate-on-scroll delay-3">
            <div class="text-2xl flex-shrink-0">🗑️</div>
            <div>
              <h4 class="font-semibold text-gray-900 mb-1">Hak Dihapus</h4>
              <p class="text-gray-700 text-sm">Anda dapat meminta penghapusan data dalam kondisi tertentu</p>
            </div>
          </div>
          <div class="flex gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200 animate-on-scroll delay-4">
            <div class="text-2xl flex-shrink-0">🚫</div>
            <div>
              <h4 class="font-semibold text-gray-900 mb-1">Hak Keberatan</h4>
              <p class="text-gray-700 text-sm">Anda dapat keberatan terhadap penggunaan data untuk keperluan tertentu
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Section 6: Kontak -->
      <section id="contact"
        class="bg-blue-50 border border-blue-300 rounded-lg p-8 shadow-sm animate-on-scroll delay-1">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Hubungi Kami</h3>
        <p class="text-gray-700 mb-6">Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini atau ingin menggunakan
          hak-hak Anda, silakan hubungi kami:</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white p-4 rounded-lg border border-blue-200 animate-on-scroll delay-1">
            <p class="text-sm font-semibold text-blue-600 mb-2">Email</p>
            <a href="mailto:privacy@arsip.go.id"
              class="text-blue-900 hover:text-blue-600 font-semibold transition">privacy@dsdmarsip.com</a>
          </div>
          <div class="bg-white p-4 rounded-lg border border-blue-200 animate-on-scroll delay-2">
            <p class="text-sm font-semibold text-blue-600 mb-2">Telepon</p>
            <p class="text-gray-900 font-semibold">+62-274-XXXX-XXXX</p>
          </div>
          <div class="bg-white p-4 rounded-lg border border-blue-200 animate-on-scroll delay-3">
            <p class="text-sm font-semibold text-blue-600 mb-2">Alamat</p>
            <p class="text-gray-900 font-semibold">Gedung Rektorat Andi Hakim Nasoetion (AHN) Lt.4, Kampus Dramaga,
              Bogor 16680. </p>
          </div>
        </div>
      </section>

    </div>

    <!-- Footer -->
    <div
      class="mt-12 p-6 bg-gray-100 border border-gray-200 rounded-lg text-center text-gray-600 text-sm animate-on-scroll delay-2">
      <p>Kebijakan Privasi ini dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.</p>
      <p class="mt-2">© 2025 Layanan Arsip SDM IPB University. Semua hak dilindungi.</p>
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