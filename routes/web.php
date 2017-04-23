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

Route::get('/','HomeController@index');

Auth::routes();

//用户个人信息路由:
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function (){
    Route::resource('/selfInfo', 'Auth\UserControllers\SelfInformationController');
});

//综合管理路由：
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
    Route::get('/users/trash', 'Auth\UserControllers\UsersTrashController@index');
    Route::post('/users/trash/{id}', 'Auth\UserControllers\UsersTrashController@store');
    Route::delete('/users/trash/{id}', 'Auth\UserControllers\UsersTrashController@destroy');
    Route::resource('/users', 'Auth\UserControllers\UsersController');
    Route::get('/permissions/{id}/edit', 'Auth\UserControllers\PermissionsController@update')->name('perms.edit');
    Route::patch('/permissions/{id}', 'Auth\UserControllers\PermissionsController@update')->name('perms.update');
    Route::resource('/roles', 'Auth\UserControllers\RolesController');
});