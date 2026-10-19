@props([
    'title' => '',
    'description' => '',
    'level' => 'Dasar',
    'category' => 'Fisika Inti',
    'modules' => 0,
    'duration' => '',
    'students' => 0,
    'accent' => 'blue',
    'url' => '#',
    'index' => 0,
])

@php
    $accentClass = match($accent) {
        'blue' => 'from-blue-500 to-cyan-500',
        'purple' => 'from-purple-500 to-pink-500',
        'amber' => 'from-amber-500 to-orange-500',
        default => 'from-blue-500 to-cyan-500',
    };
@endphp

<article class="reveal reveal-delay-{{ ($index % 3) + 1 }} group relative rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r {{ $accentClass }} opacity-0 group-hover:opacity-100 transition"></div>

    <div class="flex flex-wrap gap-2 mb-3">
        <span class="px-2 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] sm:text-xs font-semibold">{{ $level }}</span>
        <span class="px-2 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-[10px] sm:text-xs font-semibold">{{ $category }}</span>
    </div>

    <h3 class="font-bold text-base sm:text-lg mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">{{ $title }}</h3>
    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 mb-4 line-clamp-2">{{ $description }}</p>

    <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 mb-4 pb-4 border-b border-dashed border-slate-200 dark:border-slate-800">
        <span>📖 {{ $modules }} Modul</span>
        <span class="w-1 h-1 rounded-full bg-slate-300 dark:bg-slate-700"></span>
        <span>⏱ {{ $duration }}</span>
        <span class="w-1 h-1 rounded-full bg-slate-300 dark:bg-slate-700"></span>
        <span>👥 {{ $students }} siswa</span>
    </div>

    <a href="{{ $url }}" class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 dark:text-blue-400 hover:gap-2 transition-all">
        Lihat Silabus
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</article>