@props([
    'title' => 'Siap Mulai Perjalanan Fisikamu?',
    'description' => 'Bergabung gratis. Tidak perlu kartu kredit. Sertifikat resmi menantimu di akhir kelas.',
    'primaryUrl' => '#',
    'primaryLabel' => 'Daftar Sekarang',
    'secondaryUrl' => '#katalog',
    'secondaryLabel' => 'Lihat Katalog',
])

<div class="reveal max-w-5xl mx-auto rounded-2xl sm:rounded-3xl bg-gradient-to-br from-blue-600 via-blue-600 to-blue-700 p-8 sm:p-10 lg:p-16 text-center text-white shadow-xl shadow-blue-600/20 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <svg class="absolute -right-10 -top-10 w-40 h-40 sm:w-56 sm:h-56 opacity-20 animate-spin-slow" viewBox="0 0 100 100" fill="none" stroke="white" stroke-width="0.5">
            <ellipse cx="50" cy="50" rx="45" ry="20"/>
            <ellipse cx="50" cy="50" rx="45" ry="20" transform="rotate(60 50 50)"/>
            <ellipse cx="50" cy="50" rx="45" ry="20" transform="rotate(120 50 50)"/>
            <circle cx="50" cy="50" r="3" fill="white"/>
        </svg>
        <svg class="absolute -left-10 -bottom-10 w-40 h-40 sm:w-56 sm:h-56 opacity-20 animate-spin-slower" viewBox="0 0 100 100" fill="none" stroke="white" stroke-width="0.5">
            <ellipse cx="50" cy="50" rx="45" ry="20"/>
            <ellipse cx="50" cy="50" rx="45" ry="20" transform="rotate(60 50 50)"/>
            <ellipse cx="50" cy="50" rx="45" ry="20" transform="rotate(120 50 50)"/>
            <circle cx="50" cy="50" r="3" fill="white"/>
        </svg>
    </div>

    <div class="relative">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold">{{ $title }}</h2>
        <p class="mt-3 sm:mt-4 text-sm sm:text-base text-blue-100 max-w-2xl mx-auto">{{ $description }}</p>
        <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ $primaryUrl }}" class="px-6 py-3 rounded-xl bg-white text-blue-600 font-semibold hover:bg-blue-50 transition min-h-[48px] inline-flex items-center justify-center">
                {{ $primaryLabel }}
            </a>
            <a href="{{ $secondaryUrl }}" class="px-6 py-3 rounded-xl border-2 border-white/40 font-semibold hover:bg-white/10 transition min-h-[48px] inline-flex items-center justify-center">
                {{ $secondaryLabel }}
            </a>
        </div>
    </div>
</div>