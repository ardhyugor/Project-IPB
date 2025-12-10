<section id="footer"></section>

<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Fade In Animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger Delays */
        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; }

        /* Hover Effects */
        .social-icon {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .social-icon:hover {
            transform: translateY(-4px) scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, #fbbf24, #f59e0b);
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        /* Gradient Background */
        .footer-gradient {
            background: linear-gradient(135deg, 
                rgba(15, 85, 153, 0.95) 0%, 
                rgba(30, 64, 89, 0.95) 50%,
                rgba(15, 85, 153, 0.95) 100%);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .footer-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.3), 
                transparent);
        }

        /* Decorative Elements */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .floating-shape {
            position: absolute;
            opacity: 0.1;
            pointer-events: none;
        }

        .floating-shape:nth-child(1) {
            top: 10%;
            left: 5%;
            width: 60px;
            height: 60px;
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(2) {
            top: 50%;
            right: 10%;
            width: 80px;
            height: 80px;
            animation: float 10s ease-in-out infinite 2s;
        }

        .floating-shape:nth-child(3) {
            bottom: 20%;
            left: 15%;
            width: 50px;
            height: 50px;
            animation: float 12s ease-in-out infinite 4s;
        }

        /* Contact Item Hover */
        .contact-item {
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateX(8px);
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.2) rotate(10deg);
        }

        .contact-icon {
            transition: all 0.3s ease;
        }
    </style>
</head>
    <!-- Section footer -->
    <section id="footer"></section>

    <!-- FOOTER -->
    <footer class="footer-gradient py-14 px-2 relative">
        
        <!-- Floating Decorative Shapes -->
        <div class="floating-shape bg-amber-400 rounded-full"></div>
        <div class="floating-shape bg-blue-300 rounded-lg"></div>
        <div class="floating-shape bg-teal-400 rounded-full"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                <!-- Logo & Social Media -->
                <div class="fade-in-up delay-100">
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-3">
                          <img src="img/logos.png" class="h-10 w-10">
                            <div>
                                <h3 class="text-2xl font-bold text-white">ARSIPINAJA</h3>
                            </div>
                        </div>
                        <p class="text-lg font-semibold text-white">SDM Direktorat</p>
                        <p class="text-sm text-blue-100 mt-1">IPB University</p>
                    </div>
                    
                    <!-- Social Media Icons -->
                    <div class="flex gap-4">
                        <a href="https://www.youtube.com/channel/UChkLa87quib00DR9S_XWeNw/" target="_blank" 
                           class="social-icon w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-amber-400 hover:text-slate-800">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/arsip.office/" target="_blank" 
                           class="social-icon w-12 h-12 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-amber-400 hover:text-slate-800">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Overview Section -->
                <div class="fade-in-up delay-200">
                    <h4 class="text-xl font-bold text-white mb-6 pb-3 border-b-2 border-amber-400 inline-block">
                        Overview
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="infografis" class="footer-link text-white hover:text-amber-400 flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs text-amber-400 group-hover:translate-x-1 transition-transform"></i>
                                Infografis
                            </a>
                        </li>
                        <li>
                            <a href="unit-kerja" class="footer-link text-white hover:text-amber-400 flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs text-amber-400 group-hover:translate-x-1 transition-transform"></i>
                                Unit Kerja
                            </a>
                        </li>
                        <li>
                            <a href="layanan-arsip" class="footer-link text-white hover:text-amber-400 flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs text-amber-400 group-hover:translate-x-1 transition-transform"></i>
                                Layanan Arsip
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Privacy Section -->
                <div class="fade-in-up delay-300">
                    <h4 class="text-xl font-bold text-white mb-6 pb-3 border-b-2 border-amber-400 inline-block">
                        Privacy
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="kebijakan" class="footer-link text-white hover:text-amber-400 flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs text-amber-400 group-hover:translate-x-1 transition-transform"></i>
                                Kebijakan Privasi
                            </a>
                        </li>
                        <li>
                            <a href="ketentuan-pengguna" class="footer-link text-white hover:text-amber-400 flex items-center gap-2 group">
                                <i class="fas fa-chevron-right text-xs text-amber-400 group-hover:translate-x-1 transition-transform"></i>
                                Ketentuan Pengguna
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info Section -->
                <div class="fade-in-up delay-400">
                    <h4 class="text-xl font-bold text-white mb-6 pb-3 border-b-2 border-amber-400 inline-block">
                        Informasi Kontak
                    </h4>
                    <div class="space-y-5">
                        
                        <!-- Address -->
                        <div class="contact-item flex gap-3">
                            <i class="contact-icon fas fa-map-marker-alt text-amber-400 text-lg mt-1 flex-shrink-0"></i>
                            <div class="text-sm text-white leading-relaxed">
                                <p class="font-semibold text-blue-100">Direktorat SDM IPB</p>
                                <p>Jl. Raya Dramaga</p>
                                <p>Kampus IPB Dramaga</p>
                                <p>Bogor 16680</p>
                                <p>Jawa Barat, Indonesia</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="contact-item flex gap-3 items-start">
                            <i class="contact-icon fas fa-phone text-amber-400 text-lg flex-shrink-0"></i>
                            <a href="tel:+62251-8622642" class="footer-link text-white hover:text-amber-400">
                                +62-251 8622642
                            </a>
                        </div>

                        <!-- Email -->
                        <div class="contact-item flex gap-3 items-start">
                            <i class="contact-icon fas fa-envelope text-amber-400 text-lg flex-shrink-0"></i>
                            <a href="mailto:ditsdm@apps.ipb.ac.id" class="footer-link text-white hover:text-amber-400 break-all">
                                ditsdm@apps.ipb.ac.id
                            </a>
                        </div>

                        <!-- Website -->
                        <div class="contact-item flex gap-3 items-start">
                            <i class="contact-icon fas fa-globe text-amber-400 text-lg flex-shrink-0"></i>
                            <a href="https://ditsdm.ipb.ac.id" target="_blank" class="footer-link text-white hover:text-amber-400">
                                ditsdm.ipb.ac.id
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Divider -->
            <div class="border-t border-white border-opacity-20 my-8 fade-in-up"></div>

            <!-- Copyright -->
            <div class="text-center fade-in-up">
                <p class="text-slate-800 font-medium flex items-center justify-center gap-2 flex-wrap">
                    <i class="fas fa-copyright text-amber-400"></i>
                    <span class="text-white">Hak Cipta © 2024. Layanan Arsip SDM - Direktorat IPB University</span>
                </p>
                <p class="text-blue-100 text-sm mt-2">
                    Dibuat dengan <i class="fas fa-heart text-red-400 animate-pulse"></i> untuk melayani lebih baik
                </p>
            </div>

        </div>
    </footer>

    <!-- Scroll Animation Script -->
    <script>
        function isInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.bottom >= 0
            );
        }

        function animateOnScroll() {
            const elements = document.querySelectorAll('.fade-in-up');
            
            elements.forEach(element => {
                if (isInViewport(element)) {
                    element.classList.add('animated');
                }
            });
        }

        // Event Listeners
        window.addEventListener('load', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
        
        // Initial check
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(animateOnScroll, 100);
        });

        // Smooth Scroll untuk anchor links
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