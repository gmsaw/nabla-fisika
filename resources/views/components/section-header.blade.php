@props([
    'number' => '01',
    'label' => '',
    'title' => '',
    'description' => '',
    'actionUrl' => null,
    'actionLabel' => null,
    'light' => false,  // nomor besar di background warna
])

<div class="reveal flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 sm:mb-16">
    <div>
        @if($label)
            <p class="text-xs sm:text-sm font-mono text-blue-600 dark:text-blue-400 font-semibold mb-2 tracking-widest">{{ $label }}</p>
        @endif
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold">{{ $title }}</h2>
        @if($description)
            <p class="mt-2 sm:mt-4 text-sm sm:text-base text-slate-600 dark:text-slate-400 max-w-xl">{{ $description }}</p>
        @endif
    </div>
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 self-start sm:self-auto">
        @if($actionUrl && $actionLabel)
            <a href="{{ $actionUrl }}" class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline">{{ $actionLabel }}</a>
        @endif
        <span class="text-5xl sm:text-7xl font-bold {{ $light ? 'text-slate-200/80 dark:text-slate-900' : 'text-slate-100 dark:text-slate-800' }} leading-none select-none">{{ $number }}</span>
    </div>
</div>