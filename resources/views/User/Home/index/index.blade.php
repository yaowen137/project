@extends("User.Home.public")
@section('name','test')
@section('content')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>首页</title> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/css/hmstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/static/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/static/User/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script> 
 </head> 
 <body> 
 
  <div class="banner"> 
   <!--轮播 --> 
   <div class="am-slider am-slider-default scoll" data-am-flexslider="" id="demo-slider-0"> 
    <ul class="am-slides"> 
    @foreach($adv as $jpg)
     <li class="banner2" style="background:black" ><a href="{{$jpg->route}}"><img width="1380" height="430" src="{{$jpg->pic}}" /></a></li> 

    @endforeach
    </ul> 
   </div> 
   <div class="clear"></div> 
  </div> 
  <div class="shopNav"> 
   <div class="slideall"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <li class="index"><a href="#">首页</a></li> 
      <li class="qc"><a href="/ubuzz">人气商品</a></li> 
      <li class="qc"><a href="/unew" >新品上市</a></li> 
      <li class="qc"><a href="/ulimit">限量发售</a></li> 
      <li class="qc last"><a href="/uexpensive">尊享产品</a></li> 
     </ul> 
     
    </div> 
    <!--侧边导航 --> 

    <div id="nav" class="navfull"> 
     <div class="area clearfix"> 
      <div class="category-content" id="guide_2"> 
       <div class="category"> 
        <ul class="category-list" id="js_climit_li"> 
          @foreach($data as $value)
          @if($value->parentid == 0 )
         <li class="appliance js_toggle relative first" style="height:44px;"> 
          <div class="category-info"> 
           <h3 class="category-name b-category-name"><a class="ml-22" title="点心">{{$value->name}}</a></h3> 
           <em>&gt;</em>
          </div> 
          @endif
          <div class="menu-item menu-in top"> 
           <div class="area-in"> 
            <div class="area-bg"> 
             <div class="menu-srot"> 
              <div class="sort-side"> 
               
               <dl class="dl-sort"> 

                @foreach($data as $val )
                @if($val->parentid == $value->id )
                <dt>
                 <span >{{$val->name}}</span>
                </dt> 


                @foreach($data as $v )
                @if($v->parentid == $val->id )

                  <a href="/ugoodslist/{{$v->id}}">{{$v->name}}&nbsp;&nbsp;&nbsp;</a>
                  
                @endif
                @endforeach

                @endif
                @endforeach
                
                
                <!-- <dd>
                 <a title="蒸蛋糕" href="#"><span>111</span></a>
                </dd>  -->
                
               
               </dl> 
                
               
              </div> 
             
             </div> 
            </div> 
           </div> 
          </div> <b class="arrow"></b> </li> 
          @endforeach
         
         <li class="appliance js_toggle relative" style="height:44px;"> 
           <b class="arrow"></b> </li> 
         <li class="appliance js_toggle relative" style="height:44px;"> 
           <b class="arrow"></b> </li>
         <li class="appliance js_toggle relative" style="height:44px;"> 
          
           <b class="arrow"></b> </li> 
         <li class="appliance js_toggle relative last" style="height:44px;"> 
          </li> 
        </ul> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!--轮播 --> 
    <script type="text/javascript">
              (function() {
                $('.am-slider').flexslider();
              });
              $(document).ready(function() {
                $("li").hover(function() {
                  $(".category-content .category-list li.first .menu-in").css("display", "none");
                  $(".category-content .category-list li.first").removeClass("hover");
                  $(this).addClass("hover");
                  $(this).children("div.menu-in").css("display", "block")
                }, function() {
                  $(this).removeClass("hover")
                  $(this).children("div.menu-in").css("display", "none")
                });
              })
            </script> 
    <!--小导航 --> 
    <div class="am-g am-g-fixed smallnav"> 
     <div class="am-u-sm-3"> 
      <a href="sort.html"><img src="../images/navsmall.jpg" /> 
       <div class="title">
        商品分类
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="../images/huismall.jpg" /> 
       <div class="title">
        大聚惠
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="../images/mansmall.jpg" /> 
       <div class="title">
        个人中心
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="../images/moneysmall.jpg" /> 
       <div class="title">
        投资理财
       </div> </a> 
     </div> 
    </div> 
    <!--走马灯 --> 
       <script type="text/javascript">
          if ($(window).width() < 640) {
            function autoScroll(obj) {
              $(obj).find("ul").animate({
                marginTop: "-39px"
              }, 500, function() {
                $(this).css({
                  marginTop: "0px"
                }).find("li:first").appendTo(this);
              })
            }
            $(function() {
              setInterval('autoScroll(".demo")', 3000);
            })
          }
        </script> 
  </div> 
  <div class="shopMainbg"> 
   <div class="shopMain" id="shopmain"> 
    <!--今日推荐 --> 
    
    
    <!--甜点--> 
    <div class="am-container "> 
     <div class="shopTitle "> 
      <h4>猜你喜欢</h4> 
      
    
      <span class="more "> <a class="more-link " href="/unew">更多商品</a> </span> 
     </div> 
    </div> 
    <div class="am-g am-g-fixed floodOne "> 
     <div class="am-u-sm-5 am-u-md-3 am-u-lg-4 text-one "> 
      <a href="/ugoodsinfo/{{$like[0]->id}} "> 
       <div class="outer-con "> 
        <div class="title ">
          {{$like[0]->title}} 
        </div> 
        <div class="sub-title ">
          戳我了解更多
        </div> 
       </div> <img src="{{$like[0]->pic}}" width="319px" height="319px" /> </a> 
     </div> 
     <div class="am-u-sm-7 am-u-md-5 am-u-lg-4"> 
      <div class="text-two"> 
       <div class="outer-con "> 
        <div class="title ">
          {{$like[1]->title}} 
        </div> 
        <div class="sub-title ">
          仅售：&yen;{{$like[1]->price}} 
        </div> 
       </div> 
       <a href="/ugoodsinfo/{{$like[1]->id}}"><img src="{{$like[1]->pic}} " width="199px" height="199px" /></a> 
      </div> 
      <div class="text-two last"> 
       <div class="outer-con "> 
        <div class="title ">
         {{$like[2]->title}} 
        </div> 
        <div class="sub-title ">
          仅售：&yen;{{$like[2]->price}} 
        </div> 
       </div> 
       <a href="/ugoodsinfo/{{$like[2]->id}} "><img src="{{$like[2]->pic}} " width="199px" height="199px"/></a> 
      </div> 
     </div> 
     <div class="am-u-sm-12 am-u-md-4 "> 

      @for ($i = 3; $i < 7; $i++)
      <div class="am-u-sm-3 am-u-md-6 text-three"> 
       <div class="outer-con "> 
        <div class="title ">
          {{$like[$i]->title}} 
        </div> 
        <div class="sub-title ">
          尝鲜价：&yen;{{$like[$i]->price}}
        </div> 
       </div> 
       <a href="/ugoodsinfo/{{$like[$i]->id}}"><img src="{{$like[$i]->pic}}" width="139px" height="139px" /></a> 
      </div> 
      @endfor

     </div> 
    </div> 
    <div class="clear "></div> 
    <!--坚果--> 
    <div class="am-container "> 
     <div class="shopTitle "> 
      <h4>手机专区</h4> 
      <h3>未来触手可及</h3> 
      
      <span class="more "> <a class="more-link " href="/unew ">更多商品</a> </span> 
     </div> 
    </div> 
    <div class="am-g am-g-fixed floodTwo "> 
     <div class="am-u-sm-5 am-u-md-4 text-one " style="height:219px"> 
      <a href="/ugoodsinfo/{{$mobiles[0]->id}}"> <img src="{{$mobiles[0]->pic}}" width="209px" height="209px" /> 
       <div class="outer-con "> 
        <div class="title ">
          {{$mobiles[0]->title}}
        </div> 
        <div class="sub-title ">
         握在手中的幸福
        </div> 
       </div> </a> 
     </div> 
     <div class="am-u-sm-7 am-u-md-4 am-u-lg-2 text-two"> 
      <div class="outer-con "> 
       <div class="title ">
         {{$mobiles[1]->title}}
       </div> 
       <div class="sub-title ">
         仅售：&yen;{{$mobiles[1]->price}}
       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[1]->id}}"><img src="{{$mobiles[1]->pic}}" width="158px" height="158px" /></a> 
     </div> 
     <div class="am-u-md-4 am-u-lg-2 text-three"> 
      <div class="outer-con "> 
       <div class="title ">
         {{$mobiles[2]->title}}
       </div> 
       <div class="sub-title ">
         尝鲜价：&yen;{{$mobiles[2]->price}}
       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[2]->id}}"><img src="{{$mobiles[2]->pic}}" width="158px" height="158px" /></a> 
     </div> 
     <div class="am-u-md-4 am-u-lg-2 text-three"> 
      <div class="outer-con "> 
       <div class="title ">
         {{$mobiles[3]->title}}
       </div> 
       <div class="sub-title ">
         尝鲜价：&yen; {{$mobiles[3]->price}}
       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[3]->id}}"><img src="{{$mobiles[3]->pic}}" width="158px" height="158px"/></a> 
     </div> 
     <div class="am-u-sm-6 am-u-md-4 am-u-lg-2 text-two "> 
      <div class="outer-con "> 
       <div class="title ">
        {{$mobiles[4]->title}}
       </div> 
       <div class="sub-title ">
         仅售：&yen;{{$mobiles[4]->price}}
       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[4]->id}}"><img src="{{$mobiles[4]->pic}}" width="158px" height="158px"/></a> 
     </div> 
     <div class="am-u-sm-6 am-u-md-3 am-u-lg-2 text-four "> 
      <div class="outer-con "> 
       <div class="title ">
                 {{$mobiles[5]->title}}
 
       </div> 
       <div class="sub-title ">
         仅售：&yen;{{$mobiles[5]->price}}

       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[5]->id}}"><img src="{{$mobiles[5]->pic}}" width="158px" height="158px" /></a> 
     </div> 
     <div class="am-u-sm-4 am-u-md-3 am-u-lg-4 text-five"> 
      <div class="outer-con "> 
       <div class="title ">
         {{$mobiles[6]->title}}
       </div> 
       <div class="sub-title ">
         尝鲜价：&yen;{{$mobiles[6]->price}}
       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[6]->id}}"><img src="{{$mobiles[6]->pic}}" width="399px" height="222px" /></a> 
     </div> 
     <div class="am-u-sm-4 am-u-md-3 am-u-lg-2 text-six"> 
      <div class="outer-con "> 
       <div class="title ">
         {{$mobiles[7]->title}}
       </div> 
       <div class="sub-title ">
         尝鲜价：&yen;{{$mobiles[7]->price}}
       </div> 
      </div> 
     <a href="/ugoodsinfo/{{$mobiles[7]->id}}"><img src="{{$mobiles[7]->pic}}" width="158px" height="158px" /></a> 
     </div> 
     <div class="am-u-sm-4 am-u-md-3 am-u-lg-4 text-five"> 
      <div class="outer-con "> 
       <div class="title ">
         {{$mobiles[8]->title}}
       </div> 
       <div class="sub-title ">
         尝鲜价：&yen;{{$mobiles[8]->price}}
       </div> 
      </div> 
      <a href="/ugoodsinfo/{{$mobiles[8]->id}}"><img src="{{$mobiles[8]->pic}}" width="399px" height="222px" /></a> 
     </div> 
    </div> 
    <div class="clear "></div> 
    <div class="am-container "> 
     <div class="shopTitle "> 
      <h4>配件专区</h4> 
      <h3>只有我才配得上你</h3> 
      
      <span class="more "> <a class="more-link " href="/unew ">更多商品</a> </span> 
     </div> 
    </div> 
    <div class="am-g am-g-fixed flood method3 "> 
     <ul class="am-thumbnails "> 
      @foreach($accs as $vcv)
      <li> 
       <div class="list "> 
        <a href="/ugoodsinfo/{{$vcv->id}}"> <img src="{{$vcv->pic}}" width="188px" height="188px" /> 
         <div class="pro-title ">
          {{$vcv->title}}
         </div> <span class="e-price ">￥{{$vcv->price}}</span> </a> 
       </div>
      </li> 
     @endforeach
     </ul> 
     <!-- 友情链接 -->
     <div class="shopTitle "> 
      <h4>友情链接</h4> 
      <h3>世界原比你想的精彩</h3> 
      
      <span class="more "> <a class="more-link " href="/links ">申请链接</a> </span> 
     </div> 

     <!-- 1 -->

     <div class="footer-hd "> 
     
      <p> 
        @foreach($link as $li)
        <a href="{{$li->link}}">{{$li->name}}</a> <b>|</b> 
        @endforeach
       </p> 
     </div> 
     <div class="footer-bd "> 
     </div> 
   
     <!-- 2 -->

    </div>
  <script>
      window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
    </script> 
  <script type="text/javascript " src="../basic/js/quick_links.js "></script>  
  <script language="VBScript"><!--

//--></script>
 </body>
</html>
@endsection