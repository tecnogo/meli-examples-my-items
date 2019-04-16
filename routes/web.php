<?php

Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

Route::get('/activas', 'HomeController@active');
Route::get('/pausadas', 'HomeController@paused');
Route::get('/todas', 'HomeController@all');

Route::get('/item/{id}', 'HomeController@item');
