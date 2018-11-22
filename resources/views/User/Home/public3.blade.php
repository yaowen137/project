<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" /> 
  <title>@yield('title')</title> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/css/personal.css" rel="stylesheet" type="text/css" />
  <!-- <link href="/static/User/css/vipstyle.css" rel="stylesheet" type="text/css" /> -->
  <link href="/static/User/css/infstyle.css" rel="stylesheet" type="text/css" />
  <!-- <link href="/static/User/css/stepstyle.css" rel="stylesheet" type="text/css" /> -->
  <!-- <link href="/static/User/css/addstyle.css" rel="stylesheet" type="text/css"> -->
  <!-- <link href="/static/User/css/colstyle.css" rel="stylesheet" type="text/css"> -->
  <!-- <link href="/static/User/css/orstyle.css" rel="stylesheet" type="text/css"> -->
  <!-- <link href="/static/User/css/appstyle.css" rel="stylesheet" type="text/css"> -->
  <!-- <link href="/static/User/css/cmstyle.css" rel="stylesheet" type="text/css"> -->
  @section('css')
  @show
  <script src="/static/User/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script> 
  <script src="/static/User/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
  <script src="/static/js/jquery-1.8.3.min.js"></script>
 </head> 
 <body> 
  <!--头 --> 
  <header> 
   <article> 
    <div class="mt-logo"> 
     <!--顶部导航条 --> 
     <div class="am-container header"> 
      <ul class="message-l"> 
       <div class="topMessage"> 
        <div class="menu-hd">
         欢迎<a href="/pindex" target="_top" class="h"><font color="#35cae2" id="nickname2">{{session('user')['nickname']}}</font></a> &nbsp;&nbsp;&nbsp;
         <a href="/ulogout" target="_top">退出</a>
        </div> 
       </div> 
      </ul> 
      <ul class="message-r"> 
       <div class="topMessage home"> 
        <div class="menu-hd">
         <a href="/" target="_top" class="h">商城首页</a>
        </div> 
       </div> 
       <div class="topMessage my-shangcheng"> 
        <div class="menu-hd MyShangcheng">
         <a href="/pindex" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
        </div> 
       </div> 
       <div class="topMessage mini-cart"> 
        <div class="menu-hd">
         <a id="mc-menu-hd" href="/ushopping" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">@yield('shoppingcar')</strong></a>
        </div> 
       </div>
       <div class="topMessage my-shangcheng"> 
        <div class="menu-hd MyShangcheng">
         <a href="/pcollection" target="_top"><i class="am-icon-heart am-icon-fw"></i>收藏夹</a>
        </div> 
       </div> 
      </ul> 
     </div> 
     <!--悬浮搜索框--> 
     <div class="nav white"> 
      <div class="logoBig"> 
       <li><img src="/static/User/images/logobig.jpg" /></li> 
      </div> 
      <div class="search-bar pr"> 
       <a name="index_none_header_sysc" href="#"></a> 
       <form> 
        <input id="searchInput" name="keyword" type="text" placeholder="搜索" autocomplete="off" /> 
        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
       </form> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div>  
   </article> 
  </header> 
  <div class="nav-table"> 
   <div class="long-title">
    <span class="all-goods">全部分类</span>
   </div> 
   <div class="nav-cont"> 
    <ul> 
     <li class="index"><a href="/">首页</a></li> 
     <li class="qc"><a href="/ubuzz">人气产品</a></li> 
     <li class="qc"><a href="/unew">新上产品</a></li> 
     <li class="qc"><a href="/ulimit">限量发售</a></li> 
     <li class="qc last"><a href="/uexpensive">尊享产品</a></li> 
    </ul>
   </div> 
  </div> 
  <b class="line"></b> 
  <div class="center"> 
   <div class="col-main"> 
    <div class="main-wrap"> 
     <!--标题 --> 
    @section('content')
  
  

    @show
     
    </div> 
    <!--底部--> 
    <div class="footer"> 
     <div class="footer-hd"> 
      <p> <a href="#">恒望科技</a> <b>|</b> <a href="#">商城首页</a> <b>|</b> <a href="#">支付宝</a> <b>|</b> <a href="#">物流</a> </p> 
     </div> 
     <div class="footer-bd"> 
      <p> <a href="#">关于恒望</a> <a href="#">合作伙伴</a> <a href="#">联系我们</a> <a href="#">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> </p> 
     </div> 
    </div> 
   </div> 
   <aside class="menu"> 
    <ul> 
     <li class="person active"> <a href="/pindex"><i class="am-icon-user"></i>个人中心</a> </li> 
     <li class="person"> <p><i class="am-icon-newspaper-o"></i>个人资料</p> 
      <ul> 
       <li> <a href="/puserinfo">个人信息</a></li> 
       <li> <a href="/psecurity">账户设置</a></li> 
       <li> <a href="/paddress">地址管理</a></li> 
       <li> <a href="/pcollection">我的收藏</a></li> 
      </ul> </li> 
     <li class="person"> <p><i class="am-icon-balance-scale"></i>我的交易</p> 
      <ul> 
       <li><a href="/porder">订单管理</a></li>
       <li><a href="/precord">评价记录</a></li>
      </ul> </li>
    </ul> 
   </aside> 
  </div>  
  <script language="VBScript"><!--

//--></script>
 </body>
</html>