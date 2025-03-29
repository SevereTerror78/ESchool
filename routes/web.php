<?php

use App\Http\Controllers\MarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Mark;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/schoolClass/create', [SchoolClassController::class, 'create'])->name('schoolClass.create');
    Route::post('/schoolClass', [SchoolClassController::class, 'store'])->name('schoolClass.store');
    Route::get('/schoolClass/{id}/edit', [SchoolClassController::class, 'edit'])->name('schoolClass.edit');
    Route::put('/schoolClass/{id}', [SchoolClassController::class, 'update'])->name('schoolClass.update');
    Route::delete('/schoolClass/{id}', [SchoolClassController::class, 'destroy'])->name('schoolClass.destroy');

    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
    
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
        
    Route::get('/mark/create', [MarkController::class, 'create'])->name('mark.create');
    Route::post('/mark', [MarkController::class, 'store'])->name('mark.store');
    Route::get('/mark/{id}/edit', [MarkController::class, 'edit'])->name('mark.edit');
    Route::put('/mark/{id}', [MarkController::class, 'update'])->name('mark.update');
    Route::delete('/mark/{id}', [MarkController::class, 'destroy'])->name('mark.destroy');
});

Route::get('/schoolClass', [SchoolClassController::class, 'index'])->name('SchoolClass.index');
Route::get('/schoolClass/{id}', [SchoolClassController::class, 'show'])->name('schoolClass.show');

Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::get('/subject/{id}', [SubjectController::class, 'show'])->name('subject.show');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');

Route::get('/mark', [MarkController::class, 'index'])->name('mark.index');
Route::get('/mark/{id}', [MarkController::class, 'show'])->name('mark.show');
require __DIR__.'/auth.php';
