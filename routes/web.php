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
Route::get('/projects/{param1}-{value1}', 'ProjectController@oneParam');
Route::get('/projects/{param1}-{value1}/{param2}-{value2}', 'ProjectController@twoParam');
Route::get('/projects/{param1}-{value1}/{param2}-{value2}/{param3}-{value3}', 'ProjectController@threeParam');
Route::get('/projects/{param1}-{value1}/{param2}-{value2}/{param3}-{value3}/{param4}-{value4}', 'ProjectController@fourParam');
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
