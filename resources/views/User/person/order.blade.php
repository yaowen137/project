@extends("User.public3")
@section('title','订单管理')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/orstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人中心</strong> / <small>订单管理</small></div>
</div>
<hr/>

<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

	<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
		<li class="am-active"><a href="#tab1" >所有订单</a></li>
		<li><a href="#tab2">待付款</a></li>
		<li><a href="#tab3">待发货</a></li>
		<li><a href="#tab4">待收货</a></li>
		<li><a href="#tab5">已完成</a></li>
	</ul>

	<div class="am-tabs-bd">
		<div class="am-tab-panel am-fade am-in am-active" id="tab1">
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
				<div class="order-list">
				@foreach ($order_data as $value)
					
					<!--交易成功-->
					<div class="order-status5">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="/porderinfo/{{$value['id']}}">{{$value['ordernum']}}</a></div>
							<span>下单时间：{{date('Y-m-d', $value['addtime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">
								@foreach($value as $key => $val)
								@if (is_numeric($key))
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="/ugoodsinfo/{{$val->gid}}" class="J_MakePoint">
												<img src="{{$val->pic}}" class="itempic J_ItemImg" width="100" height="100">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="/ugoodsinfo/{{$val->gid}}">
													<p>{{$val->title}}</p>
												</a>
											</div>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price">
											{{sprintf("%.2f", $val->price)}}
										</div>
									</li>
									<li class="td td-number">
										<div class="item-number">
											<span>×</span>{{$val->amount}}
										</div>
									</li>
									<li class="td td-operation">
										<div class="item-operation">
											@if ($value['status'] == '已完成' && $val->odstatus == 1)
											<a href="/pcomment/{{$val->id}}/?gid={{$val->gid}}"><font color="#1f99bd">评价商品</font></a>
											@endif
										</div>
									</li>
								</ul>
								@endif
								@endforeach
							</div>
							<div class="order-right">
								<li class="td td-amount">
									<div class="item-amount" style="width:110px">
										合计：￥{{sprintf("%.2f", $value['total'])}}
										<p>含运费：<span>￥0.00</span></p>
									</div>
								</li>
								<div class="move-right">
									<li class="td td-status">
										<div class="item-status">
											<p class="Mystatus">{{$value['status']}}</p>
										</div>
									</li>
									<li class="td td-change">
										@if ($value['status'] == '待付款')
										<form action="/pays" method="post" style="display:block">
										{{ csrf_field()}}
											<input type="hidden" name="ordernum" value="{{$value['ordernum']}}">
											<input type="submit" class="am-btn am-btn-danger anniu" value="一键付款" />
										</form>
										<br/>
										<a href="/pclose/{{$value['id']}}" class="am-btn am-btn-danger anniu"  onclick="return fun()"><font color="#fff">关闭订单</font></a>
										@elseif ($value['status'] == '待收货')
										<a href="/pconfirm/{{$value['id']}}" class="am-btn am-btn-danger anniu"><font color="#fff">确认收货</font></a>
										@endif
									</li>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>

		<div class="am-tab-panel am-fade" id="tab2">

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
				<div class="order-list">
					@foreach ($order_data as $value)
					@if ($value['status'] == '待付款')
					<!--交易成功-->
					<div class="order-status5">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="javascript:;">{{$value['ordernum']}}</a></div>
							<span>下单时间：{{date('Y-m-d', $value['addtime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">

								@foreach($value as $key => $val)
								@if (is_numeric($key))
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="/ugoodsinfo/{{$val->gid}}" class="J_MakePoint">
												<img src="{{$val->pic}}" class="itempic J_ItemImg"  width="100" height="100">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="/ugoodsinfo/{{$val->gid}}">
													<p>{{$val->title}}</p>
												</a>
											</div>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price">
											{{sprintf("%.2f", $val->price)}}
										</div>
									</li>
									<li class="td td-number">
										<div class="item-number">
											<span>×</span>{{$val->amount}}
										</div>
									</li>
									<li class="td td-operation">
										<div class="item-operation">
											
										</div>
									</li>
								</ul>
								@endif
								@endforeach
							</div>
							<div class="order-right">
								<li class="td td-amount">
									<div class="item-amount" style="width:110px">
										合计：￥{{sprintf("%.2f", $value['total'])}}
										<p>含运费：<span>￥0.00</span></p>
									</div>
								</li>
								<div class="move-right">
									<li class="td td-status">
										<div class="item-status">
											<div class="item-status">
												<p class="Mystatus">{{$value['status']}}</p>
											</div>
										</div>
									</li>
									<li class="td td-change">
									<form action="/pays" method="post" style="display:block">
									{{ csrf_field()}}
										<input type="hidden" name="ordernum" value="{{$value['ordernum']}}">
										<input type="submit" class="am-btn am-btn-danger anniu" value="一键付款" />
									</form>
									<br/>
									<a href="/pclose/{{$value['id']}}" class="am-btn am-btn-danger anniu" onclick="return fun()"><font color="#fff">关闭订单</font></a>
									</li>
								</div>
							</div>
						</div>
					</div>
				@endif
				@endforeach
				</div>
			</div>
		</div>
		<div class="am-tab-panel am-fade" id="tab3">
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
				<div class="order-list">
					@foreach ($order_data as $value)
					@if ($value['status'] == '待发货')
					<!--交易成功-->
					<div class="order-status5">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="javascript:;">{{$value['ordernum']}}</a></div>
							<span>下单时间：{{date('Y-m-d', $value['addtime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">

								@foreach($value as $key => $val)
								@if (is_numeric($key))
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="/ugoodsinfo/{{$val->gid}}" class="J_MakePoint">
												<img src="{{$val->pic}}" class="itempic J_ItemImg"  width="100" height="100">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="/ugoodsinfo/{{$val->gid}}">
													<p>{{$val->title}}</p>
												</a>
											</div>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price">
											{{$val->price}}
										</div>
									</li>
									<li class="td td-number">
										<div class="item-number">
											<span>×</span>{{$val->amount}}
										</div>
									</li>
									<li class="td td-operation">
										<div class="item-operation">
											
										</div>
									</li>
								</ul>
								@endif
								@endforeach
							</div>
							<div class="order-right">
								<li class="td td-amount">
									<div class="item-amount" style="width:110px">
										合计：￥{{sprintf("%.2f", $value['total'])}}
										<p>含运费：<span>￥0.00</span></p>
									</div>
								</li>
								<div class="move-right">
									<li class="td td-status">
										<div class="item-status">
											<p class="Mystatus">{{$value['status']}}</p>
										</div>
									</li>
								</div>
							</div>
						</div>
					</div>
				@endif
				@endforeach
				</div>
			</div>
		</div>
		<div class="am-tab-panel am-fade" id="tab4">
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
				<div class="order-list">
					@foreach ($order_data as $value)
					@if ($value['status'] == '待收货')
					<!--交易成功-->
					<div class="order-status5">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="javascript:;">{{$value['ordernum']}}</a></div>
							<span>下单时间：{{date('Y-m-d', $value['addtime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">

								@foreach($value as $key => $val)
								@if (is_numeric($key))
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="/ugoodsinfo/{{$val->gid}}" class="J_MakePoint">
												<img src="{{$val->pic}}" class="itempic J_ItemImg"  width="100" height="100">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="/ugoodsinfo/{{$val->gid}}">
													<p>{{$val->title}}</p>
												</a>
											</div>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price">
											{{sprintf("%.2f", $val->price)}}
										</div>
									</li>
									<li class="td td-number">
										<div class="item-number">
											<span>×</span>{{$val->amount}}
										</div>
									</li>
									<li class="td td-operation">
										<div class="item-operation">
											
										</div>
									</li>
								</ul>
								@endif
								@endforeach
							</div>
							<div class="order-right">
								<li class="td td-amount">
									<div class="item-amount" style="width:110px">
										合计：￥{{sprintf("%.2f", $value['total'])}}
										<p>含运费：<span>￥0.00</span></p>
									</div>
								</li>
								<div class="move-right">
									<li class="td td-status">
										<div class="item-status">
											<p class="Mystatus">{{$value['status']}}</p>
										</div>
									</li>
									<li class="td td-change">
										<a href="/pconfirm/{{$value['id']}}" class="am-btn am-btn-danger anniu"><font color="#fff">确认收货</font></a>
									</li>
								</div>
							</div>
						</div>
					</div>
				@endif
				@endforeach
				</div>
			</div>
		</div>

		<div class="am-tab-panel am-fade" id="tab5">
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
				<div class="order-list">
				@foreach ($order_data as $value)
					@if ($value['status'] == '已完成')
					<!--交易成功-->
					<div class="order-status5">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="javascript:;">{{$value['ordernum']}}</a></div>
							<span>下单时间：{{date('Y-m-d', $value['addtime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">

								@foreach($value as $key => $val)
								@if (is_numeric($key))
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="/ugoodsinfo/{{$val->gid}}" class="J_MakePoint">
												<img src="{{$val->pic}}" class="itempic J_ItemImg"  width="100" height="100">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info" style="margin-left: 0px;">
												<a href="/ugoodsinfo/{{$val->gid}}">
													<p>{{$val->title}}</p>
												</a>
											</div>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price">
											{{sprintf("%.2f", $val->price)}}
										</div>
									</li>
									<li class="td td-number">
										<div class="item-number">
											<span>×</span>{{$val->amount}}
										</div>
									</li>
									<li class="td td-operation">
										<div class="item-operation">
											@if ($val->odstatus == 1)
											<a href="/pcomment/{{$val->id}}/?gid={{$val->gid}}"><font color="#1f99bd">评价商品</font></a>
											@endif
										</div>
									</li>
								</ul>
								@endif
								@endforeach
							</div>
							<div class="order-right">
								<li class="td td-amount">
									<div class="item-amount" style="width:110px">
										合计：￥{{sprintf("%.2f", $value['total'])}}
										<p>含运费：<span>￥0.00</span></p>
									</div>
								</li>
								<div class="move-right">
									<li class="td td-status">
										<div class="item-status">
											<p class="Mystatus">{{$value['status']}}</p>
										</div>
									</li>
								</div>
							</div>
						</div>
					</div>
				@endif
				@endforeach
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