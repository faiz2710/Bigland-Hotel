<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk &amp; Invoice Reservasi #{{ str_pad($pesanan->id, 5, '0', STR_PAD_LEFT) }} - Bigland Hotel &amp; Suites</title>

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
        href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128+Text&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        mono: ['"Space Mono"', 'monospace'],
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

        /* Efek gerigi tepi struk struk kertas mewah */
        .receipt-sawtooth-bottom {
            background-image: radial-gradient(circle at 10px 0, transparent 10px, #ffffff 11px);
            background-size: 20px 20px;
            background-repeat: repeat-x;
            background-position: bottom;
        }

        @media print {
            body {
                background-color: white !important;
                color: black !important;
                padding: 0 !important;
            }
            .no-print, header, nav, footer, .floating-nav, #action_buttons, #alert_success {
                display: none !important;
            }
            main {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                max-width: 100% !important;
            }
            .receipt-card {
                box-shadow: none !important;
                border: 1px solid #1E1A16 !important;
                margin: 0 auto !important;
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body class="selection:bg-[#f5ede2] selection:text-[#1E1A16] font-sans antialiased bg-[#FAF7F2] min-h-screen flex flex-col">

    <!-- FLOATING PILL NAVBAR COMPONENT (Disembunyikan saat mencetak) -->
    <div class="no-print">
        <x-navbar />
    </div>

    @php
        $biayaKamarSaja = (int) $pesanan->harga * (int) $pesanan->durasi;
        $adaDiskon = (int) $pesanan->diskon > 0;
        $biayaKamarSetelahDiskon = $biayaKamarSaja - (int) $pesanan->diskon;
        $totalBayar = (int) $pesanan->total_bayar;
        $biayaBreakfast = max(0, $totalBayar - $biayaKamarSetelahDiskon);
        $adaBreakfast = $biayaBreakfast > 0;
        $subtotalTanpaDiskon = $biayaKamarSaja + $biayaBreakfast;
        $nomorInvoice = 'INV-BGL-' . \Carbon\Carbon::parse($pesanan->created_at)->format('Ymd') . '-' . str_pad($pesanan->id, 4, '0', STR_PAD_LEFT);
    @endphp

    <!-- MAIN INVOICE CONTAINER -->
    <main class="flex-1 pt-28 sm:pt-36 pb-20 px-4 sm:px-6 max-w-3xl mx-auto w-full">

        <!-- Banner Notifikasi Sukses Pemesanan (Hanya Tampil di Layar) -->
        <div id="alert_success" class="no-print mb-6 bg-emerald-950 text-white p-4 sm:p-5 rounded-2xl sm:rounded-3xl shadow-xl border border-emerald-500/30 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-xl shrink-0 shadow-md shadow-emerald-500/25">
                    <i class="ph-bold ph-check"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-emerald-300">Pemesanan Kamar Berhasil Dikonfirmasi!</h3>
                    <p class="text-xs text-emerald-100/90 mt-0.5">
                        Data reservasi Anda telah tercatat ke dalam sistem. Struk di bawah ini adalah tanda bukti pemesanan resmi Anda.
                    </p>
                </div>
            </div>
            <button onclick="window.print()" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-white/10 hover:bg-white/20 text-xs font-semibold text-white border border-white/20 transition-all shrink-0">
                <i class="ph ph-printer text-sm"></i>
                <span>Cetak</span>
            </button>
        </div>

        <!-- STRUK / RECEIPT CARD FORMAL HOTEL -->
        <div class="receipt-card bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-[#e4d4be] shadow-[0_20px_60px_-15px_rgba(30,26,22,0.08)] overflow-hidden transition-all relative">
            
            <!-- Aksen Header Pita Emas -->
            <div class="h-2.5 bg-gradient-to-r from-[#8a6635] via-[#B08D57] to-[#e4d4be]"></div>

            <div class="p-6 sm:p-10">

                <!-- 1. HEADER STRUK RESMI HOTEL -->
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6 pb-6 border-b border-[#e4d4be]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-[#B08D57] text-white flex items-center justify-center text-3xl shadow-lg shadow-[#B08D57]/20 shrink-0">
                            <i class="ph-fill ph-buildings"></i>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h1 class="font-serif text-2xl sm:text-3xl font-bold text-[#1E1A16] tracking-tight">
                                    Bigland Hotel
                                </h1>
                            </div>
                            <p class="text-[11px] text-[#635b52] mt-1 leading-relaxed">
                                Jl. MH Thamrin No. 28, Menteng, Jakarta Pusat 10350<br>
                                Telp: +62 (21) 3988-7700 &bull; Email: reservasi@bigland.com
                            </p>
                        </div>
                    </div>

                    <!-- Badge Status Lunas & Nomor Struk -->
                    <div class="text-left sm:text-right shrink-0 bg-[#FAF7F2] sm:bg-transparent p-3 sm:p-0 rounded-2xl border sm:border-0 border-[#e4d4be]/60">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold border border-emerald-300">
                            <i class="ph-fill ph-seal-check text-sm text-emerald-600"></i>
                            <span>LUNAS / TERKONFIRMASI</span>
                        </div>
                        <div class="mt-2.5">
                            <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Nomor Invoice</span>
                            <span class="font-mono text-xs sm:text-sm font-bold text-[#1E1A16] block tracking-wide">
                                {{ $nomorInvoice }}
                            </span>
                        </div>
                        <span class="text-[10px] text-[#8c8276] mt-0.5 block">
                            Waktu Transaksi: {{ \Carbon\Carbon::parse($pesanan->created_at)->format('d/m/Y - H:i') }} WIB
                        </span>
                    </div>
                </div>

                <!-- 2. GARIS PUTUS-PUTUS PERFORASI STRUK KERTAS -->
                <div class="relative flex items-center justify-center my-6">
                    <div class="border-b-2 border-dashed border-[#e4d4be] w-full"></div>
                    <span class="absolute px-3 bg-white text-[10px] font-mono uppercase tracking-widest text-[#8c8276] flex items-center gap-1.5">
                        <i class="ph ph-receipt"></i> Bukti Reservasi
                    </span>
                </div>

                <!-- 3. DUA KOLOM: DATA TAMU & JADWAL MENGINAP -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-[#FAF7F2] p-5 sm:p-6 rounded-2xl border border-[#e4d4be]/80">
                    
                    <!-- Kolom Kiri: Data Pemesan -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-bold text-[#B08D57] uppercase tracking-wider">
                            <i class="ph ph-user text-sm"></i>
                            <span>Data Tamu Pemesan</span>
                        </div>
                        <div class="space-y-1.5 text-xs">
                            <div>
                                <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Nama Lengkap:</span>
                                <span class="font-bold text-[#1E1A16] text-sm">{{ $pesanan->nama }}</span>
                            </div>
                            <div>
                                <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Nomor Identitas (KTP):</span>
                                <span class="font-mono font-bold text-[#1E1A16] tracking-wider">{{ $pesanan->nomor_identitas }}</span>
                            </div>
                            <div>
                                <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Jenis Kelamin:</span>
                                <span class="font-semibold text-[#1E1A16]">{{ $pesanan->jenis_kelamin }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Jadwal & Kamar -->
                    <div class="space-y-3 sm:border-l sm:border-[#e4d4be] sm:pl-6">
                        <div class="flex items-center gap-2 text-xs font-bold text-[#B08D57] uppercase tracking-wider">
                            <i class="ph ph-calendar-check text-sm"></i>
                            <span>Informasi Kamar &amp; Waktu</span>
                        </div>
                        <div class="space-y-1.5 text-xs">
                            <div>
                                <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Tipe Kamar:</span>
                                <span class="font-serif font-bold text-[#1E1A16] text-sm">{{ $pesanan->tipe_kamar }} Room</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Check-in:</span>
                                    <span class="font-semibold text-[#1E1A16]">{{ \Carbon\Carbon::parse($pesanan->tanggal_pesan)->format('d M Y') }}</span>
                                </div>
                                <div>
                                    <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Check-out:</span>
                                    <span class="font-semibold text-[#1E1A16]">{{ \Carbon\Carbon::parse($pesanan->tanggal_pesan)->addDays($pesanan->durasi)->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[#8c8276] block text-[10px] uppercase font-semibold">Durasi Menginap:</span>
                                <span class="font-bold text-[#1E1A16]">{{ $pesanan->durasi }} Malam</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 4. TABEL RINCIAN BIAYA STRUK (RECEIPT BREAKDOWN) -->
                <div class="mt-6">
                    <h3 class="text-xs font-bold text-[#B08D57] uppercase tracking-wider mb-3 flex items-center gap-2">
                        <i class="ph ph-receipt text-sm"></i> Rincian Pembayaran
                    </h3>

                    <div class="border border-[#e4d4be] rounded-2xl overflow-hidden">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-[#FAF7F2] text-[#8c8276] font-bold text-[10px] uppercase tracking-wider border-b border-[#e4d4be]">
                                <tr>
                                    <th class="py-3 px-4">Deskripsi Layanan</th>
                                    <th class="py-3 px-4 text-center">Qty / Durasi</th>
                                    <th class="py-3 px-4 text-right">Tarif Satuan</th>
                                    <th class="py-3 px-4 text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e4d4be]/60">
                                <!-- Baris Kamar -->
                                <tr class="hover:bg-[#FAF7F2]/50">
                                    <td class="py-3.5 px-4 font-semibold text-[#1E1A16]">
                                        Sewa Kamar: {{ $pesanan->tipe_kamar }} Room
                                        <span class="block text-[11px] text-[#8c8276] font-normal">Fasilitas lengkap sesuai paket kamar</span>
                                    </td>
                                    <td class="py-3.5 px-4 text-center text-[#635b52]">{{ $pesanan->durasi }} Malam</td>
                                    <td class="py-3.5 px-4 text-right text-[#635b52]">Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                                    <td class="py-3.5 px-4 text-right font-semibold text-[#1E1A16]">
                                        Rp {{ number_format($biayaKamarSaja, 0, ',', '.') }}
                                    </td>
                                </tr>

                                <!-- Baris Sarapan Buffet -->
                                <tr class="hover:bg-[#FAF7F2]/50">
                                    <td class="py-3 px-4 font-semibold text-[#1E1A16]">
                                        Layanan Sarapan Pagi (Buffet Breakfast)
                                        <span class="block text-[11px] text-[#8c8276] font-normal">
                                            {{ $adaBreakfast ? 'Buffet all-you-can-eat untuk seluruh tamu' : 'Tidak diambil (Room Only)' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center text-[#635b52]">{{ $adaBreakfast ? $pesanan->durasi . ' Hari' : '-' }}</td>
                                    <td class="py-3 px-4 text-right text-[#635b52]">{{ $adaBreakfast ? 'Rp 80.000' : 'Rp 0' }}</td>
                                    <td class="py-3 px-4 text-right font-semibold text-[#1E1A16]">
                                        {{ $adaBreakfast ? 'Rp ' . number_format($biayaBreakfast, 0, ',', '.') : 'Rp 0' }}
                                    </td>
                                </tr>

                                <!-- Subtotal -->
                                <tr class="bg-[#FAF7F2]/60">
                                    <td colspan="3" class="py-2.5 px-4 text-right font-semibold text-[#635b52] text-xs">
                                        Subtotal Biaya
                                    </td>
                                    <td class="py-2.5 px-4 text-right font-semibold text-[#1E1A16]">
                                        Rp {{ number_format($subtotalTanpaDiskon, 0, ',', '.') }}
                                    </td>
                                </tr>

                                <!-- Diskon Jika Ada -->
                                @if($adaDiskon)
                                <tr class="bg-emerald-50/70 text-emerald-800">
                                    <td colspan="3" class="py-2.5 px-4 text-right font-bold text-xs">
                                        <span class="inline-flex items-center gap-1">
                                            <i class="ph-fill ph-seal-percent text-sm"></i>
                                            Diskon Spesial Kamar (> 3 Malam - 10%)
                                        </span>
                                        <span class="block text-[10px] text-emerald-600 font-normal">Diskon 10% dihitung khusus dari total tarif sewa kamar</span>
                                    </td>
                                    <td class="py-2.5 px-4 text-right font-bold text-emerald-700">
                                        - Rp {{ number_format($pesanan->diskon, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endif

                                <!-- Pajak & Layanan -->
                                <tr>
                                    <td colspan="3" class="py-2 px-4 text-right text-[11px] text-[#8c8276]">
                                        Pajak Pemerintah (PB1 10%) &amp; Biaya Layanan (Service Charge)
                                    </td>
                                    <td class="py-2 px-4 text-right text-[11px] text-emerald-700 font-semibold">
                                        Termasuk (Nett)
                                    </td>
                                </tr>

                                <!-- TOTAL BAYAR -->
                                <tr class="bg-[#1E1A16] text-white">
                                    <td colspan="2" class="py-4 px-4">
                                        <span class="text-xs uppercase font-bold tracking-wider text-[#B08D57] block">
                                            Total Pembayaran Akhir
                                        </span>
                                        <span class="text-[10px] text-stone-300">
                                            Pembayaran terverifikasi lunas
                                        </span>
                                    </td>
                                    <td colspan="2" class="py-4 px-4 text-right">
                                        <span class="text-xl sm:text-2xl font-serif font-bold text-white tracking-tight">
                                            Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 5. CATATAN PENTING UNTUK TAMU SAAT CHECK-IN -->
                <div class="mt-6 p-4 rounded-2xl bg-[#FAF7F2] border border-[#e4d4be]/60 text-[11px] text-[#635b52] space-y-1">
                    <p class="font-bold text-[#1E1A16] flex items-center gap-1.5">
                        <i class="ph-bold ph-info text-[#B08D57]"></i> Ketentuan Check-in di Hotel:
                    </p>
                    <ul class="list-disc list-inside space-y-0.5 text-[#8c8276] pl-1">
                        <li>Harap tunjukkan struk ini dan <strong>KTP fisik asli</strong> yang sesuai dengan data pemesan saat check-in di meja resepsionis.</li>
                        <li>Waktu Check-in resmi dimulai pukul <strong>14:00 WIB</strong> dan Check-out paling lambat pukul <strong>12:00 WIB</strong>.</li>
                        <li>Struk ini sah tanpa tanda tangan basah karena telah diterbitkan secara elektronik oleh sistem Bigland Hotel &amp; Suites.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 6. TOMBOL AKSI DI BAWAH STRUK (Ke Riwayat Pemesanan & Ke Home) -->
        <div id="action_buttons" class="no-print mt-8 space-y-4">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                
                <!-- Tombol 1: Ke Riwayat Pemesanan -->
                <a href="{{ route('riwayat') }}"
                    class="w-full py-4 px-6 bg-[#B08D57] hover:bg-[#9c7743] active:bg-[#866535] text-white rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-200 flex items-center justify-center gap-2.5 shadow-lg shadow-[#B08D57]/30 hover:scale-[1.02] active:scale-95 cursor-pointer">
                    <i class="ph-fill ph-clock-counter-clockwise text-lg"></i>
                    <span>Lihat Riwayat Pemesanan</span>
                </a>

                <!-- Tombol 2: Ke Home / Beranda -->
                <a href="{{ route('home') }}"
                    class="w-full py-4 px-6 bg-white hover:bg-[#f5ede2] text-[#1E1A16] rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-200 flex items-center justify-center gap-2.5 border border-[#e4d4be] hover:border-[#B08D57] shadow-sm hover:scale-[1.02] active:scale-95 cursor-pointer">
                    <i class="ph-fill ph-house text-lg text-[#B08D57]"></i>
                    <span>Kembali ke Beranda (Home)</span>
                </a>

            </div>

            <!-- Tombol Tambahan: Cetak Struk Langsung -->
            <div class="flex items-center justify-center pt-2">
                <button type="button" onclick="window.print()"
                    class="inline-flex items-center gap-2 text-xs font-semibold text-[#8c8276] hover:text-[#1E1A16] py-2 px-4 rounded-full border border-dashed border-[#e4d4be] hover:border-[#B08D57] bg-white transition-colors cursor-pointer">
                    <i class="ph ph-printer text-base text-[#B08D57]"></i>
                    <span>Cetak Struk / Unduh PDF</span>
                </button>
            </div>

        </div>

    </main>

    <!-- FOOTER LUXURY BIGLAND (Disembunyikan saat cetak) -->
    <footer class="no-print bg-white border-t border-[#e4d4be] pt-10 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 text-center text-xs text-[#8c8276] space-y-2">
            <p>&copy; 2026 Bigland Hotel &amp; Suites. All rights reserved.</p>
            <p>Jl. MH Thamrin No. 28, Menteng, Jakarta Pusat &bull; Telp: +62 (21) 3988-7700 &bull; Email: reservasi@bigland.com</p>
        </div>
    </footer>

</body>

</html>

