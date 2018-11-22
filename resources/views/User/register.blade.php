<!DOCTYPE html>
<html style="background:#fff">
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
 <body style="background:#fff"> 
  <div class="login-boxtitle"> 
   <a href="/"><img alt="" src="/static/User/images/logobig.jpg" /></a> 
  </div> 
  <div class="res-banner" style="background:#010101"> 
   <div class="res-main"> 
    <div class="login-banner-bg">
     <span></span>
     <img src="/static/User/images/timg.jpg" />
    </div> 
    <div class="login-box"  style="background:#efefef"> 
     <div class="am-tabs" id="doc-my-tabs"> 
      <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify"> 
       <!-- <li class="am-active"><a href="">邮箱注册</a></li>  -->
       <li><a href="">手机号注册</a></li> 
      </ul> 
      <!-- <div class="am-tabs-bd"> 
       <div class="am-tab-panel am-active"> 
        <form action="/register" method="post"> 
         <div class="user-email"> 
          <label for="email"><i class="am-icon-envelope-o"></i></label> 
          <input type="email" name="" id="email" placeholder="请输入邮箱账号" /> 
         </div> 
         <div class="user-pass"> 
          <label for="password"><i class="am-icon-lock"></i></label> 
          <input type="password" name="" id="password" placeholder="设置密码" /> 
         </div> 
         <div class="user-pass"> 
          <label for="passwordRepeat"><i class="am-icon-lock"></i></label> 
          <input type="password" name="" id="passwordRepeat" placeholder="确认密码" /> 
         </div> 
        </form> 
        <div class="login-links"> 
         <label for="reader-me"> <input id="reader-me" type="checkbox" /> 点击表示您同意商城《服务协议》 </label> 
        </div> 
        <div class="am-cf"> 
         <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" /> 
        </div> 
       </div>  -->
       <div class="am-tab-panel"> 
        <form action="/register" method="post" id="myForm"> 
         <div class="user-phone"> 
          <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label> 
          <input type="tel" name="phone" id="phone" placeholder="请输入手机号" /> 
         </div> 
         <div style="height:25px;color:red;" id="phoneError"> 
          <span></span>
         </div>
         <div class="verification"> 
         <!-- menu-hd MyShangcheng -->
          <label for="phone"><i class="am-icon-user am-icon-fw"></i></label> 
          <input type="text" name="username" id="name" placeholder="请输入用户名" /> 
         </div>
         <div style="height:25px;color:red;" id="nameError"> 
          <span></span>
         </div>
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
         <div class="verification"> 
          <label for="code"><i class="am-icon-code-fork"></i></label> 
          <input type="tel" name="code" id="code" placeholder="请输入验证码" style="width:170px" /> 
          <!-- <a  class="btn" id="getcode" href="javascript:void(0);" > <span id="dyMobileButton">获取</span></a> -->
          <input type="button" id="dyMobileButton" value="获取验证码" style="width:130px;">
         </div>
         <div style="height:25px;color:red;" id="codeError"> 
         <span></span>
         </div>
         {{csrf_field()}}
         @if (count($errors) > 0)
              <h3><font color="red">*存在非法操作</font></h3>                  
        @endif 
        </form> 
       
        <!-- <div class="login-links"> 
         <label for="reader-me"> <input id="reader-me" type="checkbox" /> 点击表示您同意商城《服务协议》 </label> 
        </div>  -->
        <div class="am-cf"> 
         <input type="submit" id="ff" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" form="myForm" /> 
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
bool_1 = '';
bool_2 = '';
bool_3 = '';
bool_4 = '';
bool_5 = '';
// 手机号码
$('#phone').focus(function(){
  $('#phoneError').hide();
  $(this).css('background-color','#FFFFCC');
});

$('#phone').blur(function(){

  var regphone = /\d{11}/;
   phone = $(this).val();
  $(this).css('background-color','white');
  // alert(phone);
  //判断
  if (phone.length <=0){

    $('#phoneError').find('span').html('*手机号码不能为空');
    $('#phoneError').show();
    return flag = false;

  }else if(!regphone.test(phone)){

    $('#phoneError').find('span').html('*手机号码格式不正确');
    $('#phoneError').show();
    return flag = false;

  }else{
    
    $.get('/phonecheck',{phone:phone},function(data){
      if (data == 1){
        $('#phoneError').find('span').html('*此手机号已注册过,请去登录');
        $('#phoneError').show();
      }else{
         return bool_1 = true;
      }
    });
   
  }
  
});

//用户名
$('#name').focus(function(){
  $('#nameError').hide();
  $(this).css('background-color','#FFFFCC');
});

$('#name').blur(function(){

  var regname = /^[a-zA-Z][a-zA-Z0-9_]*$/;
  var name = $(this).val();
  $(this).css('background-color','white');
  // alert(phone);
  //判断
  if (name.length <=0){

    $('#nameError').find('span').html('*用户名不能为空');
    $('#nameError').show();
    return flag = false;

  }else if(!regname.test(name)){

    $('#nameError').find('span').html('*用户名格式不正确');
    $('#nameError').show();
    return flag = false;

  }else{
      $.get('/namecheck',{name:name},function(data){
       if (data ==1){
          $('#nameError').find('span').html('*用户名已存在');
          $('#nameError').show();
          return flag = false;
       }else{
          return bool_2 = true;
       }
    });
    
  }
  
});

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

//验证码
$('#code').focus(function(){
  $('#codeError').hide();
  $(this).css('background-color','#FFFFCC');
});

$('#code').keyup(function(){

  
  var code = $(this).val();
  $(this).css('background-color','white');
  // alert(phone);
  //判断
  if (code.length<=0){
    $('#codeError').find('span').html('*验证码不能为空');
    $('#codeError').show();
    return flag = false;
  }
  $.get('/codecheck',{code:code},function(data){
    if (data == 1 ){
      $('#codeError').find('span').html('');
      $('#codeError').show();
      return bool_5 = true;
    }else if(data == 2){
      $('#codeError').find('span').html('*校验码不一致');
      $('#codeError').show();
      return flag = false;
    }else if(data == 3){
      $('#codeError').find('span').html('*校验码不能为空');
      $('#codeError').show();
      return flag = false;
    }else if(data == 4){
      $('#codeError').find('span').html('*校验码已经过期');
      $('#codeError').show();
      return flag = false;
    }

  },'json');
   
  
  
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
    if (bool_1 && bool_2 && bool_3 && bool_4 && bool_5){
      return flag = true;
    }
    //让input框 触发失去焦点事件
    $("input").trigger("blur");
    return flag;
  });


 </script>
</html>