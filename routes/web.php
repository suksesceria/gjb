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

Route::group(['middleware' => ['auth', 'access_role']], function () {

    Route::get('/', 'AdminController@dashboard')->name('home-dashboard');

    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectController@index')->name('projects');
        Route::get('/{id}/progress', 'ProjectController@showProgress')->name('projects');
        Route::get('/{id}/keuangan', 'ProjectController@showFinance')->name('projects');
        Route::get('/{id}/keuangan-nyata', 'ProjectController@showFinance')->name('projects');
        Route::get('/{id}/laporan-material', 'MaterialReportController@index')->name('projects');
        Route::get('/{id}/dokumen-pendukung', 'ProjectController@showAdditionalDocument')->name('projects');
        Route::get('/tambah-projek', 'ProjectController@addProject')->name('projects');
    });

    Route::group(['prefix' => 'material-type'], function() {
        Route::get('/', 'MaterialTypeController@index')->name('material-type');
        Route::post('/', 'MaterialTypeController@store')->name('material-type');
        Route::delete('/', 'MaterialTypeController@destroy')->name('material-type');
        Route::put('/', 'MaterialTypeController@update')->name('material-type');
    });

    Route::group(['prefix' => 'material-unit'], function() {
        Route::get('/', 'MaterialUnitController@index')->name('material-unit');
        Route::post('/', 'MaterialUnitController@store')->name('material-unit');
        Route::delete('/', 'MaterialUnitController@destroy')->name('material-unit');
        Route::put('/', 'MaterialUnitController@update')->name('material-unit');
    });

    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', 'EmployeeController@index')->name('employees');
        Route::post('/', 'EmployeeController@store')->name('employees');
        Route::delete('/', 'EmployeeController@destroy')->name('employees');
        Route::put('/', 'EmployeeController@update')->name('employees');
    });

    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', 'RoleController@index')->name('roles');
        Route::post('/', 'RoleController@store')->name('roles');
        Route::delete('/', 'RoleController@destroy')->name('roles');
        Route::put('/', 'RoleController@update')->name('roles');
    });

    Route::group(['prefix' => 'type-proyek'], function() {
       Route::get('/', 'ProjectTypeController@index')->name('type-proyek');
       Route::post('/', 'ProjectTypeController@store')->name('type-proyek');
       Route::put('/', 'ProjectTypeController@update')->name('type-proyek');
       Route::delete('/', 'ProjectTypeController@delete')->name('type-proyek');
    });

});

