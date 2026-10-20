@props([
    'label' => '',
    'value' => '0',
    'icon' => 'book',
    'trend' => null,
    'color' => 'blue',   // blue / green / amber / purple
])

@php
    $colorMap = [
        'blue'   => 'from-blue-500 to-cyan-500 bg-blue-100 dark:bg-blue-950 text-blue-600 dark:text-blue-400',
        'green'  => 'from-emerald-500 to-teal-500 bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400',
        'amber'  => 'from-amber-500 to-orange-500 bg-amber-100 dark:bg-amber-950 text-amber-600 dark:text-amber-400',
        'purple' => 'from-purple-500 to-pink-500 bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-400',
    ];
    $colors = $colorMap[$color] ?? $colorMap['blue'];
    [$gradient, $bgColor, $textColor] = explode(' ', $colors, 3) + ['', '', ''];
    // rebuild split
    $parts = explode(' ', $colors);
    $gradient = $parts[0].' '.$parts[1];
    $bgColor = $parts[2].' '.$parts[3];
    $textColor = $parts[4].' '.$parts[5];
@endphp

<div class="reveal p-5 sm:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:shadow-lg transition">
    <div class="flex items-start justify-between mb-3">
        <div class="w-11 h-11 rounded-xl {{ $bgColor }} flex items-center justify-center">
            <svg class="w-5 h-5 {{ $textColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @switch($icon)
                    @case('book')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        @break
                    @case('clock')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        @break
                    @case('certificate')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        @break
                    @case('fire')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                        @break
                    @default
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                @endswitch
            </svg>
        </div>
        @if($trend)
            <span class="text-xs font-semibold px-2 py-1 rounded-md bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300">
                {{ $trend }}
            </span>
        @endif
    </div>
    <p class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $value }}</p>
    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">{{ $label }}</p>
</div>