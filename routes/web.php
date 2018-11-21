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

// 个人中心路由=======================================》

// 个人中心首页
Route::get('/pindex', 'User\PersonController@pindex');

// 个人信息
Route::get('/puserinfo', 'User\PersonController@puserinfo');

// 更新个人信息
Route::post('/doinfoupdate', 'User\PersonController@doinfoupdate');

// AJAX修改昵称
Route::get('/pupdatenickname', 'User\PersonController@pupdatenickname');

// 安全设置
Route::get('/psecurity', 'User\PersonController@psecurity');

// 修改密码
Route::get('/ppassword', 'User\PersonController@ppassword');

// 执行修改密码
Route::post('/repassword', 'User\PersonController@repassword');

// 注销账户
Route::get('/punsetuser', 'User\PersonController@punsetuser');

// 验证更改手机
Route::get('/pphone', 'User\PersonController@pphone');

// 手机验证码ajax
Route::get('/pcode', 'User\PersonController@pcode');

// 检验验证码或密码
Route::post('/pvrfcode', 'User\PersonController@pvrfcode');

// 更改手机
Route::get('/pcphone', 'User\PersonController@pcphone');

// 绑定手机验证码ajax
Route::get('/pcpcode', 'User\PersonController@pcpcode');

// 操作更换手机
Route::post('/pchangephone', 'User\PersonController@pchangephone');

// 地址管理手机
Route::resource('/paddress', 'User\AddressController');

// ajax地址三级联动
Route::get('/addressajax', 'User\PersonController@addressajax');

// 我的收藏首页
Route::get('/pcollection', 'User\PersonController@pcollection');

// ajax删除收藏
Route::get('/ajaxcollection/{id}', 'User\PersonController@ajaxcollection');

// ajax收藏加入购物车
Route::get('/ajaxshoppingcar/{id}', 'User\PersonController@ajaxshoppingcar');

//订单管理页面
Route::get('/porder', 'User\PersonController@porder');

// 订单详情页面
Route::get('/porderinfo/{id}', 'User\PersonController@porderinfo');


// 关闭订单
Route::get('/pclose/{id}', 'User\PersonController@pclose');


// 确认收货
Route::get('/pconfirm/{id}', 'User\PersonController@pconfirm');

// 填写评价
Route::get('/pcomment/{id}', 'User\PersonController@pcomment');

// 处理评价
Route::post('/paddcomment', 'User\PersonController@paddcomment');

// 评价记录
Route::get('/precord', 'User\PersonController@precord');
// 个人中心路由=======================================》