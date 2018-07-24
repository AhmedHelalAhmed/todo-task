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

Route::post('/register','Auth\RegisterController@create');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>["auth:api"]],function(){
    Route::get('tasks','Api\TasksController@index');
    Route::post('tasks','Api\TasksController@store');
    Route::delete('tasks/{id}', 'Api\TasksController@destroy');
    Route::get('/tasks/{id}', 'Api\TasksController@show');
    Route::get('/tasks/{id}/edit', 'Api\TasksController@edit');
    Route::put('/tasks/{id}', 'Api\TasksController@update');
    //to swap the elements in case of up and down in frontend
    Route::post('tasks/{id1}/{id2}', 'Api\TasksController@swap');
});
