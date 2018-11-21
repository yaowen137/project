<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Userinfo;
use App\Model\User\Order;
use App\Model\User\Order_detail;
use App\Model\User\Goods;
use App\Model\User\User;
use App\Model\User\Shoppingcar;
use App\Model\User\Collection;
use App\Model\User\Address;
use App\Model\User\District;
use App\Model\User\Advert;
use App\Model\User\Comment;
use Hash;

class PersonController extends Controller
{	
	// 个人中心首页
    public function pindex ()
    {	
    	// 模拟一个session
    	session(['user' => user::where('username', 'Kenny')->first()]);
    	// 获取购物车的产品数
    	$shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
    	// 获取用户详情列表资料
    	$userinfo_data = userinfo::where('uid', session('user')->id)->first();
    	// 如果客户没有设置头像，使用默认头像
    	$userinfo_data->pic = $userinfo_data->pic??'/static/User/images/getAvatar.do.jpg';
      // 联查订单，订单详情，商品表
      $order_detail_data = order::join('order_detail', 'order_detail.oid', 'order.id')
      ->join('goods', 'goods.id', 'order_detail.gid')
      ->where('order_detail.uid', session('user')->id)
      ->where('order.status', '!=', 0)
      ->select('order.id', 'order.status', 'order.addtime', 'order_detail.oid', 'order_detail.amount', 'goods.price', 'goods.pic')
      ->get();
      $i = 0;
      $order_data[$i] = $order_detail_data[0];
      $order_data[$i]->num = $order_data[$i]->amount;
      $order_data[$i]->total = $order_data[$i]->price * $order_data[$i]->amount;
      unset($order_detail_data[0]);
      foreach ($order_detail_data as $value) {
        if ($order_data[$i]->oid == $value->oid) {
          $order_data[$i]->total += $value->price * $value->amount;
          $order_data[$i]->num += $value->amount;
        } else {
          $i++;
          $order_data[$i] = $value;
          $order_data[$i]->total = $value->price * $value->amount;
          $order_data[$i]->num = $value->amount;
        }
      }
      // dd($order_data);
      foreach ($order_data as $val) {
        switch ($val->status) {
          case '1':
            $val->status = '待付款';
            break;
          
          case '2':
            $val->status = '待发货';
            break;
          
          case '3':
            $val->status = '待收货';
            break;
          
          case '4':
            $val->status = '已完成';
            break;
          
        }
      }
    	// 获取收藏列表信息
    	$collection_data = collection::where('uid', session('user')->id)->get();
    	// 引入模板
    	return view('User.person.index',['userinfo_data' => $userinfo_data, 'order_data' => $order_data, 'shoppingcar' => $shoppingcar,'collection_data' => $collection_data]);
    }


    // 个人信息
    public function puserinfo ()
    {	
    	$shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
    	$userinfo_data = userinfo::where('uid', session('user')->id)->first();
    	$userinfo_data->pic = $userinfo_data->pic??'/static/User/images/getAvatar.do.jpg';
    	switch ($userinfo_data->sex) {
    		case '0':
    			$userinfo_data->sex = array('checked','','');
    			break;
    		
    		case '1':
    			$userinfo_data->sex = array('','checked','');
    			break;

    		case '2':
    			$userinfo_data->sex = array('','','checked');
    			break;
    	}
    	return view('User.person.userinfo', ['userinfo_data' => $userinfo_data, 'shoppingcar' => $shoppingcar]);
    }


    // 处理个人信息
    public function doinfoupdate (Request $request)
    {
    	$data = $request->only('truename', 'sex', 'age', 'pic');
    	if ($request->hasFile('photo')) {
    		$type = array('jpg', 'jpeg', 'png');
	        $ext = $request->file('photo')->getClientOriginalExtension();
	        if (in_array($ext, $type)) {
	        	$path = '/uploads/userinfo/'.date('Ymd',time());
	        	$name = md5(microtime()).'.jpg';
	        	$request->file('photo')->move('.'.$path, $name);
	        	if (isset($data['pic'])) {
	                unlink('.'.$data['pic']);
	        	}
                $data['pic'] = $path.'/'.$name;
	        }
    	}
    	if (userinfo::where('uid', session('user')->id)->update($data)) {
    		echo '<script>alert("修改成功");location="/puserinfo"</script>';
		}else{
			echo '<script>alert("修改失败");location="/puserinfo"</script>';
		}
    }


    // ajax修改用户昵称
    public function pupdatenickname (Request $request)
    {
    	$data['nickname'] = $request->input('nickname');
    	$id = session('user')->id;
    	if (!user::where('nickname', $data['nickname'])->first()) {
	    	if (user::where('id', $id)->update($data)) {
	    		echo json_encode($data['nickname']);
	    		session('user')->nickname = $data['nickname'];
	    	} else {
	    		echo json_encode(0);
	    	}
	    } else {
	    	echo json_encode(0);
	    }
    }


    // 账户安全页面
    public function psecurity ()
    {
    	$shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
    	$pic = userinfo::select('pic')->where('uid', session('user')->id)->first()->pic??'/static/User/images/getAvatar.do.jpg';
    	return view('User.person.security', ['shoppingcar' => $shoppingcar, 'pic' => $pic]);
    }


    // 修改密码
    public function ppassword ()
    {
    	$shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
    	return view('User.person.password', ['shoppingcar' => $shoppingcar]);
    }

    // 执行修改密码
    public function repassword (Request $request)
    {	
    	$id = session('user')->id;
    	$preg = '/^[a-zA-Z0-9_]{6,12}$/';
    	$pwd = $request->only('opwd', 'npwd', 'rpwd');
    	$userpwd = user::select('password')->where('id', $id)->first()->password;
    	if (!Hash::check($pwd['opwd'], $userpwd)) {
    		echo '<script>alert("旧密码不正确");location="/ppassword"</script>';exit;
    	}
    	if (!preg_match($preg, $pwd['npwd'])) {
    		echo '<script>alert("新密码格式不符！");location="/ppassword"</script>';exit;
    	}
    	if ($pwd['npwd'] !== $pwd['rpwd']) {
    		echo '<script>alert("两次密码不一致！");location="/ppassword"</script>';exit;
    	}
    	$data['password'] = Hash::make($pwd['npwd']);
    	if (user::where('id', $id)->update($data)) {
    		echo '<script>alert("密码修改成功！");location="/psecurity"</script>';exit;
    	} else {
    		echo '<script>alert("数据有误，请重试！");location="/ppassword"</script>';exit;
    	}
    }


    // 注销账户
    public function punsetuser (Request $request)
    {
    	$id = session('user')->id;
    	$data['status'] = 0;
    	user::where('id', $id)->update($data);
    	$request->session()->pull('user');
    	return redirect('/');
    }


    // 验证手机信息
    public function pphone ()
    {
    	$shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
    	session('user')->phone = userinfo::where('uid', session('user')->id)->first()->phone;
    	$phone = substr(session('user')->phone,0,3).'* * * *'.substr(session('user')->phone,-3,3);
    	return view('User.person.phone', ['shoppingcar' => $shoppingcar, 'phone' => $phone]);
    }

    // 验证密码或验证码是否通过
    public function pvrfcode (Request $request)
    {
    	$data = $request->only('password', 'code');
    	// dd($data);
    	if (!$data['password'] && !$data['code']) {
    		echo '<script>alert("必须验证其中一项才能修改手机号！");location="/pphone"</script>';exit;
    	} elseif ($data['code']) {
    		$ccode = $request->cookie('params');
    		if ($ccode == $data['code']) {
    			session('user')->cphone = 'code';
    			return redirect('/pcphone');exit;
    		} else {
    			echo '<script>alert("验证码不正确");location="/pphone"</script>';exit;
    		}
    	} else {
    		$userpwd = $data['password'];
    		if (Hash::check($userpwd, session('user')->password)) {
    			session('user')->cphone = 'password';
    			return redirect('/pcphone');exit;
    		} else {
    			echo '<script>alert("密码不正确");location="/pphone"</script>';exit;
    		}
    	}
    }
    
    // 收取短信验证
    public function pcode ()
    {	
    	sendPhone(session('user')->phone);
    }


    // 更改手机页面
    public function pcphone ()
    {
    	$shoppingcar = count(shoppingcar::where('uid' ,session('user')->id)->get());
    	return view('User.person.cphone', ['shoppingcar' => $shoppingcar]);
    }

    // 收取短信绑定手机
    public function pcpcode (Request $request)
    {	
    	sendPhone($request->input('tel'));
    }

    // 更改手机操作
    public function pchangephone (Request $request)
    {	
    	$ccode = $request->cookie('params');
    	$code = $request->input('code');
    	$data['phone'] = $request->input('phone');
    	if (empty(session('user')->cphone)) {
    		echo '<script>alert("存在非法操作，无法修改手机号");location="/pphone"</script>';exit;
    	}
    	if ($data['phone'] < 10000000000 || empty($data['phone'] || !is_numeric($data['phone']))) {
    		echo '<script>alert("手机号不正确或为空！");location="/pcphone"</script>';exit;
    	}
    	if ($ccode != $code) {
    		echo '<script>alert("验证码有误！");location="/pcphone"</script>';exit;
    	}
    	if (userinfo::where('uid', session('user')->id)->update($data)) {
    	 	echo '<script>alert("更改成功！");location="/psecurity"</script>';exit;
    	 	$request->session('user')->cphone->pull();
    	} else {
    		echo '<script>alert("更改失败！请重试");location="/pcphone"</script>';exit;
    	}
    }


    // 地址三级联动
   	public function addressajax (Request $request)
   	{
   		$id = $request->input('id');
   		$list = district::where('upid', $id)->get();
   		echo json_encode($list);
   	}


   	// 我的收藏
   	public function pcollection ()
   	{	
   		$id = session('user')->id;
   		$shoppingcar = count(shoppingcar::where('uid' ,$id)->get());
   		$collection = collection::where('uid', $id)->get();
   		$arr = array();
   		foreach ($collection as $value) {
   			$arr[] = $value->gid;
   		}
		$collection_data = goods::whereIn('id', $arr)->get();
   		$advert_data = advert::where('display', 3)->get();
   		return view('User.person.collection', ['shoppingcar' => $shoppingcar, 'collection_data' => $collection_data, 'advert_data' => $advert_data]);
   	}


   	// ajax删除收藏
   	public function ajaxcollection ($id)
   	{
   		$uid = session('user')->id;
   		if (collection::where('uid', $uid)->where('gid', $id)->delete()) {
   			echo 1;
   		}
   	}


   	// ajax收藏加入购物车
   	public function ajaxshoppingcar ($id)
   	{
   		$uid = session('user')->id;
   		if ($shoppingcar = shoppingcar::where('uid', $uid)->where('gid', $id)->first()) {
   		 	$data['amount'] = $shoppingcar->amount+1;
   		 	shoppingcar::where('uid', $uid)->where('gid', $id)->update($data);
   		} else {
   			$data['uid'] = $uid;
   			$data['gid'] = $id;
   			$data['amount'] = 1;
   			shoppingcar::insert($data);
   		}
   	}


   	// 订单页面
   	public function porder ()
   	{
   		$uid = session('user')->id;
   		$shoppingcar = count(shoppingcar::where('uid' ,$uid)->get());
   		$order_detail_data = order::join('order_detail', 'order_detail.oid', 'order.id')
      ->join('goods', 'goods.id', 'order_detail.gid')
      ->where('order_detail.uid', $uid)
      ->where('order.status', '!=', 0)
      ->select('order.id', 'order.ordernum', 'order.addtime', 'order.status as ostatus', 'order_detail.amount', 'order_detail.status as odstatus', 'order_detail.id as odid', 'goods.id as gid', 'goods.pic', 'goods.price', 'goods.title')
      ->get();
      // dd($order_detail_data);
      $i = 0;
   		$order_data[$i][0] = $order_detail_data[0];
      $order_data[$i]['total'] = $order_detail_data[0]->amount * $order_detail_data[0]->price;
      $order_data[$i]['ordernum'] = $order_detail_data[0]->ordernum;
      $order_data[$i]['addtime'] = $order_detail_data[0]->addtime;
      $order_data[$i]['status'] = $order_detail_data[0]->ostatus;
      $order_data[$i]['id'] = $order_detail_data[0]->id;
      unset($order_detail_data[0]);
      $arr = array();
   		foreach ($order_detail_data as $key => $value) {
        if ($value->id == $order_data[$i]['id']) {
          $order_data[$i][$key] = $value;
          $order_data[$i]['total'] += $value->amount * $value->price;
        } else {
          $i++;
          $order_data[$i][$key] = $value;
          $order_data[$i]['total'] = $order_detail_data[$key]->amount * $order_detail_data[$key]->price;
          $order_data[$i]['ordernum'] = $order_detail_data[$key]->ordernum;
          $order_data[$i]['addtime'] = $order_detail_data[$key]->addtime;
          $order_data[$i]['status'] = $order_detail_data[$key]->ostatus;
          $order_data[$i]['id'] = $order_detail_data[$key]->id;
        }
        if ($value->ostatus == 4 && $value->odstatus == 1) {
          $arr[$key]['gid'] = $value->gid;
          $arr[$key]['odid'] = $value->odid;
        }
      }
      foreach ($order_data as $key => $val) {
        switch ($val['status']) {
          case 1:
            $order_data[$key]['status'] = '待付款';
            break;

          case 2:
            $order_data[$key]['status'] = '待发货';
            break;

          case 3:
            $order_data[$key]['status'] = '待收货';
            break;

          case 4:
            $order_data[$key]['status'] = '已完成';
            break;
        }
      }
      // dd($order_data);
   		session('user')->comment = $arr;
   		
   		return view('User.person.order', ['shoppingcar' => $shoppingcar, 'order_data' => $order_data]);
   	}


   	// 关闭订单
   	public function pclose ($id)
   	{
   		if (order::where('id', $id)->where('uid', session('user')->id)->where('status', 1)->update(['status' => 0])) {
   			echo '<script>alert("订单已关闭！");location="/porder"</script>';
   		} else {
   			echo '<script>alert("存在非法操作，订单关闭失败！");location="/porder"</script>';
   		}
   	}


   	// 订单详情页面
   	public function porderinfo ($id)
   	{	
   		$uid = session('user')->id;
   		$shoppingcar = count(shoppingcar::where('uid' ,$uid)->get());
   		if (!$order_data = order::where('id', $id)->where('status', '!=', '0')->where('uid', $uid)->first()) {
   			echo '<script>alert("存在非法操作！");location="/porder"</script>';exit;
   		}
      $order_detail_data = order::leftjoin('order_detail', 'order.id', 'order_detail.oid')
      ->join('goods', 'order_detail.gid', 'goods.id')
      ->where('order.uid', $uid)
      ->where('order.id', $id)
      ->select('order.aid', 'order.express', 'order.ordernum', 'order.addtime', 'order.status as ostatus', 'order_detail.amount', 'order_detail.id', 'order_detail.status as odstatus', 'goods.id as gid', 'goods.pic', 'goods.price', 'goods.title')
      ->get();
      $order_data = array('total' => 0);
      foreach ($order_detail_data as $value) {
        $order_data[] = $value;
        $order_data['total'] += $value->price * $value->amount;
        switch ($value->ostatus) {
          case 1:
            $value->ostatus = '待付款';
            $order_data['setp'] = array('2', '3', '3', '3');
            break;
          
          case 2:
            $value->ostatus = '待发货';
            $order_data['setp'] = array('1', '2', '3', '3');
            break;

          case 3:
            $value->ostatus = '待收货';
            $order_data['setp'] = array('1', '1', '2', '3');
            break;
          
          case 4:
            $value->ostatus = '已完成';
            $order_data['setp'] = array('1', '1', '1', '2');
            break;
        }
      }
   		$address_data = address::where('id', $order_data[0]->aid)->first();
   		$address_data->phone = substr($address_data->phone,0,3).'* * * *'.substr($address_data->phone,-3,3);
   		$express = $order_data[0]->express?explode(',', $order_data[0]->express):'';
   		$express_data = express($express);
   		if ($express_data != '') {
   			$express_data = $express_data->data;
   		}
      // dd($order_data[0]->id);
   		return view('User.person.orderinfo', ['shoppingcar' => $shoppingcar, 'order_data' => $order_data, 'address_data' => $address_data, 'express_data' => $express_data]);
   	}

   	// 确认收货
   	public function pconfirm ($id)
   	{	
   		if (order::where('id', $id)->where('uid', session('user')->id)->where('status', 3)->update(['status' => 4])) {
   			order_detail::where('oid', $id)->where('uid', session('user')->id)->update(['status' => 1]);
   			echo '<script>alert("操作成功");location="/porder"</script>';
   		} else {
   			echo '<script>alert("存在非法操作，订单状态修改失败！");location="/porder"</script>';
   		}
   	}


   	// 填写评价
   	public function pcomment (Request $request, $id)
   	{
   		$uid = session('user')->id;
   		$shoppingcar = count(shoppingcar::where('uid' ,$uid)->get());
   		$gid = $request->input('gid');
   		$goods_data = goods::where('id', $gid)->first();
   		return view('User.person.comment', ['shoppingcar' => $shoppingcar,'goods_data' => $goods_data, 'odid' => $id]);
   	}


   	// 处理评价
   	public function paddcomment (Request $request)
   	{
   		$data = $request->only('score', 'gid', 'odid', 'content');
   		$data['uid'] = session('user')->id;
   		$vrf = session('user')->comment;
   		foreach ($vrf as $value) {
   			if ($value['gid'] == $data['gid'] && $value['odid'] == $data['odid']) {
   				if ($data['score'] == 1 || $data['score'] == 2 || $data['score'] == 3) {
   					comment::insert($data);
	   				order_detail::where('id', $data['odid'])->update(['status' => 2]);
	   				echo '<script>alert("操作成功,感谢您的评价！");location="/porder"</script>';
   				} else {
   					echo '<script>alert("存在非法操作，评价写入失败！");location="/porder"</script>';
   				}
   			} else {
   				echo '<script>alert("存在非法操作，评价写入失败！");location="/porder"</script>';
   			}
   		}
   	}


    // 评论记录
   	public function precord ()
   	{
   		$uid = session('user')->id;
   		$shoppingcar = count(shoppingcar::where('uid' ,$uid)->get());
   		$comment_data = comment::where('uid', $uid)->get();
   		$arr = array();
   		foreach ($comment_data as $value) {
   			$arr[] = $value->gid;
   		}
   		$goods_data = goods::whereIn('id', $arr)->get();
   		foreach ($comment_data as $value) {
   			foreach ($goods_data as $val) {
   				if ($value->gid == $val->id) {
   					$value->title = $val->title;
   					$value->pic = $val->pic;
   				}
   			}
   		}
   		return view('User.person.record', ['shoppingcar' => $shoppingcar, 'comment_data' => $comment_data]);
   	}
}