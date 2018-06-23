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

Route::get('/', 'Home@dashboard');
Route::get('/login', 'Home@login');
Route::get('/changePassword', 'Home@changePassword');
Route::get('/main', 'Home@main');
Route::get('/list', 'Home@list');
Route::get('/detail', 'Home@detail');
