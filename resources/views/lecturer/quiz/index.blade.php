@extends('layouts.lecturer')

@section('title', 'Pengaturan Kuis — Dosen Nabla Fisika')
@section('header_title', 'Pengaturan Kuis')

@section('content')

<div class="max-w-4xl mx-auto space-y-6 pb-20">

    {{-- Tombol Kembali & Navigasi --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <a href="{{ route('lecturer.course.create') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-emerald-600 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Silabus
        </a>
        <div class="flex items-center gap-3">
            <button type="button" class="px-5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                Simpan Draf
            </button>
            
            {{-- Perbaikan Route: Mengirim parameter course & module dari URL --}}
            <a href="{{ route('lecturer.quiz.builder', ['course' => request()->route('course'), 'module' => request()->route('module')]) }}" 
               class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white text-sm font-bold shadow-lg shadow-purple-600/20 transition active:scale-95">
                Lanjut ke Soal Kuis
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf
        
        {{-- ============ INFORMASI DASAR KUIS ============ --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
            <div class="flex items-center gap-3 mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
                <div class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-950 text-purple-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">Informasi Kuis</h2>
            </div>

            <div class="space-y-5">
                {{-- Judul Kuis --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Judul Kuis <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-purple-500 transition" placeholder="Contoh: Kuis Modul 6 — Dinamika Rotasi">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    {{-- Durasi --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Durasi (Menit) <span class="text-rose-500">*</span></label>
                        <input type="number" name="duration" min="1" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-purple-500" placeholder="15">
                    </div>
                    {{-- Passing Grade --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nilai Lulus (KKM) <span class="text-rose-500">*</span></label>
                        <input type="number" name="passing_grade" min="1" max="100" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-purple-500" placeholder="75">
                    </div>
                    {{-- XP Reward --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Bonus XP</label>
                        <input type="number" name="xp_reward" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-purple-500" placeholder="120">
                    </div>
                </div>

                {{-- Deskripsi Singkat --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Kuis (Tampil di halaman siswa)</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-purple-500 transition resize-y" placeholder="Jelaskan secara singkat tujuan kuis ini (opsional)..."></textarea>
                </div>
            </div>
        </div>

        {{-- ============ ATURAN KUIS (TEMPLATE & CUSTOM) ============ --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-950 text-amber-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white">Aturan Pengerjaan</h2>
                </div>
            </div>

            <div class="space-y-5">
                {{-- Pilihan Template --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Gunakan Template Aturan</label>
                    <select id="templateSelector" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-purple-500 font-medium">
                        <option value="custom">-- Tulis Sendiri (Custom) --</option>
                        <option value="standar">Standar (Rekomendasi)</option>
                        <option value="ketat">Ujian Ketat (Anti-Cheat)</option>
                        <option value="santai">Kuis Santai (Latihan)</option>
                    </select>
                </div>

                {{-- Textarea Aturan --}}
                <div class="relative">
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Detail Aturan (Bisa diedit)</label>
                    <textarea id="rulesTextarea" name="rules" rows="6" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-purple-500 transition resize-y font-mono leading-relaxed"></textarea>
                    <p class="text-[11px] text-slate-500 mt-2">Aturan ini akan ditampilkan di halaman persiapan kuis sebelum siswa menekan tombol mulai.</p>
                </div>
            </div>
        </div>

        {{-- ============ PREVIEW TAMPILAN SISWA ============ --}}
        <div class="bg-slate-100 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-inner">
            <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                Pratinjau Halaman Siswa
            </h3>

            {{-- Kotak Preview --}}
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-700 p-6 shadow-sm max-w-2xl mx-auto">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-purple-100 text-purple-600 mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h4 id="previewTitle" class="text-xl font-bold text-slate-900 dark:text-white">Judul Kuis Anda</h4>
                    <p id="previewDesc" class="text-sm text-slate-500 mt-1">Deskripsi kuis akan muncul di sini.</p>
                </div>

                <div class="bg-slate-50 dark:bg-slate-800/50 rounded-lg p-4 mb-6">
                    <h5 class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Aturan & Arahan:</h5>
                    <div id="previewRules" class="text-sm text-slate-600 dark:text-slate-400 whitespace-pre-line leading-relaxed">
                        Aturan akan muncul di sini.
                    </div>
                </div>

                <button class="w-full py-3 rounded-xl bg-purple-600 text-white text-sm font-bold opacity-50 cursor-not-allowed">
                    Mulai Kerjakan Kuis
                </button>
            </div>
        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const templateSelector = document.getElementById('templateSelector');
        const rulesTextarea = document.getElementById('rulesTextarea');
        const titleInput = document.querySelector('input[name="title"]');
        const descInput = document.querySelector('textarea[name="description"]');

        const previewTitle = document.getElementById('previewTitle');
        const previewDesc = document.getElementById('previewDesc');
        const previewRules = document.getElementById('previewRules');

        // Data Template Aturan
        const templates = {
            standar: `1. Kuis terdiri dari soal pilihan ganda yang diambil secara acak.
2. Waktu pengerjaan akan terus berjalan meskipun Anda meninggalkan halaman.
3. Anda dapat mengulang kuis ini tanpa batas hingga mencapai nilai kelulusan.
4. Dilarang bekerja sama atau mencari jawaban di luar platform saat kuis berlangsung.`,
            
            ketat: `1. Kuis ini bersifat UJIAN. Dilarang membuka tab lain atau aplikasi lain.
2. Waktu pengerjaan sangat ketat. Kuis akan otomatis terkumpul jika waktu habis.
3. Anda hanya memiliki 1 kesempatan pengerjaan.
4. Jika terdeteksi kecurangan, nilai akan dianulir.`,
            
            santai: `1. Kuis ini berfungsi sebagai latihan formatif.
2. Tidak ada batasan waktu (santai).
3. Anda bisa mengulang sebanyak yang Anda mau untuk pemantapan materi.`,
            
            custom: ''
        };

        // Fungsi Update Pratinjau
        function updatePreview() {
            previewTitle.textContent = titleInput.value || 'Judul Kuis Anda';
            previewDesc.textContent = descInput.value || 'Deskripsi kuis akan muncul di sini.';
            previewRules.textContent = rulesTextarea.value || 'Aturan akan muncul di sini.';
        }

        // Event saat Template dipilih
        templateSelector.addEventListener('change', (e) => {
            const selected = e.target.value;
            if (selected !== 'custom') {
                rulesTextarea.value = templates[selected];
            }
            updatePreview();
        });

        // Event saat Dosen mengetik manual
        titleInput.addEventListener('input', updatePreview);
        descInput.addEventListener('input', updatePreview);
        rulesTextarea.addEventListener('input', updatePreview);

        // Inisialisasi awal dengan template standar
        templateSelector.value = 'standar';
        rulesTextarea.value = templates['standar'];
        updatePreview();
    });
</script>
@endpush