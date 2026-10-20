<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#020617">
    <meta name="color-scheme" content="light dark">
    <title>@yield('title', 'Dashboard — Nabla Fisika')</title>
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
    @stack('styles')
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased selection:bg-blue-200 selection:text-blue-950 dark:bg-slate-950 dark:text-slate-100 dark:selection:bg-blue-500/40 dark:selection:text-white">

    {{-- NAVBAR --}}
    <header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/80 bg-white/85 backdrop-blur-xl supports-[backdrop-filter]:bg-white/75 dark:border-slate-800/80 dark:bg-slate-950/85 dark:supports-[backdrop-filter]:bg-slate-950/75">
        <nav class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-3 px-4 sm:px-6 lg:px-8" aria-label="Navigasi utama">
            <a href="{{ url('/') }}" class="group flex shrink-0 items-center gap-2.5 rounded-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500" aria-label="Nabla Fisika — Beranda">
                <img src="{{ asset('images/logo1.png') }}" alt="Nabla Fisika" class="h-9 w-auto transition-transform duration-200 group-hover:scale-105" loading="eager">
                <span class="hidden text-sm font-extrabold tracking-tight text-slate-900 dark:text-white sm:block">Nabla <span class="text-blue-600 dark:text-blue-400">Fisika</span></span>
            </a>

            <div class="hidden items-center gap-1 md:flex">
                <a href="{{ route('student.dashboard') }}" @class([
                    'rounded-xl px-4 py-2 text-sm font-semibold transition-colors',
                    'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-300' => request()->routeIs('student.dashboard'),
                    'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white' => !request()->routeIs('student.dashboard'),
                ]) @if(request()->routeIs('student.dashboard')) aria-current="page" @endif>
                    Dashboard
                </a>
                <a href="{{ route('student.catalog') }}" @class([
                    'rounded-xl px-4 py-2 text-sm font-semibold transition-colors',
                    'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-300' => request()->routeIs('student.catalog*'),
                    'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white' => !request()->routeIs('student.catalog*'),
                ]) @if(request()->routeIs('student.catalog*')) aria-current="page" @endif>
                    Katalog
                </a>
                <a href="{{ route('student.certificate.index') }}" @class([
                    'rounded-xl px-4 py-2 text-sm font-semibold transition-colors',
                    'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-300' => request()->routeIs('student.certificate.*'),
                    'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white' => !request()->routeIs('student.certificate.*'),
                ]) @if(request()->routeIs('student.certificate.*')) aria-current="page" @endif>
                    Sertifikat
                </a>
            </div>

            <div class="flex items-center gap-1.5 sm:gap-2">
                {{-- Theme toggle --}}
                <button id="themeToggle" type="button" aria-label="Aktifkan mode terang" title="Ganti tema" class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-slate-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                    <svg id="iconSun" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="4" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="1.8" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg>
                    <svg id="iconMoon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.5 15.3A8.5 8.5 0 0 1 8.7 3.5 8.7 8.7 0 1 0 20.5 15.3Z"/></svg>
                </button>

                {{-- Mobile navigation --}}
                <button id="mobileNavToggle" type="button" aria-controls="mobileNav" aria-expanded="false" aria-label="Buka navigasi" class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:text-slate-300 dark:hover:bg-slate-800 md:hidden">
                    <svg id="mobileMenuIcon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                {{-- User dropdown --}}
                <div class="relative" id="userDropdown">
                    <button id="userDropdownBtn" type="button" aria-controls="userDropdownMenu" aria-expanded="false" class="flex min-h-10 items-center gap-2 rounded-xl p-1.5 pr-2 transition hover:bg-slate-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:hover:bg-slate-800">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-blue-600 to-cyan-500 text-sm font-bold text-white shadow-sm shadow-blue-500/20">
                            {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
                        </span>
                        <span class="hidden max-w-[120px] truncate text-sm font-semibold text-slate-700 dark:text-slate-200 sm:block">{{ auth()->user()->name ?? 'Mahasiswa' }}</span>
                        <svg class="hidden h-4 w-4 text-slate-400 sm:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m7 10 5 5 5-5"/></svg>
                    </button>

                    <div id="userDropdownMenu" class="absolute right-0 top-full mt-2 hidden w-64 origin-top-right overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-900/10 ring-1 ring-black/5 dark:border-slate-800 dark:bg-slate-900 dark:shadow-black/30" role="menu" aria-labelledby="userDropdownBtn">
                        <div class="border-b border-slate-100 px-4 py-4 dark:border-slate-800">
                            <p class="truncate text-sm font-bold text-slate-900 dark:text-white">{{ auth()->user()->name ?? 'Mahasiswa' }}</p>
                            <p class="mt-0.5 truncate text-xs text-slate-500 dark:text-slate-400">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                        <div class="p-1.5">
                            <a href="{{ route('student.profile') }}" role="menuitem" class="block rounded-xl px-3 py-2.5 text-sm text-slate-700 transition hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">Profil saya</a>
                            <a href="{{ route('student.certificate.index') }}" role="menuitem" class="block rounded-xl px-3 py-2.5 text-sm text-slate-700 transition hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800">Sertifikat saya</a>
                        </div>
                        <div class="border-t border-slate-100 p-1.5 dark:border-slate-800">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" role="menuitem" class="w-full rounded-xl px-3 py-2.5 text-left text-sm font-medium text-rose-600 transition hover:bg-rose-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-rose-500 dark:text-rose-400 dark:hover:bg-rose-500/10">Keluar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Mobile nav panel --}}
        <div id="mobileNav" class="hidden border-t border-slate-200 bg-white/95 px-4 py-3 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-950/95 md:hidden">
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                <a href="{{ route('student.dashboard') }}" class="rounded-xl px-3 py-3 text-sm font-semibold {{ request()->routeIs('student.dashboard') ? 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-300' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800' }}">Dashboard</a>
                <a href="{{ route('student.catalog') }}" class="rounded-xl px-3 py-3 text-sm font-semibold {{ request()->routeIs('student.catalog*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-300' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800' }}">Katalog kelas</a>
                <a href="{{ route('student.certificate.index') }}" class="rounded-xl px-3 py-3 text-sm font-semibold {{ request()->routeIs('student.certificate.*') ? 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-300' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-800' }}">Sertifikat</a>
            </div>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main id="main-content" class="min-h-[calc(100vh-9rem)] px-4 pb-10 pt-24 sm:px-6 sm:pt-28 lg:px-8">
        <div class="mx-auto w-full max-w-7xl">
            @if (session('success'))
                <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300" role="status">
                    <svg class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4 4L19 6"/></svg>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900/70">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-2 px-4 py-5 text-center sm:flex-row sm:px-6 sm:text-left lg:px-8">
            <p class="text-xs leading-relaxed text-slate-500 dark:text-slate-400">© {{ date('Y') }} <span class="font-semibold text-slate-700 dark:text-slate-300">Nabla Fisika</span> — HIMAFI UNUD. Seluruh hak cipta dilindungi.</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">Dashboard Mahasiswa <span class="mx-1 text-slate-300 dark:text-slate-700">•</span> <span class="font-mono">v0.2</span></p>
        </div>
    </footer>

    <script>
        (() => {
            const root = document.documentElement;
            const toggle = document.getElementById('themeToggle');
            const sun = document.getElementById('iconSun');
            const moon = document.getElementById('iconMoon');

            const getSavedTheme = () => {
                try { return localStorage.getItem('theme'); } catch (_) { return null; }
            };
            const saveTheme = (theme) => {
                try { localStorage.setItem('theme', theme); } catch (_) {}
            };
            const applyTheme = (dark) => {
                root.classList.toggle('dark', dark);
                sun?.classList.toggle('hidden', !dark);
                moon?.classList.toggle('hidden', dark);
                toggle?.setAttribute('aria-label', dark ? 'Aktifkan mode terang' : 'Aktifkan mode gelap');
                document.querySelector('meta[name="theme-color"]')?.setAttribute('content', dark ? '#020617' : '#f8fafc');
            };

            applyTheme(getSavedTheme() ? getSavedTheme() === 'dark' : true);
            toggle?.addEventListener('click', () => {
                const dark = !root.classList.contains('dark');
                applyTheme(dark);
                saveTheme(dark ? 'dark' : 'light');
            });
        })();

        (() => {
            const btn = document.getElementById('userDropdownBtn');
            const menu = document.getElementById('userDropdownMenu');
            if (!btn || !menu) return;

            const closeMenu = () => {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            };
            btn.addEventListener('click', (event) => {
                event.stopPropagation();
                const willOpen = menu.classList.contains('hidden');
                menu.classList.toggle('hidden', !willOpen);
                btn.setAttribute('aria-expanded', String(willOpen));
            });
            document.addEventListener('click', closeMenu);
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeMenu();
                    btn.focus();
                }
            });
            menu.addEventListener('click', (event) => event.stopPropagation());
        })();

        (() => {
            const btn = document.getElementById('mobileNavToggle');
            const panel = document.getElementById('mobileNav');
            if (!btn || !panel) return;

            const closePanel = () => {
                panel.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
                btn.setAttribute('aria-label', 'Buka navigasi');
            };
            btn.addEventListener('click', () => {
                const willOpen = panel.classList.contains('hidden');
                panel.classList.toggle('hidden', !willOpen);
                btn.setAttribute('aria-expanded', String(willOpen));
                btn.setAttribute('aria-label', willOpen ? 'Tutup navigasi' : 'Buka navigasi');
            });
            panel.querySelectorAll('a').forEach(link => link.addEventListener('click', closePanel));
            document.addEventListener('keydown', event => { if (event.key === 'Escape') closePanel(); });
            window.addEventListener('resize', () => { if (window.innerWidth >= 768) closePanel(); });
        })();

        (() => {
            const elements = document.querySelectorAll('.reveal');
            if (!elements.length) return;
            if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                elements.forEach(element => element.classList.add('is-visible'));
                return;
            }
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
            elements.forEach(element => observer.observe(element));
        })();
    </script>

    @stack('scripts')
</body>
</html>
