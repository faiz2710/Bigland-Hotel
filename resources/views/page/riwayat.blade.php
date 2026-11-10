<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigland - Riwayat Pemesanan Kamar</title>

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

        @media print {
            body {
                background-color: white !important;
                color: black !important;
            }
            .no-print, header, nav, footer, button, .action-buttons {
                display: none !important;
            }
            .reservation-card {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                break-inside: avoid;
                margin-bottom: 2rem !important;
            }
        }
    </style>
</head>

<body class="selection:bg-[#f5ede2] selection:text-[#1E1A16] font-sans antialiased bg-[#FAF7F2] min-h-screen flex flex-col">

    <!-- FLOATING PILL NAVBAR COMPONENT -->
    <div class="no-print">
        <x-navbar />
    </div>

    <!-- NOTIFIKASI FLASH SUKSES / ERROR -->
    @if(session('success'))
        <div role="status" class="no-print fixed top-24 right-6 z-50 bg-[#1E1A16] text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 border border-[#B08D57]/40 max-w-md">
            <div class="w-8 h-8 rounded-full bg-[#B08D57] flex items-center justify-center text-white shrink-0">
                <i class="ph-bold ph-check text-lg"></i>
            </div>
            <span class="text-xs font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div role="status" class="no-print fixed top-24 right-6 z-50 bg-rose-900 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 border border-rose-400 max-w-md">
            <i class="ph-bold ph-warning text-lg text-rose-300"></i>
            <span class="text-xs font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- MAIN SECTION -->
    <main class="flex-1 pt-32 sm:pt-36 pb-20 px-4 sm:px-8 max-w-6xl mx-auto w-full">

        <!-- Header Riwayat -->
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-[#e4d4be] pb-8">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#f5ede2] border border-[#e4d4be] text-[#B08D57] text-xs font-bold uppercase tracking-wider mb-3">
                    <i class="ph ph-clock-counter-clockwise text-base"></i> Riwayat Reservasi Terbuka (Tanpa Login)
                </div>
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-[#1E1A16] tracking-tight">
                    Daftar Riwayat Reservasi
                </h1>
            </div>
            <div class="no-print flex items-center gap-3">
                <a href="{{ route('form.pesan') }}"
                   class="inline-flex items-center gap-2 bg-[#B08D57] hover:bg-[#9c7743] text-white px-5 py-3 rounded-full text-xs font-bold shadow-md shadow-[#B08D57]/25 transition-all hover:scale-105 active:scale-95">
                    <i class="ph ph-plus-circle text-base"></i>
                    <span>Buat Pesanan Baru</span>
                </a>
            </div>
        </div>

        @if($pemesanan->isEmpty())
            <!-- Tampilan Jika Belum Ada Pesanan -->
            <div class="bg-white rounded-[2.5rem] p-12 sm:p-16 text-center border border-[#e4d4be] shadow-sm max-w-2xl mx-auto my-12">
                <div class="w-20 h-20 bg-[#f5ede2] text-[#B08D57] rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner border border-[#e4d4be]">
                    <i class="ph ph-calendar-blank"></i>
                </div>
                <h2 class="font-serif text-2xl font-bold text-[#1E1A16] mb-2">Belum Ada Riwayat Reservasi</h2>
                <p class="text-[#635b52] text-xs sm:text-sm max-w-md mx-auto mb-8 leading-relaxed font-normal">
                    Belum terdapat data pemesanan kamar yang tersimpan. Silakan pilih tipe kamar impian Anda dan isi formulir pemesanan.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('produk') }}" class="px-6 py-3 rounded-full border border-[#e4d4be] hover:border-[#B08D57] text-[#1E1A16] font-semibold text-xs transition-colors">
                        Lihat Koleksi Produk
                    </a>
                    <a href="{{ route('form.pesan') }}" class="px-7 py-3 rounded-full bg-[#B08D57] hover:bg-[#9c7743] text-white font-bold text-xs shadow-md transition-all">
                        Pesan Kamar Sekarang
                    </a>
                </div>
            </div>
        @else

            <!-- Rangkuman Statistik Cepat -->
            <div class="no-print grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
                <div class="bg-white rounded-3xl p-6 border border-[#e4d4be] shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-[#f5ede2] text-[#B08D57] flex items-center justify-center text-2xl shrink-0">
                        <i class="ph ph-receipt"></i>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Total Reservasi</span>
                        <span class="font-serif text-2xl font-bold text-[#1E1A16]">{{ $pemesanan->count() }} Pesanan</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-[#e4d4be] shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center text-2xl shrink-0">
                        <i class="ph ph-moon-stars"></i>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Total Malam</span>
                        <span class="font-serif text-2xl font-bold text-[#1E1A16]">{{ $pemesanan->sum('durasi') }} Malam</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-[#e4d4be] shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-2xl shrink-0">
                        <i class="ph ph-seal-percent"></i>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-[#8c8276] tracking-wider block">Total Diskon Diberikan</span>
                        <span class="font-serif text-2xl font-bold text-emerald-700">Rp {{ number_format($pemesanan->sum('diskon'), 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Daftar Kartu Riwayat Pemesanan -->
            <div class="space-y-6">
                @foreach($pemesanan as $item)
                    @php
                        $adaDiskon = $item->diskon > 0;
                        $subtotal = (int) $item->total_bayar + (int) $item->diskon;
                        $isTerbaru = session('pesanan_terbaru_id') == $item->id;
                    @endphp

                    <div class="reservation-card bg-white rounded-[2.5rem] border {{ $isTerbaru ? 'border-2 border-[#B08D57]' : 'border-[#e4d4be]' }} shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
                        
                        <!-- Header Kartu Reservasi -->
                        <div class="p-6 sm:p-7 bg-[#FAF7F2] border-b border-[#e4d4be] flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center gap-3.5">
                                <div class="w-12 h-12 rounded-2xl bg-[#B08D57] text-white flex items-center justify-center font-bold text-xl shadow-sm">
                                    <i class="ph-fill ph-door"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-serif text-xl font-bold text-[#1E1A16]">{{ $item->tipe_kamar }} Room</h3>
                                        @if($isTerbaru)
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#B08D57] text-white animate-pulse">
                                                Pesanan Baru
                                            </span>
                                        @endif
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#8c8276]">
                                        Dipesan pada: {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }} WIB
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                                @if($adaDiskon)
                                    <span class="px-3.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-800 border border-amber-200 flex items-center gap-1.5">
                                        <i class="ph-fill ph-seal-percent text-sm"></i>
                                        Diskon 10%
                                    </span>
                                @endif

                                <span class="px-3.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200 flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Status: Terkonfirmasi
                                </span>

                                <span class="text-xs font-mono text-[#8c8276] font-bold bg-white px-3 py-1 rounded-xl border border-[#e4d4be]">
                                    ID: #{{ $item->id }}
                                </span>
                            </div>
                        </div>

                        <!-- Body Kartu: Grid 3 Kolom -->
                        <div class="p-6 sm:p-8 grid grid-cols-1 md:grid-cols-3 gap-6">

                            <!-- Kolom 1: Informasi Tamu -->
                            <div class="space-y-3">
                                <h4 class="text-[11px] font-bold text-[#B08D57] uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph ph-user text-base"></i> Identitas Tamu
                                </h4>
                                <div class="bg-[#FAF7F2] p-4 rounded-2xl border border-[#e4d4be]/80 space-y-2.5">
                                    <div>
                                        <span class="text-[10px] text-[#8c8276] block font-bold uppercase tracking-wider">Nama Lengkap</span>
                                        <span class="font-bold text-[#1E1A16] text-sm block">{{ $item->nama }}</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-[#8c8276] block font-bold uppercase tracking-wider">No. Identitas KTP</span>
                                        <span class="font-mono text-xs font-semibold text-[#635b52] block tracking-wide">{{ $item->nomor_identitas }}</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-[#8c8276] block font-bold uppercase tracking-wider">Jenis Kelamin</span>
                                        <span class="font-semibold text-xs text-[#635b52] block">{{ $item->jenis_kelamin }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom 2: Jadwal Menginap -->
                            <div class="space-y-3">
                                <h4 class="text-[11px] font-bold text-[#B08D57] uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph ph-calendar text-base"></i> Jadwal Menginap
                                </h4>
                                <div class="bg-[#FAF7F2] p-4 rounded-2xl border border-[#e4d4be]/80 space-y-2.5">
                                    <div>
                                        <span class="text-[10px] text-[#8c8276] block font-bold uppercase tracking-wider">Tanggal Check-in</span>
                                        <span class="font-bold text-[#1E1A16] text-xs sm:text-sm block">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d F Y') }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-[#8c8276] block font-bold uppercase tracking-wider">Durasi Menginap</span>
                                        <span class="font-semibold text-xs text-[#635b52] block">{{ $item->durasi }} Malam</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-[#8c8276] block font-bold uppercase tracking-wider">Estimasi Check-out</span>
                                        <span class="font-semibold text-xs text-[#635b52] block">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pesan)->addDays($item->durasi)->format('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom 3: Rincian Pembayaran & Aksi -->
                            <div class="space-y-3 flex flex-col justify-between">
                                <h4 class="text-[11px] font-bold text-[#B08D57] uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph ph-wallet text-base"></i> Rincian Pembayaran
                                </h4>
                                <div class="bg-[#FAF7F2] p-4 rounded-2xl border border-[#e4d4be]/80 flex flex-col justify-center">
                                    @if($adaDiskon)
                                        <div class="flex items-center justify-between text-xs mb-1">
                                            <span class="text-[#8c8276]">Harga Normal</span>
                                            <span class="font-semibold text-[#8c8276] line-through">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="flex items-center justify-between text-xs text-emerald-700 font-bold mb-2">
                                            <span>Diskon (> 3 Malam)</span>
                                            <span>- Rp {{ number_format($item->diskon, 0, ',', '.') }}</span>
                                        </div>
                                    @endif

                                    <span class="text-[10px] text-[#8c8276] font-bold uppercase tracking-wider">
                                        {{ $adaDiskon ? 'Total Setelah Diskon 10%' : 'Total Biaya Pembayaran' }}
                                    </span>
                                    <span class="font-serif text-2xl font-bold text-[#1E1A16] mt-0.5">
                                        Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                                    </span>

                                    <span class="text-[11px] text-[#8c8276] mt-2 block">
                                        Tarif Kamar: Rp {{ number_format($item->harga, 0, ',', '.') }} / malam
                                    </span>
                                </div>

                                <!-- Aksi Cetak & Hapus -->
                                <div class="no-print pt-2 flex items-center gap-2">
                                    <button onclick="window.print()"
                                        class="flex-1 py-2.5 px-3 bg-white border border-[#e4d4be] hover:border-[#1E1A16] text-[#1E1A16] text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1.5 shadow-2xs cursor-pointer">
                                        <i class="ph ph-printer text-base"></i>
                                        <span>Cetak Bukti</span>
                                    </button>

                                    <form action="{{ route('riwayat.destroy', $item->id) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin membatalkan/menghapus reservasi kamar #{{ $item->id }} ini?');"
                                          class="shrink-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="py-2.5 px-3 bg-white border border-rose-200 hover:bg-rose-50 text-rose-600 text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-1 shadow-2xs"
                                            title="Batalkan reservasi">
                                            <i class="ph ph-trash text-base"></i>
                                            <span class="hidden sm:inline">Batal</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

        @endif

    </main>

    <!-- FOOTER LUXURY BIGLAND -->
    <footer class="no-print bg-white border-t border-[#e4d4be] pt-12 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 text-center text-xs text-[#8c8276] space-y-2">
            <p>&copy; 2026 Bigland Hotel &amp; Suites. All rights reserved.</p>
            <p>Jl. MH Thamrin No. 28, Menteng, Jakarta Pusat &bull; Telp: +62 (21) 3988-7700 &bull; Email: reservasi@bigland.com</p>
        </div>
    </footer>

</body>

</html>
