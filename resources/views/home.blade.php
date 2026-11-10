<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigland - Modern Luxury Hotel & Suites</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                    },
                    colors: {
                        page: '#FAF7F2',
                        caramel: {
                            DEFAULT: '#B08D57',
                            hover: '#9c7743',
                            dark: '#8a6635',
                            light: '#f5ede2',
                            border: '#e4d4be',
                        },
                        ink: {
                            DEFAULT: '#1E1A16',
                            muted: '#635b52',
                            light: '#8c8276',
                        }
                    },
                    animation: {
                        'spin-slow': 'spin 18s linear infinite',
                        'float-slow': 'floatSlow 5s ease-in-out infinite',
                    },
                    keyframes: {
                        floatSlow: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-8px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FAF7F2;
            color: #1E1A16;
            font-feature-settings: "cv02", "cv03", "cv04", "cv11";
        }

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #FAF7F2;
        }

        ::-webkit-scrollbar-thumb {
            background: #e4d4be;
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #B08D57;
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.85s cubic-bezier(0.42, 0, 0.58, 1), transform 0.85s cubic-bezier(0.42, 0, 0.58, 1);
            will-change: opacity, transform;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Editorial nav link */
        .nav-link {
            position: relative;
            padding-bottom: 3px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -3px;
            height: 1.5px;
            background: #B08D57;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .nav-link:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* WEDDING 3D FAN-OUT & HOVER "MENCAR" ANIMATION */
        .wedding-gallery-container {
            perspective: 1400px;
        }

        .wedding-fan {
            position: absolute;
            left: 50%;
            top: 50%;
            will-change: transform, box-shadow, z-index;
            transition: transform 0.75s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.65s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.4s ease,
                        z-index 0.25s ease !important;
        }

        /* 1. Kondisi Normal: Kartu Menumpuk / Berdempetan Seperti Kipas */
        .wedding-fan-left {
            z-index: 10;
            transform: translate(-50%, -50%) translateX(-80px) rotate(-6deg) scale(0.92);
        }

        .wedding-fan-center {
            z-index: 20;
            transform: translate(-50%, -50%) rotate(0deg) scale(1);
        }

        .wedding-fan-right {
            z-index: 10;
            transform: translate(-50%, -50%) translateX(80px) rotate(6deg) scale(0.92);
        }

        @media (min-width: 640px) {
            .wedding-fan-left {
                transform: translate(-50%, -50%) translateX(-130px) rotate(-7deg) scale(0.93);
            }
            .wedding-fan-right {
                transform: translate(-50%, -50%) translateX(130px) rotate(7deg) scale(0.93);
            }
        }

        /* 2. Kondisi Hover: 3 Kartu Mencar / Memisah Tanpa Berdempetan */
        @media (min-width: 640px) {
            .wedding-gallery-container:hover .wedding-fan-left {
                z-index: 22;
                transform: translate(-50%, -50%) translateX(-270px) rotate(-1deg) scale(0.97);
                box-shadow: 0 25px 50px -12px rgba(30, 26, 22, 0.25);
            }

            .wedding-gallery-container:hover .wedding-fan-center {
                z-index: 20;
                transform: translate(-50%, -50%) translateY(-10px) rotate(0deg) scale(1.02);
                box-shadow: 0 35px 60px -15px rgba(30, 26, 22, 0.3);
            }

            .wedding-gallery-container:hover .wedding-fan-right {
                z-index: 22;
                transform: translate(-50%, -50%) translateX(270px) rotate(1deg) scale(0.97);
                box-shadow: 0 25px 50px -12px rgba(30, 26, 22, 0.25);
            }
        }

        @media (min-width: 1024px) {
            .wedding-gallery-container:hover .wedding-fan-left {
                transform: translate(-50%, -50%) translateX(-390px) rotate(0deg) scale(1);
            }

            .wedding-gallery-container:hover .wedding-fan-center {
                transform: translate(-50%, -50%) translateY(-14px) rotate(0deg) scale(1.03);
            }

            .wedding-gallery-container:hover .wedding-fan-right {
                transform: translate(-50%, -50%) translateX(390px) rotate(0deg) scale(1);
            }
        }

        /* 3. Hover Langsung ke Kartu Tertentu (Elevasi & Sorotan Emas) */
        .wedding-gallery-container .wedding-fan-left:hover {
            z-index: 40 !important;
            border-color: #B08D57 !important;
            box-shadow: 0 30px 65px -12px rgba(176, 141, 87, 0.4) !important;
        }

        @media (min-width: 640px) {
            .wedding-gallery-container .wedding-fan-left:hover {
                transform: translate(-50%, -50%) translateX(-270px) translateY(-16px) rotate(0deg) scale(1.05) !important;
            }
        }

        @media (min-width: 1024px) {
            .wedding-gallery-container .wedding-fan-left:hover {
                transform: translate(-50%, -50%) translateX(-390px) translateY(-18px) rotate(0deg) scale(1.06) !important;
            }
        }

        .wedding-gallery-container .wedding-fan-center:hover {
            z-index: 40 !important;
            transform: translate(-50%, -50%) translateY(-22px) rotate(0deg) scale(1.06) !important;
            border-color: #B08D57 !important;
            box-shadow: 0 40px 75px -15px rgba(176, 141, 87, 0.45) !important;
        }

        .wedding-gallery-container .wedding-fan-right:hover {
            z-index: 40 !important;
            border-color: #B08D57 !important;
            box-shadow: 0 30px 65px -12px rgba(176, 141, 87, 0.4) !important;
        }

        @media (min-width: 640px) {
            .wedding-gallery-container .wedding-fan-right:hover {
                transform: translate(-50%, -50%) translateX(270px) translateY(-16px) rotate(0deg) scale(1.05) !important;
            }
        }

        @media (min-width: 1024px) {
            .wedding-gallery-container .wedding-fan-right:hover {
                transform: translate(-50%, -50%) translateX(390px) translateY(-18px) rotate(0deg) scale(1.06) !important;
            }
        }

        /* HERO 3D FAN STACK (SCROLL-DRIVEN "MENCAR" ANIMATION) */
        #hero-fan-stack {
            perspective: 1200px;
        }

        .hero-fan-card {
            position: absolute;
            left: 50%;
            top: 50%;
            will-change: transform, box-shadow;
            transition: border-color 0.4s ease, box-shadow 0.4s ease;
        }

        .hero-fan-card-1 {
            z-index: 10;
        }

        .hero-fan-card-2 {
            z-index: 20;
        }

        .hero-fan-card-3 {
            z-index: 10;
        }

        .hero-fan-card:hover {
            z-index: 40 !important;
            border-color: #B08D57 !important;
            box-shadow: 0 30px 60px -10px rgba(176, 141, 87, 0.45) !important;
        }
    </style>
</head>

<body class="selection:bg-[#f5ede2] selection:text-[#1E1A16] font-sans antialiased overflow-x-hidden bg-[#FAF7F2]"
    x-data="biglandApp()">

    <!-- FLOATING PILL NAVBAR COMPONENT -->
    <x-navbar />

    <!-- HERO: Scroll-driven (pinned via GSAP) -->
    <section id="hero" class="relative h-screen bg-[#FAF7F2] overflow-hidden">
        <div class="absolute inset-0 pt-[96px] sm:pt-[104px] px-3 sm:px-6 pb-3 sm:pb-6">
            <div class="relative h-full rounded-[2rem] sm:rounded-[2.75rem] overflow-hidden bg-[#1E1A16] border border-[#e4d4be]/60 shadow-xl">

                <!-- Hero Background Image (Warm luxury interior) -->
                <img id="hero-bg"
                    src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2000&auto=format&fit=crop"
                    alt="Bigland Modern Luxury Hotel"
                    class="absolute inset-0 w-full h-full object-cover filter brightness-[0.92]">
                
                <!-- Dark cinematic vignette on photo so white serif text stands out crisp & sharp -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#1E1A16]/80 via-[#1E1A16]/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/85 via-transparent to-black/30"></div>

                <!-- Editorial Headline (Left): Serif besar berwarna putih di atas foto -->
                <div class="absolute left-6 sm:left-12 lg:left-16 top-8 sm:top-12 lg:top-16 z-10 max-w-xl">
                    <h1 class="font-serif text-white tracking-tight leading-[1.03] text-[clamp(2.8rem,7vw,5.8rem)] drop-shadow-md">
                        <span class="hl block font-normal">Find Your</span>
                        <span class="hl block font-normal italic text-white/95">Perfect Stay.</span>
                    </h1>
                    <p id="hero-sub" class="mt-4 sm:mt-5 max-w-sm text-xs sm:text-sm text-white/85 leading-relaxed font-normal">
                        Book boutique hotels, private villas, oceanfront penthouses & curated experiences. Tailored for those who travel with taste.
                    </p>
                    <div id="hero-hint" class="mt-6 flex items-center gap-4">
                        <!-- Tombol Sekunder Emas #B08D57 -->
                        <a href="{{ route('form.pesan') }}"
                            class="group inline-flex items-center gap-2 bg-[#B08D57] hover:bg-[#9c7743] text-white px-6 py-3 rounded-full text-xs font-semibold shadow-lg shadow-black/25 transition-all hover:scale-105">
                            <span>Booking Now</span>
                            <i class="ph ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: ABOUT BIGLAND (Teks Serif Cokelat Gelap #1E1A16 & Sorotan Emas #B08D57) -->
    <section id="about" class="py-20 sm:py-28 px-6 sm:px-10 max-w-7xl mx-auto overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Column: Editorial Heading & Serif Paragraph & Dotted Trail -->
            <div id="about-info" class="lg:col-span-5">
                <h2 class="font-serif text-4xl sm:text-5xl font-normal text-[#1E1A16] tracking-tight leading-[1.15]">
                    About Us
                </h2>
                
                <!-- Teks panjang Bahasa Indonesia: paragraf berwarna cokelat gelap #1E1A16, kata Selamat Datang di Bigland disorot emas #B08D57 -->
                <p class="mt-6 font-serif text-sm sm:text-base text-[#1E1A16] leading-relaxed font-normal">
                    <span class="font-medium text-[#B08D57]">Selamat Datang di Bigland </span>Selamat datang di Bigland. Kami tahu menginap itu bukan cuma soal tempat tidur, tapi soal merasa diterima. Makanya kami siapkan kamar yang nyaman, makanan yang enak, dan tim yang selalu siap membantu, siang maupun malam. Silakan pilih kamarnya, sisanya biar kami yang urus.
                </p>

                <!-- Tombol Sekunder Outline Hitam Tipis #1E1A16 -->
                <div class="mt-6">
                    <a href="{{ route('tentang-kami') }}"
                        class="inline-flex items-center gap-2 border border-[#1E1A16] text-[#1E1A16] hover:bg-[#1E1A16] hover:text-white px-6 py-2.5 rounded-full text-xs font-semibold transition-all hover:scale-105 shadow-sm">
                        <span>Pelajari Lebih Lanjut</span>
                        <i class="ph ph-arrow-right"></i>
                    </a>
                </div>

                <!-- Dotted Trail Graphic with Animated Beach Umbrella -->
                <div id="about-trail" class="relative mt-10 h-24 max-w-xs pointer-events-none select-none">
                    <svg class="w-full h-full" viewBox="0 0 280 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 20 C 50 15, 60 70, 120 70 C 180 70, 200 25, 250 55" stroke="#B08D57" stroke-width="2" stroke-dasharray="5 5" stroke-linecap="round"/>
                    </svg>
                    <div id="about-umbrella" class="absolute right-3 bottom-1 flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#f5ede2] border border-[#e4d4be] flex items-center justify-center text-[#B08D57] shadow-sm animate-bounce" style="animation-duration: 3s;">
                            <i class="ph-fill ph-umbrella text-base"></i>
                        </div>
                        <div class="w-6 h-1 bg-[#e4d4be] rounded-full mt-1"></div>
                    </div>
                </div>
            </div>

            <!-- Right Column: 3 Portrait Rounded Cards with Parallax & 3D Tilt -->
            <div id="about-cards" class="lg:col-span-7 grid grid-cols-3 gap-3 sm:gap-4 items-center">
                <!-- Card 1: Dining Bistro Setup -->
                <div class="about-card about-card-1 tilt-card aspect-[3/5] rounded-2xl sm:rounded-[2rem] overflow-hidden shadow-lg border border-[#e4d4be] group transition-all duration-500 hover:shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?q=80&w=800&auto=format&fit=crop"
                        alt="Bigland Dining" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>

                <!-- Card 2: Couple / Window Curtain Ocean View -->
                <div class="about-card about-card-2 tilt-card aspect-[3/5] rounded-2xl sm:rounded-[2rem] overflow-hidden shadow-xl border border-[#e4d4be] -translate-y-4 sm:-translate-y-6 group transition-all duration-500 hover:shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1510414842594-a61c69b5ae57?q=80&w=800&auto=format&fit=crop"
                        alt="Serene Experience" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>

                <!-- Card 3: Resort Relaxation / Suite Balcony -->
                <div class="about-card about-card-3 tilt-card aspect-[3/5] rounded-2xl sm:rounded-[2rem] overflow-hidden shadow-lg border border-[#e4d4be] group transition-all duration-500 hover:shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?q=80&w=800&auto=format&fit=crop"
                        alt="Bigland Resort" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: PARTNER BRAND STRIP (Band Section Karamel/Emas Kecokelatan #B08D57) -->
    <section id="partner-strip" class="px-6 sm:px-10 max-w-7xl mx-auto mb-20 sm:mb-28">
        <div class="bg-[#B08D57] rounded-[2rem] sm:rounded-full py-8 px-8 sm:px-14 shadow-xl text-white">
            <div class="flex flex-wrap items-center justify-between gap-8 sm:gap-6 opacity-95">
                
                <!-- Brand 1: Sunset Resort -->
                <div class="partner-logo flex items-center gap-2 transition-transform duration-300 hover:-translate-y-1 hover:brightness-110">
                    <i class="ph-fill ph-palm-tree text-2xl"></i>
                    <div class="leading-none">
                        <span class="block text-sm font-extrabold tracking-wider uppercase">SUNSET</span>
                        <span class="block text-[9px] tracking-widest uppercase opacity-85">RESORT & VILLAS</span>
                    </div>
                </div>

                <!-- Brand 2: TravelWorld -->
                <div class="partner-logo flex items-center gap-1.5 transition-transform duration-300 hover:-translate-y-1 hover:brightness-110">
                    <i class="ph-fill ph-globe-hemisphere-west text-2xl"></i>
                    <span class="text-base font-extrabold tracking-tight uppercase">TRAVELWORLD</span>
                </div>

                <!-- Brand 3: Travel & Hotel -->
                <div class="partner-logo flex items-center gap-2 transition-transform duration-300 hover:-translate-y-1 hover:brightness-110">
                    <div class="w-6 h-6 border-2 border-white rounded-md flex items-center justify-center font-serif font-bold text-xs">M</div>
                    <span class="text-xs font-bold tracking-widest uppercase">TRAVEL & HOTEL</span>
                </div>

                <!-- Brand 4: Airbnb Partner -->
                <div class="partner-logo flex items-center gap-2 transition-transform duration-300 hover:-translate-y-1 hover:brightness-110">
                    <i class="ph-fill ph-house-line text-2xl"></i>
                    <span class="text-base font-bold lowercase tracking-tight">airbnb</span>
                </div>

                <!-- Brand 5: Five Star Alliance -->
                <div class="partner-logo flex items-center gap-2 transition-transform duration-300 hover:-translate-y-1 hover:brightness-110">
                    <i class="ph-fill ph-crown text-2xl"></i>
                    <div class="leading-none">
                        <span class="block text-xs font-extrabold tracking-widest uppercase">FIVE STAR</span>
                        <span class="block text-[8px] tracking-widest uppercase opacity-85">ALLIANCE</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: RELAX. REFRESH. REJUVENATE. (3 Tall Vertical Cards with Dynamic Focus) -->
    <section id="pengalaman" class="py-16 sm:py-24 px-6 sm:px-10 max-w-7xl mx-auto overflow-hidden">
        <div id="exp-container" class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 items-stretch group/exp">
            
            <!-- Tall Card 1: Relax. Refresh. Rejuvenate. -->
            <div class="exp-card tilt-card relative h-[480px] sm:h-[560px] rounded-[2.25rem] overflow-hidden shadow-xl border border-[#e4d4be] group transition-all duration-500 ease-out md:group-hover/exp:opacity-80 md:hover:!opacity-100 hover:scale-[1.02] hover:shadow-2xl">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1200&auto=format&fit=crop"
                    alt="Relax Refresh Rejuvenate" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/95 via-[#1E1A16]/30 to-transparent"></div>
                
                <div class="absolute bottom-8 left-8 right-8 text-white transform transition-transform duration-500 group-hover:-translate-y-1">
                    <h3 class="font-serif text-2xl sm:text-3xl font-medium tracking-tight mb-2">
                        Relax. Refresh. Rejuvenate.
                    </h3>
                    <div class="w-12 h-0.5 bg-[#B08D57] mb-3 transition-all duration-500 group-hover:w-20"></div>
                    <p class="text-xs text-white/90 leading-relaxed font-light">
                        Treat yourself to a peaceful escape with our soothing sky pool, curated spa treatments, and world-class care.
                    </p>
                </div>
            </div>

            <!-- Tall Card 2: Bistro & Refresh -->
            <div class="exp-card tilt-card relative h-[480px] sm:h-[560px] rounded-[2.25rem] overflow-hidden shadow-xl border border-[#e4d4be] group transition-all duration-500 ease-out md:group-hover/exp:opacity-80 md:hover:!opacity-100 hover:scale-[1.02] hover:shadow-2xl">
                <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=800&auto=format&fit=crop"
                    alt="Refresh Wellness" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/80 via-[#1E1A16]/10 to-transparent"></div>
                
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none p-6 text-center">
                    <span class="font-serif text-3xl sm:text-4xl text-white font-light tracking-widest drop-shadow-md group-hover:scale-110 transition-transform duration-500">
                        Refresh
                    </span>
                    <span class="text-xs text-white/80 uppercase tracking-widest mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Artisan Gastronomi & Bistro
                    </span>
                </div>
            </div>

            <!-- Tall Card 3: Sanctuary & Relax -->
            <div class="exp-card tilt-card relative h-[480px] sm:h-[560px] rounded-[2.25rem] overflow-hidden shadow-xl border border-[#e4d4be] group transition-all duration-500 ease-out md:group-hover/exp:opacity-80 md:hover:!opacity-100 hover:scale-[1.02] hover:shadow-2xl">
                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=800&auto=format&fit=crop"
                    alt="Relax Sanctuary" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/80 via-[#1E1A16]/10 to-transparent"></div>
                
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none p-6 text-center">
                    <span class="font-serif text-3xl sm:text-4xl text-white font-light tracking-widest drop-shadow-md group-hover:scale-110 transition-transform duration-500">
                        Relax
                    </span>
                    <span class="text-xs text-white/80 uppercase tracking-widest mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Private Suite Sanctuary
                    </span>
                </div>
            </div>

        </div>

        <!-- Tombol Sekunder Outline Hitam Tipis #1E1A16 -->
        <div id="pengalaman-btn" class="text-center mt-10">
            <a href="#kamar"
                class="inline-flex items-center gap-2 border border-[#1E1A16] text-[#1E1A16] hover:bg-[#1E1A16] hover:text-white px-7 py-3 rounded-full text-xs font-semibold transition-all hover:scale-105 shadow-sm">
                <span>Explore More</span>
                <i class="ph ph-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- SECTION: WEDDING & EVENT PLANNING (Serif Heading Kontras & 3D Fan-out Gallery) -->
    <section id="wedding" class="py-20 sm:py-28 px-6 sm:px-10 max-w-7xl mx-auto overflow-hidden">
        <!-- Centered Header -->
        <div id="wedding-header" class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-[11px] font-bold uppercase tracking-widest text-[#B08D57] block mb-2">
                Create Unforgettable Moments in Extraordinary Spaces
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1E1A16] tracking-tight">
                Wedding & Event Planning
            </h2>
            <p class="mt-4 font-serif text-xs sm:text-sm text-[#635b52] leading-relaxed font-normal">
                From intimate beachfront vows to grand ballroom celebrations, we specialize in turning your dream event into a stunning reality – all with the touch of luxury and seamless planning.
            </p>
        </div>

        <!-- 3D Fan-out Layered Perspective Gallery Showcase -->
        <div id="wedding-gallery" class="wedding-gallery-container relative max-w-6xl mx-auto py-12 px-4 flex items-center justify-center min-h-[460px] sm:min-h-[500px] lg:min-h-[540px]">
            
            <!-- Left Card (-7 deg -> mencar ke kiri saat hover) -->
            <div class="wedding-fan wedding-fan-left w-[240px] sm:w-[280px] lg:w-[330px] h-[330px] sm:h-[390px] lg:h-[440px] rounded-3xl overflow-hidden shadow-xl border-2 border-white cursor-pointer group">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800&auto=format&fit=crop"
                    alt="Intimate Wedding" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/85 via-[#1E1A16]/20 to-transparent flex flex-col justify-end p-5 sm:p-6 text-white">
                    <span class="text-[10px] uppercase font-bold tracking-widest text-[#B08D57]">Intimate Ceremony</span>
                    <h3 class="font-serif text-base sm:text-xl font-bold mt-0.5">Intimate Wedding</h3>
                    <p class="text-[11px] text-white/80 mt-1 line-clamp-2">Upacara sakral privat dengan suasana hangat dan berkesan.</p>
                </div>
            </div>

            <!-- Center Main Elevated Card (0 deg -> elevasi saat hover) -->
            <div class="wedding-fan wedding-fan-center w-[270px] sm:w-[380px] lg:w-[450px] h-[360px] sm:h-[430px] lg:h-[480px] rounded-3xl sm:rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white cursor-pointer group">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop"
                    alt="Wedding & Celebration Suite" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/80 via-[#1E1A16]/20 to-transparent"></div>
                <div class="absolute bottom-5 sm:bottom-7 left-5 sm:left-7 right-5 sm:right-7 text-white">
                    <span class="text-[10px] uppercase font-bold tracking-widest text-[#B08D57]">Grand Celebration</span>
                    <h3 class="font-serif text-lg sm:text-2xl font-bold mt-1">Panoramic Ballroom &amp; Terrace</h3>
                    <p class="text-xs text-white/80 mt-1 line-clamp-2">Resepsi megah berkapasitas hingga 800 tamu dengan panorama cakrawala kota.</p>
                </div>
            </div>

            <!-- Right Card (+7 deg -> mencar ke kanan saat hover) -->
            <div class="wedding-fan wedding-fan-right w-[240px] sm:w-[280px] lg:w-[330px] h-[330px] sm:h-[390px] lg:h-[440px] rounded-3xl overflow-hidden shadow-xl border-2 border-white cursor-pointer group">
                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=800&auto=format&fit=crop"
                    alt="Grand Ballroom Celebration" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/85 via-[#1E1A16]/25 to-transparent flex flex-col justify-end p-5 sm:p-6 text-white">
                    <span class="text-[10px] uppercase font-bold tracking-widest text-[#B08D57]">Exclusive Banquet</span>
                    <h3 class="font-serif text-base sm:text-xl font-bold mt-0.5">Executive Gala Dinner</h3>
                    <p class="text-[11px] text-white/80 mt-1 line-clamp-2">Jamuan makan malam mewah dengan hidangan gastronomi kelas dunia.</p>
                </div>
            </div>

        </div>

        <!-- Bottom Description & Button -->
        <div id="wedding-footer" class="text-center max-w-lg mx-auto mt-12">
            <h4 class="font-serif text-xl font-medium text-[#1E1A16] mb-2">
                Custom Event Planning
            </h4>
            <p class="text-xs text-[#635b52] leading-relaxed font-light mb-6">
                From decor to dining, our planners coordinate every detail to match your vision – ensuring a stress-free and luxurious experience.
            </p>
            <a href="{{ route('form.pesan') }}"
                class="inline-flex items-center gap-2 border border-[#1E1A16] text-[#1E1A16] hover:bg-[#1E1A16] hover:text-white px-7 py-2.5 rounded-full text-xs font-semibold transition-all hover:scale-105 shadow-sm">
                <span>Explore More</span>
                <i class="ph ph-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- SECTION: CHOOSE YOUR ROOM (Luxury Editorial Showcase) -->
    <section id="kamar" class="py-20 sm:py-28 px-6 sm:px-10 max-w-7xl mx-auto overflow-hidden">
        
        <!-- Section Header -->
        <div id="kamar-header" class="text-center max-w-2xl mx-auto mb-14 sm:mb-18">
            <h2 class="font-serif text-3xl sm:text-5xl font-normal text-[#1E1A16] tracking-tight">
                Choose Your <span class="italic font-normal text-[#B08D57]">Room</span>
            </h2>
            <p class="mt-4 font-serif text-xs sm:text-sm text-[#635b52] leading-relaxed font-normal max-w-lg mx-auto">
                Explore a variety of rooms tailored to your comfort and style. Whether you're traveling solo or with family, find the perfect space to unwind.
            </p>
        </div>

        <!-- 3 Luxury Room Cards -->
        <div id="room-cards-container" class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10 items-stretch">
            
            <!-- Room 1: Standar Room -->
            <div class="room-card tilt-card bg-white text-[#1E1A16] rounded-[2rem] sm:rounded-[2.25rem] overflow-hidden border border-[#e4d4be]/80 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col group relative">
                <!-- Image Header -->
                <div class="relative h-64 sm:h-72 overflow-hidden bg-[#FAF7F2]">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=800&auto=format&fit=crop"
                        alt="Standar Room" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/85 via-black/20 to-transparent"></div>

                    <!-- Bottom Price Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 z-10 text-white">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-white/70 block">Mulai dari</span>
                        <div class="flex items-baseline gap-1 mt-0.5">
                            <span class="font-serif text-xl sm:text-2xl font-bold text-[#f5ede2]">Rp 500.000</span>
                            <span class="text-xs text-white/75 font-normal">/ malam</span>
                        </div>
                    </div>
                </div>
                
                <!-- Content Body -->
                <div class="p-6 sm:p-7 flex flex-col flex-1">
                    <div class="mb-2">
                        <span class="text-[10px] font-bold tracking-wider uppercase text-[#B08D57]">Kategori Standar</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#1E1A16] group-hover:text-[#B08D57] transition-colors mt-0.5">
                            Standar Room
                        </h3>
                    </div>
                    <p class="text-xs text-[#635b52] leading-relaxed line-clamp-2">
                        Kamar berdesain minimalis elegan dengan pencahayaan alami dan fasilitas esensial lengkap.
                    </p>

                    <!-- Specs Grid -->
                    <div class="grid grid-cols-2 gap-2.5 my-6 py-4 border-y border-[#FAF7F2]">
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-arrows-out text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">24 m²</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-users text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">2 Tamu Dewasa</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-bed text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">1 Queen Bed</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-buildings text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">City View</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-auto flex items-center gap-2.5">
                        <button type="button" @click="openRoomModal('Standar')"
                            class="flex-1 py-3 px-3 rounded-full border border-[#e4d4be] hover:border-[#1E1A16] hover:bg-[#FAF7F2] text-[#1E1A16] text-xs font-semibold text-center transition-all">
                            Lihat Detail
                        </button>
                        <a href="{{ route('form.pesan') }}?tipe=Standar"
                            class="flex-1 py-3 px-3 rounded-full bg-[#1E1A16] hover:bg-[#B08D57] text-white text-xs font-semibold text-center transition-all shadow-sm hover:shadow-md inline-flex items-center justify-center gap-1.5 group/btn">
                            <span>Pesan</span>
                            <i class="ph ph-arrow-right group-hover/btn:translate-x-1 transition-transform text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Room 2: Deluxe Room (Highlighted with Gold Accent) -->
            <div class="room-card tilt-card bg-white text-[#1E1A16] rounded-[2rem] sm:rounded-[2.25rem] overflow-hidden border-2 border-[#B08D57] shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col group relative ring-4 ring-[#B08D57]/10">
                <!-- Image Header -->
                <div class="relative h-64 sm:h-72 overflow-hidden bg-[#FAF7F2]">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=800&auto=format&fit=crop"
                        alt="Deluxe Room" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/85 via-black/20 to-transparent"></div>

                    <!-- Top Badges -->
                    <div class="absolute top-4 left-4 z-10">
                        <span class="bg-[#B08D57] text-white text-[10px] font-bold uppercase tracking-wider px-3.5 py-1 rounded-full shadow-md flex items-center gap-1">
                            <i class="ph-fill ph-crown"></i>Best Seller
                        </span>
                    </div>

                    <!-- Bottom Price Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 z-10 text-white">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-white/70 block">Mulai dari</span>
                        <div class="flex items-baseline gap-1 mt-0.5">
                            <span class="font-serif text-xl sm:text-2xl font-bold text-[#f5ede2]">Rp 800.000</span>
                            <span class="text-xs text-white/75 font-normal">/ malam</span>
                        </div>
                    </div>
                </div>
                
                <!-- Content Body -->
                <div class="p-6 sm:p-7 flex flex-col flex-1">
                    <div class="mb-2">
                        <span class="text-[10px] font-bold tracking-wider uppercase text-[#B08D57]">Kategori Deluxe</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#1E1A16] group-hover:text-[#B08D57] transition-colors mt-0.5">
                            Deluxe Room
                        </h3>
                    </div>
                    <p class="text-xs text-[#635b52] leading-relaxed line-clamp-2">
                        Keseimbangan sempurna antara estetika kontemporer, ruang santai luas, dan rain-shower mewah.
                    </p>

                    <!-- Specs Grid -->
                    <div class="grid grid-cols-2 gap-2.5 my-6 py-4 border-y border-[#FAF7F2]">
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-arrows-out text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">36 m²</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-users text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">2 Tamu Dewasa</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-bed text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">1 King Size Bed</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-buildings text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">Skyline View</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-auto flex items-center gap-2.5">
                        <button type="button" @click="openRoomModal('Deluxe')"
                            class="flex-1 py-3 px-3 rounded-full border border-[#e4d4be] hover:border-[#1E1A16] hover:bg-[#FAF7F2] text-[#1E1A16] text-xs font-semibold text-center transition-all">
                            Lihat Detail
                        </button>
                        <a href="{{ route('form.pesan') }}?tipe=Deluxe"
                            class="flex-1 py-3 px-3 rounded-full bg-[#B08D57] hover:bg-[#9c7743] text-white text-xs font-semibold text-center transition-all shadow-md hover:shadow-lg inline-flex items-center justify-center gap-1.5 group/btn">
                            <span>Pesan</span>
                            <i class="ph ph-arrow-right group-hover/btn:translate-x-1 transition-transform text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Room 3: Executif Suite -->
            <div class="room-card tilt-card bg-white text-[#1E1A16] rounded-[2rem] sm:rounded-[2.25rem] overflow-hidden border border-[#e4d4be]/80 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col group relative">
                <!-- Image Header -->
                <div class="relative h-64 sm:h-72 overflow-hidden bg-[#FAF7F2]">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=800&auto=format&fit=crop"
                        alt="Executif Suite" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/85 via-black/20 to-transparent"></div>

                    <!-- Bottom Price Overlay -->
                    <div class="absolute bottom-4 left-4 right-4 z-10 text-white">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-white/70 block">Mulai dari</span>
                        <div class="flex items-baseline gap-1 mt-0.5">
                            <span class="font-serif text-xl sm:text-2xl font-bold text-[#f5ede2]">Rp 1.200.000</span>
                            <span class="text-xs text-white/75 font-normal">/ malam</span>
                        </div>
                    </div>
                </div>
                
                <!-- Content Body -->
                <div class="p-6 sm:p-7 flex flex-col flex-1">
                    <div class="mb-2">
                        <span class="text-[10px] font-bold tracking-wider uppercase text-[#B08D57]">Kategori Suite</span>
                        <h3 class="font-serif text-xl sm:text-2xl font-bold text-[#1E1A16] group-hover:text-[#B08D57] transition-colors mt-0.5">
                            Executif Suite
                        </h3>
                    </div>
                    <p class="text-xs text-[#635b52] leading-relaxed line-clamp-2">
                        Kemewahan privat puncak dengan bathtub panoramik, ruang tamu terpisah, dan akses Executive Lounge.
                    </p>

                    <!-- Specs Grid -->
                    <div class="grid grid-cols-2 gap-2.5 my-6 py-4 border-y border-[#FAF7F2]">
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-arrows-out text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">54 m²</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-users text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">3 Tamu Dewasa</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-bed text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">1 King + Daybed</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-[#635b52]">
                            <div class="w-7 h-7 rounded-lg bg-[#FAF7F2] flex items-center justify-center text-[#B08D57] shrink-0 border border-[#e4d4be]/50">
                                <i class="ph ph-buildings text-xs"></i>
                            </div>
                            <span class="font-medium text-[11px] truncate">Panoramic 180°</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-auto flex items-center gap-2.5">
                        <button type="button" @click="openRoomModal('Executif')"
                            class="flex-1 py-3 px-3 rounded-full border border-[#e4d4be] hover:border-[#1E1A16] hover:bg-[#FAF7F2] text-[#1E1A16] text-xs font-semibold text-center transition-all">
                            Lihat Detail
                        </button>
                        <a href="{{ route('form.pesan') }}?tipe=Executif"
                            class="flex-1 py-3 px-3 rounded-full bg-[#1E1A16] hover:bg-[#B08D57] text-white text-xs font-semibold text-center transition-all shadow-sm hover:shadow-md inline-flex items-center justify-center gap-1.5 group/btn">
                            <span>Pesan</span>
                            <i class="ph ph-arrow-right group-hover/btn:translate-x-1 transition-transform text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Centered Button below cards -->
        <div id="kamar-footer" class="text-center mt-14 sm:mt-18">
            <a href="{{ route('produk') }}"
                class="group inline-flex items-center gap-3 bg-[#1E1A16] hover:bg-[#B08D57] text-white px-8 py-4 rounded-full text-xs sm:text-sm font-semibold shadow-xl shadow-black/10 transition-all hover:scale-105 active:scale-95">
                <span>Lihat Rincian Paket &amp; Fasilitas Lengkap</span>
                <i class="ph ph-arrow-right group-hover:translate-x-1.5 transition-transform"></i>
            </a>
        </div>

    </section>

    <!-- SECTION: Ulasan Tamu (Editorial Testimonials with Staggered Wave) -->
    <section id="ulasan" class="py-16 sm:py-24 px-6 sm:px-8 max-w-7xl mx-auto overflow-hidden">
        <div id="ulasan-header" class="text-center max-w-xl mx-auto mb-14">
            <span class="text-xs font-bold uppercase tracking-wider text-[#B08D57]">Pengalaman Nyata</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#1E1A16] tracking-tight mt-1">
                Kata Mereka yang Pernah Singgah
            </h2>
            <p class="text-[#635b52] text-xs sm:text-sm mt-2">
                Kepuasan dan kenyamanan tamu adalah dedikasi utama seluruh staf Bigland.
            </p>
        </div>

        <div id="review-cards-container" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
            <!-- Review 1 -->
            <div class="review-card tilt-card bg-white rounded-3xl p-7 border border-[#e4d4be] shadow-md flex flex-col justify-between transition-all duration-500 hover:-translate-y-2 hover:shadow-xl">
                <div>
                    <div class="flex text-[#B08D57] gap-1 text-sm mb-4">
                        <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                    </div>
                    <p class="font-sans text-[#1E1A16] text-sm sm:text-[15px] leading-relaxed font-normal mb-6">
                        “Pelayanan staf sangat ramah dan efisien. Kamar Executif-nya luar biasa dengan pemandangan sunset kota yang memukau dari bathtub.”
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#e4d4be]/60">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop"
                        alt="Clara" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <span class="text-xs font-bold text-[#1E1A16] block">Clara S.</span>
                        <span class="text-[11px] text-[#8c8276]">Staycation Pasangan • Executif Suite</span>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="review-card tilt-card bg-white rounded-3xl p-7 border border-[#e4d4be] shadow-md flex flex-col justify-between transition-all duration-500 hover:-translate-y-2 hover:shadow-xl">
                <div>
                    <div class="flex text-[#B08D57] gap-1 text-sm mb-4">
                        <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                    </div>
                    <p class="font-sans text-[#1E1A16] text-sm sm:text-[15px] leading-relaxed font-normal mb-6">
                        “Lokasi luar biasa dekat stasiun MRT, sarapan di Bistro sangat variatif dan lezat. Kasur empuk bikin tidur sangat berkualitas.”
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#e4d4be]/60">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop"
                        alt="Dimas" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <span class="text-xs font-bold text-[#1E1A16] block">Dimas Pratama</span>
                        <span class="text-[11px] text-[#8c8276]">Business Trip • Deluxe Room</span>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="review-card tilt-card bg-white rounded-3xl p-7 border border-[#e4d4be] shadow-md flex flex-col justify-between transition-all duration-500 hover:-translate-y-2 hover:shadow-xl">
                <div>
                    <div class="flex text-[#B08D57] gap-1 text-sm mb-4">
                        <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                    </div>
                    <p class="font-sans text-[#1E1A16] text-sm sm:text-[15px] leading-relaxed font-normal mb-6">
                        “Infinity Sky Pool di lantai 22 benar-benar magis saat sore hari. Pengalaman menginap bintang lima dengan harga yang sangat masuk akal.”
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-[#e4d4be]/60">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=200&auto=format&fit=crop"
                        alt="Nadia" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <span class="text-xs font-bold text-[#1E1A16] block">Nadia Amanda</span>
                        <span class="text-[11px] text-[#8c8276]">Liburan Keluarga • Standar Room</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: FAQ (Frequently Asked Questions) -->
    <section id="faq" class="py-16 sm:py-20 px-6 sm:px-8 max-w-4xl mx-auto">
        <div id="faq-header" class="text-center max-w-xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-wider text-[#B08D57]">Bantuan & Informasi</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#1E1A16] tracking-tight mt-1">
                Pertanyaan yang Sering Diajukan
            </h2>
        </div>

        <div id="faq-list" class="space-y-3" x-data="{ openFaq: 1 }">
            <!-- FAQ 1 -->
            <div class="faq-item bg-white rounded-2xl border border-[#e4d4be] overflow-hidden shadow-sm">
                <button type="button" @click="openFaq = openFaq === 1 ? 0 : 1"
                    class="w-full px-6 py-4 text-left flex items-center justify-between font-serif font-bold text-sm sm:text-base text-[#1E1A16] hover:text-[#B08D57] transition-colors">
                    <span>Pukul berapa jadwal Check-in dan Check-out di Bigland?</span>
                    <i class="ph ph-caret-down text-[#8c8276] transition-transform duration-200"
                        :class="{ 'rotate-180': openFaq === 1 }"></i>
                </button>
                <div x-show="openFaq === 1" x-collapse class="px-6 pb-4 text-xs sm:text-sm text-[#635b52] leading-relaxed">
                    Waktu standar check-in dimulai pukul 14.00 WIB dan waktu check-out maksimal pukul 12.00 WIB siang. Early check-in atau late check-out dapat diatur sesuai ketersediaan kamar.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item bg-white rounded-2xl border border-[#e4d4be] overflow-hidden shadow-sm">
                <button type="button" @click="openFaq = openFaq === 2 ? 0 : 2"
                    class="w-full px-6 py-4 text-left flex items-center justify-between font-serif font-bold text-sm sm:text-base text-[#1E1A16] hover:text-[#B08D57] transition-colors">
                    <span>Apakah sarapan sudah termasuk dalam tarif pemesanan kamar?</span>
                    <i class="ph ph-caret-down text-[#8c8276] transition-transform duration-200"
                        :class="{ 'rotate-180': openFaq === 2 }"></i>
                </button>
                <div x-show="openFaq === 2" x-collapse class="px-6 pb-4 text-xs sm:text-sm text-[#635b52] leading-relaxed" style="display: none;">
                    Untuk tipe Deluxe dan Executif, sarapan prasmanan untuk 2 tamu sudah otomatis termasuk. Untuk tipe Standar, Anda dapat menambahkan paket sarapan melalui opsi layanan tambahan saat reservasi.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item bg-white rounded-2xl border border-[#e4d4be] overflow-hidden shadow-sm">
                <button type="button" @click="openFaq = openFaq === 3 ? 0 : 3"
                    class="w-full px-6 py-4 text-left flex items-center justify-between font-serif font-bold text-sm sm:text-base text-[#1E1A16] hover:text-[#B08D57] transition-colors">
                    <span>Bagaimana kebijakan pembatalan reservasi di Bigland?</span>
                    <i class="ph ph-caret-down text-[#8c8276] transition-transform duration-200"
                        :class="{ 'rotate-180': openFaq === 3 }"></i>
                </button>
                <div x-show="openFaq === 3" x-collapse class="px-6 pb-4 text-xs sm:text-sm text-[#635b52] leading-relaxed" style="display: none;">
                    Pembatalan gratis dapat dilakukan hingga 24 jam sebelum tanggal kedatangan Anda. Pembatalan setelah periode tersebut akan dikenakan biaya 1 malam menginap.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item bg-white rounded-2xl border border-[#e4d4be] overflow-hidden shadow-sm">
                <button type="button" @click="openFaq = openFaq === 4 ? 0 : 4"
                    class="w-full px-6 py-4 text-left flex items-center justify-between font-serif font-bold text-sm sm:text-base text-[#1E1A16] hover:text-[#B08D57] transition-colors">
                    <span>Apakah tersedia layanan antar-jemput bandara?</span>
                    <i class="ph ph-caret-down text-[#8c8276] transition-transform duration-200"
                        :class="{ 'rotate-180': openFaq === 4 }"></i>
                </button>
                <div x-show="openFaq === 4" x-collapse class="px-6 pb-4 text-xs sm:text-sm text-[#635b52] leading-relaxed" style="display: none;">
                    Ya, Bigland menyediakan layanan armada shuttle premium dari dan menuju Bandara Internasional Soekarno-Hatta (CGK). Anda dapat memesannya langsung saat pengisian form reservasi.
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CTA Banner Reservasi Cepat -->
    <section id="cta-banner" class="py-12 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="cta-box rounded-[2.5rem] bg-[#B08D57] p-8 sm:p-14 text-white flex flex-col md:flex-row items-center justify-between gap-8 shadow-2xl relative overflow-hidden">
            <div class="cta-content max-w-xl relative z-10">
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-white tracking-tight">
                    Rencanakan Liburan Istimewa Anda Hari Ini
                </h2>
                <p class="font-serif text-white/90 text-xs sm:text-sm mt-3 leading-relaxed font-normal">
                    Dapatkan diskon 10% untuk menginap 3 malam atau lebih, fasilitas complimentary afternoon tea, serta garansi kamar terbaik.
                </p>
            </div>
            <div class="cta-action relative z-10 shrink-0">
                <a href="{{ route('form.pesan') }}"
                    class="inline-flex items-center gap-2 bg-[#1E1A16] hover:bg-stone-800 text-white px-8 py-4 rounded-full text-xs font-bold shadow-xl transition-all hover:scale-105 active:scale-95">
                    <span>Buat Reservasi Sekarang</span>
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER: Luxury Editorial Putih Bersih #FFFFFF dengan Teks #1E1A16 -->
    <footer id="footer" class="bg-white border-t border-[#e4d4be] pt-16 pb-10 mt-16">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 grid grid-cols-1 md:grid-cols-12 gap-10 pb-12">
            <!-- Brand Info -->
            <div class="footer-col md:col-span-5 space-y-4">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full bg-[#B08D57] text-white flex items-center justify-center font-bold text-lg shadow-md shadow-[#B08D57]/25">
                        <i class="ph-fill ph-buildings"></i>
                    </div>
                    <span class="font-serif text-xl font-bold tracking-tight text-[#1E1A16]">Bigland</span>
                </div>
                <p class="text-xs text-[#635b52] max-w-sm leading-relaxed">
                    Hotel kontemporer bintang lima yang mengedepankan kesederhanaan estetika, ketenangan istirahat, dan keramahan personal kelas dunia di pusat Jakarta.
                </p>
                <div class="flex gap-3 text-[#8c8276] pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-[#FAF7F2] hover:bg-[#f5ede2] hover:text-[#B08D57] flex items-center justify-center transition-colors"><i class="ph ph-instagram-logo"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-[#FAF7F2] hover:bg-[#f5ede2] hover:text-[#B08D57] flex items-center justify-center transition-colors"><i class="ph ph-facebook-logo"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-[#FAF7F2] hover:bg-[#f5ede2] hover:text-[#B08D57] flex items-center justify-center transition-colors"><i class="ph ph-tiktok-logo"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div class="footer-col md:col-span-3 space-y-3">
                <span class="text-xs font-bold text-[#1E1A16] uppercase tracking-wider block">Navigasi Utama</span>
                <ul class="space-y-2 text-xs text-[#635b52]">
                    <li><a href="{{ route('home') }}" class="hover:text-[#1E1A16] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('produk') }}" class="hover:text-[#1E1A16] transition-colors">Daftar Produk &amp; Kamar</a></li>
                    <li><a href="{{ route('form.pesan') }}" class="hover:text-[#1E1A16] transition-colors">Formulir Pemesanan</a></li>
                    <li><a href="{{ route('riwayat') }}" class="hover:text-[#1E1A16] transition-colors">Riwayat Pemesanan</a></li>
                    <li><a href="{{ route('tentang-kami') }}" class="hover:text-[#1E1A16] transition-colors">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col md:col-span-4 space-y-3">
                <span class="text-xs font-bold text-[#1E1A16] uppercase tracking-wider block">Kontak & Reservasi</span>
                <ul class="space-y-2.5 text-xs text-[#635b52]">
                    <li class="flex items-center gap-2.5">
                        <i class="ph ph-map-pin text-base text-[#8c8276]"></i>
                        <span>Jl. MH Thamrin No. 28, Menteng, Jakarta Pusat</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i class="ph ph-phone text-base text-[#8c8276]"></i>
                        <span>+62 (21) 3988-7700</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i class="ph ph-envelope-simple text-base text-[#8c8276]"></i>
                        <span>reservasi@bigland.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div id="footer-bottom" class="max-w-7xl mx-auto px-6 sm:px-8 pt-8 border-t border-[#FAF7F2] flex flex-col sm:flex-row items-center justify-between text-xs text-[#8c8276] gap-4">
            <p>&copy; 2026 Bigland. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-[#1E1A16] transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-[#1E1A16] transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE: Quick View Modal Detail Kamar -->
    <div x-show="modalOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#1E1A16]/50 backdrop-blur-sm"
        style="display: none;" @keydown.escape.window="modalOpen = false">

        <div @click.away="modalOpen = false" x-show="modalOpen" data-lenis-prevent
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="bg-white rounded-[2.5rem] max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-[#e4d4be] relative overflow-hidden max-h-[90vh] overflow-y-auto">

            <button @click="modalOpen = false"
                class="absolute top-5 right-5 w-8 h-8 rounded-full bg-[#FAF7F2] hover:bg-[#f5ede2] text-[#1E1A16] flex items-center justify-center text-base transition-colors z-10">
                <i class="ph ph-x"></i>
            </button>

            <div class="relative h-60 sm:h-72 rounded-[2rem] overflow-hidden mb-6 bg-[#FAF7F2]">
                <img :src="activeModalRoom.image" :alt="activeModalRoom.name" class="w-full h-full object-cover">
                <div class="absolute bottom-4 left-4 bg-[#1E1A16] text-white px-4 py-1.5 rounded-full text-xs font-bold shadow-md"
                    x-text="formatRupiah(activeModalRoom.price) + ' / malam'">
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#8c8276]">Detail Spesifikasi</span>
                        <h3 class="font-serif text-2xl font-bold text-[#1E1A16]" x-text="activeModalRoom.name"></h3>
                    </div>
                    <div class="flex items-center gap-1 text-[#B08D57] font-bold text-xs bg-[#f5ede2] px-3 py-1 rounded-full border border-[#e4d4be]">
                        <i class="ph-fill ph-star"></i>
                        <span x-text="activeModalRoom.rating"></span>
                    </div>
                </div>

                <p class="text-xs text-[#635b52] leading-relaxed" x-text="activeModalRoom.description"></p>

                <div class="grid grid-cols-2 gap-3 py-3 border-y border-[#FAF7F2] text-xs">
                    <div class="flex flex-col">
                        <span class="text-[#8c8276] text-[10px] uppercase font-bold">Luas Ruangan</span>
                        <span class="font-bold text-[#1E1A16]" x-text="activeModalRoom.size"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[#8c8276] text-[10px] uppercase font-bold">Kapasitas Maksimal</span>
                        <span class="font-bold text-[#1E1A16]" x-text="activeModalRoom.capacity"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[#8c8276] text-[10px] uppercase font-bold">Tipe Ranjang</span>
                        <span class="font-bold text-[#1E1A16]" x-text="activeModalRoom.bed"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[#8c8276] text-[10px] uppercase font-bold">Pemandangan</span>
                        <span class="font-bold text-[#1E1A16]" x-text="activeModalRoom.view"></span>
                    </div>
                </div>

                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#8c8276] block mb-2">Fasilitas Termasuk</span>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="item in activeModalRoom.amenities" :key="item">
                            <span class="bg-[#f5ede2] border border-[#e4d4be] text-[#1E1A16] text-[11px] px-3 py-1 rounded-xl flex items-center gap-1.5 font-medium">
                                <i class="ph ph-check-circle text-[#B08D57]"></i>
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" @click="modalOpen = false"
                        class="flex-1 py-3.5 rounded-2xl bg-[#FAF7F2] text-[#1E1A16] text-xs font-bold hover:bg-[#f5ede2] transition-colors">
                        Tutup
                    </button>
                    <a :href="'{{ route('form.pesan') }}?tipe=' + activeModalRoom.type"
                        class="flex-1 py-3.5 rounded-2xl bg-[#1E1A16] hover:bg-stone-800 text-white text-xs font-bold text-center shadow-md transition-all">
                        Reservasi Kamar Ini
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- GSAP for Smooth Section Animations & 3D Tilt (Ease-in-Out) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (!window.gsap) return;
            gsap.registerPlugin(ScrollTrigger);

            // Universal smooth ease-in-out curve
            const smoothEase = 'power2.inOut';

            // 1. Hero: Background, Headlines, Subtitle, Aside Panel & Floating Booking Bar (Ease-in-Out)
            gsap.from('#hero-bg', {
                scale: 1.08,
                duration: 1.8,
                ease: smoothEase
            });
            gsap.from('#hero .hl', {
                filter: 'blur(12px)',
                opacity: 0,
                y: 35,
                duration: 1.1,
                ease: smoothEase,
                stagger: 0.15,
                delay: 0.15
            });
            gsap.from('#hero-sub, #hero-hint', {
                opacity: 0,
                y: 20,
                duration: 1.0,
                ease: smoothEase,
                delay: 0.45
            });
            gsap.from('#hero-panel', {
                opacity: 0,
                y: 30,
                duration: 1.1,
                ease: smoothEase,
                delay: 0.35
            });
            gsap.from('#hero-book', {
                opacity: 0,
                y: 25,
                duration: 1.0,
                ease: smoothEase,
                delay: 0.55
            });

            // Hero 3D Fan Stack: Scroll-driven "Mencar" Animation (Sesuai scroll pengguna)
            const heroFanStack = document.querySelector('#hero-fan-stack');
            if (heroFanStack) {
                const getSpreadX = () => {
                    if (window.innerWidth >= 1280) return 165;
                    if (window.innerWidth >= 1024) return 140;
                    if (window.innerWidth >= 640)  return 105;
                    return 60;
                };

                const getInitialOffset = () => {
                    return window.innerWidth >= 1024 ? 18 : 10;
                };

                // Posisikan semua kartu di tengah stack
                gsap.set('.hero-fan-card', {
                    xPercent: -50,
                    yPercent: -50,
                    left: '50%',
                    top: '50%',
                    transformOrigin: '50% 80%'
                });

                // Posisi awal (tertumpuk rapi sedikit memiring seperti kartu remi)
                const initX = getInitialOffset();
                gsap.set('.hero-fan-card-1', { x: -initX, y: 0, rotation: -4, scale: 0.95 });
                gsap.set('.hero-fan-card-2', { x: 0, y: 0, rotation: 0, scale: 1.0 });
                gsap.set('.hero-fan-card-3', { x: initX, y: 0, rotation: 4, scale: 0.95 });

                // ScrollTrigger timeline: saat user scroll ke bawah, kartu "mencar" memisah
                gsap.timeline({
                    scrollTrigger: {
                        trigger: '#hero',
                        start: 'top top',
                        end: '+=350',
                        scrub: 0.8,
                        invalidateOnRefresh: true,
                    }
                })
                .to('.hero-fan-card-1', {
                    x: () => -getSpreadX(),
                    y: -14,
                    rotation: -8,
                    scale: 0.98,
                    ease: 'power2.out'
                }, 0)
                .to('.hero-fan-card-2', {
                    x: 0,
                    y: -10,
                    rotation: 0,
                    scale: 1.04,
                    ease: 'power2.out'
                }, 0)
                .to('.hero-fan-card-3', {
                    x: () => getSpreadX(),
                    y: 12,
                    rotation: 8,
                    scale: 0.98,
                    ease: 'power2.out'
                }, 0);
            }

            // 2. Section About: Left Column Info, SVG Trail, Umbrella & 3 Portrait Cards (Ease-in-Out)
            gsap.fromTo('#about-info',
                { y: 35, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#about', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );

            const trail = document.querySelector('#about-trail path');
            if (trail) {
                gsap.from(trail, {
                    strokeDashoffset: 400,
                    strokeDasharray: 400,
                    duration: 1.8,
                    ease: smoothEase,
                    scrollTrigger: { trigger: '#about-trail', start: 'top 85%', toggleActions: 'play none none reverse' }
                });
            }
            gsap.from('#about-umbrella', {
                scale: 0,
                rotate: -45,
                duration: 1.0,
                ease: smoothEase,
                scrollTrigger: { trigger: '#about-trail', start: 'top 85%', delay: 0.4, toggleActions: 'play none none reverse' }
            });

            gsap.fromTo('#about .about-card', 
                { y: 40, opacity: 0 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    duration: 1.0, 
                    stagger: 0.18, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#about', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );

            // 3. Section Partner Brand Strip: Container & Logos (Ease-in-Out)
            gsap.fromTo('#partner-strip', 
                { y: 35, opacity: 0 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    duration: 1.0, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#partner-strip', start: 'top 88%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#partner-strip .partner-logo',
                { scale: 0.9, opacity: 0 },
                {
                    scale: 1,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.08,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#partner-strip', start: 'top 88%', toggleActions: 'play none none reverse' }
                }
            );

            // 4. Section Pengalaman: 3 Vertical Experiential Cards & Button (Ease-in-Out)
            gsap.fromTo('#pengalaman .exp-card', 
                { y: 45, opacity: 0, scale: 0.96 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    scale: 1,
                    duration: 1.0, 
                    stagger: 0.18, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#pengalaman', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#pengalaman-btn',
                { y: 25, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.9,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#pengalaman-btn', start: 'top 90%', toggleActions: 'play none none reverse' }
                }
            );

            // 5. Section Wedding: Header, 3D Fan-out Gallery, & Bottom CTA (Ease-in-Out)
            gsap.fromTo('#wedding-header',
                { y: 35, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#wedding', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#wedding-gallery', 
                { y: 40, opacity: 0 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    duration: 1.1, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#wedding', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#wedding-footer',
                { y: 30, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.9,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#wedding-footer', start: 'top 90%', toggleActions: 'play none none reverse' }
                }
            );

            // 6. Section Kamar: Caramel Container Header, Room Cards & Button (Ease-in-Out)
            gsap.fromTo('#kamar-header',
                { y: 35, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#kamar', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#kamar .room-card', 
                { y: 45, opacity: 0, scale: 0.96 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    scale: 1, 
                    duration: 1.0, 
                    stagger: 0.18, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#kamar', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#kamar-footer',
                { y: 25, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.9,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#kamar-footer', start: 'top 92%', toggleActions: 'play none none reverse' }
                }
            );

            // 7. Section Tarif & Fasilitas (Harga): Header & Pricing Cards (Ease-in-Out)
            gsap.fromTo('#harga-header',
                { y: 35, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#harga', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#harga .pricing-card', 
                { y: 40, opacity: 0 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    duration: 1.0, 
                    stagger: 0.16, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#harga', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );

            // 8. Section Lokasi: Info Text, Transit Items & Interactive Map (Ease-in-Out)
            gsap.fromTo('#lokasi-info', 
                { x: -35, opacity: 0 }, 
                { 
                    x: 0, 
                    opacity: 1, 
                    duration: 1.0, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#lokasi', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#lokasi-info .transit-item',
                { y: 20, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.12,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#lokasi', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#lokasi-map', 
                { x: 35, opacity: 0 }, 
                { 
                    x: 0, 
                    opacity: 1, 
                    duration: 1.0, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#lokasi', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );

            // 9. Section Ulasan Tamu: Header & Testimonial Cards (Ease-in-Out)
            gsap.fromTo('#ulasan-header',
                { y: 35, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#ulasan', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#ulasan .review-card', 
                { y: 35, opacity: 0 }, 
                { 
                    y: 0, 
                    opacity: 1, 
                    duration: 1.0, 
                    stagger: 0.16, 
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#ulasan', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );

            // 10. Section FAQ: Header & Accordion Items (Ease-in-Out)
            gsap.fromTo('#faq-header',
                { y: 35, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#faq', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#faq .faq-item',
                { y: 25, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.85,
                    stagger: 0.12,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#faq', start: 'top 85%', toggleActions: 'play none none reverse' }
                }
            );

            // 11. Section CTA Banner: Container, Text & Action Button (Ease-in-Out)
            gsap.fromTo('#cta-banner .cta-box',
                { scale: 0.96, y: 35, opacity: 0 },
                {
                    scale: 1,
                    y: 0,
                    opacity: 1,
                    duration: 1.0,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#cta-banner', start: 'top 88%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#cta-banner .cta-content',
                { x: -25, opacity: 0 },
                {
                    x: 0,
                    opacity: 1,
                    duration: 0.9,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#cta-banner', start: 'top 88%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#cta-banner .cta-action',
                { x: 25, opacity: 0 },
                {
                    x: 0,
                    opacity: 1,
                    duration: 0.9,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#cta-banner', start: 'top 88%', toggleActions: 'play none none reverse' }
                }
            );

            // 12. Section Footer: Columns & Copyright (Ease-in-Out)
            gsap.fromTo('#footer .footer-col',
                { y: 30, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.9,
                    stagger: 0.12,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#footer', start: 'top 92%', toggleActions: 'play none none reverse' }
                }
            );
            gsap.fromTo('#footer-bottom',
                { opacity: 0 },
                {
                    opacity: 1,
                    duration: 0.8,
                    ease: smoothEase,
                    immediateRender: false,
                    scrollTrigger: { trigger: '#footer', start: 'top 92%', toggleActions: 'play none none reverse' }
                }
            );

            // 13. Desktop Interactive 3D Card Tilt with Ease-in-Out Return
            if (window.matchMedia('(min-width: 1024px)').matches) {
                document.querySelectorAll('.tilt-card').forEach(card => {
                    card.addEventListener('mousemove', e => {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        gsap.to(card, {
                            rotationY: x * 0.025,
                            rotationX: -y * 0.025,
                            ease: 'power1.inOut',
                            duration: 0.35,
                            transformPerspective: 1000
                        });
                    });
                    card.addEventListener('mouseleave', () => {
                        gsap.to(card, {
                            rotationY: 0,
                            rotationX: 0,
                            ease: smoothEase,
                            duration: 0.6
                        });
                    });
                });
            }

            // 14. Smooth Native Scroll for Anchor Links
            document.querySelectorAll('a[href*="#"]').forEach(a => {
                a.addEventListener('click', e => {
                    const href = a.getAttribute('href');
                    if (!href) return;
                    try {
                        const url = new URL(a.href, window.location.href);
                        if (url.pathname === window.location.pathname && url.hash && url.hash.length > 1) {
                            const target = document.querySelector(url.hash);
                            if (target) {
                                e.preventDefault();
                                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                setTimeout(() => ScrollTrigger.refresh(), 400);
                            }
                        }
                    } catch (_) {}
                });
            });

            // 15. Bulletproof Safety Fallback: Menjamin seluruh elemen section TIDAK PERNAH blank / tak kasat mata
            const ensureElementsVisible = () => {
                ScrollTrigger.refresh();
                document.querySelectorAll(`
                    .room-card, .about-card, .exp-card, .pricing-card, .review-card, 
                    #wedding-gallery, .partner-logo, #about-info, #wedding-header, 
                    #wedding-footer, #kamar-header, #kamar-footer, #harga-header, 
                    #lokasi-info, #lokasi-map, #ulasan-header, #faq-header, .faq-item, 
                    .cta-box, .cta-content, .cta-action, .footer-col, #footer-bottom
                `).forEach(el => {
                    if (window.getComputedStyle(el).opacity < 0.5) {
                        gsap.to(el, {
                            opacity: 1,
                            y: 0,
                            x: 0,
                            scale: 1,
                            duration: 0.5,
                            ease: smoothEase,
                            overwrite: 'auto'
                        });
                    }
                });
            };

            setTimeout(ensureElementsVisible, 800);
            setTimeout(ensureElementsVisible, 1800);

            window.addEventListener('load', () => ScrollTrigger.refresh());
        });
    </script>

    <!-- Alpine.js Application Logic -->
    <script>
        function biglandApp() {
            return {
                scrolled: false,
                mobileMenuOpen: false,
                modalOpen: false,

                quickBooking: {
                    checkin: '',
                    tipe: 'Standar',
                    durasi: 1,
                },

                roomData: {
                    'Standar': {
                        type: 'Standar',
                        name: 'Standar Room',
                        price: 500000,
                        rating: '4.8',
                        size: '24 m²',
                        capacity: '2 Dewasa',
                        bed: '1 Queen Bed',
                        view: 'City View',
                        description: 'Dirancang untuk kenyamanan maksimal dengan estetika minimalis modern, kasur ortopedik berkualitas tinggi, serta fasilitas esensial lengkap untuk pelancong bisnis dan liburan mandiri.',
                        image: 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=800&auto=format&fit=crop',
                        amenities: ['Wi-Fi 6 Berkecepatan Tinggi', 'Smart TV 43" (Netflix)', 'Rain Shower & Water Heater', 'Safety Deposit Box', 'Complimentary Mineral Water', 'Coffee & Tea Maker']
                    },
                    'Deluxe': {
                        type: 'Deluxe',
                        name: 'Deluxe Suite',
                        price: 800000,
                        rating: '4.9',
                        size: '36 m²',
                        capacity: '2 Dewasa, 1 Anak',
                        bed: '1 King Size Bed',
                        view: 'Skyline & Sunset View',
                        description: 'Ruang yang lebih lega dengan sofa santai terpisah, balkon privat dengan panorama kota metropolitan, serta pencahayaan hangat alami yang menciptakan suasana beristirahat paripurna.',
                        image: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=800&auto=format&fit=crop',
                        amenities: ['Wi-Fi 6 Ultra Fast', 'Smart TV 55" 4K', 'Balkon Privat dengan Meja Teh', 'Mesin Kopi Nespresso', 'Bathrobes & Premium Toiletries', 'Sarapan Prasmanan 2 Orang']
                    },
                    'Executif': {
                        type: 'Executif',
                        name: 'Executif Suite',
                        price: 1200000,
                        rating: '5.0',
                        size: '54 m²',
                        capacity: '3 Dewasa',
                        bed: '1 Super King + Daybed',
                        view: 'Panoramic Cityscape 180°',
                        description: 'Puncak kemewahan di Bigland dengan bathtub panoramik menghadap cakrawala gedung tinggi, ruang tamu eksekutif luas, fasilitas bar pribadi, serta akses VIP tanpa batas.',
                        image: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=800&auto=format&fit=crop',
                        amenities: ['Akses Eksklusif Executive Lounge', 'Bathtub Marmer Panoramik', 'Smart TV 65" Surround Sound', 'Afternoon Tea & Cocktails Harian', 'Layanan Butler 24 Jam', 'Antar-Jemput Bandara Gratis']
                    }
                },

                activeModalRoom: {},

                init() {
                    this.activeModalRoom = this.roomData['Standar'];

                    const today = new Date().toISOString().split('T')[0];
                    this.quickBooking.checkin = today;

                    window.addEventListener('scroll', () => {
                        this.scrolled = window.pageYOffset > 50;
                    });

                    this.initScrollReveal();
                },

                openRoomModal(type) {
                    if (this.roomData[type]) {
                        this.activeModalRoom = this.roomData[type];
                        this.modalOpen = true;
                    }
                },

                formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        maximumFractionDigits: 0
                    }).format(number);
                },

                submitQuickBooking() {
                    let url = "{{ route('form.pesan') }}"
                        + "?tipe=" + encodeURIComponent(this.quickBooking.tipe)
                        + "&tgl=" + encodeURIComponent(this.quickBooking.checkin)
                        + "&durasi=" + encodeURIComponent(this.quickBooking.durasi);
                    window.location.href = url;
                },

                initScrollReveal() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('active');
                            }
                        });
                    }, { threshold: 0.12 });

                    this.$nextTick(() => {
                        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
                    });
                }
            }
        }
    </script>
</body>

</html>