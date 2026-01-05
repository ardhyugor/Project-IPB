<!-- COMPANY PROFILE SECTION -->
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

    .scroll-fade-in {
      animation: fadeIn 0.8s ease-out forwards;
    }

    /* Ensure images are visible and properly sized */
    [data-carousel-item] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    [data-carousel-item] img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Custom click zones overlay */
    .click-zone {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 40%;
      z-index: 35;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .click-zone:hover {
      background-color: rgba(0, 0, 0, 0.1);
    }

    .click-zone-left {
      left: 0;
    }

    .click-zone-right {
      right: 0;
    }

    /* Hover icons */
    .hover-icon {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none;
    }

    .click-zone:hover .hover-icon {
      opacity: 1;
    }

    .hover-icon-left {
      left: 20px;
    }

    .hover-icon-right {
      right: 20px;
    }

    /* Slider dots custom styling */
    [data-carousel-slide-to] {
      background-color: rgba(255, 255, 255, 0.5);
      transition: all 0.3s ease;
    }

    [data-carousel-slide-to][aria-current="true"] {
      background-color: white;
      transform: scale(1.3);
    }

    /* Hide default controls */
    [data-carousel-prev],
    [data-carousel-next] {
      display: none !important;
    }

    /* Overlay gradient */
    .slider-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
      z-index: 5;
      pointer-events: none;
    }
  </style>

<section id="company-profile"
  class="relative bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-16 lg:py-24 overflow-hidden">
  <!-- Background Decoration -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div
      class="absolute -top-40 -right-40 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
    </div>
    <div
      class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
    </div>
    <div
      class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
    </div>
  </div>

  <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
    <!-- Header -->
    <div class="text-center mb-12 lg:mb-16 scroll-fade-in opacity-0">
      <div class="inline-flex items-center justify-center p-2 bg-indigo-100 rounded-full mb-4">
        <span class="px-4 py-1 text-sm font-semibold text-indigo-700">Tentang Kami</span>
      </div>
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
        Company Profile
      </h2>
      <p class="text-base lg:text-lg text-gray-600 max-w-3xl mx-auto px-4">
        Ruang Arsip PAU SDM Rektorat IPB - Mengelola aset informasi dengan profesional dan terpercaya
      </p>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12 lg:mb-16">
      <!-- Left: Image Slider -->
      <div class="scroll-fade-in opacity-0" style="animation-delay: 0.2s;">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4" style="aspect-ratio: 4/3;">
          
          <!-- Flowbite Carousel -->
          <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden rounded-lg">
              <!-- Item 1 -->
              <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&q=80"
                  alt="Ruang Arsip IPB 1">
              </div>
              <!-- Item 2 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=1200&q=80"
                  alt="Ruang Arsip IPB 2">
              </div>
              <!-- Item 3 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=1200&q=80"
                  alt="Ruang Arsip IPB 3">
              </div>
            </div>

            <!-- Overlay gradient -->
            <div class="slider-overlay"></div>

            <!-- Custom Click Zones -->
            <div class="click-zone click-zone-left" id="clickZoneLeft">
              <div class="hover-icon hover-icon-left bg-white/80 rounded-full p-3 shadow-lg">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </div>
            </div>
            <div class="click-zone click-zone-right" id="clickZoneRight">
              <div class="hover-icon hover-icon-right bg-white/80 rounded-full p-3 shadow-lg">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </div>
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
              <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
              <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
              <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>

            <!-- Hidden default controls (required by Flowbite) -->
            <button type="button" data-carousel-prev></button>
            <button type="button" data-carousel-next></button>
          </div>

        </div>
      </div>

      <!-- Right: Description -->
      <div class="scroll-fade-in opacity-0" style="animation-delay: 0.3s;">
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4 lg:mb-6">
          Tentang Ruang Arsip PAU SDM
        </h3>
        <div class="space-y-3 lg:space-y-4 text-sm lg:text-base text-gray-700 leading-relaxed">
          <p>
            <strong>Ruang Arsip PAU SDM Rektorat IPB</strong> merupakan unit pengelola arsip yang berada di bawah
            naungan Direktorat Sumber Daya Manusia Institut Pertanian Bogor. Kami berkomitmen untuk menjaga,
            mengelola, dan menyediakan akses terhadap dokumen-dokumen penting institusi dengan standar profesional
            tertinggi.
          </p>
          <p>
            Dengan sistem manajemen arsip yang terstruktur dan modern, kami memastikan setiap dokumen tersimpan dengan
            aman, terorganisir dengan baik, dan dapat diakses dengan mudah oleh pihak yang berwenang. Ruang arsip kami
            dilengkapi dengan fasilitas penyimpanan yang memenuhi standar kearsipan nasional.
          </p>
          <p>
            Tim kami terdiri dari tenaga profesional yang terlatih dalam bidang kearsipan, siap memberikan layanan
            terbaik untuk kebutuhan dokumentasi dan informasi Anda. Kami terus berinovasi dalam menerapkan teknologi
            digital untuk meningkatkan efisiensi pengelolaan arsip.
          </p>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-3 gap-4 lg:gap-6 mt-6 lg:mt-8 pt-6 lg:pt-8 border-t border-gray-200">
          <div class="text-center">
            <p class="text-2xl lg:text-3xl font-bold text-indigo-600">10K+</p>
            <p class="text-xs lg:text-sm text-gray-600 mt-1">Dokumen Tersimpan</p>
          </div>
          <div class="text-center">
            <p class="text-2xl lg:text-3xl font-bold text-indigo-600">500+</p>
            <p class="text-xs lg:text-sm text-gray-600 mt-1">Layanan/Bulan</p>
          </div>
          <div class="text-center">
            <p class="text-2xl lg:text-3xl font-bold text-indigo-600">99%</p>
            <p class="text-xs lg:text-sm text-gray-600 mt-1">Kepuasan</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Video Section -->
    <div class="mb-12 lg:mb-16 scroll-fade-in opacity-0" style="animation-delay: 0.4s;">
      <div class="text-center mb-8">
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">Ruang Arsip</h3>
        <p class="text-sm lg:text-base text-gray-600 max-w-2xl mx-auto px-4">
          Tonton video kami untuk mengenal lebih dekat Ruang Arsip PAU SDM IPB
        </p>
      </div>

      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
          <!-- Right Video -->
          <div class="scroll-fade-in opacity-0" style="animation-delay: 0.3s;">
            <div class="w-full bg-black rounded-xl shadow-2xl ring-1 ring-gray-400/10 overflow-hidden">
              <div class="relative w-full bg-black" style="aspect-ratio: 16/9;">
                <!-- Video Container -->
                <video width="100%" height="100%" controls controlsList="nodownload" class="w-full h-full object-cover"
                  poster="https://via.placeholder.com/1280x720/1a1a1a/ffffff?text=Video+Panduan+Layanan+Arsip">
                  <source id="videoSource" src="img/dummy.mp4" type="video/mp4">
                  <p class="text-white">Maaf, browser Anda tidak mendukung video HTML5.</p>
                </video>

                <!-- Fallback if video not available -->
                <div
                  class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-indigo-800 to-indigo-700 flex flex-col items-center justify-center text-white p-6 hidden">
                  <svg class="w-20 h-20 mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <h3 class="text-2xl font-bold text-center">Video Ruang Arsip</h3>
                  <p class="text-sm text-indigo-200 mt-3 text-center">Layanan Arsip</p>
                  <p class="text-xs text-indigo-300 mt-6 text-center px-4">Paste URL video Anda pada attribute src</p>
                </div>
              </div>

              <!-- Video Info -->
              <div class="bg-white p-4">
                <h3 class="font-semibold text-gray-900 text-base">Video Panduan Layanan Arsip</h3>
                <p class="text-sm text-gray-600 mt-2">Tonton video ini untuk memahami seluruh proses layanan arsip
                  secara detail dan visual. Video akan membantu Anda memahami setiap langkah dengan lebih mudah.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Vision & Mission -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 mb-12 lg:mb-16">
      <!-- Vision -->
      <div class="scroll-fade-in opacity-0" style="animation-delay: 0.5s;">
        <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-8 h-full hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-center gap-3 lg:gap-4 mb-4 lg:mb-6">
            <div
              class="flex-shrink-0 w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </div>
            <h3 class="text-xl lg:text-2xl font-bold text-gray-900">Visi Kami</h3>
          </div>
          <p class="text-sm lg:text-base text-gray-700 leading-relaxed">
            Menjadi pusat pengelolaan arsip terdepan yang profesional, terpercaya, dan inovatif dalam mendukung
            tata kelola informasi Institut Pertanian Bogor, serta menjadi rujukan dalam praktik terbaik manajemen
            kearsipan di lingkungan perguruan tinggi Indonesia.
          </p>
        </div>
      </div>

      <!-- Mission -->
      <div class="scroll-fade-in opacity-0" style="animation-delay: 0.6s;">
        <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-8 h-full hover:shadow-2xl transition-shadow duration-300">
          <div class="flex items-center gap-3 lg:gap-4 mb-4 lg:mb-6">
            <div
              class="flex-shrink-0 w-12 h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
              </svg>
            </div>
            <h3 class="text-xl lg:text-2xl font-bold text-gray-900">Misi Kami</h3>
          </div>
          <ul class="space-y-2 lg:space-y-3 text-sm lg:text-base text-gray-700">
            <li class="flex gap-2 lg:gap-3">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span>Mengelola arsip dengan sistem yang terstandar dan terdigitalisasi</span>
            </li>
            <li class="flex gap-2 lg:gap-3">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span>Memberikan layanan akses arsip yang cepat, akurat, dan aman</span>
            </li>
            <li class="flex gap-2 lg:gap-3">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span>Meningkatkan kompetensi SDM dalam pengelolaan kearsipan</span>
            </li>
            <li class="flex gap-2 lg:gap-3">
              <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              <span>Menjaga keamanan dan kerahasiaan dokumen institusi</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Core Values -->
    <div class="scroll-fade-in opacity-0" style="animation-delay: 0.7s;">
      <div class="text-center mb-8 lg:mb-12">
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3 lg:mb-4">Nilai-Nilai Kami</h3>
        <p class="text-sm lg:text-base text-gray-600 max-w-2xl mx-auto px-4">
          Prinsip yang menjadi fondasi dalam setiap layanan yang kami berikan
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <!-- Value 1 -->
        <div
          class="bg-white rounded-xl shadow-lg p-5 lg:p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-indigo-600">
          <div class="w-10 h-10 lg:w-12 lg:h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-3 lg:mb-4">
            <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>
          <h4 class="text-base lg:text-lg font-bold text-gray-900 mb-2">Integritas</h4>
          <p class="text-xs lg:text-sm text-gray-600">Menjaga kepercayaan dengan kejujuran dan transparansi dalam
            setiap tindakan</p>
        </div>

        <!-- Value 2 -->
        <div
          class="bg-white rounded-xl shadow-lg p-5 lg:p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-blue-600">
          <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-3 lg:mb-4">
            <svg class="w-5 h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h4 class="text-base lg:text-lg font-bold text-gray-900 mb-2">Profesionalisme</h4>
          <p class="text-xs lg:text-sm text-gray-600">Bekerja dengan standar tinggi dan dedikasi penuh untuk hasil
            terbaik</p>
        </div>

        <!-- Value 3 -->
        <div
          class="bg-white rounded-xl shadow-lg p-5 lg:p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-purple-600">
          <div class="w-10 h-10 lg:w-12 lg:h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-3 lg:mb-4">
            <svg class="w-5 h-5 lg:w-6 lg:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
          </div>
          <h4 class="text-base lg:text-lg font-bold text-gray-900 mb-2">Inovasi</h4>
          <p class="text-xs lg:text-sm text-gray-600">Terus berinovasi mengadopsi teknologi untuk efisiensi
            layanan</p>
        </div>

        <!-- Value 4 -->
        <div
          class="bg-white rounded-xl shadow-lg p-5 lg:p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-cyan-600">
          <div class="w-10 h-10 lg:w-12 lg:h-12 bg-cyan-100 rounded-lg flex items-center justify-center mb-3 lg:mb-4">
            <svg class="w-5 h-5 lg:w-6 lg:h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <h4 class="text-base lg:text-lg font-bold text-gray-900 mb-2">Kolaborasi</h4>
          <p class="text-xs lg:text-sm text-gray-600">Bekerja sama dengan berbagai pihak untuk hasil yang optimal
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

 <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script>
    let autoSlideInterval = null;
    const autoSlideDelay = 3000; // 3 seconds

    // Wait for page to fully load
    window.addEventListener('load', function() {
      const carousel = document.getElementById('default-carousel');
      const clickZoneLeft = document.getElementById('clickZoneLeft');
      const clickZoneRight = document.getElementById('clickZoneRight');

      // Initialize Flowbite carousel manually
      const items = [];
      const carouselItems = carousel.querySelectorAll('[data-carousel-item]');
      
      carouselItems.forEach((item, index) => {
        items.push({
          position: index,
          el: item
        });
      });

      const options = {
        defaultPosition: 0,
        interval: 3000,
        indicators: {
          activeClasses: 'bg-white',
          inactiveClasses: 'bg-white/50 hover:bg-white',
          items: Array.from(carousel.querySelectorAll('[data-carousel-slide-to]')).map((el, index) => ({
            position: index,
            el: el
          }))
        }
      };

      const carouselInstance = new Carousel(carousel, items, options);

      // Custom click zone handlers
      clickZoneLeft.addEventListener('click', function(e) {
        e.stopPropagation();
        carouselInstance.prev();
      });

      clickZoneRight.addEventListener('click', function(e) {
        e.stopPropagation();
        carouselInstance.next();
      });

      // Auto-slide on hover
      function startAutoSlide() {
        if (autoSlideInterval) return;
        
        autoSlideInterval = setInterval(() => {
          carouselInstance.next();
        }, autoSlideDelay);
      }

      function stopAutoSlide() {
        if (autoSlideInterval) {
          clearInterval(autoSlideInterval);
          autoSlideInterval = null;
        }
      }

      // Event listeners for hover
      carousel.addEventListener('mouseenter', startAutoSlide);
      carousel.addEventListener('mouseleave', stopAutoSlide);

      // Make sure first image is shown
      carouselInstance.slideTo(0);
    });
  </script>