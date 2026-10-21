<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ============ STUDENT (dummy, tanpa auth) ============
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', fn() => view('student.dashboard'))->name('dashboard');
    Route::get('/katalog', fn() => view('student.catalog'))->name('catalog'); 

    Route::get('/kelas/{slug}', fn($slug) => view('student.course.show'))->name('course.learn');
    Route::get('/kelas/{slug}/belajar', fn($slug) => view('student.course.learn'))->name('course.learn');

    Route::get('/kelas/{slug}/kuis/{quiz}', fn($slug, $quiz) => view('student.course.quiz-show'))->name('quiz.show');
    Route::get('/kelas/{slug}/kuis/{quiz}/play', fn($slug, $quiz) => view('student.course.quiz-play'))->name('quiz.play');
    Route::get('/kelas/{slug}/kuis/{quiz}/result', fn($slug, $quiz) => view('student.course.quiz-result'))->name('quiz.result');

    Route::get('/kelas/{slug}/diskusi', fn($slug) => view('student.discussion.index'))->name('discussion.index');
    Route::get('/kelas/{slug}/diskusi/create', fn($slug) => view('student.discussion.create'))->name('discussion.create');
    Route::get('/kelas/{slug}/diskusi/{thread}', fn($slug, $thread) => view('student.discussion.show'))->name('discussion.show');

    Route::get('/sertifikat', fn() => view('student.dashboard'))->name('certificate.index');
    Route::get('/profil', fn() => view('student.dashboard'))->name('profile');
});

// ============ ADMIN (Dummy Route) ============
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');
    
    Route::get('/kelas', fn() => view('admin.course.index'))->name('course.index');
    Route::get('/user', fn() => view('admin.user.index'))->name('user.index');
    Route::get('/kelas/{id}', fn($id) => view('admin.course.show', ['id' => $id]))->name('course.show');
    Route::get('/sertifikat', fn() => view('admin.certificate.index'))->name('certificate.index');
    Route::get('/analytics', fn() => view('admin.analytics'))->name('analytics');
    Route::get('/log', fn() => view('admin.log'))->name('log');
});

// ============ LECTURER (Dummy Route) ============
Route::prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/', fn() => view('lecturer.dashboard'))->name('dashboard');
    
    // Rute dummy agar menu di sidebar tidak error saat diklik
    Route::get('/kelas', fn() => view('lecturer.course.index'))->name('course.index');
    Route::get('/kelas/create', fn() => view('lecturer.course.create'))->name('course.create');
    Route::get('/kelas/{course}/edit', fn($course) => view('lecturer.course.edit', ['course' => $course]))->name('course.edit');
    Route::get('/kelas/{course}/modul/{module}/create', fn($course, $module) => view('lecturer.course.module-create', ['course' => $course, 'module' => $module]))->name('course.module.create');
    Route::get('/kelas/{course}/modul/{module}/kuis', fn($course, $module) => view('lecturer.quiz.index'))->name('quiz.index');
    Route::get('/kelas/{course}/modul/{module}/kuis/builder', fn($course, $module) => view('lecturer.quiz.create'))->name('quiz.builder');
    Route::get('/kelas/{course}', fn($course) => view('lecturer.course.show', ['course' => $course]))->name('course.show');
    Route::get('/kelas/{course}/mahasiswa', fn($course) => view('lecturer.course.students', ['course' => $course]))->name('course.students');
    Route::get('/diskusi', fn() => view('lecturer.discussion.index'))->name('discussion.index');
    Route::get('/diskusi/{thread}', fn($thread) => view('lecturer.discussion.show', ['thread' => $thread]))->name('discussion.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
