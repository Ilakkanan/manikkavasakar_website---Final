<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentQuiz;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// web.php
Route::get('/', [CommonController::class, 'index']);
Route::get('/contact', [CommonController::class, 'contact'])->name('contact');
Route::get('/about', [CommonController::class, 'about'])->name('about');
/*Route::get('/test', function () {
    return view('test');
});*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//dashboard
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
//announcement
Route::resource('announcements', AnnouncementController::class)->middleware(['adminorsuperadmin']);

Route::get('/announcementlist', [CommonController::class, 'anno_index'])->name('announcements.annoindex');
Route::get('/announcementlist/{id}', [CommonController::class, 'anno_show'])->name('announcements.annoshow');
Route::get('/staffs', [CommonController::class, 'display'])->name('common.display');


Route::resource('staff', StaffController::class);
Route::resource('students', StudentController::class);
Route::resource('quizzes', QuizController::class);









Route::resource('quizzes.quiz_questions', QuizQuestionController::class);
Route::get('/quizzes/{quiz}/questions', [QuizQuestionController::class, 'index'])->name('quizzes.questions.index');
Route::get('/quizzes/{quiz}/questions/create', [QuizQuestionController::class, 'create'])->name('quizzes.questions.create');
Route::post('/quizzes/{quiz}/questions', [QuizQuestionController::class, 'store'])->name('quizzes.questions.store');
Route::get('/quizzes/{quiz}/questions/{question}/edit', [QuizQuestionController::class, 'edit'])->name('quiz_questions.edit');
Route::put('/quizzes/{quiz}/questions/{question}', [QuizQuestionController::class, 'update'])->name('quiz_questions.update');
Route::delete('/quizzes/{quiz}/questions/{question}', [QuizQuestionController::class, 'destroy'])->name('quiz_questions.destroy');




Route::get('/student/quiz-list', [StudentQuiz::class, 'quizList'])->name('student.quiz.list');
Route::get('/student/quiz/{quiz}/rules', [StudentQuiz::class, 'viewRules'])->name('student.quiz-rules');
Route::get('/student/quiz/{quiz}/participate', [StudentQuiz::class, 'participate'])->name('student.quiz-participate');
Route::post('/quiz/{quiz}/submit', [StudentQuiz::class, 'submit'])->name('student.quiz-submit');


// 2024/11/18
Route::get('quiz/ranklist', [StudentQuiz::class, 'viewRanklist'])->name('student.quiz.ranklist');
Route::get('/quiz/{quizId}/rank', [HomeController::class, 'viewRank'])->name('quiz.rank');





