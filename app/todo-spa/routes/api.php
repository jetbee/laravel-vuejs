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

Route::middleware('auth:sanctum')->get('/tasks','TaskController@index');
Route::middleware('auth:sanctum')->post('/tasks','TaskController@store');
Route::middleware('auth:sanctum')->get('/tasks/{task}','TaskController@show');
Route::middleware('auth:sanctum')->put('/tasks/{task}','TaskController@update');
Route::middleware('auth:sanctum')->delete('/tasks/{task}','TaskController@destroy');
// Route::get('/tasks', 'TaskController@index');
Route::post('/tasks', 'TaskController@store');
// Route::get('/tasks/{task}', 'TaskController@show');
// Route::put('/tasks/{task}', 'TaskController@update');
// Route::delete('/tasks/{task}', 'TaskController@destroy');

Route::middleware('auth:sanctum')->get('/user','UserController@index');
Route::middleware('auth:sanctum')->put('/user/{user}','UserController@update');
// Route::middleware('auth:sanctum')->get('/user','UserController@index');
// Route::put('/user/{user}','UserController@update');
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
