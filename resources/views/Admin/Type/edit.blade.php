@extends('Admin.public')
@section('title','分类修改')
@section('content')
<div id="content">
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>分类管理-->分类修改</h5>
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
          <form action="/atype/{{$data->id}}" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">分类名 :</label>
              <div class="controls" >
                <input type="text" class="span11" name="name" value="{{$data->name}}" placeholder="请输入您的分类名..." style="width:220px">
              </div>
            </div>
                {{csrf_field()}}
                {{method_field('PUT')}}  
              <div class="form-actions">
                <input type="submit" value="确认修改" class="btn btn-success">
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>	
</div>
@endsection