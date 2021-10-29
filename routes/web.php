<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

//Route::get('/refresh-captcha', 'Controller@refreshCaptcha')->name('refresh-captcha');

Route::group(['prefix' => '/', 'middleware' => 'frontEndMiddleware'], function () {

    //======================================= PAGES ========================================

    Route::get('/', 'PagesController@getPageView')->name('home');

    Route::get('/withdraw-dentacare-dcn', 'DentacareDCNController@getView')->name('withdraw-dentacare-dcn');

    Route::get('/confirm/{token}', 'DentacareDCNController@confirmAccount')->name('confirm-dentacare-account');

    Route::post('/submit-withdraw-dentacare-dcn', 'DentacareDCNController@dentacareWithdraw')->name('submit-withdraw-dentacare-dcn');

    Route::get('/dentacare-password-reset/{token?}', 'DentacareDCNController@getPasswordResetView')->name('dentacare-password-reset');

    Route::post('/submit-dentacare-password-reset/{token}', 'DentacareDCNController@submitPasswordReset')->name('submit-dentacare-password-reset');

    Route::post('/authenticate-dentacare-user', 'DentacareDCNController@authenticate')->name('authenticate-dentacare-user');

    Route::post('/social-authenticate-dentacare-user', 'DentacareDCNController@socialAuthenticate')->name('social-authenticate-dentacare-user');

    Route::get('/sitemap', 'Controller@getSitemap')->name('sitemap');

    Route::post('/double-check-dentacare-transaction', 'DentacareDCNController@doubleCheckDentacareTransaction')->name('double-check-dentacare-transaction');

    Route::any('/info/{slug}', 'Controller@handleApiEndpoints')->name('api-endpoints');
});