@extends("User.public3")
@section('title','填写评价')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/appstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>填写评价</small></div>
</div>
<hr/>

<div class="comment-main">
	<form action="/paddcomment" method="post">
	{{ csrf_field() }}
	<input type="hidden" id="num" name="score" value="1">
	<input type="hidden" name="gid" value="{{$goods_data->id}}">
	<input type="hidden" name="odid" value="{{$odid}}">
		<div class="comment-list">
			<div class="item-pic">
				<a href="/ugoodsinfo/" class="J_MakePoint">
					<img src="{{$goods_data->pic}}" class="itempic" width="100" height="100">
				</a>
			</div>

			<div class="item-title">

				
				<div class="item-info" style="display:inline-block;margin-left: 0px;">
					<div class="item-price" style="display:inline-block;">
						产品：<strong>{{$goods_data->title}}</strong><br/>
						价格：<strong>￥{{ sprintf("%.2f", $goods_data->price) }}</strong>
					</div>										
				</div>
			</div>
			<div class="clear"></div>
			<div class="item-comment">
				<textarea name="content" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
			</div>
			<div class="filePic">
			</div>
			<div class="item-opinion">
				<li><i class="op1 active" num="1"></i>好评</li>
				<li><i class="op2" num="2"></i>中评</li>
				<li><i class="op3" num="3"></i>差评</li>
			</div>
		</div>						
		<div class="info-btn">
			<input type="submit" class="am-btn am-btn-danger" value="发表评价">
		</div>	
	</form>						
		<script type="text/javascript">
			$(document).ready(function() {
				$(".comment-list .item-opinion li").click(function() {	
					$(this).prevAll().children('i').removeClass("active");
					$(this).nextAll().children('i').removeClass("active");
					$(this).children('i').addClass("active");
					$('#num').val($(this).children('i').attr('num'));
				});
		    })
		</script>					

</div>

@endsection