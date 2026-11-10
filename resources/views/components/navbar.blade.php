@php
    $isHome = request()->routeIs('home');
    $isProduk = request()->routeIs('produk');
    $isPesan = request()->routeIs('form.pesan');
    $isRiwayat = request()->routeIs('riwayat');
    $isTentangKami = request()->routeIs('tentang-kami');
@endphp

<!-- FLOATING PILL NAVBAR COMPONENT (BIGLAND LUXURY) -->
<div class="fixed top-4 inset-x-0 z-50 px-4 pointer-events-none"
     x-data="{ 
         scrolled: false, 
         mobileMenuOpen: false,
         init() {
             this.scrolled = window.pageYOffset > 40;
             window.addEventListener('scroll', () => {
                 this.scrolled = window.pageYOffset > 40;
             });
         }
     }">
    <div class="relative max-w-6xl mx-auto pointer-events-auto">

        <header
            class="flex items-center justify-between gap-4 rounded-full border border-[#e4d4be]/80 bg-white/95 backdrop-blur-xl shadow-[0_8px_30px_rgba(30,26,22,0.06)] px-3 sm:px-4 transition-all duration-300"
            :class="scrolled ? 'py-1.5 shadow-xl border-[#B08D57]/40' : 'py-2 sm:py-2.5'">

            <!-- Logo Bigland -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group pl-1">
                <div
                    class="w-9 h-9 rounded-full bg-[#B08D57] text-white flex items-center justify-center shadow-md shadow-[#B08D57]/25 group-hover:scale-105 transition-transform duration-300">
                    <i class="ph-fill ph-buildings text-lg"></i>
                </div>
                <div class="flex flex-col">
                    <span
                        class="text-base font-serif font-bold tracking-tight text-[#1E1A16] group-hover:text-[#B08D57] transition-colors leading-tight">Bigland</span>
                    <span class="text-[9px] uppercase tracking-[0.2em] font-semibold text-[#8c8276] -mt-0.5 hidden sm:block">Hotel & Suites</span>
                </div>
            </a>

            <!-- Desktop Links -->
            <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
                <a href="{{ route('home') }}"
                    class="nav-link text-xs font-semibold transition-colors {{ $isHome ? 'text-[#B08D57] font-bold' : 'text-[#635b52] hover:text-[#1E1A16]' }}">
                    Beranda
                </a>
                <a href="{{ route('tentang-kami') }}"
                    class="nav-link text-xs font-semibold transition-colors {{ $isTentangKami ? 'text-[#B08D57] font-bold' : 'text-[#635b52] hover:text-[#1E1A16]' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('produk') }}"
                    class="nav-link text-xs font-semibold transition-colors {{ $isProduk ? 'text-[#B08D57] font-bold' : 'text-[#635b52] hover:text-[#1E1A16]' }}">
                    Daftar Produk
                </a>
                <a href="{{ route('form.pesan') }}"
                    class="nav-link text-xs font-semibold transition-colors {{ $isPesan ? 'text-[#B08D57] font-bold' : 'text-[#635b52] hover:text-[#1E1A16]' }}">
                    Pemesanan
                </a>
                <!-- <a href="{{ route('riwayat') }}"
                    class="nav-link text-xs font-semibold transition-colors {{ $isRiwayat ? 'text-[#B08D57] font-bold' : 'text-[#635b52] hover:text-[#1E1A16]' }}">
                    Riwayat Pemesanan
                </a> -->
            </nav>

            <!-- Kanan: CTA Pesan Kamar + Mobile Hamburger -->
            <div class="flex items-center gap-2">
                <!-- Tombol CTA Emas #B08D57: Pesan Kamar -->
                <a href="{{ route('form.pesan') }}"
                    class="group inline-flex items-center gap-2 bg-[#B08D57] hover:bg-[#9c7743] text-white pl-4 pr-3.5 py-2.5 rounded-full text-xs font-bold shadow-md shadow-[#B08D57]/25 transition-all hover:scale-[1.03] active:scale-95">
                    <span>Pesan Kamar</span>
                    <i class="ph ph-arrow-up-right group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform text-sm"></i>
                </a>

                <!-- Hamburger Button (Mobile) -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden w-9 h-9 rounded-full bg-[#FAF7F2] hover:bg-[#f5ede2] text-[#1E1A16] flex items-center justify-center transition-colors border border-[#e4d4be]"
                    aria-label="Buka menu navigasi">
                    <i class="ph ph-list text-xl" x-show="!mobileMenuOpen"></i>
                    <i class="ph ph-x text-xl" x-show="mobileMenuOpen" style="display: none;"></i>
                </button>
            </div>
        </header>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-3 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-3 scale-95"
            class="lg:hidden absolute left-0 right-0 top-full mt-2 rounded-[2rem] bg-white/95 backdrop-blur-xl border border-[#e4d4be] shadow-2xl p-5"
            style="display: none;">
            <div class="flex flex-col space-y-1">
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}"
                    class="py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-between {{ $isHome ? 'bg-[#f5ede2] text-[#B08D57]' : 'text-[#1E1A16] hover:bg-[#FAF7F2]' }}">
                    <span class="flex items-center gap-2.5">
                        <i class="ph ph-house text-lg"></i> Beranda
                    </span>
                    <i class="ph ph-caret-right text-xs opacity-60"></i>
                </a>
                <a @click="mobileMenuOpen = false" href="{{ route('tentang-kami') }}"
                    class="py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-between {{ $isTentangKami ? 'bg-[#f5ede2] text-[#B08D57]' : 'text-[#1E1A16] hover:bg-[#FAF7F2]' }}">
                    <span class="flex items-center gap-2.5">
                        <i class="ph ph-info text-lg"></i> Tentang Kami
                    </span>
                    <i class="ph ph-caret-right text-xs opacity-60"></i>
                </a>
                <a @click="mobileMenuOpen = false" href="{{ route('produk') }}"
                    class="py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-between {{ $isProduk ? 'bg-[#f5ede2] text-[#B08D57]' : 'text-[#1E1A16] hover:bg-[#FAF7F2]' }}">
                    <span class="flex items-center gap-2.5">
                        <i class="ph ph-bed text-lg"></i> Daftar Produk &amp; Kamar
                    </span>
                    <i class="ph ph-caret-right text-xs opacity-60"></i>
                </a>
                <a @click="mobileMenuOpen = false" href="{{ route('form.pesan') }}"
                    class="py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-between {{ $isPesan ? 'bg-[#f5ede2] text-[#B08D57]' : 'text-[#1E1A16] hover:bg-[#FAF7F2]' }}">
                    <span class="flex items-center gap-2.5">
                        <i class="ph ph-calendar-plus text-lg"></i> Formulir Pemesanan
                    </span>
                    <i class="ph ph-caret-right text-xs opacity-60"></i>
                </a>
                <a @click="mobileMenuOpen = false" href="{{ route('riwayat') }}"
                    class="py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-between {{ $isRiwayat ? 'bg-[#f5ede2] text-[#B08D57]' : 'text-[#1E1A16] hover:bg-[#FAF7F2]' }}">
                    <span class="flex items-center gap-2.5">
                        <i class="ph ph-clock-counter-clockwise text-lg"></i> Riwayat Pemesanan
                    </span>
                    <i class="ph ph-caret-right text-xs opacity-60"></i>
                </a>


                <div class="pt-3">
                    <a @click="mobileMenuOpen = false" href="{{ route('form.pesan') }}"
                        class="w-full text-center py-3 rounded-full bg-[#B08D57] hover:bg-[#9c7743] text-xs font-bold text-white shadow-md flex items-center justify-center gap-2 transition-all">
                        <i class="ph ph-calendar-check text-base"></i>
                        <span>Pesan Kamar Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Nav-link dengan underline animasi halus */
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
        background: #B08D57;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .nav-link:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }
</style>
