@extends("Admin.public")
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 用户管理</a> <a href="#" class="current">查看用户</a> </div>
    <h1>查看用户</h1>
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
            @if (isset($data[0]))
              <thead>
                <tr>
                  <th>id</th>
                  <th>用户名</th>
                  <th>等级</th>
                  <th>状态</th>
                  <th>注册时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $value)
                <tr class="gradeX">
                    <td>{{$num++}}</td>
                  <td>{{$value->username}}</td>
                  <td>{{$value->level}}</td>
                  <td>{{$value->status}}</td>
                  <td>{{date('Y-m-d H:i:s',$value->addtime)}}</td>
                  <td class="center">
                  @if ($value->level == '普通用户')
                  <a href="/auser/{{$value->id}}" class="btn btn-primary">详情</a>
                  @elseif ($value->level == '管理员')
                  <a href="/aauthority" class="btn btn-success">查看权限</a>
                  @endif
                  </td>
                </tr>    
              @endforeach         
              </tbody>
              @else
              <tbody>
                <tr class="gradeX">
                  <center><td>暂无普通管理员数据</td></center>
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