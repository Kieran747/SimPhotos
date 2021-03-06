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
    $todaysphotos = DB::table('photos')->where('created_at', '=', date("Y/m/d"))->paginate(5);
    $randoms = DB::table('photos')->orderBy(DB::raw('RAND()'))->take(100)->get();
    $front = DB::table('photos')->orderBy(DB::raw('RAND()'))->take(1)->get();
    return view('home', compact('todaysphotos', 'randoms', 'front'));
});

Route::get('/photo/{id}', function () {
    $randoms = DB::table('photos')->orderBy(DB::raw('RAND()'))->take(3)->get();
    return view('photo', compact('randoms'));
});

Route::get('/user/{id}', function ($id) {
    $photos = DB::table('photos')->where('user', '=', $id)->get();
    $user = DB::table('users')->find($id);
    return view('profile', compact('user', 'photos'));
});

Route::get('/upload', function () {

    $airports = DB::table('airports')->where('approved', '=', '1')->get();
    $airlines = DB::table('airlines')->where('approved', '=', '1')->get();
    return view('upload', compact('airports', 'airlines'));
});

Route::get('/photo/{id}', function ($id) {
    $photo = DB::table('photos')->find($id);
    $comments = DB::table('comments')->where('photo_id', $id)->get();
    return view('photo', compact('photo', 'comments'));
});

Route::get('/request/airport', function () {
    return view('request.airport');
});

Route::get('/account/settings', function () {
    return view('settings', compact('user'));
});

Route::get('/photos/id', function ($id) {
    $photos = DB::table('photos')->find($id);
    $comments = DB::table('comments')->find($id);
    return view('photos', compact('photos', 'comments'));
});

Route::get('/request/airline', function () {
    return view('request.airline');
});

Route::get('/search/{search}', function ($search) {
    $results = DB::table('photos')->where('aircraft', 'like', '%' . $search . '%')->orWHERE('country', 'like', '%' . $search . '%')->orWHERE('registration', 'like','%' . $search . '%')
        ->orWHERE('airline', 'like', '%' . $search . '%')->orWHERE('simulator', 'like', '%' . $search . '%')->orWHERE('airport', 'like', '%' . $search . '%')->get();
    return view('search', compact('results'));
});


Route::get('/searchfunction.php', function () {
    return view('searchfunction');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('account-photo', 'AccountController@picture');

Route::post('account-update', 'AccountController@update');

Route::post('/airport-request', 'airportsController@store');

Route::post('/airline-request', 'airlinesController@store');

Route::post('upload-photo', 'photosController@store');

Route::post('/comment', 'CommentsController@store');

Route::post('/comment-delete', 'CommentsController@destroy');


