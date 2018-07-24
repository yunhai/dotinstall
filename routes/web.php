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
Auth::routes();

Route::get('', 'Top@index')->name('top');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');
Route::get('register/done', 'Auth\RegisterController@registerDone')->name('register.done');
Route::get('register/?token={token}', 'Auth\RegisterController@register')->name('register.affiliator');

Route::get('contact', 'Page@getContact')->name('contact');
Route::get('company', 'Page@getCompany')->name('company');

Route::get('lesson', 'Lesson\Lesson@getLesson')->name('lesson');
Route::get('lesson/{lesson_id}/detail', 'Lesson\Lesson@getDetail')->name('lesson.detail');
Route::get('lesson/{lesson_id}/detail/{lesson_detail_id}', 'Lesson\LessonDetail\LessonDetail@getDetail')->name('lesson_detail.detail');
Route::get('lesson/{lesson_id}/detail/{lesson_detail_id}/resource/download', 'Lesson\LessonDetail\LessonDetail@getDownloadResource')->name('lesson_detail.resource.download');

Route::get('media/download/{media_id}', 'Media@getDownload')->name('media.download');

Route::get('privacy', 'Page@getPrivacy')->name('privacy');
Route::get('terms', 'Page@getTerms')->name('terms');
Route::post('payment/webhook', 'Stripe@handleWebhook')->name('payment.webhook');

Route::group(['middleware' => ['web']], function () {
    Route::get('mypage', 'MyPage@getMyPage')->name('mypage')->middleware('web.user');

    Route::get('lesson/{lesson_id}/enroll', 'Lesson\Lesson@getEnroll')->name('lesson.enroll')->middleware('web.user');
    Route::get('lesson/{lesson_id}/close', 'Lesson\Lesson@getClose')->name('lesson.close')->middleware('web.user');

    Route::get('lesson/{lesson_id}/detail/{lesson_detail_id}/learn', 'Lesson\LessonDetail\LessonDetail@getLearn')->name('lesson_detail.learn')->middleware('web.user');
    Route::get('lesson/{lesson_id}/detail/{lesson_detail_id}/close', 'Lesson\LessonDetail\LessonDetail@getClose')->name('lesson_detail.close')->middleware('web.user');

    Route::get('payment/charge', 'Payment@getCharge')->name('payment.charge')->middleware('web.user');
    Route::post('payment/charge', 'Payment@postCharge')->middleware('web.user');

    Route::get('user/diamond/downgrade', 'User@getDowngrade')->name('user.downgrade')->middleware('web.user');
    Route::get('user/diamond/upgrade', 'User@getUpgrade')->name('user.upgrade')->middleware('web.user');
    Route::post('user/diamond/upgrade', 'User@postUpgrade')->middleware('web.user');

    Route::get('user/password', 'User@getChangePassword')->name('user.change_password')->middleware('web.user');
    Route::post('user/password', 'User@postChangePassword')->middleware('web.user');

    Route::get('logout', 'Auth\LoginController@getLogout')->name('logout')->middleware('web.user');
});

Route::get('affiliate', 'Page@getAffiliate')->name('affiliate');
