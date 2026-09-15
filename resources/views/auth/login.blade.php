<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center sm:text-left">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Masuk ke Akun</h2>
        <p class="text-sm text-gray-500 mt-1">Masukkan kredensial Anda untuk mengelola reservasi.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-2">Email Terdaftar</label>
            <div class="relative flex items-center">
                <span class="absolute left-4 text-gray-400">
                    <i class="ph ph-envelope-simple text-lg"></i>
                </span>
                <input id="email" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-gray-50/50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#212529] focus:border-transparent transition-all shadow-sm" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-600">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-medium text-gray-500 hover:text-gray-900 transition-colors" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>
            <div class="relative flex items-center">
                <span class="absolute left-4 text-gray-400">
                    <i class="ph ph-lock-key text-lg"></i>
                </span>
                <input id="password" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-gray-50/50 border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#212529] focus:border-transparent transition-all shadow-sm" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-gray-300 text-[#212529] shadow-sm focus:ring-[#212529] w-4 h-4 cursor-pointer" name="remember">
                <span class="ms-2.5 text-sm text-gray-600 font-medium group-hover:text-gray-900 transition-colors">Ingat saya</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full py-4 px-6 bg-[#212529] hover:bg-black text-white font-semibold rounded-2xl text-sm shadow-xl shadow-gray-900/10 hover:shadow-2xl hover:scale-[1.01] transition-all duration-300 flex items-center justify-center gap-3 group">
                <span>Masuk Sekarang</span>
                <i class="ph ph-arrow-right text-lg group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>

        <!-- Register Link Option -->
        <div class="text-center pt-6 mt-6 border-t border-gray-100">
            <p class="text-sm text-gray-500">
                Belum memiliki akun reservasi? 
                <a href="{{ route('register') }}" class="font-bold text-gray-900 hover:underline inline-flex items-center gap-1 ml-1">
                    Daftar di sini <i class="ph ph-arrow-up-right text-xs"></i>
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>