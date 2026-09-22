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

    <!-- Google Fonts: Plus Jakarta Sans (Single Consistent Font) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        stone: {
                            50: '#fafaf9',
                            100: '#f5f5f4',
                            200: '#e7e5e4',
                            300: '#d6d3d1',
                            400: '#a8a29e',
                            500: '#78716c',
                            800: '#292524',
                            900: '#1c1917',
                        },
                        obsidian: {
                            50: '#f6f7f8',
                            100: '#eceff1',
                            800: '#1a1f26',
                            900: '#10141a',
                            950: '#090c0f',
                        },
                        gold: {
                            400: '#dfb958',
                            500: '#c79d39',
                            600: '#ab8124',
                        }
                    },
                    animation: {
                        'spin-slow': 'spin 18s linear infinite',
                        'float-slow': 'floatSlow 5s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                    },
                    keyframes: {
                        floatSlow: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-8px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.6', transform: 'scale(1)' },
                            '50%': { opacity: '1', transform: 'scale(1.05)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #faf9f6;
            color: #10141a;
            font-feature-settings: "cv02", "cv03", "cv04", "cv11";
        }
        
        ::-webkit-scrollbar { width: 7px; }
        ::-webkit-scrollbar-track { background: #faf9f6; }
        ::-webkit-scrollbar-thumb { background: #d6d3d1; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #a8a29e; }

        .glass-header {
            background: rgba(250, 249, 246, 0.84);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .glass-dark {
            background: rgba(16, 20, 26, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; margin: 0; 
        }

        /* Editorial nav link: quiet underline that draws in on hover, no pill/box chrome */
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
            background: linear-gradient(to right, #dfb958, #ab8124);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .nav-link:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }
    </style>
</head>
<body class="selection:bg-obsidian-900 selection:text-white font-sans antialiased overflow-x-hidden"
      x-data="biglandApp()">

    <!-- Fixed Top Stack: Announcement Banner + Header (bungkus jadi satu supaya tidak saling menutupi) -->
    <div class="fixed top-0 left-0 right-0 z-50" x-data="{ showNotice: true }">

        <!-- Top Announcement Strip (Minimalist Promo Banner) -->
        <div x-show="showNotice" 
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 max-h-12"
             x-transition:leave-end="opacity-0 max-h-0"
             class="bg-obsidian-900 text-stone-300 text-[11px] py-2 px-6 flex items-center justify-between border-b border-obsidian-800 tracking-wide overflow-hidden">
            <div class="max-w-7xl mx-auto flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
                <span class="font-medium text-stone-200">Penawaran Eksklusif Bigland:</span>
                <span>Dapatkan potongan 10% untuk reservasi minimal 3 malam secara otomatis.</span>
            </div>
            <button @click="showNotice = false" class="text-stone-400 hover:text-white transition-colors">
                <i class="ph ph-x text-xs"></i>
            </button>
        </div>

        <!-- Glass Header -->
        <header class="transition-all duration-300 glass-header border-b border-stone-200/70"
                :class="{ 'shadow-sm py-3': scrolled, 'py-4 md:py-5': !scrolled }">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 flex justify-between items-center">
            
            <!-- Bigland Brand Monogram Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-obsidian-900 text-white flex items-center justify-center font-bold shadow-md group-hover:scale-105 group-hover:bg-black transition-all duration-300">
                    <i class="ph-fill ph-buildings text-xl text-gold-400"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-obsidian-900 group-hover:text-gold-600 transition-colors">
                        Bigland
                    </span>
                    <span class="text-[9px] tracking-[0.25em] uppercase font-bold text-stone-400 -mt-1">
                        Hotel & Suites
                    </span>
                </div>
            </a>

            <!-- Desktop Editorial Navigation (flat links, gold underline on hover) -->
            <nav class="hidden lg:flex items-center gap-9">
                <a href="#kamar" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    Koleksi Kamar
                </a>
                <a href="#bento-fasilitas" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    Pengalaman
                </a>
                <a href="#kalkulator" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    Estimasi Biaya
                </a>
                <a href="#harga" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    Tarif
                </a>
                <a href="#lokasi" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    Lokasi
                </a>
                <a href="#ulasan" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    Ulasan
                </a>
                <a href="#faq" class="nav-link text-xs font-semibold text-stone-600 hover:text-obsidian-900 transition-colors">
                    FAQ
                </a>
            </nav>

            <!-- Right Controls: Auth & Reservation CTA -->
            <div class="flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex text-xs font-semibold text-stone-700 hover:text-obsidian-900 px-3.5 py-2 rounded-full hover:bg-stone-200/50 transition-colors">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hidden md:inline-flex text-xs font-semibold text-stone-700 hover:text-obsidian-900 px-3.5 py-2 rounded-full hover:bg-stone-200/50 transition-colors">
                            Daftar
                        </a>
                    @endif
                @else
                    <!-- Authenticated Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                @click.away="open = false" 
                                class="flex items-center gap-2 text-xs font-semibold text-obsidian-900 bg-white px-3.5 py-2 rounded-full border border-stone-200 shadow-sm hover:border-stone-400 transition-all">
                            <span class="w-6 h-6 rounded-full bg-stone-100 text-obsidian-900 flex items-center justify-center font-bold text-[11px]">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <span class="max-w-[100px] truncate">{{ Auth::user()->name }}</span>
                            <i class="ph ph-caret-down text-stone-400 text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                             class="absolute right-0 mt-2 w-56 bg-white border border-stone-200 rounded-2xl shadow-xl py-2 z-50"
                             style="display: none;">
                            <div class="px-4 py-2 border-b border-stone-100 mb-1">
                                <p class="text-[10px] text-stone-400 uppercase font-bold">Akun Terdaftar</p>
                                <p class="text-xs font-bold text-obsidian-900 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 text-xs text-stone-700 hover:bg-stone-50 flex items-center gap-2.5 transition-colors font-semibold">
                                <i class="ph ph-squares-four text-base text-stone-500"></i> Dashboard Pengguna
                            </a>
                            <a href="{{ route('riwayat') }}" class="px-4 py-2 text-xs text-stone-700 hover:bg-stone-50 flex items-center gap-2.5 transition-colors">
                                <i class="ph ph-receipt text-base text-stone-500"></i> Riwayat Reservasiku
                            </a>
                            <a href="{{ route('form.pesan') }}" class="px-4 py-2 text-xs text-stone-700 hover:bg-stone-50 flex items-center gap-2.5 transition-colors">
                                <i class="ph ph-plus-circle text-base text-stone-500"></i> Buat Pesanan Baru
                            </a>
                            <div class="border-t border-stone-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-600 hover:bg-red-50 flex items-center gap-2.5 transition-colors font-medium">
                                    <i class="ph ph-sign-out text-base"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

                <!-- Primary CTA Button with Magnetic Pulse -->
                <a href="{{ route('form.pesan') }}" class="relative group inline-flex items-center gap-2 bg-obsidian-900 hover:bg-black text-white px-5 py-2.5 rounded-full text-xs font-semibold transition-all duration-300 shadow-sm hover:shadow-md hover:scale-[1.03] active:scale-95">
                    <span>Pesan Kamar</span>
                    <i class="ph ph-arrow-up-right group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                </a>

                <!-- Mobile Hamburger Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-stone-700 hover:text-obsidian-900 focus:outline-none">
                    <i class="ph ph-list text-2xl" x-show="!mobileMenuOpen"></i>
                    <i class="ph ph-x text-2xl" x-show="mobileMenuOpen" style="display: none;"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden bg-white border-b border-stone-200 px-6 py-5 shadow-xl"
             style="display: none;">
            <div class="flex flex-col space-y-3">
                <a @click="mobileMenuOpen = false" href="#kamar" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">Koleksi Kamar</a>
                <a @click="mobileMenuOpen = false" href="#bento-fasilitas" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">Pengalaman & Fasilitas</a>
                <a @click="mobileMenuOpen = false" href="#kalkulator" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">Kalkulator Estimasi</a>
                <a @click="mobileMenuOpen = false" href="#harga" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">Daftar Tarif</a>
                <a @click="mobileMenuOpen = false" href="#lokasi" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">Lokasi & Peta</a>
                <a @click="mobileMenuOpen = false" href="#ulasan" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">Ulasan Tamu</a>
                <a @click="mobileMenuOpen = false" href="#faq" class="py-2 text-sm font-medium text-stone-700 hover:text-obsidian-900 border-b border-stone-100">FAQ</a>
                @guest
                    <div class="pt-2 flex gap-3">
                        <a href="{{ route('login') }}" class="flex-1 text-center py-2.5 rounded-full border border-stone-300 text-xs font-semibold text-stone-700">Masuk</a>
                        <a href="{{ route('register') }}" class="flex-1 text-center py-2.5 rounded-full bg-stone-100 text-xs font-semibold text-obsidian-900">Daftar</a>
                    </div>
                @endguest
            </div>
        </div>
        </header>
    </div>

    <!-- NEW HERO: Asymmetric Editorial Split Layout with Dynamic Visual Showcase -->
    <section class="relative pt-32 sm:pt-40 pb-20 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-12">
            
            <!-- Left Editorial Text Column -->
            <div class="lg:col-span-6 space-y-6 reveal">
                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white border border-stone-200 text-stone-700 text-xs font-semibold shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    <span class="text-obsidian-900 font-bold">Kamar Tersedia</span>
                    <span class="text-stone-300">•</span>
                    <span class="text-stone-500">Jakarta Pusat CBD</span>
                </div>

                <!-- Main Editorial Headline -->
                <h1 class="text-4xl sm:text-6xl md:text-[4rem] font-extrabold tracking-tight text-obsidian-900 leading-[1.08]">
                    Kemewahan <br>
                    <span class="text-stone-500 font-extrabold">Kontemporer</span> <br>
                    di Pusat Kota.
                </h1>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base text-stone-500 leading-relaxed max-w-lg font-normal">
                    Selamat datang di <strong class="text-obsidian-900 font-semibold">Bigland</strong>. Menghadirkan keseimbangan sempurna antara kesederhanaan estetika modern, privasi istirahat tanpa gangguan, dan keramahan personal kelas dunia.
                </p>

                <!-- Micro-Action & Trust Badges -->
                <div class="pt-2 flex flex-wrap items-center gap-6">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 border border-amber-200 flex items-center justify-center font-bold text-lg">
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <div>
                            <div class="text-sm font-extrabold text-obsidian-900">4.9 / 5.0 Rating</div>
                            <div class="text-[11px] text-stone-400">1,240+ Tamu Terverifikasi</div>
                        </div>
                    </div>

                    <div class="h-8 w-px bg-stone-200 hidden sm:block"></div>

                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-2xl bg-stone-100 text-obsidian-900 border border-stone-200 flex items-center justify-center font-bold text-lg">
                            <i class="ph-fill ph-shield-check"></i>
                        </div>
                        <div>
                            <div class="text-sm font-extrabold text-obsidian-900">Official Certified</div>
                            <div class="text-[11px] text-stone-400">Clean & Safe Luxury Stay</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Visual Column: Dynamic Interactive Showcase Card Stack -->
            <div class="lg:col-span-6 relative reveal">
                <div class="absolute -inset-4 bg-gradient-to-tr from-amber-100/60 via-stone-200/40 to-transparent rounded-[3rem] blur-2xl -z-10 pointer-events-none"></div>

                <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border border-stone-200/90 h-[420px] sm:h-[480px] group bg-stone-900">
                    
                    <template x-for="(img, idx) in heroSlides" :key="idx">
                        <img :src="img.url" 
                             :alt="img.caption"
                             x-show="currentHeroSlide === idx"
                             x-transition:enter="transition ease-out duration-700"
                             x-transition:enter-start="opacity-0 scale-105"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-700"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute inset-0 w-full h-full object-cover">
                    </template>
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-obsidian-950/80 via-obsidian-950/20 to-transparent"></div>

                    <!-- Slide Controller Badges -->
                    <div class="absolute top-6 right-6 flex items-center gap-1.5 bg-obsidian-950/70 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/20 z-20">
                        <template x-for="(s, i) in heroSlides" :key="i">
                            <button @click="currentHeroSlide = i" 
                                    class="w-2 h-2 rounded-full transition-all"
                                    :class="currentHeroSlide === i ? 'w-5 bg-white' : 'bg-white/40'"></button>
                        </template>
                    </div>

                    <!-- Top Left Weather Pill -->
                    <div class="absolute top-6 left-6 glass-card px-4 py-2 rounded-2xl border border-white/50 text-obsidian-900 text-xs font-semibold shadow-md flex items-center gap-2 z-20">
                        <i class="ph-fill ph-sun text-amber-500 text-base"></i>
                        <span>Jakarta CBD • 28°C</span>
                    </div>

                    <!-- Bottom Floating Caption Card -->
                    <div class="absolute bottom-6 left-6 right-6 glass-dark p-5 rounded-[2rem] border border-white/20 text-white z-20 flex items-center justify-between gap-4">
                        <div>
                            <span class="text-[10px] tracking-widest uppercase font-bold text-gold-400 block mb-0.5" x-text="heroSlides[currentHeroSlide].tag"></span>
                            <h4 class="text-sm sm:text-base font-bold text-white" x-text="heroSlides[currentHeroSlide].caption"></h4>
                        </div>
                        <a href="#kamar" class="w-10 h-10 rounded-full bg-white text-obsidian-900 flex items-center justify-center text-base font-bold hover:scale-110 transition-transform shadow-md shrink-0">
                            <i class="ph ph-arrow-down"></i>
                        </a>
                    </div>

                    <!-- Circular Rotating Brand Stamp Badge -->
                    <div class="absolute -bottom-6 -right-6 hidden sm:flex w-24 h-24 rounded-full bg-obsidian-900 border-4 border-[#faf9f6] text-white items-center justify-center shadow-xl animate-spin-slow z-30 pointer-events-none">
                        <svg class="w-20 h-20 fill-current text-stone-300 text-[8px] font-bold tracking-widest" viewBox="0 0 100 100">
                            <path id="textPath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="transparent" />
                            <text>
                                <textPath href="#textPath" startOffset="0%">• BIGLAND HOTEL • JAKARTA LUXURY STAY </textPath>
                            </text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- NEW QUICK BOOKING ISLAND -->
        <div class="relative max-w-5xl mx-auto z-20 reveal">
            <div class="bg-white rounded-[2.2rem] p-4 sm:p-5 shadow-2xl border border-stone-200/90">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 items-center">
                    
                    <!-- 1. Check-in Date -->
                    <div class="px-4 py-2.5 rounded-2xl bg-stone-50 border border-stone-200/80 hover:border-obsidian-900 transition-colors">
                        <span class="block text-[10px] font-bold uppercase tracking-wider text-stone-400">Tanggal Check-in</span>
                        <input type="date" 
                               x-model="quickBooking.checkin" 
                               class="w-full bg-transparent text-xs font-bold text-obsidian-900 outline-none cursor-pointer pt-0.5">
                    </div>

                    <!-- 2. Room Selector -->
                    <div class="px-4 py-2.5 rounded-2xl bg-stone-50 border border-stone-200/80 hover:border-obsidian-900 transition-colors">
                        <span class="block text-[10px] font-bold uppercase tracking-wider text-stone-400">Tipe Kamar</span>
                        <select x-model="quickBooking.tipe" class="w-full bg-transparent text-xs font-bold text-obsidian-900 outline-none cursor-pointer pt-0.5">
                            <option value="Standar">Standar Room (Rp 500k)</option>
                            <option value="Deluxe">Deluxe Room (Rp 800k)</option>
                            <option value="Executif">Executif Suite (Rp 1.2M)</option>
                        </select>
                    </div>

                    <!-- 3. Duration Selector -->
                    <div class="px-4 py-2.5 rounded-2xl bg-stone-50 border border-stone-200/80 hover:border-obsidian-900 transition-colors">
                        <span class="block text-[10px] font-bold uppercase tracking-wider text-stone-400">Durasi Menginap</span>
                        <div class="flex items-center justify-between pt-0.5">
                            <button type="button" @click="if (quickBooking.durasi > 1) quickBooking.durasi--" class="w-5 h-5 rounded-full bg-white border border-stone-300 text-stone-700 flex items-center justify-center text-xs hover:bg-stone-200 font-bold">-</button>
                            <span class="text-xs font-extrabold text-obsidian-900" x-text="quickBooking.durasi + ' Malam'"></span>
                            <button type="button" @click="quickBooking.durasi++" class="w-5 h-5 rounded-full bg-white border border-stone-300 text-stone-700 flex items-center justify-center text-xs hover:bg-stone-200 font-bold">+</button>
                        </div>
                    </div>

                    <!-- 4. Submit CTA -->
                    <button type="button" 
                            @click="submitQuickBooking()"
                            class="w-full bg-obsidian-900 hover:bg-black text-white font-bold text-xs py-4 px-6 rounded-2xl transition-all shadow-md hover:shadow-xl hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-2">
                        <i class="ph ph-calendar-check text-base"></i>
                        <span>Cek & Reservasi</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: Bento Grid Layout (Fasilitas & Pengalaman Tamu) -->
    <section id="bento-fasilitas" class="py-16 sm:py-24 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-stone-200/70 text-obsidian-900 text-xs font-semibold mb-3">
                    <i class="ph-fill ph-sparkle text-gold-500"></i> Pengalaman Eksklusif
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-obsidian-900 tracking-tight">
                    Fasilitas Berkelas Dunia di Bigland
                </h2>
            </div>
            <p class="text-stone-500 max-w-md text-xs sm:text-sm leading-relaxed">
                Setiap detail dirancang dengan presisi untuk memenuhi kebutuhan istirahat, relaksasi, serta produktivitas Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            
            <!-- Bento 1: Large Featured Item (Sky Infinity Pool) -->
            <div class="md:col-span-8 relative rounded-[2.5rem] overflow-hidden h-[340px] sm:h-[400px] group border border-stone-200/80 shadow-md reveal">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1200&auto=format&fit=crop" 
                     alt="Bigland Sky Pool" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-obsidian-950/85 via-obsidian-950/30 to-transparent"></div>
                
                <div class="absolute top-6 left-6">
                    <span class="px-3 py-1.5 rounded-full bg-white/90 backdrop-blur-md text-[11px] font-bold text-obsidian-900 shadow-sm">
                        Lantai 22 Rooftop
                    </span>
                </div>

                <div class="absolute bottom-6 left-6 right-6 text-white max-w-lg">
                    <span class="text-xs uppercase font-bold tracking-widest text-gold-400">Pemandangan Kota 360°</span>
                    <h3 class="text-2xl font-bold text-white mt-1 mb-2">Infinity Sky Pool & Sun Deck</h3>
                    <p class="text-xs text-stone-300 leading-relaxed hidden sm:block">
                        Berenang di atas ketinggian sambil menikmati panorama matahari terbenam spektakuler di langit metropolitan Jakarta.
                    </p>
                </div>
            </div>

            <!-- Bento 2: Tall Vertical Item (The Bigland Bistro) -->
            <div class="md:col-span-4 relative rounded-[2.5rem] overflow-hidden h-[340px] sm:h-[400px] group border border-stone-200/80 shadow-md reveal">
                <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?q=80&w=800&auto=format&fit=crop" 
                     alt="Bigland Bistro Dining" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-obsidian-950/85 via-obsidian-950/30 to-transparent"></div>

                <div class="absolute top-6 left-6">
                    <span class="px-3 py-1.5 rounded-full bg-white/90 backdrop-blur-md text-[11px] font-bold text-obsidian-900 shadow-sm">
                        Artisan Gastronomi
                    </span>
                </div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <h3 class="text-xl font-bold text-white mb-1">The Bigland Bistro</h3>
                    <p class="text-xs text-stone-300 leading-relaxed">
                        Sajian kuliner internasional dan Nusantara dipersiapkan oleh master chef berpengalaman.
                    </p>
                </div>
            </div>

            <!-- Bento 3: Wellness Studio -->
            <div class="md:col-span-4 relative rounded-[2.5rem] overflow-hidden h-[300px] group border border-stone-200/80 shadow-md reveal">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=800&auto=format&fit=crop" 
                     alt="Technogym Fitness" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-obsidian-950/85 via-obsidian-950/30 to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <div class="w-9 h-9 rounded-xl bg-white/20 backdrop-blur-sm text-white flex items-center justify-center text-lg mb-2">
                        <i class="ph ph-barbell"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-1">Wellness & Technogym</h3>
                    <p class="text-xs text-stone-300">Peralatan kebugaran modern lengkap dengan ruang sauna.</p>
                </div>
            </div>

            <!-- Bento 4: Executive Sky Lounge -->
            <div class="md:col-span-4 bg-obsidian-900 text-white p-7 rounded-[2.5rem] border border-obsidian-800 shadow-md flex flex-col justify-between reveal">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-obsidian-800 text-gold-400 flex items-center justify-center text-2xl mb-4 border border-obsidian-700">
                        <i class="ph-fill ph-crown"></i>
                    </div>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-gold-400">Akses Eksklusif</span>
                    <h3 class="text-xl font-bold text-white mt-1 mb-2">Executive Sky Lounge</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        Lounge privat untuk pertemuan santai, teh sore hari, dan koktail petang istimewa tamu suite.
                    </p>
                </div>
                <div class="pt-4 border-t border-obsidian-800 flex items-center justify-between text-xs text-stone-300">
                    <span>Akses 24 Jam</span>
                    <i class="ph ph-arrow-right text-gold-400"></i>
                </div>
            </div>

            <!-- Bento 5: Grand Ballroom -->
            <div class="md:col-span-4 relative rounded-[2.5rem] overflow-hidden h-[300px] group border border-stone-200/80 shadow-md reveal">
                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=800&auto=format&fit=crop" 
                     alt="Grand Ballroom" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-obsidian-950/85 via-obsidian-950/30 to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <div class="w-9 h-9 rounded-xl bg-white/20 backdrop-blur-sm text-white flex items-center justify-center text-lg mb-2">
                        <i class="ph ph-presentation-chart"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-1">Meeting & Grand Ballroom</h3>
                    <p class="text-xs text-stone-300">Kapasitas hingga 500 tamu untuk konferensi dan resepsi.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- NEW SECTION: Koleksi Kamar dengan Mini-Carousel & Filter Interaktif -->
    <section id="kamar" class="py-16 sm:py-24 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-stone-200/70 text-obsidian-900 text-xs font-semibold mb-3">
                    <i class="ph-fill ph-bed"></i> Pilihan Akomodasi
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-obsidian-900 tracking-tight">
                    Koleksi Kamar & Suite Bigland
                </h2>
            </div>
            
            <div class="flex flex-wrap items-center gap-2 bg-stone-100 p-1.5 rounded-full border border-stone-200/80 self-start md:self-auto">
                <button @click="activeFilter = 'all'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': activeFilter === 'all', 'text-stone-500 hover:text-obsidian-900': activeFilter !== 'all' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Semua Kamar (3)
                </button>
                <button @click="activeFilter = 'Standar'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': activeFilter === 'Standar', 'text-stone-500 hover:text-obsidian-900': activeFilter !== 'Standar' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Standar
                </button>
                <button @click="activeFilter = 'Deluxe'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': activeFilter === 'Deluxe', 'text-stone-500 hover:text-obsidian-900': activeFilter !== 'Deluxe' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Deluxe
                </button>
                <button @click="activeFilter = 'Executif'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': activeFilter === 'Executif', 'text-stone-500 hover:text-obsidian-900': activeFilter !== 'Executif' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Executif
                </button>
            </div>
        </div>

        <!-- Room Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- CARD 1: Standar Room -->
            <div x-show="activeFilter === 'all' || activeFilter === 'Standar'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group bg-white rounded-[2.5rem] p-5 border border-stone-200 shadow-sm hover:shadow-2xl hover:border-stone-300 transition-all duration-500 flex flex-col justify-between reveal">
                <div>
                    <div class="relative h-64 rounded-[2rem] overflow-hidden bg-stone-100 mb-5">
                        <img :src="roomPhotos.Standar[currentPhotoIndex.Standar]" 
                             alt="Standar Room Bigland" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        
                        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-xs font-extrabold text-obsidian-900 shadow-sm">
                            Rp 500.000 <span class="text-stone-400 font-normal">/ malam</span>
                        </div>

                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-2.5 py-1 rounded-full text-[11px] font-bold text-amber-600 flex items-center gap-1 shadow-sm">
                            <i class="ph-fill ph-star"></i> 4.8
                        </div>

                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center gap-1.5 bg-black/40 backdrop-blur-sm px-2.5 py-1 rounded-full z-10">
                            <template x-for="(p, i) in roomPhotos.Standar" :key="i">
                                <button @click="currentPhotoIndex.Standar = i" 
                                        class="w-1.5 h-1.5 rounded-full transition-all"
                                        :class="currentPhotoIndex.Standar === i ? 'w-4 bg-white' : 'bg-white/50'"></button>
                            </template>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold text-obsidian-900">Standar Room</h3>
                            <span class="text-[11px] font-bold text-stone-400">24 m²</span>
                        </div>
                        
                        <p class="text-xs text-stone-500 leading-relaxed mb-5">
                            Kamar efisien berkonsep modern minimalis dengan sirkulasi udara alami dan kasur empuk berkualitas tinggi.
                        </p>

                        <div class="space-y-2 py-3 border-y border-stone-100 text-xs text-stone-600 mb-5">
                            <div class="flex justify-between">
                                <span class="text-stone-400">Kapasitas:</span>
                                <strong class="text-obsidian-900">2 Dewasa + 1 Anak</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Tipe Ranjang:</span>
                                <strong class="text-obsidian-900">1 Queen Bed (160x200)</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Kamar Mandi:</span>
                                <strong class="text-obsidian-900">Rain Shower & Water Heater</strong>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="bg-stone-50 text-stone-600 px-2.5 py-1 rounded-lg text-[11px] border border-stone-100 flex items-center gap-1">
                                <i class="ph ph-wifi-high"></i> WiFi 500Mbps
                            </span>
                            <span class="bg-stone-50 text-stone-600 px-2.5 py-1 rounded-lg text-[11px] border border-stone-100 flex items-center gap-1">
                                <i class="ph ph-television"></i> Smart TV 43"
                            </span>
                            <span class="bg-stone-50 text-stone-600 px-2.5 py-1 rounded-lg text-[11px] border border-stone-100 flex items-center gap-1">
                                <i class="ph ph-snowflake"></i> Inverter AC
                            </span>
                        </div>
                    </div>
                </div>

                <div class="px-2 pt-2 grid grid-cols-2 gap-2">
                    <button type="button" 
                            @click="openRoomModal('Standar')"
                            class="w-full text-center py-3.5 rounded-2xl bg-stone-100 hover:bg-stone-200 text-obsidian-900 font-bold text-xs transition-all">
                        Lihat Detail
                    </button>
                    <a href="{{ route('form.pesan') }}?tipe=Standar" 
                       class="w-full text-center py-3.5 rounded-2xl bg-obsidian-900 hover:bg-black text-white font-bold text-xs transition-all shadow-sm">
                        Pesan Kamar
                    </a>
                </div>
            </div>

            <!-- CARD 2: Deluxe Room -->
            <div x-show="activeFilter === 'all' || activeFilter === 'Deluxe'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group bg-white rounded-[2.5rem] p-5 border border-stone-200 shadow-sm hover:shadow-2xl hover:border-stone-300 transition-all duration-500 flex flex-col justify-between reveal">
                <div>
                    <div class="relative h-64 rounded-[2rem] overflow-hidden bg-stone-100 mb-5">
                        <img :src="roomPhotos.Deluxe[currentPhotoIndex.Deluxe]" 
                             alt="Deluxe Room Bigland" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        
                        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded-full text-xs font-extrabold text-obsidian-900 shadow-sm">
                            Rp 800.000 <span class="text-stone-400 font-normal">/ malam</span>
                        </div>

                        <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-2.5 py-1 rounded-full text-[11px] font-bold text-amber-600 flex items-center gap-1 shadow-sm">
                            <i class="ph-fill ph-star"></i> 4.9
                        </div>

                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center gap-1.5 bg-black/40 backdrop-blur-sm px-2.5 py-1 rounded-full z-10">
                            <template x-for="(p, i) in roomPhotos.Deluxe" :key="i">
                                <button @click="currentPhotoIndex.Deluxe = i" 
                                        class="w-1.5 h-1.5 rounded-full transition-all"
                                        :class="currentPhotoIndex.Deluxe === i ? 'w-4 bg-white' : 'bg-white/50'"></button>
                            </template>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold text-obsidian-900">Deluxe Room</h3>
                            <span class="text-[11px] font-bold text-stone-400">36 m²</span>
                        </div>
                        
                        <p class="text-xs text-stone-500 leading-relaxed mb-5">
                            Kamar luas berpemandangan gedung bertingkat kota Jakarta dengan bathtub mewah dan area kerja santai.
                        </p>

                        <div class="space-y-2 py-3 border-y border-stone-100 text-xs text-stone-600 mb-5">
                            <div class="flex justify-between">
                                <span class="text-stone-400">Kapasitas:</span>
                                <strong class="text-obsidian-900">2 Dewasa + 2 Anak</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Tipe Ranjang:</span>
                                <strong class="text-obsidian-900">1 King Bed (180x200)</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Kamar Mandi:</span>
                                <strong class="text-obsidian-900">Bathtub & Rain Shower</strong>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="bg-stone-50 text-stone-600 px-2.5 py-1 rounded-lg text-[11px] border border-stone-100 flex items-center gap-1">
                                <i class="ph ph-buildings"></i> City View
                            </span>
                            <span class="bg-stone-50 text-stone-600 px-2.5 py-1 rounded-lg text-[11px] border border-stone-100 flex items-center gap-1">
                                <i class="ph ph-coffee"></i> Nespresso
                            </span>
                            <span class="bg-stone-50 text-stone-600 px-2.5 py-1 rounded-lg text-[11px] border border-stone-100 flex items-center gap-1">
                                <i class="ph ph-bathtub"></i> Bathtub
                            </span>
                        </div>
                    </div>
                </div>

                <div class="px-2 pt-2 grid grid-cols-2 gap-2">
                    <button type="button" 
                            @click="openRoomModal('Deluxe')"
                            class="w-full text-center py-3.5 rounded-2xl bg-stone-100 hover:bg-stone-200 text-obsidian-900 font-bold text-xs transition-all">
                        Lihat Detail
                    </button>
                    <a href="{{ route('form.pesan') }}?tipe=Deluxe" 
                       class="w-full text-center py-3.5 rounded-2xl bg-obsidian-900 hover:bg-black text-white font-bold text-xs transition-all shadow-sm">
                        Pesan Kamar
                    </a>
                </div>
            </div>

            <!-- CARD 3: Executif Suite -->
            <div x-show="activeFilter === 'all' || activeFilter === 'Executif'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group bg-obsidian-900 text-white rounded-[2.5rem] p-5 border border-obsidian-800 shadow-xl hover:shadow-2xl transition-all duration-500 flex flex-col justify-between reveal">
                <div>
                    <div class="relative h-64 rounded-[2rem] overflow-hidden bg-obsidian-800 mb-5">
                        <img :src="roomPhotos.Executif[currentPhotoIndex.Executif]" 
                             alt="Executif Suite Bigland" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-90">
                        
                        <div class="absolute top-4 left-4 bg-obsidian-950/90 backdrop-blur-md px-3.5 py-1.5 rounded-full text-xs font-extrabold text-white border border-white/20 shadow-sm">
                            Rp 1.200.000 <span class="text-stone-400 font-normal">/ malam</span>
                        </div>

                        <div class="absolute top-4 right-4 bg-white text-obsidian-900 px-2.5 py-1 rounded-full text-[11px] font-bold flex items-center gap-1 shadow-sm">
                            <i class="ph-fill ph-crown text-amber-500"></i> VIP 5.0
                        </div>

                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex items-center gap-1.5 bg-black/60 backdrop-blur-sm px-2.5 py-1 rounded-full z-10">
                            <template x-for="(p, i) in roomPhotos.Executif" :key="i">
                                <button @click="currentPhotoIndex.Executif = i" 
                                        class="w-1.5 h-1.5 rounded-full transition-all"
                                        :class="currentPhotoIndex.Executif === i ? 'w-4 bg-gold-400' : 'bg-white/50'"></button>
                            </template>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-xl font-bold text-white">Executif Suite</h3>
                            <span class="text-[11px] font-bold text-gold-400">55 m²</span>
                        </div>
                        
                        <p class="text-xs text-stone-300 leading-relaxed mb-5">
                            Kemewahan absolut dengan living room terpisah, private jacuzzi, serta akses bebas 24 jam ke Executive Sky Lounge.
                        </p>

                        <div class="space-y-2 py-3 border-y border-stone-800 text-xs text-stone-300 mb-5">
                            <div class="flex justify-between">
                                <span class="text-stone-400">Kapasitas:</span>
                                <strong class="text-white">3 Dewasa</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Tipe Ranjang:</span>
                                <strong class="text-white">Super King Bed (200x200)</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-stone-400">Layanan Khusus:</span>
                                <strong class="text-gold-400">Sky Lounge & Minibar Free</strong>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-1.5 mb-6">
                            <span class="bg-obsidian-800 text-stone-300 px-2.5 py-1 rounded-lg text-[11px] border border-obsidian-700 flex items-center gap-1">
                                <i class="ph ph-crown"></i> Sky Lounge
                            </span>
                            <span class="bg-obsidian-800 text-stone-300 px-2.5 py-1 rounded-lg text-[11px] border border-obsidian-700 flex items-center gap-1">
                                <i class="ph ph-sparkle"></i> Jacuzzi
                            </span>
                            <span class="bg-obsidian-800 text-stone-300 px-2.5 py-1 rounded-lg text-[11px] border border-obsidian-700 flex items-center gap-1">
                                <i class="ph ph-armchair"></i> Living Area
                            </span>
                        </div>
                    </div>
                </div>

                <div class="px-2 pt-2 grid grid-cols-2 gap-2">
                    <button type="button" 
                            @click="openRoomModal('Executif')"
                            class="w-full text-center py-3.5 rounded-2xl bg-obsidian-800 hover:bg-obsidian-700 text-white font-bold text-xs transition-all border border-obsidian-700">
                        Lihat Detail
                    </button>
                    <a href="{{ route('form.pesan') }}?tipe=Executif" 
                       class="w-full text-center py-3.5 rounded-2xl bg-white hover:bg-stone-100 text-obsidian-900 font-bold text-xs transition-all shadow-md">
                        Pesan Suite
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: Kalkulator Estimasi Biaya Menginap Interaktif -->
    <section id="kalkulator" class="py-16 sm:py-20 px-6 sm:px-8 max-w-5xl mx-auto">
        <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 border border-stone-200 shadow-xl relative overflow-hidden reveal">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-stone-100">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-400 mb-1">
                        <i class="ph ph-calculator text-base text-obsidian-900"></i> Fitur Interaktif
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-obsidian-900 tracking-tight">
                        Kalkulator Simulasi Biaya Menginap
                    </h3>
                </div>
                <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-stone-100 text-stone-600 border border-stone-200 self-start md:self-auto">
                    Kalkulasi Instan & Transparan
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Left Controls -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Pilih Tipe Kamar</label>
                        <div class="grid grid-cols-3 gap-2.5">
                            <button type="button" 
                                    @click="calc.tipe = 'Standar'; calc.harga = 500000"
                                    :class="{ 'border-obsidian-900 bg-obsidian-900 text-white shadow-sm': calc.tipe === 'Standar', 'border-stone-200 bg-stone-50 text-stone-700 hover:border-stone-300': calc.tipe !== 'Standar' }"
                                    class="p-3 rounded-2xl border text-center transition-all">
                                <div class="text-xs font-bold">Standar</div>
                                <div class="text-[11px] opacity-80 mt-0.5">500k/malam</div>
                            </button>
                            <button type="button" 
                                    @click="calc.tipe = 'Deluxe'; calc.harga = 800000"
                                    :class="{ 'border-obsidian-900 bg-obsidian-900 text-white shadow-sm': calc.tipe === 'Deluxe', 'border-stone-200 bg-stone-50 text-stone-700 hover:border-stone-300': calc.tipe !== 'Deluxe' }"
                                    class="p-3 rounded-2xl border text-center transition-all">
                                <div class="text-xs font-bold">Deluxe</div>
                                <div class="text-[11px] opacity-80 mt-0.5">800k/malam</div>
                            </button>
                            <button type="button" 
                                    @click="calc.tipe = 'Executif'; calc.harga = 1200000"
                                    :class="{ 'border-obsidian-900 bg-obsidian-900 text-white shadow-sm': calc.tipe === 'Executif', 'border-stone-200 bg-stone-50 text-stone-700 hover:border-stone-300': calc.tipe !== 'Executif' }"
                                    class="p-3 rounded-2xl border text-center transition-all">
                                <div class="text-xs font-bold">Executif</div>
                                <div class="text-[11px] opacity-80 mt-0.5">1.2M/malam</div>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="text-xs font-bold text-stone-500 uppercase tracking-wider">Durasi Menginap</label>
                            <span class="text-xs font-extrabold text-obsidian-900 bg-stone-100 px-3 py-1 rounded-full" x-text="calc.durasi + ' Malam'"></span>
                        </div>
                        <input type="range" min="1" max="14" x-model="calc.durasi" class="w-full accent-obsidian-900 cursor-pointer">
                        <div class="flex justify-between text-[10px] text-stone-400 mt-1 font-semibold">
                            <span>1 Malam</span>
                            <span>7 Malam</span>
                            <span>14 Malam</span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2">Layanan Tambahan</label>
                        
                        <label class="flex items-center justify-between p-3 rounded-2xl bg-stone-50 border border-stone-200 cursor-pointer hover:bg-stone-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" x-model="calc.breakfast" class="w-4 h-4 rounded text-obsidian-900 accent-obsidian-900 cursor-pointer">
                                <div>
                                    <p class="text-xs font-bold text-obsidian-900">Breakfast Buffet di The Bigland Bistro</p>
                                    <p class="text-[11px] text-stone-400">Menu variatif setiap pagi</p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-stone-700">+ Rp 80k / malam</span>
                        </label>

                        <label class="flex items-center justify-between p-3 rounded-2xl bg-stone-50 border border-stone-200 cursor-pointer hover:bg-stone-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" x-model="calc.airportTransfer" class="w-4 h-4 rounded text-obsidian-900 accent-obsidian-900 cursor-pointer">
                                <div>
                                    <p class="text-xs font-bold text-obsidian-900">Antar-Jemput Bandara Soekarno-Hatta</p>
                                    <p class="text-[11px] text-stone-400">Armada premium ber-AC (One way)</p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-stone-700">+ Rp 150k</span>
                        </label>
                    </div>
                </div>

                <!-- Right Price Summary Card -->
                <div class="lg:col-span-5 bg-obsidian-900 text-white rounded-[2.2rem] p-7 sm:p-8 flex flex-col justify-between shadow-xl">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Detail Perhitungan</span>
                        
                        <div class="mt-6 space-y-3 text-xs text-stone-300 pb-6 border-b border-obsidian-800">
                            <div class="flex justify-between">
                                <span>Kamar (<span x-text="calc.tipe"></span> x <span x-text="calc.durasi"></span> malam)</span>
                                <span class="font-bold text-white" x-text="formatRupiah(calc.harga * calc.durasi)"></span>
                            </div>
                            <div class="flex justify-between" x-show="calc.breakfast">
                                <span>Breakfast (<span x-text="calc.durasi"></span> malam)</span>
                                <span class="font-bold text-white" x-text="formatRupiah(80000 * calc.durasi)"></span>
                            </div>
                            <div class="flex justify-between" x-show="calc.airportTransfer">
                                <span>Antar-Jemput Bandara</span>
                                <span class="font-bold text-white" x-text="formatRupiah(150000)"></span>
                            </div>
                            <div class="flex justify-between text-emerald-400 font-semibold" x-show="calc.durasi >= 3">
                                <span>Diskon Long-Stay (10%)</span>
                                <span x-text="'-' + formatRupiah(getLongStayDiscount())"></span>
                            </div>
                        </div>

                        <div class="pt-6">
                            <span class="text-stone-400 text-xs">Total Estimasi Pembayaran:</span>
                            <div class="text-3xl font-extrabold text-white mt-1" x-text="formatRupiah(getTotalEstimasi())"></div>
                            <p class="text-[11px] text-emerald-400 mt-1 font-semibold" x-show="calc.durasi >= 3">
                                🎉 Selamat! Diskon menginap 3+ malam telah diterapkan.
                            </p>
                        </div>
                    </div>

                    <a :href="'{{ route('form.pesan') }}?tipe=' + calc.tipe + '&durasi=' + calc.durasi" 
                       class="mt-8 w-full block text-center py-4 rounded-2xl bg-white hover:bg-stone-100 text-obsidian-900 font-bold text-xs transition-all shadow-md hover:scale-[1.02]">
                        Lanjut Reservasi dengan Estimasi Ini
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Daftar Tarif Kamar & Komparasi Transparan -->
    <section id="harga" class="py-16 sm:py-20 px-6 sm:px-8 max-w-5xl mx-auto">
        <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 border border-stone-200 shadow-sm reveal">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h3 class="text-2xl font-extrabold text-obsidian-900 tracking-tight">Perbandingan Tarif Kamar</h3>
                    <p class="text-xs text-stone-500 mt-1">Transparan tanpa biaya tersembunyi</p>
                </div>
                <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-2 text-xs font-bold text-obsidian-900 hover:text-stone-600 self-start sm:self-auto">
                    <span>Ke Form Pemesanan</span>
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[550px]">
                    <thead>
                        <tr class="border-b border-stone-200 text-xs uppercase tracking-wider text-stone-400">
                            <th class="py-4 px-4 font-bold">Tipe Kamar</th>
                            <th class="py-4 px-4 font-bold">Kapasitas & Dimensi</th>
                            <th class="py-4 px-4 font-bold">Fasilitas Utama</th>
                            <th class="py-4 px-4 font-bold text-right">Tarif / Malam</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100 text-xs">
                        <tr class="hover:bg-stone-50/70 transition-colors">
                            <td class="py-4 px-4 font-bold text-obsidian-900 flex items-center gap-2">
                                <i class="ph ph-bed text-base text-stone-400"></i> Standar Room
                            </td>
                            <td class="py-4 px-4 text-stone-600">2 Dewasa + 1 Anak (24 m²)</td>
                            <td class="py-4 px-4 text-stone-500">Queen Bed, Smart TV 43", Shower Heater</td>
                            <td class="py-4 px-4 text-right font-extrabold text-obsidian-900">Rp 500.000</td>
                        </tr>
                        <tr class="hover:bg-stone-50/70 transition-colors">
                            <td class="py-4 px-4 font-bold text-obsidian-900 flex items-center gap-2">
                                <i class="ph ph-buildings text-base text-stone-400"></i> Deluxe Room
                            </td>
                            <td class="py-4 px-4 text-stone-600">2 Dewasa + 2 Anak (36 m²)</td>
                            <td class="py-4 px-4 text-stone-500">King Bed, City View, Bathtub, Nespresso</td>
                            <td class="py-4 px-4 text-right font-extrabold text-obsidian-900">Rp 800.000</td>
                        </tr>
                        <tr class="hover:bg-stone-50/70 transition-colors bg-stone-50/50">
                            <td class="py-4 px-4 font-bold text-obsidian-900 flex items-center gap-2">
                                <i class="ph-fill ph-crown text-base text-amber-500"></i> Executif Suite
                            </td>
                            <td class="py-4 px-4 text-stone-600">3 Dewasa (55 m²)</td>
                            <td class="py-4 px-4 text-stone-500">Super King, Private Jacuzzi, Sky Lounge Free</td>
                            <td class="py-4 px-4 text-right font-extrabold text-obsidian-900">Rp 1.200.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- SECTION: Lokasi & Akses Perkotaan -->
    <section id="lokasi" class="py-16 sm:py-24 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="bg-white rounded-[2.5rem] p-8 sm:p-12 border border-stone-200 shadow-sm reveal">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-stone-200/70 text-obsidian-900 text-xs font-semibold">
                        <i class="ph ph-map-pin"></i> Lokasi Strategis
                    </div>
                    <h2 class="text-3xl font-extrabold text-obsidian-900 tracking-tight">
                        Akses Cepat ke Pusat Bisnis & Transit Jakarta
                    </h2>
                    <p class="text-xs sm:text-sm text-stone-500 leading-relaxed">
                        Terletak strategis di kawasan prestisius Sudirman CBD, memudahkan mobilitas Anda ke pusat perkantoran, stasiun MRT, dan mall megah.
                    </p>

                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3 p-3 rounded-2xl bg-stone-50 border border-stone-100">
                            <i class="ph ph-train text-xl text-obsidian-900"></i>
                            <div>
                                <p class="text-xs font-bold text-obsidian-900">Stasiun MRT Sudirman</p>
                                <p class="text-[11px] text-stone-400">5 menit jalan kaki</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-2xl bg-stone-50 border border-stone-100">
                            <i class="ph ph-shopping-bag text-xl text-obsidian-900"></i>
                            <div>
                                <p class="text-xs font-bold text-obsidian-900">Grand Indonesia & Plaza Indonesia</p>
                                <p class="text-[11px] text-stone-400">10 menit berkendara</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-2xl bg-stone-50 border border-stone-100">
                            <i class="ph ph-airplane text-xl text-obsidian-900"></i>
                            <div>
                                <p class="text-xs font-bold text-obsidian-900">Bandara Soekarno-Hatta (CGK)</p>
                                <p class="text-[11px] text-stone-400">45 menit via Tol Bandara</p>
                            </div>
                        </div>
                    </div>

                    <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold text-obsidian-900 hover:text-stone-600">
                        <span>Buka Rute di Google Maps</span>
                        <i class="ph ph-arrow-up-right"></i>
                    </a>
                </div>

                <div class="lg:col-span-7 h-[360px] sm:h-[420px] rounded-[2rem] overflow-hidden border border-stone-200 shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps?q=Jl.+Jend.+Sudirman+No.+123+Jakarta+Pusat&z=15&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Ulasan Tamu -->
    <section id="ulasan" class="py-16 sm:py-24 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-stone-200/70 text-obsidian-900 text-xs font-semibold mb-3">
                    <i class="ph-fill ph-chats-teardrop"></i> Ulasan Nyata
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-obsidian-900 tracking-tight">
                    Kesan Tamu Menginap di Bigland
                </h2>
            </div>

            <div class="flex flex-wrap items-center gap-2 bg-stone-100 p-1.5 rounded-full border border-stone-200 self-start md:self-auto">
                <button @click="reviewFilter = 'all'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': reviewFilter === 'all', 'text-stone-500': reviewFilter !== 'all' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Semua (3)
                </button>
                <button @click="reviewFilter = 'bisnis'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': reviewFilter === 'bisnis', 'text-stone-500': reviewFilter !== 'bisnis' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Bisnis
                </button>
                <button @click="reviewFilter = 'liburan'" 
                        :class="{ 'bg-white text-obsidian-900 shadow-sm': reviewFilter === 'liburan', 'text-stone-500': reviewFilter !== 'liburan' }"
                        class="px-4 py-2 rounded-full text-xs font-bold transition-all">
                    Liburan
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div x-show="reviewFilter === 'all' || reviewFilter === 'bisnis'"
                 x-transition:enter="transition ease-out duration-300"
                 class="bg-white rounded-[2.5rem] p-7 border border-stone-200 shadow-sm flex flex-col justify-between reveal">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-1 text-amber-500 text-xs">
                            <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full">Tamu Terverifikasi</span>
                    </div>
                    <p class="text-xs text-stone-600 leading-relaxed mb-6">
                        "Desain kamar minimalisnya sangat menenangkan pikiran. Meja kerjanya ergonomis dan koneksi WiFi luar biasa cepat untuk meeting online. Bigland benar-benar hotel favorit saya di Sudirman."
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <div class="w-9 h-9 rounded-full bg-obsidian-900 text-white font-bold flex items-center justify-center text-xs">RA</div>
                    <div>
                        <h4 class="text-xs font-bold text-obsidian-900">Rizky Aditya</h4>
                        <p class="text-[11px] text-stone-400">Deluxe Room • 2 Malam</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div x-show="reviewFilter === 'all' || reviewFilter === 'liburan'"
                 x-transition:enter="transition ease-out duration-300"
                 class="bg-white rounded-[2.5rem] p-7 border border-stone-200 shadow-sm flex flex-col justify-between reveal">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-1 text-amber-500 text-xs">
                            <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full">Tamu Terverifikasi</span>
                    </div>
                    <p class="text-xs text-stone-600 leading-relaxed mb-6">
                        "Executif Suite-nya mewah banget! Akses ke Sky Lounge sore hari sambil menikmati sunset kota Jakarta sangat berkesan. Staf Bigland luar biasa ramah dan solutif."
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <div class="w-9 h-9 rounded-full bg-stone-200 text-obsidian-900 font-bold flex items-center justify-center text-xs">DN</div>
                    <div>
                        <h4 class="text-xs font-bold text-obsidian-900">Dinda Nadila</h4>
                        <p class="text-[11px] text-stone-400">Executif Suite • 3 Malam</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div x-show="reviewFilter === 'all' || reviewFilter === 'liburan'"
                 x-transition:enter="transition ease-out duration-300"
                 class="bg-white rounded-[2.5rem] p-7 border border-stone-200 shadow-sm flex flex-col justify-between reveal">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-1 text-amber-500 text-xs">
                            <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full">Tamu Terverifikasi</span>
                    </div>
                    <p class="text-xs text-stone-600 leading-relaxed mb-6">
                        "Proses check-in cepat tanpa ribet. Lokasi sangat strategis tinggal jalan kaki ke MRT. Kebersihan kamar luar biasa rapi dan wangi. Pasti akan kembali lagi ke Bigland."
                    </p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <div class="w-9 h-9 rounded-full bg-stone-100 text-obsidian-900 font-bold flex items-center justify-center text-xs">AS</div>
                    <div>
                        <h4 class="text-xs font-bold text-obsidian-900">Ahmad Setiawan</h4>
                        <p class="text-[11px] text-stone-400">Standar Room • 1 Malam</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: FAQ Accordion Interaktif -->
    <section id="faq" class="py-16 sm:py-20 px-6 sm:px-8 max-w-4xl mx-auto">
        <div class="text-center mb-12 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-stone-200/70 text-obsidian-900 text-xs font-semibold mb-3">
                <i class="ph ph-question"></i> Pusat Informasi
            </div>
            <h2 class="text-3xl font-extrabold text-obsidian-900 tracking-tight mb-3">
                Pertanyaan yang Sering Diajukan (FAQ)
            </h2>
            <p class="text-xs text-stone-500">Informasi esensial untuk kenyamanan rencana menginap Anda di Bigland.</p>
        </div>

        <div class="space-y-3 reveal" x-data="{ openFaq: 1 }">
            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
                <button type="button" 
                        @click="openFaq = (openFaq === 1 ? null : 1)" 
                        class="w-full px-6 py-4 text-left flex items-center justify-between text-xs sm:text-sm font-bold text-obsidian-900 hover:bg-stone-50 transition-colors">
                    <span>Kapan waktu check-in dan check-out di Bigland?</span>
                    <i class="ph ph-caret-down text-base text-stone-400 transition-transform duration-300" :class="{ 'rotate-180': openFaq === 1 }"></i>
                </button>
                <div x-show="openFaq === 1" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-6 pb-5 pt-1 text-xs text-stone-500 leading-relaxed border-t border-stone-100"
                     style="display: none;">
                    Waktu check-in standar dimulai pukul 14.00 WIB, dan waktu check-out maksimal pukul 12.00 WIB. Layanan early check-in atau late check-out dapat dikonfirmasikan terlebih dahulu ke resepsionis sesuai ketersediaan kamar.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
                <button type="button" 
                        @click="openFaq = (openFaq === 2 ? null : 2)" 
                        class="w-full px-6 py-4 text-left flex items-center justify-between text-xs sm:text-sm font-bold text-obsidian-900 hover:bg-stone-50 transition-colors">
                    <span>Apakah tersedia sarapan untuk pemesanan kamar standar?</span>
                    <i class="ph ph-caret-down text-base text-stone-400 transition-transform duration-300" :class="{ 'rotate-180': openFaq === 2 }"></i>
                </button>
                <div x-show="openFaq === 2" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-6 pb-5 pt-1 text-xs text-stone-500 leading-relaxed border-t border-stone-100"
                     style="display: none;">
                    Kamar standar dapat ditambahkan fasilitas sarapan prasmanan (buffet) seharga Rp 80.000 per malam saat mengisi form reservasi atau langsung saat check-in di hotel.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
                <button type="button" 
                        @click="openFaq = (openFaq === 3 ? null : 3)" 
                        class="w-full px-6 py-4 text-left flex items-center justify-between text-xs sm:text-sm font-bold text-obsidian-900 hover:bg-stone-50 transition-colors">
                    <span>Bagaimana fasilitas parkir dan akses transportasi di Bigland?</span>
                    <i class="ph ph-caret-down text-base text-stone-400 transition-transform duration-300" :class="{ 'rotate-180': openFaq === 3 }"></i>
                </button>
                <div x-show="openFaq === 3" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-6 pb-5 pt-1 text-xs text-stone-500 leading-relaxed border-t border-stone-100"
                     style="display: none;">
                    Kami menyediakan area parkir luas gratis dengan sistem keamanan 24 jam dan fasilitas valet. Selain itu hotel berjarak hanya 5 menit jalan kaki ke Stasiun MRT Sudirman.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">
                <button type="button" 
                        @click="openFaq = (openFaq === 4 ? null : 4)" 
                        class="w-full px-6 py-4 text-left flex items-center justify-between text-xs sm:text-sm font-bold text-obsidian-900 hover:bg-stone-50 transition-colors">
                    <span>Bagaimana cara melakukan perubahan atau pembatalan reservasi?</span>
                    <i class="ph ph-caret-down text-base text-stone-400 transition-transform duration-300" :class="{ 'rotate-180': openFaq === 4 }"></i>
                </button>
                <div x-show="openFaq === 4" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-6 pb-5 pt-1 text-xs text-stone-500 leading-relaxed border-t border-stone-100"
                     style="display: none;">
                    Anda dapat melihat detail reservasi di halaman "Riwayat Reservasiku" atau menghubungi tim reservasi Bigland via telepon / WhatsApp dengan menyertakan Nomor Identitas KTP yang digunakan saat pemesanan.
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: Bottom Statement Banner -->
    <section class="py-12 px-6 sm:px-8 max-w-7xl mx-auto">
        <div class="bg-obsidian-900 text-white rounded-[2.5rem] p-10 sm:p-16 text-center relative overflow-hidden shadow-2xl flex flex-col items-center reveal">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-obsidian-800 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
            
            <span class="text-xs uppercase tracking-widest text-gold-400 font-bold mb-3 relative z-10">Layanan Tamu Istimewa</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4 max-w-2xl relative z-10">
                Rasakan Pengalaman Menginap Terbaik di Bigland
            </h2>
            <p class="text-stone-300 max-w-lg mx-auto mb-8 text-xs sm:text-sm leading-relaxed relative z-10">
                Amankan kamar idaman Anda sekarang. Dapatkan jaminan tarif terbaik dan konfirmasi reservasi langsung.
            </p>
            
            <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-3 bg-white text-obsidian-900 px-8 py-4 rounded-full font-bold text-xs sm:text-sm hover:bg-stone-100 transition-all shadow-xl hover:scale-105 relative z-10">
                <span>Buka Formulir Reservasi</span>
                <i class="ph ph-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Minimalist Footer -->
    <footer class="bg-white border-t border-stone-200 pt-16 pb-10 mt-16">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            
            <div class="md:col-span-2 space-y-4">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-2xl bg-obsidian-900 text-white flex items-center justify-center font-bold">
                        <i class="ph-fill ph-buildings text-lg text-gold-400"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-obsidian-900">Bigland</span>
                </a>
                <p class="text-xs text-stone-500 max-w-sm leading-relaxed">
                    Akomodasi minimalis modern di pusat kota Jakarta. Menghadirkan kenyamanan istirahat paripurna dan kemudahan mobilitas untuk setiap perjalanan Anda.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-stone-100 text-stone-600 flex items-center justify-center text-sm hover:bg-obsidian-900 hover:text-white transition-colors">
                        <i class="ph-bold ph-instagram-logo"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-stone-100 text-stone-600 flex items-center justify-center text-sm hover:bg-obsidian-900 hover:text-white transition-colors">
                        <i class="ph-bold ph-facebook-logo"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-stone-100 text-stone-600 flex items-center justify-center text-sm hover:bg-obsidian-900 hover:text-white transition-colors">
                        <i class="ph-bold ph-whatsapp-logo"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-obsidian-900 mb-4">Navigasi</h4>
                <ul class="space-y-2.5 text-xs text-stone-500">
                    <li><a href="#kamar" class="hover:text-obsidian-900 transition-colors">Koleksi Kamar</a></li>
                    <li><a href="#bento-fasilitas" class="hover:text-obsidian-900 transition-colors">Fasilitas Hotel</a></li>
                    <li><a href="#kalkulator" class="hover:text-obsidian-900 transition-colors">Kalkulator Estimasi</a></li>
                    <li><a href="#harga" class="hover:text-obsidian-900 transition-colors">Daftar Tarif</a></li>
                    <li><a href="#lokasi" class="hover:text-obsidian-900 transition-colors">Peta & Lokasi</a></li>
                    <li><a href="#faq" class="hover:text-obsidian-900 transition-colors">Pusat Bantuan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-obsidian-900 mb-4">Kontak Resmi</h4>
                <ul class="space-y-3 text-xs text-stone-500">
                    <li class="flex items-start gap-2.5">
                        <i class="ph ph-map-pin text-base text-stone-400 mt-0.5"></i>
                        <span>Jl. Jend. Sudirman No. 123, Jakarta Pusat, 10220</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i class="ph ph-phone text-base text-stone-400"></i>
                        <span>(021) 555-0198 / +62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i class="ph ph-envelope-simple text-base text-stone-400"></i>
                        <span>reservasi@bigland.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 pt-8 border-t border-stone-100 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-400 gap-4">
            <p>&copy; 2026 Bigland. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-obsidian-900 transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-obsidian-900 transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE: Quick View Modal Detail Kamar -->
    <div x-show="modalOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-obsidian-950/65 backdrop-blur-sm"
         style="display: none;"
         @keydown.escape.window="modalOpen = false">
        
        <div @click.away="modalOpen = false"
             x-show="modalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white rounded-[2.5rem] max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-stone-200 relative overflow-hidden max-h-[90vh] overflow-y-auto">
            
            <button @click="modalOpen = false" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-600 flex items-center justify-center text-base transition-colors z-10">
                <i class="ph ph-x"></i>
            </button>

            <div class="relative h-60 sm:h-72 rounded-[2rem] overflow-hidden mb-6 bg-stone-100">
                <img :src="activeModalRoom.image" :alt="activeModalRoom.name" class="w-full h-full object-cover">
                <div class="absolute bottom-4 left-4 bg-white/95 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-extrabold text-obsidian-900 shadow-sm"
                     x-text="formatRupiah(activeModalRoom.price) + ' / malam'">
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-stone-400">Detail Spesifikasi</span>
                        <h3 class="text-2xl font-extrabold text-obsidian-900" x-text="activeModalRoom.name"></h3>
                    </div>
                    <div class="flex items-center gap-1 text-amber-500 font-bold text-xs bg-amber-50 px-3 py-1 rounded-full">
                        <i class="ph-fill ph-star"></i>
                        <span x-text="activeModalRoom.rating"></span>
                    </div>
                </div>

                <p class="text-xs text-stone-500 leading-relaxed" x-text="activeModalRoom.description"></p>

                <div class="grid grid-cols-2 gap-3 py-3 border-y border-stone-100 text-xs">
                    <div class="flex flex-col">
                        <span class="text-stone-400 text-[10px] uppercase font-bold">Luas Ruangan</span>
                        <span class="font-bold text-obsidian-900" x-text="activeModalRoom.size"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-stone-400 text-[10px] uppercase font-bold">Kapasitas Maksimal</span>
                        <span class="font-bold text-obsidian-900" x-text="activeModalRoom.capacity"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-stone-400 text-[10px] uppercase font-bold">Tipe Ranjang</span>
                        <span class="font-bold text-obsidian-900" x-text="activeModalRoom.bed"></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-stone-400 text-[10px] uppercase font-bold">Pemandangan</span>
                        <span class="font-bold text-obsidian-900" x-text="activeModalRoom.view"></span>
                    </div>
                </div>

                <div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-stone-400 block mb-2">Fasilitas Termasuk</span>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="item in activeModalRoom.amenities" :key="item">
                            <span class="bg-stone-50 border border-stone-100 text-stone-700 text-[11px] px-3 py-1 rounded-xl flex items-center gap-1.5 font-medium">
                                <i class="ph ph-check-circle text-emerald-600"></i>
                                <span x-text="item"></span>
                            </span>
                        </template>
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" @click="modalOpen = false" class="flex-1 py-3.5 rounded-2xl bg-stone-100 text-stone-700 text-xs font-bold hover:bg-stone-200 transition-colors">
                        Tutup
                    </button>
                    <a :href="'{{ route('form.pesan') }}?tipe=' + activeModalRoom.type" 
                       class="flex-1 py-3.5 rounded-2xl bg-obsidian-900 text-white text-xs font-bold text-center hover:bg-black transition-all shadow-md">
                        Reservasi Kamar Ini
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- INTERACTIVE: Live Social Proof Booking Notification Toast -->
    <div x-show="liveToast.show" 
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 translate-y-6 scale-90"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-6 scale-90"
         class="fixed bottom-6 left-6 z-40 max-w-sm bg-white border border-stone-200 rounded-2xl p-4 shadow-xl flex items-center gap-3"
         style="display: none;">
        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg shrink-0">
            <i class="ph-fill ph-bell-ringing"></i>
        </div>
        <div class="flex-1 pr-2">
            <p class="text-[11px] font-bold text-obsidian-900 leading-tight" x-text="liveToast.text"></p>
            <p class="text-[10px] text-stone-400 mt-0.5" x-text="liveToast.time"></p>
        </div>
        <button @click="liveToast.show = false" class="text-stone-300 hover:text-stone-600 text-xs">
            <i class="ph ph-x"></i>
        </button>
    </div>

    <!-- Sticky Floating Reservation Button -->
    <div x-show="scrolled" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-8"
         class="fixed bottom-6 right-6 z-40"
         style="display: none;">
        <a href="{{ route('form.pesan') }}" class="bg-obsidian-900 hover:bg-black text-white px-5 py-3 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 border border-white/20 hover:scale-105 transition-all">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>Pesan Kamar Sekarang</span>
            <i class="ph ph-arrow-up-right"></i>
        </a>
    </div>

    <script>
        function biglandApp() {
            return {
                scrolled: false,
                mobileMenuOpen: false,
                activeFilter: 'all',
                reviewFilter: 'all',
                modalOpen: false,

                currentHeroSlide: 0,
                heroSlides: [
                    {
                        url: 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1800&auto=format&fit=crop',
                        caption: 'Arsitektur Mewah di Pusat Sudirman Jakarta',
                        tag: 'KEMEMEWAHAN MODERN'
                    },
                    {
                        url: 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=1800&auto=format&fit=crop',
                        caption: 'Infinity Sky Pool Lantai 22 Menghadap Kota',
                        tag: 'ROOFTOP EXPERIENCE'
                    },
                    {
                        url: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1800&auto=format&fit=crop',
                        caption: 'Executif Suite dengan Jacuzzi Pribadi',
                        tag: 'VIP COMFORT'
                    }
                ],

                roomPhotos: {
                    'Standar': [
                        'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1000&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?q=80&w=1000&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=1000&auto=format&fit=crop'
                    ],
                    'Deluxe': [
                        'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1000&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=1000&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1591088398332-8a7791972843?q=80&w=1000&auto=format&fit=crop'
                    ],
                    'Executif': [
                        'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?q=80&w=1000&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=1000&auto=format&fit=crop'
                    ]
                },
                currentPhotoIndex: {
                    Standar: 0,
                    Deluxe: 0,
                    Executif: 0
                },

                quickBooking: {
                    checkin: new Date().toISOString().split('T')[0],
                    tipe: 'Standar',
                    durasi: 1,
                },

                calc: {
                    tipe: 'Standar',
                    harga: 500000,
                    durasi: 1,
                    breakfast: false,
                    airportTransfer: false,
                },

                liveToast: {
                    show: false,
                    text: 'Rizky baru saja memesan Deluxe Room (2 Malam)',
                    time: '3 menit lalu'
                },

                roomData: {
                    'Standar': {
                        type: 'Standar',
                        name: 'Standar Room',
                        price: 500000,
                        rating: '4.8 (320+ Ulasan)',
                        size: '24 m²',
                        capacity: '2 Dewasa + 1 Anak',
                        bed: '1 Queen Size Bed',
                        view: 'Courtyard Minimalist View',
                        image: 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1000&auto=format&fit=crop',
                        description: 'Dirancang dengan tata ruang minimalis fungsional untuk mengutamakan ketenangan tidur dan efisiensi. Dilengkapi material linen organik dan sirkulasi alami.',
                        amenities: ['High-Speed WiFi 500Mbps', 'Smart TV 43" (Netflix Ready)', 'Rain Shower & Water Heater', 'Safety Deposit Box', 'Mineral Water & Teh Artisan', 'AC Inverter Daikin']
                    },
                    'Deluxe': {
                        type: 'Deluxe',
                        name: 'Deluxe Room',
                        price: 800000,
                        rating: '4.9 (540+ Ulasan)',
                        size: '36 m²',
                        capacity: '2 Dewasa + 2 Anak',
                        bed: '1 King Size Bed (Pillow Top)',
                        view: 'Panoramic City Skyline',
                        image: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1000&auto=format&fit=crop',
                        description: 'Ruang yang lebih lega dengan panorama cakrawala kota Jakarta. Dilengkapi meja kerja fungsional, sofa santai, dan bathtub terpisah untuk relaksasi total.',
                        amenities: ['Bathtub & Separate Rain Shower', 'Nespresso Coffee Machine', 'Smart TV 55" 4K', 'Ergonomic Workstation', 'Luxury Bathrobes & Slippers', 'Akses Kolam Renang Rooftop']
                    },
                    'Executif': {
                        type: 'Executif',
                        name: 'Executif Suite',
                        price: 1200000,
                        rating: '5.0 (VIP Choice)',
                        size: '55 m²',
                        capacity: '3 Dewasa',
                        bed: 'Super King Size (200x200)',
                        view: 'High-Floor 360° Skyline View',
                        image: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop',
                        description: 'Puncak kemewahan di Bigland. Menghadirkan living room terpisah, private jacuzzi dengan pemandangan kota, serta akses gratis ke Executive Sky Lounge sepanjang hari.',
                        amenities: ['Akses Eksklusif Sky Lounge', 'Private Jacuzzi with View', 'Free Restocked Minibar', 'Late Checkout s/d 15.00 WIB', 'Private Check-in Service', 'Complimentary Evening Cocktails']
                    }
                },

                activeModalRoom: {},

                init() {
                    this.activeModalRoom = this.roomData['Standar'];

                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 120;
                    });

                    setInterval(() => {
                        this.currentHeroSlide = (this.currentHeroSlide + 1) % this.heroSlides.length;
                    }, 5000);

                    const sampleBookings = [
                        { text: 'Dinda baru saja memesan Executif Suite', time: '1 menit lalu' },
                        { text: 'Ahmad mengonfirmasi reservasi Standar Room', time: '4 menit lalu' },
                        { text: 'Budi memesan Deluxe Room untuk akhir pekan', time: 'Baru saja' },
                    ];
                    let toastIdx = 0;
                    setTimeout(() => {
                        this.liveToast = { show: true, ...sampleBookings[0] };
                    }, 2500);

                    setInterval(() => {
                        this.liveToast.show = false;
                        setTimeout(() => {
                            toastIdx = (toastIdx + 1) % sampleBookings.length;
                            this.liveToast = { show: true, ...sampleBookings[toastIdx] };
                        }, 1000);
                    }, 9000);

                    this.setupRevealObserver();
                },

                openRoomModal(type) {
                    if (this.roomData[type]) {
                        this.activeModalRoom = this.roomData[type];
                        this.modalOpen = true;
                    }
                },

                formatRupiah(number) {
                    return 'Rp ' + Number(number).toLocaleString('id-ID');
                },

                getLongStayDiscount() {
                    if (this.calc.durasi >= 3) {
                        return (this.calc.harga * this.calc.durasi) * 0.10;
                    }
                    return 0;
                },

                getTotalEstimasi() {
                    let roomTotal = this.calc.harga * this.calc.durasi;
                    let breakfastTotal = this.calc.breakfast ? (80000 * this.calc.durasi) : 0;
                    let airportTotal = this.calc.airportTransfer ? 150000 : 0;
                    let discount = this.getLongStayDiscount();

                    return (roomTotal + breakfastTotal + airportTotal) - discount;
                },

                submitQuickBooking() {
                    let url = "{{ route('form.pesan') }}" 
                        + "?tipe=" + encodeURIComponent(this.quickBooking.tipe)
                        + "&tgl=" + encodeURIComponent(this.quickBooking.checkin)
                        + "&durasi=" + encodeURIComponent(this.quickBooking.durasi);
                    window.location.href = url;
                },

                setupRevealObserver() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('active');
                                observer.unobserve(entry.target);
                            }
                        });
                    }, {
                        threshold: 0.1,
                        rootMargin: '0px 0px -40px 0px'
                    });

                    this.$nextTick(() => {
                        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
                    });
                }
            }
        }
    </script>
</body>
</html>