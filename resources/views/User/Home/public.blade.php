<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>@yield('title')</title> 
  <link href="/static/User/UserAmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

    <link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" />

    <link href="/static/User/css/hmstyle.css" rel="stylesheet" type="text/css" />
    <script src="/static/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/static/User/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>  
 </head> 
 <body> 
   <div class="hmtop"> 
   <!--顶部导航条 --> 
   <div class="am-container header"> 
    <ul class="message-l"> 
     <div class="topMessage"> 
      <div class="menu-hd"> 
       @if (session('user'))
         <a href="#" target="_top" class="h">欢迎{{session('user')->nickname}}</a> &nbsp;&nbsp;&nbsp;
         <a href="/ulogout" target="_top">退出</a>
        @else
         <a href="/ulogin" target="_top" class="h">请登录</a> &nbsp;&nbsp;&nbsp;
         <a href="/register" target="_top">免费注册</a>
        @endif
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
       <a id="mc-menu-hd" href="/ushoppingcar" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a>
      </div> 
     </div> 
     <div class="topMessage favorite"> 
      <div class="menu-hd">
       <a href="/pcollection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
      </div> 
     </div>
    </ul> 
   </div> 
   <!--悬浮搜索框--> 
   <div class="nav white"> 
    <div class="logo">
     <img src="/static/User/images/logo.png" />
    </div> 
    <div class="logoBig"> 
     <li><img src="/static/User/images/logobig.jpg" /></li> 
    </div> 
    <div class="search-bar pr"> 
     <a name="index_none_header_sysc" href="#"></a> 
     <form action="/goodslist" method="get">
      

      <input id="searchInput" name="key" value="{{$request['Key'] or ''}}"  type="text" placeholder="搜索"  autocomplete="off" /> 

      <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
     </form> 
    </div> 
   </div> 
   <div class="clear"></div> 
  </div> 
  
    @section('content')
    
  

    @show
    
   
   
      
      
    <div class="footer "> 
     <div class="footer-hd "> 
     
      <p> 
       
        <a href="">恒望科技</a> <b>|</b> 
        <a href="">支付宝</a> <b>|</b> 
        <a href="">物流</a> <b>|</b> 
        <a href="">商城首页</a> <b>|</b> 
       
       </p> 
     </div> 
     <div class="footer-bd "> 
      <p> <a href="# ">关于恒望</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> </p> 
     </div> 
    </div> 
   </div>
  <script>
      window.jQuery || document.write('<script src="/static/User/basic/js/jquery.min.js "><\/script>');
    </script> 
  <script type="text/javascript " src="/static/User/basic/js/quick_links.js "></script>  
  <script language="VBScript"><!--

//--></script>
 </body>
</html>