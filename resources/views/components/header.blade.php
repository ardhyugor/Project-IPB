<!-- NAVBAR -->
<header class="fixed top-0 left-0 w-full z-50 bg-blue-900/80 backdrop-blur-md">
    <div class="w-full px-6 py-4 flex items-center justify-between">
        <!-- Logo & Brand -->
        <div class="flex items-center gap-3">
            <a href="/">
                <img src="img/logos.png" class="h-12 w-12" alt="Logo IPB">
            </a>
            <div class="text-white">
                <h1 class="text-xl font-bold">Layanan Arsip</h1>
                <p class="text-xs text-gray-200">Direktorat SDM IPB</p>
            </div>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex gap-8">
            <a href="#beranda" class="text-white hover:text-gray-300 font-medium transition">Beranda</a>
            <a href="#layanan" class="text-white hover:text-gray-300 font-medium transition">Layanan</a>
            <a href="#panduan" class="text-white hover:text-gray-300 font-medium transition">Panduan Layanan</a>
            <a href="#data" class="text-white hover:text-gray-300 font-medium transition">Akumulasi Data</a>
            <a href="#information" class="text-white hover:text-gray-300 font-medium transition">FAQ</a>

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

                        <a href="{{ route('unit-kerja') }}"
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


                        <a href="{{ route('kebijakan') }}"
                            class="flex items-start gap-3 px-3 py-2 text-gray-800 hover:bg-blue-50 rounded transition mb-2">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-shield-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm text-gray-900">Kebijakan Privasi</h4>
                                <p class="text-xs text-gray-600">Perlindungan data Anda</p>
                            </div>
                        </a>

                        <a href="{{ route('ketentuan-pengguna') }}"
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
        </div>

        <!-- Login Desktop -->
        <div class="hidden md:block">
            @auth
                <a href="admin" class="text-white hover:text-gray-300 font-medium transition">Dashboard</a>
            @else
                <a href="admin/login" class="text-white hover:text-gray-300 font-medium transition">Log in →</a>
            @endauth
        </div>

        <!-- Hamburger (Mobile) -->
        <button id="menuBtn" class="md:hidden text-white text-3xl">
            ☰
        </button>
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
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Panduan
                Layanan</a>
            <a href="#data"
                class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Akumulasi
                Data</a>
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
                    <h5 class="text-xs font-bold text-gray-500 uppercase tracking-wider px-3 py-1">📊 Overview</h5>
                    <a href="#infografis"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📊
                        Infografis</a>
                    <a href="#layanan"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">💼
                        Layanan</a>
                    <a href="{{ route('unit-kerja') }}"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">🏢 Unit
                        Kerja</a>

                    <hr class="my-2">

                    <h5 class="text-xs font-bold text-gray-500 uppercase tracking-wider px-3 py-1">🔒 Privacy</h5>
                    <a href="{{ route('kebijakan') }}"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">🔒 Kebijakan
                        Privasi</a>
                    <a href="{{ route('ketentuan-pengguna') }}"
                        class="block text-gray-700 text-sm px-3 py-2 hover:bg-gray-100 rounded transition">📜 Ketentuan
                        Pengguna</a>
                </div>
            </div>

            <hr class="my-4">

            @auth
                <a href="admin"
                    class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Dashboard</a>
            @else
                <a href="admin/login"
                    class="block text-gray-800 font-medium px-3 py-2 hover:bg-gray-100 rounded transition">Log in</a>
            @endauth
        </div>
    </div>
</header>

<!-- SCRIPT -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const closeMenu = document.getElementById('closeMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const tentangToggle = document.getElementById('tentangToggle');
    const tentangDropdown = document.getElementById('tentangDropdown');
    const tentangIcon = document.getElementById('tentangIcon');

    menuBtn.onclick = () => mobileMenu.style.right = "0";
    closeMenu.onclick = () => mobileMenu.style.right = "-100%";

    // Mobile Dropdown Toggle
    tentangToggle.onclick = () => {
        tentangDropdown.classList.toggle('hidden');
        tentangIcon.style.transform = tentangDropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    };
</script>