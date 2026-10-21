@extends('layouts.student')

@section('title', 'Profil Saya — Nabla Fisika')

@section('content')

<div class="max-w-5xl mx-auto -mt-6 sm:-mt-10 pb-16">

    {{-- ============ HEADER HALAMAN ============ --}}
    <div class="mb-8">
        <div class="flex items-center gap-2 mb-1">
            <span class="px-2.5 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">Akun</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Pengaturan Profil</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola informasi data diri dan keamanan akun Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- ============ KIRI: KARTU IDENTITAS ============ --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm text-center">
                {{-- Avatar --}}
                <div class="relative inline-block mb-4">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 text-white flex items-center justify-center text-4xl font-bold shadow-lg shadow-blue-500/30">
                        {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
                    </div>
                    <button class="absolute bottom-0 right-0 p-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-500 hover:text-blue-600 shadow-sm transition" title="Ganti Foto (Segera Hadir)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </button>
                </div>

                <h2 class="text-lg font-bold text-slate-900 dark:text-white">{{ auth()->user()->name ?? 'Mahasiswa' }}</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">{{ auth()->user()->email ?? 'student@test.local' }}</p>
                
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-xs font-semibold text-slate-600 dark:text-slate-300">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Mahasiswa Fisika UNUD
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between text-sm mb-2">
                        <span class="text-slate-500">Bergabung sejak</span>
                        <span class="font-bold text-slate-800 dark:text-slate-200">12 Okt 2026</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-500">Total XP</span>
                        <span class="font-bold text-amber-500">1,250 XP</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============ KANAN: FORM EDIT ============ --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Form Informasi Pribadi --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-1">Informasi Pribadi</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">Perbarui nama dan alamat email akun Anda.</p>

                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ auth()->user()->name ?? 'Mahasiswa' }}" required 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Alamat Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email ?? 'student@test.local' }}" required 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 transition">
                        <p class="text-[11px] text-slate-500 mt-1.5">Pastikan email aktif. Perubahan email memerlukan verifikasi ulang.</p>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- Form Ganti Password --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-1">Keamanan Akun</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">Ganti password Anda secara berkala untuk menjaga keamanan.</p>

                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Password Saat Ini --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Password Saat Ini</label>
                        <input type="password" name="current_password" required 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    {{-- Password Baru --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Password Baru</label>
                        <input type="password" name="password" required minlength="8"
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 transition">
                        <p class="text-[11px] text-slate-500 mt-1.5">Minimal 8 karakter, kombinasi huruf dan angka.</p>
                    </div>

                    {{-- Konfirmasi Password Baru --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required 
                               class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition active:scale-95">
                            Perbarui Password
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection