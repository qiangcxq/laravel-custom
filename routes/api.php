<?php

Route::post('login','SessionController@login');
Route::prefix('user')->group(function (){
    Route::post('location', 'UserController@location');
});
Route::prefix('upload')->group(function (){
    Route::get('init', 'UploadController@init');
});
Route::get('test','SessionController@test');
Route::post('test','SessionController@test');