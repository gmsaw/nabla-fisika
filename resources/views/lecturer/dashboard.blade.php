@extends('layouts.lecturer')

@section('title', 'Dashboard Dosen — Nabla Fisika')
@section('header_title', 'Ringkasan Pengajaran')

@section('content')

<div class="space-y-6">

    {{-- ============ SAMBUTAN & TOMBOL AKSI ============ --}}
    <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-3xl p-6 sm:p-8 text-white shadow-lg relative overflow-hidden">
        {{-- Ornamen --}}
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute right-10 -bottom-10 w-32 h-32 bg-emerald-300/20 rounded-full blur-xl"></div>
        
        <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold mb-2">Selamat datang, {{ auth()->user()->name ?? 'Dosen' }}! 👋</h2>
                <p class="text-emerald-100 max-w-xl text-sm sm:text-base leading-relaxed">
                    Kelola materi, pantau progres mahasiswa, dan buat evaluasi kuis untuk kelas yang Anda ampu.
                </p>
            </div>
            <a href="{{ route('lecturer.course.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white text-emerald-700 hover:bg-emerald-50 text-sm font-bold transition shadow-lg shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Buat Kelas Baru
            </a>
        </div>
    </div>

    {{-- ============ STATISTIK KELAS ============ --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
        {{-- Total Kelas --}}
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-950 flex items-center justify-center text-blue-600 dark:text-blue-400 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Kelas</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white">3 <span class="text-sm font-normal text-slate-400">Aktif</span></h3>
            </div>
        </div>

        {{-- Total Mahasiswa --}}
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-950 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Mahasiswa</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white">289</h3>
            </div>
        </div>

        {{-- Menunggu Review --}}
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-amber-50 dark:bg-amber-950 flex items-center justify-center text-amber-600 dark:text-amber-400 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Diskusi Baru</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white">5</h3>
            </div>
        </div>
    </div>

    {{-- ============ DAFTAR KELAS SAYA ============ --}}
    <div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Kelas yang Diampu</h2>
            <a href="{{ route('lecturer.course.index') }}" class="text-sm font-semibold text-emerald-600 hover:underline">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @php
                // Dummy Data Kelas Dosen
                $courses = [
                    [
                        'title' => 'Mekanika Klasik',
                        'status' => 'published',
                        'students' => 128,
                        'modules' => 8,
                        'accent' => 'blue',
                    ],
                    [
                        'title' => 'Fisika Kuantum Lanjut',
                        'status' => 'pending',
                        'students' => 0,
                        'modules' => 4,
                        'accent' => 'amber',
                    ],
                    [
                        'title' => 'Termodinamika Terapan',
                        'status' => 'draft',
                        'students' => 0,
                        'modules' => 0,
                        'accent' => 'slate',
                    ],
                ];
            @endphp

            @foreach($courses as $course)
                <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 hover:shadow-lg transition group">
                    <div class="flex justify-between items-start mb-3">
                        <span class="px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider
                            @if($course['status'] === 'published') bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400
                            @elseif($course['status'] === 'pending') bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400
                            @else bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-400 @endif">
                            @if($course['status'] === 'published') Published
                            @elseif($course['status'] === 'pending') Menunggu Approval
                            @else Draft @endif
                        </span>
                        <button class="text-slate-400 hover:text-emerald-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                        </button>
                    </div>
                    
                    <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-3 group-hover:text-emerald-600 transition">{{ $course['title'] }}</h3>
                    
                    <div class="flex items-center gap-4 text-xs text-slate-500 dark:text-slate-400 mb-5">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            {{ $course['students'] }} Siswa
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            {{ $course['modules'] }} Modul
                        </div>
                    </div>

                    <a href="#" class="block w-full text-center py-2 rounded-xl border border-slate-200 dark:border-slate-700 text-sm font-semibold text-slate-700 dark:text-slate-300 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 transition">
                        Kelola Kelas
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection