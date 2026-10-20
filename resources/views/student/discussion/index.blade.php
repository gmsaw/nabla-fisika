@extends('layouts.student')

@section('title', 'Forum Diskusi — Nabla Fisika')

@section('content')

<div class="max-w-5xl mx-auto -mt-6 sm:-mt-10 pb-16">

    {{-- Header Halaman --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">Forum Kelas</span>
                <span class="text-slate-400 dark:text-slate-600">•</span>
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Mekanika Klasik</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Diskusi & Tanya Jawab</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Punya pertanyaan? Tanyakan di sini agar dibantu oleh dosen atau teman sekelas.</p>
        </div>
        
        <a href="{{ route('student.discussion.create', ['slug' => 'mekanika-klasik']) }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Buat Diskusi Baru
        </a>
    </div>

    {{-- Search & Filter --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <input type="text" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition" placeholder="Cari pertanyaan atau topik...">
        </div>
        <select class="px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-blue-500">
            <option>Terbaru</option>
            <option>Paling Banyak Dibalas</option>
            <option>Belum Terjawab</option>
        </select>
    </div>

    {{-- Daftar Thread Diskusi (Dummy Data) --}}
    @php
        $threads = [
            [
                'id' => 1,
                'title' => 'Bingung perbedaan Torsi dan Momen Inersia?',
                'body' => 'Halo teman-teman, saya masih bingung membedakan kapan harus pakai Torsi dan kapan pakai Momen Inersia. Ada yang bisa jelasin dengan analogi sederhana?',
                'author' => 'Putu Mahasiswa',
                'role' => 'Student',
                'time' => '2 jam yang lalu',
                'replies' => 5,
                'views' => 24,
                'is_solved' => true,
                'is_lecturer_replied' => true,
            ],
            [
                'id' => 2,
                'title' => 'Kenapa jawaban kuis nomor 4 salah ya?',
                'body' => 'Pada soal energi kinetik rotasi, saya menjawab "Tetap sama" karena mengira kecepatan sudut tidak berpengaruh. Tapi ternyata salah. Mohon pencerahannya.',
                'author' => 'Angga Pratama',
                'role' => 'Student',
                'time' => '5 jam yang lalu',
                'replies' => 2,
                'views' => 15,
                'is_solved' => false,
                'is_lecturer_replied' => false,
            ],
            [
                'id' => 3,
                'title' => 'Referensi buku tambahan untuk Dinamika Rotasi',
                'body' => 'Selain slide dari dosen, adakah rekomendasi buku atau channel YouTube yang bagus untuk memperdalam materi Dinamika Rotasi?',
                'author' => 'Made Wirawan',
                'role' => 'Student',
                'time' => '1 hari yang lalu',
                'replies' => 8,
                'views' => 42,
                'is_solved' => true,
                'is_lecturer_replied' => false,
            ]
        ];
    @endphp

    <div class="space-y-4">
        @foreach($threads as $thread)
            <a href="{{ route('student.discussion.show', ['slug' => 'mekanika-klasik', 'thread' => $thread['id']]) }}" class="group block bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 hover:border-blue-300 dark:hover:border-blue-700 hover:shadow-md transition">
                <div class="flex gap-4">
                    
                    {{-- Avatar Penanya --}}
                    <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0 text-slate-600 dark:text-slate-300 font-bold">
                        {{ substr($thread['author'], 0, 1) }}
                    </div>

                    <div class="flex-1 min-w-0">
                        {{-- Judul & Status --}}
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition line-clamp-1">
                                {{ $thread['title'] }}
                            </h2>
                            @if($thread['is_solved'])
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 shrink-0">
                                    Terjawab
                                </span>
                            @endif
                        </div>

                        {{-- Cuplikan Isi --}}
                        <p class="text-sm text-slate-500 dark:text-slate-400 line-clamp-2 mb-3">
                            {{ $thread['body'] }}
                        </p>

                        {{-- Info Bawah --}}
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-slate-500 dark:text-slate-400">
                            <span class="flex items-center gap-1 font-medium text-slate-700 dark:text-slate-300">
                                {{ $thread['author'] }}
                                @if($thread['role'] === 'Lecturer')
                                    <svg class="w-3.5 h-3.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                @endif
                            </span>
                            <span>•</span>
                            <span>{{ $thread['time'] }}</span>
                            
                            @if($thread['is_lecturer_replied'])
                                <span class="flex items-center gap-1 text-blue-600 dark:text-blue-400 font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    Dibalas Dosen
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Statistik Kanan --}}
                    <div class="hidden sm:flex flex-col items-end justify-center gap-1 shrink-0 pl-4 border-l border-slate-100 dark:border-slate-800">
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

    {{-- Pagination (Dummy) --}}
    <div class="mt-8 flex justify-center">
        <nav class="flex items-center gap-1">
            <button class="w-9 h-9 rounded-lg border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition disabled:opacity-50" disabled>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="w-9 h-9 rounded-lg bg-blue-600 text-white font-bold text-sm">1</button>
            <button class="w-9 h-9 rounded-lg text-slate-600 dark:text-slate-300 font-medium text-sm hover:bg-slate-100 dark:hover:bg-slate-800 transition">2</button>
            <button class="w-9 h-9 rounded-lg text-slate-600 dark:text-slate-300 font-medium text-sm hover:bg-slate-100 dark:hover:bg-slate-800 transition">3</button>
            <button class="w-9 h-9 rounded-lg border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </nav>
    </div>

</div>

@endsection