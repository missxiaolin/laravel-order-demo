<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 查询用户（测试）
Route::any('/user/info', 'UserController@info')->name('user.info');
//
Route::any('/order/list', 'OrderController@orderList')->name('order.list');