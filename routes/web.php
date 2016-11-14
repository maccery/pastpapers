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

    $softwares = Software::all();
    return view('browse/index', ['softwares' => $softwares]);
})->name('browse');

Route::get('/browse/{name}', function ($name) {
    $software = Software::where('name', $name)->first();
    $reviews = $software->reviews;
    $versions = $software->versions;

    return view('browse/view', ['software' => $software, 'reviews' => $reviews, 'versions' => $versions]);
})->name('browse_name');