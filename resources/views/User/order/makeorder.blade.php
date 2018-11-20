@extends('User.public2')
@section('title','订单页面')
@section('content')
<html>
<!-- defaultAddr -->
 <head>
 <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

<link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" />
<link href="/static/User/css/cartstyle.css" rel="stylesheet" type="text/css" />

<link href="/static/User/css/jsstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<!-- <script type="text/javascript" src="/static/User/js/address.js"></script> -->
 </head>
 <body>
  <div class="paycont"> 
   <div class="address"> 
    <h3>确认收货地址 </h3> 
    <div class="control"> 
     <a href="/paddress/create" class="tc-btn createAddr theme-login am-btn am-btn-danger">
      使用新地址
     </a> 
    </div> 
    <div class="clear"></div> 
    <ul> 
	
	<form action="/orderdetail" method="post" id="myform">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
     <div class="per-border"></div> 
     @foreach($address as $res)
     <li class="user-addresslist" id="{{$res->id}}"> 
      <div class="address-left"> 
       <div class="user DefaultAddr"> 
        <span class="buy-address-detail"> <span class="buy-user{{$res->id}}">{{$res->name}}</span> <span class="buy-phone{{$res->id}}">{{$res->phone}}</span> </span> 
       </div> 
       <div class="default-address DefaultAddr"> 
        <span class="buy-line-title buy-line-title-type">收货地址：</span> 
        <span class="buy--address-detail{{$res->id}}">{{$res->address}}</span> 
       </div> 
       
      </div> 
      <div class="address-right"> 
       <a href="../person/address.html"> <span class="am-icon-angle-right am-icon-lg"></span></a> 
      </div> 
      <div class="clear"></div> 
      <div class="new-addr-btn"> 
       <a href="#" class="hidden">设为默认</a> 
       <span class="new-addr-bar hidden">|</span> 
       <a href="/paddress/{{$res->id}}/edit">编辑</a> 
       <span class="new-addr-bar">|</span> 
       <a href="javascript:void(0);" class="del" idnum="{{$res->id}}">删除</a> 
      </div> </li>
      @endforeach
      </form> 
	
    </ul> 
    <div class="clear"></div> 
   </div> 
   
   <div class="clear"></div> 
   <!--支付方式--> 
   <div class="logistics"> 
    <h3>选择支付方式</h3> 
    <ul class="pay-list"> 
     <!-- <li class="pay card"><img src="/static/User/images/wangyin.jpg" />银联<span></span></li> 
     <li class="pay qq"><img src="/static/User/images/weizhifu.jpg" />微信<span></span></li>  -->
     <li class="pay taobao"><img src="/static/User/images/zhifubao.jpg" />支付宝<span></span></li> 
    </ul> 
   </div> 
   <div class="clear"></div> 
   <!--订单 --> 
   <div class="concent"> 
    <div id="payTable"> 
     <h3>确认订单信息</h3> 
     <div class="cart-table-th"> 
      <div class="wp"> 
       <div class="th th-item"> 
        <div class="td-inner">
         商品信息
        </div> 
       </div> 
       <div class="th th-price"> 
        <div class="td-inner">
         单价
        </div> 
       </div> 
       <div class="th th-amount"> 
        <div class="td-inner">
         数量
        </div> 
       </div> 
       <div class="th th-sum"> 
        <div class="td-inner">
         金额
        </div> 
       </div> 
       <div class="th th-oplist"> 
        <div class="td-inner">
         配送方式
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
     <div class="bundle  bundle-last"> 
      <div class="bundle-main"> 

      @foreach($goods as $row)
       <ul class="item-content clearfix"> 
        <div class="pay-phone"> 
         <li class="td td-item"> 
          <div class="item-pic"> 
           <a href="#" class="J_MakePoint"> <img src="{{$row->pic}}" class="itempic J_ItemImg" width="80px" height="80px" /></a> 
          </div> 
          <div class="item-info"> 
           <div class="item-basic-info"> 
            <a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$row->title}}</a> 
           </div> 
          </div> </li> 
         <!-- <li class="td td-info"> 
          <div class="item-props"> 
           <span class="sku-line">颜色：12#川南玛瑙</span> 
           <span class="sku-line">包装：裸装</span> 
          </div> </li>  -->
         <li class="td td-price"> 
          <div class="item-price price-promo-promo"> 
           <div class="price-content"> 
            <em class="J_Price price-now">￥{{sprintf("%.2f", $row->price)}}</em> 
           </div> 
          </div> </li> 
        </div> 
        <li class="td td-amount"> 
         <div class="amount-wrapper "> 
          <div class="item-amount "> 
           <span class="phone-title">购买数量</span> 
           <div class="sl"> 
           <!--  <input class="min am-btn" name="" type="button" value="-" /> --> 
            <input class="text_box" name="" type="text" value="{{$row->amount}}" style="width:25px;" disabled/> 
            <!-- <input class="add am-btn" name="" type="button" value="+" />  -->
           </div> 
          </div> 
         </div> </li> 
        <li class="td td-sum"> 
         <div class="td-inner"> 
          <em tabindex="0" class="J_ItemSum number">￥{{sprintf("%.2f",$row->price * $row->amount)}}</em> 
         </div> </li> 
        <li class="td td-oplist"> 
         <div class="td-inner"> 
          <span class="phone-title">配送方式</span> 
          <div class="pay-logis">
            包邮
           <!-- <b class="sys_item_freprice">10</b>元  -->
          </div> 
         </div> </li> 
       </ul>
		
       <div class="clear"></div> 
      </div> 
      <div class="clear"></div> 
     </div>
      <!-- 合计 -->
      <?php
      $sum = $row->price * $row->amount;
      $tot += $sum; 
      ?>
	@endforeach


     
     <div class="clear"></div> 
     <div class="pay-total"> 
      
     <!--含运费小计 --> 
     <div class="buy-point-discharge "> 
      <p class="price g_price "> 合计 <span>&yen;</span><em class="pay-sum">{{sprintf("%.2f", $tot)}}</em> </p> 
     </div> 
     <!--信息 --> 
     <div class="order-go clearfix"> 
      <div class="pay-confirm clearfix"> 
       <div class="box"> 
        <div tabindex="0" id="holyshit267" class="realPay">
         <em class="t">实付款：</em> 
         <span class="price g_price "> <span>&yen;</span> <em class="style-large-bold-red " id="J_ActualFee">{{sprintf("%.2f", $tot)}}</em> </span> 
        </div> 
        <div id="holyshit268" class="pay-address"> 
         <p class="buy-footer-address"> <span class="buy-line-title buy-line-title-type">寄送至：</span> <span class="reallyaddress"></span> </p> 
         <p class="buy-footer-address"> <span class="buy-line-title">收货人：</span> <span class="buy-address-detail"> <span class="reallyuser"></span> <span class="reallyphone"></span> </span> </p> 
        </div> 
       </div> 
       <div id="holyshit269" class="submitOrder"> 
        <div class="go-btn-wrap"> 
         <button id="J_Go"  class="btn-go" tabindex="0" title="点击此按钮，提交订单" form="myform" style="float:right">提交订单</button> 
        </div> 
       </div> 
       <div class="clear"></div> 
      </div> 
     </div> 
    </div> 
    <div class="clear"></div> 
   </div> 
  </div>


  
 </body>
<script>






// 选择地址
$(function() {
	$(".user-addresslist").click(function() {
    
		// 获信息
		id = $(this).attr('id');
		$('input[name=id]').val(id);
		// alert(id);
		name = $('.buy-user'+id).html();
		phone = $('.buy-phone'+id).html();
		address = $('.buy--address-detail'+id).html();
		//赋值
		$('.reallyaddress').html(address);
		$('.reallyuser').html(name);
		$('.reallyphone').html(phone);
		// alert(address);
		$(this).addClass("defaultAddr").siblings().removeClass("defaultAddr");
	});

	$(".logistics").each(function() {
		var i = $(this);
		var p = i.find("ul>li");
		p.click(function() {
			if (!!$(this).hasClass("selected")) {
				$(this).removeClass("selected");
			} else {
				$(this).addClass("selected").siblings("li").removeClass("selected");
			}
		})
	})

	$('#J_Go').click(function(){
		if(!$('.user-addresslist').hasClass('defaultAddr')){
			alert('请选择收货地址！');
			return false;

		}else if(!$('.taobao').hasClass('selected')){
			alert('请选择支付方式！');
			return false;
		}else{
			return true;
		}
	});


  //ajax地址删除
  $('.del').click(function(){
    //获取id
    id = $(this).attr('idnum');
    //获取当前对象的li父级
    ps = $(this).parents().find('li');
    // alert(id);
    //ajax删除
    $.get('/paddress/'+id,{id:id},function(data){
      if(data == 1){
        //删除
        ps.remove();
      }
    });
  });


});
 
</script>
</html>
@endsection