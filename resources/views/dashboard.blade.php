<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Hotel</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Phosphor Icons (Modern Minimalist Icons) -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f8f9fa',
                            100: '#f1f3f5',
                            200: '#e9ecef',
                            800: '#343a40',
                            900: '#212529',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #f8f9fa; }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; margin: 0; 
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="text-brand-900 font-sans antialiased selection:bg-brand-900 selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full top-0 z-50 glass-nav border-b border-gray-200/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-xl font-bold tracking-tight flex items-center gap-2">
                <i class="ph-fill ph-buildings text-2xl text-brand-900"></i>
                The Hotel
            </a>
            
            <!-- Pill Navigation -->
            <div class="hidden md:flex space-x-1 bg-brand-100 p-1 rounded-full border border-gray-200">
                <a href="#produk" class="px-5 py-2 text-sm font-medium rounded-full hover:bg-white hover:shadow-sm transition-all text-gray-600 hover:text-brand-900">Kamar & Detail</a>
                <a href="#fasilitas" class="px-5 py-2 text-sm font-medium rounded-full hover:bg-white hover:shadow-sm transition-all text-gray-600 hover:text-brand-900">Fasilitas</a>
                <a href="#harga" class="px-5 py-2 text-sm font-medium rounded-full hover:bg-white hover:shadow-sm transition-all text-gray-600 hover:text-brand-900">Harga</a>
                <a href="#lokasi" class="px-5 py-2 text-sm font-medium rounded-full hover:bg-white hover:shadow-sm transition-all text-gray-600 hover:text-brand-900">Lokasi & Maps</a>
                <a href="#testimoni" class="px-5 py-2 text-sm font-medium rounded-full hover:bg-white hover:shadow-sm transition-all text-gray-600 hover:text-brand-900">Ulasan</a>
            </div>

            <!-- Bagian Kanan Navbar (Auth & Pesan Kamar) -->
            <div class="flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-brand-900 px-3 py-2">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hidden sm:inline-flex text-sm font-medium text-gray-700 hover:text-brand-900 px-3 py-2">
                            Daftar
                        </a>
                    @endif
                @else
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-sm font-medium text-brand-900 bg-brand-100 px-4 py-2 rounded-full border border-gray-200 hover:bg-brand-200 transition-all">
                            <i class="ph ph-user-circle text-lg"></i>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="ph ph-caret-down text-xs"></i>
                        </button>
                        
                        <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-2xl shadow-xl py-2 hidden group-hover:block transition-all z-50">
                            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-brand-50 flex items-center gap-2">
                                <i class="ph ph-squares-four text-base"></i> Dashboard / Reservasiku
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2">
                                    <i class="ph ph-sign-out text-base"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

                <a href="{{ route('form.pesan') }}" class="bg-brand-900 text-white px-5 py-2.5 rounded-full text-sm font-medium hover:bg-brand-800 transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    Pesan Kamar <i class="ph ph-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="pt-36 pb-20 px-6 text-center w-full">
        <div class="max-w-4xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-100 text-brand-900 text-sm font-medium mb-6 border border-brand-200 shadow-sm">
                <i class="ph-fill ph-star text-amber-500"></i> 
                <span>Rating 4.9/5.0 dari 1,200+ Tamu Puas</span>
            </div>
            <h1 class="text-4xl sm:text-6xl md:text-[5rem] font-bold tracking-tight text-brand-900 mb-6 leading-[1.1]">
                Pengalaman Menginap <br> Modern & Minimalis
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-2xl mx-auto font-medium leading-relaxed">
                Pilihan akomodasi terbaik di pusat kota dengan sistem reservasi transparan, fasilitas premium, dan keamanan terjamin.
            </p>
        </div>

        <!-- Main Hero Image -->
        <div class="relative max-w-6xl mx-auto h-[400px] md:h-[600px] rounded-[2.5rem] md:rounded-[3rem] overflow-hidden shadow-2xl border border-gray-200 group">
            <img src="https://images.unsplash.com/photo-1495365200479-c4ed1d35e1aa?fm=jpg&q=60&w=3000&auto=format&fit=crop" alt="Hotel View" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/10"></div>

            <!-- Weather Card -->
            <div class="absolute top-8 left-6 md:left-10 bg-white/30 backdrop-blur-md border border-white/40 rounded-[1.5rem] p-5 shadow-lg text-white flex flex-col gap-1 w-28 text-left">
               <i class="ph ph-cloud-sun text-3xl mb-1"></i>
               <p class="text-2xl font-bold">+24°C</p>
               <p class="text-xs font-medium text-white/90">Jakarta Pusat</p>
            </div>

            <!-- Quick Stats Badge -->
            <div class="absolute top-8 right-6 md:right-10 bg-white/90 backdrop-blur-md border border-white/40 rounded-[1.5rem] p-4 shadow-lg text-brand-900 text-left flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-lg">
                    <i class="ph-fill ph-seal-check"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Official Certified</p>
                    <p class="text-sm font-bold">Clean & Safe Stay</p>
                </div>
            </div>

            <!-- Feature Card -->
            <div class="absolute bottom-10 left-6 md:left-10 bg-black/50 backdrop-blur-md border border-white/20 rounded-[2rem] p-6 shadow-lg text-white max-w-[300px] text-left hidden md:block">
                <div class="flex items-center gap-2 mb-2">
                    <i class="ph ph-shield-check text-xl text-brand-200"></i>
                    <h3 class="font-bold text-lg">Reservasi Fleksibel</h3>
                </div>
                <p class="text-xs text-gray-300 leading-relaxed">Bebas ubah jadwal dan pilih lantai kamar sesuai preferensi Anda saat memesan.</p>
            </div>

            <!-- CTA Floating Badge -->
            <a href="{{ route('form.pesan') }}" class="absolute bottom-10 right-6 md:right-10 bg-white/95 backdrop-blur-sm rounded-full p-2 pl-6 shadow-xl flex items-center gap-4 hover:scale-105 transition-all duration-300 cursor-pointer">
                <span class="font-bold text-brand-900 text-sm md:text-base">Pesan Kamar Sekarang</span>
                <div class="bg-brand-900 text-white w-12 h-12 rounded-full flex items-center justify-center">
                    <i class="ph ph-plus text-xl"></i>
                </div>
            </a>
        </div>
    </header>

    <!-- Quick Highlights Bar -->
    <section class="max-w-7xl mx-auto px-6 mb-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <div class="flex items-center gap-4 p-3">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-900 flex items-center justify-center text-2xl">
                    <i class="ph ph-wifi-high"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Free High-Speed WiFi</h4>
                    <p class="text-xs text-gray-500">Hingga 500 Mbps di area hotel</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-3">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-900 flex items-center justify-center text-2xl">
                    <i class="ph ph-clock-countdown"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Resepsionis 24 Jam</h4>
                    <p class="text-xs text-gray-500">Check-in kapanpun Anda tiba</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-3">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-900 flex items-center justify-center text-2xl">
                    <i class="ph ph-car"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Parkir Gratis & Luas</h4>
                    <p class="text-xs text-gray-500">Keamanan terpadu 24/7</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-3">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 text-brand-900 flex items-center justify-center text-2xl">
                    <i class="ph ph-coffee"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm">Complimentary Breakfast</h4>
                    <p class="text-xs text-gray-500">Menu lokal & internasional</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk / Tipe Kamar Section (Lebih Detail & Ada Rating Kamar) -->
    <section id="produk" class="py-12 px-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-100 text-brand-900 text-sm font-medium mb-4 border border-brand-200">
                    <i class="ph ph-sparkle text-lg"></i> Pilihan Akomodasi
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-brand-900">Pilih Ruang Nyaman & Reservasi Sesuai Kebutuhan.</h2>
            </div>
            <p class="text-gray-500 max-w-md text-sm md:text-base leading-relaxed">
                Setiap tipe kamar dirancang dengan detail spesifik untuk memastikan kenyamanan istirahat, urusan bisnis, maupun liburan keluarga Anda.
            </p>
        </div>
        
        <!-- Grid Kamar -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Card: Standar -->
            <div class="group bg-white rounded-[2.5rem] p-4 shadow-sm border border-gray-100 hover:shadow-xl hover:border-gray-200 transition-all duration-500 flex flex-col justify-between">
                <div>
                    <div class="relative h-64 w-full rounded-[2rem] overflow-hidden mb-5 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=800&auto=format&fit=crop" alt="Kamar Standar" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-bold text-brand-900 shadow-sm">
                            Rp 500k <span class="text-gray-500 font-medium text-xs">/ malam</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-amber-600 flex items-center gap-1 shadow-sm">
                            <i class="ph-fill ph-star"></i> 4.8 (320 ulasan)
                        </div>
                    </div>
                    
                    <div class="px-4 pb-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-2xl font-bold text-brand-900">Standar Room</h3>
                            <a href="{{ route('form.pesan') }}" class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-brand-900 group-hover:text-white transition-colors">
                                <i class="ph ph-arrow-up-right text-lg"></i>
                            </a>
                        </div>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed">Pilihan pas untuk istirahat singkat dengan fasilitas esensial yang sangat nyaman dan pencahayaan alami.</p>
                        
                        <!-- Detail Fasilitas Kamar -->
                        <div class="space-y-2 mb-6 border-t border-b border-gray-100 py-4 text-xs text-gray-600">
                            <div class="flex justify-between"><span>Luas Ruangan:</span> <strong class="text-brand-900">24 m²</strong></div>
                            <div class="flex justify-between"><span>Kapasitas Tamu:</span> <strong class="text-brand-900">2 Dewasa + 1 Anak</strong></div>
                            <div class="flex justify-between"><span>Kamar Mandi:</span> <strong class="text-brand-900">Shower (Water Heater)</strong></div>
                        </div>

                        <div class="flex flex-wrap gap-2 text-xs font-medium text-gray-600 mb-6">
                            <span class="flex items-center gap-1.5 bg-gray-50 px-3 py-2 rounded-xl border border-gray-100"><i class="ph ph-bed text-lg"></i> 1 Queen Bed</span>
                            <span class="flex items-center gap-1.5 bg-gray-50 px-3 py-2 rounded-xl border border-gray-100"><i class="ph ph-wifi-high text-lg"></i> Free WiFi</span>
                            <span class="flex items-center gap-1.5 bg-gray-50 px-3 py-2 rounded-xl border border-gray-100"><i class="ph ph-television text-lg"></i> Smart TV 43"</span>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <a href="{{ route('form.pesan') }}" class="w-full block text-center bg-brand-100 hover:bg-brand-900 hover:text-white text-brand-900 font-bold py-3 rounded-2xl transition-all text-sm">
                        Reservasi Kamar Standar
                    </a>
                </div>
            </div>

            <!-- Card: Deluxe -->
            <div class="group bg-white rounded-[2.5rem] p-4 shadow-sm border border-gray-100 hover:shadow-xl hover:border-gray-200 transition-all duration-500 flex flex-col justify-between">
                <div>
                    <div class="relative h-64 w-full rounded-[2rem] overflow-hidden mb-5 bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=800&auto=format&fit=crop" alt="Kamar Deluxe" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-bold text-brand-900 shadow-sm">
                            Rp 800k <span class="text-gray-500 font-medium text-xs">/ malam</span>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-amber-600 flex items-center gap-1 shadow-sm">
                            <i class="ph-fill ph-star"></i> 4.9 (540 ulasan)
                        </div>
                    </div>
                    <div class="px-4 pb-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-2xl font-bold text-brand-900">Deluxe Room</h3>
                            <a href="{{ route('form.pesan') }}" class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-brand-900 group-hover:text-white transition-colors">
                                <i class="ph ph-arrow-up-right text-lg"></i>
                            </a>
                        </div>
                        <p class="text-gray-500 text-sm mb-6 leading-relaxed">Ruangan lebih luas dilengkapi area kerja ergonomis dan pemandangan kota langsung. Cocok untuk profesional.</p>
                        
                        <!-- Detail Fasilitas Kamar -->
                        <div class="space-y-2 mb-6 border-t border-b border-gray-100 py-4 text-xs text-gray-600">
                            <div class="flex justify-between"><span>Luas Ruangan:</span> <strong class="text-brand-900">36 m²</strong></div>
                            <div class="flex justify-between"><span>Kapasitas Tamu:</span> <strong class="text-brand-900">2 Dewasa + 2 Anak</strong></div>
                            <div class="flex justify-between"><span>Kamar Mandi:</span> <strong class="text-brand-900">Bathtub & Shower</strong></div>
                        </div>

                        <div class="flex flex-wrap gap-2 text-xs font-medium text-gray-600 mb-6">
                            <span class="flex items-center gap-1.5 bg-gray-50 px-3 py-2 rounded-xl border border-gray-100"><i class="ph ph-bed text-lg"></i> 1 King Bed</span>
                            <span class="flex items-center gap-1.5 bg-gray-50 px-3 py-2 rounded-xl border border-gray-100"><i class="ph ph-buildings text-lg"></i> City View</span>
                            <span class="flex items-center gap-1.5 bg-gray-50 px-3 py-2 rounded-xl border border-gray-100"><i class="ph ph-coffee text-lg"></i> Coffee Maker</span>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <a href="{{ route('form.pesan') }}" class="w-full block text-center bg-brand-100 hover:bg-brand-900 hover:text-white text-brand-900 font-bold py-3 rounded-2xl transition-all text-sm">
                        Reservasi Kamar Deluxe
                    </a>
                </div>
            </div>

            <!-- Card: Executif (Dark Mode Highlight) -->
            <div class="group bg-brand-900 rounded-[2.5rem] p-4 shadow-xl border border-gray-800 hover:shadow-2xl transition-all duration-500 relative overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="relative h-64 w-full rounded-[2rem] overflow-hidden mb-5 bg-brand-800">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=800&auto=format&fit=crop" alt="Kamar Executif" class="object-cover w-full h-full opacity-85 group-hover:scale-105 transition-transform duration-700">
                        
                        <div class="absolute top-4 left-4 bg-brand-900/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-bold text-white shadow-sm border border-brand-700">
                            Rp 1.2M <span class="text-gray-300 font-medium text-xs">/ malam</span>
                        </div>
                        
                        <div class="absolute top-4 right-4 bg-white text-brand-900 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-sm">
                            <i class="ph-fill ph-crown text-amber-600"></i> 5.0 (VIP Choice)
                        </div>
                    </div>
                    
                    <div class="px-4 pb-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-2xl font-bold text-white">Executif Suite</h3>
                            <a href="{{ route('form.pesan') }}" class="w-8 h-8 rounded-full bg-brand-800 border border-gray-700 flex items-center justify-center text-gray-300 group-hover:bg-white group-hover:text-brand-900 transition-colors">
                                <i class="ph ph-arrow-up-right text-lg"></i>
                            </a>
                        </div>
                        <p class="text-gray-400 text-sm mb-6 leading-relaxed">Privasi maksimal dengan ranjang super king, ruang tamu terpisah, plus akses eksklusif ke lounge 24 jam.</p>
                        
                        <!-- Detail Fasilitas Kamar -->
                        <div class="space-y-2 mb-6 border-t border-b border-gray-800 py-4 text-xs text-gray-300">
                            <div class="flex justify-between"><span>Luas Ruangan:</span> <strong class="text-white">55 m²</strong></div>
                            <div class="flex justify-between"><span>Kapasitas Tamu:</span> <strong class="text-white">3 Dewasa</strong></div>
                            <div class="flex justify-between"><span>Fasilitas Tambahan:</span> <strong class="text-white">Minibar Free & Jacuzzi</strong></div>
                        </div>

                        <div class="flex flex-wrap gap-2 text-xs font-medium text-gray-300 mb-6">
                            <span class="flex items-center gap-1.5 bg-brand-800 px-3 py-2 rounded-xl border border-brand-700"><i class="ph ph-bed text-lg"></i> Super King</span>
                            <span class="flex items-center gap-1.5 bg-brand-800 px-3 py-2 rounded-xl border border-brand-700"><i class="ph ph-martini text-lg"></i> Executive Lounge</span>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    <a href="{{ route('form.pesan') }}" class="w-full block text-center bg-white text-brand-900 hover:bg-gray-100 font-bold py-3 rounded-2xl transition-all text-sm shadow-md">
                        Reservasi Executif Suite
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Fasilitas Hotel Lainnya Section -->
    <section id="fasilitas" class="py-16 px-6 max-w-7xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-100 text-brand-900 text-sm font-medium mb-4 border border-brand-200">
                <i class="ph ph-hospital text-lg"></i> Fasilitas Hotel
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-brand-900 mb-4">Semua yang Anda Butuhkan dalam Satu Tempat</h2>
            <p class="text-gray-500 text-sm">Tingkatkan kenyamanan menginap Anda dengan menikmati berbagai fasilitas kelas atas kami.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm text-center">
                <div class="w-14 h-14 bg-brand-50 text-brand-900 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    <i class="ph ph-fork-knife"></i>
                </div>
                <h4 class="font-bold text-base mb-1">Restoran & Café</h4>
                <p class="text-xs text-gray-500">Sajian kuliner chef internasional tersedia sepanjang hari.</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm text-center">
                <div class="w-14 h-14 bg-brand-50 text-brand-900 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    <i class="ph ph-waves"></i>
                </div>
                <h4 class="font-bold text-base mb-1">Infinity Swimming Pool</h4>
                <p class="text-xs text-gray-500">Kolam renang rooftop dengan pemandangan cakrawala kota.</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm text-center">
                <div class="w-14 h-14 bg-brand-50 text-brand-900 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    <i class="ph ph-barbell"></i>
                </div>
                <h4 class="font-bold text-base mb-1">Fitness & Gym Center</h4>
                <p class="text-xs text-gray-500">Peralatan fitness modern lengkap dengan instruktur profesional.</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm text-center">
                <div class="w-14 h-14 bg-brand-50 text-brand-900 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    <i class="ph ph-user-gear"></i>
                </div>
                <h4 class="font-bold text-base mb-1">Meeting & Ballroom</h4>
                <p class="text-xs text-gray-500">Ruangan luas untuk acara korporat, seminar, atau pernikahan.</p>
            </div>
        </div>
    </section>

    <!-- Daftar Harga Section -->
    <section id="harga" class="py-16 px-6 max-w-5xl mx-auto">
        <div class="bg-white rounded-[2.5rem] p-8 md:p-14 shadow-xl shadow-gray-200/40 border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-50 rounded-full blur-3xl -z-10 translate-x-1/2 -translate-y-1/2 opacity-50"></div>
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-brand-900 text-white flex items-center justify-center shadow-md">
                        <i class="ph ph-tag text-2xl"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-brand-900">Daftar Harga & Tarif Kamar</h2>
                </div>
                <p class="text-sm font-medium text-gray-500 bg-gray-50 px-4 py-2 rounded-full border border-gray-100">Transparan tanpa biaya tersembunyi</p>
            </div>
            
            <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm mb-8">
                <table class="w-full text-left border-collapse bg-white min-w-[600px]">
                    <thead class="bg-gray-50/80 border-b border-gray-200">
                        <tr>
                            <th class="py-5 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Tipe Kamar</th>
                            <th class="py-5 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider">Kapasitas & Fasilitas Utama</th>
                            <th class="py-5 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wider text-right">Harga / Malam</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-800">
                        <tr class="hover:bg-brand-50/50 transition-colors duration-300 group">
                            <td class="py-5 px-6 font-medium flex items-center gap-3">
                                <i class="ph ph-bed text-xl text-gray-400 group-hover:text-brand-900 transition-colors"></i> 
                                Standar Room
                            </td>
                            <td class="py-5 px-6 text-sm text-gray-500">1 Queen Bed, WiFi, Smart TV, Shower</td>
                            <td class="py-5 px-6 text-right font-semibold">Rp 500.000</td>
                        </tr>
                        <tr class="hover:bg-brand-50/50 transition-colors duration-300 group">
                            <td class="py-5 px-6 font-medium flex items-center gap-3">
                                <i class="ph ph-buildings text-xl text-gray-400 group-hover:text-brand-900 transition-colors"></i> 
                                Deluxe Room
                            </td>
                            <td class="py-5 px-6 text-sm text-gray-500">1 King Bed, City View, Bathtub, Meja Kerja</td>
                            <td class="py-5 px-6 text-right font-semibold">Rp 800.000</td>
                        </tr>
                        <tr class="hover:bg-brand-50/50 transition-colors duration-300 group">
                            <td class="py-5 px-6 font-medium flex items-center gap-3">
                                <i class="ph ph-crown text-xl text-brand-900/50 group-hover:text-brand-900 transition-colors"></i> 
                                Executif Suite
                            </td>
                            <td class="py-5 px-6 text-sm text-gray-500">Super King, Akses Lounge, Ruang Tamu, Jacuzzi</td>
                            <td class="py-5 px-6 text-right font-semibold text-brand-900">Rp 1.200.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-2 bg-brand-900 text-white px-8 py-3.5 rounded-full font-bold text-sm hover:bg-brand-800 transition-all shadow-md">
                    <span>Lakukan Reservasi Sekarang</span>
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Lokasi & Google Maps Section -->
    <section id="lokasi" class="py-16 px-6 max-w-7xl mx-auto">
        <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-xl border border-gray-100">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <div class="lg:col-span-1 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-100 text-brand-900 text-sm font-medium border border-brand-200">
                        <i class="ph ph-map-pin text-lg"></i> Lokasi Strategis
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-brand-900">Temukan Kami di Pusat Kota</h2>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Berada di kawasan CBD Jakarta Pusat, dekat dengan pusat perbelanjaan utama, stasiun MRT, dan perkantoran penting.
                    </p>
                    <ul class="space-y-3 text-sm text-gray-700">
                        <li class="flex items-center gap-3">
                            <i class="ph ph-train text-lg text-brand-900"></i> 5 menit dari Stasiun MRT Sudirman
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph ph-shopping-bag text-lg text-brand-900"></i> 10 menit ke Grand Indonesia & Plaza Indonesia
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="ph ph-airplane text-lg text-brand-900"></i> 45 menit dari Bandara Internasional Soekarno-Hatta
                        </li>
                    </ul>
                    <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 text-brand-900 font-bold text-sm hover:underline">
                        Buka di Google Maps <i class="ph ph-arrow-up-right"></i>
                    </a>
                </div>

                <!-- Google Maps Embed -->
                <div class="lg:col-span-2 h-[350px] md:h-[420px] rounded-3xl overflow-hidden shadow-inner border border-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666427004245!2d106.8227!3d-6.2088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNDknMjEuNyJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid" 
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

    <!-- Testimoni / Ulasan Section dengan Detail Rating -->
    <section id="testimoni" class="py-16 px-6 max-w-7xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-100 text-brand-900 text-sm font-medium mb-4 border border-brand-200">
                <i class="ph ph-chats-teardrop text-lg"></i> Ulasan Pengunjung
            </div>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-brand-900 mb-4">Apa Kata Mereka yang Pernah Menginap?</h2>
            <p class="text-gray-500 text-sm md:text-base">Pengalaman nyata dari tamu yang memesan kamar dan merasakan layanan terbaik The Hotel.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-1 text-amber-500">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-xs font-semibold bg-green-50 text-green-700 px-2.5 py-1 rounded-full">Verifikasi Tamu</span>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">"Tempatnya super bersih, desain interior minimalisnya bener-bener bikin tenang buat istirahat setelah seharian kerja di pusat kota. Reservasi online gampang banget."</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-900 font-bold flex items-center justify-center text-sm">RA</div>
                    <div>
                        <h4 class="font-bold text-sm text-brand-900">Rizky Aditya</h4>
                        <p class="text-xs text-gray-400">Reservasi: Kamar Deluxe Room</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-1 text-amber-500">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-xs font-semibold bg-green-50 text-green-700 px-2.5 py-1 rounded-full">Verifikasi Tamu</span>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">"Pelayanan staf sangat ramah dan proses pemesanan cepat. Kamar Executif Suite-nya worth it parah, akses lounge-nya nyaman buat meeting santai!"</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-900 font-bold flex items-center justify-center text-sm">DN</div>
                    <div>
                        <h4 class="font-bold text-sm text-brand-900">Dinda Nadila</h4>
                        <p class="text-xs text-gray-400">Reservasi: Executif Suite</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-1 text-amber-500">
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <span class="text-xs font-semibold bg-green-50 text-green-700 px-2.5 py-1 rounded-full">Verifikasi Tamu</span>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">"Lokasinya strategis di tengah kota tapi tetap tenang di dalam kamar. Wifi kencang dan fasilitas sangat modern. Pasti bakal balik lagi."</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-900 font-bold flex items-center justify-center text-sm">AS</div>
                    <div>
                        <h4 class="font-bold text-sm text-brand-900">Ahmad Setiawan</h4>
                        <p class="text-xs text-gray-400">Reservasi: Kamar Standar Room</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section Menuju Form Reservasi -->
    <section class="py-12 px-6 max-w-7xl mx-auto">
        <div class="bg-brand-900 text-white rounded-[2.5rem] p-10 md:p-16 text-center relative overflow-hidden shadow-2xl flex flex-col items-center">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-brand-800 rounded-full blur-3xl opacity-50"></div>
            
            <h2 class="text-3xl md:text-5xl font-bold tracking-tight mb-4 relative z-10">Siap Mendapatkan Pengalaman Menginap Terbaik?</h2>
            <p class="text-gray-300 max-w-xl mx-auto mb-8 text-sm md:text-base relative z-10 leading-relaxed">Amankan kamar pilihan Anda sekarang melalui halaman form reservasi online kami dengan mudah dan cepat.</p>
            
            <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-3 bg-white text-brand-900 px-8 py-4 rounded-full font-bold text-base hover:bg-gray-100 transition-all shadow-xl hover:scale-105 relative z-10">
                <span>Buka Form Pemesanan Kamar</span>
                <i class="ph ph-arrow-right text-lg"></i>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="tentang" class="bg-white border-t border-gray-200 pt-16 pb-8 mt-16">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 mb-12">
            <div>
                <a href="#" class="text-2xl font-bold tracking-tight flex items-center gap-2 mb-6 text-brand-900">
                    <i class="ph-fill ph-buildings"></i> The Hotel
                </a>
                <p class="text-gray-500 max-w-sm leading-relaxed text-sm">Pengalaman menginap minimalis dan modern. Tempat terbaik untuk menemukan kenyamanan di tengah kesibukan perkotaan.</p>
            </div>
            <div>
                <h4 class="font-semibold text-base mb-6 text-brand-900">Tautan Navigasi</h4>
                <ul class="space-y-3 text-gray-600 text-sm">
                    <li><a href="#produk" class="hover:text-brand-900 transition-colors">Pilihan Kamar</a></li>
                    <li><a href="#fasilitas" class="hover:text-brand-900 transition-colors">Fasilitas Hotel</a></li>
                    <li><a href="#harga" class="hover:text-brand-900 transition-colors">Daftar Harga</a></li>
                    <li><a href="#lokasi" class="hover:text-brand-900 transition-colors">Lokasi & Maps</a></li>
                    <li><a href="#testimoni" class="hover:text-brand-900 transition-colors">Ulasan Tamu</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-base mb-6 text-brand-900">Kontak Resmi</h4>
                <ul class="space-y-4 text-gray-600 text-sm">
                    <li class="flex items-start gap-3">
                        <i class="ph ph-map-pin text-xl text-gray-400 mt-0.5"></i>
                        <span>Jl. Jend. Sudirman No. 123, Jakarta Pusat, DKI Jakarta, 10220</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="ph ph-phone text-xl text-gray-400"></i>
                        <span>021-555-0198 / +62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="ph ph-envelope-simple text-xl text-gray-400"></i>
                        <span>reservation@thehotel.com</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pt-8 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between text-sm text-gray-400 gap-4">
            <p>&copy; 2026 The Hotel. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:underline">Kebijakan Privasi</a>
                <a href="#" class="hover:underline">Syarat & Ketentuan Reservasi</a>
            </div>
        </div>
    </footer>

</body>
</html>