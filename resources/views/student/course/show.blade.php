@extends('layouts.student')

@section('title', 'Detail Kelas — Nabla Fisika')

@section('content')

@php
    // Data Dummy (Nanti diganti dengan data dari Controller)
    $course = [
        'title' => 'Mekanika Klasik',
        'description' => 'Mata kuliah ini membahas fondasi utama fisika: hukum gerak Newton, kinematika, dinamika partikel, kerja dan energi, momentum, serta dinamika rotasi. Sangat cocok bagi mahasiswa yang ingin menutup gap materi akibat konversi MBKM atau publik yang ingin memulai belajar fisika dari awal secara terstruktur.',
        'level' => 'Dasar',
        'category' => 'Fisika Inti',
        'modules' => 8,
        'duration' => '12 jam',
        'students' => 128,
        'rating' => 4.8,
        'instructor' => [
            'name' => 'Dr. Wayan Sudira',
            'role' => 'Dosen Fisika UNUD',
            'initial' => 'W'
        ],
        'syllabus' => [
            ['title' => 'Pengantar Mekanika & Besaran Satuan', 'duration' => '45 menit', 'type' => 'Materi + Kuis'],
            ['title' => 'Kinematika Partikel', 'duration' => '1 jam', 'type' => 'Materi + Kuis'],
            ['title' => 'Hukum Newton & Dinamika', 'duration' => '1.5 jam', 'type' => 'Materi + Kuis'],
            ['title' => 'Kerja dan Energi', 'duration' => '1 jam', 'type' => 'Materi + Kuis'],
            ['title' => 'Momentum Linier dan Tumbukan', 'duration' => '1.5 jam', 'type' => 'Materi + Kuis'],
            ['title' => 'Dinamika Rotasi', 'duration' => '2 jam', 'type' => 'Materi + Kuis'],
            ['title' => 'Keseimbangan Benda Tegar', 'duration' => '1 jam', 'type' => 'Materi + Kuis'],
            ['title' => 'Ujian Akhir Komprehensif', 'duration' => '2 jam', 'type' => 'Ujian Akhir'],
        ]
    ];
@endphp

{{-- ============ HEADER KELAS ============ --}}
<section class="relative overflow-hidden -mt-20 sm:-mt-24 pt-32 sm:pt-40 pb-16 sm:pb-20 px-4 sm:px-6 lg:px-8">
    {{-- Background deep navy (sama seperti katalog) --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-slate-900 via-[#0a1628] to-slate-950"></div>
    <div class="absolute top-0 left-1/4 w-[500px] h-[400px] bg-blue-500/15 rounded-full blur-3xl -z-10"></div>
    <div class="absolute inset-0 bg-grid opacity-[0.15] -z-10" style="mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);"></div>

    <div class="max-w-7xl mx-auto relative">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-center">
            
            {{-- Kiri: Info Kelas --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Breadcrumb --}}
                <nav class="flex text-sm text-slate-400 font-medium mb-2" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li><a href="{{ route('student.catalog') }}" class="hover:text-blue-400 transition">Katalog</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li class="text-slate-200" aria-current="page">{{ $course['title'] }}</li>
                    </ol>
                </nav>

                {{-- Badges --}}
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 rounded-lg bg-blue-500/20 border border-blue-400/30 text-blue-300 text-xs font-semibold">
                        {{ $course['level'] }}
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 border border-slate-700 text-slate-300 text-xs font-semibold">
                        {{ $course['category'] }}
                    </span>
                </div>

                {{-- Judul --}}
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight">
                    {{ $course['title'] }}
                </h1>

                {{-- Meta Data --}}
                <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-sm text-slate-300">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="font-bold text-white">{{ $course['rating'] }}</span>
                        <span class="text-slate-400">Rating</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>{{ $course['students'] }} Siswa</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ $course['duration'] }}</span>
                    </div>
                </div>
            </div>

            {{-- Kanan: Card Enroll (Melayang) --}}
            <div class="lg:col-span-1">
                <div class="rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 p-6 shadow-2xl">
                    <h3 class="text-lg font-bold text-white mb-2">Mulai Belajar Sekarang</h3>
                    <p class="text-sm text-slate-300 mb-6">Dapatkan akses penuh ke semua modul dan sertifikat resmi.</p>
                    
                    <button class="w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-base transition shadow-lg shadow-blue-600/30 flex items-center justify-center gap-2 group">
                        Ikuti Kelas Ini
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                    
                    <div class="mt-4 flex items-center justify-center gap-2 text-xs text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Gratis untuk mahasiswa UNUD & Publik
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============ KONTEN UTAMA ============ --}}
<section class="py-10 sm:py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        {{-- Kiri: Deskripsi & Silabus --}}
        <div class="lg:col-span-2 space-y-10">
            
            {{-- Deskripsi --}}
            <div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Tentang Kelas Ini</h2>
                <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm sm:text-base">
                    {{ $course['description'] }}
                </p>
            </div>

            {{-- Silabus --}}
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Silabus Kelas</h2>
                    <span class="text-sm font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-950 px-3 py-1 rounded-lg">
                        {{ $course['modules'] }} Modul
                    </span>
                </div>

                <div class="space-y-3">
                    @foreach($course['syllabus'] as $index => $modul)
                        <div class="group flex items-start gap-4 p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-blue-300 dark:hover:border-blue-700 transition">
                            {{-- Nomor --}}
                            <div class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0 font-bold text-slate-500 dark:text-slate-400 group-hover:bg-blue-100 dark:group-hover:bg-blue-900 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            
                            {{-- Info Modul --}}
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-sm sm:text-base text-slate-800 dark:text-slate-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                    {{ $modul['title'] }}
                                </h4>
                                <div class="flex items-center gap-3 mt-1.5 text-xs text-slate-500 dark:text-slate-400">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $modul['duration'] }}
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                    <span>{{ $modul['type'] }}</span>
                                </div>
                            </div>

                            {{-- Icon Gembok (Visual saja) --}}
                            <div class="shrink-0 text-slate-300 dark:text-slate-700 mt-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Kanan: Info Dosen --}}
        <div class="lg:col-span-1">
            <div class="sticky top-24">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6">Instruktur Kelas</h2>
                
                <div class="p-6 rounded-2xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-center">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center text-3xl font-bold mb-4 shadow-lg">
                        {{ $course['instructor']['initial'] }}
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white">{{ $course['instructor']['name'] }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">{{ $course['instructor']['role'] }}</p>
                    
                    <div class="flex justify-center gap-2">
                        <span class="px-3 py-1 rounded-md bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs font-semibold text-slate-600 dark:text-slate-300">Fisika Inti</span>
                        <span class="px-3 py-1 rounded-md bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs font-semibold text-slate-600 dark:text-slate-300">Mekanika</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection