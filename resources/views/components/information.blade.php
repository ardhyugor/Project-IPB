    <section id="information"></section>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        /* Card Hover Effects */
        .category-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }
        
        .category-card:hover {
            transform: translateY(-8px);
        }
        
        .icon-wrapper {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .category-card:hover .icon-wrapper {
            transform: scale(1.15) rotate(5deg);
        }

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

        /* Background Decoration Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(12deg); }
            50% { transform: translateY(-20px) rotate(12deg); }
        }

        .floating-decoration:nth-child(1) {
            animation: float 8s ease-in-out infinite;
        }

        .floating-decoration:nth-child(2) {
            animation: float 10s ease-in-out infinite 2s;
        }

        .floating-decoration:nth-child(3) {
            animation: float 12s ease-in-out infinite 4s;
        }

        /* Expandable Card Styles */
        .card-wrapper {
            position: relative;
        }

        .card-container {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
        }

        .card-container.expanded {
            z-index: 50;
        }

        .card-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-content.expanded {
            max-height: 600px;
        }

        .info-section {
            padding: 24px 0;
            border-top: 2px solid #f1f5f9;
        }

        .info-section:first-child {
            border-top: none;
        }

        .info-item {
            margin-bottom: 16px;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-text {
            color: #64748b;
            line-height: 1.6;
        }

        .expand-icon {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .expand-icon.rotated {
            transform: rotate(180deg);
        }

        .expanded-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: transparent;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            z-index: 40;
        }

        .expanded-overlay.active {
            opacity: 0;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-slate-50 to-slate-100 min-h-screen py-16">

    <div class="container mx-auto px-4">
        
        <!-- Title Section -->
        <div class="text-center mb-16 animate-on-scroll">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4">
                INFORMASI LANJUTAN
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-teal-500 mx-auto mt-6"></div>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-12 relative" id="cardsContainer">
            
            <!-- Card 1: Jadwal -->
            <div class="animate-on-scroll delay-1 card-wrapper">
                <div class="card-container category-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-slate-200 hover:border-slate-300 transition-all duration-300" data-card="jadwal">
                    
                    <!-- Card Header -->
                    <div class="cursor-pointer" onclick="toggleCard(event)">
                        <!-- Icon -->
                        <div class="flex justify-center mb-6">
                            <div class="icon-wrapper w-20 h-20 bg-red-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-check text-3xl text-red-500"></i>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="w-16 h-1 bg-gradient-to-r from-red-400 to-red-600 mx-auto mb-6"></div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-blue-600 hover:text-blue-800 text-center mb-4 transition-colors">
                            Jadwal Operasional
                        </h3>

                        <!-- Description -->
                        <p class="text-slate-600 text-center text-sm leading-relaxed mb-4">
                            Jadwal Operasional kerja Layanan Arsip PAU SDM IPB University
                        </p>

                        <!-- Expand Button -->
                        <div class="flex justify-center">
                            <i class="fas fa-chevron-down expand-icon text-red-500 text-lg"></i>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="card-content">
                        <div class="info-section">
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-calendar-check text-red-500"></i>
                                    Hari Operasional
                                </div>
                                <div class="info-text">Senin - Jumat</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-clock text-red-500"></i>
                                    Waktu
                                </div>
                                <div class="info-text">08:00 am. - 16:00 WIB pm.</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-map-marker-alt text-red-500"></i>
                                    Lokasi
                                </div>
                                <div class="info-text">Lt. 4 PAU SDM DIrektorat IPB University</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Berita Terbaru -->
            <div class="animate-on-scroll delay-2 card-wrapper">
                <div class="card-container category-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-slate-200 hover:border-slate-300 transition-all duration-300" data-card="berita">
                    
                    <!-- Card Header -->
                    <div class="cursor-pointer" onclick="toggleCard(event)">
                        <!-- Icon -->
                        <div class="flex justify-center mb-6">
                            <div class="icon-wrapper w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-newspaper text-3xl text-blue-500"></i>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="w-16 h-1 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto mb-6"></div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-blue-600 hover:text-blue-800 text-center mb-4 transition-colors">
                            Berita Terbaru
                        </h3>

                        <!-- Description -->
                        <p class="text-slate-600 text-center text-sm leading-relaxed mb-4">
                            Laporan terbaru seputar Layanan Arsip PAu SDM Direktorat IPB University
                        </p>

                        <!-- Expand Button -->
                        <div class="flex justify-center">
                            <i class="fas fa-chevron-down expand-icon text-blue-500 text-lg"></i>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="card-content">
                        <div class="info-section">
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-newspaper text-blue-500"></i>
                                    Berita Utama
                                </div>
                                <div class="info-text">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-bullhorn text-blue-500"></i>
                                    Pengumuman
                                </div>
                                <div class="info-text">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-award text-blue-500"></i>
                                    Pencapaian
                                </div>
                                <div class="info-text">-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: F.A.Q -->
            <div class="animate-on-scroll delay-3 card-wrapper">
                <div class="card-container category-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-slate-200 hover:border-slate-300 transition-all duration-300" data-card="faq">
                    
                    <!-- Card Header -->
                    <div class="cursor-pointer" onclick="toggleCard(event)">
                        <!-- Icon -->
                        <div class="flex justify-center mb-6">
                            <div class="icon-wrapper w-20 h-20 bg-teal-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-circle-question text-3xl text-teal-500"></i>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="w-16 h-1 bg-gradient-to-r from-teal-400 to-teal-600 mx-auto mb-6"></div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-blue-600 hover:text-blue-800 text-center mb-4 transition-colors">
                            F.A.Q
                        </h3>

                        <!-- Description -->
                        <p class="text-slate-600 text-center text-sm leading-relaxed mb-4">
                            Tanya Jawab Mengenai Layanan Kearsipan Direktorat SDM IPB
                        </p>

                        <!-- Expand Button -->
                        <div class="flex justify-center">
                            <i class="fas fa-chevron-down expand-icon text-teal-500 text-lg"></i>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="card-content">
                        <div class="info-section">
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-question text-teal-500"></i>
                                    Apa itu arsip kepegawaian?
                                </div>
                                <div class="info-text">Arsip kepegawaian adalah dokumen yang berisi informasi mengenai riwayat dan data pegawai selama bekerja di institusi, meliputi SK pengangkatan, kenaikan pangkat, mutasi, cuti, penghargaan, hingga pemberhentian. Arsip ini merupakan bukti akuntabilitas dan referensi penting dalam pengelolaan SDM.
</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">
                                    <i class="fas fa-question text-teal-500"></i>
                                    Bagaimana cara mengajukan permintaan arsip kepegawaian?
                                </div>
                                <div class="info-text">Ajukan permintaan melalui portal resmi atau langsung ke bagian kearsipan dengan melampirkan:
                                    <p>1 Formulir permintaan arsip</p>
                                    <p>2. Identitas pemohon (KTP/ID Card pegawai)</p>
                                    <p>3. Surat tugas/izin dari atasan (jika diperlukan)</p>
                                    <p>4. Tujuan penggunaan arsip</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Additional Info -->
        <div class="text-center mt-16 animate-on-scroll">
            <p class="text-slate-500 text-sm">
                Untuk informasi lebih lanjut, silakan klik pada kategori yang Anda butuhkan
            </p>
        </div>

    </div>

    <!-- Overlay untuk menutup card -->
    <div class="expanded-overlay" id="overlay" onclick="closeAllCards()"></div>

    <!-- Background Decorations -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden -z-10">
        <div class="floating-decoration absolute top-20 right-20 w-48 h-48 border-2 border-slate-200 rounded-lg opacity-20"></div>
        <div class="floating-decoration absolute bottom-20 left-20 w-40 h-40 border-2 border-slate-200 rounded-lg opacity-15 transform -rotate-6"></div>
        <div class="floating-decoration absolute top-1/2 left-1/3 w-32 h-32 border-2 border-slate-200 rounded-lg opacity-20 transform rotate-45"></div>
    </div>

    <!-- Script -->
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

        // Fungsi untuk toggle card
        function toggleCard(event) {
            event.stopPropagation();
            
            const cardContainer = event.currentTarget.closest('.card-container');
            const cardContent = cardContainer.querySelector('.card-content');
            const expandIcon = event.currentTarget.querySelector('.expand-icon');
            const overlay = document.getElementById('overlay');

            // Jika card sudah terbuka, tutup saja
            if (cardContainer.classList.contains('expanded')) {
                cardContainer.classList.remove('expanded');
                cardContent.classList.remove('expanded');
                expandIcon.classList.remove('rotated');
                overlay.classList.remove('active');
            } else {
                // Tutup semua card yang terbuka
                closeAllCards();
                
                // Buka card yang diklik
                cardContainer.classList.add('expanded');
                cardContent.classList.add('expanded');
                expandIcon.classList.add('rotated');
                overlay.classList.add('active');
            }
        }

        // Fungsi untuk menutup semua card
        function closeAllCards() {
            document.querySelectorAll('.card-container.expanded').forEach(card => {
                card.classList.remove('expanded');
                card.querySelector('.card-content').classList.remove('expanded');
                card.querySelector('.expand-icon').classList.remove('rotated');
            });
            document.getElementById('overlay').classList.remove('active');
        }

        // Jalankan saat page load
        window.addEventListener('load', animateOnScroll);

        // Jalankan saat scroll
        window.addEventListener('scroll', animateOnScroll);

        // Jalankan sekali di awal
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(animateOnScroll, 100);
        });

        // Close card saat overlay diklik
        document.getElementById('overlay').addEventListener('click', closeAllCards);
    </script>

</body>
</html>