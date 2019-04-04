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
Route::post('/questions/{id}/markBestAnswer', 'QuestionsController@markBestAnswer');

// Answer Routes
Route::post('/answer', 'AnswersController@store');

// Vote
Route::post('/vote', 'VotesController@store');

// Google
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

