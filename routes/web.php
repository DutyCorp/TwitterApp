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
use Illuminate\Support\Facades\Redirect;
use App\User;

Route::get('/login', function () {
	if (Auth::check()){
		return Redirect::to('/');
	} else {
		return view('login');
	}
})->name('login');

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/profile', function() {
	$User = User::where('UserID', Session::get('UserID'))->first();
	return view('profile', compact('User'));
})->middleware('auth');

Route::post('/doLogin', 'MainController@postLogin');
Route::post('/doRegister', 'MainController@postRegister');
Route::post('/doPostTweet', 'MainController@postTweet');
Route::post('/doPostUpdateProfile', 'MainController@postUpdateProfile');
Route::get('/doLogout', 'MainController@getLogout');
Route::get('/doRefreshTimeline', 'MainController@getRefreshTimeline');