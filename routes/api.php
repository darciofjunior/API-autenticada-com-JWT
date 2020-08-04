<?php

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::apiResource('cars', 'Api\CarController');
});
    


Route::post('auth', 'Auth\AuthApiController@authenticate');
Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');
Route::get('me', 'Auth\AuthApiController@getAuthenticatedUser');