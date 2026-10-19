@props([
    'name' => '',
    'role' => '',
    'quote' => '',
    'initial' => 'A',
    'rotate' => 'rotate-0',
    'index' => 0,
])

<div class="reveal reveal-delay-{{ ($index % 3) + 1 }} p-5 sm:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 {{ $rotate }} hover:rotate-0 transition-transform duration-300">
    <div class="flex items-center gap-1 text-amber-400 mb-3 sm:mb-4">
        @for ($s = 0; $s < 5; $s++)
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
        @endfor
    </div>
    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 italic mb-4 leading-relaxed">"{{ $quote }}"</p>
    <div class="flex items-center gap-3">
        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center font-bold text-sm sm:text-base shrink-0">
            {{ $initial }}
        </div>
        <div>
            <p class="font-bold text-sm">{{ $name }}</p>
            <p class="text-[11px] sm:text-xs text-slate-500">{{ $role }}</p>
        </div>
    </div>
</div>