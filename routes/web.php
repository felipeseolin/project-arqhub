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

Route::resource('/project', 'ProjectController')->middleware('auth');

Route::get('/user', 'User\UserController@edit')->name('user')->middleware('auth');
Route::put('/user', 'User\UserController@update')->middleware('auth');

Route::get('/userpage', function () {
	return view('user.user');
});

Route::get('/home', function () {
	return 'Você está logado!';
});

Route::resource('/signup', 'Sign\SignupController');

Route::get('/info', function () {
	return view('info');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/projects', function () {
    return view('projects');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
