<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tamu - Bigland</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
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
                            800: '#292524',
                            900: '#1c1917',
                        },
                        obsidian: {
                            800: '#1a1f26',
                            900: '#10141a',
                            950: '#090c0f',
                        },
                        gold: {
                            400: '#dfb958',
                            500: '#c79d39',
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
        }
        .glass-header {
            background: rgba(250, 249, 246, 0.85);
            backdrop-filter: blur(16px);
        }
    </style>
</head>
<body class="font-sans antialiased selection:bg-obsidian-900 selection:text-white min-h-screen flex flex-col justify-between">

    <!-- Top Navigation Bar for Dashboard -->
    <header class="sticky top-0 z-50 glass-header border-b border-stone-200 py-4 px-6 sm:px-8">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-obsidian-900 text-white flex items-center justify-center font-bold shadow-md group-hover:scale-105 transition-transform">
                    <i class="ph-fill ph-buildings text-xl text-gold-400"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-obsidian-900">Bigland</span>
                    <span class="text-[9px] tracking-[0.2em] uppercase font-bold text-stone-400 -mt-1">Dashboard Tamu</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <div class="flex items-center gap-3">
                <a href="/" class="hidden sm:inline-flex items-center gap-2 text-xs font-semibold px-4 py-2 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-700 transition-colors">
                    <i class="ph ph-arrow-left"></i>
                    <span>Halaman Depan Web</span>
                </a>
                
                <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-2 text-xs font-bold px-4 py-2 rounded-full bg-obsidian-900 hover:bg-black text-white transition-all shadow-sm">
                    <i class="ph ph-plus"></i>
                    <span>Pesan Kamar</span>
                </a>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            @click.away="open = false" 
                            class="flex items-center gap-2 text-xs font-semibold text-obsidian-900 bg-white px-3.5 py-2 rounded-full border border-stone-200 shadow-sm hover:border-stone-400 transition-all">
                        <span class="w-6 h-6 rounded-full bg-stone-100 text-obsidian-900 flex items-center justify-center font-bold text-[11px]">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <span class="max-w-[100px] truncate">{{ Auth::user()->name }}</span>
                        <i class="ph ph-caret-down text-stone-400 text-xs"></i>
                    </button>
                    
                    <div x-show="open" 
                         x-transition 
                         class="absolute right-0 mt-2 w-52 bg-white border border-stone-200 rounded-2xl shadow-xl py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('profile.edit') }}" class="px-4 py-2 text-xs text-stone-700 hover:bg-stone-50 flex items-center gap-2.5">
                            <i class="ph ph-user-gear text-base text-stone-500"></i> Pengaturan Akun
                        </a>
                        <a href="{{ route('riwayat') }}" class="px-4 py-2 text-xs text-stone-700 hover:bg-stone-50 flex items-center gap-2.5">
                            <i class="ph ph-receipt text-base text-stone-500"></i> Riwayat Reservasiku
                        </a>
                        <div class="border-t border-stone-100 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-600 hover:bg-red-50 flex items-center gap-2.5 font-medium">
                                <i class="ph ph-sign-out text-base"></i> Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- Main Content for Logged-In Dashboard -->
    <main class="max-w-7xl mx-auto px-6 sm:px-8 py-10 w-full flex-1">
        
        <!-- Welcome Banner -->
        <div class="bg-obsidian-900 text-white rounded-[2.5rem] p-8 sm:p-12 mb-10 shadow-xl relative overflow-hidden flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-obsidian-800 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
            
            <div class="relative z-10 max-w-xl">
                <span class="text-xs uppercase font-bold tracking-widest text-gold-400">Selamat Datang di Bigland</span>
                <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight mt-1 mb-3">
                    Halo, {{ Auth::user()->name }}! 👋
                </h1>
                <p class="text-xs sm:text-sm text-stone-300 leading-relaxed">
                    Kelola reservasi kamar hotel Anda, pantau jadwal check-in, atau lakukan pemesanan kamar baru dengan mudah dari dashboard pribadi Anda.
                </p>
            </div>

            <div class="relative z-10 flex flex-wrap gap-3">
                <a href="{{ route('form.pesan') }}" class="px-6 py-3.5 rounded-full bg-white text-obsidian-900 font-bold text-xs hover:bg-stone-100 transition-all shadow-md flex items-center gap-2">
                    <i class="ph ph-plus-circle text-base"></i>
                    <span>Reservasi Kamar Baru</span>
                </a>
                <a href="/" class="px-6 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-xs transition-all border border-white/20 flex items-center gap-2">
                    <i class="ph ph-globe text-base"></i>
                    <span>Halaman Depan Web</span>
                </a>
            </div>
        </div>

        <!-- Quick Metrics Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-[2rem] p-6 border border-stone-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ph ph-receipt"></i>
                </div>
                <div>
                    <span class="text-stone-400 text-[11px] font-bold uppercase tracking-wider">Total Reservasi</span>
                    <h3 class="text-2xl font-extrabold text-obsidian-900 mt-0.5">{{ $pemesanan->count() }} Pesanan</h3>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-stone-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ph-fill ph-seal-check"></i>
                </div>
                <div>
                    <span class="text-stone-400 text-[11px] font-bold uppercase tracking-wider">Status Akun</span>
                    <h3 class="text-2xl font-extrabold text-obsidian-900 mt-0.5">Tamu Terverifikasi</h3>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-stone-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-stone-100 text-obsidian-900 flex items-center justify-center text-2xl font-bold">
                    <i class="ph ph-shield-check"></i>
                </div>
                <div>
                    <span class="text-stone-400 text-[11px] font-bold uppercase tracking-wider">Member Privilege</span>
                    <h3 class="text-2xl font-extrabold text-obsidian-900 mt-0.5">Bigland Silver VIP</h3>
                </div>
            </div>
        </div>

        <!-- Recent Reservations Section -->
        <div class="bg-white rounded-[2.5rem] p-8 border border-stone-200 shadow-sm">
            <div class="flex items-center justify-between pb-6 mb-6 border-b border-stone-100">
                <div>
                    <h2 class="text-xl font-bold text-obsidian-900">Reservasi Kamar Terkini</h2>
                    <p class="text-xs text-stone-500 mt-0.5">Daftar pesanan kamar aktif Anda di Bigland</p>
                </div>
                <a href="{{ route('riwayat') }}" class="text-xs font-bold text-obsidian-900 hover:text-stone-600 flex items-center gap-1.5">
                    <span>Lihat Semua Riwayat</span>
                    <i class="ph ph-arrow-right"></i>
                </a>
            </div>

            @if($pemesanan->isEmpty())
                <div class="py-12 text-center">
                    <div class="w-16 h-16 rounded-3xl bg-stone-100 text-stone-400 flex items-center justify-center text-2xl mx-auto mb-4">
                        <i class="ph ph-bed"></i>
                    </div>
                    <h3 class="text-base font-bold text-obsidian-900 mb-1">Belum Ada Reservasi Aktif</h3>
                    <p class="text-xs text-stone-500 max-w-sm mx-auto mb-6">Nikmati pengalaman menginap nyaman di Bigland. Dapatkan kamar terbaik Anda hari ini.</p>
                    <a href="{{ route('form.pesan') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-obsidian-900 text-white font-bold text-xs hover:bg-black transition-all shadow-sm">
                        <i class="ph ph-plus"></i>
                        <span>Pesan Kamar Sekarang</span>
                    </a>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($pemesanan->take(4) as $item)
                        <div class="p-5 rounded-2xl bg-stone-50 border border-stone-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-stone-300 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-obsidian-900 text-white flex items-center justify-center text-xl font-bold">
                                    <i class="ph-fill ph-bed"></i>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase text-stone-400">Kamar #{{ $item->id }}</span>
                                    <h4 class="text-sm font-bold text-obsidian-900">{{ $item->tipe_kamar }} Room</h4>
                                    <p class="text-[11px] text-stone-500">
                                        Check-in: {{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d M Y') }} • {{ $item->durasi }} Malam
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-6 justify-between sm:justify-end">
                                <div class="text-left sm:text-right">
                                    <span class="text-[10px] font-bold uppercase text-stone-400 block">Total Bayar</span>
                                    <span class="text-base font-black text-obsidian-900">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</span>
                                </div>
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Terkonfirmasi
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </main>

    <!-- Minimalist Footer -->
    <footer class="bg-white border-t border-stone-200 py-6 text-center text-xs text-stone-400">
        &copy; 2026 Bigland. All rights reserved.
    </footer>

</body>
</html>