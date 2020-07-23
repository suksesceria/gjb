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
Route::get('home/getNotif', 'HomeController@getNotif')->name('home.getNotif');
Route::get('home/getSemuaNotif', 'HomeController@getSemuaNotif')->name('home.getSemuaNotif');
Route::get('home/count', 'HomeController@count')->name('home.count');
// Route::get('test', function () {
//     // event(new App\Events\StatusLiked('Someone'));
//     event(new App\Events\MyEvent('Dawi'));
//     return "Event has been sent!";
// });

Route::group(['prefix' => 'storages'], function () {
    Route::get('/{path}', 'StorageController@get')->name('storage-get')->where('path', '.*');
});

Route::get('/testnotif', 'AdminController@testNotif')->name('test');
Route::group(['middleware' => ['auth', 'access_role']], function () {

    Route::get('/', 'AdminController@dashboard')->name('home-dashboard');
    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectController@index')->name('projects');
        Route::get('/{id}/progress', 'ProjectController@showProgress')->name('projects');
        Route::post('/{id}/progress', 'ProjectController@storeProgress')->name('projects');
        Route::post('/{id}/progress/update', 'ProjectController@updateProgress')->name('projects');
        Route::get('/{id}/progress/{progress_id}/delete', 'ProjectController@deleteProgress')->name('projects');
        Route::get('/{id}/detail-keuangan', 'ProjectController@showDetailFinance')->name('projects');
        Route::get('/{id}/keuangan', 'ProjectController@showFinance')->name('projects');
        Route::get('/{id}/{s}/{p}/verify', 'ProjectController@updateStatusFinance')->name('projects');
        Route::post('/{id}/keuangan', 'ProjectController@storeFinance')->name('projects');
        Route::get('/{id}/keuangan-nyata', 'ProjectController@showFinanceRealtime')->name('projects');
        Route::post('/{id}/keuangan-nyata', 'ProjectController@storeFinanceRealtime')->name('projects');
        Route::get('/{id}/detail-realtime', 'ProjectController@showDetailRealtime')->name('projects');
        Route::get('/{id}/{s}/{p}/verify-realtime', 'ProjectController@updateStatusRealtime')->name('projects');
        Route::get('/{id}/laporan-material', 'ProjectController@showMaterial')->name('projects');
        Route::get('/{id}/detail-material', 'ProjectController@showDetailMaterial')->name('projects');
        Route::get('/{id}/{s}/{p}/verify-material', 'ProjectController@updateStatusMaterial')->name('projects');
        Route::post('/{id}/laporan-material', 'ProjectController@storeMaterial')->name('projects');
        Route::get('/{id}/dokumen-pendukung', 'ProjectController@showAdditionalDocument')->name('projects');
        Route::post('/{id}/dokumen-pendukung', 'ProjectController@storeAdditionalDocument')->name('projects');
        Route::get('/{id}/dokumen-pendukung/{idSupportingDoc}/delete', 'ProjectController@deleteAdditionalDocument')->name('projects');
        Route::get('/tambah-projek', 'ProjectController@addProject')->name('projects');
        Route::post('/tambah-projek', 'ProjectController@storeProject')->name('projects');
        Route::get('/edit-projek/{id}', 'ProjectController@editProject')->name('projects');
        Route::post('/edit-projek/{id}', 'ProjectController@updateProject')->name('projects');
    });

    Route::group(['prefix' => 'material-type'], function() {
        Route::get('/', 'MaterialTypeController@index')->name('material-type');
        Route::post('/', 'MaterialTypeController@store')->name('material-type');
        Route::delete('/', 'MaterialTypeController@delete')->name('material-type');
        Route::put('/', 'MaterialTypeController@update')->name('material-type');
    });

    Route::group(['prefix' => 'material-unit'], function() {
        Route::get('/', 'MaterialUnitController@index')->name('material-unit');
        Route::post('/', 'MaterialUnitController@store')->name('material-unit');
        Route::delete('/', 'MaterialUnitController@delete')->name('material-unit');
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

