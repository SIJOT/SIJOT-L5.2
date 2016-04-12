<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/**
 * API routes
 */
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    Route::delete('rental/{id}', 'rentalApiController@delete')->name('api.rental.destroy');
    Route::post('rental/create', 'rentalApiController@insert')->name('api.rental.insert');
    Route::put('rental/{id}', 'rentalApiController@edit')->name('api.rental.update');
    Route::get('rental', 'rentalApiController@index')->name('api.rental.index');
    Route::get('rental/{id}', 'rentalApiController@specific')->name('api.rental.specific');
});

Route::group(['middleware' => 'web'], function () {

    /**
     * Frontend routes.
     */
    Route::auth();
    Route::get('/', 'HomeController@Front')->name('home');
    Route::get('/home', 'HomeController@index')->name('backend.home');

    Route::get('verhuur', 'RentalController@indexFront')->name('rental.index');
    Route::get('verhuur/aanvraag', 'RentalController@insertFront')->name('rental.request');
    Route::get('verhuur/bereikbaarheid', 'RentalController@domainAccess')->name('rental.access');
    Route::get('verhuur/kalender', 'RentalController@calendar')->name('rental.calendar');
    Route::post('rental/insert', 'RentalController@store')->name('rental.store');

    Route::get('takken', 'TakkenController@overview')->name('takken.index');
    Route::get('tak/{id}', 'TakkenController@group')->name('takken.specific');

    /**
     * Backend routes
     */
    Route::group(['prefix' => 'mailing'], function() {
        Route::get('/', 'MailingController@index')->name('mailing.index');
        Route::post('/insert', 'MailingController@insert')->name('mailing.insert');
        Route::get('/delete/{id}', 'MailingController@deleteUser')->name('mailing.destroy');
    });

    /**
     * Profile routes.
     */
    Route::group(['prefix' => 'profile/'], function() {
        Route::get('edit', 'EditProfileController@view')->name('profile.edit.view');
        Route::post('insert', 'EditProfileController@editInfo')->name('profile.edit.insert');
        Route::post('permission/{id}', 'EditProfileController@editGroups')->name('profile.edit.perms');
    });

    /**
     * Mailing routes.
     */
    Route::group(['prefix' => 'mailing/'], function() {
        Route::get('/', 'MailingController@index')->name('mailing.index');
        Route::get('/insert', 'MailingController@insert')->name('mailing.insert');
        Route::get('/mail/{id}', 'MailingController@mail')->name('mailing.mail');
        Route::get('/update/{id}', 'MailingController@edit')->name('mailing.update');
        Route::get('/delete/{id}', 'MailingController@deleteUser')->name('mailing.destroy');
    });

    /**
     * Takken routes - backend.
     */
    Route::group(['prefix' => 'backend/groups'], function () {
        Route::get('view', 'TakkenBackendController@view')->name('backend.groups.view');
    });

    /**
     * Notification routes.
     */
    Route::group(['prefix' => 'notifications/'], function() {
        Route::get('/', 'NotificationsController@index')->name('notification');
        Route::post('/update', 'NotificationsController@update')->name('notification.update');
    });

    /**
     * Backend user management.
     */
    Route::group(['prefix' => 'backend/users/'], function () {
        Route::get('insert', 'UserController@insert')->name('backend.users.insert');
        Route::post('store', 'UserController@store')->name('backend.users.store');
        Route::get('overview', 'UserController@index')->name('backend.users.overview');
        Route::get('block/{id}', 'UserController@block')->name('backend.users.block');
        Route::get('unblock/{id}', 'UserController@unblock')->name('backend.users.unblock');
        Route::get('delete/{id}', 'UserController@destroy')->name('backend.users.destroy');
    });

    /**
     * Backend rental routes.
     */
    Route::group(['prefix' => 'backend/rental/'], function () {
        Route::get('overview/{type}', 'RentalController@indexAdmin')->name('backend.rental.overview');
        Route::get('destroy/{id}', 'RentalController@destroy')->name('backend.rental.destroy');
        Route::get('option/{id}', 'RentalController@option')->name('backend.rental.option');
        Route::get('confirm/{id}', 'RentalController@confirmed')->name('backend.rental.confirm');
        Route::get('insert', 'RentalController@insert')->name('backend.rental.insert');
        Route::get('download', 'RentalController@download')->name('backend.rental.download');
    });

});
