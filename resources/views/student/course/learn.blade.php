@extends('layouts.student')

@section('title', 'Belajar: Mekanika Klasik — Nabla Fisika')

@push('styles')
<!-- KaTeX untuk Render Rumus Matematika/LaTeX -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" crossorigin="anonymous">

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Transisi Halus untuk Layouting */
    .layout-transition {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endpush

@section('content')

@php
    $course = [
        'title' => 'Mekanika Klasik',
        'progress' => 62,
    ];

    // Daftar Item (Campuran Modul Materi & Kuis)
    $syllabus = [
        ['id' => 1, 'type' => 'materi', 'title' => 'Pengantar Mekanika & Besaran', 'status' => 'completed', 'duration' => '15 mnt'],
        ['id' => 2, 'type' => 'materi', 'title' => 'Kinematika Partikel', 'status' => 'completed', 'duration' => '20 mnt'],
        ['id' => 3, 'type' => 'materi', 'title' => 'Hukum Newton & Dinamika', 'status' => 'completed', 'duration' => '25 mnt'],
        ['id' => 4, 'type' => 'materi', 'title' => 'Kerja dan Energi', 'status' => 'completed', 'duration' => '18 mnt'],
        ['id' => 5, 'type' => 'materi', 'title' => 'Momentum Linier & Tumbukan', 'status' => 'completed', 'duration' => '30 mnt'],
        
        // Modul 6 sedang aktif
        ['id' => 6, 'type' => 'materi', 'title' => 'Dinamika Rotasi', 'status' => 'active', 'duration' => '45 mnt'],
        
        // Kuis 6 dikunci karena Modul 6 belum selesai
        ['id' => 7, 'type' => 'kuis', 'title' => 'Kuis: Dinamika Rotasi', 'status' => 'locked', 'duration' => '15 mnt'],
        
        ['id' => 8, 'type' => 'materi', 'title' => 'Keseimbangan Benda Tegar', 'status' => 'locked', 'duration' => '20 mnt'],
        ['id' => 9, 'type' => 'materi', 'title' => 'Ujian Akhir Komprehensif', 'status' => 'locked', 'duration' => '60 mnt'],
    ];

    // Konten yang sedang dibuka (Modul 6)
    $currentItem = $syllabus[5];
@endphp

{{-- Container Utama --}}
<div class="relative flex flex-col lg:flex-row items-start w-full min-h-[calc(100vh-6rem)]">

    {{-- ======================================================= --}}
    {{-- SIDEBAR KIRI (Daftar Materi & Kuis)                     --}}
    {{-- ======================================================= --}}
    <aside id="sidebar"
           class="layout-transition w-full lg:w-80 shrink-0 lg:sticky lg:top-24 z-30
                  fixed inset-y-0 left-0 bg-white dark:bg-slate-950 lg:bg-transparent lg:dark:bg-transparent
                  shadow-2xl lg:shadow-none overflow-y-auto lg:overflow-visible h-full lg:h-auto pt-20 lg:pt-0">

        {{-- Konten Sidebar --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 lg:rounded-2xl overflow-hidden shadow-sm m-4 lg:m-0">

            {{-- Header Info Kelas + Tombol Close (X) --}}
            <div class="p-5 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950/50 flex justify-between items-start">
                <div>
                    <h2 class="font-bold text-base sm:text-lg text-slate-900 dark:text-white leading-tight mb-1">{{ $course['title'] }}</h2>
                    <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-2">
                        <span>Progres Belajar</span>
                        <span class="font-bold text-blue-600 dark:text-blue-400">{{ $course['progress'] }}%</span>
                    </div>
                    <div class="w-32 h-1.5 rounded-full bg-slate-200 dark:bg-slate-800 overflow-hidden">
                        <div class="h-full rounded-full bg-blue-600 dark:bg-blue-500" style="width: {{ $course['progress'] }}%"></div>
                    </div>
                </div>

                {{-- Tombol Tutup Sidebar --}}
                <button id="closeSidebarBtn"
                        class="p-1.5 text-slate-400 hover:text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/30 rounded-lg transition shrink-0"
                        title="Tutup Sidebar" aria-label="Tutup Sidebar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- List Modul & Kuis --}}
            <div class="max-h-[65vh] overflow-y-auto hide-scrollbar">
                @foreach ($syllabus as $index => $item)
                    
                    {{-- ========================================== --}}
                    {{-- TAMPILAN UNTUK KUIS                        --}}
                    {{-- ========================================== --}}
                    @if($item['type'] === 'kuis')
                        @if($item['status'] === 'locked')
                            {{-- Kuis Terkunci (Tidak bisa diklik) --}}
                            <div class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 opacity-60 cursor-not-allowed bg-purple-50/30 dark:bg-purple-900/10 border-l-4 border-l-purple-300 dark:border-l-purple-800">
                                <div class="w-6 h-6 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-bold text-slate-500 dark:text-slate-400">{{ $item['title'] }}</p>
                                    <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-0.5">Selesaikan Modul 6 terlebih dahulu</p>
                                </div>
                            </div>
                        @else
                            {{-- Kuis Aktif (Bisa diklik) --}}
                            <a href="{{ route('student.quiz.show', ['slug' => 'mekanika-klasik', 'quiz' => $item['id']]) ?? '#' }}" 
                               class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 bg-purple-50 dark:bg-purple-900/20 hover:bg-purple-100 dark:hover:bg-purple-900/40 border-l-4 border-l-purple-500 transition group">
                                <div class="w-6 h-6 rounded-full bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs sm:text-sm font-bold text-purple-900 dark:text-purple-300 group-hover:text-purple-700 dark:group-hover:text-purple-200 transition">{{ $item['title'] }}</p>
                                    <div class="flex items-center justify-between mt-1">
                                        <span class="text-[10px] font-semibold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400">
                                            Skor: {{ $item['best_score'] ?? 0 }}
                                        </span>
                                        <span class="text-[10px] text-purple-600/70 dark:text-purple-400/70">{{ $item['duration'] }}</span>
                                    </div>
                                </div>
                            </a>
                        @endif
                    
                    {{-- ========================================== --}}
                    {{-- TAMPILAN UNTUK MATERI BIASA                --}}
                    {{-- ========================================== --}}
                    @else
                        @if($item['status'] === 'completed')
                            <a href="#" class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 hover:bg-slate-50 dark:hover:bg-slate-800/30 transition group">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-semibold text-slate-700 dark:text-slate-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">{{ $item['title'] }}</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-500 mt-0.5">{{ $item['duration'] }}</p>
                                </div>
                            </a>
                        @elseif($item['status'] === 'active')
                            <div class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 bg-blue-50 dark:bg-blue-500/10 border-l-4 border-l-blue-600 dark:border-l-blue-400">
                                <div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-bold text-blue-800 dark:text-blue-300">{{ $item['title'] }}</p>
                                    <p class="text-[11px] text-blue-600/70 dark:text-blue-400/70 mt-0.5 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Sedang dipelajari
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 opacity-60 cursor-not-allowed">
                                <div class="w-6 h-6 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 dark:text-slate-500 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-semibold text-slate-500 dark:text-slate-400">{{ $item['title'] }}</p>
                                    <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-0.5">Selesaikan modul sebelumnya</p>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </aside>

    {{-- Backdrop (Latar Gelap) untuk Mobile --}}
    <div id="sidebarBackdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-20 hidden lg:hidden transition-opacity"></div>

    {{-- ======================================================= --}}
    {{-- KONTEN UTAMA (Materi Belajar)                           --}}
    {{-- ======================================================= --}}
    {{-- Jarak atas di HP diperkecil dari pt-8 menjadi pt-2 --}}
    <div id="mainContent" class="layout-transition flex-1 min-w-0 w-full max-w-4xl mx-auto pt-2 sm:pt-8 lg:pt-0">

        {{-- Header Materi + Tombol Toggle 3 Garis di Atas --}}
        <div class="mb-4 sm:mb-8 flex items-start gap-3">
            {{-- Tombol Buka Sidebar --}}
            <button id="toggleSidebarBtn"
                    class="p-2 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-200 hover:bg-blue-50 hover:text-blue-600 dark:hover:bg-slate-800 dark:hover:text-blue-400 shadow-sm transition-all duration-200 active:scale-95 shrink-0 hidden mt-0.5"
                    title="Buka Daftar Modul" aria-label="Buka Daftar Modul">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1.5">
                    <span class="px-2 py-0.5 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">Modul 6</span>
                    <span class="text-slate-400 dark:text-slate-600">•</span>
                    <span class="text-xs font-medium text-slate-500 dark:text-slate-400">45 Menit</span>
                </div>
                <h1 class="text-xl sm:text-3xl font-bold text-slate-900 dark:text-white leading-tight">
                    {{ $currentItem['title'] }}
                </h1>
            </div>
        </div>

        {{-- Area Konten Artikel --}}
        <article class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 sm:p-8 shadow-sm space-y-6 sm:space-y-8">
            <div class="prose prose-slate dark:prose-invert max-w-none">
                <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm sm:text-base">
                    Selamat datang di Modul 6. Pada modul ini, kita akan mempelajari tentang <strong>Dinamika Rotasi</strong>.
                    Berbeda dengan gerak translasi (lurus) yang telah kita pelajari sebelumnya, gerak rotasi melibatkan benda yang berputar pada porosnya.
                </p>
                <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mt-6 mb-3">Momen Gaya (Torsi)</h3>
                <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm sm:text-base">
                    Torsi (\(\tau\)) adalah besaran yang menyebabkan benda mengalami gerak rotasi. Secara matematis, torsi didefinisikan sebagai hasil kali silang antara vektor posisi (\(r\)) dan vektor gaya (\(F\)).
                </p>

                {{-- Blok Rumus LaTeX --}}
                <div class="my-6 p-4 sm:p-6 rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 text-center overflow-x-auto">
                    <p class="text-lg sm:text-xl text-slate-800 dark:text-slate-200">
                        \[ \tau = r \times F \sin\theta \]
                    </p>
                </div>

                <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm sm:text-base">
                    Keterangan: <br>
                    \(\tau\) = Momen gaya (Nm) <br>
                    \(r\) = Vektor posisi (m) <br>
                    \(F\) = Vektor gaya (N) <br>
                    \(\theta\) = Sudut antara \(r\) dan \(F\)
                </p>
            </div>

            <div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-3">Video Penjelasan</h3>
                <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm bg-slate-100 dark:bg-slate-800">
                    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-3">File Pendukung (PDF)</h3>
                <a href="#" target="_blank" class="group flex items-center justify-between p-4 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 hover:bg-blue-50 dark:bg-slate-800/50 dark:hover:bg-blue-950/30 transition">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-rose-100 dark:bg-rose-950 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">Slide Materi Dinamika Rotasi.pdf</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">2.4 MB</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </a>
            </div>
        </article>

        {{-- Footer Navigasi Modul & Tombol Diskusi --}}
        <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 p-4 sm:p-5 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800">
            <div class="text-center sm:text-left flex-1">
                <p class="text-sm font-bold text-slate-800 dark:text-slate-200">Sudah selesai membaca?</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Lanjut ke materi berikutnya atau tanyakan sesuatu di forum diskusi.</p>
            </div>
            
            {{-- Grup Tombol Aksi --}}
            <div class="flex flex-col sm:flex-row w-full sm:w-auto items-center gap-3">
                {{-- TOMBOL DISKUSI BARU --}}
                <a href="{{ route('student.discussion.index', ['slug' => 'mekanika-klasik']) ?? '#' }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-300 dark:hover:border-blue-700 hover:bg-blue-50 dark:hover:bg-slate-800/80 transition font-bold text-sm shadow-sm active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    <span>Diskusi</span>
                </a>

                {{-- TOMBOL LANJUT --}}
                <a href="#" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 active:scale-95">
                    <span>Tandai Selesai</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Library KaTeX untuk merender LaTeX -->
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebarBtn');
        const closeBtn = document.getElementById('closeSidebarBtn');
        const backdrop = document.getElementById('sidebarBackdrop');
        const mainContent = document.getElementById('mainContent');

        let isOpen = window.innerWidth >= 1024;

        function updateLayout() {
            const isDesktop = window.innerWidth >= 1024;

            if (isDesktop) {
                backdrop.classList.add('hidden');
                document.body.style.overflow = '';

                if (isOpen) {
                    sidebar.classList.remove('hidden', '-translate-x-full', 'w-0', 'opacity-0');
                    sidebar.classList.add('translate-x-0', 'w-80', 'opacity-100', 'lg:mr-8');
                    mainContent.classList.remove('mx-auto');
                    toggleBtn.classList.add('hidden');
                } else {
                    sidebar.classList.add('hidden', '-translate-x-full', 'w-0', 'opacity-0');
                    sidebar.classList.remove('translate-x-0', 'w-80', 'opacity-100', 'lg:mr-8');
                    mainContent.classList.add('mx-auto');
                    toggleBtn.classList.remove('hidden');
                }
            } else {
                sidebar.classList.remove('lg:mr-8', 'w-0', 'hidden');
                sidebar.classList.add('w-full');
                mainContent.classList.add('mx-auto');

                if (isOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    backdrop.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    toggleBtn.classList.add('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                    backdrop.classList.add('hidden');
                    document.body.style.overflow = '';
                    toggleBtn.classList.remove('hidden');
                }
            }
        }

        updateLayout();

        toggleBtn.addEventListener('click', () => {
            isOpen = true;
            updateLayout();
        });

        closeBtn.addEventListener('click', () => {
            isOpen = false;
            updateLayout();
        });

        backdrop.addEventListener('click', () => {
            isOpen = false;
            updateLayout();
        });

        window.addEventListener('resize', () => {
            isOpen = window.innerWidth >= 1024;
            updateLayout();
        });

        window.addEventListener('load', () => {
            if (window.renderMathInElement) {
                renderMathInElement(document.body, {
                    delimiters: [
                        {left: '$$', right: '$$', display: true},
                        {left: '\\[', right: '\\]', display: true},
                        {left: '$', right: '$', display: false},
                        {left: '\\(', right: '\\)', display: false}
                    ],
                    throwOnError: false
                });
            }
        });
    });
</script>
@endpush