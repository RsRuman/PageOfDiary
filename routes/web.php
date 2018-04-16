<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('chat', 'ChatController@chat');
Route::post('send', 'ChatController@send');

Auth::routes();
Route::get('/home', 'Homecontroller@index')->name('home');
Route::get('/profile', 'ProfileController@profile');
Route::post('/addProfile', 'ProfileController@addProfile');
Route::post('/addUserPost', 'HomeController@addUserPost');
Route::get('/game', 'HomeController@game');