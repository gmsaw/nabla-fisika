@props([
    'number' => '1',
    'icon' => '📝',
    'title' => '',
    'description' => '',
])

<div class="relative text-center group">
    <div class="relative w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-3 sm:mb-4">
        <div class="absolute inset-0 rounded-full border border-dashed border-blue-300 dark:border-blue-800 animate-spin-slow opacity-50"></div>
        <div class="absolute inset-1 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white font-bold text-base sm:text-lg shadow-lg shadow-blue-600/30">
            {{ $number }}
        </div>
    </div>
    <div class="text-xl sm:text-2xl mb-2 transition group-hover:scale-110">{{ $icon }}</div>
    <h3 class="font-bold text-sm sm:text-base mb-1.5 sm:mb-2">{{ $title }}</h3>
    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed max-w-xs mx-auto">{{ $description }}</p>
</div>