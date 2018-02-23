<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return 'You are connected to the API';
});

/*
 * Auth routes
 * */
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\LoginController@login');
});

/*
 * Routes which require auth
 * */
Route::group(['middleware' => 'auth:api'], function () {

});
