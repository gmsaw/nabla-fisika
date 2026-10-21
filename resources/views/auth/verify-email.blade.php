@extends('layouts.auth')

@section('title', 'Verifikasi Email — Nabla Fisika')

@section('content')

<div class="text-center lg:text-left mb-8">
    {{-- Ikon Amplop --}}
    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-100 dark:bg-blue-950 text-blue-600 dark:text-blue-400 mb-6 shadow-sm">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
    </div>
    
    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white mb-2">Verifikasi Email Anda</h1>
    <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed">
        Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan ke email <strong class="text-slate-800 dark:text-slate-200">{{ auth()->user()->email ?? 'email@anda.com' }}</strong>.
    </p>
</div>

{{-- Pesan Sukses (Jika user baru saja mengirim ulang email) --}}
@if (session('status') == 'verification-link-sent')
    <div class="mb-6 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-900/50 flex items-start gap-3">
        <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <p class="text-sm text-emerald-800 dark:text-emerald-300 font-medium">
            Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat mendaftar.
        </p>
    </div>
@endif

<div class="space-y-4">
    {{-- Tombol Kirim Ulang --}}
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Kirim Ulang Email Verifikasi
        </button>
    </form>

    {{-- Tombol Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Keluar dari Akun
        </button>
    </form>
</div>

<div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-800 text-center">
    <p class="text-xs text-slate-500">
        Salah memasukkan email saat mendaftar? 
        <a href="#" class="font-bold text-blue-600 hover:underline">Hubungi Admin</a>
    </p>
</div>

@endsection