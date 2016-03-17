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
    Route::auth();
    Route::get('/home', 'HomeController@index')->name('backend.home');

    // Rental routes
    Route::post('rental/insert', 'rentalController@store')->name('rental.store');

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
    });

});
