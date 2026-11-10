<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigland - Tentang Kami</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

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

    <!-- HERO HEADER -->
    <section class="pt-32 sm:pt-36 pb-12 px-6 sm:px-8 max-w-7xl mx-auto text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#f5ede2] border border-[#e4d4be] text-[#B08D57] text-xs font-bold uppercase tracking-wider mb-4 shadow-xs">
            <i class="ph-fill ph-buildings text-sm"></i> Profil &amp; Identitas Hotel
        </div>
        <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-normal text-[#1E1A16] tracking-tight max-w-4xl mx-auto leading-tight">
            Tentang Bigland Hotel &amp; Suites
        </h1>
        <p class="text-[#635b52] text-xs sm:text-base max-w-2xl mx-auto mt-4 leading-relaxed font-normal">
            Menggabungkan keanggunan arsitektur modern dengan kehangatan keramahan khas Indonesia untuk menghadirkan pengalaman menginap tak tertandingi di pusat ibukota.
        </p>
    </section>

    <!-- MAIN CONTENT: PROFIL, DESKRIPSI, KONTAK & AKSES -->
    <main class="flex-1 max-w-7xl mx-auto px-6 sm:px-8 pb-20 space-y-12">

        <!-- KARTU DESKRIPSI UTAMA & GAMBAR -->
        <div class="bg-white rounded-[2.5rem] border border-[#e4d4be] p-6 sm:p-12 shadow-lg grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <div class="lg:col-span-6 space-y-5">
                <span class="text-xs font-bold uppercase tracking-wider text-[#B08D57]">Dedikasi Kenyamanan Anda</span>
                <h2 class="font-serif text-2xl sm:text-4xl font-normal text-[#1E1A16] tracking-tight">
                    Oase Ketenangan di Tengah Hiruk Pikuk Metropolitan
                </h2>
                <p class="text-[#635b52] text-xs sm:text-sm leading-relaxed">
                    Bigland Hotel &amp; Suites didirikan dengan satu komitmen mendasar: menyediakan tempat perlindungan dan peristirahatan yang damai di jantung sentral Jakarta. Setiap sudut bangunan kami dirancang dengan material kayu alami, sentuhan marmer hangat, dan tata cahaya lembut yang menenangkan jiwa.
                </p>
                <p class="text-[#635b52] text-xs sm:text-sm leading-relaxed">
                    Baik Anda datang untuk pertemuan bisnis tingkat tinggi, liburan akhir pekan bersama pasangan, maupun rehat mandiri, staf kami siap memberikan layanan personal 24 jam dengan keramahan tulus dan standar profesionalisme bintang lima.
                </p>

                <div class="grid grid-cols-3 gap-4 pt-4 border-t border-[#FAF7F2]">
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-[#B08D57]">150+</span>
                        <span class="block text-[11px] text-[#8c8276] mt-0.5">Kamar &amp; Suite</span>
                    </div>
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-[#B08D57]">4.9</span>
                        <span class="block text-[11px] text-[#8c8276] mt-0.5">Rating Tamu</span>
                    </div>
                    <div>
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-[#B08D57]">24 Jam</span>
                        <span class="block text-[11px] text-[#8c8276] mt-0.5">Layanan Butler</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 relative rounded-3xl overflow-hidden shadow-xl aspect-4/3 bg-[#FAF7F2]">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop"
                     alt="Lobi Mewah Bigland Hotel"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1E1A16]/60 via-transparent to-transparent flex items-end p-6">
                    <span class="text-white text-xs font-semibold backdrop-blur-md bg-black/30 px-4 py-2 rounded-full border border-white/20">
                        Grand Lobby &amp; Sanctuary Lounge Bigland
                    </span>
                </div>
            </div>
        </div>

        <!-- INFORMASI KONTAK RESMI (ALAMAT, NO TELP, EMAIL) SESUAI SPESIFIKASI GAMBAR -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- 1. Alamat Hotel -->
            <div class="bg-white rounded-[2rem] p-8 border border-[#e4d4be] shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#f5ede2] text-[#B08D57] flex items-center justify-center text-2xl mb-5">
                        <i class="ph ph-map-pin"></i>
                    </div>
                    <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Lokasi &amp; Alamat Hotel</span>
                    <h3 class="font-serif text-lg font-bold text-[#1E1A16] mt-1">Alamat Fisik Resmi</h3>
                    <p class="text-[#635b52] text-xs sm:text-sm mt-3 leading-relaxed">
                        Jl. MH Thamrin No. 28, Menteng, Jakarta Pusat, DKI Jakarta 10350, Indonesia.
                    </p>
                </div>
                <div class="pt-6 border-t border-[#FAF7F2] mt-6">
                    <span class="text-[11px] font-bold text-[#B08D57] flex items-center gap-1.5">
                        <i class="ph ph-navigation-arrow"></i> 250m dari Stasiun MRT Bundaran HI
                    </span>
                </div>
            </div>

            <!-- 2. Nomor Telepon -->
            <div class="bg-white rounded-[2rem] p-8 border border-[#e4d4be] shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#f5ede2] text-[#B08D57] flex items-center justify-center text-2xl mb-5">
                        <i class="ph ph-phone-call"></i>
                    </div>
                    <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Layanan Telepon 24/7</span>
                    <h3 class="font-serif text-lg font-bold text-[#1E1A16] mt-1">Nomor Telepon &amp; Hotline</h3>
                    <p class="text-[#635b52] text-xs sm:text-sm mt-3 leading-relaxed">
                        Reservasi Telepon: <br>
                        <strong class="text-[#1E1A16] text-sm">+62 (21) 3988-7700</strong><br>
                        Hotline WhatsApp: <br>
                        <strong class="text-[#1E1A16] text-sm">+62 811-2345-6789</strong>
                    </p>
                </div>
                <div class="pt-6 border-t border-[#FAF7F2] mt-6">
                    <span class="text-[11px] font-bold text-emerald-700 flex items-center gap-1.5">
                        <i class="ph-fill ph-check-circle"></i> Tim Concierge Siaga 24 Jam
                    </span>
                </div>
            </div>

            <!-- 3. Alamat Email -->
            <div class="bg-white rounded-[2rem] p-8 border border-[#e4d4be] shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-[#f5ede2] text-[#B08D57] flex items-center justify-center text-2xl mb-5">
                        <i class="ph ph-envelope-simple"></i>
                    </div>
                    <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Korespondensi Elektronik</span>
                    <h3 class="font-serif text-lg font-bold text-[#1E1A16] mt-1">Alamat Email Resmi</h3>
                    <p class="text-[#635b52] text-xs sm:text-sm mt-3 leading-relaxed">
                        Pemesanan &amp; Reservasi: <br>
                        <strong class="text-[#1E1A16] text-sm">reservasi@bigland.com</strong><br>
                        Layanan Tamu &amp; Acara: <br>
                        <strong class="text-[#1E1A16] text-sm">concierge@bigland.com</strong>
                    </p>
                </div>
                <div class="pt-6 border-t border-[#FAF7F2] mt-6">
                    <span class="text-[11px] font-bold text-[#B08D57] flex items-center gap-1.5">
                        <i class="ph ph-paper-plane-tilt"></i> Balasan email dalam kurun waktu 1 jam
                    </span>
                </div>
            </div>

        </div>

        <!-- AKSESIBILITAS & FASILITAS HOTEL -->
        <div class="bg-white rounded-[2.5rem] border border-[#e4d4be] p-8 sm:p-12 shadow-lg">
            <div class="max-w-2xl mb-8">
                <span class="text-xs font-bold uppercase tracking-wider text-[#B08D57]">Fasilitas &amp; Layanan Lengkap</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-[#1E1A16] mt-1">
                    Standar Kenyamanan Menyeluruh
                </h3>
                <p class="text-[#635b52] text-xs sm:text-sm mt-2">
                    Nikmati rangkaian fasilitas kelas atas yang kami siapkan untuk melengkapi pengalaman menginap Anda di Bigland.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-5 rounded-2xl bg-[#FAF7F2] border border-[#f5ede2] space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-white text-[#B08D57] flex items-center justify-center text-xl shadow-xs">
                        <i class="ph ph-swimming-pool"></i>
                    </div>
                    <h4 class="font-bold text-sm text-[#1E1A16]">Infinity Rooftop Pool</h4>
                    <p class="text-[11px] text-[#635b52] leading-relaxed">Kolam renang di lantai puncak dengan panorama 360° gedung-gedung Jakarta.</p>
                </div>

                <div class="p-5 rounded-2xl bg-[#FAF7F2] border border-[#f5ede2] space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-white text-[#B08D57] flex items-center justify-center text-xl shadow-xs">
                        <i class="ph ph-coffee"></i>
                    </div>
                    <h4 class="font-bold text-sm text-[#1E1A16]">The Bigland Bistro</h4>
                    <p class="text-[11px] text-[#635b52] leading-relaxed">Restoran elegan menyajikan sarapan buffet prasmanan &amp; masakan internasional.</p>
                </div>

                <div class="p-5 rounded-2xl bg-[#FAF7F2] border border-[#f5ede2] space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-white text-[#B08D57] flex items-center justify-center text-xl shadow-xs">
                        <i class="ph ph-flower-lotus"></i>
                    </div>
                    <h4 class="font-bold text-sm text-[#1E1A16]">Serenity Spa &amp; Wellness</h4>
                    <p class="text-[11px] text-[#635b52] leading-relaxed">Perawatan tubuh holistik tradisional dengan minyak aromaterapi organik pilihan.</p>
                </div>

                <div class="p-5 rounded-2xl bg-[#FAF7F2] border border-[#f5ede2] space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-white text-[#B08D57] flex items-center justify-center text-xl shadow-xs">
                        <i class="ph ph-crown"></i>
                    </div>
                    <h4 class="font-bold text-sm text-[#1E1A16]">Sky Executive Lounge</h4>
                    <p class="text-[11px] text-[#635b52] leading-relaxed">Ruang pertemuan eksklusif lantai 28 dengan complimentary afternoon tea harian.</p>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="mt-8 pt-6 border-t border-[#FAF7F2] grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs text-[#635b52]">
                <div class="flex items-center gap-2">
                    <i class="ph ph-clock text-[#B08D57] text-base"></i>
                    <span>Check-in: Mulai pukul 14:00 WIB</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-clock-countdown text-[#B08D57] text-base"></i>
                    <span>Check-out: Hingga pukul 12:00 WIB</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ph ph-shield-check text-[#B08D57] text-base"></i>
                    <span>Resepsionis &amp; Keamanan: 24 Jam Non-stop</span>
                </div>
            </div>
        </div>

        <!-- BANNER CTA -->
        <div class="bg-[#1E1A16] text-white rounded-[2.5rem] p-8 sm:p-12 shadow-xl flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="space-y-2 max-w-xl">
                <span class="text-xs uppercase font-bold text-[#B08D57] tracking-wider">Reservasi Resmi</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-bold">Siap Menginap di Bigland?</h3>
                <p class="text-stone-300 text-xs sm:text-sm leading-relaxed">
                    Pesan kamar impian Anda sekarang tanpa perlu mendaftar atau login. Proses instan dengan konfirmasi langsung.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('produk') }}" class="px-6 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-xs border border-white/20 transition-all">
                    Lihat Koleksi Kamar
                </a>
                <a href="{{ route('form.pesan') }}" class="px-8 py-3.5 rounded-full bg-[#B08D57] hover:bg-[#9c7743] text-white font-bold text-xs shadow-lg transition-all hover:scale-105 active:scale-95">
                    Pesan Kamar Sekarang
                </a>
            </div>
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
            </div>

            <!-- Links -->
            <div class="md:col-span-3 space-y-3">
                <span class="text-xs font-bold text-[#1E1A16] uppercase tracking-wider block">Navigasi Utama</span>
                <ul class="space-y-2 text-xs text-[#635b52]">
                    <li><a href="{{ route('home') }}" class="hover:text-[#1E1A16] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('produk') }}" class="hover:text-[#1E1A16] transition-colors">Daftar Produk &amp; Kamar</a></li>
                    <li><a href="{{ route('form.pesan') }}" class="hover:text-[#1E1A16] transition-colors">Formulir Pemesanan</a></li>
                    <li><a href="{{ route('riwayat') }}" class="hover:text-[#1E1A16] transition-colors">Riwayat Pemesanan</a></li>
                    <li><a href="{{ route('tentang-kami') }}" class="hover:text-[#1E1A16] transition-colors font-semibold text-[#B08D57]">Tentang Kami</a></li>
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

