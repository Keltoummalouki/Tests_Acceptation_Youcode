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
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/candidate', [AdminController::class, 'candidate'])->name('candidate');
    Route::resource('quizzes', QuizController::class);
    Route::resource('staff', AdminController::class);
});

Route::prefix('candidate')->name('candidate.')->middleware(['auth','role:Candidate'])->group(function () {
    Route::get('/candidate/profile', [CandidateController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [CandidateController::class, 'storeProfile'])->name('profile.store');
    Route::get('/quiz', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/navigate', [QuizController::class, 'navigate'])->name('quiz.navigate');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
});

Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:3'])->group(function () {
    Route::get('/dashboard', [StaffController::class, 'staffDashboard'])->name('index');
    Route::patch('/event/{event}', [StaffController::class, 'updateEvent'])->name('event.update');
    Route::get('/candidate/{id}', [CandidateController::class, 'show'])->name('candidate.profile.view');
    Route::patch('/event/{event}', [StaffController::class, 'updateEvent'])->name('event.update');
    Route::get('/candidate/{id}', [CandidateController::class, 'show'])->name('candidate.profile.view');
    
});