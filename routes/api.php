<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/sports/{team}', 'MatchController@show');


Route::put('/todo/{id}', 'TodoController@update');
Route::post('/todo/{id}/delete', 'TodoController@destroy');
Route::post('/todo/create', 'TodoController@store');

Route::post('/photos/{userid}', 'PhotosController@create');
Route::delete('/photos/{userid}', 'PhotosController@destroy');