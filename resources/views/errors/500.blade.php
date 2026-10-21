<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>500 — Terjadi Kesalahan Sistem | Nabla Fisika</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo1.png') }}">

    <script>
        (() => {
            try {
                const savedTheme = localStorage.getItem('theme');
                const dark = savedTheme ? savedTheme === 'dark' : true;
                document.documentElement.classList.toggle('dark', dark);
            } catch (_) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased dark:bg-slate-950 dark:text-slate-100 flex items-center justify-center p-4 relative overflow-hidden">

    {{-- Background Layer --}}
    <div class="absolute inset-0 bg-grid bg-grid-mask opacity-20 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-rose-500/10 dark:bg-rose-600/10 rounded-full blur-3xl pointer-events-none"></div>

    {{-- Konten Utama --}}
    <div class="max-w-xl w-full text-center relative z-10">
        
        {{-- Ilustrasi (Bintang Meledak / Supernova) --}}
        <div class="relative w-48 h-48 mx-auto mb-8 animate-float-soft">
            <svg class="w-full h-full text-slate-400 dark:text-slate-600" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                {{-- Inti Ledakan --}}
                <circle cx="50" cy="50" r="10" fill="currentColor" fill-opacity="0.1"/>
                {{-- Pancaran Sinar --}}
                <path d="M50 20 L50 35 M50 65 L50 80 M20 50 L35 50 M65 50 L80 50 M28 28 L38 38 M62 62 L72 72 M28 72 L38 62 M62 38 L72 28"/>
                {{-- Partikel yang berhamburan --}}
                <circle cx="25" cy="25" r="2" fill="currentColor"/>
                <circle cx="75" cy="25" r="1.5" fill="currentColor"/>
                <circle cx="25" cy="75" r="1" fill="currentColor"/>
                <circle cx="75" cy="75" r="2" fill="currentColor"/>
                <circle cx="50" cy="15" r="1.5" fill="currentColor"/>
                <circle cx="50" cy="85" r="1" fill="currentColor"/>
            </svg>
        </div>

        {{-- Teks Error --}}
        <h1 class="text-7xl sm:text-9xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-rose-500 to-orange-500 mb-4 tracking-tighter">
            500
        </h1>
        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-3">
            Terjadi Gangguan Gravitasi
        </h2>
        <p class="text-sm sm:text-base text-slate-500 dark:text-slate-400 max-w-md mx-auto mb-8">
            Sistem kami mengalami gangguan tak terduga. Tim astronom (developer) kami sedang berusaha memperbaikinya. Silakan coba beberapa saat lagi.
        </p>

        {{-- Tombol Aksi --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <button onclick="window.location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-sm font-bold transition shadow-lg shadow-rose-600/25 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Muat Ulang Halaman
            </button>
            <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>