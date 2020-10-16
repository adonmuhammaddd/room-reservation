<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth'
], function() {
    Route::post('login', 'AuthController@login');
    Route::post('refresh', 'AuthController@refresh');
});

Route::get('/', 'AuthController@index');

Route::get('/room', 'RoomController@index');

Route::get('/booking', 'BookingRoomController@index');

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('is_admin');
Route::get('/user', 'BookingRoomController@index')->name('user')->middleware('is_admin');