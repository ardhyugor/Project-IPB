<section id="beranda"></section>
<script src="https://cdn.tailwindcss.com"></script>
<div class="relative isolate w-full min-h-screen px-6 pt-14 lg:px-8 overflow-hidden">
  
  <!-- LAYER BACKGROUND FOTO -->
  <div class="absolute inset-0 bg-cover bg-center bg-no-repeat -z-20"
       style="background-image: url('https://dui.ipb.ac.id/wp-content/uploads/2023/07/rektorat.jpg'); background-attachment: fixed;">
  </div>
  
  <!-- LAYER OVERLAY GRADIENT BIRU IPB - SMOOTH BLEND -->
  <div class="absolute inset-0 -z-10" style="background: linear-gradient(180deg, rgba(29, 78, 216, 0.80) 75%, rgba(30, 58, 138, 0.80) 25%, rgba(37, 99, 235, 0.75) 50%, rgba(29, 78, 216, 0.80) 75%, rgba(30, 64, 175, 0.85) 100%);"></div>
  
  <!-- ISI KONTEN -->
  <div class="relative z-0 mx-auto max-w-4xl py-32 sm:py-48 lg:py-56 text-white">
    
    <!-- Banner Info - Typing Animation -->
    <div class="hidden sm:mb-8 sm:flex sm:justify-center">
      <div class="relative rounded-full px-4 py-2 text-sm font-medium bg-white/15 backdrop-blur-md ring-1 ring-white/30 hover:bg-white/20 transition-all">
        <span class="text-gray-100 h-6 inline-block">
          <span id="typingText"></span><span class="animate-pulse">|</span>
        </span>
      </div>
    </div>
    <!-- Main Content - Fade In Animation -->
    <div class="text-center opacity-0 animate-fadeIn" style="animation-delay: 0.5s;">
      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white drop-shadow-lg">
        Layanan Arsip SDM 2025 <br class="hidden sm:inline" />
        <span class="text-yellow-300">Direktorat IPB University</span>
      </h1>
      
      <p class="mt-8 text-lg sm:text-xl text-gray-100 font-medium leading-relaxed drop-shadow">
        Mengelola arsip SDM secara aman, cepat, dan akurat
      </p>
      
      <p class="mt-4 text-sm sm:text-base text-gray-200 drop-shadow">
        Layanan Arsip SDM Direktorat IPB University
      </p>
      <!-- CTA Buttons -->
      <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="#layanan" 
           class="rounded-lg px-8 py-3 text-sm sm:text-base font-semibold text-white bg-white/10 backdrop-blur hover:bg-white/20 transition-all duration-300 border border-white/30">
          Get Started
        </a>
      </div>
    </div>
  </div>
  <!-- Scroll indicator (optional) -->
  <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce z-20">
    <a href="#layanan">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
      </svg>
    </a>
  </div>
</div>
<style>
  html {
    scroll-behavior: smooth;
  }
  
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
  
  .animate-fadeIn {
    animation: fadeIn 0.8s ease-out forwards;
  }
</style>

<script>
  // Typing Animation untuk banner - Repeat
  const typingText = document.getElementById('typingText');
  const fullText = 'Amankan Rawat Semua Informasi Penting';
  let index = 0;
  let isDeleting = false;
  
  function typeText() {
    if (!isDeleting && index < fullText.length) {
      // Mode mengetik
      typingText.textContent += fullText.charAt(index);
      index++;
      setTimeout(typeText, 50); // Kecepatan ketik 80ms per karakter
    } else if (!isDeleting && index === fullText.length) {
      // Tunggu sebelum mulai menghapus
      setTimeout(() => {
        isDeleting = true;
        typeText();
      }, 1000); // Jeda 2 detik sebelum menghapus
    } else if (isDeleting && index > 0) {
      // Mode menghapus
      typingText.textContent = fullText.substring(0, index - 1);
      index--;
      setTimeout(typeText, 50); // Kecepatan hapus 50ms per karakter
    } else if (isDeleting && index === 0) {
      // Tunggu sebelum mulai mengetik lagi
      isDeleting = false;
      setTimeout(typeText, 500); // Jeda 0.5 detik sebelum mengetik lagi
    }
  }
  
  // Mulai animasi ketik saat halaman load
  window.addEventListener('load', () => {
    typeText();
  });
</script>