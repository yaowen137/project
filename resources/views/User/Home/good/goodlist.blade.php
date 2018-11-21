@extends("User.Home.public")
@section('name','test')
@section('content')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>搜索页面</title> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/css/seastyle.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/static/Userbasic/js/jquery-1.7.min.js"></script> 
  <script type="text/javascript" src="/static/User/js/script.js"></script> 
 </head> 
 <body> 
  <!--顶部导航条 --> 

  
  <div class="clear"></div> 
  <b class="line"></b> 
  <div class="search"> 
   <div class="search-list"> 
    <div class="nav-table"> 
     <div class="long-title">
      <span class="all-goods">全部分类</span>
     </div> 
     <div class="nav-cont"> 
      <ul> 
       <li class="index"><a href="/">首页</a></li> 
       <li class="qc"><a href="/ubuzz">人气商品</a></li> 
       <li class="qc"><a href="/unew">新品上市</a></li> 
       <li class="qc"><a href="/ulimit">限时发售</a></li> 
       <li class="qc last"><a href="/uexpensive">尊享产品</a></li> 
      </ul> 
      
     </div> 
    </div> 
    <br>
    <div class="am-g am-g-fixed"> 
     <div class="am-u-sm-12 am-u-md-12"> 
      
      <div class="search-content"> 
       
       <div class="clear"></div> 
       <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes"> 
        @foreach($goods as $value)
        <li> 
         <div class="i-pic limit"> 
          <a href="/ugoodsinfo/{{$value->id}}"><img src="{{$value->pic}}" width="218px" height="218px" /></a> 
          <p class="title fl">{{$value->title}}</p> 
          <p class="price fl"> <b>&yen;</b> <strong>{{$value->price}}</strong> </p> 
          <p class="number fl"> 销量<span>{{$value->sell}}</span> </p> 
         </div>
          </li> 
          @endforeach
       </ul> 
      </div> 
      <div class="search-side"> 
       @foreach($adv as $val)
       <li> 
        <div class="i-pic check"> 
         <a href="/ugoodsinfo/{{$val->id}}"><img  src="{{$val->pic}}" width="200px" height="200px" /></a>
         
        </div> 
      </li> 
      @endforeach
      </div> 
    
      <!--分页 --> 
     
     </div> 
    </div>
    <br>
    <br>

 </body>
</html>
@endsection