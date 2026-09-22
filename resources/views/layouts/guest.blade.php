<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bigland') }}</title>

        <!-- Fonts: Plus Jakarta Sans -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Phosphor Icons -->
        <script src="https://unpkg.com/@phosphor-icons/web"></script>

        <!-- Scripts / Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fbfbfb; }
        </style>
    </head>
    <body class="text-[#121417] antialiased selection:bg-[#121417] selection:text-white">
        
        <div class="min-h-screen flex flex-col justify-center items-center px-6 py-12 relative overflow-hidden">
            <!-- Background Blob Dekoratif Tipis -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-neutral-200/40 rounded-full blur-3xl -z-10 pointer-events-none"></div>

            <!-- Logo / Brand Header -->
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-2.5 text-2xl font-bold tracking-tight text-[#121417] group">
                    <div class="w-12 h-12 rounded-2xl bg-[#121417] text-white flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform">
                        <i class="ph-fill ph-buildings text-2xl"></i>
                    </div>
                    <span>Bigland</span>
                </a>
            </div>

            <!-- Card Utama Form -->
            <div class="w-full sm:max-w-md p-8 sm:p-10 bg-white shadow-xl shadow-gray-200/50 border border-neutral-100 rounded-[2.5rem]">
                {{ $slot }}
            </div>

            <!-- Footer Kecil -->
            <p class="mt-8 text-xs text-gray-400 font-medium text-center">
                &copy; {{ date('Y') }} Bigland. Hak cipta dilindungi.
            </p>
        </div>
    </body>
</html>