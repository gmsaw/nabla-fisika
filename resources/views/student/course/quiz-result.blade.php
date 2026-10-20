@extends('layouts.student')

@section('title', 'Hasil Kuis: Dinamika Rotasi — Nabla Fisika')

@push('styles')
<style>
    /* Animasi untuk skor muncul */
    @keyframes scale-up {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
    .animate-score { animation: scale-up 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
    
    /* Menghilangkan panah bawaan summary */
    details > summary { list-style: none; }
    details > summary::-webkit-details-marker { display: none; }
</style>
@endpush

@section('content')

@php
    // Simulasi Data Hasil Kuis
    $result = [
        'passed' => true, 
        'score' => 80,
        'passing_grade' => 75,
        'correct' => 8,
        'wrong' => 2,
        'total' => 10,
        'time_spent' => '12 menit 45 detik',
        'quiz_title' => 'Kuis Modul 6: Dinamika Rotasi',
        'course' => 'Mekanika Klasik'
    ];

    // Simulasi Detail Jawaban
    $review = [
        [
            'number' => 1,
            'question' => 'Sebuah roda berputar dengan kecepatan sudut konstan. Jika momen inersia roda diperbesar dua kali lipat, maka energi kinetik rotasinya menjadi...',
            'options' => [
                'A' => 'Tetap sama',
                'B' => 'Dua kali lipat',
                'C' => 'Setengah kali lipat',
                'D' => 'Empat kali lipat',
            ],
            'user_answer' => 'A',
            'correct_answer' => 'B',
            'is_correct' => false,
            'explanation' => 'Energi kinetik rotasi dirumuskan dengan EK = 1/2 I ω². Jika I (momen inersia) diperbesar 2 kali lipat dan ω konstan, maka EK juga akan menjadi 2 kali lipat.'
        ],
        [
            'number' => 2,
            'question' => 'Besaran yang menyebabkan benda mengalami gerak rotasi disebut...',
            'options' => [
                'A' => 'Gaya',
                'B' => 'Torsi (Momen Gaya)',
                'C' => 'Momentum',
                'D' => 'Impuls',
            ],
            'user_answer' => 'B',
            'correct_answer' => 'B',
            'is_correct' => true,
            'explanation' => 'Torsi atau momen gaya adalah besaran yang menyebabkan benda mengalami gerak rotasi.'
        ],
        [
            'number' => 3,
            'question' => 'Satuan dari momen inersia adalah...',
            'options' => [
                'A' => 'kg m/s²',
                'B' => 'kg m²/s',
                'C' => 'kg m²',
                'D' => 'kg m/s',
            ],
            'user_answer' => 'A',
            'correct_answer' => 'C',
            'is_correct' => false,
            'explanation' => 'Momen inersia (I) memiliki satuan kg·m². Dimensinya adalah [M][L]².'
        ]
    ];
@endphp

<div class="max-w-3xl mx-auto pt-8 pb-16 space-y-8">
    
    {{-- ============ KARTU RINGKASAN HASIL ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl shadow-xl overflow-hidden relative">
        
        {{-- Ornamen Background di atas --}}
        <div class="absolute top-0 inset-x-0 h-32 bg-gradient-to-b {{ $result['passed'] ? 'from-emerald-500/20 to-transparent' : 'from-rose-500/20 to-transparent' }}"></div>

        <div class="relative p-6 sm:p-10 flex flex-col items-center text-center">
            
            {{-- Ikon Status --}}
            <div class="w-20 h-20 rounded-full flex items-center justify-center mb-4 shadow-lg animate-score {{ $result['passed'] ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-950 dark:text-emerald-400 shadow-emerald-500/20' : 'bg-rose-100 text-rose-600 dark:bg-rose-950 dark:text-rose-400 shadow-rose-500/20' }}">
                @if($result['passed'])
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @else
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @endif
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold mb-2 {{ $result['passed'] ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                {{ $result['passed'] ? 'SELAMAT, ANDA LULUS!' : 'MAAF, BELUM LULUS' }}
            </h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
                {{ $result['quiz_title'] }} • {{ $result['course'] }}
            </p>

            {{-- Skor Besar --}}
            <div class="relative w-40 h-40 flex items-center justify-center mb-8">
                <svg class="absolute inset-0 w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="none" class="stroke-slate-100 dark:stroke-slate-800" stroke-width="8"/>
                    <circle cx="50" cy="50" r="45" fill="none" class="{{ $result['passed'] ? 'stroke-emerald-500' : 'stroke-rose-500' }}" stroke-width="8" stroke-dasharray="{{ ($result['score'] / 100) * 283 }}" stroke-dashoffset="0" stroke-linecap="round" class="animate-score"/>
                </svg>
                <div class="flex flex-col items-center">
                    <span class="text-5xl font-extrabold text-slate-800 dark:text-white">{{ $result['score'] }}</span>
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-widest mt-1">Skor Akhir</span>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-3 gap-4 w-full border-y border-slate-200 dark:border-slate-800 py-6 mb-8">
                <div class="text-center">
                    <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">{{ $result['correct'] }}</p>
                    <p class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Benar</p>
                </div>
                <div class="text-center border-x border-slate-200 dark:border-slate-800">
                    <p class="text-2xl font-bold text-rose-600 dark:text-rose-400">{{ $result['wrong'] }}</p>
                    <p class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Salah</p>
                </div>
                <div class="text-center">
                    <p class="text-lg sm:text-xl font-bold text-slate-800 dark:text-slate-100 flex items-center justify-center h-full">{{ $result['time_spent'] }}</p>
                    <p class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 uppercase tracking-wider mt-1">Waktu</p>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex flex-col sm:flex-row gap-3 w-full">
                @if($result['passed'])
                    <a href="{{ route('student.course.learn', ['slug' => 'mekanika-klasik']) }}" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25">
                        Lanjut Belajar
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                @else
                    <a href="{{ route('student.quiz.show', ['slug' => 'mekanika-klasik', 'quiz' => 7]) }}" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white text-sm font-bold transition shadow-lg shadow-purple-600/25">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        Ulangi Kuis
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- ============ DETAIL JAWABAN (REVIEW) ============ --}}
    <div class="pt-4">
        <div class="flex items-center justify-between mb-4 px-2">
            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-200">Detail Jawaban</h2>
            <span class="text-sm text-slate-500">{{ count($review) }} Soal Ditampilkan</span>
        </div>

        <div class="space-y-3">
            @foreach($review as $item)
                {{-- Card per Soal --}}
                <details class="group bg-white dark:bg-slate-900 border {{ $item['is_correct'] ? 'border-slate-200 dark:border-slate-800' : 'border-rose-200 dark:border-rose-900/50' }} rounded-2xl overflow-hidden shadow-sm">
                    
                    {{-- Header Accordion (Summary) --}}
                    <summary class="flex items-center gap-4 p-4 sm:p-5 cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                        {{-- Indikator Benar/Salah --}}
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 {{ $item['is_correct'] ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-950 dark:text-emerald-400' : 'bg-rose-100 text-rose-600 dark:bg-rose-950 dark:text-rose-400' }}">
                            @if($item['is_correct'])
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            @endif
                        </div>

                        {{-- Teks Soal (Terpotong) --}}
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-slate-800 dark:text-slate-200 line-clamp-1">
                                Soal {{ $item['number'] }}: {{ $item['question'] }}
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                Jawaban Anda: <span class="font-bold {{ $item['is_correct'] ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">{{ $item['user_answer'] }}</span>
                            </p>
                        </div>

                        {{-- Ikon Panah --}}
                        <svg class="w-5 h-5 text-slate-400 group-open:rotate-180 transition-transform shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>

                    {{-- Konten Accordion (Pertanyaan Lengkap & Pilihan) --}}
                    <div class="p-4 sm:p-5 border-t border-slate-100 dark:border-slate-800/50 bg-slate-50 dark:bg-slate-950/30">
                        <p class="text-sm sm:text-base text-slate-800 dark:text-slate-200 mb-4 leading-relaxed">{{ $item['question'] }}</p>
                        
                        <div class="space-y-2 mb-6">
                            @foreach($item['options'] as $key => $text)
                                @php
                                    $isUser = $item['user_answer'] === $key;
                                    $isCorrect = $item['correct_answer'] === $key;
                                    
                                    // Logika Warna Pilihan
                                    $bgClass = 'bg-white dark:bg-slate-900 border-slate-200 dark:border-slate-800';
                                    $textClass = 'text-slate-600 dark:text-slate-400';
                                    $icon = '';
                                    
                                    if ($isUser && $isCorrect) {
                                        // User menjawab benar
                                        $bgClass = 'bg-emerald-50 dark:bg-emerald-900/20 border-emerald-300 dark:border-emerald-800';
                                        $textClass = 'text-emerald-800 dark:text-emerald-300 font-semibold';
                                        $icon = '<svg class="w-4 h-4 text-emerald-500 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
                                    } elseif ($isUser && !$isCorrect) {
                                        // User menjawab salah
                                        $bgClass = 'bg-rose-50 dark:bg-rose-900/20 border-rose-300 dark:border-rose-800';
                                        $textClass = 'text-rose-800 dark:text-rose-300 font-semibold';
                                        $icon = '<svg class="w-4 h-4 text-rose-500 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>';
                                    } elseif ($isCorrect && !$isUser) {
                                        // Kunci jawaban (tapi bukan pilihan user)
                                        $bgClass = 'bg-emerald-50 dark:bg-emerald-900/20 border-emerald-300 dark:border-emerald-800 border-dashed';
                                        $textClass = 'text-emerald-800 dark:text-emerald-300 font-semibold';
                                        $icon = '<span class="text-[10px] font-bold text-emerald-600 ml-auto uppercase tracking-wide">Kunci Jawaban</span>';
                                    }
                                @endphp
                                
                                <div class="flex items-center gap-3 p-3 rounded-xl border {{ $bgClass }}">
                                    <span class="font-bold {{ $textClass }} w-5">{{ $key }}.</span>
                                    <span class="text-sm {{ $textClass }}">{{ $text }}</span>
                                    {!! $icon !!}
                                </div>
                            @endforeach
                        </div>

                        {{-- Penjelasan --}}
                        @if($item['explanation'])
                            <div class="p-4 rounded-xl bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-900/50">
                                <p class="text-xs font-bold text-blue-800 dark:text-blue-300 mb-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Pembahasan:
                                </p>
                                <p class="text-sm text-blue-700 dark:text-blue-300 leading-relaxed">{{ $item['explanation'] }}</p>
                            </div>
                        @endif
                    </div>
                </details>
            @endforeach
        </div>
    </div>

</div>

@endsection