<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UorderController extends Controller
{
    //订单面
    public function index()
    {

    }


    //处理购物车结算页面
    public function makeorder(Request $request)
    {
    	$id = session('user')->id;
    	//接收数据,接收选中的商品id集合
    	$arr = $request->input('items');
    	
    	$str = implode(',',$arr);
    	//查询goods与shoppingcar信息
    	// $goods = DB::select("select title,pic,price,amount from goods,shoppingcar where gid in({$str}) and uid = {$id} ");
    	$goods = DB::table('goods')->whereIn('id',$arr)->orderBy('id', 'asc')->get();
    	
    	$data2 = DB::table('shoppingcar')->where('uid',session('user')->id)->whereIn('gid',$arr)->orderBy('gid', 'asc')->get();
    	foreach ($data2 as $key => $value) {
    		$goods[$key]->amount = $value->amount;
    		$goods[$key]->sid = $value->id;
    	}
    	session(['goods'=>$goods]);
    	// dd($goods);
    	// 查询address表信息
    	$address = DB::table('address')->where('uid','=',session('user')->id)->get();
    	//加载模板 分配数据
    	return view('User.order.makeorder',['goods'=>$goods,'address'=>$address,'tot'=>0]);
    }

    // 处理立即购买页面
    public function onlygoods(Request $request,$id)
    {
    	$uid = session('user')->id;
    	//查询goods与shoppingcar信息
    	// $goods = DB::select("select title,pic,price,amount from goods,shoppingcar where gid in({$str}) and uid = {$id} ");
    	$goods = DB::table('goods')->where('id',$id)->orderBy('id', 'asc')->get();
    	
    	$data2 = DB::table('shoppingcar')->where('uid', $uid)->where('gid',$id)->orderBy('gid', 'asc')->get();
    	foreach ($data2 as $key => $value) {
    		$goods[$key]->amount = $value->amount;
    		$goods[$key]->sid = $value->id;
    	}
    	session(['goods'=>$goods]);
    	// dd($goods);
    	// 查询address表信息
    	$address = DB::table('address')->where('uid','=',session('user')->id)->get();
    	//加载模板 分配数据
    	return view('User.order.makeorder',['goods'=>$goods,'address'=>$address,'tot'=>0]);
    }

    //生成订单，显示订单详情
    public function show(Request $request)
    {	
    	
    	//接收地址id
    	$id = $request->input('id');
    	//uid
    	$uid = session('user')->id;
    	//要购买的商品信息
    	
    	$goods = session('goods');
    	// dd($goods);

    	//查询选择的地址信息
    	$address = DB::table('address')->where('id','=',$id)->first();
    	// dd($address);
    	// 准备数据插入order表
    	$order['uid'] = $uid;
        $order['aid'] = $id;
    	$order['ordernum'] = time().rand(1000,9999);
    	$order['addtime'] = time();
    	$oid = DB::table('order')->insertGetId($order);
    	//获取订单号
    	$orderinfo = DB::table('order')->where('id',$oid)->first();

    	//添加订单详情表
    	$arr = array();
    	foreach ($goods as $key => $value) {
    		$sid[] = $value->sid;
    		$arr[$key]['gid'] = $value->id;
    		$arr[$key]['amount'] = $value->amount;
    		$arr[$key]['uid'] = $uid;
    		$arr[$key]['oid'] = $oid;
    	}

    	// dd($sid);

    	//功能添加 删除session('goods')
    	if (DB::table('order_detail')->insert($arr)){
    		// $request->session()->pull('goods');
    		DB::table('shoppingcar')->whereIn('id',$sid)->delete();
    		
    	}
    	
    	// dd($goods);
    	//加载模板 分配数据
    	return view('User.order.order',['address'=>$address,'goods'=>$goods,'orderinfo'=>$orderinfo,'tot'=>0]);
    	

    }

    public function pays(Request $request)
    {

    	//获取支付参数
    	$out_trade_no = $request->input('ordernum');

    	$subject = '商品';
    	
    	// $total_fee = $request->input('tot');
    	$total_fee = 0.01;
    	$body = '商品';
    	return pay($out_trade_no,$subject,$total_fee,$body);
    }

    //支付成功 跳转页面
    public function success(Request $request)
    {	
    	// dd($request->all());
    	$ordernum = $request->input('out_trade_no');
    	if ($ordernum){
    		// 支付成功 order表status 改为2
    		DB::table('order')->where('ordernum',$ordernum)->update(['status'=>2]);
            $res = DB::table('order_detail')->join('order','order_detail.oid','=','order.id')
                                            ->where('ordernum','=',$ordernum)
                                            ->select('gid','amount')
                                            ->get();
            // dd($res);
            //修改goods表的库存与销量数
            foreach($res as $key=>$value){
             $goods = DB::table('goods')->where('id','=',$value->gid)->first();
             DB::table('goods')->where('id','=',$value->gid)
                               ->update(['stock'=>$goods->stock-$value->amount,'sell'=>$goods->sell+$value->amount]);   
            }

    	}

        //跳转成功页面
    	return view('User.order.success');
    }


}
