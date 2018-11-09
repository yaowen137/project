@extends("Admin.public")
@section('name','test')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
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

<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="content">
  
  

  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 广告首页</a> <a href="/aorder" class="current">广告列表</a> </div>
    


  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>广告管理</h5>
          <form action="/aorder" method="get">
          
          </form>


          </div>
          <div class="widget-content nopadding">
          @if (count($errors) > 0)
          <div class="mws-form-message warning">
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            </div>
            @endif 
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>序号</th>
                  <th>跳转内容</th>
                  <th>缩略图</th>
                  <th>显示位置</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                
               @foreach($data as $value)
                <tr class="gradeX">
                  <td>{{$num++}}</td>
                  <td>{{$value->route}}</td>
                  <td><img src="{{$value->pic}}" width ="100" height="70"></td>
                  <td>{{$value->display}}</td>
                 
                  <td class="center">
                    
                    <a href="/aadvert/{{$value->id}}/edit" class="btn btn-primary">修改</a>
                   
                    <form action="/aadvert/{{$value->id}}" style="display:inline-block">
                    
                    <button href="" class="btn btn-danger">删除</button>
                    {{csrf_field()}}
                    {{method_field("DELETE")}}
                    </form>
                  </td>
                </tr>   
               @endforeach
                


              </tbody>
            </table>
            
           <div id="pull_right">
               <div class="pull-right">
                  {{ $data->render() }}
               </div>
            </div>

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
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
<script type="text/javascript">


</script>
@endsection