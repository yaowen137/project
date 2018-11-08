@extends("Admin.public")
@section('name','Admin')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 用户管理</a> <a href="#" class="current">权限管理</a> </div>
    <h1>权限管理</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <a href="/aauthority/create" class="btn btn-success">添加管理员</a>
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
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>权限管理</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              @if (isset($data[0]))
              <thead>
                <tr>
                  <th>id</th>
                  <th>管理员账号</th>
                  <th>权限</th>
                  <th>操作</th>
                </tr>
              </thead>
              @foreach ($data as $value)
                <tr class="gradeX">
                  <td>{{$num++}}</td>
                  <td>{{$value->username}}</td>
                  <td>{{$value->authority}}</td>
                  <td class="center">
                  <a href="/aauthority/{{$value->id}}" class="btn btn-danger" >删除此账号</a>
                  <a href="/aauthority/{{$value->id}}/edit" class="btn btn-primary">修改权限</a></td>
                </tr>     
              @endforeach
              </tbody> 
              @else
              <tbody>
                <tr class="gradeX">
                  <center><td>暂无普通管理员数据，快去<a href="/aauthority/create" style="color:red">添加</a>吧</td></center>
                </tr>    
              </tbody>
              @endif
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
@endsection