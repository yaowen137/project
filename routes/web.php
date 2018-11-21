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


//前台首页路由
Route::resource("/","Home\IndexController");
//人气商品路由
Route::get("/ubuzz","Home\IndexController@ubuzz");
//新品上市路由
Route::get("/unew","Home\IndexController@unew");
//限时发售路由
Route::get("/ulimit","Home\IndexController@ulimit");
//尊享产品路由
Route::get("/uexpensive","Home\IndexController@uexpensive");
//轮播和分类商品列表
Route::get("/utgoodslist/{id}","Home\IndexController@utgoodslist");
//搜索列表页
Route::get("/goodslist","Home\IndexController@goodslist");

//商品详情
Route::get("/ugoodsinfo/{id}","Home\IndexController@ugoodsinfo");

//ajax分页路由
Route::get("/ajaxpag/{id}","Home\IndexController@ajaxpag");

//立即购买路由
Route::get("/buy/{id}","Home\IndexController@buy");
//添加购物车路由
Route::get("/shoppingcar/{id}","Home\IndexController@shoppingcar");
//收藏
Route::get("/coll/{id}","Home\IndexController@coll");
//收藏添加
Route::resource("/addcoll","Home\IndexController");


//友情链接申请
Route::get("links","Home\IndexController@links");




