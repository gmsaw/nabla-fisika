@extends('layouts.admin')

@section('title', 'Analytics — Admin Nabla Fisika')
@section('header_title', 'Statistik & Analytics')

@section('content')

<div class="space-y-6">

    {{-- ============ HEADER & FILTER TANGGAL ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Ringkasan Performa</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Pantau pertumbuhan pengguna dan aktivitas belajar di platform.</p>
        </div>
        
        <div class="flex items-center gap-2">
            <select class="px-4 py-2 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-blue-500 shadow-sm">
                <option>7 Hari Terakhir</option>
                <option>30 Hari Terakhir</option>
                <option>6 Bulan Terakhir</option>
                <option>Tahun Ini</option>
            </select>
            <button class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Ekspor Laporan
            </button>
        </div>
    </div>

    {{-- ============ KARTU RINGKASAN (KPI) ============ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">Total Pendaftar Baru</p>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">124</h3>
            <div class="flex items-center gap-1 mt-2 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                +18% dari minggu lalu
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">Kelas Diselesaikan</p>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">89</h3>
            <div class="flex items-center gap-1 mt-2 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                +5% dari minggu lalu
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">Rata-rata Nilai Kuis</p>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">82.5</h3>
            <div class="flex items-center gap-1 mt-2 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                +2.1 poin
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mb-1">Sertifikat Diterbitkan</p>
            <h3 class="text-2xl font-bold text-slate-800 dark:text-white">45</h3>
            <div class="flex items-center gap-1 mt-2 text-xs font-semibold text-rose-600 dark:text-rose-400">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                -2% dari minggu lalu
            </div>
        </div>
    </div>

    {{-- ============ GRAFIK & DEMOGRAFI ============ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Grafik Aktivitas Pendaftaran (Bar Chart CSS) --}}
        <div class="lg:col-span-2 bg-white dark:bg-slate-900 p-5 sm:p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-slate-800 dark:text-white">Tren Pendaftaran Pengguna</h3>
            </div>
            
            {{-- Bar Chart Dummy --}}
            <div class="h-64 flex items-end justify-between gap-2 sm:gap-4">
                @php
                    $bars = [
                        ['day' => 'Sen', 'height' => '40%', 'val' => 15],
                        ['day' => 'Sel', 'height' => '60%', 'val' => 24],
                        ['day' => 'Rab', 'height' => '35%', 'val' => 12],
                        ['day' => 'Kam', 'height' => '80%', 'val' => 42],
                        ['day' => 'Jum', 'height' => '50%', 'val' => 20],
                        ['day' => 'Sab', 'height' => '90%', 'val' => 55],
                        ['day' => 'Min', 'height' => '70%', 'val' => 35],
                    ];
                @endphp
                @foreach($bars as $bar)
                    <div class="flex flex-col items-center gap-2 flex-1 group">
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-t-lg relative flex items-end justify-center h-full">
                            <div class="w-full bg-blue-500 hover:bg-blue-400 transition-all rounded-t-lg relative" style="height: {{ $bar['height'] }}">
                                {{-- Tooltip on Hover --}}
                                <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition pointer-events-none whitespace-nowrap z-10">
                                    {{ $bar['val'] }} User
                                </span>
                            </div>
                        </div>
                        <span class="text-xs font-medium text-slate-500">{{ $bar['day'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Demografi Peminatan --}}
        <div class="bg-white dark:bg-slate-900 p-5 sm:p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-6">Peminatan Terpopuler</h3>
            
            <div class="space-y-4">
                @php
                    $categories = [
                        ['name' => 'Fisika Inti', 'count' => 450, 'pct' => '45%', 'color' => 'bg-blue-500'],
                        ['name' => 'Fisika Komputasi', 'count' => 300, 'pct' => '30%', 'color' => 'bg-purple-500'],
                        ['name' => 'Fisika Medis', 'count' => 150, 'pct' => '15%', 'color' => 'bg-emerald-500'],
                        ['name' => 'Geofisika', 'count' => 100, 'pct' => '10%', 'color' => 'bg-amber-500'],
                    ];
                @endphp
                @foreach($categories as $cat)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-slate-700 dark:text-slate-300">{{ $cat['name'] }}</span>
                            <span class="text-slate-500">{{ $cat['count'] }}</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2">
                            <div class="{{ $cat['color'] }} h-2 rounded-full" style="width: {{ $cat['pct'] }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

@endsection