@extends('layouts.student')

@section('title', 'Dashboard — Nabla Fisika')

@section('content')

{{-- WELCOME HERO — Nabla Fisika --}}
<section class="relative isolate mb-8 overflow-hidden rounded-[2rem] border border-blue-400/20 bg-slate-950 text-white shadow-2xl shadow-blue-950/10">
    {{-- Background layers --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,rgba(14,165,233,0.24),transparent_48%),linear-gradient(120deg,#07152f_0%,#102b61_48%,#111638_100%)]"></div>
        <div class="absolute -right-20 -top-28 h-80 w-80 rounded-full bg-blue-500/20 blur-3xl"></div>
        <div class="absolute -bottom-32 left-1/3 h-80 w-80 rounded-full bg-cyan-400/10 blur-3xl"></div>
        <div class="absolute inset-0 opacity-[0.08] [background-image:radial-gradient(rgba(255,255,255,0.9)_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="absolute right-[-3rem] top-1/2 hidden -translate-y-1/2 select-none font-mono text-[18rem] font-extralight leading-none text-white/[0.035] lg:block">∑</div>
        <div class="absolute right-28 top-12 hidden select-none font-mono text-2xl text-cyan-100/20 lg:block">E = mc²</div>
        <div class="absolute bottom-12 right-16 hidden select-none font-mono text-3xl text-white/10 lg:block">∇ × B</div>
    </div>

    <div class="relative grid gap-8 p-6 sm:p-8 lg:grid-cols-[minmax(0,1fr)_280px] lg:items-center lg:p-10 xl:p-12">
        {{-- Main welcome content --}}
        <div class="min-w-0">
            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-cyan-200/20 bg-white/[0.07] px-3.5 py-1.5 text-[11px] font-semibold tracking-[0.16em] text-cyan-100 shadow-sm backdrop-blur">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-300 opacity-60"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-300"></span>
                </span>
                RUANG BELAJAR NABLA
            </div>

            <p class="mb-2 text-sm font-medium text-blue-100/80">Selamat datang kembali,</p>
            <h1 class="max-w-3xl break-words text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                {{ auth()->user()->name ?? 'Mahasiswa' }}
                <span class="inline-block text-cyan-300">👋</span>
            </h1>
            <p class="mt-4 max-w-2xl text-sm leading-7 text-blue-100/80 sm:text-base">
                Satu konsep baru setiap hari membawa kamu lebih dekat pada pemahaman yang lebih dalam.
                Lanjutkan perjalananmu menjelajahi dunia fisika.
            </p>

            {{-- Weekly progress --}}
            <div class="mt-7 max-w-xl rounded-2xl border border-white/10 bg-slate-950/35 p-4 sm:p-5 backdrop-blur-md">
                <div class="mb-3 flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-2.5">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-cyan-300/10 text-cyan-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-sm font-semibold text-white">Target belajar mingguan</p>
                            <p class="mt-0.5 text-xs text-blue-100/60">Progress belajarmu minggu ini</p>
                        </div>
                    </div>
                    <span class="font-mono text-sm font-bold text-cyan-200">37,5%</span>
                </div>
                <div class="h-2.5 overflow-hidden rounded-full bg-white/10">
                    <div class="h-full rounded-full bg-gradient-to-r from-cyan-300 via-sky-400 to-blue-400 shadow-[0_0_16px_rgba(34,211,238,0.35)]" style="width:37.5%" role="progressbar" aria-label="Target belajar mingguan" aria-valuemin="0" aria-valuemax="100" aria-valuenow="37.5"></div>
                </div>
                <div class="mt-2.5 flex items-center justify-between gap-2 text-[11px] text-blue-100/60">
                    <span>3 dari 8 modul selesai</span>
                    <span>Terus pertahankan momentum!</span>
                </div>
            </div>
        </div>

        {{-- Action panel --}}
        <aside class="relative">
            <div class="rounded-2xl border border-white/15 bg-white/[0.07] p-5 shadow-xl backdrop-blur-md sm:p-6">
                <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-300 to-blue-500 text-slate-950 shadow-lg shadow-cyan-950/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-cyan-200/80">Mulai eksplorasi</p>
                <h2 class="mt-2 text-xl font-bold leading-snug text-white">Temukan konsep fisika berikutnya.</h2>
                <p class="mt-2 text-sm leading-6 text-blue-100/65">Pilih kelas, pelajari materi, dan bangun pemahaman selangkah demi selangkah.</p>

                <a href="{{ route('student.catalog') }}"
                   class="group mt-6 inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-3 text-sm font-bold text-blue-950 shadow-lg shadow-slate-950/20 transition duration-200 hover:-translate-y-0.5 hover:bg-cyan-50 hover:shadow-cyan-950/20 focus:outline-none focus-visible:ring-2 focus-visible:ring-cyan-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                    Jelajahi katalog
                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                    </svg>
                </a>
                <div class="mt-4 flex items-center justify-center gap-2 text-xs text-blue-100/65">
                    <svg class="h-4 w-4 text-cyan-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3z"/>
                    </svg>
                    <span>23+ modul fisika tersedia</span>
                </div>
            </div>
        </aside>
    </div>
</section>

{{-- ============ STATS  ============ --}}
<section class="relative z-20 -mt-12 px-2 sm:px-4 mb-10">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 lg:gap-5">
        <x-student.stat-card label="Kelas Aktif" value="2" icon="book" color="blue" />
        <x-student.stat-card label="Jam Belajar" value="24" icon="clock" color="green" trend="+3 jam" />
        <x-student.stat-card label="Sertifikat" value="1" icon="certificate" color="amber" />
        <x-student.stat-card label="Streak" value="7 hari" icon="fire" color="purple" />
    </div>
</section>

{{-- ============ KELAS YANG DIIKUTI ============ --}}
<section class="mb-10">
    <div class="flex items-end justify-between mb-5">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-blue-600 dark:bg-blue-400"></span>
                <p class="text-[11px] font-mono text-blue-600 dark:text-blue-400 font-bold tracking-widest uppercase">LANJUT BELAJAR</p>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Kelas yang sedang kamu ikuti</h2>
        </div>
        <a href="#" class="inline-flex items-center gap-1 text-xs sm:text-sm font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition group">
            <span>Lihat Semua</span>
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </a>
    </div>

    @php
        $activeCourses = [
            [
                'title' => 'Mekanika Klasik',
                'level' => 'Dasar',
                'category' => 'Fisika Inti',
                'progress' => 62,
                'totalModules' => 8,
                'completedModules' => 5,
                'nextModule' => 'Modul 6 — Dinamika Rotasi',
                'accent' => 'blue',
            ],
            [
                'title' => 'Elektromagnetisme',
                'level' => 'Menengah',
                'category' => 'Fisika Inti',
                'progress' => 30,
                'totalModules' => 10,
                'completedModules' => 3,
                'nextModule' => 'Modul 4 — Hukum Gauss',
                'accent' => 'purple',
            ],
            [
                'title' => 'Fisika Komputasi',
                'level' => 'Lanjut',
                'category' => 'Fisika Komputasi',
                'progress' => 15,
                'totalModules' => 12,
                'completedModules' => 2,
                'nextModule' => 'Modul 3 — Metode Euler',
                'accent' => 'amber',
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @foreach ($activeCourses as $course)
            <x-student.progress-card
                :title="$course['title']"
                :level="$course['level']"
                :category="$course['category']"
                :progress="$course['progress']"
                :totalModules="$course['totalModules']"
                :completedModules="$course['completedModules']"
                :nextModule="$course['nextModule']"
                :accent="$course['accent']"
            />
        @endforeach
    </div>
</section>

{{-- ============ SERTIFIKAT ============ --}}
<section class="mb-10 p-5 sm:p-7 rounded-2xl bg-slate-50/80 dark:bg-slate-900/40 border border-slate-200/80 dark:border-slate-800">
    <div class="flex items-end justify-between mb-5">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                <p class="text-[11px] font-mono text-amber-600 dark:text-amber-400 font-bold tracking-widest uppercase">PENCAPAIAN</p>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Sertifikat Terbaru</h2>
        </div>
        <a href="{{ route('student.certificate.index') ?? '#' }}" class="inline-flex items-center gap-1 text-xs sm:text-sm font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition group">
            <span>Semua Sertifikat</span>
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </a>
    </div>

    @php
        $certificates = [
            [
                'title' => 'Fisika Dasar — Pengantar Mekanika',
                'issuedAt' => '10 Okt 2026',
                'score' => 92,
                'uniqueId' => 'NBL-A7K2M',
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @foreach ($certificates as $cert)
            <x-student.certificate-card
                :title="$cert['title']"
                :issuedAt="$cert['issuedAt']"
                :score="$cert['score']"
                :uniqueId="$cert['uniqueId']"
            />
        @endforeach

        {{-- Empty State Card --}}
        <a href="{{ route('student.catalog') ?? '#' }}"
           class="group flex flex-col items-center justify-center p-6 rounded-2xl border-2 border-dashed border-slate-300 dark:border-slate-800 hover:border-blue-500 dark:hover:border-blue-500 bg-white/60 dark:bg-slate-900/60 hover:bg-blue-50/40 dark:hover:bg-blue-950/20 transition-all text-center min-h-[200px]">
            <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center mb-3 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <p class="text-xs sm:text-sm font-bold text-slate-800 dark:text-slate-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                Raih Sertifikat Berikutnya
            </p>
            <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1 max-w-[200px] leading-relaxed">
                Selesaikan kelas aktifmu untuk klaim sertifikat resmi
            </p>
        </a>
    </div>
</section>

{{-- ============ AKTIVITAS + AKSES CEPAT ============ --}}
<section class="mb-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">

        {{-- Heatmap — 2 kolom --}}
        <div class="lg:col-span-2 p-5 sm:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <h3 class="font-bold text-base sm:text-lg text-slate-900 dark:text-white">Aktivitas Belajar</h3>
                </div>
                <span class="text-xs font-mono text-slate-500 dark:text-slate-400">26 Minggu</span>
            </div>
            <div class="overflow-x-auto pb-2 -mb-2">
                <x-student.heatmap :weeks="26" />
            </div>
        </div>

        {{-- Akses Cepat --}}
        <div class="lg:col-span-1 p-5 sm:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col">
            <div class="mb-4">
                <p class="text-[10px] font-mono text-blue-600 dark:text-blue-400 font-bold tracking-widest uppercase mb-0.5">SHORTCUT</p>
                <h3 class="font-bold text-base sm:text-lg text-slate-900 dark:text-white">Akses Cepat</h3>
            </div>

            <div class="flex flex-col gap-2.5 flex-1 justify-between">

                {{-- Katalog --}}
                <a href="{{ route('student.catalog') ?? '#' }}"
                   class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 hover:bg-blue-50 dark:hover:bg-blue-950/40 border border-slate-200/80 dark:border-slate-700/80 hover:border-blue-300 dark:hover:border-blue-700 transition-all">
                    <div class="w-9 h-9 rounded-lg bg-blue-100 dark:bg-blue-950 flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-xs text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">Katalog Kelas</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 truncate">Jelajahi kelas baru</p>
                    </div>
                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-0.5 transition-all shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- Sertifikat --}}
                <a href="{{ route('student.certificate.index') ?? '#' }}"
                   class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 border border-slate-200/80 dark:border-slate-700/80 hover:border-emerald-300 dark:hover:border-emerald-700 transition-all">
                    <div class="w-9 h-9 rounded-lg bg-emerald-100 dark:bg-emerald-950 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-xs text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">Sertifikat Saya</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 truncate">Lihat & unduh</p>
                    </div>
                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-emerald-600 group-hover:translate-x-0.5 transition-all shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- Profil --}}
                <a href="{{ route('student.profile') ?? '#' }}"
                   class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 hover:bg-purple-50 dark:hover:bg-purple-950/40 border border-slate-200/80 dark:border-slate-700/80 hover:border-purple-300 dark:hover:border-purple-700 transition-all">
                    <div class="w-9 h-9 rounded-lg bg-purple-100 dark:bg-purple-950 flex items-center justify-center text-purple-600 dark:text-purple-400 shrink-0 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-xs text-slate-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition">Profil Saya</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 truncate">Atur akun</p>
                    </div>
                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-purple-600 group-hover:translate-x-0.5 transition-all shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- Diskusi --}}
                <a href="#"
                   class="group flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 hover:bg-amber-50 dark:hover:bg-amber-950/40 border border-slate-200/80 dark:border-slate-700/80 hover:border-amber-300 dark:hover:border-amber-700 transition-all">
                    <div class="w-9 h-9 rounded-lg bg-amber-100 dark:bg-amber-950 flex items-center justify-center text-amber-600 dark:text-amber-400 shrink-0 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="font-bold text-xs text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition">Diskusi</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 truncate">Tanya & jawab</p>
                    </div>
                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-amber-600 group-hover:translate-x-0.5 transition-all shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection