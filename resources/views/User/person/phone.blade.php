@extends("User.public3")
@section('title','验证手机')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/stepstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户设置</strong> / <small>验证手机</small></div>
</div>
<hr/>
<!--进度条-->
<div class="m-progress">
	<div class="m-progress-list">
		<span class="step-1	 step">
            <em class="u-progress-stage-bg"></em>
            <i class="u-stage-icon-inner">1<em class="bg"></em></i>
            <p class="stage-name">验证信息</p>
        </span>
		<span class="step-2 step">
            <em class="u-progress-stage-bg"></em>
            <i class="u-stage-icon-inner">2<em class="bg"></em></i>
            <p class="stage-name">更改手机</p>
        </span>
		<span class="u-progress-placeholder"></span>
	</div>
	<div class="u-progress-bar total-steps-2">
		<div class="u-progress-bar-inner"></div>
	</div>
</div>
<form class="am-form am-form-horizontal" action="/pvrfcode" method="post">
{{ csrf_field() }}
	<div class="am-form-group bind">
		<label for="user-phone" class="am-form-label phone">验证手机</label>
		<label for="user-phone" class="am-form-label pwd" style="display:none">验证密码</label>
		<div class="am-form-content">
			<span id="user-phone" class="phone">{{$phone}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="am-btn am-btn-danger" id="vrf">使用密码验证</div>
		</div>
	</div>
	<div class="am-form-group code">
		<label for="user-code" class="am-form-label phone">验证码</label>
		<div class="am-form-content phone">
			<input type="code" id="user-code" name="code" placeholder="短信验证码">
		</div>
		<a class="btn phone">
			<div class="am-btn am-btn-danger" id="sendMobileCode">验证码</div>
		</a>
		<label for="user-old-password" class="am-form-label pwd" style="display:none">原密码</label>
		<div class="am-form-content pwd" style="display:none">
			<input type="password" id="user-code" name="password" placeholder="请输入原登录密码">
		</div>
	</div>
	<div class="info-btn">
		<input type="submit" class="am-btn am-btn-danger" value="验证" >
	</div>
</form>
<script type="text/javascript">
	$('#vrf').click(function()
	{	
		if ($(this).html() == '使用密码验证') {
			$(this).html('使用手机验证');
			$('.pwd').css('display', 'block');
			$('.phone').css('display', 'none');
		} else {
			$(this).html('使用密码验证');
			$('.phone').css('display', 'block');
			$('.pwd').css('display', 'none');
			$('#user-phone').css('display', 'inline-block');
		}
	});
	$('#sendMobileCode').click(function(){
		$(this).parent().attr('disable', 'true');
		$.get('/pcode');
		num = 60;
		timeer = setInterval(function()
		{	
			$('#sendMobileCode').html('（'+num+'秒）后重新发送');
			num--;
			if (num < 0) {
				clearInterval(timeer);
				$('#sendMobileCode').html('重新发送').parent().attr('disable', 'false');
			}
		},1000)
	});
</script>
@endsection