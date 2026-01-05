<!-- NAVBAR -->
<header class="fixed top-0 left-0 w-full z-50 bg-blue-900/80 backdrop-blur-md">
    <div class="w-full px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo & Brand (Kiri) -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="/">
                    <img src="img/logos.png" class="h-12 w-12" alt="Logo IPB">
                </a>
                <div class="text-white">
                    <h1 class="text-xl font-bold">Layanan Arsip</h1>
                    <p class="text-xs text-gray-200">Ruang Arsip PAU Direktorat SDM IPB</p>
                </div>
            </div>

            <!-- Desktop Menu (Tengah) -->
            <div class="hidden md:flex items-center gap-6 flex-1 justify-center">
                <a href="#beranda" class="text-white hover:text-gray-300 font-medium transition whitespace-nowrap">Beranda</a>
                <a href="#layanan" class="text-white hover:text-gray-300 font-medium transition whitespace-nowrap">Layanan</a>
                <a href="#panduan" class="text-white hover:text-gray-300 font-medium transition whitespace-nowrap">Company Profile</a>
                <a href="#data" class="text-white hover:text-gray-300 font-medium transition whitespace-nowrap">Akumulasi Data</a>
                <a href="#information" class="text-white hover:text-gray-300 font-medium transition whitespace-nowrap">FAQ</a>

                <!-- Dropdown Tentang -->
                <div class="relative group">
                    <button class="text-white hover:text-gray-300 font-medium transition flex items-center gap-1 whitespace-nowrap">
                        Tentang Kami
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu Tentang -->
                    <div class="absolute left-0 mt-2 w-80 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-3 top-full">
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

                            <a href="#"
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
                            <a href="#"
                                class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-shield-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-sm text-gray-900">Kebijakan Privasi</h4>
                                    <p class="text-xs text-gray-600">Perlindungan data Anda</p>
                                </div>
                            </a>

                            <a href="#"
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

                <!-- Dropdown Gallery -->
                <div class="relative group">
                    <button class="text-white hover:text-gray-300 font-medium transition flex items-center gap-1 whitespace-nowrap">
                        Gallery
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu Gallery -->
                    <div class="absolute left-0 mt-2 w-80 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-3 top-full">
                        <div class="px-4 py-2">
                            <button onclick="openVideoOverlay('video1')"
                                class="w-full flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-play-circle text-blue-600"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="font-semibold text-sm text-gray-900">Prosedur Kearsipan Dasar</h4>
                                </div>
                            </button>

                            <button onclick="openVideoOverlay('video2')"
                                class="w-full flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-play-circle text-blue-600"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="font-semibold text-sm text-gray-900">Input Arsip Baru</h4>
                                </div>
                            </button>

                            <button onclick="openVideoOverlay('video3')"
                                class="w-full flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-play-circle text-blue-600"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="font-semibold text-sm text-gray-900">Mutasi Arsip</h4>
                                </div>
                            </button>

                            <button onclick="openVideoOverlay('video4')"
                                class="w-full flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-play-circle text-blue-600"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="font-semibold text-sm text-gray-900">Pemindahan Arsip Subdit</h4>
                                </div>
                            </button>

                            <button onclick="openVideoOverlay('video5')"
                                class="w-full flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-play-circle text-blue-600"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="font-semibold text-sm text-gray-900">Distribusi Berkas</h4>
                                </div>
                            </button>

                            <button onclick="openVideoOverlay('video6')"
                                class="w-full flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-play-circle text-blue-600"></i>
                                </div>
                                <div class="text-left">
                                    <h4 class="font-semibold text-sm text-gray-900">Peminjaman Arsip</h4>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Desktop (Kanan) -->
            <div class="hidden md:block flex-shrink-0">
                <a href="admin/login" class="text-white hover:text-gray-300 font-medium transition">Log in →</a>
            </div>

            <!-- Hamburger (Mobile) -->
            <button id="menuBtn" class="md:hidden text-white text-3xl">☰</button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="fixed top-0 right-[-100%] w-64 h-full bg-white shadow-lg transition-all duration-300 z-50 md:hidden overflow-y-auto">
        <div class="p-4 flex justify-between items-center border-b">
            <h2 class="text-lg font-semibold">Menu</h2>
            <button id="closeMenu" class="text-2xl">✕</button>
        </div>

        <div class="p-4 space-y-2">
            <a href="#beranda"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Beranda</a>
            <a href="#layanan"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Layanan</a>
            <a href="#panduan"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Panduan Layanan</a>
            <a href="#data"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Akumulasi Data</a>
            <a href="#information"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Faq</a>

            <!-- Mobile Dropdown Tentang -->
            <div>
                <button id="tentangToggle"
                    class="w-full flex items-center justify-between text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">
                    Tentang
                    <svg id="tentangIcon" class="w-4 h-4 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </button>

                <div id="tentangDropdown" class="hidden pl-4 space-y-2 mt-2">
                    <a href="#infografis"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📊 Infografis</a>
                    <a href="#layanan"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">💼 Layanan</a>
                    <a href="#"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">🏢 Unit Kerja</a>
                    <a href="#"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">🔒 Kebijakan Privasi</a>
                    <a href="#"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📜 Ketentuan Pengguna</a>
                </div>
            </div>

            <!-- Mobile Dropdown Gallery -->
            <div>
                <button id="galleryToggle"
                    class="w-full flex items-center justify-between text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">
                    Gallery
                    <svg id="galleryIcon" class="w-4 h-4 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </button>

                <div id="galleryDropdown" class="hidden pl-4 space-y-2 mt-2">
                    <button onclick="openVideoOverlay('video1')"
                        class="w-full text-left block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📋 Prosedur Kearsipan Dasar</button>
                    <button onclick="openVideoOverlay('video2')"
                        class="w-full text-left block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📥 Input Arsip Baru</button>
                    <button onclick="openVideoOverlay('video3')"
                        class="w-full text-left block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">🔄 Mutasi Arsip</button>
                    <button onclick="openVideoOverlay('video4')"
                        class="w-full text-left block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📦 Pemindahan Arsip Subdit</button>
                    <button onclick="openVideoOverlay('video5')"
                        class="w-full text-left block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">🚚 Distribusi Berkas</button>
                    <button onclick="openVideoOverlay('video6')"
                        class="w-full text-left block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📖 Peminjaman Arsip</button>
                </div>
            </div>

            <hr class="my-4">

            <a href="admin/login"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Log in</a>
        </div>
    </div>
</header>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Video Overlay Modal -->
<div id="videoOverlay" class="fixed inset-0 bg-black bg-opacity-75 z-[100] hidden items-center justify-center">
    <div class="relative w-full max-w-4xl mx-4">
        <!-- Close Button -->
        <button onclick="closeVideoOverlay()" class="absolute -top-12 right-0 text-white text-4xl hover:text-gray-300 transition">
            ✕
        </button>
        
        <!-- Video Container -->
        <div class="bg-black rounded-lg overflow-hidden">
            <video id="videoPlayer" class="w-full" controls>
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const closeMenu = document.getElementById('closeMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const tentangToggle = document.getElementById('tentangToggle');
    const tentangDropdown = document.getElementById('tentangDropdown');
    const tentangIcon = document.getElementById('tentangIcon');
    const galleryToggle = document.getElementById('galleryToggle');
    const galleryDropdown = document.getElementById('galleryDropdown');
    const galleryIcon = document.getElementById('galleryIcon');

    menuBtn.onclick = () => mobileMenu.style.right = "0";
    closeMenu.onclick = () => mobileMenu.style.right = "-100%";

    // Mobile Dropdown Toggle - Tentang
    tentangToggle.onclick = () => {
        tentangDropdown.classList.toggle('hidden');
        tentangIcon.style.transform = tentangDropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    };

    // Mobile Dropdown Toggle - Gallery
    galleryToggle.onclick = () => {
        galleryDropdown.classList.toggle('hidden');
        galleryIcon.style.transform = galleryDropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    };

    // Video Overlay Functions
    const videoOverlay = document.getElementById('videoOverlay');
    const videoPlayer = document.getElementById('videoPlayer');

    // Mapping video IDs to video URLs
    const videoLinks = {
        'video1': 'path/to/prosedur-kearsipan-dasar.mp4',
        'video2': 'path/to/input-arsip-baru.mp4',
        'video3': 'path/to/mutasi-arsip.mp4',
        'video4': 'path/to/pemindahan-arsip-subdit.mp4',
        'video5': 'path/to/distribusi-berkas.mp4',
        'video6': 'path/to/peminjaman-arsip.mp4'
    };

    function openVideoOverlay(videoId) {
        const videoSrc = videoLinks[videoId];
        if (videoSrc) {
            videoPlayer.src = videoSrc;
            videoOverlay.classList.remove('hidden');
            videoOverlay.classList.add('flex');
            videoPlayer.play();
            // Close mobile menu if open
            mobileMenu.style.right = "-100%";
        }
    }

    function closeVideoOverlay() {
        videoOverlay.classList.add('hidden');
        videoOverlay.classList.remove('flex');
        videoPlayer.pause();
        videoPlayer.src = '';
    }

    // Close overlay when clicking outside video
    videoOverlay.onclick = (e) => {
        if (e.target === videoOverlay) {
            closeVideoOverlay();
        }
    };

    // Close overlay with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !videoOverlay.classList.contains('hidden')) {
            closeVideoOverlay();
        }
    });
</script>