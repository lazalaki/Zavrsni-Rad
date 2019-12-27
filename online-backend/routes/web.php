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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/shops', 'ShopsController@index');
Route::get('/api/users', 'UsersController@index');
Route::get('/api/managers', 'ManagersController@index');
Route::post('/api/login', 'LoginController@store');
Route::post('/api/registration', 'RegisterController@store');
Route::post('/api/shops/create', 'ShopsController@store');
Route::post('/api/managers/create', 'ManagersController@store');
Route::get('/api/managers/without-shop', 'ManagersController@managersWithoutShop');
Route::get('/api/shops/{id}', 'ShopsController@shopById');
Route::get('api/managers/{id}', 'ManagersController@show');
