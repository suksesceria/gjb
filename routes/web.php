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


/**
 * Auth login
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([], function () {

    Route::get('/', 'AdminController@dashboard');

    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectController@index');
        Route::get('/{id}/progress', 'ProjectController@showProgress');
        Route::get('/{id}/keuangan', 'ProjectController@showFinance');
        Route::get('/{id}/dokumen-pendukung', 'ProjectController@showAdditionalDocument');
    });

    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', 'EmployeeController@index');
    });

    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', 'RoleController@index');
    });

});

