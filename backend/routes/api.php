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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('tasks','Api\TasksController@index')->middleware('cors')->middleware('auth:api');
Route::post('tasks','Api\TasksController@store')->middleware('cors')->middleware('auth:api');
Route::delete('tasks/{id}', 'Api\TasksController@destroy')->middleware('cors')->middleware('auth:api');
Route::get('/tasks/{id}', 'Api\TasksController@show')->middleware('cors')->middleware('auth:api');
Route::get('/tasks/{id}/edit', 'Api\TasksController@edit')->middleware('cors')->middleware('auth:api');
Route::put('/tasks/{id}', 'Api\TasksController@update')->middleware('cors')->middleware('auth:api');
//to swap the elements in case of up and down in frontend
Route::post('tasks/{id1}/{id2}', 'Api\TasksController@swap')->middleware('cors')->middleware('auth:api');
