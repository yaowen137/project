<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>@yield('title')</title> 
  <link href="static/User/User/UserAmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="static/User/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

    <link href="static/User/User/basic/css/demo.css" rel="stylesheet" type="text/css" />

    <link href="static/User/User/css/hmstyle.css" rel="stylesheet" type="text/css" />
    <script src="static/User/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/static/User/User/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>  
 </head> 
 <body> 
  <div class="hmtop"> 
   <!--顶部导航条 --> 
   <div class="am-container header"> 
    <ul class="message-l"> 
     <div class="topMessage"> 
      <div class="menu-hd"> 
        @if (session('user'))
         <a href="#" target="_top" class="h">欢迎{{session('user')['nickname']}}</a> &nbsp;&nbsp;&nbsp;
         <a href="#" target="_top">退出</a>
        @else
         <a href="#" target="_top" class="h">请登录</a> &nbsp;&nbsp;&nbsp;
         <a href="#" target="_top">免费注册</a>
        @endif
      </div> 
     </div> 
    </ul> 
    <ul class="message-r"> 
     <div class="topMessage home"> 
      <div class="menu-hd">
       <a href="#" target="_top" class="h">商城首页</a>
      </div> 
     </div> 
     <div class="topMessage my-shangcheng"> 
      <div class="menu-hd MyShangcheng">
       <a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
      </div> 
     </div> 
     <div class="topMessage mini-cart"> 
      <div class="menu-hd">
       <a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">@yield('shoppingcar')</strong></a>
      </div> 
     </div> 
    </ul> 
   </div> 
   <!--悬浮搜索框--> 
   <div class="nav white"> 
    <div class="logoBig"> 
     <li><img src="static/User/User/images/logobig.jpg" /></li> 
    </div> 
    <div class="search-bar pr"> 
     <a name="index_none_header_sysc" href="#"></a> 
     <form> 
      <input id="searchslideallnput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" /> 
      <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
     </form> 
    </div> 
   </div> 
   
  </div> 
  <!-- static/User/User -->
  
   <div class="slideall"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
     
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <li class="index"><a href="#">首页</a></li> 
      <li class="qc"><a href="#">人气产品</a></li> 
      <li class="qc"><a href="#">新上产品</a></li> 
      <li class="qc"><a href="#">限量发售</a></li> 
      <li class="qc last"><a href="#">尊享产品</a></li> 
     </ul> 
    </div> 

    @section('content')
    
  

    @show
    
   
   
      
      
    <div class="footer "> 
     <div class="footer-hd "> 
      <p> <a href="# ">恒望科技</a> <b>|</b> <a href="# ">商城首页</a> <b>|</b> <a href="# ">支付宝</a> <b>|</b> <a href="# ">物流</a> </p> 
     </div> 
     <div class="footer-bd "> 
      <p> <a href="# ">关于恒望</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> </p> 
     </div> 
    </div> 
   </div> 
    
  <!--引导 --> 
  <div class="navCir"> 
   <li class="active"><a href="home3.html"><i class="am-icon-home "></i>首页</a></li> 
   <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li> 
   <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
   <li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li> 
  </div> 
  <!--菜单 --> 
  <div class="tip"> 
   <div id="sidebar"> 
    <div id="wrap"> 
     <div id="prof" class="item "> 
      <a href="# "> <span class="setting "></span> </a> 
      <div class="ibar_login_box status_login "> 
       <div class="avatar_box "> 
        <p class="avatar_imgbox "><img src="static/User/User/images/no-img_mid_.jpg " /></p> 
        @if (session('user'))
        <ul class="user_info "> 
         <li>用户名：{{session('user')['nickname']}}</li> 
         <li>级&nbsp;别：@yield('level')</li> 
        </ul> 
        @else
        <ul class="user_info "> 
         <li>未登录</li>
        </ul>
        @endif
       </div> 
       <div class="login_btnbox "> 
       @if (session('user'))
        <a href="# " class="login_order ">我的订单</a> 
        <a href="# " class="login_favorite ">我的购物车</a> 
        @else
        <a href="# " class="login_order ">登录</a> 
        <a href="# " class="login_favorite ">注册</a>
        @endif
       </div> 
       <i class="icon_arrow_white "></i> 
      </div> 
     </div> 
     <div id="shopCart " class="item "> 
      <a href="# "> <span class="message "></span> </a> 
      <p> 购物车 </p> 
      <p class="cart_num ">0</p> 
     </div> 
     
     <!--回到顶部 --> 
     <div id="quick_links_pop " class="quick_links_pop hide "></div> 
    </div> 
   </div> 
   <div id="prof-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      我 
    </div> 
   </div> 
   <div id="shopCart-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      购物车 
    </div> 
   </div> 
   <div id="asset-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      资产 
    </div> 
    <div class="ia-head-list "> 
     <a href="# " target="_blank " class="pl "> 
      <div class="num ">
       0
      </div> 
      <div class="text ">
       优惠券
      </div> </a> 
     <a href="# " target="_blank " class="pl "> 
      <div class="num ">
       0
      </div> 
      <div class="text ">
       红包
      </div> </a> 
     <a href="# " target="_blank " class="pl money "> 
      <div class="num ">
       ￥0
      </div> 
      <div class="text ">
       余额
      </div> </a> 
    </div> 
   </div> 
   <div id="foot-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      足迹 
    </div> 
   </div> 
   <div id="brand-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      收藏 
    </div> 
   </div> 
   <div id="broadcast-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      充值 
    </div> 
   </div> 
  </div> 
  <script>
      window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
    </script> 
  <script type="text/javascript " src="static/User/basic/js/quick_links.js "></script>  
  <script language="VBScript"><!--

//--></script>
 </body>
</html>