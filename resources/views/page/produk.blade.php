<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigland - Daftar Produk &amp; Koleksi Kamar Hotel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
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
    </style>
</head>

<body class="selection:bg-[#f5ede2] selection:text-[#1E1A16] font-sans antialiased bg-[#FAF7F2] min-h-screen flex flex-col">

    <!-- FLOATING PILL NAVBAR COMPONENT -->
    <x-navbar />

    <!-- HERO HEADER SECTION -->
    <section class="pt-32 sm:pt-36 pb-10 px-6 sm:px-8 max-w-7xl mx-auto text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#f5ede2] text-[#B08D57] text-[11px] font-bold tracking-widest uppercase mb-4 border border-[#e4d4be]/70 shadow-sm">
            <i class="ph ph-sparkle text-[#B08D57]"></i>
            <span>Koleksi Kamar &amp; Fasilitas Lengkap</span>
        </div>
        <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-normal text-[#1E1A16] tracking-tight max-w-4xl mx-auto leading-tight">
            Daftar Produk &amp; Paket Kamar
        </h1>
        <p class="text-[#635b52] text-xs sm:text-base max-w-2xl mx-auto mt-4 leading-relaxed font-normal">
            Pilihlah tempat beristirahat yang dirancang khusus untuk memenuhi standar kenyamanan paripurna Anda. Klik rincian untuk membuka halaman detail &amp; video tour virtual masing-masing tipe kamar.
        </p>

        <!-- Quick Jump Navigation Pills -->
        <div class="flex flex-wrap items-center justify-center gap-3 mt-8">
            <a href="#kamar-standar" class="px-4 py-2.5 rounded-full bg-white border border-[#e4d4be] hover:border-[#B08D57] text-xs font-semibold text-[#1E1A16] transition-all hover:shadow-sm">
                Standar Room
            </a>
            <a href="#kamar-deluxe" class="px-4 py-2.5 rounded-full bg-white border border-[#e4d4be] hover:border-[#B08D57] text-xs font-semibold text-[#1E1A16] transition-all hover:shadow-sm">
                Deluxe Room
            </a>
            <a href="#kamar-executif" class="px-4 py-2.5 rounded-full bg-white border border-[#e4d4be] hover:border-[#B08D57] text-xs font-semibold text-[#1E1A16] transition-all hover:shadow-sm">
                Executif Suite
            </a>
            <a href="#tabel-harga" class="px-4 py-2.5 rounded-full bg-[#B08D57] text-white text-xs font-semibold hover:bg-[#9c7743] transition-all shadow-sm flex items-center gap-1.5">
                <i class="ph ph-table"></i>
                <span>Tabel Perbandingan Harga</span>
            </a>
        </div>
    </section>

    <!-- MAIN PRODUCT LIST SECTION -->
    <main class="flex-1 max-w-7xl mx-auto px-6 sm:px-8 py-8 space-y-16">

        <!-- 1. KAMAR STANDAR -->
        <section id="kamar-standar" class="bg-white rounded-[2.5rem] border border-[#e4d4be] shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl scroll-mt-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                
                <!-- Gambar Kamar Standar -->
                <div class="lg:col-span-5 relative min-h-[300px] lg:min-h-full overflow-hidden bg-[#FAF7F2]">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1200&auto=format&fit=crop"
                         alt="Standar Room Bigland"
                         class="w-full h-full object-cover object-center transition-transform duration-700 hover:scale-105">
                    <div class="absolute top-5 left-5 bg-[#1E1A16]/90 backdrop-blur-md text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-md">
                        Standar Room
                    </div>
                    <div class="absolute bottom-5 left-5 right-5 bg-white/95 backdrop-blur-md rounded-2xl p-4 border border-[#e4d4be] shadow-sm flex items-center justify-between">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Tarif Mulai</span>
                            <span class="font-serif text-2xl font-bold text-[#1E1A16]">Rp 500.000</span>
                            <span class="text-[11px] text-[#635b52]">/ malam</span>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center gap-1 bg-[#f5ede2] text-[#B08D57] px-2.5 py-1 rounded-full text-xs font-bold">
                                <i class="ph-fill ph-star"></i> 4.8 / 5.0
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Konten Kamar Standar: Paket, Keunggulan, Fasilitas -->
                <div class="lg:col-span-7 p-6 sm:p-10 flex flex-col justify-between space-y-8">
                    <div>
                        <!-- Paket -->
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                            <span class="px-3 py-1 rounded-full bg-[#f5ede2] border border-[#e4d4be] text-[#B08D57] text-[11px] font-bold uppercase tracking-wider">
                                Paket: Smart Business Stay
                            </span>
                            <span class="text-xs font-semibold text-[#8c8276] flex items-center gap-1.5">
                                <i class="ph ph-arrows-out"></i> 24 m² &bull; 2 Tamu Dewasa
                            </span>
                        </div>

                        <h2 class="font-serif text-2xl sm:text-3xl font-bold text-[#1E1A16]">
                            Standar Room
                        </h2>
                        <p class="text-[#635b52] text-xs sm:text-sm mt-2 leading-relaxed">
                            Dirancang dengan estetika minimalis modern, pencahayaan alami yang hangat, serta tata letak ergonomis. Pilihan sempurna untuk solo traveler dan pebisnis yang mengutamakan kepraktisan dan kenyamanan prima.
                        </p>

                        <!-- Keunggulan Standar -->
                        <div class="mt-6">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#B08D57] flex items-center gap-2 mb-3">
                                <i class="ph-fill ph-seal-check text-base"></i> Keunggulan Utama
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs text-[#635b52]">
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Kasur King Koil ortopedik untuk tidur pulas optimal</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Kamar kedap suara (soundproofed) bebas bising</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Meja kerja fleksibel dengan colokan universal &amp; USB</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Efisiensi biaya terbaik dengan mutu layanan bintang 5</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Fasilitas Standar -->
                        <div class="mt-6">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#1E1A16] flex items-center gap-2 mb-3">
                                <i class="ph ph-cube text-base text-[#B08D57]"></i> Fasilitas Kamar
                            </h3>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-bed text-[#B08D57]"></i> 1 Queen Bed
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-wifi-high text-[#B08D57]"></i> Wi-Fi 6 Cepat
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-television text-[#B08D57]"></i> Smart TV 43" (Netflix)
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-shower text-[#B08D57]"></i> Rain Shower Panas/Dingin
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-coffee text-[#B08D57]"></i> Tea/Coffee Maker
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-vault text-[#B08D57]"></i> Safe Deposit Box
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-drop text-[#B08D57]"></i> Air Mineral Harian
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi: Buka Halaman Detail-Produk & Pesan -->
                    <div class="pt-6 border-t border-[#FAF7F2] flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs text-[#8c8276]">
                            <span class="font-bold text-emerald-700 block">Tersedia untuk reservasi hari ini</span>
                            Diskon 10% jika menginap lebih dari 3 malam.
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <!-- Link ke Halaman Baru: detail-produk -->
                            <a href="{{ route('detail.produk', ['tipe' => 'Standar']) }}"
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 border border-[#1E1A16] hover:bg-[#1E1A16] hover:text-white text-[#1E1A16] px-6 py-3.5 rounded-full text-xs font-bold transition-all shadow-xs">
                                <i class="ph ph-play-circle text-base text-[#B08D57]"></i>
                                <span>Detail &amp; Video Tour</span>
                            </a>
                            <a href="{{ route('form.pesan') }}?tipe=Standar"
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 bg-[#1E1A16] hover:bg-stone-800 text-white px-7 py-3.5 rounded-full text-xs font-bold shadow-md transition-all hover:scale-105 active:scale-95">
                                <span>Pesan Standar</span>
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 2. KAMAR DELUXE (PALING FAVORIT) -->
        <section id="kamar-deluxe" class="bg-white rounded-[2.5rem] border-2 border-[#B08D57] shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl scroll-mt-28 relative">
            <div class="absolute top-0 right-10 bg-[#B08D57] text-white text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-b-xl shadow-sm z-10 hidden sm:block">
                Paling Favorit
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                
                <!-- Gambar Kamar Deluxe -->
                <div class="lg:col-span-5 relative min-h-[320px] lg:min-h-full overflow-hidden bg-[#FAF7F2]">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1200&auto=format&fit=crop"
                         alt="Deluxe Room Bigland"
                         class="w-full h-full object-cover object-center transition-transform duration-700 hover:scale-105">
                    <div class="absolute top-5 left-5 bg-[#B08D57] text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-md">
                        Deluxe Room
                    </div>
                    <div class="absolute bottom-5 left-5 right-5 bg-white/95 backdrop-blur-md rounded-2xl p-4 border border-[#e4d4be] shadow-sm flex items-center justify-between">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Tarif Mulai</span>
                            <span class="font-serif text-2xl font-bold text-[#1E1A16]">Rp 800.000</span>
                            <span class="text-[11px] text-[#635b52]">/ malam</span>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center gap-1 bg-[#f5ede2] text-[#B08D57] px-2.5 py-1 rounded-full text-xs font-bold">
                                <i class="ph-fill ph-star"></i> 4.9 / 5.0
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Konten Kamar Deluxe: Paket, Keunggulan, Fasilitas -->
                <div class="lg:col-span-7 p-6 sm:p-10 flex flex-col justify-between space-y-8">
                    <div>
                        <!-- Paket -->
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                            <span class="px-3 py-1 rounded-full bg-[#f5ede2] border border-[#e4d4be] text-[#B08D57] text-[11px] font-bold uppercase tracking-wider">
                                Paket: Leisure Retreat Experience
                            </span>
                            <span class="text-xs font-semibold text-[#8c8276] flex items-center gap-1.5">
                                <i class="ph ph-arrows-out"></i> 36 m² &bull; 2 Dewasa + 1 Anak
                            </span>
                        </div>

                        <h2 class="font-serif text-2xl sm:text-3xl font-bold text-[#1E1A16]">
                            Deluxe Room
                        </h2>
                        <p class="text-[#635b52] text-xs sm:text-sm mt-2 leading-relaxed">
                            Keseimbangan sempurna antara estetika mewah, kenyamanan santai, dan panorama cakrawala kota. Dilengkapi dengan area sofa terpisah, balkon privat, dan bathtub rendam yang menenangkan pikiran.
                        </p>

                        <!-- Keunggulan Deluxe -->
                        <div class="mt-6">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#B08D57] flex items-center gap-2 mb-3">
                                <i class="ph-fill ph-seal-check text-base"></i> Keunggulan Utama
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs text-[#635b52]">
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Balkon privat dengan panorama cakrawala kota metropolitan</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Bathtub terpisah dan rain-shower mewah dengan air hangat presisi</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Area duduk sofa santai untuk bersantai bersama keluarga</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Mesin kopi kapsul Nespresso premium gratis di kamar</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Fasilitas Deluxe -->
                        <div class="mt-6">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#1E1A16] flex items-center gap-2 mb-3">
                                <i class="ph ph-cube text-base text-[#B08D57]"></i> Fasilitas Kamar
                            </h3>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-bed text-[#B08D57]"></i> 1 King Size Bed
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-bathtub text-[#B08D57]"></i> Bathtub &amp; Rain Shower
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-sun text-[#B08D57]"></i> Balkon Privat Kota
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-television text-[#B08D57]"></i> Smart TV 55" 4K HDR
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-coffee text-[#B08D57]"></i> Mesin Kopi Nespresso
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-t-shirt text-[#B08D57]"></i> Bathrobe &amp; Slippers
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-wifi-high text-[#B08D57]"></i> Wi-Fi 6 Ultra Cepat
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi: Buka Halaman Detail-Produk & Pesan -->
                    <div class="pt-6 border-t border-[#FAF7F2] flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs text-[#8c8276]">
                            <span class="font-bold text-[#B08D57] block">Tipe kamar paling diminati tamu</span>
                            Diskon 10% jika menginap lebih dari 3 malam.
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <!-- Link ke Halaman Baru: detail-produk -->
                            <a href="{{ route('detail.produk', ['tipe' => 'Deluxe']) }}"
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 border border-[#B08D57] hover:bg-[#B08D57] hover:text-white text-[#B08D57] px-6 py-3.5 rounded-full text-xs font-bold transition-all shadow-xs">
                                <i class="ph ph-play-circle text-base"></i>
                                <span>Detail &amp; Video Tour</span>
                            </a>
                            <a href="{{ route('form.pesan') }}?tipe=Deluxe"
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 bg-[#B08D57] hover:bg-[#9c7743] text-white px-7 py-3.5 rounded-full text-xs font-bold shadow-md shadow-[#B08D57]/25 transition-all hover:scale-105 active:scale-95">
                                <span>Pesan Deluxe</span>
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. KAMAR EXECUTIF SUITE -->
        <section id="kamar-executif" class="bg-white rounded-[2.5rem] border border-[#e4d4be] shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl scroll-mt-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                
                <!-- Gambar Kamar Executif -->
                <div class="lg:col-span-5 relative min-h-[320px] lg:min-h-full overflow-hidden bg-[#FAF7F2]">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1200&auto=format&fit=crop"
                         alt="Executif Suite Bigland"
                         class="w-full h-full object-cover object-center transition-transform duration-700 hover:scale-105">
                    <div class="absolute top-5 left-5 bg-[#1E1A16] text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-md border border-white/20">
                        Executif Suite
                    </div>
                    <div class="absolute bottom-5 left-5 right-5 bg-white/95 backdrop-blur-md rounded-2xl p-4 border border-[#e4d4be] shadow-sm flex items-center justify-between">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Tarif Mulai</span>
                            <span class="font-serif text-2xl font-bold text-[#1E1A16]">Rp 1.200.000</span>
                            <span class="text-[11px] text-[#635b52]">/ malam</span>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center gap-1 bg-[#f5ede2] text-[#B08D57] px-2.5 py-1 rounded-full text-xs font-bold">
                                <i class="ph-fill ph-star"></i> 5.0 / 5.0
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Konten Kamar Executif: Paket, Keunggulan, Fasilitas -->
                <div class="lg:col-span-7 p-6 sm:p-10 flex flex-col justify-between space-y-8">
                    <div>
                        <!-- Paket -->
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                            <span class="px-3 py-1 rounded-full bg-[#1E1A16] text-white text-[11px] font-bold uppercase tracking-wider">
                                Paket: Presidential VIP Luxury Stay
                            </span>
                            <span class="text-xs font-semibold text-[#8c8276] flex items-center gap-1.5">
                                <i class="ph ph-arrows-out"></i> 54 m² &bull; 3 Tamu Dewasa
                            </span>
                        </div>

                        <h2 class="font-serif text-2xl sm:text-3xl font-bold text-[#1E1A16]">
                            Executif Suite
                        </h2>
                        <p class="text-[#635b52] text-xs sm:text-sm mt-2 leading-relaxed">
                            Puncak kemewahan di Bigland Hotel. Menghadirkan ruang tamu eksekutif terpisah, bathtub panoramik kaca marmer dengan view 180°, layanan personal butler 24 jam, serta akses VIP tak terbatas ke 28th Floor Sky Executive Lounge.
                        </p>

                        <!-- Keunggulan Executif -->
                        <div class="mt-6">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#B08D57] flex items-center gap-2 mb-3">
                                <i class="ph-fill ph-seal-check text-base"></i> Keunggulan Utama
                            </h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs text-[#635b52]">
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Akses penuh &amp; eksklusif ke 28th Floor Sky Executive Lounge</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Bathtub marmer kaca panoramik 180° menghadap cakrawala</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Layanan Personal Butler 24 Jam melayani setiap saat</span>
                                </li>
                                <li class="flex items-start gap-2 bg-[#FAF7F2] p-2.5 rounded-xl border border-[#f5ede2]">
                                    <i class="ph-bold ph-check text-[#B08D57] mt-0.5 shrink-0"></i>
                                    <span>Antar-jemput bandara mobil mewah VIP gratis</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Fasilitas Executif -->
                        <div class="mt-6">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-[#1E1A16] flex items-center gap-2 mb-3">
                                <i class="ph ph-cube text-base text-[#B08D57]"></i> Fasilitas Kamar
                            </h3>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-bed text-[#B08D57]"></i> 1 Super King Bed + Daybed
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-armchair text-[#B08D57]"></i> Living Room Terpisah
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-bathtub text-[#B08D57]"></i> Bathtub Panoramik &amp; Jacuzzi
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-wine text-[#B08D57]"></i> Akses Executive Lounge 24 Jam
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-television text-[#B08D57]"></i> Smart TV 65" + Harman Kardon
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-user-circle text-[#B08D57]"></i> Layanan Butler Pribadi
                                </span>
                                <span class="bg-white border border-[#e4d4be] text-[#635b52] px-3 py-1.5 rounded-xl flex items-center gap-1.5 font-medium">
                                    <i class="ph ph-car text-[#B08D57]"></i> Antar Jemput Bandara VIP
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi: Buka Halaman Detail-Produk & Pesan -->
                    <div class="pt-6 border-t border-[#FAF7F2] flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs text-[#8c8276]">
                            <span class="font-bold text-amber-700 block">Kemewahan tertinggi Bigland</span>
                            Diskon 10% jika menginap lebih dari 3 malam.
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <!-- Link ke Halaman Baru: detail-produk -->
                            <a href="{{ route('detail.produk', ['tipe' => 'Executif']) }}"
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 border border-[#1E1A16] hover:bg-[#1E1A16] hover:text-white text-[#1E1A16] px-6 py-3.5 rounded-full text-xs font-bold transition-all shadow-xs">
                                <i class="ph ph-play-circle text-base text-[#B08D57]"></i>
                                <span>Detail &amp; Video Tour</span>
                            </a>
                            <a href="{{ route('form.pesan') }}?tipe=Executif"
                               class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 bg-[#1E1A16] hover:bg-stone-800 text-white px-7 py-3.5 rounded-full text-xs font-bold shadow-md transition-all hover:scale-105 active:scale-95">
                                <span>Pesan Executif</span>
                                <i class="ph ph-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION: TAMPILAN TABEL HARGA & KOMPARASI FASILITAS LENGKAP -->
        <section id="tabel-harga" class="bg-white rounded-[2.5rem] border border-[#e4d4be] p-6 sm:p-10 shadow-lg scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold uppercase tracking-wider text-[#B08D57]">Transparansi &amp; Spesifikasi</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1E1A16] mt-1 tracking-tight">
                    Tampilan Tabel Perbandingan Harga
                </h2>
                <p class="text-[#635b52] text-xs sm:text-sm mt-2">
                    Bandingkan seluruh fasilitas, luas kamar, serta rincian tarif untuk menentukan kamar yang paling sesuai dengan kebutuhan Anda.
                </p>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-[#e4d4be]">
                <table class="w-full text-left text-xs border-collapse">
                    <thead>
                        <tr class="bg-[#FAF7F2] border-b border-[#e4d4be] text-[#1E1A16]">
                            <th class="p-4 sm:p-5 font-bold uppercase tracking-wider text-[11px] w-1/4">Fitur / Kamar</th>
                            <th class="p-4 sm:p-5 text-center w-1/4 border-l border-[#e4d4be]">
                                <span class="block font-serif text-lg font-bold">Standar</span>
                                <span class="font-bold text-[#B08D57] text-sm">Rp 500.000</span>
                                <span class="block text-[10px] text-[#8c8276]">/ malam</span>
                            </th>
                            <th class="p-4 sm:p-5 text-center w-1/4 border-l border-[#e4d4be] bg-[#f5ede2]/40 relative">
                                <span class="inline-block bg-[#B08D57] text-white text-[9px] font-bold uppercase px-2 py-0.5 rounded-full mb-1">Favorit</span>
                                <span class="block font-serif text-lg font-bold">Deluxe</span>
                                <span class="font-bold text-[#B08D57] text-sm">Rp 800.000</span>
                                <span class="block text-[10px] text-[#8c8276]">/ malam</span>
                            </th>
                            <th class="p-4 sm:p-5 text-center w-1/4 border-l border-[#e4d4be]">
                                <span class="inline-block bg-[#1E1A16] text-white text-[9px] font-bold uppercase px-2 py-0.5 rounded-full mb-1">Presidential</span>
                                <span class="block font-serif text-lg font-bold">Executif</span>
                                <span class="font-bold text-[#B08D57] text-sm">Rp 1.200.000</span>
                                <span class="block text-[10px] text-[#8c8276]">/ malam</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e4d4be]/60 text-[#635b52]">
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Luas Ruangan</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">24 m²</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] font-bold text-[#1E1A16]">36 m²</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] font-bold text-[#1E1A16]">54 m²</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Tipe Ranjang</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">1 Queen Bed</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">1 King Size Bed</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">1 Super King + Daybed</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Kapasitas Tamu</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">2 Dewasa</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">2 Dewasa + 1 Anak</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">Hingga 3 Dewasa</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Pemandangan (View)</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">City Street View</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">Skyline &amp; Sunset View</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">Panoramic Cityscape 180°</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Koneksi Wi-Fi</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]"><i class="ph-bold ph-check text-emerald-600"></i> Wi-Fi 6 Cepat</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]"><i class="ph-bold ph-check text-emerald-600"></i> Wi-Fi 6 Dedicated</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]"><i class="ph-bold ph-check text-emerald-600"></i> Wi-Fi 6 Ultra VIP</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Smart TV</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">43" (Netflix Ready)</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">55" 4K UHD</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">65" + Soundbar Harman Kardon</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Kamar Mandi</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">Rain Shower</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">Bathtub &amp; Rain Shower</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">Bathtub Panoramik &amp; Jacuzzi</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Balkon Privat</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-stone-400"><i class="ph ph-x"></i></td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-emerald-600 font-bold"><i class="ph-bold ph-check"></i> Tersedia</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-emerald-600 font-bold"><i class="ph-bold ph-check"></i> Tersedia</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Akses Sky Executive Lounge</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-stone-400"><i class="ph ph-x"></i></td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-stone-400"><i class="ph ph-x"></i></td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-emerald-600 font-bold"><i class="ph-bold ph-check"></i> VIP 24 Jam</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Layanan Butler Pribadi</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-stone-400"><i class="ph ph-x"></i></td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-stone-400"><i class="ph ph-x"></i></td>
                            <td class="p-4 text-center border-l border-[#e4d4be] text-emerald-600 font-bold"><i class="ph-bold ph-check"></i> 24 Jam Butler</td>
                        </tr>
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="p-4 font-semibold text-[#1E1A16]">Promo Durasi (> 3 Malam)</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] font-bold text-amber-700">Diskon 10%</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] font-bold text-amber-700">Diskon 10%</td>
                            <td class="p-4 text-center border-l border-[#e4d4be] font-bold text-amber-700">Diskon 10%</td>
                        </tr>
                        <tr class="bg-[#FAF7F2]/80">
                            <td class="p-4 font-bold text-[#1E1A16]">Aksi Pemesanan</td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">
                                <a href="{{ route('form.pesan') }}?tipe=Standar" class="inline-block py-2 px-4 rounded-full bg-[#1E1A16] hover:bg-[#B08D57] text-white font-bold text-[11px] transition-all">Pesan Standar</a>
                            </td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">
                                <a href="{{ route('form.pesan') }}?tipe=Deluxe" class="inline-block py-2 px-4 rounded-full bg-[#B08D57] hover:bg-[#9c7743] text-white font-bold text-[11px] transition-all shadow-sm">Pesan Deluxe</a>
                            </td>
                            <td class="p-4 text-center border-l border-[#e4d4be]">
                                <a href="{{ route('form.pesan') }}?tipe=Executif" class="inline-block py-2 px-4 rounded-full bg-[#1E1A16] hover:bg-[#B08D57] text-white font-bold text-[11px] transition-all">Pesan Executif</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- KETENTUAN DAN DISKON BANNER -->
        <div class="bg-gradient-to-r from-[#1E1A16] to-[#29231c] text-white rounded-[2.5rem] p-8 sm:p-12 shadow-xl flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="space-y-3 max-w-xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#B08D57]/30 text-[#B08D57] border border-[#B08D57]/40 text-xs font-bold uppercase tracking-wider">
                    <i class="ph-fill ph-seal-percent"></i> Penawaran Spesial Menginap
                </span>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold">Dapatkan Diskon 10% untuk Menginap Lebih dari 3 Malam</h3>
                <p class="text-stone-300 text-xs sm:text-sm leading-relaxed">
                    Potongan harga otomatis dihitung pada saat Anda mengisi durasi menginap. Tambahkan juga sarapan prasmanan buffet hanya Rp 80.000 / malam.
                </p>
            </div>
            <a href="{{ route('form.pesan') }}" class="px-8 py-4 rounded-full bg-[#B08D57] hover:bg-[#9c7743] text-white font-bold text-xs shadow-lg transition-all hover:scale-105 active:scale-95 shrink-0 flex items-center gap-2">
                <span>Buka Formulir Pemesanan</span>
                <i class="ph ph-arrow-right"></i>
            </a>
        </div>

    </main>

    <!-- FOOTER LUXURY BIGLAND -->
    <footer class="bg-white border-t border-[#e4d4be] pt-16 pb-10 mt-auto">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 grid grid-cols-1 md:grid-cols-12 gap-10 pb-12">
            <!-- Brand Info -->
            <div class="md:col-span-5 space-y-4">
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
            <div class="md:col-span-3 space-y-3">
                <span class="text-xs font-bold text-[#1E1A16] uppercase tracking-wider block">Navigasi Utama</span>
                <ul class="space-y-2 text-xs text-[#635b52]">
                    <li><a href="{{ route('home') }}" class="hover:text-[#1E1A16] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('produk') }}" class="hover:text-[#1E1A16] transition-colors font-semibold text-[#B08D57]">Daftar Produk &amp; Kamar</a></li>
                    <li><a href="{{ route('form.pesan') }}" class="hover:text-[#1E1A16] transition-colors">Formulir Pemesanan</a></li>
                    <li><a href="{{ route('riwayat') }}" class="hover:text-[#1E1A16] transition-colors">Riwayat Pemesanan</a></li>
                    <li><a href="{{ route('tentang-kami') }}" class="hover:text-[#1E1A16] transition-colors">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="md:col-span-4 space-y-3">
                <span class="text-xs font-bold text-[#1E1A16] uppercase tracking-wider block">Kontak &amp; Reservasi</span>
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

        <div class="max-w-7xl mx-auto px-6 sm:px-8 pt-8 border-t border-[#FAF7F2] flex flex-col sm:flex-row items-center justify-between text-xs text-[#8c8276] gap-4">
            <p>&copy; 2026 Bigland Hotel &amp; Suites. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-[#1E1A16] transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-[#1E1A16] transition-colors">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>

</body>

</html>
