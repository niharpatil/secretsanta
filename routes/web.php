<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'FrontendController@home');
Route::get('/call', 'HomeController@return_value');
Route::get('/manage', 'BackendController@home');

Auth::routes();

Route::get('/register',function(){
	return redirect('/');
});

Route::get('/login','FrontendController@login');

//Route::get('/register', 'RegistrationController@register');
Route::get('/home', 'HomeController@index');

Route::get('/mail-test','BackendController@sendMail');
