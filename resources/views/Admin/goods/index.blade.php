@extends("Admin.public")
@section('name','Admin')
@section('content')
<style>
  #btn{
    display: inline-block;
  }
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 商品管理</a> <a href="/agoods" class="current">查看商品</a> </div>
    <h1>查看商品<a href="/agoods/create" type="button" class="btn btn-success" style="float:right;margin:10px 20px 0px 0px;">添加商品</a></h1>
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
              <thead>
                <tr>
                  <th>id</th>
                  <th>标题</th>
                  <th>所属类型</th>
                  <th>价格</th>
                  <th>库存</th>
                  <th>销量</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($data as $value)
                <tr class="gradeX">
                  <td>{{$num++}}</td>
                  <td>{{$value->title}}</td>
                  <td>{{$value->tid}}</td>
                  <td>{{$value->price}}</td>
                  <td>{{$value->stock}}</td>
                  <td>{{$value->sell}}</td>
                  <td class="center"><a href="/agoods/{{$value->id}}" class="btn btn-success">预览</a>&nbsp;&nbsp;&nbsp;<a href="/agoods/{{$value->id}}/edit" class="btn btn-primary">编辑</a>&nbsp;&nbsp;&nbsp;<form id="btn" action="/agoods/{{$value->id}}" method="post">{{csrf_field()}}
          {{method_field("DELETE")}}<input type="submit" value="删除" class="btn btn-danger"/></form></td>
                </tr>   
               @endforeach
              </tbody>
            </table>
            <div id="pull_right">
               <div class="pull-right">
                  {{ $data->appends($request)->render() }}
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form action="/agoods" method="get">
 <div class="dataTables_filter" id="DataTables_Table_0_filter">
  <label>标题搜索: <input type="text" aria-controls="DataTables_Table_0" name="keyworks" value="{{$request['keyworks'] or ''}}" /><input type="submit" value="搜索" class="btn btn-success"></label>
 </div>
 </form>
 <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers ui-state-default ui-state-disabled" id="DataTables_Table_0_paginate">
  
 </div>
@endsection