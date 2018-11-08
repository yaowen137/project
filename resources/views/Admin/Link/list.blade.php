@extends('Admin.public')
@section('content')
<html>
 <head>
   <script src="/static/js/jquery-1.8.3.min.js"></script>
 </head>

 <body>
 <div id="content">
  <div class="container-fluid"> 
   <hr /> 
   <div class="row-fluid"> 
    <div class="span12"> 
     <div class="widget-box"> 
      <div class="widget-title"> 
       <span class="icon"><i class="icon-th"></i></span> 
       <h5>审核管理</h5> 
      </div> 
      <div class="widget-content nopadding"> 
       <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        <div class="">
        <!-- 加style 高度显示搜索框 -->
         <div id="DataTables_Table_0_length" class="dataTables_length" style="height:30px;margin:5px 0;">
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

        <table class="table table-bordered data-table dataTable" id="DataTables_Table_0"> 
         <thead> 
          <tr role="row">
           <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="id: activate to sort column descending" style="width: 116px;">
            <div class="DataTables_sort_wrapper">
             id
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span>
            </div></th>
           <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="用户名: activate to sort column ascending" style="width: 217px;">
            <div class="DataTables_sort_wrapper">
             网站名
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
            </div></th>
           <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="最后登录: activate to sort column ascending" style="width: 313px;">
            <div class="DataTables_sort_wrapper">
             链接地址
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
            </div></th>

            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="最后登录: activate to sort column ascending" style="width: 313px;">
            <div class="DataTables_sort_wrapper">
             联系人
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
            </div></th>

            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="最后登录: activate to sort column ascending" style="width: 313px;">
            <div class="DataTables_sort_wrapper">
             电话号码
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
            </div></th>

            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="最后登录: activate to sort column ascending" style="width: 313px;">
            <div class="DataTables_sort_wrapper">
             邮箱
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
            </div></th>
           
           <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="操作: activate to sort column ascending" style="width: 502px;">
            <div class="DataTables_sort_wrapper">
             操作
             <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
            </div></th>
          </tr> 
         </thead> 

         <tbody role="alert" aria-live="polite" aria-relevant="all">
         @foreach($data as $row)
            <tr class="gradeX odd"> 
             <td class="  sorting_1">{{$row->id}}</td> 
             <td class=" ">{{$row->name}}</td> 
             <td class=" ">{{$row->link}}</td> 
             <td class=" ">{{$row->contacts}}</td> 
             <td class=" ">{{$row->phone}}</td> 
             <td class=" ">{{$row->email}}</td> 
             <td class="center " ><a href="/aapply/doadd/{{$row->id}}" class="btn btn-primary">通过</a>&nbsp;&nbsp;&nbsp;<a href="/aapply/del/{{$row->id}}" class="btn btn-danger del" value="不通过" onclick="return confirm('确定不通过吗')">删除</a></td> 
            </tr>
		     @endforeach
          
         </tbody>
        </table>
        
        <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix" >
       
         <!-- 原搜索 -->
         <form action="/alink" method="get">
         <div class="dataTables_filter" id="DataTables_Table_0_filter">
          <label>搜索: <input type="text" aria-controls="DataTables_Table_0" name="keyworks" value="{{$request['keyworks'] or ''}}" /><input type="submit" value="搜索" class="btn btn-success"></label>
         </div>
         </form>
         <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers ui-state-default ui-state-disabled" id="DataTables_Table_0_paginate">
          
         </div>
        </div>
        <!-- 显示分页 -->
        <div id="pull_right">
            <div class="pull-right">
              {{ $data->appends($request)->render()}}
            </div>
        </div>
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
  </div>
 </body>
  <script>
 // // alert($);
 // $('.del').click(function(){
 //  // alert(1)
 //  //获取id
 //  id = $(this).parents('tr').find('td:first').html();
 //  // pid = $(this).parents('tr').find('td:eq(2)').html();
 //  // alert(pid);
 //  row = $(this).parents('tr');
 //  // alert(id);
  
 //  //ajax
 //  if (confirm('确定要删除吗')){
 //    $.get('/alinkdel',{id:id},function (data){
 //      // alert(data);
 //      if (data.msg == 1){
 //        //删除数据所在的tr
 //        row.remove();
 //      }else if(data.msg == 2){
 //        alert('不能删除，里面还有子分类，请先删除里面的子分类！')
 //      }else{
 //        alert('删除失败');
 //      }
 //    });
 //  }
 // });
  </script>
</html>
@endsection