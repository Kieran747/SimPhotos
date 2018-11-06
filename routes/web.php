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

Route::get('/', function () {
    $todaysphotos = DB::table('photos')->where('created_at', '=', date("Y/m/d"))->get();
    return view('home', compact('todaysphotos'));
});

Route::get('/upload', function () {

    $airports = DB::table('airports')->where('approved', '=', '1')->get();
    $airlines = DB::table('airlines')->where('approved', '=', '1')->get();
    return view('upload', compact('airports', 'airlines'));
});

Route::get('/photo/{id}', function ($id) {
    $photo = DB::table('photos')->find($id);
    return view('photo', compact('photo'));
});

Route::get('/request/airport', function () {
    return view('request.airport');
});

Route::get('/request/airline', function () {
    return view('request.airline');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/airport-request', 'airportsController@store');

Route::post('/airline-request', 'airlinesController@store');

Route::post('upload-photo', 'photosController@store');

