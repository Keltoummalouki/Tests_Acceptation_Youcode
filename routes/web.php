<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StaffController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

require __DIR__.'/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/candidate', [AdminController::class, 'candidate'])->name('admin.candidate');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('quizzes', QuizController::class);
    Route::resource('staff', StaffController::class);
});

Route::group(['prefix' => 'candidate', 'middleware' => 'auth'], function () {
    Route::get('/profile', [CandidateController::class, 'showProfile'])->name('candidate.profile');
    Route::post('/profile', [CandidateController::class, 'storeProfile'])->name('candidate.profile.store');
    Route::get('/quiz', [QuizController::class, 'start'])->name('candidate.quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('candidate.quiz.submit');
});