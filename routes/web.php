<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/configs', 'GameController@index')->name('configs');
Route::post('/configs', 'GameController@store')->name('configs.post');
Route::post('/configs/edit', 'GameController@edit')->name('configs.update');

Route::get('/cards', 'CardController@index')->name('cards');
Route::get('/cardPhoto/{id}/download', 'CardController@download')->name('cards.download');
Route::get('/cards/form', 'CardController@create')->name('cards.form');
Route::get('/cards/form/{id}/edit', 'CardController@edit')->name('cards.edit');
Route::post('/cards/form', 'CardController@store')->name('cards.store');
Route::post('/cards/form/{id}/update', 'CardController@update')->name('cards.update');
Route::delete('/cards/{id}/destroy', 'CardController@destroy')->name('cards.destroy');

Route::get('/preview', 'GameController@indexPreview')->name('preview');
