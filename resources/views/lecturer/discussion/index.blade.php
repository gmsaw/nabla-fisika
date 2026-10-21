@extends('layouts.lecturer')

@section('title', 'Forum Diskusi — Dosen Nabla Fisika')
@section('header_title', 'Forum Diskusi')

@section('content')

<div class="max-w-5xl mx-auto pt-4 sm:pt-8 pb-16 space-y-6">

    {{-- ============ HEADER HALAMAN ============ --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-1 rounded-md bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold uppercase tracking-wider">Dosen</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Pertanyaan Mahasiswa</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Bantu jawab kebingungan mahasiswa di kelas yang Anda ampu.</p>
        </div>
    </div>

    {{-- ============ FILTER & PENCARIAN ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 shadow-sm flex flex-col md:flex-row gap-3">
        
        {{-- Search Bar --}}
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" placeholder="Cari pertanyaan atau nama mahasiswa...">
        </div>

        {{-- FILTER KELAS (BARU) --}}
        <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-emerald-500 md:w-56">
            <option value="all">Semua Kelas</option>
            <option value="1">Mekanika Klasik</option>
            <option value="2">Fisika Kuantum Lanjut</option>
            <option value="3">Termodinamika Terapan</option>
        </select>

        {{-- FILTER STATUS --}}
        <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-emerald-500 md:w-48">
            <option>Semua Status</option>
            <option>Belum Dijawab</option>
            <option>Sudah Dijawab</option>
        </select>
    </div>

    {{-- ============ DAFTAR THREAD (DUMMY DATA) ============ --}}
    @php
        $threads = [
            [
                'id' => 1,
                'title' => 'Bingung perbedaan Torsi dan Momen Inersia?',
                'body' => 'Halo teman-teman, saya masih bingung membedakan kapan harus pakai Torsi dan kapan pakai Momen Inersia. Ada yang bisa jelasin dengan analogi sederhana?',
                'author' => 'Putu Mahasiswa',
                'role' => 'Student',
                'time' => '2 jam yang lalu',
                'replies' => 0,
                'views' => 24,
                'is_solved' => false,
                'is_lecturer_replied' => false,
                'course_name' => 'Mekanika Klasik', // Info Kelas
                'module_name' => 'Modul 6: Dinamika Rotasi',
            ],
            [
                'id' => 2,
                'title' => 'Kenapa jawaban kuis nomor 4 salah ya?',
                'body' => 'Pada soal energi kinetik rotasi, saya menjawab "Tetap sama" karena mengira kecepatan sudut tidak berpengaruh. Tapi ternyata salah. Mohon pencerahannya.',
                'author' => 'Angga Pratama',
                'role' => 'Student',
                'time' => '5 jam yang lalu',
                'replies' => 1,
                'views' => 15,
                'is_solved' => true,
                'is_lecturer_replied' => true,
                'course_name' => 'Mekanika Klasik',
                'module_name' => 'Modul 6: Dinamika Rotasi',
            ],
            [
                'id' => 3,
                'title' => 'Referensi buku tambahan untuk Dinamika Rotasi',
                'body' => 'Selain slide dari dosen, adakah rekomendasi buku atau channel YouTube yang bagus untuk memperdalam materi Dinamika Rotasi?',
                'author' => 'Made Wirawan',
                'role' => 'Student',
                'time' => '1 hari yang lalu',
                'replies' => 2,
                'views' => 42,
                'is_solved' => true,
                'is_lecturer_replied' => true,
                'course_name' => 'Fisika Kuantum Lanjut',
                'module_name' => 'Modul 2: Persamaan Schrödinger',
            ]
        ];
    @endphp

    <div class="space-y-4">
        @foreach($threads as $thread)
            <a href="{{ route('lecturer.discussion.show', ['course' => 1, 'thread' => $thread['id']]) }}" class="group block bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 hover:border-emerald-300 dark:hover:border-emerald-700 hover:shadow-md transition">
                <div class="flex gap-4">
                    
                    {{-- Avatar Penanya --}}
                    <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0 text-slate-600 dark:text-slate-300 font-bold">
                        {{ substr($thread['author'], 0, 1) }}
                    </div>

                    <div class="flex-1 min-w-0">
                        {{-- Judul & Status --}}
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-2 mb-1">
                            <div class="min-w-0">
                                <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition line-clamp-1">
                                    {{ $thread['title'] }}
                                </h2>
                                
                                {{-- Tag Kelas & Modul (BARU) --}}
                                <div class="flex flex-wrap items-center gap-2 mt-2">
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-[10px] font-bold border border-emerald-100 dark:border-emerald-900/50">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                        {{ $thread['course_name'] }}
                                    </span>
                                    <span class="text-[10px] text-slate-500 font-medium">{{ $thread['module_name'] }}</span>
                                </div>
                            </div>
                            
                            @if($thread['is_solved'])
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 shrink-0 self-start mt-1">
                                    Terjawab
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400 shrink-0 self-start mt-1">
                                    Belum Dijawab
                                </span>
                            @endif
                        </div>

                        {{-- Cuplikan Isi --}}
                        <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-3 mt-2">
                            {{ $thread['body'] }}
                        </p>

                        {{-- Info Bawah --}}
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-slate-500 dark:text-slate-400">
                            <span class="flex items-center gap-1 font-medium text-slate-700 dark:text-slate-300">
                                {{ $thread['author'] }}
                            </span>
                            <span>•</span>
                            <span>{{ $thread['time'] }}</span>
                        </div>
                    </div>

                    {{-- Statistik Kanan --}}
                    <div class="hidden sm:flex flex-col items-end justify-center gap-1.5 shrink-0 pl-4 border-l border-slate-100 dark:border-slate-800">
                        <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-400 font-semibold text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            {{ $thread['replies'] }} Balasan
                        </div>
                        <div class="text-xs text-slate-500">{{ $thread['views'] }} dilihat</div>
                    </div>

                </div>
            </a>
        @endforeach
    </div>

</div>

@endsection