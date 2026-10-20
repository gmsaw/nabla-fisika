@props([
    'typewriterPhrases' => [
        'Saya ingin mempelajari Machine Learning...',
        'Saya ingin memahami Mekanika Kuantum...',
        'Saya ingin memahami Fisika Medis...',
        'Saya ingin mendalami Elektromagnetisme...',
        'Saya ingin belajar Fisika Komputasi...',
        'Saya ingin mengejar Termodinamika...',
        'Saya ingin menguasai Relativitas Khusus...',
    ],
])

<section class="relative overflow-hidden
                pt-20 xs:pt-24 sm:pt-28 lg:pt-32
                pb-12 xs:pb-16 sm:pb-20 lg:pb-24
                px-4 sm:px-6 lg:px-8
                min-h-[calc(100vh-4rem)] sm:min-h-0 flex flex-col justify-center">

    {{-- Layer Background & Glow Effect --}}
    <div class="absolute inset-0 bg-gradient-to-b from-blue-100 via-blue-50 to-slate-50 dark:from-slate-950 dark:via-slate-950 dark:to-slate-950 -z-10"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2
                w-[300px] xs:w-[450px] sm:w-[650px] lg:w-[850px]
                h-[250px] xs:h-[350px] sm:h-[450px] lg:h-[550px]
                bg-blue-300/30 dark:bg-blue-600/15 rounded-full blur-3xl -z-10 pointer-events-none"></div>
    <div class="absolute inset-0 bg-grid bg-grid-mask -z-10 opacity-70 dark:opacity-40"></div>
    <div class="absolute inset-0 bg-noise -z-10 opacity-20"></div>

    {{-- Ornamen Rumus — Disembunyikan di Mobile, Tampil di Tablet/Laptop (sm+) --}}
    <div class="hidden sm:block absolute inset-0 pointer-events-none -z-10 select-none overflow-hidden" aria-hidden="true">
        <span class="absolute top-20 sm:top-24 left-2 sm:left-8 lg:left-12 text-xl sm:text-3xl lg:text-5xl font-mono text-blue-600/10 dark:text-blue-400/10 rotate-12">E=mc²</span>
        <span class="absolute top-36 sm:top-40 right-4 sm:right-10 lg:right-16 text-2xl sm:text-4xl lg:text-6xl font-mono text-blue-600/10 dark:text-blue-400/10 -rotate-6">∇</span>
        <span class="absolute bottom-28 sm:bottom-24 left-4 sm:left-12 lg:left-20 text-xl sm:text-3xl lg:text-5xl font-mono text-blue-600/10 dark:text-blue-400/10 -rotate-12">∫</span>
        <span class="absolute bottom-16 sm:bottom-16 right-4 sm:right-12 lg:right-20 text-lg sm:text-2xl lg:text-4xl font-mono text-blue-600/10 dark:text-blue-400/10 rotate-6">∑</span>
    </div>

    {{-- Sketsa Astronaut — Tampil mulai layar md+ --}}
    <div class="hidden md:block absolute
                right-4 lg:right-12 xl:right-20
                top-24 sm:top-28 lg:top-36
                pointer-events-none select-none -z-0 animate-float-soft" aria-hidden="true">
        <svg class="w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 text-slate-400/40 dark:text-slate-500/30"
             viewBox="0 0 100 100" fill="none"
             stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="50" cy="32" r="14"/>
            <path d="M41 30 Q50 24 59 30 Q60 35 50 38 Q40 35 41 30 Z" fill="currentColor" fill-opacity="0.15"/>
            <rect x="42" y="46" width="16" height="20" rx="3"/>
            <rect x="46" y="50" width="8" height="6" rx="1"/>
            <circle cx="48" cy="58" r="0.8" fill="currentColor"/>
            <circle cx="52" cy="58" r="0.8" fill="currentColor"/>
            <path d="M42 50 L30 56 L26 66"/>
            <circle cx="26" cy="67" r="1.5"/>
            <path d="M58 50 L70 56 L74 66"/>
            <circle cx="74" cy="67" r="1.5"/>
            <path d="M44 66 L42 78 L38 82"/>
            <path d="M56 66 L58 78 L62 82"/>
            <path d="M58 52 Q64 52 66 58" stroke-dasharray="1 1"/>
            <circle cx="80" cy="20" r="0.8" fill="currentColor"/>
            <circle cx="15" cy="40" r="0.6" fill="currentColor"/>
            <circle cx="22" cy="18" r="0.7" fill="currentColor"/>
        </svg>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10 w-full">

        {{-- Judul — Responsif Fluid via Clamp --}}
        <h1 class="font-bold tracking-tight leading-tight animate-fade-in-up text-slate-900 dark:text-white"
            style="font-size: clamp(1.65rem, 5vw + 0.5rem, 3.5rem); animation-delay: 0.15s;">
            {{ $title ?? 'Belajar Fisika' }}
            <span class="block text-blue-600 dark:text-blue-400 mt-1 sm:mt-2">{{ $subtitle ?? 'Terstruktur & Tersertifikasi' }}</span>
        </h1>

        {{-- Deskripsi --}}
        <p class="mt-3 xs:mt-4 sm:mt-6
                  text-xs xs:text-sm sm:text-base lg:text-lg
                  text-slate-600 dark:text-slate-400
                  max-w-2xl mx-auto leading-relaxed
                  animate-fade-in-up" style="animation-delay: 0.3s;">
            {{ $description ?? 'Tutup gap materi akibat konversi MBKM. Ukur progres belajarmu, dan dapatkan sertifikat resmi dan gratis untuk siapa saja.' }}
        </p>

        {{-- Area Search & CTA Button --}}
        <div class="mt-6 xs:mt-8 sm:mt-10 max-w-xl mx-auto animate-fade-in-up" style="animation-delay: 0.45s;">
            
            {{-- Form/Wrapper Serbaguna (Di HP Stack Vertikal, Di Tablet/PC Bersatu Samping-sampingan) --}}
            <div class="flex flex-col sm:flex-row items-center gap-2.5 sm:gap-2 
                        p-1.5 sm:p-2 
                        bg-white/80 dark:bg-slate-900/80 backdrop-blur-md 
                        rounded-2xl sm:rounded-full 
                        border border-slate-200/80 dark:border-slate-800 
                        shadow-lg shadow-slate-200/50 dark:shadow-none">
                
                {{-- Typewriter Search Display --}}
                <div class="relative w-full flex items-center pl-3.5 pr-2 py-2.5 sm:py-2 select-none pointer-events-none min-h-[44px]">
                    <div class="text-slate-400 mr-2.5 shrink-0">
                        <svg class="w-4 h-4 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <div class="text-slate-600 dark:text-slate-300 truncate text-xs sm:text-sm text-left w-full font-medium">
                        <span id="typewriterText"></span><span class="inline-block w-0.5 h-3.5 sm:h-4 bg-blue-600 ml-0.5 align-middle animate-blink"></span>
                    </div>
                </div>

                {{-- Tombol CTA --}}
                <a href="{{ route('register') ?? '#' }}"
                   class="w-full sm:w-auto shrink-0
                          flex items-center justify-center gap-2
                          px-5 sm:px-6 py-3 sm:py-2.5
                          rounded-xl sm:rounded-full
                          bg-blue-600 hover:bg-blue-700 active:scale-[0.98]
                          text-white text-xs sm:text-sm font-semibold
                          transition-all duration-200
                          shadow-md shadow-blue-600/25 hover:shadow-lg hover:shadow-blue-600/35
                          min-h-[44px] group">
                    <span>Mulai Belajar Gratis</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <p class="mt-2.5 sm:mt-3 text-[10px] xs:text-[11px] sm:text-xs text-slate-500 dark:text-slate-400 font-normal">
                Gratis · Tanpa kartu kredit · Verifikasi email sekali
            </p>
        </div>

        {{-- Statistik — Grid 3 Kolom Adaptif --}}
        <div class="mt-8 xs:mt-10 sm:mt-14 lg:mt-16
                    grid grid-cols-3 gap-2 xs:gap-3 sm:gap-6
                    max-w-xs xs:max-w-sm sm:max-w-lg mx-auto
                    animate-fade-in-up" style="animation-delay: 0.6s;">
            <x-ui.stat
                value="03"
                label="Kelas Tersedia"
                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />'
            />
            <x-ui.stat
                value="12"
                label="Sertifikat Terbit"
                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />'
            />
            <x-ui.stat
                value="100%"
                label="Gratis"
                icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />'
            />
        </div>
    </div>

    {{-- Typewriter Script --}}
    @push('scripts')
    <script>
        (function() {
            const textEl = document.getElementById('typewriterText');
            if (!textEl) return;

            const phrases = @json($typewriterPhrases);
            let phraseIndex = 0, charIndex = 0, isDeleting = false;
            const TYPE_SPEED = 55, DELETE_SPEED = 30, PAUSE_END = 1800, PAUSE_NEXT = 350;

            function tick() {
                const current = phrases[phraseIndex];
                const length = current.length;

                if (!isDeleting) {
                    charIndex++;
                    textEl.textContent = current.slice(0, charIndex);
                    if (charIndex === length) {
                        isDeleting = true;
                        setTimeout(tick, PAUSE_END);
                        return;
                    }
                    setTimeout(tick, TYPE_SPEED + Math.random() * 40);
                } else {
                    charIndex--;
                    textEl.textContent = current.slice(0, charIndex);
                    if (charIndex === 0) {
                        isDeleting = false;
                        phraseIndex = (phraseIndex + 1) % phrases.length;
                        setTimeout(tick, PAUSE_NEXT);
                        return;
                    }
                    setTimeout(tick, DELETE_SPEED);
                }
            }
            setTimeout(tick, 600);
        })();
    </script>
    @endpush
</section>