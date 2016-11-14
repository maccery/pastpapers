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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/browse', function () {
    $software = Software::first();
    $reviews = $software->reviews;

    return view('browse/view', ['software' => $software, 'reviews' => $reviews]);
});
