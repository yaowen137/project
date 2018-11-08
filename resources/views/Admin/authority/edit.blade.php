@extends("Admin.public")
@section('name','Admin')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 用户管理</a> <a href="#">权限管理</a> <a href="#" class="current">添加管理员</a> </div>
    <h1>添加管理员</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>用户信息</h5>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert" align="center" style="height:50%">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <strong>{{session('success')}}</strong> 
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert" align="center" style="height:50%">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              <strong>{{session('error')}}</strong> 
            </div>
            @endif
          </div>
          <div class="widget-content nopadding">
          <form action="/aauthority/{{$data->id}}" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">账号 :</label>
              <div class="controls">
                <input type="text" class="span11" name="username" value="{{$data->username}}" disabled />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">权限 :</label>
              <div class="controls">
                <input type="checkbox" name="authority[]" value="1" {{$checked[0]}}/><b>用户管理</b>&nbsp;&nbsp;
                <input type="checkbox" name="authority[]" value="2" {{$checked[1]}}/><b>分类管理</b>&nbsp;&nbsp;
                <input type="checkbox" name="authority[]" value="3" {{$checked[2]}}/><b>商品管理</b>&nbsp;&nbsp;
                <input type="checkbox" name="authority[]" value="4" {{$checked[3]}}/><b>订单管理</b>&nbsp;&nbsp;
                <input type="checkbox" name="authority[]" value="5" {{$checked[4]}}/><b>广告管理</b>&nbsp;&nbsp;
                <input type="checkbox" name="authority[]" value="6" {{$checked[5]}}/><b>链接管理</b>&nbsp;&nbsp;
              </div> 
            </div>
              <div class="form-actions">
              {{csrf_field()}}
              {{method_field('PUT')}}
                <input type="submit" value="修改权限" class="btn btn-success">
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection