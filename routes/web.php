<?php

use App\Match;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/null', function(){
    return redirect(url(''));
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/photos', 'PhotosController@index');
Route::get('/tasks', 'TodoController@index');

// $table->id();
//             $table->string('Div');
//             $table->date('Date');
//             $table->string('HomeTeam');
//             $table->string('AwayTeam');
//             $table->string('FTR');


// H=Home Win, D=Draw, A=Away Win


route::get('sports', function() {
    $query = 'Juventus';

    $homeWins = Match::where('HomeTeam', $query)->where('FTR', 'H')->pluck('AwayTeam');
    $awayWins = Match::where('AwayTeam', $query)->where('FTR', 'A')->pluck('HomeTeam');

    $results = collect();

    $results = $results->merge($homeWins)->merge($awayWins)->unique();
     dd($results);

});

