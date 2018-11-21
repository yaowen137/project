@extends('User.public2')
@section('title','购物车页面')
@section('shoppingcar',$shoppingcar)
@section('content')
<html>
 <head>
 <link href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
<link href="/static/User/basic/css/demo.css" rel="stylesheet" type="text/css" />
<link href="/static/User/css/cartstyle.css" rel="stylesheet" type="text/css" />
<link href="/static/User/css/optstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 </head>
 <body>
  <div id="cartTable"> 
   <div class="cart-table-th"> 
    <div class="wp"> 
     <div class="th th-chk"> 
      <div id="J_SelectAll1" class="select-all J_SelectAll"> 
      </div> 
     </div> 
     <div class="th th-item"> 
      <div class="td-inner">
       商品信息
      </div> 
     </div> 
     <div class="th th-price"> 
      <div class="td-inner">
       单价
      </div> 
     </div> 
     <div class="th th-amount"> 
      <div class="td-inner">
       数量
      </div> 
     </div> 
     <div class="th th-sum"> 
      <div class="td-inner">
       金额
      </div> 
     </div> 
     <div class="th th-op"> 
      <div class="td-inner">
       操作
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="clear"></div> 
   <div class="bundle  bundle-last "> 
    
    <div class="clear"></div> 
    <div class="bundle-main">
    @if(count($data))
  	@foreach($data as $row)
     <ul class="item-content clearfix"> 
      <li class="td td-chk">

      <form action="/uorderadd" method="post">
      {{csrf_field()}}
       <div class="cart-checkbox "> 
        <input class="check" id="J_CheckBox_170037950254" name="items[]" value="{{$row->gid}}" v="{{$row->price * $row->amount}}" type="checkbox"  />
        
        <label for="J_CheckBox_170037950254"></label> 
       </div> </li> 
      <li class="td td-item"> 
       <div class="item-pic"> 
        <a href="#" target="_blank" data-title="{{$row->title}}" class="J_MakePoint" data-point="tbcart.8.12"> <img src="{{$row->pic}}" style="width:80px;height:80px"/></a> 
       </div> 
       <div class="item-info"> 
        <div class="item-basic-info"> 
         <a href="#" target="_blank" title="{{$row->title}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$row->title}}</a> 
        </div> 
       </div> </li> 
      <li class="td td-info"> 
       <div class="item-props "> 
       </div> </li> 
      <li class="td td-price"> 
       <div class="item-price price-promo-promo"> 
        <div class="price-content"> 
         <div class="price-line"> 
          <!-- <em class="price-original">{{$row->price}}</em>  -->
         </div> 
         <div class="price-line">
          <span>￥</span> 
          <em class="J_Price price-now price{{$row->id}}" id="price" tabindex="0">{{$row->price}}</em> 
         </div> 
        </div> 
       </div> </li> 
      <li class="td td-amount"> 
       <div class="amount-wrapper "> 
        <div class="item-amount "> 
         <div class="sl"> 
          <input class="min am-btn" price="{{$row->price}}" id="subtract" name="{{$row->id}}" type="button" value="-" /> 
          <input class="text_box" name=""  type="text" value="{{$row->amount}}" style="width:30px;" /> 
          <input class="add am-btn" name="{{$row->id}}" price="{{$row->price}}" id="add" type="button" value="+" /> 
         </div> 
        </div> 
       </div> </li> 
      <li class="td td-sum"> 
       <div class="td-inner">
        <span>￥</span> 
        <em tabindex="0" id="smallsum{{$row->id}}" class="J_ItemSum number smallsum">{{$row->price * $row->amount}}</em> 
       </div> </li> 
      <li class="td td-op"> 
       <div class="td-inner"> 
        <a title="移入收藏夹" class="btn-fav" href="#"> 移入收藏夹</a> 
        <a href="javascript:;" data-point-url="#" class="delete" id="{{$row->id}}"> 删除</a>
       </div> </li> 
     </ul>
     <?php
     	$sum = $row->price*$row->amount;
     	$tot +=$sum; 

     ?> 
	   @endforeach
    @else
    <div style="width:998px;height:115px;vertical-align: middle;display: table-cell;;">
      <center>购物车空空如也~~快去<a href="/" ><font color="red">购物</font></a>吧！！！</center>
    </div>
    @endif
     

    </div> 
   </div> 
  </div> 
  <div class="clear"></div> 
  <div class="float-bar-wrapper"> 
   <div id="J_SelectAll2" class="select-all J_SelectAll"> 
    <div class="cart-checkbox"> 
     <input class="check-all check" id="allcheck" name="select-all" v="0"  type="checkbox" /> 
     <label for="J_SelectAllCbx2"></label> 
    </div> 
    <span>全选</span> 
   </div> 
   <div class="operations"> 
    <a href="/alldel" hidefocus="true" class="deleteAll">全部删除</a> 
    <!-- <a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>  -->
   </div> 
   <div class="float-bar-right"> 
    <div class="amount-sum"> 
     <span class="txt">已选商品</span> 
     <em id="J_SelectedItemsCount">0</em>
     <span class="txt">件</span> 
     <div class="arrow-box"> 
      <span class="selected-items-arrow"></span> 
      <span class="arrow"></span> 
     </div> 
    </div> 
    <div class="price-sum"> 
     <span class="txt">合计:</span> 
     <strong class="price">&yen;<em id="J_Total">0</em></strong> 
    </div> 
    <div class="btn-area"> 
     <input type="submit"  id="J_Go" class="btn-area submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算" value="结&nbsp;算" onclick="return false"> <!-- <span>结&nbsp;算</span></a> --> 
    </div>
    </form> 
   </div> 
  </div>
 </body>
 <script>
 //ajax减
 	$('.min').click(function(){
 		o = $(this);
 		id = $(this).attr('name');
 		// alert(id);
 		// num = $(this).next().val();
 		// num = Number(num);
 		$.get('/ajaxcarsubtract',{id:id},function(data){
 			if(data){
 				num = parseInt(data);
 				o.next().val(data);
 				price = $('.price'+id).html();
 				sum = price * data;
 				$('#smallsum'+id).html(sum).parent().parent().parent().find('input:checkbox').attr('v',sum);
        
 			}
 		});
    
 	});

  setInterval(function(){
    allnum = $('input:checked').length;
    
    if ($('#allcheck').attr('checked')){
      allnum -=1; 
    }
    //总件数
    $('#J_SelectedItemsCount').html(allnum);

    if(allnum == 0){
      $('#J_Go').attr('onclick','return false');
    }else{
      $('#J_Go').attr('onclick','return true');
    }

    a = 0;
    $('input:checked').each(function(){
         a +=parseInt($(this).attr('v'));
        });

    $('#J_Total').html(a);
    
  },100);

//ajax 加
 	$('.add').click(function(){
   
    o = $(this);
    id = $(this).attr('name');
    
    $.get('/ajaxcaradd',{id:id},function(data){
      if(data){

        o.prev().val(data);
        price = $('.price'+id).html();
        sum = price * data;
        $('#smallsum'+id).html(sum).parent().parent().parent().find('input:checkbox').attr('v',sum);
        
      }
    });
    
 	});

//全选与全不选
m = 2;
$('#allcheck').click(function(){
 if (m%2 == 0){
    $('input[type=checkbox]').attr('checked','checked');
    m+=1;
 }else{
  $('input[type=checkbox]').removeAttr('checked');
    m-=1;
 }

});


// ajax删除
$('.delete').click(function(){
  id = $(this).attr('id');
  del = $(this);
  $.get('/ajaxdel',{id:id},function(data){
    // alert(data);
    if (data == 1){
      del.parents('ul').remove();
    }
  });
});


 </script>
</html>
@endsection