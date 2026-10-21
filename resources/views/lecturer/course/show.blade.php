@extends('layouts.lecturer')

@section('title', 'Detail Kelas — Dosen Nabla Fisika')
@section('header_title', 'Manajemen Kelas')

@section('content')

<div class="max-w-5xl mx-auto space-y-6 pb-20">

    {{-- Tombol Kembali --}}
    <a href="{{ route('lecturer.course.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-emerald-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Kelas Saya
    </a>

    @php
        // Data Dummy Kelas
        $course = [
            'id' => 1,
            'title' => 'Mekanika Klasik',
            'description' => 'Mata kuliah ini membahas fondasi utama fisika: hukum gerak Newton, kinematika, dinamika partikel, kerja dan energi, momentum, serta dinamika rotasi.',
            'category' => 'Fisika Inti',
            'level' => 'Dasar',
            'status' => 'published', // published, pending, draft
            'students' => 128,
            'banner' => 'from-blue-500 to-cyan-500',
            'created_at' => '12 Sep 2026',
            'modules' => [
                ['id' => 1, 'title' => 'Pengantar Mekanika & Besaran', 'type' => 'materi', 'duration' => '15 mnt', 'xp' => 20],
                ['id' => 2, 'title' => 'Kinematika Partikel', 'type' => 'materi', 'duration' => '20 mnt', 'xp' => 20],
                ['id' => 3, 'title' => 'Kuis: Kinematika', 'type' => 'kuis', 'duration' => '10 mnt', 'xp' => 120],
                ['id' => 4, 'title' => 'Hukum Newton & Dinamika', 'type' => 'materi', 'duration' => '25 mnt', 'xp' => 20],
                ['id' => 5, 'title' => 'Ujian Akhir Komprehensif', 'type' => 'ujian', 'duration' => '60 mnt', 'xp' => 500],
            ]
        ];
    @endphp

    {{-- ============ HEADER BANNER ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden relative">
        {{-- Banner Background --}}
        <div class="h-40 bg-gradient-to-br {{ $course['banner'] }} relative">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="absolute top-4 right-4 flex gap-2">
                @if($course['status'] === 'published')
                    <span class="px-3 py-1.5 rounded-lg bg-white/20 backdrop-blur text-white text-xs font-bold uppercase tracking-wider border border-white/30">Published</span>
                @elseif($course['status'] === 'pending')
                    <span class="px-3 py-1.5 rounded-lg bg-white/20 backdrop-blur text-white text-xs font-bold uppercase tracking-wider border border-white/30">Menunggu Approval</span>
                @else
                    <span class="px-3 py-1.5 rounded-lg bg-black/30 backdrop-blur text-white text-xs font-bold uppercase tracking-wider border border-white/20">Draf</span>
                @endif
                <a href="{{ route('lecturer.course.edit', ['course' => $course['id']]) }}" class="p-1.5 rounded-lg bg-white/20 backdrop-blur text-white hover:bg-white/30 transition" title="Edit Kelas">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </a>
            </div>
        </div>

        {{-- Info Utama --}}
        <div class="p-6 sm:p-8 pt-0 relative">
            <div class="flex flex-col sm:flex-row gap-6 items-start">
                {{-- Ikon Kelas (Overlap) --}}
                <div class="w-20 h-20 rounded-2xl bg-white dark:bg-slate-800 border-4 border-white dark:border-slate-900 shadow-lg flex items-center justify-center text-blue-600 -mt-10 shrink-0">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>

                <div class="flex-1 min-w-0 pt-2">
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="px-2.5 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">{{ $course['category'] }}</span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-[10px] font-bold uppercase tracking-wider">{{ $course['level'] }}</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-2">{{ $course['title'] }}</h1>
                    
                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 dark:text-slate-400 mt-4">
                        <div class="flex items-center gap-1.5 bg-slate-50 dark:bg-slate-800/50 px-3 py-1.5 rounded-lg border border-slate-100 dark:border-slate-800">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <span class="font-bold text-slate-700 dark:text-slate-300">{{ $course['students'] }}</span> Mahasiswa
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Dibuat {{ $course['created_at'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ KONTEN DUA KOLOM ============ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- KIRI: Deskripsi & Silabus --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Deskripsi --}}
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">Deskripsi Kelas</h2>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ $course['description'] }}</p>
            </div>

            {{-- Silabus --}}
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center justify-between mb-4 border-b border-slate-100 dark:border-slate-800 pb-3">
                    <h2 class="text-lg font-bold text-slate-800 dark:text-white">Struktur Silabus</h2>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">{{ count($course['modules']) }} Modul</span>
                </div>
                
                <div class="space-y-3">
                    @foreach($course['modules'] as $index => $modul)
                        <div class="flex items-center gap-4 p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 group">
                            <div class="w-8 h-8 rounded-lg bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 flex items-center justify-center font-bold text-xs text-slate-500 shrink-0">
                                {{ $index + 1 }}
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-sm text-slate-800 dark:text-slate-200">{{ $modul['title'] }}</p>
                                <div class="flex items-center gap-3 mt-1 text-[11px] text-slate-500">
                                    <span class="flex items-center gap-1">
                                        @if($modul['type'] === 'kuis')
                                            <span class="w-2 h-2 rounded-full bg-purple-500"></span> Kuis
                                        @elseif($modul['type'] === 'ujian')
                                            <span class="w-2 h-2 rounded-full bg-rose-500"></span> Ujian
                                        @else
                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> Materi
                                        @endif
                                    </span>
                                    <span>•</span>
                                    <span>{{ $modul['duration'] }}</span>
                                    <span>•</span>
                                    <span class="text-amber-500 font-bold">{{ $modul['xp'] }} XP</span>
                                </div>
                            </div>

                            {{-- Tombol Aksi Modul --}}
                            <div class="shrink-0 flex gap-1 opacity-0 group-hover:opacity-100 transition">
                                <a href="#" class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950/50 rounded-lg transition" title="Edit Modul">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50 rounded-lg transition" title="Hapus Modul">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- KANAN: Panel Aksi & Statistik --}}
        <div class="lg:col-span-1 space-y-6">
            
                        {{-- Tombol Aksi Cepat --}}
                        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <h3 class="font-bold text-slate-800 dark:text-white mb-4">Aksi Cepat</h3>
                <div class="space-y-2">
                    {{-- TOMBOL LIHAT PROGRES MAHASISWA (BARU) --}}
                    <a href="{{ route('lecturer.course.students', ['course' => $course['id']]) }}" class="w-full flex items-center justify-between p-3 rounded-xl bg-blue-50 dark:bg-blue-950/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 border border-blue-100 dark:border-blue-900/50 text-blue-700 dark:text-blue-400 transition group">
                        <span class="text-sm font-bold flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Lihat Progres Mahasiswa
                        </span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>

                    {{-- TOMBOL TAMBAH MODUL --}}
                    <a href="{{ route('lecturer.course.create') }}" class="w-full flex items-center justify-between p-3 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 hover:bg-emerald-100 dark:hover:bg-emerald-900/50 border border-emerald-100 dark:border-emerald-900/50 text-emerald-700 dark:text-emerald-400 transition group">
                        <span class="text-sm font-bold flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Tambah Modul Baru
                        </span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>

            {{-- Statistik Kelas --}}
            <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <h3 class="font-bold text-slate-800 dark:text-white mb-4">Ringkasan Kelas</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-500">Total Modul</span>
                        <span class="font-bold text-slate-800 dark:text-slate-200">{{ count($course['modules']) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-500">Total XP Kelas</span>
                        <span class="font-bold text-amber-500">{{ collect($course['modules'])->sum('xp') }} XP</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-500">Rata-rata Nilai Kuis</span>
                        <span class="font-bold text-slate-800 dark:text-slate-200">82.5</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection