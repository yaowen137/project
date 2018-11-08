@extends("Admin.public")
@section('name','test')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<title>后台管理中心-建客通</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/static/Admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/static/Admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/static/Admin/css/uniform.css" />
<link rel="stylesheet" href="/static/Admin/css/select2.css" />
<link rel="stylesheet" href="/static/Admin/css/matrix-style.css" />
<link rel="stylesheet" href="/static/Admin/css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<!--Header-part-->
<
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 管理首页</a> <a href="#">订单管理</a> <a href="#" class="current">添加单号</a> </div>
    <h1>添加单号</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>订单号</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/aorder/{{$id}}" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">订单号 :</label>
              <div class="controls">
                <input name="name" type="text" class="span11" placeholder="请输入订单号..." />
              </div>
            </div>
                    {{csrf_field()}}
          {{method_field("PUT")}}
              <div class="form-actions">
                <input type="submit" value="发货" class="btn btn-success">
              </div>
              
          </form>          
         
</body>
</html>
@endsection