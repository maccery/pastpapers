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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/browse', function () {
    $softwares = Software::all();
    return view('browse/index', ['softwares' => $softwares]);
})->name('browse');

Route::get('/browse/{software}', function (App\Software $software) {
    $reviews = $software->reviews->sortByDesc(function($reviews) {
        return $reviews->votes->sum('vote');
    });
    $versions = $software->versions;

    return view('browse/view', ['software' => $software, 'reviews' => $reviews, 'versions' => $versions]);
})->name('browse_name');

Route::get('/browse/{software}/{version}', function (App\Software $software, App\Version $version) {
    $reviews = $version->reviews->sortByDesc(function($reviews) {
        return $reviews->votes->sum('vote');
    });
    $versions = $software->versions;

    return view('browse/view', ['software' => $software, 'reviews' => $reviews, 'versions' => $versions, 'version_id' => $version->id]);
})->name('browse_by_version');

Route::get('/user/{user}', function (App\User $user) {
    return view('user/view', ['user' => $user]);
})->name('view_user');


Route::post('/post', 'PostController@store')->middleware('auth')->name('post_review');
Route::get('/vote/{review}/{vote}', function (App\Review $review, $vote, Request $request) {
    $keys = ['review_id' => $review->id, 'user_id' => $request->user()->id];

    $current_vote = App\Vote::where($keys)->first();
    if (isset($current_vote))
    {
        $current_vote->delete();
    }
    if (!isset($current_vote) or isset($current_vote) and $current_vote->vote != $vote) {
        App\Vote::updateOrCreate($keys, [
            'vote' => $vote,
        ]);
    }

    return back();
})->middleware('auth')->name('vote_review');

Auth::routes();

Route::get('/home', 'HomeController@index');
