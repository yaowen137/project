@extends("User.public3")
@section('title','我的收藏')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/colstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
</div>
<hr/>

<div class="you-like">
	<div class="s-bar">
		我的收藏
	</div>
	<div class="s-content">
		@foreach ($collection_data as $val)
		<div class="s-item-wrap">
			<div class="s-item">

				<div class="s-pic">
					<a href="/utgoodsinfo/{{$val->id}}" class="s-pic-link">
						<img src="{{$val->pic}}" alt="{{$val->title}}" title="{{$val->title}}" class="s-pic-img s-guess-item-img">
					</a>
				</div>
				<div class="s-info">
					<div class="s-title"><a href="#" title="{{$val->title}}">{{$val->title}}</a></div>
					<div class="s-price-box">
						<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{sprintf("%.2f", $val->price)}}</em></span>
					</div>
					<div >
						<span class="s-sales">销量: {{$val->sell}}</span>
					</div>
				</div>
				<div class="s-tp">
					<a route="/ajaxshoppingcar/{{$val->id}}" class="ui-btn-loading-before add" ><font color="#fff">加入购物车</font></a>
					<i class="am-icon-shopping-cart"></i>
					<a route="/ajaxcollection/{{$val->id}}" class="ui-btn-loading-before buy del" ><font color="#fff">取消收藏</font></a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	</br>
	</br>
	<div class="s-bar">
		猜你喜欢
	</div>
	<div class="s-content">
		@foreach ($advert_data as $v)
		<div class="s-item-wrap">
			<div class="s-item">
				<div class="s-pic">
					<a href="{{$v->route}}" class="s-pic-link">
						<img src="{{$v->pic}}" class="s-pic-img s-guess-item-img">
					</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<script type="text/javascript">
	$('.del').click(function()
	{
		route = $(this).attr('route');
		div = $(this).parent().parent().parent();
		$.get(route,function(result)
		{
			if (result == 1) {
				div.remove();
			}
		})
	})
	$('.add').click(function()
	{
		route = $(this).attr('route');
		$.get(route);
		alert('添加成功！');
	})
</script>
@endsection