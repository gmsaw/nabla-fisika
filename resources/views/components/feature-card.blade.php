@props([
    'icon' => '📚',
    'title' => '',
    'description' => '',
    'index' => 0,
])

<div class="reveal reveal-delay-{{ ($index % 3) + 1 }} group relative p-5 sm:p-6 rounded-2xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 hover:border-blue-600 dark:hover:border-blue-500 hover:bg-white dark:hover:bg-slate-900 transition">
    <span class="absolute top-4 right-4 text-xs font-mono text-slate-300 dark:text-slate-700 select-none">
        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
    </span>
    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-blue-100 dark:bg-blue-950 flex items-center justify-center text-xl sm:text-2xl mb-3 sm:mb-4 transition group-hover:rotate-6">
        {{ $icon }}
    </div>
    <h3 class="font-bold text-base sm:text-lg mb-1.5 sm:mb-2">{{ $title }}</h3>
    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ $description }}</p>
</div>