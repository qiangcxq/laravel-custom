<?php

Route::post('login','SessionController@login');
Route::prefix('user')->group(function (){
    Route::post('location', 'UserController@location');
});
Route::get('test','SessionController@test');
Route::post('test','SessionController@test');
