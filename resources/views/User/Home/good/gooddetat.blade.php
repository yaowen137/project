@extends("User.Home.public")
@section('name','test')
@section('content')
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <!-- {{var_dump($da[0])}} -->

  <title>商品页面</title> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link type="text/css" href="/static/User/css/optstyle.css" rel="stylesheet" /> 
  <link type="text/css" href="/static/User/css/style.css" rel="stylesheet" /> 
  <script type="text/javascript" src="/static/User/basic/js/jquery-1.7.min.js"></script> 
  <script type="text/javascript" src="/static/User/basic/js/quick_links.js"></script> 
  <script type="text/javascript" src="/static/User/AmazeUI-2.4.2/assets/js/amazeui.js"></script> 
  <script type="text/javascript" src="/static/User/js/jquery.imagezoom.min.js"></script> 
  <script type="text/javascript" src="/static/User/js/jquery.flexslider.js"></script> 
  <script type="text/javascript" src="/static/User/js/list.js"></script> 
  <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script> 
 </head> 
 <body> 
  <!--顶部导航条 --> 
  
   <!--分类--> 
   <div class="nav-table"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <li class="index"><a href="/">首页</a></li> 
      <li class="qc"><a href="/ubuzz">人气商品</a></li> 
      <li class="qc"><a href="/nuew">新品上市</a></li> 
      <li class="qc"><a href="/ulimit">限量发售</a></li> 
      <li class="qc last"><a href="/uexpensive">尊享产品</a></li> 
     </ul> 
     
    </div> 
   </div> 
   <ol class="am-breadcrumb am-breadcrumb-slash"> 
    <li><a href="/">首页</a></li> 
     
    <li class="am-active">内容</li> 
   </ol> 
   <script type="text/javascript">
          $(function() {});
          $(window).load(function() {
            $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                $('body').removeClass('loading');
              }
            });
          });
        </script> 
   <div class="scoll"> 
    <section class="slider"> 
     <div class="flexslider"> 
      <ul class="slides"> 
       <li> <img src="/static/User/images/01.jpg" title="pic" /> </li> 
       <li> <img src="/static/User/images/02.jpg" /> </li> 
       <li> <img src="/static/User/images/03.jpg" /> </li> 
      </ul> 
     </div> 
    </section> 
   </div> 
   <!--放大镜--> 
   <div class="item-inform"> 
    <div class="clearfixLeft" id="clearcontent"> 
     <div class="box"> 
      <script type="text/javascript">
                $(document).ready(function() {
                  $(".jqzoom").imagezoom();
                  $("#thumblist li a").click(function() {
                    $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                    $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                    $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                  });
                });
              </script> 
      <div class="tb-booth tb-pic tb-s310"> 
       <img src="{{$da[0]->pic}}" alt="细节展示放大镜特效" rel="{{$da[0]->pic}}" class="jqzoom" />
      </div> 
      <ul class="tb-thumb" id="thumblist"> 
       <li class="tb-selected"> 
        <div class="tb-pic tb-s40"> 
         <a href="#"><img src="{{$da[0]->pic}}" mid="{{$da[0]->pic}}" big="{{$da[0]->pic}}" /></a> 
        </div> </li> 
      
      </ul> 
     </div> 
     <div class="clear"></div> 
    </div> 
    <div class="clearfixRight"> 
     <!--规格属性--> 
     <!--名称--> 
     <div class="tb-detail-hd"> 
      <h1>{{$da[0]->title}}</h1> 
     </div> 
     <div class="tb-detail-list"> 
      <!--价格--> 

      <div class="tb-detail-price"> 

       <li class="price iteminfo_price"> 
        <dt>
         价格
        </dt> 
        <dd>
         <em>&yen;</em>
         <b class="sys_item_price">{{$da[0]->price}}</b> 
        </dd> </li> 


       <li> 
       <div class="clearfix tb-btn tb-btn-basket theme-login"> 
        <a href="/coll/{{$da[0]->id}}"><i></i>收藏</a> 
       </div> </li> 


       <div class="clear"></div> 
      </div> 
      <!--地址--> 
      <dl class="iteminfo_parameter freight"> 
       <dt>
        包邮
       </dt> 
       <div class="iteminfo_freprice"> 
        
        
       </div> 
      </dl> 
      <div class="clear"></div> 
      <!--销量--> 
      <ul class="tm-ind-panel"> 
       
       <li class="tm-ind-item tm-ind-sumCount canClick"> 
        <div class="tm-indcon">
         <span class="tm-label">累计销量</span>
         <span class="tm-count">{{$da[0]->sell}}</span>
        </div> </li> 
       <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3"> 
        <div class="tm-indcon">
         <span class="tm-label">累计评价</span>
         <span class="tm-count">{{$jh[0]}}</span>
        </div> </li> 
      </ul> 
      <div class="clear"></div> 
      <!--各种规格--> 
      <dl class="iteminfo_parameter sys_item_specpara"> 
      
       <dd> 
        <!--操作页面--> 
        <div class="theme-popover-mask"></div> 
        <div class="theme-popover"> 
         <div class="theme-span"></div> 
         <div class="theme-poptit"> 
          <a href="javascript:;" title="关闭" class="close">&times;</a> 
         </div> 
         <div class="theme-popbod dform"> 
          <form class="theme-signin" name="loginform" action="" method="post"> 
           <div class="theme-signin-left"> 
         
           
            <div class="theme-options"> 
             <div class="cart-title number">
              数量
             </div> 
             <dd> 
              <input id="min" class="am-btn am-btn-default" name="" type="button" value="-" /> 
              <input id="text_box" name="" type="text" value="1" style="width:30px;" /> 
              <input id="textfu" name="amount" type="hidden" /> 

              <input id="add" class="am-btn am-btn-default" name="" type="button" value="+" /> 
              <span id="Stock" class="tb-hidden">库存<span class="stock">{{$da[0]->stock }}</span>件</span> 
             </dd> 
            </div> 
            <div class="clear"></div> 
            <div class="btn-op"> 
             <div class="btn am-btn am-btn-warning">
              确认
             </div> 
             <div class="btn close am-btn am-btn-warning">
              取消
             </div> 
            </div> 
           </div> 
           <div class="theme-signin-right"> 
            <div class="img-info"/static/User/             <img src="/static/User/images/songzi.jpg" /> 
            </div> 
            <div class="text-info"> 
             <span class="J_Price price-now">&yen;39.00</span> 
             <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span> 
            </div> 
           </div> 
          </form> 
         </div> 
        </div> 
       </dd> 
      </dl> 
      <div class="clear"></div> 
     
     </div> 
     <div class="pay"> 
      <div class="pay-opt"> 
       <a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a> 
       <a><span class="am-icon-heart am-icon-fw">收藏</span></a> 
      </div> 
      <li> 
       <div class="clearfix tb-btn tb-btn-buy theme-login"> 
        <a id="LikBuy" link = "/buy/{{$da[0]->id}}" title="点此按钮到下一步确认购买信息" href="/cs/{{$da[0]->id}}">立即购买</a> 
       </div> </li> 
      <li> 
       <div class="clearfix tb-btn tb-btn-basket theme-login"> 
        <a id="LikBasket" link = "/shoppingcar/{{$da[0]->id}}" title="加入购物车" href="/shoppingcar/{{$da[0]->id}}"><i></i>加入购物车</a> 
       </div> </li> 


     </div> 

    </div> 
    <div class="clear"></div> 
   </div> 
   
   <div class="clear"></div> 
   <!-- introduce--> 
   <div class="introduce"> 
    <div class="browse"> 
     <div class="mc"> 
      <ul> 
       <div class="mt"> 
        <h2>看了又看</h2> 
       </div> 
       @foreach($goods as $v)
       <li class="first"> 
        <div class="p-img"> 
      <a href="{{$v->id}}"> <img src="{{$v->pic}}" /> </a> 
        </div>
        <div class="p-name">
         <a href="#">{{$v->title}}</a> 
        </div> 
        <div class="p-price">
         <strong>￥{{$v->price}}</strong>
        </div> </li> 

      @endforeach

    
      </ul> 
     </div> 
    </div> 
    <div class="introduceMain"> 
     <div class="am-tabs" data-am-tabs=""> 
      <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs"> 
       <li class="am-active"> <a href="#"> <span class="index-needs-dt-txt">宝贝详情</span></a> </li> 
       <li> <a href="#"> <span class="index-needs-dt-txt">全部评价</span></a> </li> 
       <li> <a href="#"> <span class="index-needs-dt-txt">猜你喜欢</span></a> </li> 
      </ul> 
      <div class="am-tabs-bd"> 
       <div class="am-tab-panel am-fade am-in am-active"> 
        
        <div class="details"> 
         <div class="attr-list-hd after-market-hd"> 
          <h4>商品细节</h4> 
         </div> 
         <div class="twlistNews"> 
          {!!$da[0]->content!!}
       
         </div> 
        </div> 
        <div class="clear"></div> 
       </div> 
       <div class="am-tab-panel am-fade"> 
        
        <div class="clear"></div> 
        <div class="tb-r-filter-bar"> 
         <ul class=" tb-taglist am-avg-sm-4"> 
          <li class="tb-taglist-li tb-taglist-li-current"> 
           <div class="comment-info"> 
            <span>全部评价</span> 
           
            <span class="tb-tbcr-num">{{$jh[0]}}</span> 

           
           </div> </li> 
          <li class="tb-taglist-li tb-taglist-li-1"> 
           <div class="comment-info"> 
            <span>好评</span> 
            <span class="tb-tbcr-num">({{$jh[1]}})</span> 
           </div> </li> 
          <li class="tb-taglist-li tb-taglist-li-0"> 
           <div class="comment-info"> 
            <span>中评</span> 
            <span class="tb-tbcr-num">({{$jh[2]}})</span> 
           </div> </li> 
          <li class="tb-taglist-li tb-taglist-li--1"> 
           <div class="comment-info"> 
            <span>差评</span> 
            <span class="tb-tbcr-num">({{$jh[3]}})</span> 
           </div> </li> 
         </ul> 
        </div> 
        <div class="clear"></div> 
        <ul class="am-comments-list am-comments-list-flip" id="md"> 
        @if(count($com) <= 0)
          <h2>暂无评论</h2>
       
        @else
         @foreach($com['data'] as $datum)
        
         <li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img " src="{{$datum->pic}}" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">{{$datum->username}}</a>  
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                {{$datum->content}}
             </div> 
           
            </div> 
           </div> 
            
           <!-- 评论内容 --> 
          </div></li> 
          @endforeach

         
        </ul> 
        <div class="clear"></div> 
        <!--分页 --> 
        <ul class="am-pagination am-pagination-right"> 
         <!-- <li class="am-disabled"><a class="1">&laquo;</a></li>  -->
         @for($i = 1; $i <= $pag; $i++)
         <li class="am-active"><a onclick="return false" class="fuck" gid="{{$gid}}">{{$i}}</a></li> 
         @endfor
         <!-- <li><a class="2">&raquo;</a></li>  -->
        </ul> 
        
       @endif

        <div class="clear"></div> 
        <div class="tb-reviewsft"> 
         <div class="tb-rate-alert type-attention">
          购买前请查看该商品的 
          <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。
         </div> 
        </div> 
       </div> 

       <div class="am-tab-panel am-fade"> 
        <div class="like"> 
         <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes"> 

          @foreach($gods as $like)
         
          <li> 
           <div class="i-pic limit"> 
             <a href="{{$like->id}}">
            <img src="{{$like->pic}}" /> 

            <p>{{$like->title}}</span></p> 
            <p class="price fl"> <b>&yen;</b> <strong>{{$like->price}}</strong> </p> 
            </a>
           </div> </li> 
        
         @endforeach
           
         </ul> 
        </div> 
        <div class="clear"></div> 
        <!--分页 --> 
        
    
    </div> 
   </div> 
  </div> 
  <!--菜单 --> 

 </body>
<script type="text/javascript">
  link = $('#LikBuy').attr('link');
  link1 = $('#LikBasket').attr('link');

  setInterval(function(){


   a = $('#text_box').val();

   $("#textfu").val(a);

   $("#LikBuy").attr('href',link+'?amount='+a);
   $("#LikBasket").attr('href',link1+'?amount='+a);

  },500);
   

 $('.fuck').click(function(){

  id = $(this).html();
  gid = $(this).attr('gid');
  $.get("/ajaxpag/"+gid,{'page':id},function(data){

    $('#md').html(data);
    

  });

  // alert(id);
 });
 






</script>



</html>
@endsection