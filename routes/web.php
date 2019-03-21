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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

// Home
Route::get('/', 'PagesController@index');

// Search
Route::get('/search',['uses' => 'PagesController@search','as' => 'search']);

// LoggedIn
Route::get('/loggedIn', 'PagesController@loggedIn');

// Questions Routes
//Route::get('/questions/ask', 'PagesController@askQuestion');

Route::get('/questions', 'QuestionsController@index');
Route::get('/questions/ask', 'QuestionsController@create');
Route::get('/questions/{id}', 'QuestionsController@show');
Route::post('/questions', 'QuestionsController@store')->middleware('auth');
Route::get('/questions/{id}/edit', 'QuestionsController@edit');
Route::patch('/questions/{id}', 'QuestionsController@update')->middleware('auth');
Route::delete('/questions/{id}', 'QuestionsController@destroy')->middleware('auth');

// Answer Routes

Route::post('/answer', 'AnswersController@store')->middleware('auth');
