@extends("Admin.public")
@section('name','Admin')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 用户管理</a> <a href="#">查看用户</a> <a href="#" class="current">用户详情</a> </div>
    <h1>添加用户</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>用户信息</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/auser" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">真实姓名：</label>
              <div class="controls">
                <span style="font-size:30px">{{$data->truename}}</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">性别：</label>
              <div class="controls">
                <span style="font-size:30px">{{$data->sex}}</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">年龄：</label>
              <div class="controls">
                <span style="font-size:30px">{{$data->age}}</span>
              </div>
            </div>   
            <div class="control-group">
              <label class="control-label">电话：</label>
              <div class="controls">
                <span style="font-size:30px">{{$data->phone}}</span>
              </div>
            </div>   
              <div class="form-actions">
                <input type="submit" value="返回" class="btn btn-success">
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection