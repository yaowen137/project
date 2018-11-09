@extends("Admin.public")
@section('content')
<script src="/static/js/jquery-1.8.3.min.js"></script>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 管理首页</a> <a href="#">广告管理</a> <a href="#" class="current">添加广告</a> </div>
    <h1>添加广告</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>广告信息</h5>
          </div>
          <div class="widget-content nopadding">
          @if (count($errors) > 0)
          <div class="mws-form-message warning">
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            </div>
            @endif  
          <form action="/aadvert/{{$vl->id}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" value="{{$vl->route}}" id="route" />
            <div class="control-group">
              <label class="control-label">显示位置：</label>
              <div class="controls">
              <select id="ss" name="display">
                <option disabled>--请选择--</option>
                <option value="1" {{$vl->display[0]}}>主页轮播图</option>
                <option value="2" {{$vl->display[1]}}>商品列表</option>
                <option value="3" {{$vl->display[2]}}>个人中心</option>
              </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">推广内容：</label>
              <div class="controls">
              <select id="s" name="route">
                <option disabled>--请选择--</option>
              </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">广告图片 :</label>
              <div class="controls">
                <img src="{{$vl->pic}}">
                <input type="file" class="span11" name="photo" />
              </div>
            </div>
            
             
              <div class="form-actions">
                <input type="submit" value="确认修改" class="btn btn-success">
              {{csrf_field()}}
              {{method_field('PUT')}}
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 动态选项 -->
<script type="text/javascript">
  num1 = $('#ss').val();
  route = $('#route').val();
  $.getJSON('/jsadvert', {'num':num1},function(result) 
    { 
      select = $('#s');
      for (var i = 0; i < result.length; i++) {
        if (result[i].id == route) {
          var info = $('<option value="'+result[i].id+'" selected>'+result[i].name+'</option>');
          select.append(info);  
        }else{
          var info = $('<option value="'+result[i].id+'" selected>'+result[i].name+'</option>');
          select.append(info);
        }
      }
    })
  $('#ss').change(function(){
    num = $('#ss').val();
    $.getJSON('/jsadvert', {'num':num},function(result) 
    {
      $('#s').children().remove();
      select = $('#s');
      select.append('<option disabled selected>--请选择--</option>');
      for (var i = 0; i < result.length; i++) {
        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
        select.append(info);
      }
    })
  });
</script>
<!-- 动态选项 -->
@endsection