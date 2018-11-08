@extends('Admin.public')
@section('title','添加分类')
@section('content')
<div id="content">
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>分类管理-->添加分类</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/atype" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">分类名 :</label>
              <div class="controls" >
                <input type="text" class="span11" name="name" placeholder="请输入您的分类名..." style="width:220px">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">父类 :</label>
              <div class="controls">
              	<select name="pid" style="text-align:center;text-align-last:center;">

					<option value="0">--请选择--</option>
					@foreach($cate as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
				</select>
			  </div>
            </div>
                {{csrf_field()}}  
              <div class="form-actions">
                <input type="submit" value="确认添加" class="btn btn-success">
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>	
</div>
@endsection