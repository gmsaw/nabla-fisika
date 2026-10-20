@extends('layouts.student')

@section('title', 'Kuis: Dinamika Rotasi — Nabla Fisika')

@push('styles')
<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .layout-transition { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
</style>
@endpush

@section('content')

@php
    $quiz = [
        'id' => 1,
        'title' => 'Kuis Modul 6: Dinamika Rotasi',
        'course' => 'Mekanika Klasik',
        'duration' => 15,
        'questions' => 10,
        'passing_grade' => 75,
        'best_score' => 85,
        'history' => [
            ['date' => '12 Okt 2026, 14:30', 'score' => 85, 'status' => 'Lulus'],
            ['date' => '10 Okt 2026, 09:15', 'score' => 60, 'status' => 'Gagal'],
        ]
    ];

    // Data Sidebar
    $courseProgress = 62;
    $syllabus = [
        ['id' => 1, 'type' => 'materi', 'title' => 'Pengantar Mekanika & Besaran', 'status' => 'completed', 'duration' => '15 mnt'],
        ['id' => 2, 'type' => 'materi', 'title' => 'Kinematika Partikel', 'status' => 'completed', 'duration' => '20 mnt'],
        ['id' => 3, 'type' => 'materi', 'title' => 'Hukum Newton & Dinamika', 'status' => 'completed', 'duration' => '25 mnt'],
        ['id' => 4, 'type' => 'materi', 'title' => 'Kerja dan Energi', 'status' => 'completed', 'duration' => '18 mnt'],
        ['id' => 5, 'type' => 'materi', 'title' => 'Momentum Linier & Tumbukan', 'status' => 'completed', 'duration' => '30 mnt'],
        ['id' => 6, 'type' => 'materi', 'title' => 'Dinamika Rotasi', 'status' => 'active', 'duration' => '45 mnt'],
        ['id' => 7, 'type' => 'kuis', 'title' => 'Kuis: Dinamika Rotasi', 'status' => 'active', 'duration' => '15 mnt', 'best_score' => 85],
        ['id' => 8, 'type' => 'materi', 'title' => 'Keseimbangan Benda Tegar', 'status' => 'locked', 'duration' => '20 mnt'],
        ['id' => 9, 'type' => 'materi', 'title' => 'Ujian Akhir Komprehensif', 'status' => 'locked', 'duration' => '60 mnt'],
    ];
@endphp

{{-- Container Utama --}}
<div class="relative flex flex-col lg:flex-row items-start w-full min-h-[calc(100vh-6rem)]">

    {{-- ======================================================= --}}
    {{-- SIDEBAR KIRI (Sama seperti di learn)                    --}}
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
                    <h2 class="font-bold text-base sm:text-lg text-slate-900 dark:text-white leading-tight mb-1">{{ $quiz['course'] }}</h2>
                    <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-2">
                        <span>Progres Belajar</span>
                        <span class="font-bold text-blue-600 dark:text-blue-400">{{ $courseProgress }}%</span>
                    </div>
                    <div class="w-32 h-1.5 rounded-full bg-slate-200 dark:bg-slate-800 overflow-hidden">
                        <div class="h-full rounded-full bg-blue-600 dark:bg-blue-500" style="width: {{ $courseProgress }}%"></div>
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
                    
                    @if($item['type'] === 'kuis')
                        @if($item['status'] === 'locked')
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
                    @else
                        @if($item['status'] === 'completed')
                            <a href="{{ route('student.course.learn', ['slug' => 'mekanika-klasik']) }}" class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 hover:bg-slate-50 dark:hover:bg-slate-800/30 transition group">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs sm:text-sm font-semibold text-slate-700 dark:text-slate-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">{{ $item['title'] }}</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-500 mt-0.5">{{ $item['duration'] }}</p>
                                </div>
                            </a>
                        @elseif($item['status'] === 'active')
                            <a href="{{ route('student.course.learn', ['slug' => 'mekanika-klasik']) }}" class="flex items-start gap-3 p-4 border-b border-slate-100 dark:border-slate-800/50 bg-blue-50 dark:bg-blue-500/10 border-l-4 border-l-blue-600 dark:border-l-blue-400 hover:bg-blue-100 transition">
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
                            </a>
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
    {{-- KONTEN UTAMA (Detail Kuis)                              --}}
    {{-- ======================================================= --}}
    <div id="mainContent" class="layout-transition flex-1 min-w-0 w-full max-w-3xl mx-auto pt-4 sm:pt-8 lg:pt-0">
        
        {{-- Tombol Toggle Sidebar (Muncul jika sidebar ditutup) --}}
        <div class="mb-4">
            <button id="toggleSidebarBtn"
                    class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-200 hover:bg-blue-50 hover:text-blue-600 dark:hover:bg-slate-800 dark:hover:text-blue-400 shadow-sm transition-all duration-200 active:scale-95 hidden"
                    title="Buka Daftar Modul" aria-label="Buka Daftar Modul">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Tombol Kembali --}}
        <a href="{{ route('student.course.learn', ['slug' => 'mekanika-klasik']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-blue-600 transition mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Materi
        </a>

        {{-- Header Kuis --}}
        <div class="text-center mb-8 pt-2">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-400 mb-4 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <p class="text-sm font-semibold text-purple-600 dark:text-purple-400 mb-1">{{ $quiz['course'] }}</p>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">{{ $quiz['title'] }}</h1>
        </div>

        {{-- Info Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 text-center shadow-sm">
                <svg class="w-6 h-6 mx-auto text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p class="text-2xl font-bold text-slate-800 dark:text-slate-100">{{ $quiz['duration'] }} <span class="text-sm font-normal text-slate-500">menit</span></p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Batas Waktu</p>
            </div>
            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 text-center shadow-sm">
                <svg class="w-6 h-6 mx-auto text-emerald-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                <p class="text-2xl font-bold text-slate-800 dark:text-slate-100">{{ $quiz['questions'] }} <span class="text-sm font-normal text-slate-500">Soal</span></p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Pilihan Ganda</p>
            </div>
            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 text-center shadow-sm">
                <svg class="w-6 h-6 mx-auto text-amber-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                <p class="text-2xl font-bold text-slate-800 dark:text-slate-100">{{ $quiz['passing_grade'] }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Nilai Kelulusan</p>
            </div>
        </div>

        {{-- Aturan --}}
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 sm:p-8 shadow-sm mb-6">
            <h2 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Aturan & Arahan Kuis
            </h2>
            <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400">
                <li class="flex items-start gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mt-1.5 shrink-0"></span>
                    <span>Kuis terdiri dari <strong>{{ $quiz['questions'] }} soal</strong> pilihan ganda yang diambil secara acak dari bank soal.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mt-1.5 shrink-0"></span>
                    <span>Waktu pengerjaan adalah <strong>{{ $quiz['duration'] }} menit</strong>. Waktu akan terus berjalan meskipun Anda meninggalkan halaman.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mt-1.5 shrink-0"></span>
                    <span>Nilai minimum untuk lulus adalah <strong>{{ $quiz['passing_grade'] }}</strong>.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mt-1.5 shrink-0"></span>
                    <span>Anda dapat mengulang kuis ini <strong>tanpa batas</strong> hingga mencapai nilai kelulusan.</span>
                </li>
            </ul>
        </div>

        {{-- Riwayat Nilai --}}
        @if(count($quiz['history']) > 0)
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 sm:p-8 shadow-sm mb-6">
            <h2 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Riwayat Percobaan
            </h2>
            <div class="space-y-3">
                @foreach($quiz['history'] as $history)
                    <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                        <div>
                            <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">{{ $history['date'] }}</p>
                            <p class="text-xs text-slate-500 mt-0.5">Percobaan ke-{{ count($quiz['history']) - $loop->index }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-lg font-bold {{ $history['status'] === 'Lulus' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">{{ $history['score'] }}</span>
                            <span class="px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider {{ $history['status'] === 'Lulus' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400' : 'bg-rose-100 text-rose-700 dark:bg-rose-950 dark:text-rose-400' }}">
                                {{ $history['status'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Tombol Mulai --}}
        <div class="pt-2 pb-12">
            <a href="{{ route('student.quiz.play', ['slug' => 'mekanika-klasik', 'quiz' => $quiz['id']]) ?? '#' }}" class="w-full flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-purple-600 hover:bg-purple-700 text-white text-base font-bold transition shadow-xl shadow-purple-600/30 active:scale-[0.98]">
                Mulai Kerjakan Kuis
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            <p class="text-center text-xs text-slate-500 dark:text-slate-400 mt-3">Pastikan koneksi internet Anda stabil sebelum memulai.</p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
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
    });
</script>
@endpush