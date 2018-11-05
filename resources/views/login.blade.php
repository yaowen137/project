<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
</head>
<body>
	<form action="" method="post">
		用户名：<input type="text" name="name"><br>
		密码：<input type="password" name="password"><br>
		{{csrf_field()}}
		<input type="submit" value="提交">
	</form>
</body>
</html>