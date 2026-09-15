<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Hotel - Riwayat Reservasi</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }
        @media print {
            body { background-color: white; }
            nav, footer, .no-print { display: none !important; }
            .reservation-card { box-shadow: none !important; border: 1px solid #dee2e6 !important; }
        }
    </style>
</head>
<body class="text-brand-900 font-sans antialiased selection:bg-brand-900 selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full top-0 z-50 glass-nav border-b border-gray-200/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight flex items-center gap-2">
                <i class="ph-fill ph-buildings text-2xl text-brand-900"></i>
                The Hotel
            </a>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('form.pesan') }}" class="bg-brand-900 text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-black transition-all flex items-center gap-2 shadow-sm">
                    <i class="ph ph-plus"></i> Buat Pesanan Baru
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 pb-20 px-6 max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-gray-200/80 pb-8">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-100 text-brand-900 text-sm font-medium mb-4 border border-brand-200">
                    <i class="ph ph-clock-counter-clockwise text-lg"></i> Riwayat Reservasi
                </div>
                <h1 class="text-3xl sm:text-5xl font-bold tracking-tight text-brand-900">Daftar Pesanan Kamar</h1>
            </div>
            <p class="text-gray-500 max-w-md text-sm md:text-base leading-relaxed">
                Kelola dan pantau seluruh riwayat pemesanan kamar hotel Anda dengan mudah di sini.
            </p>
        </div>

        <!-- Bagian List Reservasi -->
        @if($pemesanan->isEmpty())
            <div class="bg-white rounded-[2.5rem] p-16 text-center border border-gray-100 shadow-sm">
                <div class="w-20 h-20 bg-brand-50 text-brand-900 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner border border-brand-100">
                    <i class="ph ph-calendar-blank"></i>
                </div>
                <h3 class="text-xl font-bold text-brand-900 mb-2">Belum Ada Reservasi</h3>
                <p class="text-gray-500 text-sm max-w-sm mx-auto mb-8">Anda belum memiliki riwayat pesanan kamar. Silakan buat reservasi pertama Anda sekarang.</p>
                <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-brand-900 text-white rounded-2xl font-bold text-sm hover:bg-black transition-all shadow-md">
                    <i class="ph ph-plus text-lg"></i> Pesan Kamar Sekarang
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($pemesanan as $item)
                    <!-- Modern Clean Card Design -->
                    <div class="reservation-card bg-white rounded-[2.5rem] border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col">
                        
                        <!-- Top Card Header -->
                        <div class="p-6 md:p-8 bg-gray-50/50 border-b border-gray-100 flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-2xl bg-brand-900 text-white flex items-center justify-center font-bold text-lg shadow-sm">
                                    <i class="ph-fill ph-door"></i>
                                </div>
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Tipe Kamar</span>
                                    <h3 class="text-lg font-extrabold text-brand-900">{{ $item->tipe_kamar }}</h3>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1.5 shadow-2xs">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Pesanan Berhasil
                                </span>
                                <span class="text-xs font-mono text-gray-400 font-bold bg-white px-3 py-1.5 rounded-xl border border-gray-200">
                                    ID: #{{ $item->id }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Body (Grid Information) -->
                        <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <!-- Kolom 1: Informasi Tamu -->
                            <div class="space-y-4">
                                <h4 class="text-xs font-extrabold text-gray-400 uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph ph-user text-brand-900 text-base"></i> Informasi Tamu
                                </h4>
                                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 space-y-2">
                                    <div>
                                        <span class="text-[10px] text-gray-400 block font-bold uppercase">Nama Lengkap</span>
                                        <span class="font-bold text-brand-900 text-sm truncate block">{{ $item->nama }}</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block font-bold uppercase">No. Identitas (KTP)</span>
                                        <span class="font-semibold text-gray-700 text-xs block">{{ $item->nomor_identitas }}</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block font-bold uppercase">Jenis Kelamin</span>
                                        <span class="font-semibold text-gray-700 text-xs block">{{ $item->jenis_kelamin }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom 2: Jadwal Menginap -->
                            <div class="space-y-4">
                                <h4 class="text-xs font-extrabold text-gray-400 uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph ph-calendar text-brand-900 text-base"></i> Jadwal Menginap
                                </h4>
                                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 space-y-2">
                                    <div>
                                        <span class="text-[10px] text-gray-400 block font-bold uppercase">Tanggal Check-in</span>
                                        <span class="font-bold text-brand-900 text-sm block">{{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d F Y') }}</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block font-bold uppercase">Durasi Menginap</span>
                                        <span class="font-semibold text-gray-700 text-xs block">{{ $item->durasi }} Malam</span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block font-bold uppercase">Estimasi Check-out</span>
                                        <span class="font-semibold text-gray-700 text-xs block">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pesan)->addDays($item->durasi)->format('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom 3: Rincian Pembayaran & Aksi -->
                            <div class="space-y-4 flex flex-col justify-between">
                                <h4 class="text-xs font-extrabold text-gray-400 uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="ph ph-wallet text-brand-900 text-base"></i> Pembayaran
                                </h4>
                                <div class="bg-brand-50/60 p-4 rounded-2xl border border-brand-100 flex flex-col justify-center">
                                    <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Total Biaya Kamar</span>
                                    <span class="text-xl md:text-2xl font-black text-brand-900 mt-1">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</span>
                                    <span class="text-[10px] text-emerald-700 font-bold mt-1 flex items-center gap-1">
                                        <i class="ph-fill ph-check-circle"></i> Status: Pembayaran Lunas
                                    </span>
                                </div>

                                <div class="no-print pt-2">
                                    <button onclick="window.print()" class="w-full py-3 px-4 bg-white border border-gray-300 hover:bg-gray-50 text-brand-900 text-xs font-bold rounded-xl transition-all flex items-center justify-center gap-2 shadow-2xs cursor-pointer">
                                        <i class="ph ph-printer text-base"></i> Cetak Bukti Pesanan
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Footer Minimalis -->
    <footer class="bg-white border-t border-gray-200 py-8 text-center text-sm text-gray-400">
        &copy; 2026 The Hotel. All rights reserved.
    </footer>

</body>
</html>