@extends('layouts.admin')

@section('title', 'Data Pengguna — Admin Nabla Fisika')
@section('header_title', 'Manajemen Pengguna')

@section('content')

<div class="space-y-6">

    {{-- ============ HEADER ============ --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Pengguna</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola akun mahasiswa, dosen, dan administrator platform.</p>
        </div>
        
        {{-- Tombol Tambah User (Opsional) --}}
        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            Ekspor CSV
        </button>
    </div>

    {{-- Card Container Tabel --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        
        {{-- Toolbar (Search & Filter Role) --}}
        <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" class="w-full pl-10 pr-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Cari nama atau email pengguna...">
            </div>
            <select class="px-4 py-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300 focus:ring-2 focus:ring-blue-500">
                <option>Semua Role</option>
                <option>Student (Mahasiswa)</option>
                <option>Lecturer (Dosen)</option>
                <option>Admin</option>
            </select>
        </div>

        {{-- Tabel Data User --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="px-5 py-4">Nama Pengguna</th>
                        <th class="px-5 py-4">Role</th>
                        <th class="px-5 py-4">Status Email</th>
                        <th class="px-5 py-4">Tgl Daftar</th>
                        <th class="px-5 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    
                    @php
                        // Data Dummy Pengguna
                        $users = [
                            [
                                'name' => 'Putu Mahasiswa',
                                'email' => 'putu@student.unud.ac.id',
                                'role' => 'student',
                                'is_verified' => true,
                                'joined' => '12 Okt 2026',
                            ],
                            [
                                'name' => 'Dr. Wayan Sudira',
                                'email' => 'wayan.sudira@unud.ac.id',
                                'role' => 'lecturer',
                                'is_verified' => true,
                                'joined' => '01 Sep 2026',
                            ],
                            [
                                'name' => 'Angga Pratama',
                                'email' => 'angga@gmail.com',
                                'role' => 'student',
                                'is_verified' => false,
                                'joined' => '15 Okt 2026',
                            ],
                            [
                                'name' => 'Super Admin',
                                'email' => 'admin@himafiunud.com',
                                'role' => 'admin',
                                'is_verified' => true,
                                'joined' => '01 Jan 2026',
                            ],
                        ];
                    @endphp

                    @foreach($users as $user)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition">
                            {{-- Info User --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($user['name'], 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 dark:text-white">{{ $user['name'] }}</div>
                                        <div class="text-xs text-slate-500 mt-0.5">{{ $user['email'] }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            {{-- Role Badge --}}
                            <td class="px-5 py-4">
                                @if($user['role'] === 'admin')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-purple-100 text-purple-700 dark:bg-purple-950 dark:text-purple-400 text-[10px] font-bold uppercase tracking-wider">
                                        Admin
                                    </span>
                                @elseif($user['role'] === 'lecturer')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-blue-100 text-blue-700 dark:bg-blue-950 dark:text-blue-400 text-[10px] font-bold uppercase tracking-wider">
                                        Dosen
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300 text-[10px] font-bold uppercase tracking-wider">
                                        Mahasiswa
                                    </span>
                                @endif
                            </td>

                            {{-- Status Verifikasi --}}
                            <td class="px-5 py-4">
                                @if($user['is_verified'])
                                    <span class="flex items-center gap-1 text-emerald-600 dark:text-emerald-400 text-xs font-semibold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Terverifikasi
                                    </span>
                                @else
                                    <span class="flex items-center gap-1 text-amber-600 dark:text-amber-400 text-xs font-semibold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Pending
                                    </span>
                                @endif
                            </td>

                            {{-- Tanggal Daftar --}}
                            <td class="px-5 py-4 text-xs">
                                {{ $user['joined'] }}
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Tombol Ubah Role --}}
                                    <button class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-950/30 rounded-lg transition" title="Ubah Role">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                    </button>
                                    
                                    {{-- Tombol Reset Password --}}
                                    <button class="p-1.5 text-slate-500 hover:text-slate-800 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition" title="Kirim Reset Password">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
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
            <span>Menampilkan 1-4 dari 1,248 pengguna</span>
            <div class="flex gap-1">
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition disabled:opacity-50" disabled>Prev</button>
                <button class="px-3 py-1 rounded bg-blue-600 text-white font-medium">1</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">2</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">3</button>
                <button class="px-3 py-1 rounded bg-slate-100 dark:bg-slate-800 font-medium hover:bg-slate-200 transition">Next</button>
            </div>
        </div>

    </div>

</div>

@endsection