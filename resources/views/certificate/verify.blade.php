@extends('layouts.public')

@section('title', 'Verifikasi Sertifikat — Nabla Fisika')

@section('content')

<div class="max-w-3xl mx-auto space-y-8">

    {{-- ============ HASIL VERIFIKASI (DUMMY STATE) ============ --}}
    {{-- 
        Catatan: Di backend nanti, bagian ini hanya muncul jika ada parameter '?id=...' 
        dan ID tersebut valid. Di frontend ini, kita tampilkan sebagai pratinjau.
    --}}
    <div class="pt-4">
        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 text-center">Pratinjau Hasil Verifikasi</p>

        {{-- KARTU SERTIFIKAT (VALID) --}}
        <div class="relative bg-white dark:bg-slate-900 border-2 border-emerald-500/30 dark:border-emerald-500/30 rounded-3xl p-6 sm:p-10 shadow-2xl overflow-hidden">
            {{-- Watermark Valid --}}
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -rotate-12 opacity-[0.03] dark:opacity-[0.02] pointer-events-none select-none">
                <span class="text-8xl font-black text-emerald-600">VALID</span>
            </div>

            <div class="relative flex flex-col sm:flex-row justify-between items-start gap-6 border-b border-slate-200 dark:border-slate-800 pb-6 mb-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-emerald-100 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 text-xs font-bold mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Sertifikat Valid & Terverifikasi
                    </div>
                    <h2 class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-1">Diberikan kepada</h2>
                    <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Putu Mahasiswa</h3>
                </div>

                {{-- QR / ID Sertifikat --}}
                <div class="text-left sm:text-right">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">ID Sertifikat</p>
                    <p class="font-mono text-lg font-bold text-slate-800 dark:text-slate-200">NBL-A7K2M</p>
                </div>
            </div>

            <div class="relative grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Kelas yang Diselesaikan</p>
                    <p class="text-base font-bold text-slate-800 dark:text-slate-200">Fisika Dasar — Pengantar Mekanika</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Nilai Akhir</p>
                    <p class="text-base font-bold text-emerald-600 dark:text-emerald-400">92 / 100</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Tanggal Terbit</p>
                    <p class="text-base font-bold text-slate-800 dark:text-slate-200">10 Oktober 2026</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">Diterbitkan Oleh</p>
                    <p class="text-base font-bold text-slate-800 dark:text-slate-200">HIMAFI UNUD</p>
                </div>
            </div>

            {{-- Tanda Tangan Digital --}}
            <div class="relative mt-8 pt-6 border-t border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row justify-between items-end gap-4">
                <p class="text-xs text-slate-400 max-w-xs italic">
                    Sertifikat ini diterbitkan secara digital dan keasliannya dapat diverifikasi melalui sistem Nabla Fisika.
                </p>
                <div class="text-center">
                    <p class="font-serif text-lg text-slate-800 dark:text-slate-200 italic mb-1">Nabla Fisika</p>
                    <div class="w-32 h-px bg-slate-300 dark:bg-slate-700 mb-1"></div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Ketua HIMAFI UNUD</p>
                </div>
            </div>
        </div>

        {{-- CONTOH KARTU SERTIFIKAT (DICABUT/INVALID) --}}
        <div class="mt-8 opacity-60 hover:opacity-100 transition">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 text-center">Contoh Jika Sertifikat Dicabut</p>
            
            <div class="relative bg-slate-50 dark:bg-slate-900 border border-rose-300 dark:border-rose-900/50 rounded-3xl p-6 sm:p-10 overflow-hidden grayscale">
                <div class="absolute inset-0 bg-rose-500/5 dark:bg-rose-500/10 pointer-events-none"></div>
                
                <div class="relative flex flex-col sm:flex-row justify-between items-start gap-6 border-b border-slate-200 dark:border-slate-800 pb-6 mb-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-rose-100 dark:bg-rose-950/50 text-rose-700 dark:text-rose-400 text-xs font-bold mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Sertifikat Dicabut (Revoked)
                        </div>
                        <h2 class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-1">Nama Penerima</h2>
                        <h3 class="text-2xl font-bold text-slate-700 dark:text-slate-300 line-through">Made Wirawan</h3>
                    </div>
                    <div class="text-left sm:text-right">
                        <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-1">ID Sertifikat</p>
                        <p class="font-mono text-lg font-bold text-slate-600 dark:text-slate-400 line-through">NBL-C3Y8Z</p>
                    </div>
                </div>
                <p class="relative text-sm text-rose-600 dark:text-rose-400 font-medium">
                    Sertifikat ini telah dicabut oleh Admin karena melanggar aturan platform atau terindikasi kecurangan.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection