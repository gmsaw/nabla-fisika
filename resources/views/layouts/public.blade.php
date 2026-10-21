<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>@yield('title', 'Verifikasi Sertifikat — Nabla Fisika')</title>
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
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased selection:bg-blue-200 selection:text-blue-950 dark:bg-slate-950 dark:text-slate-100 dark:selection:bg-blue-500/40 dark:selection:text-white flex flex-col">

    {{-- HEADER MINIMALIS --}}
    <header class="w-full py-6 px-4 sm:px-6 lg:px-8 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900">
        <div class="max-w-5xl mx-auto flex items-center justify-center sm:justify-start gap-3">
            <img src="{{ asset('images/logo1.png') }}" alt="Nabla Fisika" class="h-10 w-auto">
            <div>
                <h1 class="text-lg font-extrabold tracking-tight text-slate-900 dark:text-white leading-tight">Nabla Fisika</h1>
                <p class="text-[10px] font-semibold text-slate-500 uppercase tracking-widest">HIMAFI UNUD</p>
            </div>
        </div>
    </header>

    {{-- KONTEN UTAMA --}}
    <main class="flex-1 w-full py-12 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    {{-- FOOTER MINIMALIS --}}
    <footer class="w-full py-6 px-4 sm:px-6 lg:px-8 border-t border-slate-200 dark:border-slate-800">
        <div class="max-w-5xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-slate-500">
            <p>© {{ date('Y') }} Nabla Fisika — HIMAFI UNUD. Seluruh hak cipta dilindungi.</p>
            <a href="{{ url('/') }}" class="hover:text-blue-600 transition">Kembali ke Beranda</a>
        </div>
    </footer>

    <script>
        // Theme Toggle Script (Optional)
        const toggle = document.getElementById('themeToggle');
        const root = document.documentElement;
        toggle?.addEventListener('click', () => {
            const isDark = !root.classList.contains('dark');
            root.classList.toggle('dark', isDark);
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    </script>
</body>
</html>