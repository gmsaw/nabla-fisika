@extends('layouts.lecturer')

@section('title', 'Buat Kuis Baru — Dosen Nabla Fisika')
@section('header_title', 'Pembuat Kuis')

@section('content')

<div class="max-w-7xl mx-auto space-y-6 pb-20">

    {{-- Tombol Kembali & Aksi Simpan --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('lecturer.course.create') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-emerald-600 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Silabus Kelas
        </a>
        <div class="flex gap-2">
            <button type="button" class="px-5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                Simpan Draf
            </button>
            <button type="button" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-lg shadow-emerald-600/20 transition active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Kuis
            </button>
        </div>
    </div>

    {{-- Grid 2 Kolom: Kiri Form, Kanan Pratinjau --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        {{-- ============ KOLOM KIRI: PENGATURAN & DAFTAR SOAL (7 Kolom) ============ --}}
        <div class="lg:col-span-7 space-y-6">
            
            {{-- Card Pengaturan Kuis --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan Kuis
                </h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Judul Kuis</label>
                        <input type="text" id="quizTitleInput" value="Kuis Modul 6: Dinamika Rotasi" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm font-semibold text-slate-800 dark:text-white focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Durasi (Menit)</label>
                            <input type="number" value="15" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm focus:ring-2 focus:ring-purple-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Passing Grade</label>
                            <input type="number" value="75" class="w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-sm focus:ring-2 focus:ring-purple-500">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Daftar Soal --}}
            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-5 sm:p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4 border-b border-slate-100 dark:border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-slate-800 dark:text-white">Daftar Soal</h2>
                    <span id="questionCountLabel" class="px-2.5 py-1 rounded-md bg-purple-100 text-purple-700 dark:bg-purple-950 dark:text-purple-400 text-xs font-bold">1 Soal</span>
                </div>

                {{-- Kontainer Soal --}}
                <div id="questionsContainer" class="space-y-6">
                    {{-- Soal Pertama (Template) --}}
                    <div class="question-item bg-slate-50 dark:bg-slate-800/40 rounded-xl border border-slate-200 dark:border-slate-700 p-5 relative group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="question-number font-mono text-sm font-bold text-purple-600">Soal #1</span>
                            <button type="button" class="remove-question-btn p-1.5 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Hapus Soal">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                        
                        {{-- Pertanyaan --}}
                        <textarea rows="2" class="question-text w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm mb-3 focus:ring-2 focus:ring-purple-500" placeholder="Tulis pertanyaan di sini..."></textarea>
                        
                        {{-- Pilihan Ganda --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            {{-- Opsi A --}}
                            <label class="relative flex items-center gap-3 p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 cursor-pointer hover:border-purple-400 transition">
                                <input type="radio" name="correct_answer_0" value="A" class="peer sr-only option-radio">
                                <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-purple-600 peer-checked:bg-purple-600 transition">
                                    <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100"></div>
                                </div>
                                <div class="flex-1 flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-400">A.</span>
                                    <input type="text" class="option-text w-full bg-transparent border-none p-0 text-sm focus:ring-0" placeholder="Teks pilihan A">
                                </div>
                            </label>
                            
                            {{-- Opsi B --}}
                            <label class="relative flex items-center gap-3 p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 cursor-pointer hover:border-purple-400 transition">
                                <input type="radio" name="correct_answer_0" value="B" class="peer sr-only option-radio">
                                <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-purple-600 peer-checked:bg-purple-600 transition">
                                    <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100"></div>
                                </div>
                                <div class="flex-1 flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-400">B.</span>
                                    <input type="text" class="option-text w-full bg-transparent border-none p-0 text-sm focus:ring-0" placeholder="Teks pilihan B">
                                </div>
                            </label>

                            {{-- Opsi C --}}
                            <label class="relative flex items-center gap-3 p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 cursor-pointer hover:border-purple-400 transition">
                                <input type="radio" name="correct_answer_0" value="C" class="peer sr-only option-radio">
                                <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-purple-600 peer-checked:bg-purple-600 transition">
                                    <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100"></div>
                                </div>
                                <div class="flex-1 flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-400">C.</span>
                                    <input type="text" class="option-text w-full bg-transparent border-none p-0 text-sm focus:ring-0" placeholder="Teks pilihan C">
                                </div>
                            </label>

                            {{-- Opsi D --}}
                            <label class="relative flex items-center gap-3 p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 cursor-pointer hover:border-purple-400 transition">
                                <input type="radio" name="correct_answer_0" value="D" class="peer sr-only option-radio">
                                <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-purple-600 peer-checked:bg-purple-600 transition">
                                    <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100"></div>
                                </div>
                                <div class="flex-1 flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-400">D.</span>
                                    <input type="text" class="option-text w-full bg-transparent border-none p-0 text-sm focus:ring-0" placeholder="Teks pilihan D">
                                </div>
                            </label>
                        </div>
                        <p class="text-[11px] text-slate-500 mt-3 italic">* Klik tombol radio di samping kiri untuk menandai jawaban yang benar.</p>
                    </div>
                </div>

                {{-- Tombol Tambah Soal --}}
                <button type="button" id="addQuestionBtn" class="mt-4 inline-flex items-center gap-2 px-4 py-3 rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-400 text-sm font-bold hover:border-purple-500 hover:text-purple-600 hover:bg-purple-50 transition w-full justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Soal Baru
                </button>
            </div>
        </div>

        {{-- ============ KOLOM KANAN: LIVE PREVIEW (5 Kolom) ============ --}}
        <div class="lg:col-span-5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-lg overflow-hidden flex flex-col h-[calc(100vh-8rem)] sticky top-24">
            
            {{-- Header Preview --}}
            <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/60 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-2">
                    <div class="flex gap-1.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    </div>
                    <span class="text-xs font-mono text-slate-500 dark:text-slate-400 ml-1">Pratinjau Siswa</span>
                </div>
                <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-700 dark:bg-purple-950/80 dark:text-purple-400 text-[10px] font-bold uppercase font-mono">Live Preview</span>
            </div>

            {{-- Area Scrollable Preview --}}
            <div class="flex-1 overflow-y-auto p-5 sm:p-6 space-y-6 bg-slate-50/50 dark:bg-slate-950/50">
                
                {{-- Header Kuis Preview --}}
                <div class="flex flex-col gap-2">
                    <h1 id="previewQuizTitle" class="text-xl font-bold text-slate-900 dark:text-white leading-tight">
                        Kuis Modul 6: Dinamika Rotasi
                    </h1>
                    <div class="flex items-center gap-3 text-xs text-slate-500">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 15 Menit</span>
                        <span>•</span>
                        <span id="previewQuestionCount">1 Soal</span>
                    </div>
                </div>

                {{-- Kontainer Soal Preview --}}
                <div id="previewQuestions" class="space-y-6">
                    {{-- Di-render via JS --}}
                </div>
                
                <div class="pt-4 border-t border-slate-200 dark:border-slate-800 text-center">
                    <button class="px-6 py-2.5 rounded-xl bg-purple-600 text-white text-sm font-bold w-full opacity-50 cursor-not-allowed">Selesai & Kumpulkan</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const questionsContainer = document.getElementById('questionsContainer');
        const addQuestionBtn = document.getElementById('addQuestionBtn');
        const questionCountLabel = document.getElementById('questionCountLabel');
        const quizTitleInput = document.getElementById('quizTitleInput');
        
        const previewQuizTitle = document.getElementById('previewQuizTitle');
        const previewQuestionCount = document.getElementById('previewQuestionCount');
        const previewQuestions = document.getElementById('previewQuestions');

        let questionCount = 1;

        // --- 1. TEMPLATE HTML UNTUK SOAL BARU ---
        function getQuestionTemplate(index) {
            return `
                <div class="question-item bg-slate-50 dark:bg-slate-800/40 rounded-xl border border-slate-200 dark:border-slate-700 p-5 relative group animate-fade-in">
                    <div class="flex items-center justify-between mb-3">
                        <span class="question-number font-mono text-sm font-bold text-purple-600">Soal #${index + 1}</span>
                        <button type="button" class="remove-question-btn p-1.5 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition" title="Hapus Soal">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    
                    <textarea rows="2" class="question-text w-full px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm mb-3 focus:ring-2 focus:ring-purple-500" placeholder="Tulis pertanyaan di sini..."></textarea>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        ${['A', 'B', 'C', 'D'].map(opt => `
                            <label class="relative flex items-center gap-3 p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 cursor-pointer hover:border-purple-400 transition">
                                <input type="radio" name="correct_answer_${index}" value="${opt}" class="peer sr-only option-radio">
                                <div class="w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center peer-checked:border-purple-600 peer-checked:bg-purple-600 transition">
                                    <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100"></div>
                                </div>
                                <div class="flex-1 flex items-center gap-2">
                                    <span class="text-xs font-bold text-slate-400">${opt}.</span>
                                    <input type="text" class="option-text w-full bg-transparent border-none p-0 text-sm focus:ring-0" placeholder="Teks pilihan ${opt}">
                                </div>
                            </label>
                        `).join('')}
                    </div>
                </div>
            `;
        }

        // --- 2. LOGIKA TAMBAH & HAPUS SOAL ---
        addQuestionBtn.addEventListener('click', () => {
            questionsContainer.insertAdjacentHTML('beforeend', getQuestionTemplate(questionCount));
            questionCount++;
            updateQuestionNumbers();
            updatePreview();
        });

        questionsContainer.addEventListener('click', (e) => {
            if (e.target.closest('.remove-question-btn')) {
                const item = e.target.closest('.question-item');
                if (questionsContainer.querySelectorAll('.question-item').length > 1) {
                    item.remove();
                    updateQuestionNumbers();
                    updatePreview();
                } else {
                    alert('Kuis harus memiliki minimal 1 soal.');
                }
            }
        });

        // --- 3. UPDATE NOMOR URUT SOAL ---
        function updateQuestionNumbers() {
            const items = questionsContainer.querySelectorAll('.question-item');
            items.forEach((item, index) => {
                item.querySelector('.question-number').textContent = `Soal #${index + 1}`;
            });
            
            const count = items.length;
            questionCountLabel.textContent = `${count} Soal`;
            previewQuestionCount.textContent = `${count} Soal`;
        }

        // --- 4. LIVE PREVIEW LOGIC ---
        function updatePreview() {
            // Update Judul
            previewQuizTitle.textContent = quizTitleInput.value || 'Kuis Tanpa Judul';

            // Render Soal
            let html = '';
            const items = questionsContainer.querySelectorAll('.question-item');

            items.forEach((item, index) => {
                const questionText = item.querySelector('.question-text').value || '<span class="text-slate-400 italic">Pertanyaan belum diisi...</span>';
                const options = item.querySelectorAll('.option-text');
                const selectedRadio = item.querySelector('.option-radio:checked');
                const correctAnswer = selectedRadio ? selectedRadio.value : null;

                html += `
                    <div class="bg-white dark:bg-slate-900 p-5 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                        <div class="flex items-start gap-3 mb-4">
                            <span class="shrink-0 w-6 h-6 rounded-full bg-purple-100 dark:bg-purple-950 text-purple-600 dark:text-purple-400 text-xs font-bold flex items-center justify-center mt-0.5">${index + 1}</span>
                            <p class="text-sm font-semibold text-slate-800 dark:text-slate-200 leading-relaxed">${questionText}</p>
                        </div>
                        <div class="space-y-2">
                            ${['A', 'B', 'C', 'D'].map((opt, i) => {
                                const optText = options[i].value || `<span class="text-slate-400 italic">Pilihan ${opt} kosong</span>`;
                                const isCorrect = correctAnswer === opt;
                                return `
                                    <div class="flex items-center gap-3 p-2.5 rounded-lg border ${isCorrect ? 'border-emerald-300 bg-emerald-50 dark:border-emerald-800 dark:bg-emerald-950/30' : 'border-slate-100 dark:border-slate-800'}">
                                        <div class="w-4 h-4 rounded-full border ${isCorrect ? 'border-emerald-500 bg-emerald-500' : 'border-slate-300'} flex items-center justify-center shrink-0">
                                            ${isCorrect ? '<svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>' : ''}
                                        </div>
                                        <span class="text-sm ${isCorrect ? 'text-emerald-800 dark:text-emerald-300 font-semibold' : 'text-slate-600 dark:text-slate-400'}">
                                            <span class="font-bold mr-1">${opt}.</span> ${optText}
                                        </span>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    </div>
                `;
            });

            previewQuestions.innerHTML = html || '<p class="text-sm text-slate-400 italic text-center">Belum ada soal...</p>';
        }

        // Listener input untuk update preview real-time
        questionsContainer.addEventListener('input', updatePreview);
        questionsContainer.addEventListener('change', updatePreview); // Untuk radio button
        quizTitleInput.addEventListener('input', updatePreview);

        // Inisialisasi awal
        updatePreview();
    });
</script>
@endpush