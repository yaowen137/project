@extends("User.public3")
@section('title','个人中心')
@section('css')
<link href="/static/User/css/vipstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('shoppingcar',$shoppingcar)
@section('content')
<div class="m-userinfo">
	<div class="m-baseinfo">
		<a class="m-pic" href="/puserinfo">
			<img src="{{$userinfo_data->pic}}">
		</a>
		<div class="m-info">
			<em class="s-name">{{session('user')->nicknamed}}</em>
			<div class="vip1"></div>
			<div class="safeText">
				<div class="progressBar"><span style="left: 0px;" class="progress"></span></div>
			</div>
			<div class="m-address">
				<a href="paddress" class="i-trigger">收货地址<i class="am-icon-angle-right" style="padding-left:5px ;"></i></a>
			</div>
		</div>
	</div>
	</div>
	<div class="box-container-bottom"></div>
	<div class="m-order">
	<div class="s-bar">
		<a href="/porder"><i class="s-icon"></i><font color="#678">我的订单</font></a>
	</div>
	<div class="orderContentBox">
	@if (isset($order_data[0]))
	@foreach ($order_data as $value)
	<div class="orderContent">
		<div class="orderContentpic">
			<div class="imgBox">
				<a href="/porderinfo/{{$value->id}}"><img src="{{$value->pic}}"></a>
			</div>
		</div>
		<div class="detailContent">
			<div class="orderID">
				<span class="num">订单号：{{$value->ordernum}}</span>
			</div>
		</div>
		<div class="detailContent">
			<div class="orderID">
				<span class="num">下单日期：{{date('Y-m-d', $value->addtime)}}</span>
			</div>
		</div>
		<div class="detailContent">
			<div class="orderID">
				<span class="num">共{{$value->num}}件商品</span>
			</div>
		</div>
		<div class="state">{{$value->status}}</div>
		<div class="price">¥{{sprintf("%.2f", $value->total)}}</div>
	</div>
	@endforeach
	@else
	<center><font color="#655a5b">暂无购买记录，快去<a href="/"><font color="red">购物</font></a>吧！</font></center>
	@endif
	</div>
</div>
<div data-am-widget="tabs" class="am-tabs collection">
    <ul class="am-tabs-nav am-cf">
    	<li class="am-active"><a href="[data-tab-panel-0]"><i class="am-icon-heart"></i>商品收藏</a></li>
    </ul>
    <div class="am-tabs-bd">
        <div data-tab-panel-0 class="am-tab-panel am-active">
    		<div class="am-slider am-slider-default am-slider-carousel" data-am-flexslider="{itemWidth:155,slideshow: false}">
    		@if (isset($collection_data))
				<ul class="am-slides">
				@foreach ($collection_data as $valuess)
                   <li>
                   	  <a><img class="am-thumbnail" src="{{$valuess->pic}}" /></a>
                   	  <strong class="price">¥{{sprintf("%.2f", $valuess->price)}}</strong>
                   </li>
				@endforeach
				</ul>
			@else

			<center><font color="#655a5b">暂无收藏商品，快去<a href="/"><font color="red">看看</font></a>吧！</font></center>

			@endif
			</div>
		</div>
	</div>
</div>
@endsection