@extends("User.public3")
@section('title','修改密码')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/stepstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<script src="/static/js/jquery-1.8.3.min.js"></script>
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户设置</strong> / <small>修改密码</small></div>
</div>
<hr/>
<!--进度条-->
<div class="m-progress">
	<div class="m-progress-list">
		<span class="step-1 step">
            <em class="u-progress-stage-bg"></em>
            <i class="u-stage-icon-inner">1<em class="bg"></em></i>
            <p class="stage-name">重置密码</p>
        </span>
		<span class="step-2 step">
            <em class="u-progress-stage-bg"></em>
            <i class="u-stage-icon-inner">2<em class="bg"></em></i>
            <p class="stage-name">完成</p>
        </span>
		<span class="u-progress-placeholder"></span>
	</div>
	<div class="u-progress-bar total-steps-2">
		<div class="u-progress-bar-inner"></div>
	</div>
</div>
<form class="am-form am-form-horizontal" action="/repassword" method="post">
{{ csrf_field() }}
	<div class="am-form-group">
		<label for="user-old-password" class="am-form-label">原密码</label>
		<div class="am-form-content">
			<input type="password" id="user-old-password" name="opwd" placeholder="请输入原登录密码">
		</div>
	</div>
	<div class="am-form-group">
		<label for="user-new-password" class="am-form-label">新密码</label>
		<div class="am-form-content">
			<input type="password" id="user-new-password" name="npwd" placeholder="由数字或字母组合6-12位数">
			<font id="new-password" color="#ff2323" size="1"></font>
		</div>
	</div>
	<div class="am-form-group">
		<label for="user-confirm-password" class="am-form-label">确认密码</label>
		<div class="am-form-content">
			<input type="password" id="user-confirm-password" name="rpwd" placeholder="请再次输入上面的密码">
			<font id="confirm-password" color="#ff2323" size="1"></font>
		</div>
	</div>
	<div class="info-btn">
		<input type="submit" class="am-btn am-btn-danger" value="保存修改" onclick="return false">
	</div>
</form>
<script type="text/javascript">
	res = false;
	res1 = false;
	$peg = /^[a-zA-Z0-9_]{6,12}$/;
	$('#user-new-password').keyup(function(){
		$str = $(this).val();
		if ($peg.test($str)) {
			$('#new-password').html('');
			res = true;
		} else {
			$('#new-password').html('&nbsp;&nbsp;&nbsp;&nbsp;新密码不符合规格！');
			res = false;
		}
	})

	$('#user-confirm-password').keyup(function(){
		$str1 = $(this).val();
		$str2 = $('#user-new-password').val();
		if ($str1 === $str2) {
			$('#confirm-password').html('');
			res1 = true;
		} else {
			$('#confirm-password').html('&nbsp;&nbsp;&nbsp;&nbsp;两次密码不一致');
			res1 = false;
		}
	})

	setInterval(function()
		{
			if (res && res1) {
				$(':submit').attr('onclick','true');
			} else {
				$(':submit').attr('onclick','false');
			}
		},500)
</script>
@endsection