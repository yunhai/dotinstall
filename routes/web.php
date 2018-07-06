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

Route::get('/', 'Home@index')->name('home');
Route::get('terms', 'Home@getTerms')->name('terms');
Route::get('privacy', 'Home@getPrivacy')->name('privacy');
Route::get('company', 'Home@getCompany')->name('company');
Route::get('contact', 'Home@getContact')->name('contact');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('lesson', 'Lesson@getLesson')->name('lesson');
Route::get('lesson/{lesson_id}/detail', 'Lesson@getDetail')->name('lesson.detail');
Route::get('lesson/{lesson_id}/detail/{lesson_detail_id}', 'LessonDetail@getDetail')->name('lesson_detail');

Route::get('stripe', 'Home@getStripe')->name('stripe');

Route::get('/demo', function () {
    return view('demo');
});
