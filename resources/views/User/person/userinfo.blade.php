@extends("User.public3")
@section('title','个人信息')
@section('shoppingcar',$shoppingcar)
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>个人信息</small></div>
</div>
<hr/>

<!--头像 -->
<div class="user-infoPic">

	<div class="filePic">
		<img class="am-circle am-img-thumbnail" src="{{$userinfo_data->pic}}" alt="" />
	</div>

	<p class="am-form-help">头像</p>

	<div class="info-m">
		<div><b>昵称：<i id="nickname">{{session('user')->nickname}}</i></b></div>
		<br/>
		<font color="red" size="2">双击昵称可进行修改&nbsp;&nbsp;&nbsp;&nbsp;*如昵称重复则修改失败！</font>
		<div class="vip">
		</div>
	</div>
</div>
<div class="info-main">
	<form action="/doinfoupdate" method="post" class="am-form am-form-horizontal" enctype="multipart/form-data" >
	{{csrf_field()}}
	@if ($userinfo_data->pic != '/static/User/images/getAvatar.do.jpg')
	<input type="hidden" value="{{$userinfo_data->pic}}" name="pic"/>
	@endif
		<div class="am-form-group">
			<label for="user-name2" class="am-form-label">真实姓名</label>
			<div class="am-form-content">
				<input type="text" id="user-name2" name="truename" placeholder="truename" maxlength="6" value="{{$userinfo_data->truename}}">
			</div>
		</div>

		<div class="am-form-group">
			<label class="am-form-label">性别</label>
			<div class="am-form-content sex">
				<label class="am-radio-inline">
					<input type="radio" name="sex" value="0" data-am-ucheck {{$userinfo_data->sex[0]}}> 女
				</label>
				<label class="am-radio-inline">
					<input type="radio" name="sex" value="1" data-am-ucheck {{$userinfo_data->sex[1]}}> 男
				</label>
				<label class="am-radio-inline">
					<input type="radio" name="sex" value="2" data-am-ucheck {{$userinfo_data->sex[2]}}> 保密
				</label>
			</div>
		</div>

		<div class="am-form-group">
			<label for="user-name" class="am-form-label">年龄</label>
			<div class="am-form-content">
				<input type="text" id="user-name2" placeholder="age" name="age" value="{{$userinfo_data->age}}">
			</div>
		</div>

		<div class="am-form-group">
			<label for="user-name2" class="am-form-label">头像</label>
			<div class="am-form-content">
				<input type="file" id="user-name2" placeholder="nickname" name="photo">
			</div>
		</div>
		<div class="info-btn">
			<input type="submit" class="am-btn am-btn-danger" value="保存修改">
		</div>

	</form>
</div>
<!-- ajax 更改昵称 -->
<script type="text/javascript">
	$('#nickname').dblclick(function()
	{
		$nickname = $(this).html();
		$(this).html('<input type="text" value="'+$(this).html()+'" />').children('input').focus().blur(function()
		{	
			$.getJSON('/pupdatenickname', {'nickname':$(this).val()},function(result) 
			{	
				if (result == 0) {
					$('#nickname').html($nickname);
				} else {
					$('#nickname').html(result);
					$('#nickname2').html(result);
				}
			})
		})
	})
</script>
@endsection