<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigland - Formulir Pemesanan Kamar</title>

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

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Checkbox breakfast custom indicator */
        .check-icon {
            opacity: 0;
            transition: opacity 150ms ease;
        }
        #breakfast_checkbox:checked ~ .check-indicator {
            background-color: #B08D57;
            border-color: #B08D57;
        }
        #breakfast_checkbox:checked ~ .check-indicator .check-icon {
            opacity: 1;
        }

        /* Selected Card Styling */
        .room-card:has(input:checked) {
            border-color: #B08D57 !important;
            background-color: #ffffff !important;
            box-shadow: 0 10px 25px -5px rgba(176, 141, 87, 0.15), 0 8px 10px -6px rgba(176, 141, 87, 0.1) !important;
            transform: translateY(-2px);
        }

        /* Baris Diskon */
        #baris_diskon { display: none; }
        #baris_diskon.aktif { display: flex; }

        /* Alert Validasi */
        #alert_kosong { display: none; }
        #alert_kosong.tampil { display: flex; }
    </style>
</head>

<body class="selection:bg-[#f5ede2] selection:text-[#1E1A16] font-sans antialiased bg-[#FAF7F2] min-h-screen flex flex-col">

    <!-- FLOATING PILL NAVBAR COMPONENT -->
    <x-navbar />

    <!-- TOAST POP-UP NOTIFIKASI DISKON 10% (LONG STAY PROMO) -->
    <div id="toast_diskon"
         class="fixed top-24 right-4 sm:right-8 z-50 transform -translate-y-6 opacity-0 pointer-events-none transition-all duration-500 ease-out max-w-sm w-full bg-white rounded-3xl p-4 sm:p-5 border-2 border-emerald-500 shadow-2xl flex items-start gap-3.5">
        <div class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shrink-0 shadow-xs">
            <i class="ph-fill ph-seal-percent"></i>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between">
                <h4 class="font-bold text-xs sm:text-sm text-[#1E1A16] flex items-center gap-1.5">
                    <span>Selamat! Diskon 10% Aktif</span> 🎉
                </h4>
                <button type="button" onclick="tutupToastDiskon()" class="text-stone-400 hover:text-stone-700 p-0.5" aria-label="Tutup notifikasi">
                    <i class="ph ph-x text-sm"></i>
                </button>
            </div>
            <p class="text-[11px] text-[#635b52] mt-1 leading-relaxed">
                Anda menginap <strong id="toast_durasi_teks" class="text-emerald-700">4 malam</strong> (lebih dari 3 malam). Anda berhak mendapatkan diskon kamar 10% sebesar <strong id="toast_nominal_diskon" class="text-emerald-700 font-extrabold">Rp 0</strong>!
            </p>
        </div>
    </div>

    <!-- TOAST POP-UP NOTIFIKASI VALIDASI & PERINGATAN (NAMA & KTP) -->
    <div id="toast_validasi"
         class="fixed top-24 right-4 sm:right-8 z-50 transform -translate-y-6 opacity-0 pointer-events-none transition-all duration-500 ease-out max-w-sm w-full bg-white rounded-3xl p-4 sm:p-5 border-2 border-rose-500 shadow-2xl flex items-start gap-3.5">
        <div id="toast_validasi_icon_box" class="w-10 h-10 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center text-2xl shrink-0 shadow-xs">
            <i id="toast_validasi_icon" class="ph-fill ph-warning-circle"></i>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between">
                <h4 id="toast_validasi_judul" class="font-bold text-xs sm:text-sm text-[#1E1A16] flex items-center gap-1.5">
                    Peringatan Formulir
                </h4>
                <button type="button" onclick="tutupToastValidasi()" class="text-stone-400 hover:text-stone-700 p-0.5" aria-label="Tutup notifikasi">
                    <i class="ph ph-x text-sm"></i>
                </button>
            </div>
            <p id="toast_validasi_pesan" class="text-[11px] text-[#635b52] mt-1 leading-relaxed">
                Mohon lengkapi data formulir Anda.
            </p>
        </div>
    </div>

    <!-- Notifikasi Sukses / Error Session Flash -->
    @if(session('success'))
        <div role="status" class="fixed top-24 right-6 z-50 bg-[#1E1A16] text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 border border-[#B08D57]/40 max-w-md animate-bounce">
            <div class="w-8 h-8 rounded-full bg-[#B08D57] flex items-center justify-center text-white shrink-0">
                <i class="ph-bold ph-check text-lg"></i>
            </div>
            <span class="text-xs font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- MAIN FORM SECTION -->
    <main class="flex-1 pt-32 sm:pt-36 pb-20 px-4 sm:px-6 max-w-4xl mx-auto w-full">

        <!-- Header Formulir -->
        <div class="mb-10 text-center sm:text-left border-b border-[#e4d4be] pb-8">
            <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1E1A16] tracking-tight">
                Formulir Pemesanan Kamar
            </h1>
            <p class="text-[#635b52] mt-3 text-xs sm:text-sm leading-relaxed max-w-2xl font-normal">
                Silakan lengkapi formulir di bawah ini. Diskon 10% diberikan otomatis apabila durasi menginap lebih dari 3 malam. Seluruh pesanan dapat langsung ditinjau pada menu Riwayat Pemesanan.
            </p>
        </div>

        <form id="form_reservasi" action="{{ route('form.store') }}" method="POST" novalidate class="space-y-8">
            @csrf
            <!-- Hidden inputs untuk sinkronisasi nilai harga dan total bayar ke controller -->
            <input type="hidden" name="harga" id="harga_input" value="{{ old('harga', 500000) }}">
            <input type="hidden" name="total_bayar" id="total_bayar_input" value="{{ old('total_bayar', 0) }}">

            <!-- Kotak Peringatan Validasi Interaktif (JS) -->
            <div id="alert_kosong" role="alert" aria-live="assertive" class="items-start gap-3 bg-amber-50/90 border border-amber-300 text-amber-900 p-4 rounded-2xl shadow-sm">
                <i class="ph-fill ph-warning-circle text-xl text-amber-600 shrink-0 mt-0.5"></i>
                <div class="text-xs sm:text-sm flex-1">
                    <p class="font-bold">Mohon lengkapi data formulir berikut:</p>
                    <ul id="alert_list" class="mt-1.5 list-disc list-inside space-y-1 text-xs"></ul>
                </div>
                <button type="button" id="alert_tutup" class="text-amber-700 hover:text-amber-900 p-1 rounded-lg" aria-label="Tutup peringatan">
                    <i class="ph ph-x text-base"></i>
                </button>
            </div>

            <!-- Error Validasi dari Server Laravel -->
            @if(isset($errors) && $errors->any())
                <div role="alert" class="flex items-start gap-3 bg-rose-50 border border-rose-200 text-rose-800 p-4 rounded-2xl shadow-sm">
                    <i class="ph-fill ph-x-circle text-xl shrink-0 mt-0.5 text-rose-600"></i>
                    <div class="text-xs sm:text-sm">
                        <p class="font-bold">Pemesanan belum dapat diproses:</p>
                        <ul class="mt-1 list-disc list-inside space-y-0.5 text-xs">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- BAGIAN 1: DATA PEMESAN -->
            <section class="bg-white rounded-[2.5rem] p-6 sm:p-8 border border-[#e4d4be] shadow-sm space-y-6">
                <div class="flex items-center gap-2 border-b border-[#FAF7F2] pb-4">
                    <div class="w-7 h-7 rounded-full bg-[#f5ede2] text-[#B08D57] flex items-center justify-center font-bold text-xs">1</div>
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1E1A16]">Data Identitas Pemesan</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="nama" class="block text-xs font-bold text-[#635b52] uppercase tracking-wider mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" autocomplete="name"
                            class="w-full bg-[#FAF7F2] border border-[#e4d4be] rounded-2xl px-4 py-3.5 text-xs sm:text-sm text-[#1E1A16] outline-none focus:bg-white focus:border-[#B08D57] focus:ring-4 focus:ring-[#B08D57]/15 transition-all font-medium placeholder:text-[#8c8276]"
                            placeholder="Masukkan nama lengkap sesuai KTP" required>
                        <p id="error_nama" class="hidden text-rose-600 text-[11px] font-semibold mt-1.5 flex items-center gap-1">
                            <i class="ph-fill ph-warning-circle text-xs shrink-0"></i>
                            <span id="error_nama_text">Nama lengkap pemesan wajib diisi.</span>
                        </p>
                    </div>

                    <div>
                        <label for="nomor_identitas" class="block text-xs font-bold text-[#635b52] uppercase tracking-wider mb-2">
                            Nomor Identitas KTP (16 Digit) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nomor_identitas" id="nomor_identitas" value="{{ old('nomor_identitas') }}"
                            inputmode="numeric" maxlength="16"
                            class="w-full bg-[#FAF7F2] border border-[#e4d4be] rounded-2xl px-4 py-3.5 text-xs sm:text-sm text-[#1E1A16] outline-none focus:bg-white focus:border-[#B08D57] focus:ring-4 focus:ring-[#B08D57]/15 transition-all font-medium placeholder:text-[#8c8276]"
                            placeholder="Contoh: 3201012345678901" required>
                        <div class="flex items-center justify-between mt-1.5 text-[11px]">
                            <p id="error_ktp" class="hidden text-rose-600 font-semibold flex items-center gap-1">
                                <i class="ph-fill ph-warning-circle text-xs shrink-0"></i>
                                <span id="error_ktp_text">Nomor identitas (KTP) harus 16 digit.</span>
                            </p>
                            <span id="counter_ktp" class="ml-auto text-[#8c8276] font-bold font-mono">0 / 16 digit</span>
                        </div>
                    </div>
                </div>

                <!-- Jenis Kelamin -->
                <fieldset>
                    <legend class="block text-xs font-bold text-[#635b52] uppercase tracking-wider mb-2">
                        Jenis Kelamin <span class="text-red-500">*</span>
                    </legend>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" class="peer sr-only"
                                {{ old('jenis_kelamin', 'Laki-laki') === 'Laki-laki' ? 'checked' : '' }} required>
                            <div class="w-full text-center px-4 py-3.5 rounded-2xl border border-[#e4d4be] bg-[#FAF7F2] text-[#635b52] font-semibold text-xs sm:text-sm transition-all peer-checked:border-[#B08D57] peer-checked:bg-[#B08D57] peer-checked:text-white peer-checked:shadow-sm">
                                <i class="ph ph-gender-male mr-1 text-base"></i> Laki-laki
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" class="peer sr-only"
                                {{ old('jenis_kelamin') === 'Perempuan' ? 'checked' : '' }} required>
                            <div class="w-full text-center px-4 py-3.5 rounded-2xl border border-[#e4d4be] bg-[#FAF7F2] text-[#635b52] font-semibold text-xs sm:text-sm transition-all peer-checked:border-[#B08D57] peer-checked:bg-[#B08D57] peer-checked:text-white peer-checked:shadow-sm">
                                <i class="ph ph-gender-female mr-1 text-base"></i> Perempuan
                            </div>
                        </label>
                    </div>
                </fieldset>
            </section>

            <!-- BAGIAN 2: PILIHAN TIPE KAMAR DENGAN GAMBAR CONTOH & HARGA -->
            <section class="bg-white rounded-[2.5rem] p-6 sm:p-8 border border-[#e4d4be] shadow-sm space-y-6">
                <div class="flex items-center justify-between border-b border-[#FAF7F2] pb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-[#f5ede2] text-[#B08D57] flex items-center justify-center font-bold text-xs">2</div>
                        <h2 class="text-xs font-bold uppercase tracking-wider text-[#1E1A16]">Pilih Tipe Kamar &amp; Paket</h2>
                    </div>
                    <a href="{{ route('produk') }}" class="text-xs font-bold text-[#B08D57] hover:underline flex items-center gap-1">
                        <span>Lihat Rincian Fasilitas</span>
                        <i class="ph ph-arrow-up-right"></i>
                    </a>
                </div>

                <div class="space-y-4">
                    @php
                        $koleksiKamar = [
                            [
                                'tipe' => 'Standar',
                                'nama' => 'Standar Room',
                                'harga' => 500000,
                                'paket' => 'Smart Business Stay',
                                'deskripsi' => '24 m² &bull; 1 Queen Bed &bull; City View &bull; Smart TV 43" &bull; Rain Shower',
                                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=350&auto=format&fit=crop',
                            ],
                            [
                                'tipe' => 'Deluxe',
                                'nama' => 'Deluxe Room',
                                'harga' => 800000,
                                'paket' => 'Leisure Retreat Experience',
                                'deskripsi' => '36 m² &bull; 1 King Bed &bull; Balkon Privat &bull; Bathtub &bull; Mesin Nespresso',
                                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=350&auto=format&fit=crop',
                            ],
                            [
                                'tipe' => 'Executif',
                                'nama' => 'Executif Suite',
                                'harga' => 1200000,
                                'paket' => 'Presidential VIP Luxury Stay',
                                'deskripsi' => '54 m² &bull; Super King &bull; Living Room &bull; Bathtub Panoramik 180° &bull; Sky Lounge',
                                'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=350&auto=format&fit=crop',
                            ],
                        ];
                    @endphp

                    @foreach($koleksiKamar as $k)
                        <label class="room-card group block cursor-pointer rounded-3xl border border-[#e4d4be] bg-[#FAF7F2] p-4 sm:p-5 transition-all hover:border-[#B08D57] hover:bg-white">
                            <input
                                type="radio"
                                name="tipe_kamar"
                                value="{{ $k['tipe'] }}"
                                data-price="{{ $k['harga'] }}"
                                class="sr-only room-radio"
                                {{ old('tipe_kamar', 'Standar') === $k['tipe'] ? 'checked' : '' }}
                                required
                            >
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $k['image'] }}" alt="{{ $k['nama'] }}"
                                         class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl object-cover shrink-0 border border-[#e4d4be]">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h3 class="font-serif text-base sm:text-lg font-bold text-[#1E1A16] group-hover:text-[#B08D57] transition-colors">
                                                {{ $k['nama'] }}
                                            </h3>
                                        </div>
                                        <p class="text-[11px] font-semibold text-[#B08D57] mt-0.5">{{ $k['paket'] }}</p>
                                        <p class="text-xs text-[#635b52] mt-1 leading-relaxed">{!! $k['deskripsi'] !!}</p>
                                    </div>
                                </div>
                                <div class="sm:text-right shrink-0 w-full sm:w-auto pt-3 sm:pt-0 border-t sm:border-t-0 border-[#e4d4be]/60 flex sm:flex-col justify-between items-center sm:items-end">
                                    <span class="text-[10px] text-[#8c8276] uppercase font-bold sm:hidden">Tarif Kamar:</span>
                                    <div>
                                        <p class="font-serif text-lg sm:text-xl font-bold text-[#1E1A16]">
                                            Rp {{ number_format($k['harga'], 0, ',', '.') }}
                                        </p>
                                        <p class="text-[10px] font-medium text-[#8c8276] text-right">/ malam</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            </section>

            <!-- BAGIAN 3: DETAIL TANGGAL & DURASI MENGINAP -->
            <section class="bg-white rounded-[2.5rem] p-6 sm:p-8 border border-[#e4d4be] shadow-sm space-y-6">
                <div class="flex items-center gap-2 border-b border-[#FAF7F2] pb-4">
                    <div class="w-7 h-7 rounded-full bg-[#f5ede2] text-[#B08D57] flex items-center justify-center font-bold text-xs">3</div>
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#1E1A16]">Jadwal Menginap &amp; Layanan Tambahan</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="tanggal_pesan" class="block text-xs font-bold text-[#635b52] uppercase tracking-wider mb-2">
                            Tanggal Check-in <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_pesan" id="tanggal_pesan" value="{{ old('tanggal_pesan') }}"
                            class="w-full bg-[#FAF7F2] border border-[#e4d4be] rounded-2xl px-4 py-3.5 text-xs sm:text-sm text-[#1E1A16] outline-none focus:bg-white focus:border-[#B08D57] focus:ring-4 focus:ring-[#B08D57]/15 transition-all font-medium cursor-pointer" required>
                    </div>

                    <div>
                        <label for="durasi_input" class="block text-xs font-bold text-[#635b52] uppercase tracking-wider mb-2">
                            Durasi Menginap/Malam <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" name="durasi" id="durasi_input" value="{{ old('durasi', 1) }}" min="1" inputmode="numeric"
                                class="w-full bg-[#FAF7F2] border border-[#e4d4be] rounded-2xl px-4 py-3.5 pr-16 text-xs sm:text-sm text-[#1E1A16] outline-none focus:bg-white focus:border-[#B08D57] focus:ring-4 focus:ring-[#B08D57]/15 transition-all font-bold"
                                placeholder="1" required>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#8c8276] text-[10px] font-bold tracking-wider pointer-events-none">MALAM</span>
                        </div>
                        <p class="text-[11px] text-[#B08D57] font-semibold mt-1.5 flex items-center gap-1">
                            <i class="ph-fill ph-seal-percent"></i> Ketentuan: Menginap lebih dari 3 malam otomatis mendapat Diskon 10% untuk biaya kamar.
                        </p>

                        <!-- Banner Notifikasi Diskon Aktif -->
                        <div id="notif_diskon_banner" class="hidden mt-3 p-3.5 rounded-2xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-xs transition-all duration-300 shadow-xs flex items-center justify-between gap-3 animate-fade-in">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center text-lg shrink-0 shadow-xs">
                                    <i class="ph-fill ph-seal-percent"></i>
                                </div>
                                <div>
                                    <span class="font-bold text-emerald-950 block">Diskon Kamar 10% Berhasil Didapatkan! 🎉</span>
                                    <span class="text-[11px] text-emerald-800">
                                        Durasi <strong id="durasi_teks_notif">4</strong> malam memenuhi promo. Diskon kamar hemat <strong id="nominal_hemat_notif" class="font-extrabold text-emerald-950">Rp 0</strong>!
                                    </span>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 bg-emerald-600 text-white font-bold text-[10px] rounded-full shrink-0 shadow-xs">
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Opsi Tambahan Sarapan Buffet -->
                <label class="breakfast-card flex items-center gap-4 p-4 sm:p-5 rounded-2xl border border-[#e4d4be] bg-[#FAF7F2] cursor-pointer transition-all hover:border-[#B08D57] hover:bg-white">
                    <input type="checkbox" name="breakfast" id="breakfast_checkbox" value="Ya" class="sr-only" {{ old('breakfast') === 'Ya' ? 'checked' : '' }}>
                    <span class="w-12 h-12 rounded-2xl bg-[#f5ede2] text-[#B08D57] flex items-center justify-center text-2xl shrink-0">
                        <i class="ph ph-coffee"></i>
                    </span>
                    <span class="flex-1 min-w-0">
                        <span class="block font-bold text-[#1E1A16] text-xs sm:text-sm">Termasuk Sarapan Buffet (The Bigland Bistro)</span>
                        <span class="block text-[11px] text-[#635b52] mt-0.5">+ Rp 80.000 / malam &bull; Hidangan prasmanan internasional hangat &amp; pastry segar.</span>
                    </span>
                    <span class="check-indicator w-6 h-6 rounded-full border-2 border-[#e4d4be] flex items-center justify-center shrink-0 transition-colors" aria-hidden="true">
                        <i class="ph ph-check text-white text-xs check-icon"></i>
                    </span>
                </label>
            </section>

            <!-- BAGIAN 4: RINGKASAN PEMBAYARAN & TOMBOL AKSI -->
            <section class="bg-[#1E1A16] rounded-[2.5rem] p-6 sm:p-10 text-white shadow-2xl relative overflow-hidden border border-[#e4d4be]/30">
                <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-[#B08D57]/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 space-y-5">
                    <div class="border-b border-white/10 pb-3.5 flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#B08D57]"></span>
                            <span class="text-xs uppercase font-bold text-[#B08D57] tracking-wider">Ringkasan Estimasi Biaya</span>
                        </div>
                    </div>

                    <div class="space-y-2.5 text-xs sm:text-sm">
                        <div class="flex items-start justify-between gap-4">
                            <span class="text-stone-400">Tipe Kamar Terpilih</span>
                            <span id="ringkasan_kamar" class="font-semibold text-right">Standar Room - Rp 500.000 / malam</span>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-stone-400">Durasi Menginap</span>
                            <span id="ringkasan_durasi" class="font-semibold">1 malam</span>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-stone-400">Layanan Sarapan Buffet</span>
                            <span id="ringkasan_breakfast" class="font-semibold text-stone-300">Tidak ditambahkan</span>
                        </div>
                        <div id="baris_diskon" class="items-center justify-between gap-4 text-emerald-400">
                            <span class="flex items-center gap-1.5 font-bold">
                                <i class="ph-fill ph-seal-percent text-base"></i> Potongan Diskon Kamar (> 3 Malam - 10%)
                            </span>
                            <span id="ringkasan_diskon" class="font-bold">- Rp 0</span>
                        </div>
                    </div>

                    <!-- KOTAK TOTAL BIAYA PEMBAYARAN (Baris Penuh, Rapi & Tidak Terpotong) -->
                    <div class="border-t border-white/15 pt-5">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/[0.04] p-4 sm:p-5 rounded-2xl border border-white/10">
                            <div>
                                <span id="label_total" class="text-stone-400 text-[11px] font-bold uppercase tracking-wider block">
                                    Total Biaya Pembayaran
                                </span>
                                <p class="text-[11px] text-stone-400 mt-0.5">Sudah termasuk pajak &amp; biaya layanan</p>
                            </div>

                            <!-- 1. Belum Diklik: Placeholder Total Harga -->
                            <div id="box_total_placeholder" class="inline-flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl bg-white/5 border border-white/10 text-xs text-stone-300">
                                <div class="w-7 h-7 rounded-lg bg-[#B08D57]/20 text-[#B08D57] flex items-center justify-center text-sm shrink-0">
                                    <i class="ph-fill ph-calculator"></i>
                                </div>
                                <span class="text-xs text-stone-300" id="teks_placeholder_total">
                                    Klik tombol <strong class="text-[#f5ede2]">Hitung Total Bayar</strong> di bawah
                                </span>
                            </div>

                            <!-- 2. Sudah Diklik: Nilai Total Harga Baru Muncul -->
                            <div id="box_total_nilai" class="hidden items-baseline gap-2">
                                <span class="text-xl font-serif text-[#B08D57]">Rp</span>
                                <span id="ringkasan_total" class="font-serif text-3xl sm:text-4xl font-bold text-white tracking-tight">0</span>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL AKSI: GRID 3 KOLOM RESPONSIF (Hitung Total Bayar, Simpan, Cancel) -->
                    <div class="pt-2">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                            <!-- Tombol 1: Hitung Total Bayar -->
                            <button type="button" id="btn_hitung_total" onclick="klikHitungTotal()"
                                class="w-full py-4 px-4 bg-[#B08D57] hover:bg-[#9c7743] active:bg-[#866535] text-white rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-200 flex items-center justify-center gap-2 shadow-lg shadow-[#B08D57]/30 hover:scale-[1.02] active:scale-95 cursor-pointer">
                                <i class="ph-fill ph-calculator text-base sm:text-lg"></i>
                                <span>Hitung Total Bayar</span>
                            </button>

                            <!-- Tombol 2: Konfirmasi & Simpan Pesanan -->
                            <button type="submit" id="btn_simpan_pesanan"
                                class="w-full py-4 px-4 bg-white/10 hover:bg-emerald-600 active:bg-emerald-700 text-white rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-200 flex items-center justify-center gap-2 border border-white/20 hover:border-emerald-500 hover:scale-[1.02] active:scale-95 cursor-pointer shadow-lg">
                                <i class="ph-fill ph-check-circle text-base sm:text-lg text-emerald-400"></i>
                                <span>Simpan Pesanan</span>
                            </button>

                            <!-- Tombol 3: Cancel -->
                            <button type="button" id="btn_cancel" onclick="batalPemesanan()"
                                class="w-full py-4 px-4 bg-white/5 hover:bg-rose-600/90 active:bg-rose-700 text-stone-300 hover:text-white rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-200 flex items-center justify-center gap-2 border border-white/15 hover:border-rose-500 hover:scale-[1.02] active:scale-95 cursor-pointer shadow-md">
                                <i class="ph-bold ph-x-circle text-base sm:text-lg text-rose-400"></i>
                                <span>Cancel</span>
                            </button>
                        </div>
                        <p class="text-center text-[11px] text-stone-400 mt-3 flex items-center justify-center gap-1.5">
                            <i class="ph ph-shield-check text-[#B08D57] text-sm"></i>
                            <span>Pemesanan langsung tersimpan ke riwayat tanpa harus login</span>
                        </p>
                    </div>
                </div>
            </section>
        </form>

    </main>

    <!-- FOOTER LUXURY BIGLAND -->
    <footer class="bg-white border-t border-[#e4d4be] pt-12 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 text-center text-xs text-[#8c8276] space-y-2">
            <p>&copy; 2026 Bigland Hotel &amp; Suites. All rights reserved.</p>
            <p>Jl. MH Thamrin No. 28, Menteng, Jakarta Pusat &bull; Telp: +62 (21) 3988-7700 &bull; Email: reservasi@bigland.com</p>
        </div>
    </footer>

    <!-- INTERACTIVE JAVASCRIPT LOGIC -->
    <script>
        const MAX_TANPA_DISKON = 3;
        const PERSEN_DISKON = 0.10;
        const HARGA_BREAKFAST = 80000;

        const form = document.getElementById('form_reservasi');
        const inputNama = document.getElementById('nama');
        const inputIdentitas = document.getElementById('nomor_identitas');
        const inputTanggal = document.getElementById('tanggal_pesan');
        const inputDurasi = document.getElementById('durasi_input');
        const checkBreakfast = document.getElementById('breakfast_checkbox');
        const roomRadios = document.querySelectorAll('.room-radio');
        const inputHarga = document.getElementById('harga_input');
        const inputTotal = document.getElementById('total_bayar_input');

        const elKamar = document.getElementById('ringkasan_kamar');
        const elDurasi = document.getElementById('ringkasan_durasi');
        const elBreakfast = document.getElementById('ringkasan_breakfast');
        const elDiskon = document.getElementById('ringkasan_diskon');
        const elTotal = document.getElementById('ringkasan_total');
        const elLabelTotal = document.getElementById('label_total');
        const barisDiskon = document.getElementById('baris_diskon');

        const alertKosong = document.getElementById('alert_kosong');
        const alertList = document.getElementById('alert_list');

        const boxTotalPlaceholder = document.getElementById('box_total_placeholder');
        const boxTotalNilai = document.getElementById('box_total_nilai');
        const teksPlaceholderTotal = document.getElementById('teks_placeholder_total');
        const btnHitungTotal = document.getElementById('btn_hitung_total');

        const rupiah = (angka) => 'Rp ' + Number(angka).toLocaleString('id-ID');
        const angkaDari = (nilai) => parseInt(nilai, 10) || 0;

        // Flag: Total hanya muncul jika tombol Hitung Total telah diklik
        let totalSudahDihitung = false;
        let diskonAktifSebelumnya = false;
        let toastDiskonTimer = null;
        let toastValidasiTimer = null;

        // Set batas tanggal check-in minimal hari ini
        const today = new Date().toISOString().split('T')[0];
        inputTanggal.min = today;
        if (!inputTanggal.value) {
            inputTanggal.value = today;
        }

        function kamarTerpilih() {
            return document.querySelector('.room-radio:checked');
        }

        // --- SISTEM NOTIFIKASI TOAST POP-UP ---

        // 1. Toast Diskon 10%
        function bukaToastDiskon() {
            const toastNotif = document.getElementById('toast_diskon');
            if (!toastNotif) return;
            toastNotif.classList.remove('-translate-y-6', 'opacity-0', 'pointer-events-none');
            toastNotif.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');

            clearTimeout(toastDiskonTimer);
            toastDiskonTimer = setTimeout(() => {
                tutupToastDiskon();
            }, 5000);
        }

        function tutupToastDiskon() {
            const toastNotif = document.getElementById('toast_diskon');
            if (!toastNotif) return;
            toastNotif.classList.add('-translate-y-6', 'opacity-0', 'pointer-events-none');
            toastNotif.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
        }

        // 2. Toast Peringatan Validasi (Nama & KTP < 16 Digit)
        function bukaToastValidasi(judul, pesan, isSuccess = false) {
            const toast = document.getElementById('toast_validasi');
            const elJudul = document.getElementById('toast_validasi_judul');
            const elPesan = document.getElementById('toast_validasi_pesan');
            const iconBox = document.getElementById('toast_validasi_icon_box');
            const icon = document.getElementById('toast_validasi_icon');
            if (!toast) return;

            elJudul.textContent = judul;
            elPesan.textContent = pesan;

            if (isSuccess) {
                toast.classList.remove('border-rose-500');
                toast.classList.add('border-emerald-500');
                iconBox.classList.remove('bg-rose-100', 'text-rose-600');
                iconBox.classList.add('bg-emerald-100', 'text-emerald-700');
                icon.className = 'ph-fill ph-check-circle';
            } else {
                toast.classList.remove('border-emerald-500');
                toast.classList.add('border-rose-500');
                iconBox.classList.remove('bg-emerald-100', 'text-emerald-700');
                iconBox.classList.add('bg-rose-100', 'text-rose-600');
                icon.className = 'ph-fill ph-warning-circle';
            }

            toast.classList.remove('-translate-y-6', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');

            clearTimeout(toastValidasiTimer);
            toastValidasiTimer = setTimeout(() => {
                tutupToastValidasi();
            }, 6000);
        }

        function tutupToastValidasi() {
            const toast = document.getElementById('toast_validasi');
            if (!toast) return;
            toast.classList.add('-translate-y-6', 'opacity-0', 'pointer-events-none');
            toast.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
        }

        // --- SISTEM VALIDASI REAL-TIME NAMA & KTP ---

        function updateKtpCounter() {
            // Hanya izinkan angka dan batasi maksimal 16 digit
            const val = inputIdentitas.value.replace(/\D/g, '').slice(0, 16);
            inputIdentitas.value = val;
            const counter = document.getElementById('counter_ktp');
            const errKtp = document.getElementById('error_ktp');
            const errKtpText = document.getElementById('error_ktp_text');

            if (counter) {
                counter.textContent = val.length + ' / 16 digit';
                if (val.length === 16) {
                    counter.className = 'ml-auto text-emerald-600 font-bold font-mono';
                    inputIdentitas.classList.remove('border-rose-400');
                    inputIdentitas.classList.add('border-emerald-400');
                    if (errKtp) errKtp.classList.add('hidden');
                } else if (val.length > 0) {
                    counter.className = 'ml-auto text-amber-600 font-bold font-mono';
                    inputIdentitas.classList.remove('border-emerald-400');
                } else {
                    counter.className = 'ml-auto text-[#8c8276] font-bold font-mono';
                    inputIdentitas.classList.remove('border-emerald-400', 'border-rose-400');
                }
            }
        }

        inputIdentitas.addEventListener('input', updateKtpCounter);

        inputIdentitas.addEventListener('blur', function () {
            const val = inputIdentitas.value.replace(/\D/g, '');
            if (val.length > 0 && val.length < 16) {
                bukaToastValidasi(
                    'Nomor KTP Belum 16 Digit',
                    'Nomor KTP baru ' + val.length + ' digit (kurang ' + (16 - val.length) + ' digit lagi). KTP harus terdiri dari tepat 16 digit angka.'
                );
                const errKtp = document.getElementById('error_ktp');
                const errKtpText = document.getElementById('error_ktp_text');
                if (errKtp) {
                    errKtp.classList.remove('hidden');
                    errKtpText.textContent = 'KTP baru ' + val.length + ' digit (kurang ' + (16 - val.length) + ' digit lagi).';
                }
                inputIdentitas.classList.add('border-rose-400');
            }
        });

        inputNama.addEventListener('input', function () {
            const errNama = document.getElementById('error_nama');
            if (inputNama.value.trim().length > 0) {
                if (errNama) errNama.classList.add('hidden');
                inputNama.classList.remove('border-rose-400');
            }
        });

        inputNama.addEventListener('blur', function () {
            if (!inputNama.value.trim()) {
                const errNama = document.getElementById('error_nama');
                if (errNama) errNama.classList.remove('hidden');
                inputNama.classList.add('border-rose-400');
            }
        });

        // Validasi identitas pemesan (Nama & KTP)
        function validasiDataPemesan(tampilkanNotif = true) {
            let valid = true;
            const namaVal = inputNama.value.trim();
            const ktpVal = inputIdentitas.value.replace(/\D/g, '');
            const errNama = document.getElementById('error_nama');
            const errKtp = document.getElementById('error_ktp');
            const errKtpText = document.getElementById('error_ktp_text');

            // 1. Cek Nama Pemesan
            if (!namaVal) {
                valid = false;
                if (errNama) errNama.classList.remove('hidden');
                inputNama.classList.add('border-rose-400');
                if (tampilkanNotif) {
                    bukaToastValidasi('Nama Belum Diisi', 'Silakan isi nama lengkap pemesan sesuai KTP terlebih dahulu.');
                    inputNama.focus();
                    return false;
                }
            } else {
                if (errNama) errNama.classList.add('hidden');
                inputNama.classList.remove('border-rose-400');
            }

            // 2. Cek Nomor KTP
            if (!ktpVal) {
                valid = false;
                if (errKtp) {
                    errKtp.classList.remove('hidden');
                    errKtpText.textContent = 'Nomor identitas (KTP) wajib diisi.';
                }
                inputIdentitas.classList.add('border-rose-400');
                if (tampilkanNotif) {
                    bukaToastValidasi('KTP Belum Diisi', 'Nomor identitas (KTP) wajib diisi (16 digit angka).');
                    inputIdentitas.focus();
                    return false;
                }
            } else if (ktpVal.length < 16) {
                valid = false;
                if (errKtp) {
                    errKtp.classList.remove('hidden');
                    errKtpText.textContent = 'Nomor KTP baru ' + ktpVal.length + ' digit (kurang ' + (16 - ktpVal.length) + ' digit lagi).';
                }
                inputIdentitas.classList.add('border-rose-400');
                if (tampilkanNotif) {
                    bukaToastValidasi(
                        'KTP Kurang dari 16 Digit',
                        'Nomor KTP baru ' + ktpVal.length + ' digit (kurang ' + (16 - ktpVal.length) + ' digit lagi). KTP harus terdiri dari tepat 16 digit angka!'
                    );
                    inputIdentitas.focus();
                    return false;
                }
            } else {
                if (errKtp) errKtp.classList.add('hidden');
                inputIdentitas.classList.remove('border-rose-400');
            }

            return valid;
        }

        // --- SISTEM PERHITUNGAN TOTAL HARGA (HANYA MUNCUL JIKA TOMBOL DIKLIK) ---

        // Fungsi reset: menyembunyikan total harga jika input/pilihan kamar/durasi diubah
        function resetHitungTotal() {
            totalSudahDihitung = false;
            if (boxTotalPlaceholder) {
                boxTotalPlaceholder.classList.remove('hidden');
                if (teksPlaceholderTotal) {
                    teksPlaceholderTotal.innerHTML = 'Pilihan telah diubah. Silakan klik tombol <strong class="text-white">Hitung Total</strong> untuk melihat total harga.';
                }
            }
            if (boxTotalNilai) {
                boxTotalNilai.classList.add('hidden');
                boxTotalNilai.classList.remove('flex');
            }
            inputTotal.value = 0;
            elTotal.textContent = '0';

            const btnSimpan = document.getElementById('btn_simpan_pesanan');
            if (btnSimpan) {
                btnSimpan.classList.add('bg-white/10', 'border-white/20');
                btnSimpan.classList.remove('bg-emerald-600', 'border-emerald-400/40', 'hover:bg-emerald-500', 'ring-2', 'ring-emerald-400/50');
            }

            const bannerNotif = document.getElementById('notif_diskon_banner');
            if (bannerNotif) bannerNotif.classList.add('hidden');
            tutupToastDiskon();
        }

        roomRadios.forEach((radio) => radio.addEventListener('change', resetHitungTotal));
        inputDurasi.addEventListener('input', resetHitungTotal);
        checkBreakfast.addEventListener('change', resetHitungTotal);

        // Eksekusi perhitungan saat tombol "Hitung Total" ditekan
        function klikHitungTotal() {
            // 1. Validasi Nama & KTP (wajib diisi & KTP minimal 16 digit)
            if (!validasiDataPemesan(true)) {
                return false;
            }

            // 2. Lakukan perhitungan harga
            const radio = kamarTerpilih();
            const harga = radio ? angkaDari(radio.dataset.price) : 500000;
            const durasi = Math.max(1, angkaDari(inputDurasi.value));
            const breakfast = checkBreakfast.checked ? HARGA_BREAKFAST : 0;

            const totalKamar = harga * durasi;
            const totalSarapan = breakfast * durasi;
            const adaDiskon = durasi > MAX_TANPA_DISKON;
            // Diskon 10% HANYA dihitung dari tarif sewa kamar hotel (sarapan tidak kena diskon)
            const diskon = adaDiskon ? Math.round(totalKamar * PERSEN_DISKON) : 0;
            const totalKamarSetelahDiskon = totalKamar - diskon;
            const total = totalKamarSetelahDiskon + totalSarapan;

            inputHarga.value = harga;
            inputTotal.value = total;

            elKamar.textContent = radio ? (radio.value + ' Room - ' + rupiah(harga) + ' / malam') : 'Standar Room - ' + rupiah(500000) + ' / malam';
            elDurasi.textContent = durasi + ' malam';
            elBreakfast.textContent = checkBreakfast.checked ? ('+ ' + rupiah(HARGA_BREAKFAST) + ' / malam (' + rupiah(totalSarapan) + ')') : 'Tidak ditambahkan';
            elDiskon.textContent = '- ' + rupiah(diskon);
            elTotal.textContent = total.toLocaleString('id-ID');
            elLabelTotal.textContent = adaDiskon ? 'Total Setelah Diskon Kamar 10%' : 'Total Biaya Pembayaran';
            barisDiskon.classList.toggle('aktif', adaDiskon);

            // 3. Tampilkan total harga ke layar (Hanya setelah tombol diklik)
            totalSudahDihitung = true;
            if (boxTotalPlaceholder) boxTotalPlaceholder.classList.add('hidden');
            if (boxTotalNilai) {
                boxTotalNilai.classList.remove('hidden');
                boxTotalNilai.classList.add('flex');
            }

            // Aktifkan tampilan tombol simpan pesanan dengan highlight hijau mewah
            const btnSimpan = document.getElementById('btn_simpan_pesanan');
            if (btnSimpan) {
                btnSimpan.classList.remove('bg-white/10', 'border-white/20');
                btnSimpan.classList.add('bg-emerald-600', 'border-emerald-400/40', 'hover:bg-emerald-500', 'ring-2', 'ring-emerald-400/50');
            }

            // 4. Pengelolaan notifikasi promo diskon 10%
            const bannerNotif = document.getElementById('notif_diskon_banner');
            const durasiTeksNotif = document.getElementById('durasi_teks_notif');
            const nominalHematNotif = document.getElementById('nominal_hemat_notif');
            const toastDurasiTeks = document.getElementById('toast_durasi_teks');
            const toastNominalDiskon = document.getElementById('toast_nominal_diskon');

            if (adaDiskon) {
                if (bannerNotif) {
                    bannerNotif.classList.remove('hidden');
                    if (durasiTeksNotif) durasiTeksNotif.textContent = durasi;
                    if (nominalHematNotif) nominalHematNotif.textContent = rupiah(diskon);
                }
                if (toastDurasiTeks) toastDurasiTeks.textContent = durasi + ' malam';
                if (toastNominalDiskon) toastNominalDiskon.textContent = rupiah(diskon);

                bukaToastDiskon();
                diskonAktifSebelumnya = true;
            } else {
                if (bannerNotif) bannerNotif.classList.add('hidden');
                tutupToastDiskon();
                diskonAktifSebelumnya = false;
                bukaToastValidasi('Total Berhasil Dihitung', 'Total biaya pembayaran adalah ' + rupiah(total), true);
            }
        }

        // Tampilkan kotak peringatan daftar validasi
        function tampilkanAlert(pesan) {
            alertList.innerHTML = '';
            pesan.forEach((teks) => {
                const li = document.createElement('li');
                li.textContent = teks;
                alertList.appendChild(li);
            });
            alertKosong.classList.add('tampil');
            alertKosong.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        document.getElementById('alert_tutup').addEventListener('click', function () {
            alertKosong.classList.remove('tampil');
        });

        // Validasi Submit Formulir Pemesanan
        form.addEventListener('submit', function (e) {
            // 1. Validasi Nama dan KTP (16 digit)
            if (!validasiDataPemesan(true)) {
                e.preventDefault();
                return false;
            }

            // 2. Validasi: Total HARUS sudah dihitung lewat tombol Hitung Total
            if (!totalSudahDihitung || angkaDari(inputTotal.value) <= 0) {
                e.preventDefault();
                bukaToastValidasi(
                    'Perhitungan Total Diperlukan',
                    'Silakan klik tombol "Hitung Total" terlebih dahulu untuk melihat dan mengonfirmasi total harga sebelum menyimpan pesanan!'
                );
                if (btnHitungTotal) {
                    btnHitungTotal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    btnHitungTotal.classList.add('ring-4', 'ring-[#B08D57]', 'scale-105');
                    setTimeout(() => {
                        btnHitungTotal.classList.remove('ring-4', 'ring-[#B08D57]', 'scale-105');
                    }, 2000);
                }
                return false;
            }

            // 3. Validasi kelengkapan data lain
            const belum = [];
            if (!document.querySelector('input[name="jenis_kelamin"]:checked')) {
                belum.push('Jenis kelamin harus dipilih.');
            }
            if (!kamarTerpilih()) {
                belum.push('Tipe kamar wajib dipilih.');
            }
            if (!inputTanggal.value) {
                belum.push('Tanggal check-in wajib dipilih.');
            }
            if (angkaDari(inputDurasi.value) < 1) {
                belum.push('Durasi menginap minimal 1 malam.');
            }

            if (belum.length > 0) {
                e.preventDefault();
                tampilkanAlert(belum);
                return false;
            }
        });

        // Sinkronisasi URL Parameters dari Quick Booking atau Produk Cards
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('tgl')) {
            inputTanggal.value = urlParams.get('tgl');
        }
        if (urlParams.has('durasi')) {
            inputDurasi.value = urlParams.get('durasi');
        }
        if (urlParams.has('tipe')) {
            const tipeParam = urlParams.get('tipe');
            const radio = document.querySelector('.room-radio[value="' + tipeParam + '"]');
            if (radio) radio.checked = true;
        }

        // Jalankan penghitung KTP awal (jika ada nilai old)
        updateKtpCounter();

        // Fungsi Tombol Cancel / Batal Pemesanan (Reset Formulir)
        function batalPemesanan() {
            // 1. Reset isian form HTML
            form.reset();

            // 2. Kembalikan tanggal check-in ke hari ini
            inputTanggal.value = today;

            // 3. Kembalikan pilihan tipe kamar ke Standar
            const defaultRadio = document.querySelector('.room-radio[value="Standar"]');
            if (defaultRadio) {
                defaultRadio.checked = true;
            }

            // 4. Kembalikan durasi ke 1 malam
            inputDurasi.value = 1;

            // 5. Uncheck breakfast
            if (checkBreakfast) {
                checkBreakfast.checked = false;
            }

            // 6. Reset ringkasan biaya estimasi
            if (elKamar) elKamar.textContent = 'Standar Room - Rp 500.000 / malam';
            if (elDurasi) elDurasi.textContent = '1 malam';
            if (elBreakfast) elBreakfast.textContent = 'Tidak ditambahkan';
            if (elDiskon) elDiskon.textContent = '- Rp 0';
            if (barisDiskon) barisDiskon.classList.remove('aktif');

            // 7. Reset status hitung total
            resetHitungTotal();
            if (teksPlaceholderTotal) {
                teksPlaceholderTotal.innerHTML = 'Klik tombol <strong class="text-[#f5ede2]">Hitung Total Bayar</strong> di bawah';
            }

            // 8. Bersihkan indikator & pesan error validasi
            updateKtpCounter();
            const errNama = document.getElementById('error_nama');
            const errKtp = document.getElementById('error_ktp');
            if (errNama) errNama.classList.add('hidden');
            if (errKtp) errKtp.classList.add('hidden');
            if (inputNama) inputNama.classList.remove('border-rose-400');
            if (inputIdentitas) inputIdentitas.classList.remove('border-rose-400', 'border-emerald-400');
            if (alertKosong) alertKosong.classList.remove('tampil');

            // 9. Berikan notifikasi toast konfirmasi pembatalan
            bukaToastValidasi('Formulir Dibatalkan', 'Seluruh isian formulir berhasil direset ke kondisi awal.', true);

            // 10. Scroll kembali ke atas formulir
            window.scrollTo({ top: form.offsetTop - 120, behavior: 'smooth' });
        }
    </script>
</body>

</html>
