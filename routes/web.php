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
// 主页面

//订单页路由
Route::resource("/aorder",'Admin\OrderController');
//广告模块路由
Route::resource("/aadvert","Admin\AdvertController");







