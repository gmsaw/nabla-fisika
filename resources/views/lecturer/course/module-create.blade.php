@extends('layouts.lecturer')

@section('title', 'Isi Materi Modul — Dosen Nabla Fisika')
@section('header_title', 'Editor Modul Pembelajaran')

@push('styles')
<!-- KaTeX CSS untuk Render Rumus Fisika/Matematika -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" crossorigin="anonymous">

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    .block-item {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endpush

@section('content')

<div class="space-y-6 pb-20 max-w-7xl mx-auto px-4 sm:px-6">

    {{-- Header Action Bar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white dark:bg-slate-900 p-4 sm:p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="flex items-center gap-3">
            <a href="{{ route('lecturer.course.create') ?? '#' }}" 
               class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <p class="text-xs font-mono text-emerald-600 dark:text-emerald-400 font-bold uppercase tracking-wider">Mekanika Klasik</p>
                <h1 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">Penyusunan Konten Modul</h1>
            </div>
        </div>

        <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
            <span class="text-xs text-slate-400 font-mono hidden md:inline-flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Draf Tersimpan Otomatis
            </span>
            <button type="button" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white text-xs sm:text-sm font-bold shadow-lg shadow-emerald-600/20 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Simpan Modul</span>
            </button>
        </div>
    </div>

    {{-- Grid 2 Kolom: Kiri Editor, Kanan Live Preview --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        {{-- ============ KOLOM KIRI: BUILDER BLOK MODUL (7 Kolom) ============ --}}
        <div class="lg:col-span-7 space-y-5">
            
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 shadow-sm">
                
                {{-- Detail Modul --}}
                <div class="mb-5 pb-5 border-b border-slate-100 dark:border-slate-800 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">Judul Modul</label>
                        <input type="text" id="moduleTitleInput" value="Dinamika Rotasi & Momen Gaya" 
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60 text-sm font-bold text-slate-800 dark:text-white focus:ring-2 focus:ring-emerald-500 transition">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">Estimasi Waktu</label>
                            <input type="text" id="moduleDurationInput" value="45 Menit" 
                                   class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/60 text-xs font-semibold text-slate-700 dark:text-slate-300">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wider">Nomor Urut</label>
                            <input type="text" value="Modul 6" disabled 
                                   class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-800/30 text-xs font-mono text-slate-500">
                        </div>
                    </div>
                </div>

                {{-- Toolbar Tambah Sisipan/Blok --}}
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Susunan Blok Materi</label>
                        <span class="text-[11px] text-slate-400 font-mono">Bebas Atur Urutan</span>
                    </div>

                    <div class="grid grid-cols-3 gap-2 p-1.5 bg-slate-100 dark:bg-slate-800/60 rounded-xl border border-slate-200/80 dark:border-slate-700/80">
                        <button type="button" id="addParagraphBtn" 
                                class="flex items-center justify-center gap-1.5 py-2 px-2 rounded-lg bg-white dark:bg-slate-800 hover:bg-blue-50 dark:hover:bg-blue-950/40 text-blue-600 dark:text-blue-400 text-xs font-bold shadow-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                            <span>+ Paragraf</span>
                        </button>

                        <button type="button" id="addYoutubeBtn" 
                                class="flex items-center justify-center gap-1.5 py-2 px-2 rounded-lg bg-white dark:bg-slate-800 hover:bg-rose-50 dark:hover:bg-rose-950/40 text-rose-600 dark:text-rose-400 text-xs font-bold shadow-sm transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            <span>+ YouTube</span>
                        </button>

                        <button type="button" id="addPdfBtn" 
                                class="flex items-center justify-center gap-1.5 py-2 px-2 rounded-lg bg-white dark:bg-slate-800 hover:bg-amber-50 dark:hover:bg-amber-950/40 text-amber-600 dark:text-amber-400 text-xs font-bold shadow-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            <span>+ PDF Drive</span>
                        </button>
                    </div>
                </div>

                {{-- Kontainer Utama Tempat Blok Ditambahkan --}}
                <div id="blocksContainer" class="space-y-4">
                    {{-- Blok default akan di-generate via JavaScript --}}
                </div>

            </div>
        </div>

        {{-- ============ KOLOM KANAN: LIVE PREVIEW SISWA (5 Kolom) ============ --}}
        <div class="lg:col-span-5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-lg overflow-hidden flex flex-col h-[calc(100vh-8rem)] sticky top-20">
            
            {{-- Header Preview Bar --}}
            <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/60 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-2">
                    <div class="flex gap-1.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    </div>
                    <span class="text-xs font-mono text-slate-500 dark:text-slate-400 ml-1">Tampilan Siswa</span>
                </div>
                <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-700 dark:bg-emerald-950/80 dark:text-emerald-400 text-[10px] font-bold uppercase font-mono">Live Preview</span>
            </div>

            {{-- Area Scrollable Content Preview --}}
            <div class="flex-1 overflow-y-auto p-5 sm:p-6 space-y-6">
                
                {{-- Header Materi Preview --}}
                <div class="border-b border-slate-100 dark:border-slate-800 pb-4">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="px-2 py-0.5 rounded bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase">Modul 6</span>
                        <span class="text-slate-400 dark:text-slate-600">•</span>
                        <span id="previewDuration" class="text-xs font-medium text-slate-500 dark:text-slate-400">45 Menit</span>
                    </div>
                    <h1 id="previewTitle" class="text-xl font-bold text-slate-900 dark:text-white leading-snug">
                        Dinamika Rotasi & Momen Gaya
                    </h1>
                </div>

                {{-- Konten Hasil Susunan Blok --}}
                <div id="previewContent" class="space-y-5 text-sm">
                    {{-- Di-render secara dinamis oleh JS --}}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const blocksContainer = document.getElementById('blocksContainer');
        const addParagraphBtn = document.getElementById('addParagraphBtn');
        const addYoutubeBtn = document.getElementById('addYoutubeBtn');
        const addPdfBtn = document.getElementById('addPdfBtn');

        const moduleTitleInput = document.getElementById('moduleTitleInput');
        const moduleDurationInput = document.getElementById('moduleDurationInput');
        
        const previewTitle = document.getElementById('previewTitle');
        const previewDuration = document.getElementById('previewDuration');
        const previewContent = document.getElementById('previewContent');

        let blockIdCounter = 0;

        // --- 1. TEMPLATE GENERATOR UNTUK MAPING BLOK ---

        // Controls Bar (Up, Down, Delete)
        const getControlsHtml = () => `
            <div class="flex items-center gap-1 bg-white dark:bg-slate-800 rounded-lg p-1 border border-slate-200 dark:border-slate-700 shadow-sm">
                <button type="button" class="move-up p-1 text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 rounded transition" title="Geser ke Atas">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                </button>
                <button type="button" class="move-down p-1 text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 rounded transition" title="Geser ke Bawah">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <button type="button" class="remove-block p-1 text-slate-400 hover:text-rose-500 rounded transition" title="Hapus Blok">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        `;

        // Template Blok 1: Paragraf Teks
        function createParagraphBlock(defaultText = '') {
            blockIdCounter++;
            return `
                <div class="block-item group relative bg-slate-50 dark:bg-slate-800/40 rounded-xl border border-slate-200 dark:border-slate-700 p-3.5" data-block-type="text" data-block-id="${blockIdCounter}">
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-blue-600 dark:text-blue-400 font-mono">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                            Paragraf Teks / Markdown
                        </span>
                        ${getControlsHtml()}
                    </div>
                    <textarea name="blocks[text][]" rows="3" 
                              class="block-input w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg p-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-blue-500 resize-none font-mono"
                              placeholder="Tulis materi di sini... Gunakan # untuk Heading, **Bold**, atau LaTeX $$ \\tau = r \\times F $$">${defaultText}</textarea>
                </div>
            `;
        }

        // Template Blok 2: Sisipan YouTube
        function createYoutubeBlock(defaultUrl = '') {
            blockIdCounter++;
            return `
                <div class="block-item group relative bg-rose-50/40 dark:bg-rose-950/20 rounded-xl border border-rose-200/80 dark:border-rose-900/50 p-3.5" data-block-type="youtube" data-block-id="${blockIdCounter}">
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-rose-600 dark:text-rose-400 font-mono">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            Sisipan Video YouTube
                        </span>
                        ${getControlsHtml()}
                    </div>
                    <input type="url" name="blocks[youtube][]" value="${defaultUrl}"
                           class="block-input w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs sm:text-sm text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-rose-500" 
                           placeholder="https://www.youtube.com/watch?v=...">
                </div>
            `;
        }

        // Template Blok 3: Lampiran PDF Drive
        function createPdfBlock(defaultUrl = '', defaultTitle = 'Slide Materi Fisika.pdf') {
            blockIdCounter++;
            return `
                <div class="block-item group relative bg-amber-50/40 dark:bg-amber-950/20 rounded-xl border border-amber-200/80 dark:border-amber-900/50 p-3.5" data-block-type="pdf" data-block-id="${blockIdCounter}">
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-amber-600 dark:text-amber-400 font-mono">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            Lampiran Dokumen PDF (Google Drive)
                        </span>
                        ${getControlsHtml()}
                    </div>
                    <div class="space-y-2">
                        <input type="text" class="pdf-title-input w-full px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-bold text-slate-800 dark:text-slate-200"
                               placeholder="Nama Dokumen (Contoh: Modul 6 - Dinamika Rotasi.pdf)" value="${defaultTitle}">
                        <input type="url" name="blocks[pdf][]" value="${defaultUrl}"
                               class="block-input w-full px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-amber-500" 
                               placeholder="Tautan Google Drive (https://drive.google.com/file/d/.../view)">
                    </div>
                </div>
            `;
        }

        // --- 2. INISIALISASI DRAF AWAL ---
        function initDefaultBlocks() {
            blocksContainer.innerHTML = '';
            
            // Contoh Blok 1: Paragraf pembuka
            const p1 = "Selamat datang di Modul 6. Pada modul ini, kita akan mempelajari tentang **Dinamika Rotasi**.\n\n# Momen Gaya (Torsi)\nTorsi didefinisikan sebagai hasil kali silang antara vektor posisi $r$ dan vektor gaya $F$:\n\n$$\\tau = r \\times F \\sin\\theta$$";
            blocksContainer.insertAdjacentHTML('beforeend', createParagraphBlock(p1));

            // Contoh Blok 2: Video YouTube
            blocksContainer.insertAdjacentHTML('beforeend', createYoutubeBlock('https://www.youtube.com/watch?v=dQw4w9WgXcQ'));

            // Contoh Blok 3: Paragraf lanjutan
            const p2 = "Silakan simak slide rangkuman di bawah ini untuk pendalaman rumus keseimbangan benda tegar.";
            blocksContainer.insertAdjacentHTML('beforeend', createParagraphBlock(p2));

            // Contoh Blok 4: Lampiran PDF
            blocksContainer.insertAdjacentHTML('beforeend', createPdfBlock('https://drive.google.com/file/d/12345/view', 'Slide_Materi_Dinamika_Rotasi.pdf'));

            updatePreview();
        }

        // --- 3. LOGIKA AKSI BLOK (TAMBAH, HAPUS, GESER) ---

        addParagraphBtn.addEventListener('click', () => {
            blocksContainer.insertAdjacentHTML('beforeend', createParagraphBlock());
            updatePreview();
        });

        addYoutubeBtn.addEventListener('click', () => {
            blocksContainer.insertAdjacentHTML('beforeend', createYoutubeBlock());
            updatePreview();
        });

        addPdfBtn.addEventListener('click', () => {
            blocksContainer.insertAdjacentHTML('beforeend', createPdfBlock());
            updatePreview();
        });

        // Event Delegation untuk tombol geser & hapus
        blocksContainer.addEventListener('click', (e) => {
            const target = e.target;

            // Hapus Blok
            if (target.closest('.remove-block')) {
                const item = target.closest('.block-item');
                if (blocksContainer.querySelectorAll('.block-item').length > 1) {
                    item.remove();
                    updatePreview();
                } else {
                    alert('Minimal harus ada 1 blok materi.');
                }
            }

            // Geser ke Atas
            if (target.closest('.move-up')) {
                const item = target.closest('.block-item');
                const prev = item.previousElementSibling;
                if (prev) {
                    blocksContainer.insertBefore(item, prev);
                    updatePreview();
                }
            }

            // Geser ke Bawah
            if (target.closest('.move-down')) {
                const item = target.closest('.block-item');
                const next = item.nextElementSibling;
                if (next) {
                    blocksContainer.insertBefore(next, item);
                    updatePreview();
                }
            }
        });

        // --- 4. RENDER LIVE PREVIEW INTERAKTIF ---

        function parseMarkdown(text) {
            if (!text) return '';
            let html = text.trim();

            // Formatting sederhana
            html = html.replace(/\*\*(.*?)\*\*/g, '<strong>\$1</strong>');
            html = html.replace(/^# (.*\$)/gim, '<h3 class="text-base font-bold mt-4 mb-2 text-slate-900 dark:text-white">\$1</h3>');
            html = html.replace(/^- (.*\$)/gim, '<li class="ml-4 list-disc text-slate-700 dark:text-slate-300">\$1</li>');
            html = html.replace(/\n/g, '<br>');

            return `<div class="prose prose-slate dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed">${html}</div>`;
        }

        function extractYoutubeId(url) {
            if (!url) return null;
            if (url.includes('youtube.com/watch?v=')) return url.split('v=')[1]?.split('&')[0];
            if (url.includes('youtu.be/')) return url.split('youtu.be/')[1]?.split('?')[0];
            return null;
        }

        function updatePreview() {
            // Update Title & Duration
            previewTitle.textContent = moduleTitleInput.value || 'Judul Modul Baru';
            previewDuration.textContent = moduleDurationInput.value || '0 Menit';

            // Loop melalui setiap blok sesuai urutan DOM
            let previewHtml = '';
            const blocks = blocksContainer.querySelectorAll('.block-item');

            blocks.forEach((block) => {
                const type = block.getAttribute('data-block-type');

                if (type === 'text') {
                    const input = block.querySelector('.block-input');
                    if (input && input.value.trim()) {
                        previewHtml += `<div class="my-3">${parseMarkdown(input.value)}</div>`;
                    }
                } 
                else if (type === 'youtube') {
                    const input = block.querySelector('.block-input');
                    const ytId = extractYoutubeId(input ? input.value : '');
                    if (ytId) {
                        previewHtml += `
                            <div class="my-4">
                                <p class="text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-rose-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                    Video Penjelasan
                                </p>
                                <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 bg-slate-100 dark:bg-slate-800 shadow-sm">
                                    <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/${ytId}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        `;
                    }
                } 
                else if (type === 'pdf') {
                    const urlInput = block.querySelector('.block-input');
                    const titleInput = block.querySelector('.pdf-title-input');
                    const url = urlInput ? urlInput.value : '';
                    const title = (titleInput && titleInput.value) ? titleInput.value : 'Dokumen PDF Pendukung';

                    if (url) {
                        previewHtml += `
                            <div class="my-4">
                                <a href="${url}" target="_blank" class="group flex items-center justify-between p-3.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 hover:bg-blue-50/50 dark:bg-slate-800/50 transition">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-lg bg-rose-100 dark:bg-rose-950/80 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs sm:text-sm font-bold text-slate-800 dark:text-slate-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 truncate transition">${title}</p>
                                            <p class="text-[11px] text-slate-400 mt-0.5">Lampiran PDF Google Drive</p>
                                        </div>
                                    </div>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            </div>
                        `;
                    }
                }
            });

            previewContent.innerHTML = previewHtml || '<p class="text-xs text-slate-400 italic">Belum ada blok materi yang ditambahkan...</p>';

            // Render KaTeX setelah konten di-update
            if (window.renderMathInElement) {
                renderMathInElement(previewContent, {
                    delimiters: [
                        {left: '$$', right: '$$', display: true},
                        {left: '[', right: ']', display: true},
                        {left: '$', right: '$', display: false},
                        {left: '\\(', right: '\\)', display: false}
                    ],
                    throwOnError: false
                });
            }
        }

        // Listener Real-time saat Mengetik
        blocksContainer.addEventListener('input', updatePreview);
        moduleTitleInput.addEventListener('input', updatePreview);
        moduleDurationInput.addEventListener('input', updatePreview);

        // Eksekusi Inisialisasi
        initDefaultBlocks();
    });
</script>
@endpush