@extends('layouts.lecturer')

@section('title', 'Kelas Saya — Dosen Nabla Fisika')
@section('header_title', 'Manajemen Kelas Saya')

@section('content')

<div class="space-y-6">

    {{-- ============ HEADER & TOMBOL TAMBAH ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Kelas</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola materi, kuis, dan pantau progres mahasiswa di kelas Anda.</p>
        </div>
        
        <a href="{{ route('lecturer.course.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold transition shadow-lg shadow-emerald-600/25">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Buat Kelas Baru
        </a>
    </div>

    {{-- ============ FILTER & PENCARIAN ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 shadow-sm flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" placeholder="Cari nama kelas...">
        </div>
        <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-emerald-500">
            <option>Semua Status</option>
            <option>Published</option>
            <option>Menunggu Approval</option>
            <option>Draf</option>
        </select>
    </div>

    {{-- ============ DAFTAR KELAS (CARD GRID) ============ --}}
    @php
        // Data Dummy Kelas
        $courses = [
            [
                'id' => 1,
                'title' => 'Mekanika Klasik',
                'category' => 'Fisika Inti',
                'level' => 'Dasar',
                'status' => 'published',
                'students' => 128,
                'modules' => 8,
                'updated_at' => '2 hari yang lalu',
                'banner' => 'from-blue-500 to-cyan-500',
            ],
            [
                'id' => 2,
                'title' => 'Fisika Kuantum Lanjut',
                'category' => 'Fisika Inti',
                'level' => 'Lanjut',
                'status' => 'pending',
                'students' => 0,
                'modules' => 4,
                'updated_at' => '5 jam yang lalu',
                'banner' => 'from-purple-500 to-pink-500',
            ],
            [
                'id' => 3,
                'title' => 'Termodinamika Terapan',
                'category' => 'Fisika Medis',
                'level' => 'Menengah',
                'status' => 'draft',
                'students' => 0,
                'modules' => 0,
                'updated_at' => 'Baru saja',
                'banner' => 'from-amber-500 to-orange-500',
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($courses as $course)
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden hover:shadow-lg transition group flex flex-col">
                
                {{-- Banner / Thumbnail --}}
                <div class="h-32 bg-gradient-to-br {{ $course['banner'] }} relative p-4 flex flex-col justify-between">
                    {{-- Status Badge --}}
                    <div class="flex justify-end">
                        @if($course['status'] === 'published')
                            <span class="px-2.5 py-1 rounded-md bg-white/20 backdrop-blur text-white text-[10px] font-bold uppercase tracking-wider border border-white/30">Published</span>
                        @elseif($course['status'] === 'pending')
                            <span class="px-2.5 py-1 rounded-md bg-white/20 backdrop-blur text-white text-[10px] font-bold uppercase tracking-wider border border-white/30">Menunggu</span>
                        @else
                            <span class="px-2.5 py-1 rounded-md bg-black/20 backdrop-blur text-white text-[10px] font-bold uppercase tracking-wider border border-white/20">Draf</span>
                        @endif
                    </div>
                    {{-- Kategori --}}
                    <span class="text-white/90 text-xs font-semibold tracking-wide">{{ $course['category'] }}</span>
                </div>

                {{-- Konten Card --}}
                <div class="p-5 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">{{ $course['level'] }}</span>
                    </div>
                    
                    <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-4 group-hover:text-emerald-600 transition line-clamp-2">
                        {{ $course['title'] }}
                    </h3>
                    
                    <div class="flex items-center gap-4 text-xs text-slate-500 dark:text-slate-400 mb-5 mt-auto">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            {{ $course['students'] }} Siswa
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            {{ $course['modules'] }} Modul
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between gap-2">
                        <span class="text-[10px] text-slate-400">Diperbarui {{ $course['updated_at'] }}</span>
                        <div class="flex gap-1">
                            {{-- Ikon Mata: Mengarah ke Detail Kelas --}}
                            <a href="{{ route('lecturer.course.show', ['course' => $course['id']]) }}" 
                               class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950/50 rounded-lg transition" 
                               title="Lihat Pratinjau Detail Kelas">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>

                            {{-- Tombol Hapus --}}
                            <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50 rounded-lg transition" title="Hapus Kelas">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>

                            {{-- Tombol Kelola --}}
                            <a href="{{ route('lecturer.course.edit', ['course' => $course['id']]) }}" 
                               class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 dark:bg-emerald-950/50 dark:text-emerald-400 text-xs font-bold hover:bg-emerald-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Kelola
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Card Tambah Kelas Baru (Empty State / Add New) --}}
        <a href="{{ route('lecturer.course.create') }}" class="border-2 border-dashed border-slate-300 dark:border-slate-700 rounded-2xl flex flex-col items-center justify-center p-6 text-center hover:border-emerald-500 hover:bg-emerald-50/50 dark:hover:bg-emerald-950/20 transition group min-h-[300px]">
            <div class="w-14 h-14 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-400 group-hover:bg-emerald-100 group-hover:text-emerald-600 flex items-center justify-center mb-4 transition">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <h3 class="font-bold text-slate-700 dark:text-slate-300 group-hover:text-emerald-600 transition">Buat Kelas Baru</h3>
            <p class="text-xs text-slate-500 mt-1 max-w-[200px]">Tambahkan kelas baru untuk mulai mengajar mahasiswa.</p>
        </a>
    </div>

</div>

@endsection