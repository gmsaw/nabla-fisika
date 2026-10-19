@props([
    'icon' => null,
    'value' => '',
    'label' => '',
])

<div class="text-center">
    @if($icon)
        <div class="inline-flex w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-blue-100 dark:bg-blue-950 items-center justify-center mb-2">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        </div>
    @endif
    <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $value }}</p>
    <p class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400">{{ $label }}</p>
</div>