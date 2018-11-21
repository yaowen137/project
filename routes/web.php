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



//前台中间件
Route::group(['middleware'=>'ulogin'], function(){
	
	});

//前台注册
Route::resource('/register', 'User\RegisterController');
//前台获取注册验证码
Route::get('/registercode','User\RegisterController@getCode');
//前台ajax验证校验码
Route::get('/codecheck','User\RegisterController@check');
//前台ajax验证注册用户名
Route::get('/namecheck','User\RegisterController@namecheck');
//前台ajax验证注册手机号码
Route::get('/phonecheck','User\RegisterController@phonecheck');
//前台登录
Route::resource('/ulogin','User\UloginController');
//前台退出登录
Route::resource('/ulogout','User\UloginController@logout');
//前台通过手机号找回密码
Route::get('/forget','User\UloginController@forget');
//处理手机号与验证码
Route::post('/doforget','User\UloginController@doforget');
//重置密码
Route::post('/dofind','User\UloginController@dofind');

//购物车页面
Route::get('/ushoppingcar','User\UshopcarController@index');
//ajax增加数量
Route::get('/ajaxcaradd','User\UshopcarController@ajaxadd');
//ajax减少数量
Route::get('/ajaxcarsubtract','User\UshopcarController@ajaxsubtract');
//ajax删除购物车
Route::get('/ajaxdel','User\UshopcarController@ajaxdel');
//删除全部
Route::get('/alldel','User\UshopcarController@alldel');

//前台处理订单页面
Route::post('/uorderadd','User\UorderController@makeorder');
//前台处理立即购买页面
Route::get('/onlygoods/{id}','User\UorderController@onlygoods');
//前台购买后订单详情页面
Route::post('/orderdetail','User\UorderController@show');
//前台支付方法
Route::post('/pays','User\UorderController@pays');
//支付成功跳转页面
Route::get('/success','User\UorderController@success');



