@props([
    'title' => '',
    'issuedAt' => '',
    'score' => 0,
    'uniqueId' => 'NBL-XXXX',
    'url' => '#',
])

<article class="reveal group relative rounded-2xl bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 dark:from-slate-900 dark:via-blue-950 dark:to-slate-900 text-white overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-blue-600/30 transition-all duration-300">

    {{-- Pattern dekoratif --}}
    <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, white 0, white 1px, transparent 1px, transparent 12px);"></div>

    {{-- Ornamen ∇ besar --}}
    <span class="absolute -right-4 -bottom-6 text-[8rem] font-bold text-white/5 leading-none select-none">∇</span>

    {{-- Content --}}
    <div class="relative p-5 sm:p-6">

        {{-- Header: ikon + label --}}
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 rounded-xl bg-amber-400/20 border border-amber-400/40 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-amber-300 font-semibold">Sertifikat</p>
                    <p class="text-[10px] text-blue-200">HIMAFI UNUD</p>
                </div>
            </div>

            {{-- Stamp "VERIFIED" --}}
            <div class="w-12 h-12 rounded-full border-2 border-emerald-400/60 flex items-center justify-center rotate-12">
                <div class="text-[7px] text-emerald-400 font-bold text-center leading-tight">
                    ✓<br>VERIFIED
                </div>
            </div>
        </div>

        {{-- Judul kelas --}}
        <h3 class="font-bold text-base sm:text-lg leading-tight mb-4 line-clamp-2">
            {{ $title }}
        </h3>

        {{-- Score + ID --}}
        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="p-2.5 rounded-lg bg-white/10 backdrop-blur border border-white/10">
                <p class="text-[10px] text-blue-200 uppercase tracking-wide">Nilai Akhir</p>
                <p class="text-xl font-bold text-white">{{ $score }}</p>
            </div>
            <div class="p-2.5 rounded-lg bg-white/10 backdrop-blur border border-white/10">
                <p class="text-[10px] text-blue-200 uppercase tracking-wide">ID</p>
                <p class="text-xs font-mono text-white truncate">{{ $uniqueId }}</p>
            </div>
        </div>

        {{-- Barcode-style dekorasi --}}
        <div class="flex items-end gap-0.5 h-6 mb-3 opacity-40">
            @for ($i = 0; $i < 40; $i++)
                <div class="bg-white" style="width: {{ rand(1, 3) }}px; height: {{ rand(50, 100) }}%;"></div>
            @endfor
        </div>

        {{-- Footer: tanggal + tombol --}}
        <div class="flex items-center justify-between gap-2 pt-3 border-t border-white/10">
            <p class="text-[10px] text-blue-200">{{ $issuedAt }}</p>
            <a href="{{ $url }}" class="inline-flex items-center gap-1 text-xs font-semibold text-amber-300 hover:text-amber-200 group/link">
                Lihat
                <svg class="w-3.5 h-3.5 transition group-hover/link:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</article>