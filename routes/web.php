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


// 登录中间件
Route::group(['middleware'=>'login'], function(){
	// 后台首页
	Route::get('/admin', function(){
		return view('Admin.index');
	});

	// 后台用户管理模块
	Route::resource('/auser', 'Admin\UserController');

	// 后台权限管理模块
	Route::resource('/aauthority', 'Admin\AuthorityController');

	// 后台商品管理模块
	Route::resource('/agoods', 'Admin\GoodsController');

	// 订单页路由
	Route::resource("/aorder", 'Admin\OrderController');

	// 广告模块路由
	Route::resource("/aadvert", "Admin\AdvertController");

	// 后台退出
	Route::get('/alogout', 'Admin\LoginController@logout');

	// 后台分类路由控制器
	Route::resource('/atype', 'Admin\TypeController');
	Route::get('/getcates', 'Admin\TypeController@getcates');
	// 后台查看子分类list
	Route::get('/atypelist', 'Admin\TypeController@list');
	// 后台分类列表ajax删除
	Route::get('atypedel', 'Admin\TypeController@del');

	// 后台链接管理
	Route::resource('/alink', 'Admin\LinkController');
	// 后面链接审批列表
	Route::get('/aapply', 'Admin\LinkController@apply');
	Route::get('/aapply/doadd/{id}', 'Admin\LinkController@doadd');
	Route::get('/aapply/del/{id}', 'Admin\LinkController@del');
});

// 后台登录路由
Route::resource('/alogin', 'Admin\LoginController');
Route::post('/dologin', 'Admin\LoginController@dologin');


// JS三级联动
Route::get('/jstype', 'Admin\JsController@jstype');


// 广告动态
Route::get('/jsadvert', 'Admin\JsController@jsadvert');