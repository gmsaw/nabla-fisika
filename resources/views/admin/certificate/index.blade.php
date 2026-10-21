@extends('layouts.admin')

@section('title', 'Manajemen Sertifikat — Admin Nabla Fisika')
@section('header_title', 'Sertifikat Platform')

@section('content')

<div class="space-y-6">

    {{-- ============ HEADER ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Sertifikat Terbit</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Pantau sertifikat yang telah diterbitkan dan cabut jika ada pelanggaran.</p>
        </div>
        
        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            Ekspor Data
        </button>
    </div>

    {{-- Card Container Tabel --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        
        {{-- Toolbar --}}
        <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Cari ID sertifikat atau nama siswa...">
            </div>
            <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-blue-500">
                <option>Semua Status</option>
                <option>Aktif (Valid)</option>
                <option>Dicabut (Revoked)</option>
            </select>
        </div>

        {{-- Tabel Sertifikat --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="px-5 py-4">ID Sertifikat</th>
                        <th class="px-5 py-4">Nama Siswa</th>
                        <th class="px-5 py-4">Kelas</th>
                        <th class="px-5 py-4">Tgl Terbit</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    
                    @php
                        // Data Dummy Sertifikat
                        $certificates = [
                            [
                                'id' => 'NBL-A7K2M',
                                'student' => 'Putu Mahasiswa',
                                'course' => 'Mekanika Klasik',
                                'date' => '12 Okt 2026',
                                'status' => 'valid',
                            ],
                            [
                                'id' => 'NBL-B9X4Q',
                                'student' => 'Angga Pratama',
                                'course' => 'Fisika Komputasi',
                                'date' => '10 Okt 2026',
                                'status' => 'valid',
                            ],
                            [
                                'id' => 'NBL-C3Y8Z',
                                'student' => 'Made Wirawan',
                                'course' => 'Elektromagnetisme',
                                'date' => '05 Okt 2026',
                                'status' => 'revoked',
                            ],
                        ];
                    @endphp

                    @foreach($certificates as $cert)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            {{-- ID Sertifikat --}}
                            <td class="px-5 py-4">
                                <span class="font-mono text-xs font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">
                                    {{ $cert['id'] }}
                                </span>
                            </td>
                            
                            {{-- Nama Siswa --}}
                            <td class="px-5 py-4 font-bold text-slate-800 dark:text-white">
                                {{ $cert['student'] }}
                            </td>

                            {{-- Kelas --}}
                            <td class="px-5 py-4">
                                {{ $cert['course'] }}
                            </td>

                            {{-- Tanggal --}}
                            <td class="px-5 py-4 text-xs">
                                {{ $cert['date'] }}
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-4">
                                @if($cert['status'] === 'valid')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700 dark:bg-emerald-950 dark:text-emerald-400 text-[10px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Valid
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-rose-100 text-rose-700 dark:bg-rose-950 dark:text-rose-400 text-[10px] font-bold uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Dicabut
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Tombol Lihat (Buka PDF/Verifikasi) --}}
                                    <a href="#" target="_blank" class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950/30 rounded-lg transition" title="Lihat Sertifikat">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>

                                    {{-- Tombol Revoke (Hanya muncul jika status valid) --}}
                                    @if($cert['status'] === 'valid')
                                        <button class="p-1.5 text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/30 rounded-lg transition" title="Cabut Sertifikat" onclick="return confirm('Apakah Anda yakin ingin mencabut sertifikat ini? Tindakan ini tidak dapat dibatalkan.')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between text-sm text-slate-500">
            <span>Menampilkan 1-3 dari 452 sertifikat</span>
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