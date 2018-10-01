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

Route::get('login', 'Auth\LoginController@getLogin')->name('backend.login.login');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@getLogout')->name('backend.login.logout');

Route::group(['middleware' => ['admin']], function () {
    Route::get('', 'Home@dashboard')->name('backend.home.dashboard');

    Route::get('affiliator', 'Affiliator\Affiliator@getIndex')->name('backend.affiliator.index');
    Route::get('affiliator/create', 'Affiliator\Affiliator@getCreate')->name('backend.affiliator.create');
    Route::post('affiliator/create', 'Affiliator\Affiliator@postCreate');
    Route::get('affiliator/{affiliator_id}/edit', 'Affiliator\Affiliator@getEdit')->name('backend.affiliator.edit');
    Route::post('affiliator/{affiliator_id}/edit', 'Affiliator\Affiliator@postEdit');
    Route::get('affiliator/{affiliator_id}/delete', 'Affiliator\Affiliator@getDelete')->name('backend.affiliator.delete');

    Route::get('affiliator/{affiliator_id}/invitation', 'Affiliator\AffiliatorInvitation@getIndex')->name('backend.affiliator_invitation.index');
    Route::get('affiliator/{affiliator_id}/income', 'Affiliator\AffiliatorIncome@getIndex')->name('backend.affiliator_income.index');

    Route::get('change_password', 'Auth\PasswordController@getChangePassword')->name('backend.login.change_password');
    Route::post('change_password', 'Auth\PasswordController@postChangePassword');

    Route::get('lesson', 'Lesson\Lesson@getIndex')->name('backend.lesson.index');
    Route::get('lesson/create', 'Lesson\Lesson@getCreate')->name('backend.lesson.create');
    Route::post('lesson/create', 'Lesson\Lesson@postCreate');
    Route::post('lesson/sort', 'Lesson\Lesson@postSort');
    Route::get('lesson/{lesson_id}/edit', 'Lesson\Lesson@getEdit')->name('backend.lesson.edit');
    Route::post('lesson/{lesson_id}/edit', 'Lesson\Lesson@postEdit');
    Route::get('lesson/{lesson_id}/delete', 'Lesson\Lesson@getDelete')->name('backend.lesson.delete');

    Route::get('lesson/{lesson_id}/lesson_detail', 'Lesson\LessonDetail\LessonDetail@getIndex')->name('backend.lesson_detail.index');
    Route::get('lesson/{lesson_id}/lesson_detail/create', 'Lesson\LessonDetail\LessonDetail@getCreate')->name('backend.lesson_detail.create');
    Route::post('lesson/{lesson_id}/lesson_detail/create', 'Lesson\LessonDetail\LessonDetail@postCreate');
    Route::get('lesson/{lesson_id}/lesson_detail/{lesson_detail_id}/edit', 'Lesson\LessonDetail\LessonDetail@getEdit')->name('backend.lesson_detail.edit');
    Route::post('lesson/{lesson_id}/lesson_detail/{lesson_detail_id}/edit', 'Lesson\LessonDetail\LessonDetail@postEdit');
    Route::get('lesson/{lesson_id}/lesson_detail/{lesson_detail_id}/delete', 'Lesson\LessonDetail\LessonDetail@getDelete')->name('backend.lesson_detail.delete');

    Route::post('media/chunk', 'Media@postChunk')->name('backend.media.chuck');
    Route::get('media/checksum', 'Media@getChecksum')->name('backend.media.checksum');
    Route::get('media/download/{media_id}', 'Media@getDownload')->name('backend.media.download');
    Route::post('media/upload', 'Media@postUpload')->name('backend.media.upload');
    Route::post('media/content', 'Media@postContent')->name('backend.media.content');

    Route::get('ms_category', 'MsCategory\MsCategory@getIndex')->name('backend.ms_category.index');
    Route::get('ms_category/create', 'MsCategory\MsCategory@getCreate')->name('backend.ms_category.create');
    Route::post('ms_category/create', 'MsCategory\MsCategory@postCreate');
    Route::get('ms_category/{ms_category_id}/edit', 'MsCategory\MsCategory@getEdit')->name('backend.ms_category.edit');
    Route::post('ms_category/{ms_category_id}/edit', 'MsCategory\MsCategory@postEdit');
    Route::get('ms_category/{ms_category_id}/delete', 'MsCategory\MsCategory@getDelete')->name('backend.ms_category.delete');

    Route::get('ms_category/attribute', 'MsCategory\Attribute@getIndex')->name('backend.ms_category.attribute.index');
    Route::get('ms_category/attribute/create', 'MsCategory\Attribute@getCreate')->name('backend.ms_category.attribute.create');
    Route::post('ms_category/attribute/create', 'MsCategory\Attribute@postCreate');
    Route::get('ms_category/attribute/{ms_category_attribute_id}/edit', 'MsCategory\Attribute@getEdit')->name('backend.ms_category.attribute.edit');
    Route::post('ms_category/attribute/{ms_category_attribute_id}/edit', 'MsCategory\Attribute@postEdit');
    Route::get('ms_category/attribute/{ms_category_attribute_id}/delete', 'MsCategory\Attribute@getDelete')->name('backend.ms_category.attribute.delete');

    Route::get('notification', 'Notification@getIndex')->name('backend.notification.index');
    Route::get('notification/create', 'Notification@getCreate')->name('backend.notification.create');
    Route::post('notification/create', 'Notification@postCreate');
    Route::get('notification/{notification_id}/edit', 'Notification@getEdit')->name('backend.notification.edit');
    Route::post('notification/{notification_id}/edit', 'Notification@postEdit');
    Route::get('notification/{notification_id}/delete', 'Notification@getDelete')->name('backend.notification.delete');

    Route::get('announcement', 'Announcement@getIndex')->name('backend.announcement.index');
    Route::get('announcement/create', 'Announcement@getCreate')->name('backend.announcement.create');
    Route::post('announcement/create', 'Announcement@postCreate');
    Route::get('announcement/{announcement_id}/edit', 'Announcement@getEdit')->name('backend.announcement.edit');
    Route::post('announcement/{announcement_id}/edit', 'Announcement@postEdit');
    Route::get('announcement/{announcement_id}/delete', 'Announcement@getDelete')->name('backend.announcement.delete');

    Route::get('ad', 'Ad@getIndex')->name('backend.ad.index');
    Route::get('ad/create', 'Ad@getCreate')->name('backend.ad.create');
    Route::post('ad/create', 'Ad@postCreate');
    Route::get('ad/{announcement_id}/edit', 'Ad@getEdit')->name('backend.ad.edit');
    Route::post('ad/{announcement_id}/edit', 'Ad@postEdit');
    Route::get('ad/{announcement_id}/delete', 'Ad@getDelete')->name('backend.ad.delete');

    Route::get('setting', 'Setting@getIndex')->name('backend.setting.index');
    Route::get('setting/create', 'Setting@getCreate')->name('backend.setting.create');
    Route::post('setting/create', 'Setting@postCreate');
    Route::get('setting/{setting_id}/edit', 'Setting@getEdit')->name('backend.setting.edit');
    Route::post('setting/{setting_id}/edit', 'Setting@postEdit');
    Route::get('setting/{setting_id}/delete', 'Setting@getDelete')->name('backend.setting.delete');

    Route::get('user', 'User@getIndex')->name('backend.user.index');
    Route::get('user/create', 'User@getCreate')->name('backend.user.create');
    Route::post('user/create', 'User@postCreate');
    Route::get('user/{user_id}/edit', 'User@getEdit')->name('backend.user.edit');
    Route::post('user/{user_id}/edit', 'User@postEdit');
    Route::get('user/{user_id}/change_password', 'User@getChangePassword')->name('backend.user.change_password');
    Route::post('user/{user_id}/change_password', 'User@postChangePassword');
    Route::get('user/{user_id}/block', 'User@getBlock')->name('backend.user.block');
    Route::get('user/{user_id}/unblock', 'User@getUnblock')->name('backend.user.unblock');
    Route::get('user/{user_id}/delete', 'User@getDelete')->name('backend.user.delete');

    Route::get('youtube_link', 'YoutubeLink@getIndex')->name('backend.youtube_link.index');
    Route::get('youtube_link/create', 'YoutubeLink@getCreate')->name('backend.youtube_link.create');
    Route::post('youtube_link/create', 'YoutubeLink@postCreate');
    Route::get('youtube_link/{youtube_link_id}/edit', 'YoutubeLink@getEdit')->name('backend.youtube_link.edit');
    Route::post('youtube_link/{youtube_link_id}/edit', 'YoutubeLink@postEdit');
    Route::get('youtube_link/{youtube_link_id}/delete', 'YoutubeLink@getDelete')->name('backend.youtube_link.delete');
});
