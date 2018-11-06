<!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理中心</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="./static/Admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="./static/Admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="./static/Admin/css/fullcalendar.css" />
<link rel="stylesheet" href="./static/Admin/css/matrix-style.css" />
<link rel="stylesheet" href="./static/Admin/css/matrix-media.css" />
<link href="font-awesome/./static/Admin/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="./static/Admin/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">建客通</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎@yield('name')</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> 我的资料</a></li>
        <li class="divider"></li>
        <li><a href="登录.html"><i class="icon-key"></i> 安全退出</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 系统管理中心</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-fullscreen"></i> <span>用户管理</span></a>
      <ul>
        <li><a href="/auser">查看用户</a></li>
        <li><a href="/aauthority">权限管理</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>分类管理</span></a>
      <ul>
        <li><a href="/atype">查看分类</a></li>
        <li><a href="/atype/create">添加分类</a></li>
      </ul>
    </li>      
    <li class="submenu"> <a href="#"><i class="icon icon-cog"></i> <span>商品管理</span></a>
      <ul>
        <li><a href="/agoods">查看商品</a></li>
        <li><a href="/agoods/create">添加商品</a></li>
      </ul>
    </li>   
    <li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>订单管理</span></a>
      <ul>
        <li><a href="/aorder">订单查看</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>广告管理</span></a>
      <ul>
        <li><a href="/aadvert">查看广告</a></li>
        <li><a href="/aadvert/create">添加广告</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>链接管理</span></a>
      <ul>
        <li><a href="/alink">查看链接</a></li>
        <li><a href="/alink/create">添加连接</a></li>
        <li><a href="/apply">审核链接</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

<!-- 内容双占位符 -->
@section('content')


@show
<!-- 内容双占位符 -->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12">Copyright © 2015.版权所有 建客团伙</div>
</div>
<!--end-Footer-part-->

<script src="./static/Admin/js/excanvas.min.js"></script> 
<script src="./static/Admin/js/jquery.min.js"></script> 
<script src="./static/Admin/js/jquery.ui.custom.js"></script> 
<script src="./static/Admin/js/bootstrap.min.js"></script> 
<script src="./static/Admin/js/jquery.flot.min.js"></script> 
<script src="./static/Admin/js/jquery.flot.resize.min.js"></script> 
<script src="./static/Admin/js/jquery.peity.min.js"></script> 
<script src="./static/Admin/js/fullcalendar.min.js"></script> 
<script src="./static/Admin/js/matrix.js"></script> 
<script src="./static/Admin/js/matrix.dashboard.js"></script> 
<script src="./static/Admin/js/jquery.gritter.min.js"></script> 
<script src="./static/Admin/js/matrix.interface.js"></script> 
<script src="./static/Admin/js/matrix.chat.js"></script> 
<script src="./static/Admin/js/jquery.validate.js"></script> 
<script src="./static/Admin/js/matrix.form_validation.js"></script> 
<script src="./static/Admin/js/jquery.wizard.js"></script> 
<script src="./static/Admin/js/jquery.uniform.js"></script> 
<script src="./static/Admin/js/select2.min.js"></script> 
<script src="./static/Admin/js/matrix.popover.js"></script> 
<script src="./static/Admin/js/jquery.dataTables.min.js"></script> 
<script src="./static/Admin/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
