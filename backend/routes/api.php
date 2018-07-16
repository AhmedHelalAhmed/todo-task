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


Route::get('tasks','Api\TasksController@index')->middleware('cors');
Route::post('tasks','Api\TasksController@store')->middleware('cors');
Route::delete('tasks/{id}', 'Api\TasksController@destroy')->middleware('cors');
Route::get('/tasks/{id}', 'Api\TasksController@show')->middleware('cors');
Route::get('/tasks/{id}/edit', 'Api\TasksController@edit')->middleware('cors');
Route::put('/tasks/{id}', 'Api\TasksController@update')->middleware('cors');
//to swap the elements in case of up and down in frontend
Route::post('tasks/{id1}/{id2}', 'Api\TasksController@swap')->middleware('cors');
