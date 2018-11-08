@extends("Admin.public")
@section('name','Admin')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 商品管理</a> <a href="/agoods">查看商品</a> <a href="#" class="current">商品详情</a> </div>
    <h1>商品详情</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>商品详情</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/agoods" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">商品图片 :</label>
              <div class="controls">
                <img src="{{$data->pic}}" width="500">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">标题 :</label>
              <div class="controls">
                <p class="span11">{{$data->title}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">价格 :</label>
              <div class="controls">
                <p class="span11">{{$data->price}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">库存：</label>
              <div class="controls">
                <p class="span11">{{$data->stock}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">销量：</label>
              <div class="controls">
                <p class="span11">{{$data->sell}}</p>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">内容：</label>
              <div class="controls">
                <p>{!!$data->content!!}</p>
              </div>
            </div>
              <div class="form-actions">
                <input type="submit" value="确认" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/agoods/{{$data->id}}/edit" class="btn btn-info">编辑</a>
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection