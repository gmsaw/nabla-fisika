@extends('layouts.student')

@section('title', 'Buat Diskusi Baru — Nabla Fisika')

@section('content')

<div class="max-w-3xl mx-auto -mt-6 sm:-mt-10 pb-16">

    {{-- Tombol Kembali --}}
    <a href="{{ route('student.discussion.index', ['slug' => 'mekanika-klasik']) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-blue-600 transition mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Forum Diskusi
    </a>

    {{-- Header Halaman --}}
    <div class="mb-8">
        <div class="flex items-center gap-2 mb-2">
            <span class="px-2.5 py-1 rounded-md bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase tracking-wider">Forum Kelas</span>
            <span class="text-slate-400 dark:text-slate-600">•</span>
            <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Mekanika Klasik</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-white">Buat Diskusi Baru</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Punya pertanyaan? Tanyakan di sini agar dibantu oleh dosen atau teman sekelas.</p>
    </div>

    {{-- Form Buat Diskusi --}}
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
        <form action="#" method="POST">
            @csrf
            
            {{-- Input Judul --}}
            <div class="mb-6">
                <label for="title" class="block text-sm font-bold text-slate-800 dark:text-slate-200 mb-2">
                    Judul Pertanyaan <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="title" name="title" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                       placeholder="Contoh: Bingung perbedaan Torsi dan Momen Inersia?">
                <p class="text-xs text-slate-500 mt-2">Gunakan judul yang jelas dan spesifik agar mudah dipahami orang lain.</p>
            </div>

            {{-- Textarea Detail --}}
            <div class="mb-6">
                <label for="body" class="block text-sm font-bold text-slate-800 dark:text-slate-200 mb-2">
                    Detail Pertanyaan <span class="text-rose-500">*</span>
                </label>
                <textarea id="body" name="body" rows="6" required
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-y"
                          placeholder="Jelaskan secara detail apa yang ingin Anda tanyakan. Sertakan bagian mana dari materi yang membuat Anda bingung..."></textarea>
                <p class="text-xs text-slate-500 mt-2">Gunakan bahasa yang sopan dan jelas. Anda dapat menggunakan format teks sederhana.</p>
            </div>

            {{-- Form Actions --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('student.discussion.index', ['slug' => 'mekanika-klasik']) }}" class="px-5 py-2.5 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800 transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-lg shadow-blue-600/25 active:scale-95">
                    Kirim Pertanyaan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                </button>
            </div>
        </form>
    </div>

</div>

@endsection