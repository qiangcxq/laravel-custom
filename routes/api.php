<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v0.0.1')->group(function () {
    Route::resource('news','V0_0_1\NewsController');
});

Route::prefix('v0.0.2')->group(function () {
    Route::resource('news','V0_0_2\NewsController');
});