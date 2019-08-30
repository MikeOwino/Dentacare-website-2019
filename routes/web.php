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

    Route::get('/withdraw-dentacare-dcn', 'WithdrawDentacareDCNController@getView')->name('withdraw-dentacare-dcn');

    Route::get('/confirm/{token}', 'WithdrawDentacareDCNController@confirmAccount')->name('confirm-dentacare-account');

    Route::post('/submit-withdraw-dentacare-dcn', 'WithdrawDentacareDCNController@dentacareWithdraw')->name('submit-withdraw-dentacare-dcn');

    Route::get('/user-logout', 'UserController@userLogout')->name('user-logout');

    Route::post('/authenticate-dentacare-user', 'WithdrawDentacareDCNController@authenticate')->name('authenticate-dentacare-user');

    Route::post('/dentist-login', 'UserController@dentistLogin')->name('dentist-login');

    Route::post('/dentist-register', 'UserController@dentistRegister')->name('dentist-register');

    Route::post('/patient-login', 'UserController@patientLogin')->name('patient-login');

    Route::get('/forgotten-password', 'UserController@getForgottenPasswordView')->name('forgotten-password');

    Route::post('/password-recover', 'UserController@getRecoverPassword')->name('password-recover');

    Route::post('/forgotten-password-submit', 'UserController@forgottenPasswordSubmit')->name('forgotten-password-submit');

    Route::post('/password-recover-submit', 'UserController@changePasswordSubmit')->name('password-recover-submit');

    Route::post('/enrich-profile', 'UserController@enrichProfile')->name('enrich-profile');

    Route::post('/invite-your-clinic', 'UserController@inviteYourClinic')->name('invite-your-clinic');

    Route::post('/check-dentist-account', 'UserController@checkDentistAccount')->name('check-dentist-account');

    Route::post('/check-email', 'UserController@checkEmail')->name('check-email');

    Route::post('/check-captcha', 'UserController@checkCaptcha')->name('check-captcha');

    Route::get('/custom-cookie', 'UserController@manageCustomCookie')->name('custom-cookie');

});