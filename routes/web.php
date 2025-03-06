<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return view('home');
})->name('home');

require __DIR__.'/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:3'])->group(function () {
    Route::get('/', [StaffController::class, 'staffDashboard'])->name('index');
    Route::patch('/event/{event}', [StaffController::class, 'updateEvent'])->name('event.update');
    Route::get('/candidate/{id}', [CandidateController::class, 'show'])->name('candidate.profile.view');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role:Admin');
    Route::get('/candidate', [AdminController::class, 'candidate'])->name('admin.candidate')->middleware('role:Admin');
    Route::resource('quizzes', QuizController::class)->middleware('role:Admin');
    Route::resource('staff', StaffController::class)->middleware('role:Admin');
    Route::get('/candidate/profile', [CandidateController::class, 'showProfile'])->name('candidate.profile')->middleware('role:Candidate');
    Route::post('/profile', [CandidateController::class, 'storeProfile'])->name('profile.store')->middleware('role:Candidate');
    Route::get('/quiz', [QuizController::class, 'start'])->name('quiz.start')->middleware('role:Candidate');
    Route::post('/quiz/navigate', [QuizController::class, 'navigate'])->name('quiz.navigate')->middleware('role:Candidate');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit')->middleware('role:Candidate');
    Route::get('/staff', [StaffController::class, 'staffDashboard'])->name('staff.index')->middleware('role:Staff');
    Route::patch('/event/{event}', [StaffController::class, 'updateEvent'])->name('event.update')->middleware('role:Staff');
    Route::get('/candidate/{id}', [CandidateController::class, 'show'])->name('candidate.profile.view')->middleware('role:Staff');
});