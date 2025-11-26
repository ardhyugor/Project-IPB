<section id="data"></section>
<script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @keyframes scrollFadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes countUp {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .scroll-fade-in {
      opacity: 0;
      transform: translateY(30px);
    }

    .scroll-fade-in.animate {
      animation: scrollFadeIn 0.8s ease-out forwards;
    }

    .stat-card {
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .counter {
      font-weight: 700;
      font-size: 2.25rem;
      color: #1f2937;
    }
  </style>
</head>
<body class="bg-gray-50">

<!-- Statistics Section -->
<section id="statistik" class="container mx-auto px-4 py-20">
  
  <!-- Header -->
  <div class="text-center mb-16">
    <div class="inline-block bg-blue-50 px-6 py-2 rounded-full mb-4 scroll-fade-in opacity-0">
      <p class="text-blue-700 text-sm font-semibold tracking-wide uppercase">Sistem Informasi Kearsipan</p>
    </div>
    <h2 class="text-gray-800 text-3xl md:text-4xl font-bold max-w-4xl mx-auto leading-relaxed mb-3 scroll-fade-in opacity-0" style="animation-delay: 0.1s;">
      Statistik Data Kepegawaian dan Layanan
    </h2>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto scroll-fade-in opacity-0" style="animation-delay: 0.2s;">
      Informasi terkini mengenai data kepegawaian, dokumen, dan layanan instansi
    </p>
  </div>

  <!-- Statistics Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
    
    <!-- Card 1 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.3s;">
      <div class="bg-white border-2 border-blue-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-blue-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-network-wired text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="2496">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">Total Layanan</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.35s;">
      <div class="bg-white border-2 border-emerald-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-emerald-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-book-open text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="613">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">Buku/Jurnal</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.4s;">
      <div class="bg-white border-2 border-slate-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-slate-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-user-slash text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="1660">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">Status IN-aktif</p>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.45s;">
      <div class="bg-white border-2 border-amber-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-amber-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-file-contract text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="7">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">Tenaga Kontrak</p>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.5s;">
      <div class="bg-white border-2 border-teal-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-teal-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-users-line text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="342">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">Tenaga Tetap</p>
      </div>
    </div>

    <!-- Card 6 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.55s;">
      <div class="bg-white border-2 border-indigo-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-indigo-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-id-badge text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="2001">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">PNS/CPNS Aktif</p>
      </div>
    </div>

    <!-- Card 7 -->
    <div class="stat-card scroll-fade-in opacity-0" style="animation-delay: 0.6s;">
      <div class="bg-white border-2 border-purple-100 rounded-xl p-6 h-full hover:border-gray-300 transition-all duration-300">
        <div class="flex justify-center mb-5">
          <div class="w-16 h-16 bg-purple-500 rounded-lg flex items-center justify-center shadow-sm">
            <i class="fas fa-user-check text-2xl text-white"></i>
          </div>
        </div>
        <div class="text-center mb-2">
          <h3 class="counter" data-target="1591">0</h3>
        </div>
        <p class="text-gray-600 text-center text-base font-medium">PNS Pensiun</p>
      </div>
    </div>

  </div>

  <!-- Footer Info -->
  <div class="text-center mt-12">
    <div class="inline-flex items-center gap-2 bg-white border border-gray-200 rounded-lg px-6 py-3 shadow-sm scroll-fade-in opacity-0" style="animation-delay: 0.65s;">
      <i class="fas fa-calendar-alt text-gray-500"></i>
      <p class="text-gray-700 text-sm">
        Data diperbarui: <span class="font-semibold text-gray-900" id="updateDate"></span>
      </p>
    </div>
  </div>

</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer untuk scroll fade-in
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate');
          
          // Trigger counter animation saat card masuk viewport
          if (entry.target.classList.contains('stat-card') && !entry.target.dataset.animated) {
            const counters = entry.target.querySelectorAll('.counter');
            counters.forEach(counter => {
              animateCounter(counter);
            });
            // Tandai bahwa elemen sudah dianimasi
            entry.target.dataset.animated = 'true';
          }
        }
      });
    }, {
      threshold: 0.1
    });

    document.querySelectorAll('.scroll-fade-in').forEach((element) => {
      observer.observe(element);
    });

    // Counter Animation
    function animateCounter(element) {
      const target = parseInt(element.getAttribute('data-target'));
      const duration = 1500; // 1.5 detik
      const increment = target / (duration / 16); // 60fps
      let current = 0;

      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          element.textContent = target.toLocaleString('id-ID');
          clearInterval(timer);
        } else {
          element.textContent = Math.floor(current).toLocaleString('id-ID');
        }
      }, 16);
    }

    // Set tanggal update
    const today = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('updateDate').textContent = today.toLocaleDateString('id-ID', options);
  });
</script>

</body>
</html>