
<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" /> 
  <title>@yield('title')</title> 
  <link href="static/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="static/User/css/personal.css" rel="stylesheet" type="text/css" /> 
  <link href="static/User/css/infstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="static/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="static/User/AmazeUI-2.4.2/assets/js/amazeui.js"></script> 
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
         <a href="/   register" target="_top">免费注册</a>
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
       <a id="mc-menu-hd" href="/ushoppingcar" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a>
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



  <div class="center"> 
   <div class="col-main"> 
    <div class="main-wrap"> 
     <div class="user-info"> 
      <!--标题 --> 
      <div class="am-cf am-padding"> 
       
      </div> 
      <hr /> 
      <!--头像 --> 
   
      <!--个人信息 --> 
      <div class="info-main"> 
       <form action="/addcoll" method="post" class="am-form am-form-horizontal"> 
        <div class="am-form-group"> 
         <label for="user-name2" class="am-form-label">网站名称</label> 
         <div class="am-form-content"> 
          <input type="text" id="user-name2"  name="name" />
         </div> 
        </div> 
        <div class="am-form-group"> 
         <label for="user-name" class="am-form-label" >链接</label> 
         <div class="am-form-content"> 
          <input type="text" id="user-name2" name="link" placeholder="请输入网址" value="http://" /> 
         </div> 
        </div> 
    
        
        <div class="am-form-group"> 
         <label for="user-phone" class="am-form-label">联系人</label> 
         <div class="am-form-content"> 
          <input id="user-phone"  type="tel"  name="contacts"/> 
         </div> 
        </div>

        <div class="am-form-group"> 
         <label for="user-email" class="am-form-label">电子邮件</label> 
         <div class="am-form-content"> 
          <input id="user-email"  name="email" type="email" /> 
         </div> 
        </div> 

        <div class="am-form-group"> 
         <label for="user-phone" class="am-form-label">电话</label> 
         <div class="am-form-content"> 
          <input id="user-phone" name="phone" type="tel" /> 
         </div> 
        </div>
        
        <div class="am-form-group safety"> 
         <label for="user-safety" class="am-form-label">账号安全</label> 
         <div class="am-form-content safety"> 
          <a href="safety.html"> <span class="am-icon-angle-right"></span> </a> 
         </div> 
        </div> 
        <div class="info-btn"> 
        

          <input class="am-btn am-btn-danger" type="submit"  value="提交" /> 
          
         
        </div> 
        {{csrf_field()}}
       </form> 
      </div> 
     </div> 
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
   
  </div>  
 </body>
</html>
