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
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/browse', function () {
    $softwares = Software::all();
    return view('browse/index', ['softwares' => $softwares]);
})->name('browse');

Route::get('/browse/{name}', function ($name) {
    $software = Software::where('name', $name)->first();
    $reviews = $software->reviews;
    $versions = $software->versions;

    return view('browse/view', ['software' => $software, 'reviews' => $reviews, 'versions' => $versions]);
})->name('browse_name');

Route::get('/browse/{name}/{version}', function ($name, $version) {
    $software = Software::where('name', $name)->first();
    $version = $software->versions()->where('version', $version)->first();
    $reviews = $version->reviews;
    $versions = $software->versions;

    return view('browse/view', ['software' => $software, 'reviews' => $reviews, 'versions' => $versions, 'version_id' => $version->id]);
})->name('browse_by_version');

Route::get('/user/{user_id}', function ($user_id) {
    $user = User::where('id', $user_id)->first();

    return view('user/view', ['user' => $user]);
})->name('view_user');


Route::post('/post', 'PostController@store')->middleware('auth')->name('post_review');

Auth::routes();

Route::get('/home', 'HomeController@index');
