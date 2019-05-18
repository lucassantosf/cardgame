<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/configs', 'GameController@index'); 
Route::post('/configs', 'GameController@store');
Route::post('/configs/edit', 'GameController@edit');

Route::get('/cards', 'CardController@index');  
Route::get('/cards/form', 'CardController@create');  
Route::get('/cards/form/{id}/edit', 'CardController@edit'); 
Route::post('/cards/form', 'CardController@store'); 
Route::post('/cards/form/{id}/update', 'CardController@update'); 
Route::delete('/cards/{id}/destroy', 'CardController@destroy');