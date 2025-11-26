<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ketentuan Pengguna</title>
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
            transition-delay: 0.1s;
        }

        .delay-3 {
            transition-delay: 0.1s;
        }

        .delay-4 {
            transition-delay: 0.1s;
        }

        .delay-5 {
            transition-delay: 0.1s;
        }

        .delay-6 {
            transition-delay: 0.1s;
        }

        .delay-7 {
            transition-delay: 0.1s;
        }

        html {
            scroll-behavior: smooth;
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
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  
  <!-- Header -->
  <div class="mb-12 animate-on-scroll">
    <h2 class="text-4xl font-bold text-gray-900 mb-4">Ketentuan Pengguna</h2>
    <p class="text-lg text-gray-600 mb-2">Perjanjian Penggunaan Layanan Arsip Digital</p>
    <p class="text-sm text-gray-500">Berlaku sejak: 1 Januari 2025</p>
  </div>

  <!-- Quick Summary -->
  <div class="bg-amber-50 border-l-4 border-amber-500 rounded-lg p-6 mb-12 shadow-sm animate-on-scroll delay-1">
    <p class="text-gray-800 flex items-start gap-3">
      <span class="text-2xl flex-shrink-0">⚠️</span>
      <span><strong class="text-gray-900">Penting:</strong> Dengan mengakses dan menggunakan Layanan Arsip Digital, Anda secara otomatis menyetujui semua ketentuan di bawah ini. Jika Anda tidak setuju, harap hentikan penggunaan layanan ini.</span>
    </p>
  </div>

  <!-- Content Sections -->
  <div class="space-y-8">

    <!-- Section 1: Definisi -->
    <section class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-2">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Definisi & Istilah</h3>
      <div class="space-y-4">
        <div class="pb-4 border-b border-gray-200 last:border-0 animate-on-scroll delay-1">
          <p class="font-semibold text-gray-900 mb-2">Layanan</p>
          <p class="text-gray-700">Platform digital untuk penyimpanan, pengorganisasian, dan penelusuran dokumen arsip yang disediakan oleh institusi pemerintah</p>
        </div>
        <div class="pb-4 border-b border-gray-200 last:border-0 animate-on-scroll delay-2">
          <p class="font-semibold text-gray-900 mb-2">Pengguna</p>
          <p class="text-gray-700">Setiap individu yang telah terdaftar dan memiliki akun aktif untuk menggunakan Layanan Arsip Digital</p>
        </div>
        <div class="pb-4 border-b border-gray-200 last:border-0 animate-on-scroll delay-3">
          <p class="font-semibold text-gray-900 mb-2">Dokumen</p>
          <p class="text-gray-700">Berkas atau file dalam berbagai format (PDF, Word, Excel, dsb) yang disimpan dalam sistem</p>
        </div>
        <div class="animate-on-scroll delay-4">
          <p class="font-semibold text-gray-900 mb-2">Akses</p>
          <p class="text-gray-700">Kemampuan untuk melihat, mengunduh, atau melakukan operasi lainnya terhadap dokumen</p>
        </div>
      </div>
    </section>

    <!-- Section 2: Pendaftaran & Akun -->
    <section class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-3">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Pendaftaran & Pengelolaan Akun</h3>
      <div class="space-y-6">
        <div class="border-l-4 border-blue-600 pl-4 animate-on-scroll delay-1">
          <h4 class="font-semibold text-gray-900 mb-3">2.1 Persyaratan Pendaftaran</h4>
          <ul class="text-gray-700 text-sm space-y-2">
            <li class="flex items-start gap-2">
              <span class="text-blue-600 font-bold">✓</span>
              <span>Harus merupakan pegawai/staf institusi atau pengguna yang berwenang</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-blue-600 font-bold">✓</span>
              <span>Harus memberikan informasi identitas yang akurat dan lengkap</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-blue-600 font-bold">✓</span>
              <span>Harus berusia minimal 18 tahun</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-blue-600 font-bold">✓</span>
              <span>Harus menerima Kebijakan Privasi dan Ketentuan Pengguna ini</span>
            </li>
          </ul>
        </div>
        <div class="border-l-4 border-blue-600 pl-4 animate-on-scroll delay-2">
          <h4 class="font-semibold text-gray-900 mb-2">2.2 Keamanan Akun</h4>
          <p class="text-gray-700 text-sm">Anda bertanggung jawab untuk menjaga kerahasiaan password dan akun Anda. Segera laporkan jika terjadi akses tidak sah atau penggunaan akun yang mencurigakan.</p>
        </div>
        <div class="border-l-4 border-blue-600 pl-4 animate-on-scroll delay-3">
          <h4 class="font-semibold text-gray-900 mb-2">2.3 Penangguhan Akun</h4>
          <p class="text-gray-700 text-sm">Kami berhak menangguhkan atau menghapus akun yang melanggar ketentuan tanpa pemberitahuan sebelumnya.</p>
        </div>
      </div>
    </section>

    <!-- Section 3: Penggunaan Layanan -->
    <section class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-4">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Penggunaan Layanan</h3>
      <p class="text-gray-700 mb-6 font-semibold">Anda setuju untuk TIDAK melakukan hal-hal berikut:</p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-on-scroll delay-1">
          <p class="text-red-900 font-semibold mb-2 flex items-center gap-2">
            <span>❌</span> Akses Tidak Sah
          </p>
          <p class="text-sm text-gray-700">Mengakses dokumen yang tidak Anda miliki otorisasi untuk diakses</p>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-on-scroll delay-2">
          <p class="text-red-900 font-semibold mb-2 flex items-center gap-2">
            <span>❌</span> Modifikasi Sistem
          </p>
          <p class="text-sm text-gray-700">Mencoba mengubah, mengganggu, atau meretas sistem layanan</p>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-on-scroll delay-3">
          <p class="text-red-900 font-semibold mb-2 flex items-center gap-2">
            <span>❌</span> Penyebaran Malware
          </p>
          <p class="text-sm text-gray-700">Mengunggah atau menyebarkan virus, malware, atau kode berbahaya</p>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-on-scroll delay-4">
          <p class="text-red-900 font-semibold mb-2 flex items-center gap-2">
            <span>❌</span> Penyalahgunaan Data
          </p>
          <p class="text-sm text-gray-700">Membagikan atau menggunakan data untuk tujuan yang tidak sah</p>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-on-scroll delay-5">
          <p class="text-red-900 font-semibold mb-2 flex items-center gap-2">
            <span>❌</span> Spam & Harassment
          </p>
          <p class="text-sm text-gray-700">Mengirim pesan spam atau melakukan pelecehan kepada pengguna lain</p>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-on-scroll delay-6">
          <p class="text-red-900 font-semibold mb-2 flex items-center gap-2">
            <span>❌</span> Pelanggaran Hukum
          </p>
          <p class="text-sm text-gray-700">Menggunakan layanan untuk tujuan yang melanggar hukum</p>
        </div>
      </div>
    </section>

    <!-- Section 4: Hak Cipta & Kepemilikan -->
    <section class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-5">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Hak Cipta & Kepemilikan Intelektual</h3>
      <div class="space-y-4 text-gray-700">
        <p class="animate-on-scroll delay-1"><strong class="text-gray-900">4.1 Hak Institusi:</strong> Semua konten, desain, dan fungsionalitas Layanan Arsip Digital adalah milik institusi dan dilindungi oleh hukum hak cipta.</p>
        <p class="animate-on-scroll delay-2"><strong class="text-gray-900">4.2 Hak Pengguna:</strong> Anda mempertahankan hak cipta atas dokumen yang Anda upload, namun memberikan lisensi kepada institusi untuk menyimpan, mengelola, dan memberikan akses kepada pengguna yang berwenang.</p>
        <p class="animate-on-scroll delay-3"><strong class="text-gray-900">4.3 Larangan Reproduksi:</strong> Anda tidak diperbolehkan mereproduksi, mendistribusikan, atau menggunakan konten layanan tanpa izin tertulis dari institusi.</p>
      </div>
    </section>

    <!-- Section 5: Tanggung Jawab Hukum -->
    <section class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-6">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Tanggung Jawab & Batasan Kewajiban</h3>
      <div class="space-y-4">
        <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-600 animate-on-scroll delay-1">
          <h4 class="font-semibold text-gray-900 mb-2">5.1 Disclaimer</h4>
          <p class="text-gray-700 text-sm">Layanan disediakan "sebagaimana adanya" tanpa jaminan. Institusi tidak bertanggung jawab atas kerusakan, kehilangan data, atau gangguan layanan yang tidak terduga.</p>
        </div>
        <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-600 animate-on-scroll delay-2">
          <h4 class="font-semibold text-gray-900 mb-2">5.2 Uptime Layanan</h4>
          <p class="text-gray-700 text-sm">Kami berusaha menjaga uptime layanan 99.5%, namun tidak menjamin ketersediaan 24/7. Pemeliharaan rutin dapat menyebabkan downtime.</p>
        </div>
        <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-600 animate-on-scroll delay-3">
          <h4 class="font-semibold text-gray-900 mb-2">5.3 Limitasi Kewajiban</h4>
          <p class="text-gray-700 text-sm">Institusi tidak bertanggung jawab atas kerugian tidak langsung, kehilangan data, atau biaya yang timbul dari penggunaan layanan ini.</p>
        </div>
      </div>
    </section>

    <!-- Section 6: Perubahan Layanan -->
    <section class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm animate-on-scroll delay-7">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Perubahan & Penutupan Layanan</h3>
      <div class="space-y-4 text-gray-700">
        <p class="animate-on-scroll delay-1"><strong class="text-gray-900">6.1 Modifikasi Layanan:</strong> Kami berhak mengubah, menambah, atau mengurangi fitur layanan kapan saja dengan atau tanpa pemberitahuan.</p>
        <p class="animate-on-scroll delay-2"><strong class="text-gray-900">6.2 Penutupan:</strong> Institusi dapat menutup layanan ini dengan pemberitahuan minimal 30 hari sebelumnya.</p>
        <p class="animate-on-scroll delay-3"><strong class="text-gray-900">6.3 Backup Data:</strong> Pengguna direkomendasikan untuk membuat backup data mereka secara berkala.</p>
      </div>
    </section>

    <!-- Section 7: Bantuan Teknis -->
    <section class="bg-blue-50 border border-blue-300 rounded-lg p-8 shadow-sm animate-on-scroll delay-1">
      <h3 class="text-2xl font-bold text-gray-900 mb-6">Dukungan & Kontak</h3>
      <p class="text-gray-700 mb-6">Jika Anda memiliki pertanyaan tentang Ketentuan Pengguna ini atau memerlukan bantuan teknis:</p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-5 rounded-lg border border-blue-200 animate-on-scroll delay-1">
          <h4 class="font-semibold text-gray-900 mb-3 flex items-center gap-2">
            <span class="text-xl">✉️</span> Email Support
          </h4>
          <a href="mailto:support@arsip.go.id" class="text-blue-600 hover:text-blue-900 font-semibold block mb-3 transition">support@arsip.go.id</a>
          <a href="mailto:legal@arsip.go.id" class="text-blue-600 hover:text-blue-900 font-semibold transition">legal@arsip.go.id</a>
        </div>
        <div class="bg-white p-5 rounded-lg border border-blue-200 animate-on-scroll delay-2">
          <h4 class="font-semibold text-gray-900 mb-3 flex items-center gap-2">
            <span class="text-xl">📱</span> Telepon & Alamat
          </h4>
          <p class="text-gray-900 font-semibold mb-2">+62-274-XXXX-XXXX</p>
          <p class="text-gray-700 text-sm">Jl. Arsip No. 123, Jakarta<br/>Jam Layanan: Senin-Jumat, 08:00-16:00 WIB</p>
        </div>
      </div>
    </section>

  </div>

  <!-- Footer -->
  <div class="mt-12 p-6 bg-gray-100 border border-gray-200 rounded-lg text-center text-gray-600 text-sm animate-on-scroll delay-2">
    <p>Ketentuan Pengguna ini merupakan perjanjian mengikat antara Anda dan institusi.</p>
    <p class="mt-2">Versi terbaru: 1.0 | Efektif sejak 1 Januari 2025</p>
    <p class="mt-3">© 2025 Layanan Arsip DSDM IPB University. Semua hak dilindungi.</p>
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