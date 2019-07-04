<?php

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

Route::post('login', 'MemberController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('logout', 'MemberController@logout');
    Route::resource('member', 'MemberController');
    Route::resource('configuration', 'ConfigController');
    Route::post('member/update-profile/{id}', 'MemberController@updateProfile');
});
Route::get('hello', function () {
    return "Xin chào";
});
Route::get('token/refresh', 'MemberController@refresh')->middleware('jwt.refresh');