<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/quizzes', function () {
    return view('pages.quizzes');
})->name('quizzes');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');


Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('user.login');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('user.register');

Route::get('/logout', function () {
    Auth::logout();
    return to_route('home');
})->name('logout');


Route::get('/quiz', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz');

Route::post('/quiz', [\App\Http\Controllers\QuizController::class, 'submitQuiz'])->name('quiz.submit');

Route::get('/result', [\App\Http\Controllers\QuizController::class, 'showQuiz'])->name('quiz.result');

Route::get('/questions/add', [QuizController::class, 'showAddQuestionForm'])->name('questions.add');

Route::post('/questions/store', [QuizController::class, 'storeQuestion'])->name('questions.store');