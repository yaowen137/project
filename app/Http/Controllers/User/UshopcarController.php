<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class UshopcarController extends Controller
{
    //购物车页面
    public function index()
    {
    	$id = session('user')->id;
        //显示顶部购物车数量
    	$shoppingcar = count(DB::table('shoppingcar')->where('uid', session('user')->id)->get());
        //查询goods表与shoppingcar表的数据	
    	// $data = DB::select("select s.id,gid,title,pic,price,amount from goods as g ,shoppingcar as s where g.id = s.gid and s.uid = {$id}");
        $data = DB::table('goods')
                    ->join('shoppingcar','goods.id','=','shoppingcar.gid')
                    ->where('shoppingcar.uid','=',$id)
                    ->select('shoppingcar.id','gid','title','pic','price','amount')
                    ->get();
        // dd($data);
        //加载模板 分配数据
    	return view('User.shoppingcar.index',['data'=>$data,'tot'=>0,'shoppingcar'=>$shoppingcar]);
    }

    //ajax增加数量
    public function ajaxadd(Request $request)
    {
        //获取要增加的商品id
        $id = $request->input('id');

        $res = DB::table('shoppingcar')->where('id','=',$id)->where('uid','=',session('user')->id)->first();
        
        if ($res->amount){
            $res->amount += 1;
            // dd($res->amount);
            DB::table('shoppingcar')->where('id','=',$id)->where('uid','=',session('user')->id)->update(['amount'=>$res->amount]);
            return $res->amount;
            
        }
    
    }

    //ajax减少数量
    public function ajaxsubtract(Request $request)
    {
    	$id = $request->input('id');

    	$res = DB::table('shoppingcar')->where('id','=',$id)->where('uid','=',session('user')->id)->first();
    	
    	if ($res->amount > 1){
    		$res->amount -= 1;
    		// dd($res->amount);
    		DB::table('shoppingcar')->where('id','=',$id)->where('uid','=',session('user')->id)->update(['amount'=>$res->amount]);
    		return $res->amount;
    		
    	}else{
    		DB::table('shoppingcar')->where('id','=',$id)->where('uid','=',session('user')->id)->update(['amount'=>1]);
    		return 1;
    	}
    }

    // ajax删除单条
    public function ajaxdel(Request $request)
    {
        $id = $request->input('id');
        if (DB::table('shoppingcar')->where('id','=',$id)->where('uid','=',session('user')->id)->delete()){

            return 1;

        }else{
            return 0;
        }
    }

    public function alldel(Request $request)
    {
        
        if (DB::table('shoppingcar')->where('uid','=',session('user')->id)->delete()){

            return redirect('/ushoppingcar');

        }else{
           return redirect('/ushoppingcar');
        }
    }

}

