<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/user/{id}', 'UserGroupsAPIController@user');
Route::get('/group-data/{user_id}','UserGroupsAPIController@get_group_data');
Route::post('/create-group','UserGroupsAPIController@post_create_group_data');
Route::post('/create-user','UserGroupsAPIController@post_create_user');
Route::post('/distribute','BackendController@distribute');
Route::get('/form-data/{group_id}','UserGroupsAPIController@get_form_data_by_group_id');

Route::post('/edit-group/{group_id}','UserGroupsAPIController@edit_group');