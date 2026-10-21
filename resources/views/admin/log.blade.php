@extends('layouts.admin')

@section('title', 'Log Aktivitas — Admin Nabla Fisika')
@section('header_title', 'Log & Audit Sistem')

@section('content')

<div class="space-y-6">

    {{-- ============ HEADER ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Log Aktivitas</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Pantau semua riwayat aksi yang dilakukan oleh pengguna dan admin di platform.</p>
        </div>
        
        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            Unduh Log (.csv)
        </button>
    </div>

    {{-- Card Container Tabel --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        
        {{-- Toolbar Filter --}}
        <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Cari nama user atau aksi...">
            </div>
            <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-blue-500">
                <option>Semua Role</option>
                <option>Admin</option>
                <option>Dosen</option>
                <option>Mahasiswa</option>
            </select>
        </div>

        {{-- Tabel Log --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="px-5 py-4">Waktu</th>
                        <th class="px-5 py-4">Pengguna</th>
                        <th class="px-5 py-4">Aksi</th>
                        <th class="px-5 py-4">Keterangan</th>
                        <th class="px-5 py-4">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    
                    @php
                        // Data Dummy Log
                        $logs = [
                            [
                                'time' => 'Hari ini, 14:32',
                                'user' => 'Super Admin',
                                'role' => 'admin',
                                'action' => 'APPROVE_COURSE',
                                'desc' => 'Menyetujui publikasi kelas "Fisika Kuantum Lanjut"',
                                'ip' => '192.168.1.10',
                                'color' => 'emerald'
                            ],
                            [
                                'time' => 'Hari ini, 13:15',
                                'user' => 'Dr. Wayan Sudira',
                                'role' => 'lecturer',
                                'action' => 'CREATE_QUIZ',
                                'desc' => 'Menambahkan kuis baru di kelas "Mekanika Klasik"',
                                'ip' => '10.0.0.45',
                                'color' => 'blue'
                            ],
                            [
                                'time' => 'Hari ini, 10:05',
                                'user' => 'Super Admin',
                                'role' => 'admin',
                                'action' => 'REVOKE_CERTIFICATE',
                                'desc' => 'Mencabut sertifikat NBL-C3Y8Z milik Made Wirawan',
                                'ip' => '192.168.1.10',
                                'color' => 'rose'
                            ],
                            [
                                'time' => 'Kemarin, 19:40',
                                'user' => 'Putu Mahasiswa',
                                'role' => 'student',
                                'action' => 'PASS_QUIZ',
                                'desc' => 'Lulus kuis Modul 6 dengan nilai 85',
                                'ip' => '114.122.33.1',
                                'color' => 'emerald'
                            ],
                            [
                                'time' => 'Kemarin, 08:20',
                                'user' => 'Angga Pratama',
                                'role' => 'student',
                                'action' => 'ENROLL_COURSE',
                                'desc' => 'Mendaftar ke kelas "Fisika Komputasi"',
                                'ip' => '114.122.33.5',
                                'color' => 'blue'
                            ],
                        ];
                    @endphp

                    @foreach($logs as $log)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            {{-- Waktu --}}
                            <td class="px-5 py-4 text-xs font-medium whitespace-nowrap">
                                {{ $log['time'] }}
                            </td>

                            {{-- Pengguna --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="font-bold text-slate-800 dark:text-white">{{ $log['user'] }}</div>
                                    @if($log['role'] === 'admin')
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-purple-100 text-purple-700 dark:bg-purple-950 dark:text-purple-400 uppercase">Admin</span>
                                    @elseif($log['role'] === 'lecturer')
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-blue-100 text-blue-700 dark:bg-blue-950 dark:text-blue-400 uppercase">Dosen</span>
                                    @endif
                                </div>
                            </td>

                            {{-- Aksi (Badge) --}}
                            <td class="px-5 py-4">
                                <span class="font-mono text-[10px] font-bold px-2 py-1 rounded bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700">
                                    {{ $log['action'] }}
                                </span>
                            </td>

                            {{-- Keterangan --}}
                            <td class="px-5 py-4 text-sm">
                                {{ $log['desc'] }}
                            </td>

                            {{-- IP Address --}}
                            <td class="px-5 py-4 text-xs font-mono text-slate-500">
                                {{ $log['ip'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="p-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between text-sm text-slate-500">
            <span>Menampilkan 1-5 dari 1,024 log</span>
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