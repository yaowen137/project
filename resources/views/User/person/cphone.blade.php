@extends("User.public3")
@section('title','更改手机')
@section('shoppingcar',$shoppingcar)
@section('content')
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户设置</strong> / <small>更改手机</small></div>
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
		<span class="step-1 step">
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
<form class="am-form am-form-horizontal" action="/pchangephone" method="post">
{{ csrf_field() }}
	<div class="am-form-group">
		<label for="user-new-phone" class="am-form-label">验证手机</label>
		<div class="am-form-content">
			<input type="tel" id="user-new-phone" name="phone" placeholder="绑定新手机号">
		</div>
	</div>
	<div class="am-form-group code">
		<label for="user-new-code" class="am-form-label">验证码</label>
		<div class="am-form-content">
			<input type="code" id="user-new-code" name="code" placeholder="短信验证码">
		</div>
		<a class="btn">
			<div class="am-btn am-btn-danger" id="sendMobileCode">验证码</div>
		</a>
	</div>
	<div class="info-btn">
		<input type="submit" class="am-btn am-btn-danger" value="绑定" >
	</div>
</form>
<script type="text/javascript">
	$('#sendMobileCode').click(function(){
		$(this).parent().attr('disable', 'true');
		tel = $('#user-new-phone').val();
		console.log(tel);
		$.get('/pcpcode', {tel:tel});
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