@extends('layouts.guest')

@section('title', 'Nabla Fisika — Platform Pembelajaran Fisika HIMAFI UNUD')

@section('content')

    {{-- HERO --}}
    <x-hero />

    {{-- MARQUEE --}}
    <x-marquee :items="[
        'Fisika Inti', 'Fisika Komputasi', 'Fisika Medis', 'Geofisika',
        'Fisika Material', 'Astrofisika', 'Biofisika', 'Fisika Instrumentasi'
    ]" />

    {{-- FITUR --}}
    <section id="fitur" class="py-14 sm:py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto">
            <x-section-header
                number="01"
                label="01 — FITUR"
                title="Kenapa Nabla Fisika?"
                description="Dirancang untuk mahasiswa fisika UNUD dan publik yang ingin belajar dengan arah yang jelas."
            />

            @php
                $features = [
                    ['📚', 'Katalog Terstruktur', 'Kelas diorganisir berdasarkan peminatan dan tingkat kesulitan — Dasar, Menengah, Lanjut.'],
                    ['🔒', 'Gated Progression', 'Setiap modul terkunci sampai kamu menyelesaikan materi dan lulus kuis sebelumnya.'],
                    ['📝', 'Kuis & Ujian Acak', 'Soal diambil acak dari bank soal dengan timer dan passing grade yang bisa diulang.'],
                    ['🏅', 'Sertifikat Resmi', 'Dapatkan sertifikat PDF dengan QR code yang bisa diverifikasi publik kapan saja.'],
                    ['💬', 'Diskusi Kelas', 'Tanya jawab langsung dengan lecturer dan teman sekelas lewat thread diskusi.'],
                    ['⚡', 'XP & Badge', 'Kumpulkan XP tiap aksi belajar, raih badge, dan pantau konsistensi lewat heatmap.'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($features as $i => [$icon, $title, $desc])
                    <x-feature-card :index="$i" :icon="$icon" :title="$title" :description="$desc" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Divider --}}
    <div class="relative h-16 sm:h-24 overflow-hidden bg-white dark:bg-slate-900">
        <svg class="absolute inset-0 w-full h-full text-slate-100 dark:text-slate-950" viewBox="0 0 1440 100" preserveAspectRatio="none" aria-hidden="true">
            <path fill="currentColor" d="M0,50 C240,0 480,100 720,50 C960,0 1200,100 1440,50 L1440,100 L0,100 Z"/>
        </svg>
    </div>

    {{-- KATALOG --}}
    <section id="katalog" class="py-14 sm:py-20 px-4 sm:px-6 lg:px-8 bg-slate-100/60 dark:bg-slate-950">
        <div class="max-w-7xl mx-auto">
            <x-section-header
                number="02"
                label="02 — KATALOG"
                title="Kelas Populer"
                description="Mulai dari sini atau jelajahi seluruh katalog."
                actionUrl="#"
                actionLabel="Lihat Semua →"
            />

            @php
                $courses = [
                    ['title' => 'Mekanika Klasik', 'level' => 'Dasar', 'category' => 'Fisika Inti', 'modules' => 8, 'duration' => '12 jam', 'students' => 128, 'desc' => 'Hukum Newton, kinematika, dinamika, dan energi — fondasi wajib semua cabang fisika.', 'accent' => 'blue'],
                    ['title' => 'Elektromagnetisme', 'level' => 'Menengah', 'category' => 'Fisika Inti', 'modules' => 10, 'duration' => '18 jam', 'students' => 94, 'desc' => 'Medan listrik, medan magnet, induksi Faraday, dan persamaan Maxwell secara bertahap.', 'accent' => 'purple'],
                    ['title' => 'Fisika Komputasi', 'level' => 'Lanjut', 'category' => 'Fisika Komputasi', 'modules' => 12, 'duration' => '22 jam', 'students' => 67, 'desc' => 'Metode numerik, simulasi sistem fisika, dan visualisasi data dengan Python.', 'accent' => 'amber'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($courses as $i => $c)
                    <x-course-card
                        :index="$i"
                        :title="$c['title']"
                        :description="$c['desc']"
                        :level="$c['level']"
                        :category="$c['category']"
                        :modules="$c['modules']"
                        :duration="$c['duration']"
                        :students="$c['students']"
                        :accent="$c['accent']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    {{-- CARA KERJA — ROKET MENJELAJAHI PLANET (SVG MOTION)   --}}
    <section id="cara-kerja" class="py-14 sm:py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-slate-900 relative overflow-hidden">

        {{-- Bintang-bintang kecil --}}
        <div class="absolute inset-0 pointer-events-none select-none" aria-hidden="true">
            @for ($i = 0; $i < 25; $i++)
                <span class="absolute rounded-full bg-slate-400 dark:bg-white animate-twinkle"
                      style="width: {{ rand(1, 3) }}px; height: {{ rand(1, 3) }}px;
                             top: {{ rand(5, 95) }}%; left: {{ rand(2, 98) }}%;
                             animation-delay: -{{ rand(0, 30) / 10 }}s;
                             opacity: 0.3;"></span>
            @endfor
        </div>

        <div class="max-w-7xl mx-auto relative">
            <x-section-header
                number="03"
                label="03 — ALUR"
                title="Cara Kerja"
                description="Empat langkah sederhana menuju sertifikat."
            />

            @php
                $steps = [
                    ['1', '📝', 'Daftar & Verifikasi', 'Registrasi via email atau SSO himafiunud.com, lalu verifikasi email.'],
                    ['2', '🎯', 'Pilih Kelas', 'Jelajahi katalog, baca silabus, dan enroll kelas sesuai minatmu.'],
                    ['3', '📖', 'Belajar & Kuis', 'Selesaikan modul berurutan, lulus kuis tiap modul (≥75).'],
                    ['4', '🏅', 'Ujian & Sertifikat', 'Lulus ujian akhir, sertifikat PDF + QR langsung terbit otomatis.'],
                ];
            @endphp

            {{-- Wrapper animasi roket — hanya desktop --}}
            <div class="hidden md:block reveal reveal-delay-2 relative h-28 mb-4">

                {{-- SVG lintasan + roket --}}
                <svg class="w-full h-full overflow-visible" viewBox="0 0 1000 112" preserveAspectRatio="none" aria-hidden="true">

                    <defs>
                        {{-- Gradient lintasan --}}
                        <linearGradient id="rocket-path-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%"   stop-color="#3b82f6" stop-opacity="0.05"/>
                            <stop offset="25%"  stop-color="#3b82f6" stop-opacity="0.5"/>
                            <stop offset="50%"  stop-color="#8b5cf6" stop-opacity="0.7"/>
                            <stop offset="75%"  stop-color="#ec4899" stop-opacity="0.5"/>
                            <stop offset="100%" stop-color="#3b82f6" stop-opacity="0.05"/>
                        </linearGradient>

                        {{-- Gradient api luar (kuning → oranye → merah) --}}
                        <linearGradient id="flame-gradient-outer" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%"   stop-color="#fbbf24"/>
                            <stop offset="50%"  stop-color="#fb923c"/>
                            <stop offset="100%" stop-color="#dc2626"/>
                        </linearGradient>

                        {{-- Gradient api dalam (putih → kuning) --}}
                        <linearGradient id="flame-gradient-inner" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%"   stop-color="#fef3c7"/>
                            <stop offset="100%" stop-color="#fbbf24"/>
                        </linearGradient>

                        {{-- Gradient badan roket --}}
                        <linearGradient id="body-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%"   stop-color="#ef4444"/>
                            <stop offset="50%"  stop-color="#f87171"/>
                            <stop offset="100%" stop-color="#dc2626"/>
                        </linearGradient>

                        {{-- Glow filter --}}
                        <filter id="rocket-glow" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur stdDeviation="2" result="blur"/>
                            <feMerge>
                                <feMergeNode in="blur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>

                        {{-- Path roket --}}
                        <path id="rocket-path"
                              d="M 30 56
                                 C 150 20, 250 90, 375 56
                                 S 600 20, 725 56
                                 S 900 90, 970 56"
                              fill="none"/>
                    </defs>

                    {{-- Garis putus-putus lintasan --}}
                    <use href="#rocket-path"
                         stroke="url(#rocket-path-gradient)"
                         stroke-width="1.5"
                         stroke-dasharray="6 8"
                         stroke-linecap="round"/>

                    {{-- Planet mini di lintasan --}}
                    <g class="text-purple-400/50 dark:text-purple-500/60">
                        <circle cx="250" cy="62" r="5" fill="currentColor"/>
                        <ellipse cx="250" cy="62" rx="10" ry="2.5" fill="none" stroke="currentColor" stroke-width="0.8" transform="rotate(-20 250 62)"/>
                    </g>
                    <g class="text-pink-400/50 dark:text-pink-500/60">
                        <circle cx="600" cy="46" r="4" fill="currentColor"/>
                        <ellipse cx="600" cy="46" rx="8" ry="2" fill="none" stroke="currentColor" stroke-width="0.8" transform="rotate(15 600 46)"/>
                    </g>
                    <g class="text-amber-400/50 dark:text-amber-500/60">
                        <circle cx="850" cy="62" r="3.5" fill="currentColor"/>
                    </g>

                    {{-- ROKET GROUP — mengikuti path lewat animateMotion --}}
                    <g filter="url(#rocket-glow)">
                        <g transform="rotate(45)">
                            {{-- API ROKET --}}
                            <g class="rocket-flame" style="transform-origin: 0px 8px;">
                                {{-- Api luar --}}
                                <path d="M -6 8
                                         Q -5 14 -3 16
                                         Q -1 20 0 22
                                         Q 1 20 3 16
                                         Q 5 14 6 8
                                         Z"
                                      fill="url(#flame-gradient-outer)"
                                      stroke="none"/>
                                {{-- Api tengah (kuning terang) --}}
                                <path d="M -4 8
                                         Q -2 13 0 16
                                         Q 2 13 4 8
                                         Z"
                                      fill="url(#flame-gradient-inner)"
                                      stroke="none"/>
                                {{-- Inti api (putih kekuningan) --}}
                                <path d="M -2 8
                                         Q -1 11 0 12.5
                                         Q 1 11 2 8
                                         Z"
                                      fill="#fef9c3"
                                      opacity="0.95"/>
                            </g>

                            {{-- BADAN ROKET --}}

                            {{-- Sirip kiri --}}
                            <path d="M -8 2 L -14 12 L -8 8 Z"
                                  fill="#dc2626"
                                  stroke="#7f1d1d"
                                  stroke-width="0.4"/>

                            {{-- Sirip kanan --}}
                            <path d="M 8 2 L 14 12 L 8 8 Z"
                                  fill="#dc2626"
                                  stroke="#7f1d1d"
                                  stroke-width="0.4"/>

                            {{-- Badan utama --}}
                            <path d="M -8 -18
                                     Q 0 -26 8 -18
                                     L 8 8
                                     Q 0 12 -8 8
                                     Z"
                                  fill="url(#body-gradient)"
                                  stroke="#1e293b"
                                  stroke-width="0.6"/>

                            {{-- Highlight kilap sisi kiri --}}
                            <path d="M -7 -16
                                     Q -2 -24 0 -24
                                     L 0 8
                                     Q -4 10 -7 6
                                     Z"
                                  fill="white"
                                  opacity="0.25"/>

                            {{-- Jendela --}}
                            <circle cx="0" cy="-6" r="3.2" fill="#0ea5e9" stroke="#1e293b" stroke-width="0.5"/>
                            <circle cx="-0.9" cy="-7" r="1.2" fill="white" opacity="0.75"/>

                            {{-- Garis detail horizontal di badan --}}
                            <line x1="-7" y1="2" x2="7" y2="2" stroke="#7f1d1d" stroke-width="0.3" opacity="0.5"/>
                        </g>

                        {{-- AnimateMotion: roket bergerak mengikuti path --}}
                        <animateMotion dur="8s" repeatCount="indefinite" rotate="auto">
                            <mpath href="#rocket-path"/>
                        </animateMotion>
                    </g>

                </svg>
            </div>

            {{-- Step cards --}}
            <div class="reveal reveal-delay-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 relative">
                @foreach ($steps as [$num, $icon, $title, $desc])
                    <x-step-card :number="$num" :icon="$icon" :title="$title" :description="$desc" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section class="py-14 sm:py-20 px-4 sm:px-6 lg:px-8 bg-slate-100/60 dark:bg-slate-950 relative overflow-hidden">
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none" aria-hidden="true">
            <span class="text-[20rem] sm:text-[30rem] font-serif leading-none text-slate-200/50 dark:text-slate-900/50">"</span>
        </div>

        <div class="max-w-7xl mx-auto relative">
            <x-section-header
                number="04"
                label="04 — TESTIMONI"
                title="Kata Mereka"
                description="Pengalaman mahasiswa yang sudah mencoba."
                :light="true"
            />

            @php
                $testimonials = [
                    ['Angga', 'Fisika 2022', 'Materi Mekanika yang dulu terlewat karena konversi MBKM sekarang bisa kupelajari utuh di sini. Sertifikatnya juga bisa diverifikasi publik!', 'A', '-rotate-1'],
                    ['Putri', 'Fisika 2021', 'Suka banget fitur gated progression-nya. Jadi benar-benar belajar berurutan, nggak loncat-loncat. XP dan badge bikin nagih!', 'P', 'rotate-1'],
                    ['Made', 'Fisika 2023', 'Platform gratisan tapi kualitasnya nggak murahan. Diskusi kelas aktif, dosennya fast response lewat email notifikasi.', 'M', '-rotate-1'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($testimonials as $i => [$name, $role, $quote, $initial, $rotate])
                    <x-testimonial-card
                        :index="$i"
                        :name="$name"
                        :role="$role"
                        :quote="$quote"
                        :initial="$initial"
                        :rotate="$rotate"
                    />
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-14 sm:py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-slate-900">
        <x-cta />
    </section>

    {{-- FAQ --}}
    <section id="faq" class="py-14 sm:py-20 px-4 sm:px-6 lg:px-8 bg-slate-100/60 dark:bg-slate-950">
        <div class="max-w-3xl mx-auto">
            <x-section-header
                number="05"
                label="05 — FAQ"
                title="Pertanyaan Umum"
                :light="true"
            />

            @php
                $faqs = [
                    ['Apakah Nabla Fisika gratis?', 'Ya, sepenuhnya gratis untuk mahasiswa fisika UNUD maupun publik. Tidak ada biaya tersembunyi.'],
                    ['Apakah sertifikatnya resmi?', 'Sertifikat diterbitkan HIMAFI UNUD dengan tanda tangan Kahima, Dosen Kemahasiswaan, dan Kaprodi, serta dapat diverifikasi via QR code unik.'],
                    ['Bisakah saya mengulang kuis?', 'Bisa, tanpa batas hingga mencapai passing grade minimal 75. Soal diambil acak dari bank soal setiap percobaan.'],
                    ['Apakah bisa belajar lintas peminatan?', 'Tentu. Semua kelas terbuka untuk siapa saja yang sudah verifikasi email, tidak terbatas peminatan.'],
                    ['Bagaimana cara verifikasi sertifikat?', 'Cukup scan QR code pada sertifikat atau kunjungi URL unik yang tercantum. Tidak perlu login.'],
                ];
            @endphp
            <div class="space-y-2.5 sm:space-y-3">
                @foreach ($faqs as $i => [$q, $a])
                    <x-faq-item :index="$i" :number="str_pad($i + 1, 2, '0', STR_PAD_LEFT)" :question="$q" :answer="$a" />
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Dark mode toggle
    (function() {
        const toggle = document.getElementById('themeToggle');
        const iconSun = document.getElementById('iconSun');
        const iconMoon = document.getElementById('iconMoon');
        const root = document.documentElement;

        function applyTheme(dark) {
            if (dark) {
                root.classList.add('dark');
                iconSun.classList.remove('hidden');
                iconMoon.classList.add('hidden');
            } else {
                root.classList.remove('dark');
                iconSun.classList.add('hidden');
                iconMoon.classList.remove('hidden');
            }
        }

        const saved = localStorage.getItem('theme');
        applyTheme(saved ? saved === 'dark' : true);

        toggle?.addEventListener('click', () => {
            const nowDark = root.classList.toggle('dark');
            localStorage.setItem('theme', nowDark ? 'dark' : 'light');
            applyTheme(nowDark);
        });
    })();

    // Mobile menu
    (function() {
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        const open = document.getElementById('menuIconOpen');
        const close = document.getElementById('menuIconClose');
        if (!btn || !menu) return;

        btn.addEventListener('click', () => {
            const isHidden = menu.classList.toggle('hidden');
            open.classList.toggle('hidden', !isHidden);
            close.classList.toggle('hidden', isHidden);
        });
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
                open.classList.remove('hidden');
                close.classList.add('hidden');
            });
        });
    })();

    // Scroll reveal
    (function() {
        const els = document.querySelectorAll('.reveal');
        if (!els.length) return;
        if (!('IntersectionObserver' in window)) {
            els.forEach(el => el.classList.add('is-visible'));
            return;
        }
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
        els.forEach(el => io.observe(el));
    })();
</script>
@endpush