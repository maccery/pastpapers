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
use App\Software;
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
        return view('review.process');
    })->name('process');

    Route::post('/search', 'PostSearchController@search')->name('search');

    Route::get('/search', function() {
        return view('welcome');
    });

    Route::get('/review/{review}', function (App\Review $review) {
        return view('review/index', ['review' => $review]);
    })->name('review');

    Route::get('/browse', function () {
        $softwares = Software::orderBy('name', 'asc')->get();
        return view('browse/index', ['softwares' => $softwares]);
    })->name('browse');

    Route::get('/browse/{software}', function (App\Software $software) {
        $versions = $software->versions;

        return view('browse/versions', ['software' => $software, 'versions' => $versions]);
    })->name('browse_name');

    Route::get('/browse/{software}/{version}', function (App\Software $software, App\Version $version) {
        $reviews = $version->reviews->sortByDesc(function ($reviews) {
            return $reviews->votes->sum('vote');
        });


        return view('browse/view', [
            'software' => $software,
            'reviews' => $reviews,
            'current_version' => $version
        ]);
    })->name('browse_by_version');

    Route::get('/unconfirmed/{software}', function (App\Software $software) {
        $reviews = $software->reviews->sortByDesc(function ($reviews) {
            return $reviews->votes->sum('vote');
        });
        $versions = $software->versions;

        return view('browse/view', ['software' => $software, 'reviews' => $reviews, 'versions' => $versions]);
    })->name('unconfirmed_versions');

    Route::get('/suggest/{version}', function (App\Version $version) {
        return view('browse/suggest_date', ['version' => $version]);
    })->name('suggest_dates');

    Route::get('/create_version/{software}', function (App\Software $software) {
        return view('browse/create_version', ['software' => $software]);
    })->name('create_version');

    Route::get('/create_software', function () {
        return view('browse/create_software');
    })->name('create_software');

    Route::get('/user/{user}', function (App\User $user) {
        return view('user/view', ['user' => $user]);
    })->name('view_user');


    Route::post('/post', 'PostController@store')->middleware('auth')->name('post_review');
    Route::post('/post_create_question', 'PostCreateQuestionController@store')->middleware('auth')->name('post_question');
    Route::post('/post_suggest_date', 'PostSuggestDateController@store')->middleware('auth')->name('post_suggest_date');
    Route::post('/post_create_verison',
        'PostCreateVersionController@store')->middleware('auth')->name('post_create_version');
    Route::post('/post_create_software',
        'PostCreateSoftwareController@store')->middleware('auth')->name('post_create_software');

    Route::get('/vote/{type}/{votable_id}/{vote}', ['uses' => 'PostVoteController@store'])->name('vote_review');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('user_area');
});