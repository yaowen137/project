@extends("User.public3")
@section('title','评价记录')
@section('shoppingcar',$shoppingcar)
@section('css')
<link href="/static/User/css/cmstyle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--标题 -->
<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
</div>
<hr/>

<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

	<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs" style="display:block">
		<li class="am-active"><a href="#tab1">所有评价</a></li>
	</ul>
	<div class="am-tabs-bd">
		@foreach ($comment_data as $value)
		<div class="am-tab-panel am-fade am-in am-active" id="tab1">

			<div class="comment-main">
				<div class="comment-list">
					<ul class="item-list">

						
						<div class="comment-top">
							<div class="th th-price">
								<td class="td-inner">评价</td>
							</div>
							<div class="th th-item">
								<td class="td-inner">商品</td>
							</div>													
						</div>
						<li class="td td-item">
							<div class="item-pic">
								<a href="#" class="J_MakePoint">
									<img src="{{$value->pic}}" class="itempic" width="95" height="95">
								</a>
							</div>
						</li>

						<li class="td td-comment">
							<div class="item-title" style="margin-right:6%">
								
								<div class="item-name">
									<a href="/ugoodsinfo/{{$value->gid}}">
										<p class="item-basic-info">{{$value->title}}</p>
									</a>
								</div>
							</div>
							<div class="item-comment" >
								{{$value->content}}
							</div>

							<div class="item-info">
								<div>
									
									<p class="info-time">2015-12-24</p>

								</div>
							</div>
						</li>

					</ul>

				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('css')
  <link href="/static/User/css/personal.css" rel="stylesheet" type="text/css" />

@endsection