<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>404 — Halaman Tidak Ditemukan | Nabla Fisika</title>
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
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-500/10 dark:bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    {{-- Konten Utama --}}
    <div class="max-w-xl w-full text-center relative z-10">
        
        {{-- Ilustrasi Astronaut Tersesat --}}
        <div class="relative w-48 h-48 mx-auto mb-8 animate-float-soft">
            <svg class="w-full h-full text-slate-400 dark:text-slate-600" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="50" cy="32" r="14"/>
                <path d="M41 30 Q50 24 59 30 Q60 35 50 38 Q40 35 41 30 Z" fill="currentColor" fill-opacity="0.1"/>
                <rect x="42" y="46" width="16" height="20" rx="3"/>
                <path d="M42 50 L30 56 L26 66"/>
                <path d="M58 50 L70 56 L74 66"/>
                <path d="M44 66 L42 78 L38 82"/>
                <path d="M56 66 L58 78 L62 82"/>
                <path d="M58 52 Q64 52 66 58" stroke-dasharray="1 1"/>
            </svg>
            {{-- Tanda Tanya Besar --}}
            <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-7xl font-extrabold text-blue-500/20 dark:text-blue-400/20 rotate-12 select-none">?</span>
        </div>

        {{-- Teks Error --}}
        <h1 class="text-7xl sm:text-9xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-cyan-500 mb-4 tracking-tighter">
            404
        </h1>
        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-3">
            Tersesat di Ruang Hampa?
        </h2>
        <p class="text-sm sm:text-base text-slate-500 dark:text-slate-400 max-w-md mx-auto mb-8">
            Sepertinya halaman yang Anda cari telah tersedot ke dalam *black hole* atau memang tidak pernah ada. Mari kembali ke jalur yang benar.
        </p>

        {{-- Tombol Aksi --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Kembali ke Beranda
            </a>
            <button onclick="history.back()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Halaman Sebelumnya
            </button>
        </div>
    </div>

</body>
</html>