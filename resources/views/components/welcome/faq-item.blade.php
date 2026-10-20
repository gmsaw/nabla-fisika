@props([
    'number' => '01',
    'question' => '',
    'answer' => '',
    'index' => 0,
])

<details class="reveal reveal-delay-{{ ($index % 3) + 1 }} group rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 p-4 sm:p-5 cursor-pointer hover:border-blue-300 dark:hover:border-blue-800 transition">
    <summary class="flex items-center justify-between font-semibold list-none gap-3 sm:gap-4 text-sm sm:text-base">
        <span class="flex items-start gap-3">
            <span class="font-mono text-xs text-blue-600 dark:text-blue-400 mt-1 shrink-0">{{ $number }}</span>
            <span>{{ $question }}</span>
        </span>
        <svg class="w-4 h-4 sm:w-5 sm:h-5 shrink-0 transition group-open:rotate-180 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </summary>
    <p class="mt-2 sm:mt-3 ml-8 text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ $answer }}</p>
</details>