@extends("Admin.public")
@section('name','Admin')
@section('content')
<script src="/static/js/jquery-1.8.3.min.js"></script>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 商品管理</a> <a href="/agoods">查看商品</a> <a href="#" class="current">商品编辑</a> </div>
    <h1>商品编辑</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>商品编辑</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/agoods/{{$data->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div id="pp" tid="{{$type[1]}}"></div><div id="p" tid="{{$type[2]}}"></div>
          <input type="hidden" name="tid" id="tid" value="{{$data->tid}}" />
            <div class="control-group">
              <label class="control-label">商品图片 :</label>
              <div class="controls">
                <img src="{{$data->pic}}" width="500"><br/><input type="file" name="photo"/><br/>只支持jpg，jpeg，png格式！
              </div>
              <input type="hidden" value="{{$data->pic}}" name="pic" />
            </div>
            <div class="control-group">
              <label class="control-label">分类：</label>
              <div class="controls" id="sel">
                <select id="sid">
                  <option class="ss">--请选择--</option>
                </select>
                <select id="ssid">
                  <option class="sss">--请选择--</option>
                </select>
                <select id="sssid">
                  <option class="ssss">--请选择--</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">标题：</label>
              <div class="controls">
                <input type="text" value="{{$data->title}}" name="title"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">价格 :</label>
              <div class="controls">
                <input type="text" value="{{$data->price}}" name="price" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">库存：</label>
              <div class="controls">
                <input type="text" value="{{$data->stock}}" name="stock" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">内容：</label>
              <div class="controls">
                <script id="ue-container" name="content"  type="text/plain" style="width:750px;height:400px">
                {!!$data->content!!}
              </script>
              </div>
            </div>
              <div class="form-actions">
              {{csrf_field()}}
              {{method_field('PUT')}}
                <input type="submit" value="修改" onclick="return false" class="btn btn-success">
              </div>
          </form>          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 三级联动 -->
<script>
// 获取一级tid
  $pptid = $('#pp').attr('tid');
// 获取二级tid
  $ptid = $('#p').attr('tid');
// 获取三级tid
  $tid = $('#tid').val();
// 第一级别获取
  $.getJSON('/jstype',{'parentid':0},function (result){
    // console.log(result);
    // 禁止请选择选中
    $('.ss').attr('disabled','true');


    // 得到的数据数组内容 我们要遍历得到里面的每一个对象
    for (var i = 0; i < result.length; i++) {
      // console.log(result[i].name);
      // 将我们的得到的地址名称写在option标签中
      if (result[i].id == $pptid) {
        var info = $('<option value="'+result[i].id+'" selected>'+result[i].name+'</option>');
      } else {

        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
      }
      // alert(info);
      // 将得到的option标签放入到select对象中
      $('#sid').append(info);
    }
  })

// 第二级别获取
  $.getJSON('/jstype',{'parentid':$pptid},function (result){
    // console.log(result);
    // 禁止请选择选中
    $('.sss').attr('disabled','true');


    // 得到的数据数组内容 我们要遍历得到里面的每一个对象
    for (var i = 0; i < result.length; i++) {
      // console.log(result[i].name);
      // 将我们的得到的地址名称写在option标签中
      if (result[i].id == $ptid) {
        var info = $('<option value="'+result[i].id+'" selected>'+result[i].name+'</option>');
      } else {

        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
      }
      // alert(info);
      // 将得到的option标签放入到select对象中
      $('#ssid').append(info);
    }
  })

// 第三级别获取
  $.getJSON('/jstype',{'parentid':$ptid},function (result){
    // console.log(result);
    // 禁止请选择选中
    $('.ssss').attr('disabled','true');


    // 得到的数据数组内容 我们要遍历得到里面的每一个对象
    for (var i = 0; i < result.length; i++) {
      // console.log(result[i].name);
      // 将我们的得到的地址名称写在option标签中
      if (result[i].id == $tid) {
        var info = $('<option value="'+result[i].id+'" selected>'+result[i].name+'</option>');
      } else {

        var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
      }
      // alert(info);
      // 将得到的option标签放入到select对象中
      $('#sssid').append(info);
    }
  })

  // 其他级别内容
  // live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应的事件
  $('select').live('change',function(){
    // 将当前的对象存储起来
    obj = $(this);
    // 通过id来查找下一个
    id = $(this).val();

    // 清除所有其他的select
    obj.nextAll('select').remove();
    // alert(id);
    $.getJSON('/jstype',{'parentid':id},function(result){
      // alert(result);
      if (result !='') {
        // 创建一个select标签对象
        var select = $('<select></select>');
        // 防止当前城市没有办法选择所以我们先写上一个请选择option标签
        var op = $('<option class="mm">--请选择--</option>');
        select.append(op);


        // 循环得到的数组里面的option标签添加到select
        for (var i = 0; i < result.length; i++) {
          var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
          // 将option标签添加到select标签中
          select.append(info);
        }

        // 将select标签添加到当前标签的后面
        obj.after(select);
        // console.log(result);
        
        // 把其他级别的请选择禁用
        $('.mm').attr('disabled','true');
      }
    })
  })
    
 setInterval(function(){
      $('select').each(function(){
      // 获取 当前select被选中的option标签里面的中文文本
      opdata = $(this).find('option:selected').val();
      // console.log(opdata);
      // 将我们得到的每个值放置到数组中 push() 将数值添加到数组中
      // arr.push(opdata);
    })
    if ($('select').length >= 3 && opdata != '--请选择--') {

      $('input[type=submit]').attr('onclick','return true');
      $('#tid').val(opdata);
    } else {
      $('input[type=submit]').attr('onclick','return false');
    }
  },300);

</script>
<!-- 三级联动 -->
@endsection