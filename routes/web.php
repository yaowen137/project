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
Route::get('/',function(){
    //加载模板
    return view('welcome');
});
// 后台首页
Route::get('/admin',function(){
	return view('Admin.index');
});

// 后台用户管理模块
Route::resource('/auser', 'Admin\UserController');

// 后台权限管理模块
Route::resource('/aauthority', 'Admin\AuthorityController');

// 后台商品管理模块
Route::resource('/agoods', 'Admin\GoodsController');

// 后台退出
Route::get('/alogout', 'Admin\LoginController@logout');

// JS三级联动
Route::get('/jstype','Admin\JstypeController@jstype');