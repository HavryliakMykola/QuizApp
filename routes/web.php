<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\QuizResultsController;
use App\QuizResults;
use Illuminate\Support\Facades\Route;

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


// HOME PAGE
Route::get('/', function () {
    return view('welcome');
});

//ADMIN

Route::get('/admin', [QuizController::class, 'index']);

//Add quiz
Route::get('/admin/quiz/add', function () {
    return view('create');
});
Route::post('/admin/quiz/add_quiz', [QuizController::class, 'add_quiz'] );
//Delete quiz 
Route::get('/admin/delete_quiz/{id}', [QuizController::class, 'delete_quiz']);
//Change status 
Route::get('/admin/change_status/{id}', [QuizController::class, 'change_status']);
//Quiz page

Route::get('/admin/quiz/{id}', [QuizController::class, 'show']);


//Add question

Route::get('/admin/quiz/{id}/add', function ($id) {
    return view('add_question');
});

Route::post('/admin/quiz/{id}/add_question', [QuizQuestionController::class, 'add_question'] );

//Results

Route::get('/admin/results', [QuizResultsController::class, 'index'] );

Route::get('/admin/results/{id}/detailed', function ($id) {
    return view('results_detailed');
});

Route::post('/admin/results/{id}/detailed', function($id) {

});

//APP
//List of quizes
Route::get('/app', [QuizController::class, 'published']);

//Take quiz

Route::get('/app/take/{id}', [QuizQuestionController::class, 'question']);

Route::post('/app/take/{id}', [QuizQuestionController::class, 'answer']);

//Results
Route::get('/app/result/{id}', [QuizResultsController::class, 'show']);