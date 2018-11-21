@extends("User.public3")
@section('title','地址管理')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/addstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人中心</strong> / <small>地址管理</small></div>
</div>
<hr/>
<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
@if (count($address_data))
@foreach ($address_data as $value)
	<li class="user-addresslist" >
		<p class="new-tit new-p-re">
			<span class="new-txt">{{$value->name}}</span>
			<span class="new-txt-rd2">{{$value->showphone}}</span>
		</p>
		<div class="new-mu_l2a new-p-re">
			<p class="new-mu_l2cw">
				<span class="title">地址：</span>
				<span class="street">{{$value->address}}</span></p>
		</div>
		<div class="new-addr-btn">
			<a href="/paddress/{{$value->id}}/edit"><i class="am-icon-edit"></i>编辑</a>
			<span class="new-addr-bar">|</span>
			<a href="" route="/paddress/{{$value->id}}" id="a{{$value->id}}" onclick="return false" class="del"><i class="am-icon-trash"></i>删除</a>
		</div>
	</li>
@endforeach
@endif
</ul>
<div class="clear"></div>
<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
<!--例子-->
<div class="am-modal am-modal-no-btn" id="doc-modal-1">

	<div class="add-dress">

		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
		</div>
		<hr/>

		<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
			<form action="/paddress" method="post" class="am-form am-form-horizontal">
			{{ csrf_field() }}
			<input type="hidden" name="address"/>
				<div class="am-form-group">
					<label for="user-name" class="am-form-label">收货人</label>
					<div class="am-form-content">
						<input type="text" id="user-name" name="name" placeholder="收货人">
					</div>
				</div>

				<div class="am-form-group">
					<label for="user-phone" class="am-form-label">手机号码</label>
					<div class="am-form-content">
						<input id="user-phone" placeholder="手机号必填" name="phone" type="text">
					</div>
				</div>
				<div class="am-form-group">
					<label for="user-address" class="am-form-label">所在地</label>
					<div class="am-form-content address">
						<select id="sid">
							<option class="ss" disabled selected>--请选择--</option>
						</select>
					</div>
				</div>

				<div class="am-form-group">
					<label for="user-intro" class="am-form-label">详细地址</label>
					<div class="am-form-content">
						<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
						
					</div>
				</div>

				<div class="am-form-group">
					<div class="am-u-sm-9 am-u-sm-push-3">
						<input type="submit" class="am-btn am-btn-danger" value="保存" onclick="return false">
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
	// 第一级别获取
	$.getJSON('/addressajax',{'id':0},function (result){
		// console.log(result);
		// 禁止请选择选中
		$('.ss').attr('disabled','true');


		// 得到的数据数组内容 我们要遍历得到里面的每一个对象
		for (var i = 0; i < result.length; i++) {
			// console.log(result[i].name);
			// 将我们的得到的地址名称写在option标签中
			var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
			// alert(info);
			// 将得到的option标签放入到select对象中
			$('#sid').append(info);
		}
	})

	// 其他级别内容
	// live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应的事件
	$('select').live('change',function(){
		// 将当前的对象存储起来
		obj = $(this);
		// 通过id来查找下一个
		id = $(this).val();

		// 清除所有其他的select
		obj.nextAll('select').remove();
		// alert(id);
		$.getJSON('/addressajax',{'id':id},function(result){
			// alert(result);
			if (result !='') {
				// 创建一个select标签对象
				var select = $('<select></select>');
				// 防止当前城市没有办法选择所以我们先写上一个请选择option标签
				var op = $('<option class="mm">--请选择--</option>');
				select.append(op);


				// 循环得到的数组里面的option标签添加到select
				for (var i = 0; i < result.length; i++) {
					var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
					// 将option标签添加到select标签中
					select.append(info);
				}

				// 将select标签添加到当前标签的后面
				obj.after(select);
				// console.log(result);
				
				// 把其他级别的请选择禁用
				$('.mm').attr('disabled','true');
			}
		})
	})

	// 获取选中的数据提交到操作页面
	
	$('input:submit').click(function(){
		str = '';
		$('select').each(function(){
			// 获取 当前select被选中的option标签里面的中文文本
			opdata = $(this).find('option:selected').html()+',';
			// alert(opdata);
			// 将我们得到的每个值放置到数组中 push() 将数值添加到数组中
			str += (opdata);
		})
		str += $('#user-intro').val();
		// console.log(str);
		// 将得到的数组直接赋值给隐藏域的value值即可
		$('input[name=address]').val(str);
	})

	// 判断客户是否已填写左右信息
	setInterval(function()
	{
		// 获取最后一个select标签的option
		lastop = $('select').last().find('option:selected').html();
		// console.log(lastop);
		// 判断select是否已选和其他输入框是否已填写
		if (lastop != '--请选择--' && $('#user-intro').val() != '' && $('#user-name').val() != '' && $('#user-phone').val() != '') {
			// submit变为可用
			$('input:submit').attr('onclick', 'return true');
		} else {
			// submit变为不可用
			$('input:submit').attr('onclick', 'return false');
		}
	},300)


	// ajax删除地址
	$('.del').click(function(){
		route = $(this).attr('route');
		a = $(this);
		$.get(route,function(result)
		{	
			if (result == 1) {
				a.parent().parent().remove();
			}
		});
	})
</script>
@endsection