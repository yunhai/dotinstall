<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login','Auth\LoginController@getLogin')->name('login');
Route::post('login','Auth\LoginController@postLogin');
Route::get('logout','Auth\LoginController@getLogout');

Route::group(['middleware' => ['client']], function () {
    Route::get('/', 'Home@dashboard');
    Route::get('/changePassword','Auth\LoginController@getChangePassword')->name('changePassword');
    Route::post('/changePassword','Auth\LoginController@postChangePassword');
});