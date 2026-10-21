@extends('layouts.admin')

@section('title', 'Detail Kelas — Admin Nabla Fisika')
@section('header_title', 'Detail Kelas')

@section('content')

<div class="space-y-6 max-w-5xl mx-auto">

    {{-- Tombol Kembali --}}
    <a href="{{ route('admin.course.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-blue-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar Kelas
    </a>

    @php
        // Data Dummy Kelas
        $course = [
            'title' => 'Fisika Kuantum Lanjut',
            'category' => 'Fisika Inti',
            'level' => 'Lanjut',
            'status' => 'pending', // pending, published, draft
            'description' => 'Mata kuliah ini membahas konsep lanjutan dalam mekanika kuantum, mulai dari persamaan Schrödinger untuk sistem 3D, momentum sudut, spin, hingga pengantar teori perturbasi. Kelas ini dirancang untuk mahasiswa yang telah menyelesaikan Fisika Kuantum Dasar.',
            'instructor' => 'Dr. Wayan Sudira',
            'instructor_email' => 'wayan.sudira@unud.ac.id',
            'created_at' => '12 Okt 2026, 09:30',
            'modules' => [
                ['title' => 'Persamaan Schrödinger 3D', 'type' => 'Materi + Kuis'],
                ['title' => 'Momentum Sudut & Spin', 'type' => 'Materi + Kuis'],
                ['title' => 'Teori Perturbasi', 'type' => 'Materi + Kuis'],
                ['title' => 'Ujian Akhir Komprehensif', 'type' => 'Ujian'],
            ]
        ];
    @endphp

    {{-- ============ BANNER UTAMA ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden relative">
        
        {{-- Ornamen Background --}}
        <div class="h-32 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900"></div>

        <div class="p-6 sm:p-8 pt-0 relative">
            <div class="flex flex-col sm:flex-row gap-6 items-start">
                
                {{-- Ikon Kelas (Overlap dengan banner) --}}
                <div class="w-20 h-20 rounded-2xl bg-white dark:bg-slate-800 border-4 border-white dark:border-slate-900 shadow-lg flex items-center justify-center text-blue-600 -mt-10 shrink-0">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>

                {{-- Info Utama --}}
                <div class="flex-1 min-w-0 pt-2">
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="px-2.5 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">{{ $course['category'] }}</span>
                        <span class="px-2.5 py-1 rounded-md bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-300 text-[10px] font-bold uppercase tracking-wider">{{ $course['level'] }}</span>
                        
                        @if($course['status'] === 'pending')
                            <span class="px-2.5 py-1 rounded-md bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400 text-[10px] font-bold uppercase tracking-wider">Menunggu Persetujuan</span>
                        @elseif($course['status'] === 'published')
                            <span class="px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 text-[10px] font-bold uppercase tracking-wider">Published</span>
                        @else
                            <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-400 text-[10px] font-bold uppercase tracking-wider">Draft</span>
                        @endif
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-2">{{ $course['title'] }}</h1>
                    
                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 dark:text-slate-400">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            {{ $course['instructor'] }}
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Diajukan: {{ $course['created_at'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============ KONTEN DETAIL ============ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Kiri: Deskripsi & Silabus --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Deskripsi --}}
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">Deskripsi Kelas</h2>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed whitespace-pre-line">{{ $course['description'] }}</p>
            </div>

            {{-- Silabus --}}
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-4">Rencana Silabus</h2>
                <div class="space-y-3">
                    @foreach($course['modules'] as $index => $modul)
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                            <div class="w-7 h-7 rounded-lg bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 flex items-center justify-center font-bold text-xs text-slate-500 shrink-0 mt-0.5">
                                {{ $index + 1 }}
                            </div>
                            <div>
                                <p class="font-bold text-sm text-slate-800 dark:text-slate-200">{{ $modul['title'] }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $modul['type'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Kanan: Panel Aksi (Sticky) --}}
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-4">
                
                {{-- Panel Persetujuan --}}
                @if($course['status'] === 'pending')
                    <div class="bg-amber-50 dark:bg-amber-950/30 border border-amber-200 dark:border-amber-900/50 rounded-2xl p-5 shadow-sm">
                        <h3 class="font-bold text-amber-800 dark:text-amber-300 mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            Butuh Persetujuan
                        </h3>
                        <p class="text-sm text-amber-700 dark:text-amber-400/80 mb-4 leading-relaxed">Pastikan silabus dan profil dosen sudah sesuai sebelum mempublikasikan kelas ini ke katalog.</p>
                        
                        <div class="space-y-2">
                            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold transition shadow-lg shadow-emerald-600/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Setujui & Publikasikan
                            </button>
                            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-white dark:bg-slate-800 border border-rose-200 dark:border-rose-900/50 text-rose-600 dark:text-rose-400 text-sm font-bold hover:bg-rose-50 dark:hover:bg-rose-950/30 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Tolak Pengajuan
                            </button>
                        </div>
                    </div>
                @endif

                {{-- Panel Dosen --}}
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center text-2xl font-bold mb-3 shadow-md">
                        {{ substr($course['instructor'], 0, 1) }}
                    </div>
                    <h3 class="font-bold text-slate-900 dark:text-white">{{ $course['instructor'] }}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-3">Dosen Pengampu</p>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-xs font-medium text-slate-600 dark:text-slate-300">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        {{ $course['instructor_email'] }}
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection