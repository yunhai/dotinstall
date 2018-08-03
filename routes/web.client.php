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

Route::get('login', 'Auth\LoginController@getLogin')->name('client.login.login');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@getLogout')->name('client.login.logout');

Route::group(['middleware' => ['client']], function () {
    Route::get('', 'Home@dashboard')->name('client.home.dashboard');
    Route::get('mypage', 'Affiliator\Affiliator@getMyPage')->name('client.affiliator.mypage');
    Route::get('affiliator_income', 'Affiliator\AffiliatorIncome@getIndex')->name('client.affiliator_income.index');
    Route::get('affiliator_invitation', 'Affiliator\AffiliatorInvitation@getIndex')->name('client.affiliator_invitation.index');
    Route::get('change_password', 'Auth\LoginController@getChangePassword')->name('client.login.change_password');
    Route::post('change_password', 'Auth\LoginController@postChangePassword');
});
