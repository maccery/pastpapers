<?php

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
use App\Subject;
use App\Vote;
use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/about', function () {
        return view('general.about');
    })->name('about');

    Route::get('/help', function () {
        $questions = \App\Question::all();
        return view('general.help', ['questions' => $questions]);
    })->name('help');

    Route::get('/process', function () {
        return view('answer.process');
    })->name('process');

    Route::post('/search', 'PostSearchController@search')->name('search');

    Route::get('/search', function() {
        return view('welcome');
    });

    Route::get('/answer/{answer}', function (App\Answer $answer) {
        return view('answer/index', ['answer' => $answer]);
    })->name('answer');

    Route::get('/browse', function () {
        $subjects = Subject::orderBy('name', 'asc')->get();
        return view('browse/index', ['subjects' => $subjects]);
    })->name('browse');

    Route::get('/browse/{subject}', function (App\Subject $subject) {
        $past_papers = $subject->past_papers;

        return view('browse/past_papers', ['subject' => $subject, 'past_papers' => $past_papers]);
    })->name('browse_name');

    Route::get('/browse/{subject}/{past_paper}', function (App\Subject $subject, App\PastPaper $past_paper) {

        return view('browse/questions', [
            'subject' => $subject,
            'current_past_paper' => $past_paper
        ]);
    })->name('browse_by_past_paper');

    Route::get('/browse/{subject}/{past_paper}/{paper_question}', function (App\Subject $subject, App\PastPaper $past_paper, App\PaperQuestion $paper_question) {
        $answers = $paper_question->answers->sortByDesc(function ($answers) {
            return $answers->votes->sum('vote');
        });
        return view('browse/view', [
            'subject' => $subject,
            'answers' => $answers,
            'current_past_paper' => $past_paper,
            'paper_question' => $paper_question,
        ]);
    })->name('browse_answers');

    Route::get('/unconfirmed/{subject}', function (App\Subject $subject) {
        $answers = $subject->answers->sortByDesc(function ($answers) {
            return $answers->votes->sum('vote');
        });
        $past_papers = $subject->past_papers;

        return view('browse/view', ['subject' => $subject, 'answers' => $answers, 'past_papers' => $past_papers]);
    })->name('unconfirmed_past_papers');

    Route::get('/suggest/{past_paper}', function (App\PastPaper $past_paper) {
        return view('browse/suggest_date', ['past_paper' => $past_paper]);
    })->name('suggest_dates');

    Route::get('/create_past_paper/{subject}', function (App\Subject $subject) {
        return view('browse/create_past_paper', ['subject' => $subject]);
    })->name('create_past_paper');

    Route::get('/create_subject', function () {
        return view('browse/create_subject');
    })->name('create_subject');

    Route::get('/create_paper_question/{past_paper}', function (App\PastPaper $past_paper) {
        return view('browse/create_paper_question', ['past_paper' => $past_paper]);
    })->name('create_paper_question');

    Route::get('/user/{user}', function (App\User $user) {
        return view('user/view', ['user' => $user]);
    })->name('view_user');


    Route::post('/post', 'PostController@store')->middleware('auth')->name('post_answer');
    Route::post('/post_create_question', 'PostCreateQuestionController@store')->middleware('auth')->name('post_question');
    Route::post('/post_suggest_date', 'PostSuggestDateController@store')->middleware('auth')->name('post_suggest_date');
    Route::post('/post_create_verison',
        'PostCreatePastPaperController@store')->middleware('auth')->name('post_create_past_paper');
    Route::post('/post_create_subject',
        'PostCreateSubjectController@store')->middleware('auth')->name('post_create_subject');
    Route::post('/post_create_paper_question',
        'PostCreatePaperQuestionController@store')->middleware('auth')->name('post_create_paper_question');

    Route::get('/vote/{type}/{votable_id}/{vote}', ['uses' => 'PostVoteController@store'])->name('vote_answer');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('user_area');
});