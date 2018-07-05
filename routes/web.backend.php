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

Route::get('login', 'Auth\LoginController@getLogin')->name('backend.login');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@getLogout')->name('backend.logout');;

Route::group(['middleware' => ['admin']], function () {
    Route::get('', 'Home@dashboard')->name('backend.home.dashboard');

    Route::get('ms_category', 'MsCategory@getIndex')->name('backend.ms_category.index');
    Route::get('ms_category/create', 'MsCategory@getCreate')->name('backend.ms_category.create');
    Route::post('ms_category/create', 'MsCategory@postCreate');
    Route::get('ms_category/{ms_category_id}/edit', 'MsCategory@getEdit')->name('backend.ms_category.edit');
    Route::post('ms_category/{ms_category_id}/edit', 'MsCategory@postEdit');
    Route::get('ms_category/{ms_category_id}/delete', 'MsCategory@getDelete')->name('backend.ms_category.delete');

    Route::get('lesson', 'Lesson\Lesson@getIndex')->name('backend.lesson.index');
    Route::get('lesson/create', 'Lesson\Lesson@getCreate')->name('backend.lesson.create');
    Route::post('lesson/create', 'Lesson\Lesson@postCreate');
    Route::get('lesson/{lesson_id}/edit', 'Lesson\Lesson@getEdit')->name('backend.lesson.edit');
    Route::post('lesson/{lesson_id}/edit', 'Lesson\Lesson@postEdit');
    Route::get('lesson/{lesson_id}/delete', 'Lesson\Lesson@getDelete')->name('backend.lesson.delete');

    Route::get('lesson/{lesson_id}/lesson_detail', 'Lesson\LessonDetail\LessonDetail@getIndex')->name('backend.lesson_detail.index');
    Route::get('lesson/{lesson_id}/lesson_detail/create', 'Lesson\LessonDetail\LessonDetail@getCreate')->name('backend.lesson_detail.create');
    Route::post('lesson/{lesson_id}/lesson_detail/create', 'Lesson\LessonDetail\LessonDetail@postCreate');
    Route::get('lesson/{lesson_id}/lesson_detail/{lesson_detail_id}/edit', 'Lesson\LessonDetail\LessonDetail@getEdit')->name('backend.lesson_detail.edit');
    Route::post('lesson/{lesson_id}/lesson_detail/{lesson_detail_id}/edit', 'Lesson\LessonDetail\LessonDetail@postEdit');
    Route::get('lesson/{lesson_id}/lesson_detail/{lesson_detail_id}/delete', 'Lesson\LessonDetail\LessonDetail@getDelete')->name('backend.lesson_detail.delete');

    Route::get('changePassword', 'Auth\LoginController@getChangePassword')->name('backend.changePassword');
    Route::post('changePassword', 'Auth\LoginController@postChangePassword');

    Route::get('user', 'User@getIndex')->name('backend.user.index');
    Route::get('user/create', 'User@getCreate')->name('backend.user.create');
    Route::post('user/create', 'User@postCreate');
    Route::get('user/{user_id}/edit', 'User@getEdit')->name('backend.user.edit');
    Route::post('user/{user_id}/edit', 'User@postEdit');
    Route::get('user/{user_id}/delete', 'User@getDelete')->name('backend.user.delete');


    Route::post('media/chunk', 'Media@postChunk');
    Route::get('media/download/{media_id}', 'Media@getDownload')->name('backend.media.download');
});
