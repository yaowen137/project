@extends('Admin.public')
@section('title','添加分类')
@section('content')
<div id="content">
<div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>链接管理-->添加链接</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/alink" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">链接名 :</label>
              <div class="controls" >
                <input type="text" class="span11" name="name" placeholder="请输入您的分类名..." style="width:520px">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">链接地址 :</label>
              <div class="controls" >
                <input type="text" class="span11" name="link" placeholder="请输入您的链接名 例如:https://www.baidu.com " style="width:520px">
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