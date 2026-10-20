@props([
    'items' => [],
    'title' => null,
])

<section class="border-y border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 py-4 sm:py-5 overflow-hidden reveal">
    <div class="marquee-wrapper relative">
        <div class="marquee-track gap-8 sm:gap-12 text-sm sm:text-base font-semibold text-slate-400 dark:text-slate-600">
            @foreach ($items as $item)
                <span class="flex items-center gap-2 shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    {{ $item }}
                </span>
            @endforeach
            @foreach ($items as $item)
                <span class="flex items-center gap-2 shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                    {{ $item }}
                </span>
            @endforeach
        </div>
    </div>
</section>