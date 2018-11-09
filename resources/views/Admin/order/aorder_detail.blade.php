@extends("Admin.public")
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 管理首页</a> <a href="#">订单管理</a> <a href="#" class="current">订单详情</a> </div>
    <h1>订单详情</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>订单详情</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
          @foreach ($data as $value)
            <div class="control-group">
              <label class="control-label">订单号:</label>
              <div class="controls">
                <p  class="span11" >{{$value->oid}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">商品 :</label>
              <div class="controls">
                <p class="span11" >{{$value->gid}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">用户:</label>
              <div class="controls">
                <p  class="span11" >{{$value->uid}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">数量 :</label>
              <div class="controls">
                <p class="span11" >{{$value->amount}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">单价 :</label>
              <div class="controls">
                <p class="span11" >{{$value->price}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">小计 :</label>
              <div class="controls">
                <p class="span11" >{{$value->price*$value->amount}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">评论状态:</label>
              <div class="controls">
                <p class="span11" >{{$value->status}}</p>
                </div>
            </div>
            @endforeach
           <div class="control-group">
              <label class="control-label">总计:</label>
              <div class="controls">
                <p class="span11" ><b><font color="#ec3f35" size="4">{{$total}}</font></b></p>
                </div>
            </div>
            </div>
            
            </div>            
              <div class="form-actions">
                <a href="/aorder" class="btn btn-success">返回</a>
              </div>

          </form>           
@endsection