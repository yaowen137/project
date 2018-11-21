@extends("User.public3")
@section('title','账户设置')
@section('shoppingcar',$shoppingcar)
@section('content')
<!--标题 -->
<div class="user-safety">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人中心</strong> / <small>账户设置</small></div>
	</div>
	<hr/>

	<!--头像 -->
	<div class="user-infoPic">

		<div class="filePic">
			<img class="am-circle am-img-thumbnail" src="{{$pic}}" alt="" />
		</div>

		<p class="am-form-help">头像</p>

		<div class="info-m">
			<div><b>用户名：<i>{{session('user')->nickname}}</i></b></div>
            <div class="safeText">
				<div class="progressBar"><span class="progress"></span></div>
			</div>
		</div>
	</div>

	<div class="check">
		<ul>
			<li>
				<i class="i-safety-lock"></i>
				<div class="m-left">
					<div class="fore1">登录密码</div>
					<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
				</div>
				<div class="fore3">
					<a href="/ppassword">
						<div class="am-btn am-btn-secondary">修改</div>
					</a>
				</div>
			</li>
			<li>
				<i class="i-safety-iphone"></i>
				<div class="m-left">
					<div class="fore1">更换手机</div>
					<div class="fore2"><small>如要更换手机号或手机号已停用可点击修改</small></div>
				</div>
				<div class="fore3">
					<a href="/pphone">
						<div class="am-btn am-btn-secondary">修改</div>
					</a>
				</div>
			</li>
			<li>
				<i class="i-safety-idcard"></i>
				<div class="m-left">
					<div class="fore1">删除账户</div>
					<div class="fore2"><font color="#ff3838" size="2">*若您需要删除账户，可以点击这里，账户一旦注销则无法恢复，请谨慎操作！！<br>*若账户存在未完成订单，则需等订单变为完成或关闭状态才能进行删除！</font></div>
				</div>
				<div class="fore3">
					<a href="/punsetuser" onclick="return isdel()" >
						<div class="am-btn am-btn-secondary">删除</div>
					</a>
				</div>
			</li>
		</ul>
	</div>
</div>
<script type="text/javascript">
	function isdel()
	{
		if(confirm("是否确认删除此账户？一旦删除将无法使用此账户名及手机再创建账号！")) {
			return true;
		} else {
			return false;
		}
	}
</script>
@endsection