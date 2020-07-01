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

Route::redirect('home', '/');

Route::group(['prefix' => 'projects'], function() {
    Route::get('/{id}/progress', 'ProjectController@showProgress');
    Route::get('/{id}/keuangan', 'ProjectController@showFinance');
    Route::get('/{id}/dokumen-pendukung', 'ProjectController@showAdditionalDocument');
    Route::get('/tambah-projek', 'ProjectController@addProject');
});

Route::group(['middleware' => ['auth', 'access_role']], function () {

    Route::get('/', 'AdminController@dashboard');

    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectController@index');
    });

    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', 'EmployeeController@index');
        Route::post('/', 'EmployeeController@store');
        Route::delete('/', 'EmployeeController@destroy');
        Route::put('/', 'EmployeeController@update');
    });

    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', 'RoleController@index');
        Route::post('/', 'RoleController@store');
        Route::delete('/', 'RoleController@destroy');
        Route::put('/', 'RoleController@update');
    });

    Route::group(['prefix' => 'type-proyek'], function() {
       Route::get('/', 'ProjectTypeController@index');
       Route::post('/', 'ProjectTypeController@store');
       Route::put('/', 'ProjectTypeController@update');
       Route::delete('/', 'ProjectTypeController@delete');
    });

});

