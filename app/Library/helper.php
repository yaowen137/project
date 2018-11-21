<?php
function pay()
{
	echo '支付宝';
}


function express ($express)
{
	if ($express == '') {
		return '';
	}
	$url = 'http://www.kuaidi100.com/query?type='.$express[0].'&postid='.$express[1];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return json_decode($output);
}

function sendPhone($phone)
{
	// echo '云之讯';
	//载入ucpass类
	// require_once('lib/Ucpaas.class.php');

	//初始化必填
	//填写在开发者控制台首页上的Account Sid
	$options['accountsid']='b70ea9ba6c9bcef4e612f0219d88e902';
	//填写在开发者控制台首页上的Auth Token
	$options['token']='4adbb781143f7fabc344b8fdc0cd73c5';

	//初始化 $options必填
	$ucpass = new Ucpaas($options);

	//载入ucpass类
	// require_once('lib/Ucpaas.class.php');
	// require_once('serverSid.php');


	$appid = "6f62c4bb52ef46cca4c0dc95fe71772d";	//应用的ID，可在开发者控制台内的短信产品下查看
	$templateid = "373837";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
	//验证码 rand()随机数
	$param = rand(1000,9999); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空

	//储存在cookie
	// setcookie('params',$param,time()+180);
	\Cookie::queue('params',$param,1);

	//发送的目标手机号码
	$mobile = $phone;
	$uid = "";

	//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
	// return response()->json(['msg'=>2]);
	echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}

?>