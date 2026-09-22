<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigland - Formulir Reservasi Kamar</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
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
                            800: '#1e242b',
                            900: '#11151a',
                            950: '#0a0d10',
                        },
                        brand: {
                            50: '#f8f9fa',
                            100: '#f1f3f5',
                            200: '#e9ecef',
                            800: '#1e242b',
                            900: '#11151a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { 
            background-color: #faf9f6; 
            color: #11151a;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; margin: 0; 
        }
        .glass-nav {
            background: rgba(250, 249, 246, 0.85);
            backdrop-filter: blur(16px);
        }
    </style>
</head>
<body class="text-obsidian-900 font-sans antialiased selection:bg-obsidian-900 selection:text-white">

    <!-- Notifikasi Sukses Laravel -->
    @if(session('success'))
        <div class="fixed top-5 right-5 z-50 bg-emerald-600 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-bounce">
            <i class="ph ph-check-circle text-2xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Navbar Minimalis -->
    <nav class="fixed w-full top-0 z-50 glass-nav border-b border-stone-200/80 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-obsidian-900 text-white flex items-center justify-center font-bold shadow-md group-hover:scale-105 transition-transform">
                    <i class="ph-fill ph-buildings text-xl"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-obsidian-900">Bigland</span>
                    <span class="text-[10px] tracking-[0.2em] uppercase font-semibold text-stone-400 -mt-1">Hotel & Suites</span>
                </div>
            </a>
            
            <a href="/" class="bg-stone-100 text-obsidian-900 px-5 py-2 rounded-full text-xs font-semibold hover:bg-stone-200 transition-all flex items-center gap-2 border border-stone-200">
                <i class="ph ph-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 pb-20 px-6 max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200/80 pb-8">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-stone-100 text-obsidian-900 text-xs font-semibold mb-4 border border-stone-200">
                    <i class="ph ph-calendar-check text-base"></i> Reservasi Kamar Resmi
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-obsidian-900">Formulir Pemesanan Kamar</h1>
            </div>
            <p class="text-stone-500 max-w-md text-xs sm:text-sm leading-relaxed">
                Silakan pilih tipe kamar, tentukan tanggal & durasi menginap, serta lengkapi data diri Anda untuk mengamankan reservasi di Bigland.
            </p>
        </div>

        <form action="{{ route('form.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            @csrf

            <!-- Kolom Kiri: Informasi & Tarif Kamar -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-6 md:p-8 shadow-sm border border-stone-200/90">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-2xl bg-obsidian-900 text-white flex items-center justify-center shadow-md">
                            <i class="ph ph-tag text-lg"></i>
                        </div>
                        <h2 class="text-lg font-bold text-obsidian-900">Pilihan Tipe Kamar</h2>
                    </div>

                    <div class="space-y-4">
                        <!-- List Kamar 1: Standar -->
                        <div class="p-5 rounded-[2rem] bg-stone-50 border border-stone-200 hover:border-obsidian-900 hover:bg-white transition-all duration-300 cursor-pointer select-room group" data-type="Standar" data-price="500000">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-obsidian-900 text-sm">Standar Room</h3>
                                <span class="text-[11px] font-bold text-obsidian-900 bg-stone-200 px-3 py-1 rounded-full group-hover:bg-obsidian-900 group-hover:text-white transition-colors">Pilih</span>
                            </div>
                            <p class="text-xs text-stone-500 mb-3 leading-relaxed">Pilihan pas istirahat santai dengan pencahayaan alami & fasilitas esensial.</p>
                            <p class="font-extrabold text-obsidian-900 text-sm">Rp 500k <span class="text-xs font-normal text-stone-400">/ malam</span></p>
                        </div>

                        <!-- List Kamar 2: Deluxe -->
                        <div class="p-5 rounded-[2rem] bg-stone-50 border border-stone-200 hover:border-obsidian-900 hover:bg-white transition-all duration-300 cursor-pointer select-room group" data-type="Deluxe" data-price="800000">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-obsidian-900 text-sm">Deluxe Room</h3>
                                <span class="text-[11px] font-bold text-obsidian-900 bg-stone-200 px-3 py-1 rounded-full group-hover:bg-obsidian-900 group-hover:text-white transition-colors">Pilih</span>
                            </div>
                            <p class="text-xs text-stone-500 mb-3 leading-relaxed">Ruangan lebih lega, meja kerja ergonomis, pemandangan kota, plus bathtub.</p>
                            <p class="font-extrabold text-obsidian-900 text-sm">Rp 800k <span class="text-xs font-normal text-stone-400">/ malam</span></p>
                        </div>

                        <!-- List Kamar 3: Executif -->
                        <div class="p-5 rounded-[2rem] bg-stone-50 border border-stone-200 hover:border-obsidian-900 hover:bg-white transition-all duration-300 cursor-pointer select-room group" data-type="Executif" data-price="1200000">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-obsidian-900 text-sm">Executif Suite</h3>
                                <span class="text-[11px] font-bold text-obsidian-900 bg-stone-200 px-3 py-1 rounded-full group-hover:bg-obsidian-900 group-hover:text-white transition-colors">Pilih</span>
                            </div>
                            <p class="text-xs text-stone-500 mb-3 leading-relaxed">Privasi maksimal, super king bed, living room terpisah, private jacuzzi & Sky Lounge.</p>
                            <p class="font-extrabold text-obsidian-900 text-sm">Rp 1.2M <span class="text-xs font-normal text-stone-400">/ malam</span></p>
                        </div>
                    </div>
                </div>

                <!-- Card Tambahan Breakfast -->
                <label class="block relative group cursor-pointer">
                    <input type="checkbox" name="breakfast" id="breakfast_checkbox" value="Ya" class="peer sr-only">
                    <div class="bg-white p-6 rounded-[2.5rem] border-2 border-stone-200 shadow-sm transition-all peer-checked:border-obsidian-900 peer-checked:shadow-md">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">
                                <i class="ph ph-coffee text-xl"></i>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 border-stone-300 flex items-center justify-center peer-checked:bg-obsidian-900 peer-checked:border-obsidian-900 transition-colors">
                                <i class="ph ph-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                            </div>
                        </div>
                        <h4 class="font-bold text-obsidian-900 text-sm">Tambah Breakfast Buffet?</h4>
                        <p class="text-xs text-stone-500 mt-1 mb-3">Nikmati sarapan prasmanan lezat ragam kuliner khas di The Bigland Bistro.</p>
                        <span class="inline-block bg-stone-100 text-obsidian-900 text-xs font-bold px-3 py-1 rounded-xl border border-stone-200">+ Rp 80.000 / malam</span>
                    </div>
                </label>
            </div>

            <!-- Kolom Kanan: Form Utama & Ringkasan Pembayaran -->
            <div class="lg:col-span-8 space-y-6">
                <!-- Form Input Identitas & Detail -->
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-sm border border-stone-200/90">
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-3 border-b border-stone-100 pb-4 text-obsidian-900">
                        <i class="ph ph-user-circle text-stone-400 text-2xl"></i> Data Identitas Pemesan
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Nama Lengkap</label>
                                <input type="text" name="nama" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-5 py-4 text-sm outline-none focus:bg-white focus:border-obsidian-900 focus:ring-4 focus:ring-obsidian-900/10 transition-all font-medium" placeholder="Masukkan nama sesuai KTP" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Nomor Identitas (KTP)</label>
                                <input type="text" name="nomor_identitas" minlength="16" maxlength="16" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-5 py-4 text-sm outline-none focus:bg-white focus:border-obsidian-900 focus:ring-4 focus:ring-obsidian-900/10 transition-all font-medium" placeholder="16 Digit Nomor KTP" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Jenis Kelamin</label>
                            <div class="flex gap-4">
                                <label class="flex-1 relative cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="peer sr-only" required>
                                    <div class="w-full text-center px-4 py-3.5 rounded-2xl border border-stone-200 bg-stone-50 text-stone-600 font-medium text-xs sm:text-sm cursor-pointer transition-all peer-checked:border-obsidian-900 peer-checked:bg-obsidian-900 peer-checked:text-white shadow-sm">
                                        Laki-laki
                                    </div>
                                </label>
                                <label class="flex-1 relative cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="peer sr-only" required>
                                    <div class="w-full text-center px-4 py-3.5 rounded-2xl border border-stone-200 bg-stone-50 text-stone-600 font-medium text-xs sm:text-sm cursor-pointer transition-all peer-checked:border-obsidian-900 peer-checked:bg-obsidian-900 peer-checked:text-white shadow-sm">
                                        Perempuan
                                    </div>
                                </label>
                            </div>
                        </div>

                        <h3 class="text-lg font-bold mt-10 mb-6 flex items-center gap-3 border-b border-stone-100 pb-4 pt-4 text-obsidian-900">
                            <i class="ph ph-door text-stone-400 text-2xl"></i> Detail Pemesanan Kamar
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Tipe Kamar Dipilih</label>
                                <div class="relative">
                                    <select name="tipe_kamar" id="tipe_kamar" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-5 py-4 text-sm outline-none focus:bg-white focus:border-obsidian-900 focus:ring-4 focus:ring-obsidian-900/10 transition-all appearance-none font-bold text-obsidian-900 cursor-pointer" required>
                                        <option value="">-- Pilih Tipe Kamar --</option>
                                        <option value="Standar">Standar</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Executif">Executif</option>
                                    </select>
                                    <i class="ph ph-caret-down absolute right-5 top-1/2 -translate-y-1/2 text-stone-400 pointer-events-none text-lg"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Harga / Malam</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-stone-400 font-semibold text-sm">Rp</span>
                                    <input type="text" id="harga_formatted" class="w-full bg-stone-100 border border-transparent rounded-2xl pl-12 pr-5 py-4 text-stone-700 font-bold text-sm cursor-not-allowed outline-none" readonly placeholder="0">
                                    <input type="hidden" name="harga" id="harga_input" value="0">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Tanggal Check-in</label>
                                <input type="date" name="tanggal_pesan" id="tanggal_pesan" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-5 py-4 text-sm outline-none focus:bg-white focus:border-obsidian-900 focus:ring-4 focus:ring-obsidian-900/10 transition-all font-medium text-stone-700 cursor-pointer" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-stone-500 uppercase tracking-wider mb-2.5">Durasi Menginap</label>
                                <div class="relative">
                                    <input type="number" name="durasi" id="durasi_input" min="1" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-5 py-4 text-sm outline-none focus:bg-white focus:border-obsidian-900 focus:ring-4 focus:ring-obsidian-900/10 transition-all font-medium" placeholder="Contoh: 2" required>
                                    <span class="absolute right-5 top-1/2 -translate-y-1/2 text-stone-400 text-xs font-bold pointer-events-none">MALAM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Box Total Pembayaran & Tombol Aksi -->
                <div class="bg-obsidian-900 rounded-[2.5rem] p-8 md:p-10 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-obsidian-800 rounded-full blur-2xl opacity-50 pointer-events-none"></div>
                    
                    <div class="relative z-10">
                        <span class="text-stone-400 text-xs font-bold uppercase tracking-wider">Total Pembayaran</span>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-2xl font-bold text-stone-300">Rp</span>
                            <input type="text" id="total_bayar_formatted" class="w-full bg-transparent text-3xl md:text-4xl font-extrabold text-white border-none p-0 outline-none cursor-not-allowed placeholder-stone-500" readonly placeholder="0">
                            <input type="hidden" name="total_bayar" id="total_bayar_input" value="0">
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto relative z-10">
                        <button type="button" id="btn_hitung" class="px-6 py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl font-bold text-xs sm:text-sm transition-all flex items-center justify-center gap-2 border border-white/20 cursor-pointer">
                            <i class="ph ph-calculator text-lg"></i> Hitung Total
                        </button>
                        <button type="submit" class="px-8 py-4 bg-white text-obsidian-900 hover:bg-stone-100 rounded-2xl font-bold text-xs sm:text-sm transition-all flex items-center justify-center gap-2 shadow-lg cursor-pointer hover:scale-105">
                            <i class="ph ph-check-circle text-lg"></i> Konfirmasi Pesanan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Footer Minimalis -->
    <footer class="bg-white border-t border-stone-200 py-8 text-center text-xs text-stone-400">
        &copy; 2026 Bigland. All rights reserved.
    </footer>

    <!-- Script JavaScript Interaktif -->
    <script>
        const daftarHarga = {
            "Standar": 500000,
            "Deluxe": 800000,
            "Executif": 1200000
        };

        const selectKamar = document.getElementById('tipe_kamar');
        const inputHarga = document.getElementById('harga_input');
        const inputHargaFormatted = document.getElementById('harga_formatted');
        const inputDurasi = document.getElementById('durasi_input');
        const checkBreakfast = document.getElementById('breakfast_checkbox');
        const inputTotal = document.getElementById('total_bayar_input');
        const inputTotalFormatted = document.getElementById('total_bayar_formatted');
        const btnHitung = document.getElementById('btn_hitung');
        const cardRooms = document.querySelectorAll('.select-room');
        const inputTanggal = document.getElementById('tanggal_pesan');

        // Set batasan minimal tanggal check-in ke hari ini secara otomatis
        const today = new Date().toISOString().split('T')[0];
        inputTanggal.min = today;
        if (!inputTanggal.value) {
            inputTanggal.value = today;
        }

        // Fungsi memperbarui UI card kamar di sebelah kiri agar selaras dengan dropdown
        function updateActiveCard(type) {
            cardRooms.forEach(c => {
                if (c.getAttribute('data-type') === type) {
                    c.classList.add('border-obsidian-900', 'bg-white', 'shadow-md');
                    c.classList.remove('border-stone-200', 'bg-stone-50');
                } else {
                    c.classList.remove('border-obsidian-900', 'bg-white', 'shadow-md');
                    c.classList.add('border-stone-200', 'bg-stone-50');
                }
            });
        }

        // Sinkronisasi klik card pilihan kamar di sebelah kiri ke form dropdown
        cardRooms.forEach(card => {
            card.addEventListener('click', function() {
                let type = this.getAttribute('data-type');
                let price = parseInt(this.getAttribute('data-price')) || 0;
                
                selectKamar.value = type;
                inputHarga.value = price;
                inputHargaFormatted.value = price.toLocaleString('id-ID');
                
                updateActiveCard(type);
                autoCalculate();
            });
        });

        // Sinkronisasi jika dropdown diubah secara manual
        selectKamar.addEventListener('change', function() {
            let type = this.value;
            let harga = daftarHarga[type] || 0;
            
            inputHarga.value = harga;
            inputHargaFormatted.value = harga ? harga.toLocaleString('id-ID') : '';
            
            updateActiveCard(type);
            autoCalculate();
        });

        // Hitung otomatis saat durasi atau opsi breakfast berubah
        inputDurasi.addEventListener('input', autoCalculate);
        checkBreakfast.addEventListener('change', autoCalculate);

        function autoCalculate() {
            let harga = parseInt(inputHarga.value) || 0;
            let durasi = parseInt(inputDurasi.value) || 0;
            let tambahanBreakfast = checkBreakfast.checked ? 80000 : 0;

            if (durasi > 0 && harga > 0) {
                let total = (harga + tambahanBreakfast) * durasi;
                inputTotal.value = total;
                inputTotalFormatted.value = total.toLocaleString('id-ID');
            } else {
                inputTotal.value = 0;
                inputTotalFormatted.value = '0';
            }
        }

        // Logika Tombol Hitung Manual
        btnHitung.addEventListener('click', function() {
            let harga = parseInt(inputHarga.value) || 0;
            let durasi = parseInt(inputDurasi.value) || 0;
            let tambahanBreakfast = checkBreakfast.checked ? 80000 : 0;

            if (harga === 0) {
                alert('Silakan pilih tipe kamar terlebih dahulu!');
                selectKamar.focus();
                return;
            }

            if (durasi <= 0 || isNaN(durasi)) {
                alert('Silakan masukkan durasi menginap minimal 1 malam!');
                inputDurasi.focus();
                return;
            }

            let total = (harga + tambahanBreakfast) * durasi;
            inputTotal.value = total;
            inputTotalFormatted.value = total.toLocaleString('id-ID');
        });

        // Sinkronisasi URL Parameters dari Hero Quick Booking atau Room Cards
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('tgl')) {
            inputTanggal.value = urlParams.get('tgl');
        }
        if (urlParams.has('durasi')) {
            inputDurasi.value = urlParams.get('durasi');
        }
        if (urlParams.has('tipe')) {
            const tipeParam = urlParams.get('tipe');
            if (daftarHarga[tipeParam]) {
                selectKamar.value = tipeParam;
                inputHarga.value = daftarHarga[tipeParam];
                inputHargaFormatted.value = daftarHarga[tipeParam].toLocaleString('id-ID');
                updateActiveCard(tipeParam);
                autoCalculate();
            }
        }
    </script>
</body>
</html>