<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>@yield('title', 'Autentikasi — Nabla Fisika')</title>
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
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased selection:bg-blue-200 selection:text-blue-950 dark:bg-slate-950 dark:text-slate-100 dark:selection:bg-blue-500/40 dark:selection:text-white flex flex-col lg:flex-row">

    {{-- ============ KOLOM KIRI: ILUSTRASI (Hanya Desktop) ============ --}}
    <div class="hidden lg:flex w-1/2 relative bg-slate-900 overflow-hidden items-center justify-center p-12">
        {{-- Background Layer --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-blue-900 to-slate-950"></div>
        <div class="absolute inset-0 bg-grid opacity-20" style="mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);"></div>
        <span class="absolute top-10 left-10 text-6xl font-mono text-white/5 rotate-12 select-none">E=mc²</span>
        <span class="absolute bottom-20 right-10 text-8xl font-mono text-white/5 -rotate-12 select-none">∇</span>
        
        {{-- Konten Kiri --}}
        <div class="relative text-center z-10 max-w-md">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 mb-8 group">
                <img src="{{ asset('images/logo1.png') }}" alt="Nabla Fisika" class="h-12 w-auto transition-transform group-hover:scale-105">
                <span class="text-2xl font-bold text-white">Nabla<span class="text-blue-400">Fisika</span></span>
            </a>
            <h1 class="text-4xl font-bold text-white mb-6 leading-tight">Tutup Gap Materi Fisikamu.</h1>
            <p class="text-blue-100 text-sm leading-relaxed mb-8">
                Bergabunglah dengan platform pembelajaran resmi HIMAFI UNUD. Jelajahi bidang peminatan, ukur progres, dan dapatkan sertifikat resmi.
            </p>
            {{-- Avatar Stack (Dummy) --}}
            <div class="flex items-center justify-center -space-x-3">
                <div class="w-10 h-10 rounded-full bg-blue-500 border-2 border-slate-900 flex items-center justify-center text-white text-xs font-bold">A</div>
                <div class="w-10 h-10 rounded-full bg-purple-500 border-2 border-slate-900 flex items-center justify-center text-white text-xs font-bold">P</div>
                <div class="w-10 h-10 rounded-full bg-emerald-500 border-2 border-slate-900 flex items-center justify-center text-white text-xs font-bold">M</div>
                <div class="w-10 h-10 rounded-full bg-slate-800 border-2 border-slate-900 flex items-center justify-center text-white text-xs font-bold">+</div>
            </div>
        </div>
    </div>

    {{-- ============ KOLOM KANAN: FORM ============ --}}
    <div class="flex-1 flex flex-col justify-center items-center p-6 sm:p-12 relative">
        
        {{-- Logo Mobile --}}
        <div class="lg:hidden absolute top-6 left-6 flex items-center gap-2">
            <img src="{{ asset('images/logo1.png') }}" alt="Nabla Fisika" class="h-8 w-auto">
            <span class="text-lg font-bold text-slate-900 dark:text-white">Nabla<span class="text-blue-600">Fisika</span></span>
        </div>

        {{-- Theme Toggle --}}
        <button id="themeToggle" class="absolute top-6 right-6 p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
            <svg id="iconSun" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <svg id="iconMoon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
        </button>

        {{-- Konten Form --}}
        <div class="w-full max-w-md">
            @yield('content')
        </div>

        {{-- Footer Bawah --}}
        <p class="absolute bottom-6 text-xs text-slate-500">© {{ date('Y') }} Nabla Fisika — HIMAFI UNUD</p>
    </div>

    <script>
        (() => {
            const toggle = document.getElementById('themeToggle');
            const sun = document.getElementById('iconSun');
            const moon = document.getElementById('iconMoon');
            const root = document.documentElement;
            const applyTheme = (dark) => {
                root.classList.toggle('dark', dark);
                sun.classList.toggle('hidden', !dark);
                moon.classList.toggle('hidden', dark);
            };
            applyTheme(localStorage.getItem('theme') !== 'light');
            toggle?.addEventListener('click', () => {
                const isDark = !root.classList.contains('dark');
                applyTheme(isDark);
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        })();
    </script>
</body>
</html>