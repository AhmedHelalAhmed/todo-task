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
//must be enhance to delete not post
Route::post('tasks/{id}', 'Api\TasksController@destroy')->middleware('cors');
