<?php

Auth::routes();

// Home
Route::get('/', 'PagesController@index');

// User
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

// Search
Route::get('/search',['uses' => 'PagesController@search','as' => 'search']);

// LoggedIn
Route::get('/loggedIn', 'PagesController@loggedIn');

// Question Routes
Route::resource('/questions', 'QuestionsController');

// Answer Routes
Route::post('/answer', 'AnswersController@store');

// Vote
Route::post('/vote', 'VotesController@store');

