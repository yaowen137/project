<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>系统登录</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./static/Admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="./static/Admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="./static/Admin/css/matrix-login.css" />
        <link href="./static/Admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="http://themedesigner.in/demo/matrix-admin/index.html">
				 <div class="control-group normal_text"> <h3><img src="./static/Admin/img/zz_logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="请输入您的用户名..." />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="请输入您的密码..." />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" /> 登录</a></span>
                </div>
            </form>
        </div>   
        <script src="./static/Admin/js/jquery.min.js"></script>  
        <script src="./static/Admin/js/matrix.login.js"></script> 
    </body>

</html>
