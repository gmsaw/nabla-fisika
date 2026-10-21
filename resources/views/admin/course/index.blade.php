@extends('layouts.admin')

@section('title', 'Kelola Kelas — Admin Nabla Fisika')
@section('header_title', 'Manajemen Kelas')

@section('content')

<div class="space-y-6">

    {{-- ============ HEADER & STATISTIK KECIL ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Kelas</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola publikasi dan persetujuan kelas dari Dosen.</p>
        </div>
        
        {{-- Fitur Tambah Kelas (Biasanya admin juga bisa buat kelas) --}}
        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Kelas
        </button>
    </div>

    {{-- Card Container Tabel --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        
        {{-- Toolbar (Search & Filter) --}}
        <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Cari nama kelas atau dosen...">
            </div>
            <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-blue-500">
                <option>Semua Status</option>
                <option>Published</option>
                <option>Pending (Menunggu)</option>
                <option>Draft</option>
            </select>
        </div>

        {{-- Tabel Data Kelas --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="px-5 py-4">Info Kelas</th>
                        <th class="px-5 py-4">Dosen Pengampu</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Peserta</th>
                        <th class="px-5 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    
                    @php
                        // Data Dummy Kelas
                        $courses = [
                            [
                                'title' => 'Mekanika Klasik',
                                'category' => 'Fisika Inti',
                                'instructor' => 'Dr. Wayan Sudira',
                                'status' => 'published',
                                'students' => 128,
                            ],
                            [
                                'title' => 'Fisika Kuantum Lanjut',
                                'category' => 'Fisika Inti',
                                'instructor' => 'Dr. Wayan Sudira',
                                'status' => 'pending',
                                'students' => 0,
                            ],
                            [
                                'title' => 'Termodinamika Terapan',
                                'category' => 'Fisika Medis',
                                'instructor' => 'Prof. Made Wirawan',
                                'status' => 'pending',
                                'students' => 0,
                            ],
                            [
                                'title' => 'Fisika Komputasi',
                                'category' => 'Fisika Komputasi',
                                'instructor' => 'I Made Agus',
                                'status' => 'draft',
                                'students' => 0,
                            ],
                            [
                                'title' => 'Elektromagnetisme',
                                'category' => 'Fisika Inti',
                                'instructor' => 'Prof. Made Wirawan',
                                'status' => 'published',
                                'students' => 94,
                            ],
                        ];
                    @endphp

                    @foreach($courses as $course)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            {{-- Info Kelas --}}
                            <td class="px-5 py-4">
                                <div class="font-bold text-slate-800 dark:text-white">{{ $course['title'] }}</div>
                                <div class="text-xs text-slate-500 mt-1">{{ $course['category'] }}</div>
                            </td>
                            
                            {{-- Dosen --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-950 text-blue-600 flex items-center justify-center text-[10px] font-bold shrink-0">
                                        {{ substr($course['instructor'], 0, 1) }}
                                    </div>
                                    <span>{{ $course['instructor'] }}</span>
                                </div>
                            </td>

                            {{-- Status Badge --}}
                            <td class="px-5 py-4">
                                @if($course['status'] === 'published')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 text-[10px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Published
                                    </span>
                                @elseif($course['status'] === 'pending')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-amber-100 text-amber-700 dark:bg-amber-950 dark:text-amber-400 text-[10px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-400 text-[10px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Draft
                                    </span>
                                @endif
                            </td>

                            {{-- Peserta --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    {{ $course['students'] }} Siswa
                                </div>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($course['status'] === 'pending')
                                        {{-- Tombol Approve/Reject jika Pending --}}
                                        <button class="p-1.5 text-emerald-600 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg transition" title="Setujui (Publish)">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        </button>
                                        <button class="p-1.5 text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/30 rounded-lg transition" title="Tolak">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        </button>
                                    @endif
                                    
                                    {{-- Tombol Lihat Detail / Edit --}}
                                    <a href="{{ route('admin.course.show', ['id' => 1]) }}" class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950/30 rounded-lg transition" title="Lihat Detail">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    
                                    {{-- Tombol Hapus --}}
                                    <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/30 rounded-lg transition" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination (Dummy) --}}
        <div class="p-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between text-sm text-slate-500">
            <span>Menampilkan 1-5 dari 24 kelas</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition disabled:opacity-50" disabled>Prev</button>
                <button class="px-3 py-1 rounded bg-blue-600 text-white font-medium">1</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">2</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">Next</button>
            </div>
        </div>

    </div>

</div>

@endsection