<footer class="py-10 sm:py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-slate-100 to-slate-200 dark:from-slate-950 dark:to-slate-900 border-t border-slate-200 dark:border-slate-800 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none select-none" aria-hidden="true">
        <span class="absolute bottom-4 right-4 text-6xl font-mono text-slate-300/40 dark:text-slate-800/40">∇</span>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 relative">
        <div class="sm:col-span-2">
            <div class="flex items-center gap-2 font-bold text-base sm:text-lg mb-3 sm:mb-4">
                <img src="{{ asset('images/logo1.png') }}" alt="Nabla Fisika" class="h-8">
            </div>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 max-w-sm leading-relaxed">
                Platform pembelajaran fisika resmi HIMAFI UNUD. Belajar terstruktur, terukur, dan tersertifikasi.
            </p>
            <p class="mt-3 text-[10px] sm:text-xs text-slate-500 dark:text-slate-500 font-mono">
                ⌖ Dibuat di Denpasar, Bali · {{ date('Y') }}
            </p>
            <div class="flex gap-2 sm:gap-3 mt-4">
                @foreach (['ig', 'yt', 'gh'] as $social)
                    <a href="#" aria-label="{{ $social }}" class="w-9 h-9 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:border-blue-600 transition">
                        <span class="text-xs font-bold uppercase">{{ $social }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        <div>
            <h4 class="font-semibold mb-3 sm:mb-4 text-sm">Platform</h4>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-600 dark:text-slate-400">
                <li><a href="#katalog" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">Katalog</a></li>
                <li><a href="#cara-kerja" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">Cara Kerja</a></li>
                <li><a href="#faq" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">FAQ</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-semibold mb-3 sm:mb-4 text-sm">Verifikasi</h4>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-600 dark:text-slate-400">
                <li><a href="#" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">Cek Sertifikat</a></li>
                <li><a href="https://himafiunud.com" target="_blank" rel="noopener" class="link-underline hover:text-blue-600 dark:hover:text-blue-400 transition">HIMAFI UNUD</a></li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-8 sm:mt-10 pt-4 sm:pt-6 border-t border-slate-300 dark:border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-2 text-[10px] sm:text-xs text-slate-500 text-center sm:text-left relative">
        <p>© {{ date('Y') }} Nabla Fisika — HIMAFI UNUD. Seluruh hak cipta dilindungi.</p>
        <p>Dibuat dengan <span class="text-red-500">♥</span> oleh Tim Nabla · <span class="font-mono text-slate-400">v0.1-beta</span></p>
    </div>
</footer>