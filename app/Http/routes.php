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
Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {

    /**
     * Frontend routes.
     */
    Route::auth();
    Route::get('/', 'HomeController@Front')->name('home');
    Route::get('/home', 'HomeController@index')->name('backend.home');

    Route::get('verhuur', 'rentalController@indexFront')->name('rental.index');
    Route::get('verhuur/aanvraag', 'rentalController@insertFront')->name('rental.request');
    Route::get('verhuur/bereikbaarheid', 'rentalController@domainAccess')->name('rental.access');
    Route::get('verhuur/kalender', 'rentalController@calendar')->name('rental.calendar');
    Route::post('rental/insert', 'rentalController@store')->name('rental.store');

    Route::get('takken', 'takkenController@overview')->name('takken.index');
    Route::get('tak/{id}', 'takkenController@group')->name('takken.specific');

    /**
     * Backend routes
     */
    Route::group(['prefix' => 'mailing'], function() {
        Route::get('/', 'mailingController@index')->name('mailing.index');
        Route::get('/delete/{id}', 'mailingController@deleteUser')->name('mailing.destroy');
    });

    Route::group(['prefix' => 'profile/'], function() {
        Route::get('edit', 'editProfileController@view')->name('profile.edit.view');
        Route::post('insert', 'editProfileController@editInfo')->name('profile.edit.insert');
        Route::post('permission/{id}', 'editProfileController@editGroups')->name('profile.edit.perms');
    });

    Route::group(['prefix' => 'backend/groups'], function () {
        Route::get('view', 'takkenBackendController@view')->name('backend.groups.view');
    });

    Route::group(['prefix' => 'notifications/'], function() {
        Route::get('/', 'notificationsController@index')->name('notification');
        Route::post('/update', 'notificationsController@update')->name('notification.update');
    });

    Route::group(['prefix' => 'backend/users/'], function () {
        Route::get('insert', 'userController@insert')->name('backend.users.insert');
        Route::post('store', 'userController@store')->name('backend.users.store');
        Route::get('overview', 'userController@index')->name('backend.users.overview');
        Route::get('block/{id}', 'userController@block')->name('backend.users.block');
        Route::get('unblock/{id}', 'userController@unblock')->name('backend.users.unblock');
        Route::get('delete/{id}', 'userController@destroy')->name('backend.users.destroy');
    });

    Route::group(['prefix' => 'backend/rental/'], function () {
        Route::get('overview/{type}', 'rentalController@indexAdmin')->name('backend.rental.overview');
        Route::get('destroy/{id}', 'rentalController@destroy')->name('backend.rental.destroy');
        Route::get('option/{id}', 'rentalController@option')->name('backend.rental.option');
        Route::get('confirm/{id}', 'rentalController@confirmed')->name('backend.rental.confirm');
        Route::get('insert', 'rentalController@insert')->name('backend.rental.insert');
        Route::get('download', 'rentalController@download')->name('backend.rental.download');
    });

});
