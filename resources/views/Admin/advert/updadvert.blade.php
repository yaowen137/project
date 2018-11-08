@extends("Admin.public")
@section('name','test')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理中心-建客通</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="./static/Admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="./static/Admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="./static/Admin/css/uniform.css" />
<link rel="stylesheet" href="./static/Admin/css/select2.css" />
<link rel="stylesheet" href="./static/Admin/css/matrix-style.css" />
<link rel="stylesheet" href="./static/Admin/css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<!--Header-part-->

<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 管理首页</a> <a href="#">广告管理</a> <a href="#" class="current">修改广告</a> </div>
    <h1>修改广告</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>广告信息</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/aadvert/{{$vl->id}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field("PUT")}}
            <div class="control-group">
              <label class="control-label">链接地址 :</label>
              <div class="controls">
                <input type="text" class="span11" name="route" placeholder="{{$vl->route}}" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">广告图片 :</label>
              <div class="controls">
                <input type="file" class="span11" name="pic" " />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">显示位置</label>
              <div class="controls">

              <input type="text" list="itemlist" name="display" class="span11" placeholder="{{$vl->display}}">
              <datalist id="itemlist">
                  <option name="1">主页轮播图</option>
                  <option name="2">商品列表</option>
                  <option name="3">个人中心</option>
              </datalist> 




              </div>
            </div>
             
              <div class="form-actions">
                <input type="submit" value="提交" class="btn btn-success">
                
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12">Copyright © 2015.版权所有 建客团伙</div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_validation.js"></script>

    <!-- 编辑器 -->
	<script charset="utf-8" src="editor/kindeditor.js"></script>
    <script charset="utf-8" src="editor/lang/zh_CN.js"></script>    
    <script>
    KindEditor.ready(function(K){
        window.editor = K.create('#editor_1');
    })
    </script>
</body>
</html>
@endsection