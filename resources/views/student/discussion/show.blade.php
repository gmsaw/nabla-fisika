@extends('layouts.student')

@section('title', 'Diskusi: Perbedaan Torsi & Momen Inersia — Nabla Fisika')

@section('content')

@php
    // Simulasi User yang sedang login (nanti diganti auth()->user())
    $currentUser = 'Putu Mahasiswa'; 

    // Data Dummy Thread
    $thread = [
        'id' => 1,
        'title' => 'Bingung perbedaan Torsi dan Momen Inersia?',
        'body' => 'Halo teman-teman, saya masih bingung membedakan kapan harus pakai Torsi dan kapan pakai Momen Inersia. Ada yang bisa jelasin dengan analogi sederhana? Saya sudah baca modul tapi masih suka tertukar rumusnya.',
        'author' => 'Putu Mahasiswa',
        'role' => 'Student',
        'time' => '2 jam yang lalu',
        'is_solved' => false, // Ubah ke true untuk melihat tampilan jika sudah terjawab
    ];

    // Data Dummy Balasan
    $replies = [
        [
            'id' => 1,
            'author' => 'Angga Pratama',
            'role' => 'Student',
            'time' => '1 jam yang lalu',
            'body' => 'Nambahin sedikit, rumus Torsi itu τ = r × F (ada gaya F). Kalau Momen Inersia rumusnya I = m × r² (hanya massa dan jarak). Makanya di kuis kemarin beda.',
        ],
        [
            'id' => 2,
            'author' => 'Dr. Wayan Sudira',
            'role' => 'Lecturer',
            'time' => '45 menit yang lalu',
            'body' => 'Halo Putu, analogi sederhananya begini: Torsi itu seperti "gaya dorong" saat kamu membuka pintu. Sedangkan Momen Inersia adalah "seberapa berat" pintu itu untuk didorong (tergantung massanya). Jadi, Torsi adalah penyebab gerak rotasi, dan Momen Inersia adalah sifat benda yang menolak gerak rotasi tersebut.',
        ]
    ];
@endphp

<div class="max-w-4xl mx-auto -mt-6 sm:-mt-10 pb-16">

    {{-- Tombol Kembali --}}
    <a href="{{ route('student.discussion.index', ['slug' => 'mekanika-klasik']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-blue-600 transition mb-6 pt-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Forum Diskusi
    </a>

    {{-- ============ KARTU PERTANYAAN UTAMA ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-8 shadow-sm mb-6 relative overflow-hidden">
        {{-- Garis Penanda Warna di Kiri --}}
        <div class="absolute left-0 top-0 bottom-0 w-1.5 {{ $thread['is_solved'] ? 'bg-emerald-500' : 'bg-blue-500' }}"></div>

        <div class="flex gap-4 sm:gap-6">
            {{-- Avatar --}}
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-blue-100 dark:bg-blue-950 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold text-lg shrink-0">
                {{ substr($thread['author'], 0, 1) }}
            </div>

            <div class="flex-1 min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                    <div>
                        <p class="font-bold text-slate-900 dark:text-white">{{ $thread['author'] }}</p>
                        <p class="text-xs text-slate-500">{{ $thread['time'] }}</p>
                    </div>
                    
                    {{-- Badge Status Terjawab / Belum --}}
                    @if($thread['is_solved'])
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 text-[10px] font-bold uppercase tracking-wider self-start sm:self-auto">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Terjawab
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400 text-[10px] font-bold uppercase tracking-wider self-start sm:self-auto">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Belum Terjawab
                        </span>
                    @endif
                </div>

                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white mb-3 leading-tight">{{ $thread['title'] }}</h1>
                <p class="text-sm sm:text-base text-slate-700 dark:text-slate-300 leading-relaxed whitespace-pre-line">{{ $thread['body'] }}</p>
            </div>
        </div>
    </div>

    {{-- ============ DAFTAR BALASAN ============ --}}
    <div class="mb-8">
        <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-4 px-2 flex items-center gap-2">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            {{ count($replies) }} Balasan
        </h3>

        <div class="space-y-4">
            @foreach($replies as $reply)
                <div class="bg-white dark:bg-slate-900 border {{ $reply['role'] === 'Lecturer' ? 'border-blue-300 dark:border-blue-800 shadow-md' : 'border-slate-200 dark:border-slate-800 shadow-sm' }} rounded-2xl p-5 relative">
                    
                    {{-- Label Jawaban Dosen --}}
                    @if($reply['role'] === 'Lecturer')
                        <div class="absolute -top-3 left-6 px-2 py-0.5 bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider rounded-md border border-blue-200 dark:border-blue-800">
                            Jawaban Dosen
                        </div>
                    @endif

                    <div class="flex gap-4">
                        {{-- Avatar --}}
                        <div class="w-10 h-10 rounded-full {{ $reply['role'] === 'Lecturer' ? 'bg-gradient-to-br from-blue-500 to-cyan-500 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300' }} flex items-center justify-center font-bold shrink-0">
                            {{ substr($reply['author'], 0, 1) }}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-slate-900 dark:text-white">{{ $reply['author'] }}</p>
                                    @if($reply['role'] === 'Lecturer')
                                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    @endif
                                    <span class="text-xs text-slate-500">• {{ $reply['time'] }}</span>
                                </div>

                                {{-- TOMBOL TANDAI JAWABAN (Hanya muncul untuk pembuat thread & jika belum solved) --}}
                                @if($currentUser === $thread['author'] && !$thread['is_solved'])
                                    <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-emerald-200 dark:border-emerald-800/50 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 text-xs font-semibold transition shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Tandai Sebagai Jawaban
                                    </button>
                                @endif
                            </div>
                            <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed whitespace-pre-line">{{ $reply['body'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ============ FORM BALASAN ============ --}}
    <div class="bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base font-bold text-slate-800 dark:text-slate-200 mb-3">Tulis Balasan</h3>
        <form action="#" method="POST">
            @csrf
            <textarea rows="4" class="w-full rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none mb-3" placeholder="Ketik balasan Anda di sini... (Gunakan bahasa yang sopan)"></textarea>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 active:scale-95">
                    Kirim Balasan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                </button>
            </div>
        </form>
    </div>

</div>

@endsection