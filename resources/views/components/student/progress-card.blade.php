@props([
    'title' => '',
    'level' => 'Dasar',
    'category' => 'Fisika Inti',
    'progress' => 0,
    'totalModules' => 8,
    'completedModules' => 0,
    'nextModule' => null,
    'accent' => 'blue',
    'url' => '#',
])

@php
    $accentMap = [
        'blue'   => ['from-blue-500 to-cyan-500', 'bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300'],
        'purple' => ['from-purple-500 to-pink-500', 'bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-300'],
        'amber'  => ['from-amber-500 to-orange-500', 'bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-300'],
        'green'  => ['from-emerald-500 to-teal-500', 'bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-300'],
    ];
    [$gradient, $badgeColor] = $accentMap[$accent] ?? $accentMap['blue'];
    $remaining = max(0, $totalModules - $completedModules);
@endphp

<article class="reveal group rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col">

    {{-- Thumbnail gradient --}}
    <div class="relative h-32 bg-gradient-to-br {{ $gradient }} overflow-hidden">
        {{-- Pattern dekoratif --}}
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>

        {{-- Level badge (kanan atas) --}}
        <span class="absolute top-3 right-3 px-2.5 py-1 rounded-md bg-white/25 backdrop-blur text-white text-xs font-semibold">
            {{ $level }}
        </span>

        {{-- Progress % besar di kanan bawah --}}
        <div class="absolute bottom-3 right-3 text-white text-right">
            <p class="text-3xl font-bold leading-none">{{ $progress }}%</p>
            <p class="text-[10px] uppercase tracking-wider text-white/80">Selesai</p>
        </div>

        {{-- Ikon buku di kiri bawah --}}
        <div class="absolute bottom-3 left-3 w-10 h-10 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
    </div>

    {{-- Body --}}
    <div class="p-5 flex-1 flex flex-col">
        {{-- Category pill --}}
        <span class="self-start px-2 py-1 rounded-md {{ $badgeColor }} text-[10px] font-semibold mb-2">
            {{ $category }}
        </span>

        {{-- Judul --}}
        <h3 class="font-bold text-base mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition line-clamp-2">
            {{ $title }}
        </h3>

        {{-- Progress bar --}}
        <div class="mb-3">
            <div class="flex justify-between text-xs text-slate-500 dark:text-slate-400 mb-1.5">
                <span>{{ $completedModules }}/{{ $totalModules }} modul</span>
                <span>{{ $remaining }} tersisa</span>
            </div>
            <div class="h-1.5 rounded-full bg-slate-100 dark:bg-slate-800 overflow-hidden">
                <div class="h-full rounded-full bg-gradient-to-r {{ $gradient }} transition-all duration-500"
                     style="width: {{ $progress }}%"></div>
            </div>
        </div>

        {{-- Next module --}}
        @if($nextModule)
            <div class="mb-3 pt-3 border-t border-dashed border-slate-200 dark:border-slate-800">
                <p class="text-[10px] text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-0.5">Selanjutnya</p>
                <p class="text-xs font-semibold truncate">{{ $nextModule }}</p>
            </div>
        @endif

        {{-- Tombol --}}
        <a href="{{ $url }}"
           class="mt-auto inline-flex items-center justify-center gap-1.5 w-full px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition group/btn">
            {{ $nextModule ? 'Lanjut Belajar' : 'Mulai Belajar' }}
            <svg class="w-4 h-4 transition group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
</article>