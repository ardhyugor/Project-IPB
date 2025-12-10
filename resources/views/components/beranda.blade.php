<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layanan Arsip - Direktorat SDM IPB</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
  <!-- HERO SECTION FIXED -->
  <section id="beranda" class="relative min-h-screen overflow-hidden">

    <!-- RIGHT IMAGE AREA (FIXED — no blur, full cover, polygon tetap) -->
    <div class="absolute inset-0 bg-no-repeat" style="clip-path: polygon(50% 0, 100% 0, 100% 100%, 60% 100%);">

      <img src="img/Gedung-AHN-IPB.jpg" class="w-full h-full object-cover object-center translate-x-1/3"
        alt="Gedung Rektorat IPB">

      <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-slate-800/50 to-black/60"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/20"></div>
    </div>

    <!-- LEFT WHITE BACKGROUND -->
    <div class="absolute inset-0 bg-white" style="clip-path: polygon(0 0, 50% 0, 60% 100%, 0 100%);"></div>

    <!-- LEFT CONTENT PROPERLY ALIGNED -->
    <div class="relative z-20 min-h-screen flex items-center">
      <div class="w-full max-w-8xl mx-auto pl-12 sm:pl-20 lg:pl-24 py-28">

        <!-- LIMIT WIDTH OF LEFT CONTENT (FIXED) -->
        <div class="hero-content">

          <!-- Badge -->
          <div class="mb-6 inline-block animate-fadeIn">
            <div
              class="relative rounded-full px-5 py-2 text-sm font-semibold bg-blue-50 text-blue-700 border border-blue-200">
              <span id="typingText"></span>
              <span class="animate-blink ml-0.5">|</span>
            </div>
          </div>

          <!-- MAIN TITLE -->
          <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
            Layanan Arsip SDM 2025
          </h1>

          <h2 class="mt-2 text-4xl lg:text-5xl font-extrabold text-blue-700 leading-tight">
            Direktorat IPB University
          </h2>

          <!-- Descriptions -->
          <div class="mt-6 animate-fadeInUp" style="animation-delay: .4s">
            <p class="text-lg sm:text-xl text-gray-700 font-semibold leading-relaxed">
              Mengelola arsip SDM secara aman, cepat, dan akurat
            </p>
            <p class="mt-3 text-sm sm:text-base text-gray-600 leading-relaxed">
              Solusi pengarsipan digital terpadu untuk Direktorat IPB University
            </p>
          </div>
          <!-- CTA -->
                <div class="mt-8 animate-fadeInUp" style="animation-delay: .5s">
                    <a href="#layanan"
                       class="inline-flex items-center gap-3 rounded-xl px-7 py-3.5 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition shadow-lg hover:shadow-xl">
                        Mulai Sekarang
                    </a>
                </div>

          <!-- Stats -->
          <div class="mt-12 grid grid-cols-3 gap-3 animate-fadeInUp" style="animation-delay: .6s">
            <div class="bg-gradient-to-br from-blue-50 to-white p-4 rounded-xl border border-blue-100 shadow-sm">
              <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-1">45K+</div>
              <div class="text-xs text-gray-600 font-medium">Dokumen Arsip</div>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-white p-4 rounded-xl border border-blue-100 shadow-sm">
              <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-1">98.5%</div>
              <div class="text-xs text-gray-600 font-medium">System Uptime</div>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-white p-4 rounded-xl border border-blue-100 shadow-sm">
              <div class="text-2xl sm:text-3xl font-bold text-blue-600 mb-1">1.2K+</div>
              <div class="text-xs text-gray-600 font-medium">Pengguna Aktif</div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Scroll Down -->
    <div class="absolute bottom-8 left-1/4 transform -translate-x-1/2 animate-bounce z-20">
      <a href="#layanan" class="block p-2 rounded-full bg-blue-100 border border-blue-200 hover:bg-blue-200 transition">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
      </a>
    </div>

  </section>



  <style>
    .hero-content {
      max-width: 550px;
      /* Batas agar konten kiri tidak melebar */
    }

    /* Fade In Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes blink {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }
    }

    .animate-fadeIn {
      animation: fadeIn 1s ease-out forwards;
    }

    .animate-fadeInUp {
      animation: fadeInUp 1s ease-out forwards;
      opacity: 0;
    }

    .animate-blink {
      animation: blink 1s infinite;
    }

    /* Smooth Scrolling */
    html {
      scroll-behavior: smooth;
    }

    /* Ensure proper layering */
    body {
      position: relative;
    }
  </style>

  <script>
    // Typing Animation
    const texts = [
      "Sistem Informasi Arsip Digital Terpadu",
      "Aman, Cepat, dan Terpercaya",
      "Solusi Pengarsipan Modern"
    ];
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typingElement = document.getElementById('typingText');

    function typeText() {
      const currentText = texts[textIndex];

      if (isDeleting) {
        typingElement.textContent = currentText.substring(0, charIndex - 1);
        charIndex--;
      } else {
        typingElement.textContent = currentText.substring(0, charIndex + 1);
        charIndex++;
      }

      if (!isDeleting && charIndex === currentText.length) {
        setTimeout(() => { isDeleting = true; }, 2000);
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        textIndex = (textIndex + 1) % texts.length;
      }

      const typingSpeed = isDeleting ? 50 : 100;
      setTimeout(typeText, typingSpeed);
    }

    // Start typing animation when page loads
    window.addEventListener('load', () => {
      setTimeout(typeText, 500);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>

</body>

</html>