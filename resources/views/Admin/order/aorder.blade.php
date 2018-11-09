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
<link href="./static/Admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<!--Header-part-->

<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="content">
  
  

  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 管理首页</a> <a href="/aorder" class="current">订单列表</a> </div>
    


  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>用户管理</h5>


          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>序号</th>
                  <th>用户序号</th>
                  <th>订单号</th>
                  <th>床单时间 </th>
                  <th>状态</th>
                  <th>快递单号</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($data as $value)
                  
                <tr class="gradeX">
                  <td>{{$num++}}</td>
                  <td>{{$value->uid}}</td>
                  <td>{{$value->ordernum}}</td>
                  <td>{{$value->addtime}}</td>
                  <td>{{$value->status}}</td>
                  <td id="dd">{{$value->express}}</td>
                  <td class="center">
                    <a href="/aorder/{{$value->id}}" class="btn btn-primary">订单详情</a>
                @if($value->status == '已付款')
                    <a href="/aorder/{{$value->id}}/edit" class="btn btn-primary">发货</a>
                @elseif($value->status != '已付款')
                    <button class="btn btn-info">{{$value->status}}</button>
                @endif
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
<form action="/aorder" method="get">
 <div class="dataTables_filter" id="DataTables_Table_0_filter">
  <label>订单搜索: <input type="text" aria-controls="DataTables_Table_0" name="key" value="{{$request['keyworks'] or ''}}" /><input type="submit" value="搜索" class="btn btn-success"></label>
 </div>
 </form>
 <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers ui-state-default ui-state-disabled" id="DataTables_Table_0_paginate">
  
 </div>
@endsection