@extends('layouts.student')

@section('title', 'Katalog Kelas — Nabla Fisika')

@section('content')

{{-- ============ HEADER KATALOG ============ --}}
<section class="relative overflow-hidden -mt-20 sm:-mt-24 pt-28 sm:pt-36 pb-16 sm:pb-20 px-4 sm:px-6 lg:px-8">
    {{-- Background deep navy --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-slate-900 via-[#0a1628] to-slate-950"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-blue-500/15 rounded-full blur-3xl -z-10"></div>
    <div class="absolute inset-0 bg-grid opacity-[0.15] -z-10" style="mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);"></div>
    <div class="absolute inset-0 bg-noise opacity-30 -z-10"></div>

    <div class="max-w-7xl mx-auto relative text-center">
        <div class="inline-flex items-center gap-2 mb-4">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            <p class="text-[10px] sm:text-xs font-mono font-semibold tracking-widest text-emerald-300/90 uppercase">
                Eksplorasi Ilmu
            </p>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
            Temukan Kelas Fisikamu
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto mb-8">
            Jelajahi berbagai bidang peminatan fisika. Mulai dari dasar hingga lanjut, semua terstruktur dan tersertifikasi.
        </p>

        {{-- Search Bar --}}
        <div class="max-w-2xl mx-auto relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="text" id="searchInput" 
                   class="w-full pl-12 pr-4 py-3.5 sm:py-4 rounded-2xl bg-white/10 hover:bg-white/15 focus:bg-white/15 border border-white/20 focus:border-blue-400/50 text-white placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition backdrop-blur-md"
                   placeholder="Cari kelas, topik, atau peminatan...">
        </div>
    </div>
</section>

{{-- ============ FILTER & KATALOG ============ --}}
<section class="py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        {{-- Filter Bar --}}
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">
            
            {{-- Filter Tingkat --}}
            <div class="w-full lg:w-auto overflow-x-auto pb-2 lg:pb-0 hide-scrollbar">
                <div class="flex items-center gap-2 min-w-max">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mr-2">Tingkat:</span>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-blue-600 bg-blue-600 text-white transition-all" data-filter-type="level" data-filter-value="all">Semua</button>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="level" data-filter-value="Dasar">Dasar</button>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="level" data-filter-value="Menengah">Menengah</button>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="level" data-filter-value="Lanjut">Lanjut</button>
                </div>
            </div>

            {{-- Filter Peminatan --}}
            <div class="w-full lg:w-auto overflow-x-auto pb-2 lg:pb-0 hide-scrollbar">
                <div class="flex items-center gap-2 min-w-max">
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mr-2">Peminatan:</span>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="category" data-filter-value="all">Semua</button>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="category" data-filter-value="Fisika Inti">Fisika Inti</button>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="category" data-filter-value="Fisika Komputasi">Fisika Komputasi</button>
                    <button class="filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all" data-filter-type="category" data-filter-value="Fisika Medis">Fisika Medis</button>
                </div>
            </div>
        </div>

        {{-- Info Hasil --}}
        <div class="mb-6 flex justify-between items-center">
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Menampilkan <span id="resultCount" class="font-bold text-slate-800 dark:text-white">6</span> kelas
            </p>
        </div>

        {{-- Grid Katalog --}}
        @php
            $courses = [
                [
                    'id' => 1,
                    'title' => 'Mekanika Klasik',
                    'level' => 'Dasar',
                    'category' => 'Fisika Inti',
                    'modules' => 8,
                    'duration' => '12 jam',
                    'students' => 128,
                    'desc' => 'Hukum Newton, kinematika, dinamika, dan energi — fondasi wajib semua cabang fisika.',
                    'accent' => 'blue',
                    'instructor' => 'Dr. Wayan Sudira',
                ],
                [
                    'id' => 2,
                    'title' => 'Elektromagnetisme',
                    'level' => 'Menengah',
                    'category' => 'Fisika Inti',
                    'modules' => 10,
                    'duration' => '18 jam',
                    'students' => 94,
                    'desc' => 'Medan listrik, medan magnet, induksi Faraday, dan persamaan Maxwell secara bertahap.',
                    'accent' => 'purple',
                    'instructor' => 'Prof. Made Wirawan',
                ],
                [
                    'id' => 3,
                    'title' => 'Fisika Komputasi',
                    'level' => 'Lanjut',
                    'category' => 'Fisika Komputasi',
                    'modules' => 12,
                    'duration' => '22 jam',
                    'students' => 67,
                    'desc' => 'Metode numerik, simulasi sistem fisika, dan visualisasi data dengan Python.',
                    'accent' => 'amber',
                    'instructor' => 'I Made Agus',
                ],
                [
                    'id' => 4,
                    'title' => 'Fisika Medis Dasar',
                    'level' => 'Dasar',
                    'category' => 'Fisika Medis',
                    'modules' => 6,
                    'duration' => '10 jam',
                    'students' => 45,
                    'desc' => 'Pengantar aplikasi fisika dalam dunia medis, dari radioterapi hingga pencitraan MRI.',
                    'accent' => 'green',
                    'instructor' => 'Dr. Putu Ayu',
                ],
                [
                    'id' => 5,
                    'title' => 'Termodinamika',
                    'level' => 'Menengah',
                    'category' => 'Fisika Inti',
                    'modules' => 9,
                    'duration' => '15 jam',
                    'students' => 110,
                    'desc' => 'Hukum termodinamika, entropi, dan mesin kalor yang mendasari berbagai sistem energi.',
                    'accent' => 'blue',
                    'instructor' => 'Dr. Nyoman Raka',
                ],
                [
                    'id' => 6,
                    'title' => 'Machine Learning untuk Fisika',
                    'level' => 'Lanjut',
                    'category' => 'Fisika Komputasi',
                    'modules' => 14,
                    'duration' => '25 jam',
                    'students' => 32,
                    'desc' => 'Penerapan AI dan machine learning untuk analisis data eksperimen fisika modern.',
                    'accent' => 'purple',
                    'instructor' => 'Dr. Komang Surya',
                ],
            ];
        @endphp

        <div id="courseGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @foreach ($courses as $i => $course)
                <div class="course-item" 
                     data-level="{{ $course['level'] }}" 
                     data-category="{{ $course['category'] }}"
                     data-title="{{ strtolower($course['title'] . ' ' . $course['desc'] . ' ' . $course['instructor']) }}">
                     
                    {{-- Panggil komponen course-card yang sudah ada --}}
                    <x-domain.course-card
                        :index="$i"
                        :title="$course['title']"
                        :description="$course['desc']"
                        :level="$course['level']"
                        :category="$course['category']"
                        :modules="$course['modules']"
                        :duration="$course['duration']"
                        :students="$course['students']"
                        :accent="$course['accent']"
                        :url="route('student.course.learn', ['slug' => Str::slug($course['title'])]) ?? '#'"
                    />
                    
                    {{-- Info Dosen (Opsional, ditambahkan manual di bawah card) --}}
                    <div class="mt-3 px-1 flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-[10px] font-bold text-slate-600 dark:text-slate-300">
                            {{ substr($course['instructor'], 0, 1) }}
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ $course['instructor'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Empty State (Jika filter kosong) --}}
        <div id="emptyState" class="hidden flex-col items-center justify-center py-20 text-center">
            <div class="w-20 h-20 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-2">Kelas Tidak Ditemukan</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-md">
                Coba ubah kata kunci pencarian atau filter yang kamu pilih.
            </p>
            <button id="resetFilterBtn" class="mt-6 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">
                Reset Filter
            </button>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<style>
    /* Sembunyikan scrollbar untuk filter horizontal di HP */
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const courseItems = document.querySelectorAll('.course-item');
        const resultCount = document.getElementById('resultCount');
        const emptyState = document.getElementById('emptyState');
        const courseGrid = document.getElementById('courseGrid');
        const resetFilterBtn = document.getElementById('resetFilterBtn');

        // State filter
        let activeFilters = {
            level: 'all',
            category: 'all',
            search: ''
        };

        // Fungsi Filter
        function applyFilters() {
            let visibleCount = 0;

            courseItems.forEach(item => {
                const itemLevel = item.getAttribute('data-level');
                const itemCategory = item.getAttribute('data-category');
                const itemTitle = item.getAttribute('data-title');

                // Cek apakah cocok dengan semua filter
                const matchLevel = activeFilters.level === 'all' || itemLevel === activeFilters.level;
                const matchCategory = activeFilters.category === 'all' || itemCategory === activeFilters.category;
                const matchSearch = itemTitle.includes(activeFilters.search);

                if (matchLevel && matchCategory && matchSearch) {
                    item.style.display = 'block';
                    // Animasi fade in
                    item.animate([{ opacity: 0, transform: 'translateY(10px)' }, { opacity: 1, transform: 'translateY(0)' }], { duration: 300, fill: 'forwards' });
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Update UI
            resultCount.textContent = visibleCount;
            
            if (visibleCount === 0) {
                courseGrid.classList.add('hidden');
                emptyState.classList.remove('hidden');
                emptyState.classList.add('flex');
            } else {
                courseGrid.classList.remove('hidden');
                emptyState.classList.add('hidden');
                emptyState.classList.remove('flex');
            }
        }

        // Event Listener untuk Search
        searchInput.addEventListener('input', (e) => {
            activeFilters.search = e.target.value.toLowerCase();
            applyFilters();
        });

        // Event Listener untuk Filter Buttons
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const type = btn.getAttribute('data-filter-type');
                const value = btn.getAttribute('data-filter-value');

                // Update state
                activeFilters[type] = value;

                // Update visual button (dalam grup yang sama)
                document.querySelectorAll(`.filter-btn[data-filter-type="${type}"]`).forEach(b => {
                    // Reset ke style inaktif
                    b.className = 'filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all';
                });
                
                // Set button yang diklik ke style aktif
                btn.className = 'filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-blue-600 bg-blue-600 text-white transition-all';

                applyFilters();
            });
        });

        // Reset Filter
        resetFilterBtn.addEventListener('click', () => {
            searchInput.value = '';
            activeFilters = { level: 'all', category: 'all', search: '' };
            
            // Reset visual semua button
            filterBtns.forEach(b => {
                if (b.getAttribute('data-filter-value') === 'all') {
                    b.className = 'filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-blue-600 bg-blue-600 text-white transition-all';
                } else {
                    b.className = 'filter-btn px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:border-blue-400 transition-all';
                }
            });

            applyFilters();
        });
    });
</script>
@endpush