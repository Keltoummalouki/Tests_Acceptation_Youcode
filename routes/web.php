<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\QuizController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/candidate', [AdminController::class, 'candidate'])->name('admin.candidate');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('quizzes', QuizController::class);
});

Route::group(['prefix' => 'candidate', 'middleware' => 'auth'], function () {
    Route::get('/profile', [CandidateController::class, 'showProfile'])->name('candidate.profile');
    Route::post('/profile', [CandidateController::class, 'storeProfile'])->name('candidate.profile.store');
    Route::get('/quiz', [QuizController::class, 'start'])->name('candidate.quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('candidate.quiz.submit');
});
