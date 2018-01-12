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
// 获取订单列表
Route::any('/order/list', 'OrderController@orderList')->name('order.list');
// 获取订单列表（with测试）
Route::any('/order/with/list', 'OrderController@lists')->name('order.with.list');