@extends("User.public3")
@section('title','订单详情')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/orstyle.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="user-orderinfo">
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
	</div>
	<hr/>
	<!--进度条-->
	<div class="m-progress">
		<div class="m-progress-list">
			<span class="step-{{$order_data['setp'][0]}} step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">1<em class="bg"></em></i>
               <p class="stage-name">拍下商品</p>
            </span>
			<span class="step-{{$order_data['setp'][1]}} step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">2<em class="bg"></em></i>
               <p class="stage-name">买家付款</p>
            </span>
			<span class="step-{{$order_data['setp'][2]}} step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">3<em class="bg"></em></i>
               <p class="stage-name">卖家发货</p>
            </span>
			<span class="step-{{$order_data['setp'][3]}} step">
               <em class="u-progress-stage-bg"></em>
               <i class="u-stage-icon-inner">4<em class="bg"></em></i>
               <p class="stage-name">交易完成</p>
            </span>
			<span class="u-progress-placeholder"></span>
		</div>
		<div class="u-progress-bar total-steps-2">
			<div class="u-progress-bar-inner"></div>
		</div>
	</div>
	<div class="order-infoaside">
		<div class="order-logistics">
			<a>
				<div class="icon-log">
					<i><img src="/static/User/images/receive.png"></i>
				</div>
				<div class="latest-logistics" style="width:585px;height:170px;overflow-x:hidden;overflow-y:scroll;">
					@if ($express_data != '')
					@foreach ($express_data as $val)
					<p class="text">{{$val->context}}</p>
					<div class="time-list">
						<span class="date">{{$val->time}}</span>
					</div>
					<br/>
					<br/>
					@endforeach
					@else
					@endif
				</div>
				<span class="am-icon-angle-right icon"></span>
			</a>
			<div class="clear"></div>
		</div>
		<div class="order-addresslist">
			<div>
				<div class="icon-add">
				</div>
				<p class="new-tit new-p-re">
					<span class="new-txt">{{$address_data->name}}</span>
					<span class="new-txt-rd2">{{$address_data->phone}}</span>
				</p>
				<div class="new-mu_l2a new-p-re">
					<p class="new-mu_l2cw">
						<span class="title">收货地址：</span>
						<span class="street">{{$address_data->address}}</span></p>
				</div>
			</div>
		</div>
	</div>
	<div class="order-infomain">

		<div class="order-top">
			<div class="th th-item">
				<td class="td-inner">商品</td>
			</div>
			<div class="th th-price">
				<td class="td-inner">单价</td>
			</div>
			<div class="th th-number">
				<td class="td-inner">数量</td>
			</div>
			<div class="th th-operation">
				<td class="td-inner">商品操作</td>
			</div>
			<div class="th th-amount">
				<td class="td-inner">合计</td>
			</div>
			<div class="th th-status">
				<td class="td-inner">交易状态</td>
			</div>
			<div class="th th-change">
				<td class="td-inner">交易操作</td>
			</div>
		</div>

		<div class="order-main">

			<div class="order-status3">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">{{$order_data[0]->ordernum}}</a></div>
					<span>成交时间：{{date('Y-m-d', $order_data[0]->addtime)}}</span>
					<!--    <em>店铺：小桔灯</em>-->
				</div>
				<div class="order-content">
					<div class="order-left">
						@foreach ($order_data as $key => $value)
						@if (is_int($key))
						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="{{$value->pic}}" class="itempic J_ItemImg" width="95" height="95">
									</a>
								</div>
								<div class="item-info" style="margin:13px 0px 0px 120px;">
									<div class="item-basic-info">
										<a href="#">
											<p>{{$value->title}}</p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									{{sprintf("%.2f", $value->price)}}
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>{{$value->amount}}
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									@if ($value->ostatus == '已完成' && $value->odstatus == 1)
									<a href="/pcomment/{{$value->id}}/?gid={{$value->gid}}"><font color="#1f99bd">评价商品</font></a>
									@endif
								</div>
							</li>
						</ul>
						@endif	
						@endforeach
						
					</div>
					<div class="order-right">
						<li class="td td-amount">
							<div class="item-amount">
								合计：￥{{sprintf("%.2f", $order_data['total'])}}
								<p>含运费：<span>0.00</span></p>
							</div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status">
									<p class="Mystatus" style="padding-top:15px">{{$order_data[0]->status}}</p>
								</div>
							</li>
							@if ($order_data[0]->ostatus == '待付款')
							<form action="/pays" method="post" style="display:block">
							{{ csrf_field()}}
								<input type="hidden" name="ordernum" value="{{$order_data[0]->ordernum}}">
								<input type="submit" class="am-btn am-btn-danger anniu" value="一键付款" />
							</form>
							<br/>
							<a href="/pclose/{{$order_data[0]->id}}" class="am-btn am-btn-danger anniu"  onclick="return fun()"  style="margin-left:102px;"><font color="#fff">关闭订单</font></a>
							@elseif ($order_data[0]->ostatus == '待收货')
							<a href="/pconfirm/{{$order_data[0]->id}}" class="am-btn am-btn-danger anniu"><font color="#fff">确认收货</font></a>
							@endif
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function fun ()
	{
		if (confirm('确认要关闭订单吗？一旦关闭，订单信息将不再在列表中显示！')) {
			return true;
		} else {
			return false;
		}
	}
</script>
@endsection