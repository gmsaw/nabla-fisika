@extends('layouts.lecturer')

@section('title', 'Progres Mahasiswa — Dosen Nabla Fisika')
@section('header_title', 'Data Mahasiswa')

@section('content')

<div class="space-y-6 max-w-6xl mx-auto pb-20">

    {{-- Tombol Kembali --}}
    <a href="{{ route('lecturer.course.show', ['course' => 1]) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-emerald-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Detail Kelas
    </a>

    {{-- Header Halaman --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">Mekanika Klasik</span>
            </div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Progres Mahasiswa</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Pantau sejauh mana mahasiswa menyelesaikan materi dan nilai evaluasi mereka.</p>
        </div>
        
        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            Ekspor Data (CSV)
        </button>
    </div>

    {{-- Filter & Pencarian --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-4 shadow-sm flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" placeholder="Cari nama mahasiswa atau NIM...">
        </div>
        <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-emerald-500">
            <option>Semua Status</option>
            <option>Selesai (Lulus)</option>
            <option>Sedang Belajar</option>
            <option>Belum Mulai</option>
        </select>
    </div>

    {{-- Tabel Data Mahasiswa --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="px-6 py-4">Nama Mahasiswa</th>
                        <th class="px-6 py-4 w-1/3">Progres Modul</th>
                        <th class="px-6 py-4 text-center">Rata-rata Nilai</th>
                        <th class="px-6 py-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    
                    @php
                        // Data Dummy Mahasiswa
                        $students = [
                            [
                                'name' => 'Putu Mahasiswa',
                                'email' => 'putu@student.unud.ac.id',
                                'initial' => 'P',
                                'progress_pct' => 62,
                                'current_module' => 'Modul 6: Dinamika Rotasi',
                                'completed_modules' => 5,
                                'total_modules' => 8,
                                'avg_score' => 85,
                                'status' => 'active', // active, completed, not_started
                            ],
                            [
                                'name' => 'Angga Pratama',
                                'email' => 'angga@gmail.com',
                                'initial' => 'A',
                                'progress_pct' => 100,
                                'current_module' => 'Selesai',
                                'completed_modules' => 8,
                                'total_modules' => 8,
                                'avg_score' => 92,
                                'status' => 'completed',
                            ],
                            [
                                'name' => 'Made Wirawan',
                                'email' => 'made@student.unud.ac.id',
                                'initial' => 'M',
                                'progress_pct' => 100,
                                'current_module' => 'Selesai',
                                'completed_modules' => 8,
                                'total_modules' => 8,
                                'avg_score' => 88,
                                'status' => 'completed',
                            ],
                            [
                                'name' => 'Komang Surya',
                                'email' => 'komang@gmail.com',
                                'initial' => 'K',
                                'progress_pct' => 0,
                                'current_module' => 'Belum Mulai',
                                'completed_modules' => 0,
                                'total_modules' => 8,
                                'avg_score' => 0,
                                'status' => 'not_started',
                            ],
                        ];
                    @endphp

                    @foreach($students as $student)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            {{-- Info Siswa --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 text-white flex items-center justify-center font-bold shrink-0">
                                        {{ $student['initial'] }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-white">{{ $student['name'] }}</div>
                                        <div class="text-xs text-slate-500">{{ $student['email'] }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Progress Modul --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-between text-xs mb-1.5">
                                    <span class="font-semibold text-slate-700 dark:text-slate-300 truncate max-w-[250px]">{{ $student['current_module'] }}</span>
                                    <span class="text-slate-500">{{ $student['progress_pct'] }}%</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-slate-100 dark:bg-slate-800 overflow-hidden">
                                    <div class="h-full rounded-full {{ $student['status'] === 'completed' ? 'bg-emerald-500' : 'bg-blue-500' }}" style="width: {{ $student['progress_pct'] }}%"></div>
                                </div>
                                <div class="text-[11px] text-slate-500 mt-1">
                                    {{ $student['completed_modules'] }} dari {{ $student['total_modules'] }} modul selesai
                                </div>
                            </td>

                            {{-- Rata-rata Nilai --}}
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full {{ $student['avg_score'] >= 75 ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400' : 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400' }} font-bold">
                                    {{ $student['avg_score'] }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 text-center">
                                @if($student['status'] === 'completed')
                                    <span class="px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 text-[10px] font-bold uppercase tracking-wider">Lulus</span>
                                @elseif($student['status'] === 'active')
                                    <span class="px-2.5 py-1 rounded-md bg-blue-100 text-blue-700 dark:bg-blue-950 dark:text-blue-400 text-[10px] font-bold uppercase tracking-wider">Aktif</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400 text-[10px] font-bold uppercase tracking-wider">Belum Mulai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Dummy --}}
        <div class="p-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between text-sm text-slate-500">
            <span>Menampilkan 1-4 dari 128 mahasiswa</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition disabled:opacity-50" disabled>Prev</button>
                <button class="px-3 py-1 rounded bg-emerald-600 text-white font-medium">1</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">2</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">Next</button>
            </div>
        </div>
    </div>

</div>

@endsection