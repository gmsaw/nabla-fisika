<header class="fixed top-0 inset-x-0 z-50 bg-white/80 dark:bg-slate-950/80 backdrop-blur border-b border-slate-200/80 dark:border-slate-800/80">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

        <a href="{{ url('/') }}" class="flex items-center shrink-0 group">
            <img src="{{ asset('images/logo1.png') }}"
                 alt="Nabla Fisika"
                 class="h-8 sm:h-9 w-auto transition group-hover:scale-105">
        </a>

        <div class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-medium">
            <a href="#fitur" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">Fitur</a>
            <a href="#cara-kerja" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">Cara Kerja</a>
            <a href="#katalog" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">Katalog</a>
            <a href="#faq" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">FAQ</a>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            <button id="themeToggle" aria-label="Toggle dark mode"
                    class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition min-w-[40px] min-h-[40px] flex items-center justify-center">
                <svg id="iconSun" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg id="iconMoon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>
            <a href="{{ route('login') ?? '#' }}" class="hidden sm:inline-block px-3 lg:px-4 py-2 text-sm font-medium hover:text-blue-600 dark:hover:text-blue-400 transition">Masuk</a>
            <a href="{{ route('register') ?? '#' }}" class="px-3 sm:px-4 py-2 rounded-lg bg-blue-600 text-white text-xs sm:text-sm font-semibold hover:bg-blue-700 transition whitespace-nowrap">
                Daftar Gratis
            </a>
            <button id="mobileMenuBtn" aria-label="Toggle menu"
                    class="md:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition min-w-[40px] min-h-[40px] flex items-center justify-center">
                <svg id="menuIconOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="menuIconClose" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    <div id="mobileMenu" class="md:hidden hidden border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950">
        <div class="px-4 py-3 flex flex-col gap-1">
            <a href="#fitur" class="px-3 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition text-sm font-medium">Fitur</a>
            <a href="#cara-kerja" class="px-3 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition text-sm font-medium">Cara Kerja</a>
            <a href="#katalog" class="px-3 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition text-sm font-medium">Katalog</a>
            <a href="#faq" class="px-3 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition text-sm font-medium">FAQ</a>
            <a href="{{ route('login') ?? '#' }}" class="sm:hidden px-3 py-2.5 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition text-sm font-medium">Masuk</a>
        </div>
    </div>
</header>