<!DOCTYPE html>
<html>
 <head lang="en"> 
  <meta charset="UTF-8" /> 
  <title>注册</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link rel="stylesheet" href="/static/User/AmazeUI-2.4.2/assets/css/amazeui.min.css" /> 
  <link href="/static/User/css/dlstyle.css" rel="stylesheet" type="text/css" /> 
  
  <script src="/static/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/static/User/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
  <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script> 
 </head> 
 <body> 
  <div class="login-boxtitle"> 
   <a href="home/demo.html"><img alt="" src="/static/User/images/logobig.png" /></a> 
  </div> 
  <div class="res-banner"> 
   <div class="res-main"> 
    <div class="login-banner-bg">
     <span></span>
     <img src="/static/User/images/big.jpg" />
    </div> 
    <div class="login-box" style="height:385px"> 
     <div class="am-tabs" id="doc-my-tabs"> 
      <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify"> 
       <!-- <li class="am-active"><a href="">邮箱注册</a></li>  -->
       <li><a href="">重新输入密码</a></li> 
      </ul> 
      
       <div class="am-tab-panel"> 
        <form action="/dofind" method="post" id="myForm"> 
         
         <div class="user-pass"> 
          <label for="password"><i class="am-icon-lock"></i></label> 
          <input type="password" name="password" id="pwd" placeholder="设置密码" /> 
         </div> 
         <div style="height:25px;color:red;" id="pwdError"> 
         <span></span>
         </div>
         <div class="user-pass"> 
          <label for="passwordRepeat"><i class="am-icon-lock"></i></label> 
          <input type="password" name="repassword" id="repwd" placeholder="确认密码" /> 
         </div>
         <div style="height:25px;color:red;" id="repwdError"> 
        <span></span>
         </div>
         
         {{csrf_field()}}
          
        <div class="am-cf"> 
         <input type="submit" id="ff" name="" value="确定" class="am-btn am-btn-primary am-btn-sm am-fl" form="myForm" /> 
        </div> 
        <hr /> 
       </div> 
       
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="footer "> 
    <div class="footer-hd "> 
     <p> <a href="# ">恒望科技</a> <b>|</b> <a href="# ">商城首页</a> <b>|</b> <a href="# ">支付宝</a> <b>|</b> <a href="# ">物流</a> </p> 
    </div> 
    <div class="footer-bd "> 
     <p> <a href="# ">关于恒望</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> </p> 
    </div> 
   </div>  
   <script language="VBScript"><!--

//--></script>
  </div>
 </body>
 <script>
//正则判断
flag = false;

bool_3 = '';
bool_4 = '';



//密码
$('#pwd').focus(function(){
  $('#pwdError').hide();
  $(this).css('background-color','#FFFFCC');
});

$('#pwd').blur(function(){

  
  var pwd = $(this).val();
  $(this).css('background-color','white');
  // alert(phone);
  //判断
  if (pwd.length <=0){

    $('#pwdError').find('span').html('*密码不能为空');
    $('#pwdError').show();
    return flag = false;

  }else if(pwd.length <=5 || pwd.length >=13){

    $('#pwdError').find('span').html('*密码格式不正确');
    $('#pwdError').show();
    return flag = false;

  }else{

    return bool_3 = true;
  }
  
});


//重复密码
$('#repwd').focus(function(){
  $('#repwdError').hide();
  $(this).css('background-color','#FFFFCC');
});

$('#repwd').blur(function(){

  var pwd = $('#pwd').val();
  var repwd = $(this).val();
  $(this).css('background-color','white');
  // alert(phone);
  //判断
  if (repwd.length <=0){

    $('#repwdError').find('span').html('*请确认密码');
    $('#repwdError').show();
    return flag = false;

  }else if(repwd != pwd){

    $('#repwdError').find('span').html('*两次密码不一致');
    $('#repwdError').show();
    return flag = false;

  }else{

    return bool_4 = true;
  }
  
});




//获取按钮
$('#dyMobileButton').click(function(){
  //获取手机号
  phone = $('input[name="phone"]').val();
  // alert(phone);
  
  // ajax
  $.get('/registercode',{phone:phone},function(data){

    // alert(data.code);
    if (data.code == 000000){
      m = 60;
        // 倒计时
        timmer = setInterval(function(){
        m--;
        // 把m值赋给按钮
        $('#dyMobileButton').val(m+"秒");
        $('#dyMobileButton').attr('disabled',true);

        //判断
        if (m == 0){
          //清除定时器
          clearInterval(timmer);
          $('#dyMobileButton').val("重新获取");
          $('#dyMobileButton').attr('disabled',false); 
        }

        },1000);
      
    }

  },'json');
  
});


//表单提交
  $("#myForm").submit(function(){
    if (bool_3 && bool_4){
      return flag = true;
    }
    //让input框 触发失去焦点事件
    $("input").trigger("blur");
    return flag;
  });


 </script>
</html>