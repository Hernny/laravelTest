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
Route::get('/', 'UserController@ShowForm');
Route::get('success', 'UserController@ShowValidate');
Route::post('register','UserController@register');
Route::post('validate','UserController@validatepin');