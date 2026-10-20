@extends('layouts.student')

@section('title', 'Mengerjakan Kuis — Nabla Fisika')

@push('styles')
<style>
    /* Timer berkedip saat waktu hampir habis */
    @keyframes pulse-red {
        0%, 100% { color: #ef4444; }
        50% { color: #7f1d1d; }
    }
    .timer-warning { animation: pulse-red 1s infinite; }
</style>
@endpush

@section('content')

@php
    // Data dummy soal
    $questions = [
        [
            'id' => 1,
            'text' => 'Sebuah roda berputar dengan kecepatan sudut konstan. Jika momen inersia roda diperbesar dua kali lipat, maka energi kinetik rotasinya menjadi...',
            'options' => [
                'A' => 'Tetap sama',
                'B' => 'Dua kali lipat',
                'C' => 'Setengah kali lipat',
                'D' => 'Empat kali lipat',
            ]
        ],
        [
            'id' => 2,
            'text' => 'Besaran yang menyebabkan benda mengalami gerak rotasi disebut...',
            'options' => [
                'A' => 'Gaya',
                'B' => 'Torsi (Momen Gaya)',
                'C' => 'Momentum',
                'D' => 'Impuls',
            ]
        ]
    ];

    $currentQuestion = $questions[0];
@endphp

<div class="max-w-4xl mx-auto pt-4 sm:pt-8 pb-24">

    {{-- ============ HEADER: TIMER & PROGRESS ============ --}}
    <div class="sticky top-20 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border border-slate-200 dark:border-slate-800 rounded-2xl p-4 shadow-sm mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        
        {{-- Info Soal --}}
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-400 flex items-center justify-center font-bold">
                1/10
            </div>
            <div>
                <p class="text-sm font-bold text-slate-800 dark:text-slate-200">Soal 1 dari 10</p>
                <p class="text-xs text-slate-500">Kuis Dinamika Rotasi</p>
            </div>
        </div>

        {{-- Timer --}}
        <div class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="font-mono text-lg font-bold text-slate-800 dark:text-slate-200" id="timerDisplay">14:59</span>
        </div>

        {{-- Tombol Keluar --}}
        <a href="{{ route('student.quiz.show', ['slug' => 'mekanika-klasik', 'quiz' => 1]) }}" class="text-sm font-semibold text-slate-500 hover:text-rose-500 transition" onclick="return confirm('Yakin ingin keluar? Waktu akan terus berjalan dan jawaban tidak akan tersimpan.')">
            Keluar
        </a>
    </div>

    {{-- Progress Bar Keseluruhan --}}
    <div class="h-2 w-full bg-slate-100 dark:bg-slate-800 rounded-full mb-8 overflow-hidden">
        <div class="h-full bg-purple-500 rounded-full" style="width: 10%"></div>
    </div>

    {{-- ============ KARTU SOAL ============ --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-10 shadow-sm mb-8">
        <h2 class="text-lg sm:text-xl font-bold text-slate-800 dark:text-slate-100 leading-relaxed mb-8">
            {{ $currentQuestion['text'] }}
        </h2>

        {{-- Pilihan Ganda --}}
        <div class="space-y-3">
            @foreach($currentQuestion['options'] as $key => $option)
                <label class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:border-purple-300 dark:hover:border-purple-700 transition cursor-pointer relative">
                    <input type="radio" name="answer" value="{{ $key }}" class="peer sr-only">
                    
                    {{-- Kustom Radio Button --}}
                    <div class="w-6 h-6 rounded-full border-2 border-slate-300 dark:border-slate-600 flex items-center justify-center shrink-0 peer-checked:border-purple-600 peer-checked:bg-purple-600 transition">
                        <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100 transition"></div>
                    </div>
                    
                    <div class="flex items-center gap-3 w-full">
                        <span class="font-bold text-slate-500 group-hover:text-purple-600 peer-checked:text-purple-600 transition w-5">{{ $key }}.</span>
                        <span class="text-sm sm:text-base text-slate-700 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white transition">{{ $option }}</span>
                    </div>
                </label>
            @endforeach
        </div>
    </div>

    {{-- ============ NAVIGASI SOAL ============ --}}
    <div class="fixed bottom-0 inset-x-0 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 p-4 z-50">
        <div class="max-w-4xl mx-auto flex items-center justify-between gap-4">
            
            {{-- Tombol Sebelumnya --}}
            <button class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-semibold text-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition disabled:opacity-50" disabled>
                Sebelumnya
            </button>

            {{-- Nomor Soal (Scrollable di HP) --}}
            <div class="hidden sm:flex items-center gap-1.5 overflow-x-auto hide-scrollbar">
                @for ($i = 1; $i <= 10; $i++)
                    <button class="w-8 h-8 rounded-lg flex items-center justify-center text-xs font-bold transition {{ $i === 1 ? 'bg-purple-600 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-500 hover:bg-slate-200 dark:hover:bg-slate-700' }}">
                        {{ $i }}
                    </button>
                @endfor
            </div>

            {{-- Tombol Selanjutnya / Selesai --}}
            {{-- Ubah href ini agar mengarah ke halaman hasil --}}
            <a href="{{ route('student.quiz.result', ['slug' => 'mekanika-klasik', 'quiz' => 1]) ?? '#' }}" 
               class="px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-semibold text-sm transition shadow-lg shadow-purple-600/25 flex items-center gap-2">
                <span>Selesai & Lihat Hasil</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </a>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- LOGIKA TIMER (SIMULASI 15 MENIT) ---
        let timeInSeconds = 15 * 60; // 15 menit
        const timerDisplay = document.getElementById('timerDisplay');

        const timer = setInterval(() => {
            timeInSeconds--;
            
            const minutes = Math.floor(timeInSeconds / 60);
            const seconds = timeInSeconds % 60;
            
            // Format MM:SS
            timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            // Jika waktu hampir habis (< 1 menit), beri warna merah berkedip
            if (timeInSeconds <= 60) {
                timerDisplay.classList.add('timer-warning', 'text-rose-500');
            }

            // Waktu habis
            if (timeInSeconds <= 0) {
                clearInterval(timer);
                alert('Waktu habis! Jawaban Anda akan otomatis dikumpulkan.');
                // Nanti di sini logika untuk submit form otomatis
                // document.getElementById('quizForm').submit();
            }
        }, 1000);
    });
</script>
@endpush