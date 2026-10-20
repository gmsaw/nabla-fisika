@props([
    'weeks' => 26, // ~6 bulan
])

@php
    $totalDays = $weeks * 7;
    $activity = [];
    for ($i = 0; $i < $totalDays; $i++) {
        $activity[] = fake()->boolean(55) ? fake()->numberBetween(1, 4) : 0;
    }

    // Total kontribusi
    $totalContrib = collect($activity)->sum();

    // Label bulan — pakai posisi kolom (0, 4, 8, dst)
    $monthLabels = [];
    $startDate = now()->subWeeks($weeks - 1)->startOfWeek();
    for ($w = 0; $w < $weeks; $w++) {
        $weekStart = $startDate->copy()->addWeeks($w);
        if ($weekStart->day <= 7 || $w === 0) {
            $monthLabels[$w] = $weekStart->translatedFormat('M');
        }
    }

    $intensityClass = [
        0 => 'bg-slate-100 dark:bg-slate-800',
        1 => 'bg-emerald-200 dark:bg-emerald-900',
        2 => 'bg-emerald-400 dark:bg-emerald-700',
        3 => 'bg-emerald-500 dark:bg-emerald-500',
        4 => 'bg-emerald-600 dark:bg-emerald-400',
    ];

    $dayLabels = ['Sen', '', 'Rab', '', 'Jum', '', ''];
@endphp

<div class="reveal rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-5 sm:p-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
        <div>
            <h3 class="font-bold text-base sm:text-lg">{{ $totalContrib }} aktivitas</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Dalam {{ $weeks }} minggu terakhir</p>
        </div>
        <div class="flex items-center gap-1.5 text-[10px] text-slate-500 dark:text-slate-400">
            <span>Sedikit</span>
            @foreach($intensityClass as $cls)
                <span class="w-2.5 h-2.5 rounded-sm {{ $cls }}"></span>
            @endforeach
            <span>Banyak</span>
        </div>
    </div>

    {{-- Grid heatma --}}
    <div class="overflow-x-auto pb-2">
        <div class="inline-flex gap-1 min-w-full">

            {{-- Kolom label hari (kiri) --}}
            <div class="flex flex-col gap-1 pt-5 pr-1 shrink-0">
                @foreach($dayLabels as $label)
                    <div class="h-2.5 sm:h-3 flex items-center">
                        <span class="text-[9px] text-slate-400 dark:text-slate-500 leading-none">{{ $label }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Kolom minggu --}}
            <div class="flex gap-1">
                @for ($w = 0; $w < $weeks; $w++)
                    <div class="flex flex-col gap-1">
                        {{-- Label bulan (di atas kolom minggu pertama bulan) --}}
                        <div class="h-4 text-[9px] text-slate-500 dark:text-slate-400 leading-none">
                            {{ $monthLabels[$w] ?? '' }}
                        </div>

                        {{-- 7 hari dalam 1 minggu --}}
                        @for ($d = 0; $d < 7; $d++)
                            @php
                                $idx = $w * 7 + $d;
                                $level = $activity[$idx] ?? 0;
                                $isWeekend = $d === 5 || $d === 6;
                            @endphp
                            <div class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-sm {{ $intensityClass[$level] }} {{ $isWeekend ? 'opacity-60' : '' }} hover:ring-2 hover:ring-blue-500 hover:ring-offset-1 dark:hover:ring-offset-slate-900 transition cursor-pointer"
                                 title="Minggu ke-{{ $w + 1 }}, hari ke-{{ $d + 1 }}: {{ $level }} aktivitas"></div>
                        @endfor
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>