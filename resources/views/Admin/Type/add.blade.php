@extends('Admin.public')
@section('title','添加分类')
@section('content')
<script src="/static/js/jquery-1.8.3.min.js"></script>
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
          <input type="hidden" name="parentid" id="tid" />
            <div class="control-group">
                <label class="control-label">上级类 :</label>
                <div class="controls" id="sel">
                  <select style="text-align:center;text-align-last:center;" id="sid">
                    <option value="0">顶级分类</option>
                  </select>
                </div>
            <div class="control-group">
              <label class="control-label">分类名 :</label>
              <div class="controls" >
                <input type="text" class="span11" onclick="return false" name="name" placeholder="请输入您的分类名..." style="width:220px">
              </div>
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
<!-- 三级联动 -->
<script>
// 第一级别获取
  $.getJSON('/jstype',{'parentid':0},function (result){
    // console.log(result);
    // 得到的数据数组内容 我们要遍历得到里面的每一个对象
    for (var i = 0; i < result.length; i++) {
      // console.log(result[i].name);
      // 将我们的得到的地址名称写在option标签中
      var info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
      // alert(info);
      // 将得到的option标签放入到select对象中
      $('#sid').append(info);
    }
  })

  // 其他级别内容
  // live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应的事件
  $('#sid').live('change',function(){
    // 将当前的对象存储起来
    obj = $(this);
    // 通过id来查找下一个
    id = $(this).val();

    // 清除所有其他的select
    obj.nextAll('select').remove();
    // alert(id);
    if ($('#sid').val() != 0) {
      $.getJSON('/jstype',{'parentid':id},function(result){
        // console.log(result[0]['path'].length);
        if (result !='' && result[0]['path'].length < 3) {
          // 创建一个select标签对象
          var select = $('<select></select>');
          // 防止当前城市没有办法选择所以我们先写上一个请选择option标签
          var op = $('<option value="'+id+'">二级分类</option>');
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
        }
      })
    }
  })
    
 setInterval(function(){
      $('select').each(function(){
      // 获取 当前select被选中的option标签里面的中文文本
      opdata = $(this).find('option:selected').val();
      // console.log(opdata);
      // 将我们得到的每个值放置到数组中 push() 将数值添加到数组中
      // arr.push(opdata);
    })
    $('input[type=submit]').attr('onclick','return true');
    $('#tid').val(opdata);
  },300);

</script>
<!-- 三级联动 -->
@endsection