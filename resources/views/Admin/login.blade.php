<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>系统登录</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/static/Admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/static/Admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="/static/Admin/css/matrix-login.css" />
        <link href="/static/Admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <style>
             .error{
                font-size:px;
                color:red;
             }
        </style>
    </head>
    <body>
        <div id="loginbox"> 

            <form id="loginform" class="form-vertical" action="/dologin" method="post">

				 <div class="control-group normal_text"> <h3><img src="/static/Admin/img/zz_logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" id="username" placeholder="请输入您的用户名..." />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" id="password" placeholder="请输入您的密码..." />
                        </div>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ls" style="background-corlor:red"><i class="icon-ok"></i></span><input type="text" name="captcha" id="password" placeholder="请输入您的验证码..." />
                            
                        </div>
                        
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                    <div style="float:right;margin-right:23px;">
                                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls ">
                        <div class="main_input_box error">
                            @if (count($errors) > 0)
                                
                                    @foreach ($errors->all() as $error)
                                        <h5>{{ $error }}</h5>
                                    @endforeach
                              
                            @endif
                           
                            @if(session('error'))
                            
                            <h5>{{session('error')}}</h5>
                            
                            @endif
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><input type="submit" value="登录" class="btn btn-success"></span>
                </div>
            </form>
        </div>   
        <script src="/static/Admin/js/jquery.min.js"></script>  
        <script src="/static/Admin/js/matrix.login.js"></script> 
    </body>
    
</html>
