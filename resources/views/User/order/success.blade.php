@extends('User.public2')
@section('title','付款成功')
@section('content')
<html>
 <head>
 <link rel="stylesheet"  type="text/css" href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css"/>
<link href="/static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" />

<link href="/static/User/css/sustyle.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
  <div class="take-delivery"> 
   <div class="status"> 
    <h2>您已成功付款</h2> 
    <div class="successInfo"> 
     <!-- <ul> 
      <li>付款金额<em>&yen;9.90</em></li> 
      <div class="user-info"> 
       <p>收货人：艾迪</p> 
       <p>联系电话：15871145629</p> 
       <p>收货地址：湖北省 武汉市 武昌区 东湖路75号众环大厦</p> 
      </div> 请认真核对您的收货信息，如有错误请联系客服 
     </ul>  -->
     <div class="option"> 
      <span class="info">您可以</span> 
      <a href="/" class="J_MakePoint"><span color="red">点击这里继续购买</span></a> 
       
     </div> 
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection