<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center sm:text-left">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-800 text-xs font-semibold mb-3 border border-gray-200">
            <i class="ph-fill ph-buildings text-sm"></i> Pendaftaran Akun
        </div>
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Buat Akun Baru</h2>
        <p class="text-sm text-gray-500 mt-1">Daftar untuk mulai memesan dan mengelola kamar hotel.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-2">Nama Lengkap</label>
            <div class="relative flex items-center">
                <span class="absolute left-4 text-gray-400">
                    <i class="ph ph-user text-lg"></i>
                </span>
                <input id="name" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-gray-50/50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#212529] focus:border-transparent transition-all shadow-sm" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama lengkap Anda" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-2">Email Aktif</label>
            <div class="relative flex items-center">
                <span class="absolute left-4 text-gray-400">
                    <i class="ph ph-envelope-simple text-lg"></i>
                </span>
                <input id="email" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-gray-50/50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#212529] focus:border-transparent transition-all shadow-sm" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-2">Password</label>
            <div class="relative flex items-center">
                <span class="absolute left-4 text-gray-400">
                    <i class="ph ph-lock-key text-lg"></i>
                </span>
                <input id="password" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-gray-50/50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#212529] focus:border-transparent transition-all shadow-sm" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-2">Konfirmasi Password</label>
            <div class="relative flex items-center">
                <span class="absolute left-4 text-gray-400">
                    <i class="ph ph-shield-check text-lg"></i>
                </span>
                <input id="password_confirmation" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-gray-50/50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#212529] focus:border-transparent transition-all shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs" />
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit" class="w-full py-4 px-6 bg-[#212529] hover:bg-black text-white font-semibold rounded-2xl text-sm shadow-xl shadow-gray-900/10 hover:shadow-2xl hover:scale-[1.01] transition-all duration-300 flex items-center justify-center gap-3 group">
                <span>Daftar Sekarang</span>
                <i class="ph ph-arrow-right text-lg group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>

        <!-- Login Link Option -->
        <div class="text-center pt-6 mt-6 border-t border-gray-100">
            <p class="text-sm text-gray-500">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="font-bold text-gray-900 hover:underline inline-flex items-center gap-1 ml-1">
                    Masuk di sini <i class="ph ph-arrow-up-right text-xs"></i>
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>