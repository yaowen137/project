@extends("User.public3")
@section('title','地址修改')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/addstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>地址修改</small></div>
</div>
<div class="clear"></div>
<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">修改地址</a>
<!--例子-->
<div class="am-modal am-modal-no-btn" id="doc-modal-1">

	<div class="add-dress">

		
		<hr/>

		<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
			<form action="/paddress/{{$address_data->id}}" method="post" class="am-form am-form-horizontal">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type="hidden" name="address" value="{{$address}}"/>
				<div class="am-form-group">
					<label for="user-name" class="am-form-label">收货人</label>
					<div class="am-form-content">
						<input type="text" id="user-name" name="name" value="{{$address_data->name}}" placeholder="收货人">
					</div>
				</div>

				<div class="am-form-group">
					<label for="user-phone" class="am-form-label">手机号码</label>
					<div class="am-form-content">
						<input id="user-phone" placeholder="手机号必填" name="phone" value="{{$address_data->phone}}" type="text">
					</div>
				</div>
				<div class="am-form-group">
					<label for="user-address" class="am-form-label">所在地</label>
					<div class="am-form-content address">
						<h3>{{$address}}</h2>
					</div>
				</div>

				<div class="am-form-group">
					<label for="user-intro" class="am-form-label">详细地址</label>
					<div class="am-form-content">
						<textarea class="" name="last" rows="3" id="user-intro" placeholder="输入详细地址">{{$last}}</textarea>
						
					</div>
				</div>

				<div class="am-form-group">
					<div class="am-u-sm-9 am-u-sm-push-3">
						<input type="submit" class="am-btn am-btn-danger" value="修改" onclick="return false">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	// 显示隐藏部分
	$(document).ready(function() {							
		$(".new-option-r").click(function() {
			$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
		});
		
		var $ww = $(window).width();
		if($ww>0) {
			$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
		}
	})

	// 判断客户是否已填写左右信息
	setInterval(function()
	{
		// 判断其他输入框是否已填写
		if ($('#user-intro').val() != '' && $('#user-name').val() != '' && $('#user-phone').val() != '') {
			// submit变为可用
			$('input:submit').attr('onclick', 'return true');
		} else {
			// submit变为不可用
			$('input:submit').attr('onclick', 'return false');
		}
	},300)
</script>
@endsection