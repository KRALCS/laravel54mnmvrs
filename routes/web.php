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

//Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@loginPost');
Route::get('/', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
    Route::get('auth/logout', 'UserController@logout');
});

Route::get('/brands/{id?}', 'BrandsController@index');
Route::get('/colors/{id?}', 'ColorsController@index');
Route::get('/models/{id?}', 'ModelsController@index');
Route::get('/vtypes/{id?}', 'VtypesController@index');
Route::get('/vechileadd', 'VechilesController@vechileAdd');
Route::get('/vechile', 'VechilesController@vechileList');
Route::get('/vechiles/{id?}', 'VechilesController@index');

Route::post('/vechiles', 'VechilesController@store');
Route::post('/vechiles/{id}', 'VechilesController@update');
Route::post('/vechiles/d/{id}/{token}', 'VechilesController@destroy');
