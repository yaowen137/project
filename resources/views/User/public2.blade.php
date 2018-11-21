<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>@yield('title')</title> 
  <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/css/cartstyle.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/User/css/jsstyle.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/static/User/js/address.js"></script> 
 </head> 
 <body> 
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
    <li><img src="/static/User/images/logobig.jpg" /></li> 
   </div> 
   <div class="search-bar pr"> 
    <a name="index_none_header_sysc" href="#"></a> 
    <form> 
     <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off" /> 
     <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
    </form> 
   </div> 
  </div> 
  <div class="clear"></div> 
  <div class="concent"> 
   <!--地址 --> 
   
  @section('content')
  
  

  @show


   <div class="footer"> 
    <div class="footer-hd"> 
     <p> <a href="#">恒望科技</a> <b>|</b> <a href="#">商城首页</a> <b>|</b> <a href="#">支付宝</a> <b>|</b> <a href="#">物流</a> </p> 
    </div> 
    <div class="footer-bd"> 
     <p> <a href="#">关于恒望</a> <a href="#">合作伙伴</a> <a href="#">联系我们</a> <a href="#">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> </p> 
    </div> 
   </div> 
  </div> 
  <div class="theme-popover-mask"></div> 
  <div class="theme-popover"> 
   <!--标题 --> 
   <div class="am-cf am-padding"> 
    <div class="am-fl am-cf">
     <strong class="am-text-danger am-text-lg">新增地址</strong> / 
     <small>Add address</small>
    </div> 
   </div> 
   <hr /> 
   <div class="am-u-md-12"> 
    <form class="am-form am-form-horizontal"> 
     <div class="am-form-group"> 
      <label for="user-name" class="am-form-label">收货人</label> 
      <div class="am-form-content"> 
       <input type="text" id="user-name" placeholder="收货人" /> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">手机号码</label> 
      <div class="am-form-content"> 
       <input id="user-phone" placeholder="手机号必填" type="email" /> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">所在地</label> 
      <div class="am-form-content address"> 
       <select data-am-selected=""> <option value="a">浙江省</option> <option value="b">湖北省</option> </select> 
       <select data-am-selected=""> <option value="a">温州市</option> <option value="b">武汉市</option> </select> 
       <select data-am-selected=""> <option value="a">瑞安区</option> <option value="b">洪山区</option> </select> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-intro" class="am-form-label">详细地址</label> 
      <div class="am-form-content"> 
       <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea> 
       <small>100字以内写出你的详细地址...</small> 
      </div> 
     </div> 
     <div class="am-form-group theme-poptit"> 
      <div class="am-u-sm-9 am-u-sm-push-3"> 
       <div class="am-btn am-btn-danger">
        保存
       </div> 
       <div class="am-btn am-btn-danger close">
        取消
       </div> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div> 
  <div class="clear"></div>  
  <script language="VBScript"><!--

//--></script>
 </body>
</html>