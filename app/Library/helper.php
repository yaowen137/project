<?php
function pay()
{
	echo '支付宝';
}


function sendPhone($phone)
{
	// echo '云之讯';
	//载入ucpass类
	// require_once('lib/Ucpaas.class.php');

	//初始化必填
	//填写在开发者控制台首页上的Account Sid
	$options['accountsid']='4f96d57045317f0cfadc57f4fad5b3a8';
	//填写在开发者控制台首页上的Auth Token
	$options['token']='5342838727ca24c46f7bb6678c9059ef';

	//初始化 $options必填
	$ucpass = new Ucpaas($options);

	//载入ucpass类
	// require_once('lib/Ucpaas.class.php');
	// require_once('serverSid.php');


	$appid = "b8005e80c44e4a0a8dea220800665548";	//应用的ID，可在开发者控制台内的短信产品下查看
	$templateid = "387148";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
	//验证码 rand()随机数
	$param = rand(1,10000); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
	//发送的目标手机号码
	$mobile = $phone;
	$uid = "";

	//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

	echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}

?>