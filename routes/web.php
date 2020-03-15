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

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
