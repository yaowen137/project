<!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理中心</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/static/Admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/static/Admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/static/Admin/css/fullcalendar.css" />
<link rel="stylesheet" href="/static/Admin/css/uniform.css" />
<link rel="stylesheet" href="/static/Admin/css/select2.css" />
<link rel="stylesheet" href="/static/Admin/css/matrix-style.css" />
<link rel="stylesheet" href="/static/Admin/css/matrix-media.css" />
<link href="/static/Admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/static/Admin/css/jquery.gritter.css" />
<link rel="stylesheet" href="/static/Admin/css/render.css" />
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
    <li><a href="#"><i class="icon-key"></i> 欢迎{{session('admin')->username}}</a></li>
    <li><a href="/alogout"><i class="icon-key"></i> 安全退出</a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
@if (session('admin')->level == 3)
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 系统管理中心</a>
  <ul>
    <li class="active"><a href="/admin"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>用户管理</span></a>
      <ul>
        <li><a href="/auser">查看用户</a></li>
        <li><a href="/aauthority">权限管理</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-tasks"></i> <span>分类管理</span></a>
      <ul>
        <li><a href="/atype">查看分类</a></li>
        <li><a href="/atype/create">添加分类</a></li>
      </ul>
    </li>      
    <li class="submenu"> <a href="#"><i class="icon icon-phone"></i> <span>商品管理</span></a>
      <ul>
        <li><a href="/agoods">查看商品</a></li>
        <li><a href="/agoods/create">添加商品</a></li>
      </ul>
    </li>   
    <li class="submenu"> <a href="#"><i class="icon icon-tags"></i> <span>订单管理</span></a>
      <ul>
        <li><a href="/aorder">订单查看</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-volume-up"></i> <span>广告管理</span></a>
      <ul>
        <li><a href="/aadvert">查看广告</a></li>
        <li><a href="/aadvert/create">添加广告</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-share-alt"></i> <span>链接管理</span></a>
      <ul>
        <li><a href="/alink">查看链接</a></li>
        <li><a href="/alink/create">添加链接</a></li>
        <li><a href="/aapply">审核链接</a></li>
      </ul>
    </li>
  </ul>
</div>
@else
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 系统管理中心</a>
  <ul>
    <li class="active"><a href="/admin"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    @foreach (session('admin')->authority as $value)
    @if ($value == 1)
    <li class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>用户管理</span></a>
      <ul>
        <li><a href="/auser">查看用户</a></li>
      </ul>
    </li>
    @elseif ($value == 2)
    <li class="submenu"> <a href="#"><i class="icon icon-tasks"></i> <span>分类管理</span></a>
      <ul>
        <li><a href="/atype">查看分类</a></li>
        <li><a href="/atype/create">添加分类</a></li>
      </ul>
    </li>
    @elseif ($value == 3)      
    <li class="submenu"> <a href="#"><i class="icon icon-phone"></i> <span>商品管理</span></a>
      <ul>
        <li><a href="/agoods">查看商品</a></li>
        <li><a href="/agoods/create">添加商品</a></li>
      </ul>
    </li>
    @elseif ($value == 4)   
    <li class="submenu"> <a href="#"><i class="icon icon-tags"></i> <span>订单管理</span></a>
      <ul>
        <li><a href="/aorder">订单查看</a></li>
      </ul>
    </li>
    @elseif ($value == 5)
    <li class="submenu"> <a href="#"><i class="icon icon-volume-up"></i> <span>广告管理</span></a>
      <ul>
        <li><a href="/aadvert">查看广告</a></li>
        <li><a href="/aadvert/create">添加广告</a></li>
      </ul>
    </li>
    @elseif ($value == 6)
    <li class="submenu"> <a href="#"><i class="icon icon-share-alt"></i> <span>链接管理</span></a>
      <ul>
        <li><a href="/alink">查看链接</a></li>
        <li><a href="/alink/create">添加链接</a></li>
        <li><a href="/aapply">审核链接</a></li>
      </ul>
    </li>
    @endif
    @endforeach
  </ul>
</div>
@endif
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

<script src="/static/Admin/js/excanvas.min.js"></script> 
<script src="/static/Admin/js/jquery.min.js"></script> 
<script src="/static/Admin/js/jquery.ui.custom.js"></script> 
<script src="/static/Admin/js/bootstrap.min.js"></script> 
<script src="/static/Admin/js/jquery.flot.min.js"></script> 
<script src="/static/Admin/js/jquery.flot.resize.min.js"></script> 
<script src="/static/Admin/js/jquery.peity.min.js"></script> 
<script src="/static/Admin/js/fullcalendar.min.js"></script> 
<script src="/static/Admin/js/matrix.js"></script> 
<script src="/static/Admin/js/matrix.dashboard.js"></script> 
<script src="/static/Admin/js/jquery.gritter.min.js"></script> 
<script src="/static/Admin/js/matrix.interface.js"></script> 
<script src="/static/Admin/js/matrix.chat.js"></script> 
<script src="/static/Admin/js/jquery.validate.js"></script> 
<script src="/static/Admin/js/matrix.form_validation.js"></script> 
<script src="/static/Admin/js/jquery.wizard.js"></script> 
<script src="/static/Admin/js/jquery.uniform.js"></script> 
<script src="/static/Admin/js/select2.min.js"></script> 
<script src="/static/Admin/js/matrix.popover.js"></script> 
<script src="/static/Admin/js/jquery.dataTables.min.js"></script>
<script src="/static/Admin/js/matrix.tables.js"></script>
<script src="/static/Admin/js/wangEditor.min.js"></script>
<script src="/static/ueditor/ueditor.config.js"></script>
<script src="/static/ueditor/ueditor.all.js"></script>
<script src="/static/ueditor/ueditor.parse.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('ue-container');
    ue.ready(function(){
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
</script>
<script src="/static/Admin/js/matrix.tables.js"></script>

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
