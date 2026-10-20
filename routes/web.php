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

    Route::get('/sertifikat', fn() => view('student.dashboard'))->name('certificate.index');
    Route::get('/profil', fn() => view('student.dashboard'))->name('profile');
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
