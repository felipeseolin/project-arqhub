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

Route::get('/projects', 'ProjectController@listar');
Route::get('/project/id/{id}', 'ProjectController@show');
Route::get('/users', 'User\UserController@listar');

Route::resource('/project', 'ProjectController')->middleware('auth');

Route::get('/user/{id}', 'User\UserController@show');
Route::get('/user', 'User\UserController@edit')->name('user')->middleware('auth');
Route::post('/user/{id}', 'User\UserController@sendEmail')->name('send-email');
Route::get('/disableUser', 'User\UserController@disable')->middleware('auth');;

Route::put('/user', 'User\UserController@update')->middleware('auth');

Route::get('/userpage', function () {
	return abort(404);
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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
