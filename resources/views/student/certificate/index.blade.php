@extends('layouts.student')

@section('title', 'Sertifikat Saya — Nabla Fisika')

@section('content')

<div class="max-w-6xl mx-auto -mt-6 sm:-mt-10 pb-16 space-y-6">

    {{-- ============ HEADER HALAMAN ============ --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-1 rounded-md bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-300 text-[10px] font-bold uppercase tracking-wider">Pencapaian</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Sertifikat Saya</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kumpulan sertifikat resmi dari kelas yang telah Anda selesaikan.</p>
        </div>
        
        {{-- Tombol Verifikasi Publik --}}
        <a href="{{ route('certificate.verify.form') ?? '#' }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Cek Keaslian Sertifikat
        </a>
    </div>

    {{-- ============ DAFTAR SERTIFIKAT (DUMMY DATA) ============ --}}
    @php
        $certificates = [
            [
                'id' => 1,
                'title' => 'Fisika Dasar — Pengantar Mekanika',
                'issuedAt' => '10 Okt 2026',
                'score' => 92,
                'uniqueId' => 'NBL-A7K2M',
                'instructor' => 'Dr. Wayan Sudira',
            ],
            [
                'id' => 2,
                'title' => 'Fisika Komputasi — Metode Numerik',
                'issuedAt' => '05 Sep 2026',
                'score' => 88,
                'uniqueId' => 'NBL-B9X4Q',
                'instructor' => 'I Made Agus',
            ],
        ];
    @endphp

    @if(count($certificates) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @foreach($certificates as $cert)
                {{-- Kartu Sertifikat (Menggunakan Style Premium) --}}
                <div class="group relative rounded-2xl bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 text-white overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-blue-600/30 transition-all duration-300">
                    
                    {{-- Pattern Dekoratif --}}
                    <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, white 0, white 1px, transparent 1px, transparent 12px);"></div>
                    <span class="absolute -right-4 -bottom-6 text-[8rem] font-bold text-white/5 leading-none select-none">∇</span>

                    <div class="relative p-5 sm:p-6 flex flex-col h-full">
                        {{-- Header --}}
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-10 rounded-xl bg-amber-400/20 border border-amber-400/40 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-amber-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase tracking-widest text-amber-300 font-semibold">Sertifikat</p>
                                    <p class="text-[10px] text-blue-200">HIMAFI UNUD</p>
                                </div>
                            </div>
                            <div class="w-10 h-10 rounded-full border-2 border-emerald-400/60 flex items-center justify-center rotate-12">
                                <div class="text-[6px] text-emerald-400 font-bold text-center leading-tight">✓<br>VERIFIED</div>
                            </div>
                        </div>

                        {{-- Judul --}}
                        <h3 class="font-bold text-base sm:text-lg leading-tight mb-4 line-clamp-2">{{ $cert['title'] }}</h3>

                        {{-- Statistik --}}
                        <div class="grid grid-cols-2 gap-2 mb-4">
                            <div class="p-2 rounded-lg bg-white/10 backdrop-blur border border-white/10">
                                <p class="text-[9px] text-blue-200 uppercase tracking-wide">Nilai</p>
                                <p class="text-lg font-bold">{{ $cert['score'] }}</p>
                            </div>
                            <div class="p-2 rounded-lg bg-white/10 backdrop-blur border border-white/10">
                                <p class="text-[9px] text-blue-200 uppercase tracking-wide">ID</p>
                                <p class="text-[11px] font-mono truncate mt-1">{{ $cert['uniqueId'] }}</p>
                            </div>
                        </div>

                        {{-- Info Dosen & Tanggal --}}
                        <div class="flex items-center justify-between text-[10px] text-blue-200 mt-auto pt-3 border-t border-white/10">
                            <span>{{ $cert['issuedAt'] }}</span>
                            <span class="truncate max-w-[100px]" title="{{ $cert['instructor'] }}">{{ $cert['instructor'] }}</span>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="flex gap-2 mt-4">
                            <button class="flex-1 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-xs font-bold transition flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Unduh PDF
                            </button>
                            <a href="{{ route('certificate.verify', ['id' => $cert['uniqueId']]) ?? '#' }}" target="_blank" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 transition" title="Verifikasi">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        {{-- ============ EMPTY STATE (JIKA BELUM ADA SERTIFIKAT) ============ --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl p-10 sm:p-16 text-center shadow-sm">
            <div class="w-24 h-24 mx-auto rounded-full bg-slate-50 dark:bg-slate-800/50 flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
            </div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-2">Belum Ada Sertifikat</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-md mx-auto mb-8">
                Anda belum menyelesaikan kelas apa pun. Selesaikan kelas dan lulus ujian akhir untuk mendapatkan sertifikat resmi dari HIMAFI UNUD.
            </p>
            <a href="{{ route('student.catalog') ?? '#' }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25">
                Jelajah Katalog Kelas
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    @endif

</div>

@endsection