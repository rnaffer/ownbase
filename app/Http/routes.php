<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        // Users
        Route::resource('users', 'UserAPIController', ['only' => [
            'index', 'store', 'show', 'destroy', 'update'
        ]]);
        // Roles
        Route::resource('roles', 'RoleAPIController', ['only' => [
            'index', 'store', 'show', 'destroy', 'update'
        ]]);
        // Modules
        Route::resource('modules', 'ModuleAPIController', ['only' => [
            'index', 'store', 'show', 'destroy', 'update'
        ]]);
        // Permissions
        Route::resource('permissions', 'PermissionAPIController', ['only' => [
            'index', 'store', 'show', 'destroy', 'update'
        ]]);
        // Companies
        Route::resource('companies', 'CompanyAPIController', ['only' => [
            'index', 'store', 'show', 'destroy', 'update'
        ]]);
    });
});
