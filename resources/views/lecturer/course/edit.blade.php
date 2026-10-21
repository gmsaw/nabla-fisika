@extends('layouts.lecturer')

@section('title', 'Edit Kelas — Dosen Nabla Fisika')
@section('header_title', 'Edit Kelas')

@push('styles')
<style>
    .drop-zone { transition: all 0.2s ease; }
    .drop-zone.dragover { border-color: #10b981; background-color: rgba(16, 185, 129, 0.05); }
</style>
@endpush

@section('content')

<div class="max-w-4xl mx-auto space-y-6 pb-20">

    {{-- Tombol Kembali --}}
    <a href="{{ route('lecturer.course.show', ['course' => 1]) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-emerald-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Detail Kelas
    </a>

    @php
        // Data Dummy Kelas yang akan diedit
        $course = [
            'title' => 'Mekanika Klasik',
            'category' => 'Fisika Inti',
            'level' => 'Dasar',
            'description' => 'Mata kuliah ini membahas fondasi utama fisika: hukum gerak Newton, kinematika, dinamika partikel, kerja dan energi, momentum, serta dinamika rotasi.',
            'modules' => [
                ['title' => 'Pengantar Mekanika & Besaran', 'type' => 'materi', 'xp' => 20],
                ['title' => 'Kinematika Partikel', 'type' => 'materi', 'xp' => 20],
                ['title' => 'Kuis: Kinematika', 'type' => 'kuis', 'xp' => 120],
            ]
        ];
    @endphp

    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6" id="courseForm">
        @csrf
        @method('PUT') {{-- Method untuk Update --}}

        {{-- ============ INFORMASI DASAR KELAS ============ --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
            <div class="flex items-center gap-3 mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-950 text-emerald-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">Informasi Kelas</h2>
            </div>

            <div class="space-y-5">
                {{-- UPLOAD BANNER --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Banner Kelas</label>
                    <div class="flex flex-col sm:flex-row gap-5">
                        <div class="w-full sm:w-64 h-36 rounded-xl bg-slate-100 dark:bg-slate-800 border-2 border-dashed border-slate-300 dark:border-slate-600 flex items-center justify-center overflow-hidden shrink-0 relative group">
                            {{-- Tampilkan gambar lama jika ada --}}
                            <img id="bannerPreview" src="https://placehold.co/600x400/2563eb/ffffff?text=Banner+Lama" alt="Preview Banner" class="w-full h-full object-cover">
                            <div id="bannerPlaceholder" class="hidden text-center text-slate-400 dark:text-slate-500">
                                <svg class="w-8 h-8 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-xs font-medium">Preview Banner</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div id="dropZone" class="drop-zone h-36 rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 flex flex-col items-center justify-center cursor-pointer hover:bg-slate-100 dark:hover:bg-slate-800 transition p-4 text-center">
                                <svg class="w-8 h-8 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">Ganti Banner (Opsional)</p>
                                <input type="file" id="bannerInput" name="banner" accept="image/png, image/jpeg, image/webp" class="hidden">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Judul Kelas --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Judul Kelas <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" value="{{ $course['title'] }}" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 focus:bg-white dark:focus:bg-slate-900 text-sm focus:ring-2 focus:ring-emerald-500 transition">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Peminatan <span class="text-rose-500">*</span></label>
                        <select name="category" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-emerald-500">
                            <option value="Fisika Inti" {{ $course['category'] === 'Fisika Inti' ? 'selected' : '' }}>Fisika Inti</option>
                            <option value="Fisika Komputasi" {{ $course['category'] === 'Fisika Komputasi' ? 'selected' : '' }}>Fisika Komputasi</option>
                            <option value="Fisika Medis" {{ $course['category'] === 'Fisika Medis' ? 'selected' : '' }}>Fisika Medis</option>
                        </select>
                    </div>
                    {{-- Tingkat --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tingkat Kesulitan <span class="text-rose-500">*</span></label>
                        <select name="level" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-emerald-500">
                            <option value="Dasar" {{ $course['level'] === 'Dasar' ? 'selected' : '' }}>Dasar</option>
                            <option value="Menengah" {{ $course['level'] === 'Menengah' ? 'selected' : '' }}>Menengah</option>
                            <option value="Lanjut" {{ $course['level'] === 'Lanjut' ? 'selected' : '' }}>Lanjut</option>
                        </select>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi Kelas <span class="text-rose-500">*</span></label>
                    <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 text-sm focus:ring-2 focus:ring-emerald-500 transition resize-y">{{ $course['description'] }}</textarea>
                </div>
            </div>
        </div>

        {{-- ============ DYNAMIC SYLLABUS BUILDER (PRE-FILLED) ============ --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 sm:p-8 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-950 text-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white">Silabus & Modul</h2>
                </div>
            </div>

            {{-- Kontainer Modul --}}
            <div id="modulesContainer" class="space-y-3">
                @foreach($course['modules'] as $index => $modul)
                    <div class="module-item flex flex-col xl:flex-row items-stretch xl:items-center gap-3 p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
                        <div class="flex items-center gap-3 w-full xl:flex-1">
                            <div class="w-8 h-8 rounded-lg bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 flex items-center justify-center font-bold text-xs text-slate-500 shrink-0">
                                {{ $index + 1 }}
                            </div>
                            <input type="text" name="modules[{{ $index }}][title]" value="{{ $modul['title'] }}" required class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="flex flex-col sm:flex-row items-center gap-2 w-full xl:w-auto shrink-0">
                            {{-- Dropdown Tipe (Terpilih otomatis) --}}
                            <select class="module-type-select px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-semibold focus:ring-2 focus:ring-blue-500 text-slate-700 dark:text-slate-300 w-full sm:w-auto">
                                <option value="materi" {{ $modul['type'] === 'materi' ? 'selected' : '' }}>Materi Teks</option>
                                <option value="kuis" {{ $modul['type'] === 'kuis' ? 'selected' : '' }}>Kuis Evaluasi</option>
                                <option value="ujian" {{ $modul['type'] === 'ujian' ? 'selected' : '' }}>Ujian Akhir</option>
                            </select>

                            {{-- Input XP --}}
                            <div class="flex items-center gap-1.5 w-full sm:w-auto">
                                <span class="text-[10px] font-bold text-amber-500 uppercase tracking-wider hidden sm:block">XP</span>
                                <input type="number" name="modules[{{ $index }}][xp]" value="{{ $modul['xp'] }}" class="module-xp-input w-full sm:w-20 px-2 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-bold text-center text-amber-600 focus:ring-2 focus:ring-amber-500">
                            </div>

                            {{-- Tombol Aksi Dinamis (Logika warna & link akan diatur JS) --}}
                            <a href="#" class="module-action-btn shrink-0 px-4 py-2 rounded-lg bg-blue-100 text-blue-700 text-xs font-bold hover:bg-blue-200 transition flex items-center gap-1.5 w-full sm:w-auto justify-center">
                                <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                <span class="btn-text">Isi Materi</span>
                            </a>
                            
                            <button type="button" class="remove-module-btn p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition shrink-0" title="Hapus Modul">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tombol Tambah Modul --}}
            <button type="button" id="addModuleBtn" class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-400 text-sm font-bold hover:border-blue-500 hover:text-blue-600 hover:bg-blue-50 transition w-full justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Baris Modul
            </button>
        </div>

        {{-- ============ TOMBOL AKSI ============ --}}
        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-4">
            <a href="{{ route('lecturer.course.show', ['course' => 1]) }}" class="px-6 py-3 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-100 dark:text-slate-300 transition text-center">
                Batal
            </a>
            <button type="submit" name="action" value="update" class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold transition shadow-lg shadow-emerald-600/25 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- 1. LOGIKA UPLOAD BANNER ---
        const dropZone = document.getElementById('dropZone');
        const bannerInput = document.getElementById('bannerInput');
        const bannerPreview = document.getElementById('bannerPreview');

        dropZone.addEventListener('click', () => bannerInput.click());

        bannerInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (ev) => {
                    bannerPreview.src = ev.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // --- 2. LOGIKA DYNAMIC SYLLABUS & JENIS MODUL (SAMA SEPERTI CREATE) ---
        const container = document.getElementById('modulesContainer');
        const addBtn = document.getElementById('addModuleBtn');
        
        // Hitung jumlah modul yang sudah ada untuk index array berikutnya
        let moduleCount = container.querySelectorAll('.module-item').length;

        function updateModuleAction(selectElement) {
            const item = selectElement.closest('.module-item');
            const actionBtn = item.querySelector('.module-action-btn');
            const btnText = item.querySelector('.btn-text');
            const btnIcon = item.querySelector('.btn-icon');
            const xpInput = item.querySelector('.module-xp-input');
            const type = selectElement.value;
            
            const baseUrl = "{{ url('/lecturer/kelas/1/modul') }}"; 
            const moduleId = Math.floor(Math.random() * 100); 

            if (type === 'kuis') {
                actionBtn.className = 'module-action-btn shrink-0 px-4 py-2 rounded-lg bg-purple-100 text-purple-700 text-xs font-bold hover:bg-purple-200 transition flex items-center gap-1.5 w-full sm:w-auto justify-center';
                btnText.textContent = 'Buat Kuis';
                btnIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>';
                actionBtn.href = `${baseUrl}/${moduleId}/kuis`; 
                if(xpInput.value == 20 || xpInput.value == 500) xpInput.value = 120; // Auto-fill XP
            } else if (type === 'ujian') {
                actionBtn.className = 'module-action-btn shrink-0 px-4 py-2 rounded-lg bg-rose-100 text-rose-700 text-xs font-bold hover:bg-rose-200 transition flex items-center gap-1.5 w-full sm:w-auto justify-center';
                btnText.textContent = 'Buat Ujian';
                btnIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>';
                actionBtn.href = `${baseUrl}/${moduleId}/ujian`; 
                if(xpInput.value == 20 || xpInput.value == 120) xpInput.value = 500; // Auto-fill XP
            } else {
                actionBtn.className = 'module-action-btn shrink-0 px-4 py-2 rounded-lg bg-blue-100 text-blue-700 text-xs font-bold hover:bg-blue-200 transition flex items-center gap-1.5 w-full sm:w-auto justify-center';
                btnText.textContent = 'Isi Materi';
                btnIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>';
                actionBtn.href = `${baseUrl}/${moduleId}/create`;
                if(xpInput.value == 120 || xpInput.value == 500) xpInput.value = 20; // Auto-fill XP
            }
        }

        // Inisialisasi state tombol untuk modul yang sudah ada saat halaman dimuat
        container.querySelectorAll('.module-type-select').forEach(select => {
            updateModuleAction(select);
        });

        container.addEventListener('change', (e) => {
            if (e.target.classList.contains('module-type-select')) {
                updateModuleAction(e.target);
            }
        });

        addBtn.addEventListener('click', () => {
            const newModule = document.createElement('div');
            newModule.className = 'module-item flex flex-col xl:flex-row items-stretch xl:items-center gap-3 p-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50 animate-fade-in';
            
            newModule.innerHTML = `
                <div class="flex items-center gap-3 w-full xl:flex-1">
                    <div class="w-8 h-8 rounded-lg bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 flex items-center justify-center font-bold text-xs text-slate-500 shrink-0">
                        ${moduleCount + 1}
                    </div>
                    <input type="text" name="modules[${moduleCount}][title]" required class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm focus:ring-2 focus:ring-blue-500" placeholder="Judul Modul ${moduleCount + 1}">
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-2 w-full xl:w-auto shrink-0">
                    <select class="module-type-select px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-semibold focus:ring-2 focus:ring-blue-500 text-slate-700 dark:text-slate-300 w-full sm:w-auto">
                        <option value="materi">Materi Teks</option>
                        <option value="kuis">Kuis Evaluasi</option>
                        <option value="ujian">Ujian Akhir</option>
                    </select>

                    <div class="flex items-center gap-1.5 w-full sm:w-auto">
                        <span class="text-[10px] font-bold text-amber-500 uppercase tracking-wider hidden sm:block">XP</span>
                        <input type="number" name="modules[${moduleCount}][xp]" value="20" class="module-xp-input w-full sm:w-20 px-2 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-xs font-bold text-center text-amber-600 focus:ring-2 focus:ring-amber-500">
                    </div>

                    <a href="#" class="module-action-btn shrink-0 px-4 py-2 rounded-lg bg-blue-100 text-blue-700 text-xs font-bold hover:bg-blue-200 transition flex items-center gap-1.5 w-full sm:w-auto justify-center">
                        <svg class="w-4 h-4 btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        <span class="btn-text">Isi Materi</span>
                    </a>
                    
                    <button type="button" class="remove-module-btn p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            `;

            updateModuleAction(newModule.querySelector('.module-type-select'));
            
            container.appendChild(newModule);
            moduleCount++;
        });

        container.addEventListener('click', (e) => {
            const removeBtn = e.target.closest('.remove-module-btn');
            if (removeBtn) {
                const moduleItem = removeBtn.closest('.module-item');
                if (container.querySelectorAll('.module-item').length > 1) {
                    moduleItem.remove();
                    // Update nomor urut visual
                    container.querySelectorAll('.module-item').forEach((item, idx) => {
                        item.querySelector('div > div:first-child').textContent = idx + 1;
                    });
                } else {
                    alert('Kelas harus memiliki minimal 1 modul.');
                }
            }
        });
    });
</script>
@endpush