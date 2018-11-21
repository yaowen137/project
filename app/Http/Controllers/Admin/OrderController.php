<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $k = $request->input('key')??'';
        // dd($request->all());
        
        $data = DB::table('order')->where('ordernum','like',"%".$k."%")->paginate(3);

        foreach($data as $v)
        {
            switch($v->status)
            {   
                case 0:
                $v->status = '已取消';
                break;

                case 1:
                $v->status = '未付款';
                break;

                case 2:
                $v->status = '已付款';
                break;

                case 3:
                $v->status = '已发货';
                break;

                case 4:
                $v->status = '已收货';
                break;

            }
            $v->express = explode(',', $v->express);
            switch($v->express[0])
            {   
                case 'shunfeng':
                $v->express[0] = '顺丰';
                break;

                case 'shentong':
                $v->express[0] = '申通';
                break;

                case 'yuantong':
                $v->express[0] = '圆通';
                break;

                case 'yunda':
                $v->express[0] = '韵达';
                break;

                case 'ems':
                $v->express[0] = 'EMS';
                break;

                case 'zhongtong':
                $v->express[0] = '中通';
                break;

            }
            $v->express = implode(' -> ', $v->express);
        }
        

        $num = 1;
        return view("Admin.order.aorder",['data'=>$data,'request'=>$request->all(),'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('order_detail')->where('oid','=',$id)->get();
        $total = 0;
        foreach ($data as $key => $value) {
            $value->oid = DB::table('order')->select('ordernum')->where('id', $value->oid)->first()->ordernum;
            $value->uid = DB::table('user')->select('nickname')->where('id', $value->uid)->first()->nickname;
            $goods = DB::table('goods')->select('title', 'price')->where('id', $value->gid)->first();
            $value->gid = $goods->title;
            $value->price = $goods->price;
            $value->tprice = $value->price*$value->amount;
            switch ($value->status) {
                case '0':
                    $value->status = '---';
                    break;

                case '1':
                    $value->status = '待评价';
                    break;

                case '2':
                    $value->status = '已评价';
                    break;
            }
            $total += $value->tprice = $value->price*$value->amount;
        }
        return view("Admin.order.aorder_detail", ['data'=>$data, 'total' => $total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $int[] = ['status'=>4];

        // $id = $id;

        // $edi = DB::table('order')->where('id','=',$id)->update($int[0]); 

        return view("Admin.order.express",['id'=>$id]);  

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->input('name') != null && $request->input('com') != null)
        {
         $data=$request->input('com').','.$request->input('name');
         $int[] = ['status'=>3,'express'=>$data];
         // dd($int);
        $id = $id;

        $edi = DB::table('order')->where('id','=',$id)->update($int[0]); 
        return redirect("/aorder")->with('success','发货成功');
      }else{
        return redirect("/aorder")->with('error','快递订单号不能为空');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

    }
}
