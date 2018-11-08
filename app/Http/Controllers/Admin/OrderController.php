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

        $k = $request->input('key');
        // dd($request->all());
        
        if($k == null)
        {

        $data = DB::table('order')->where('express','like',"%".$k."%")->paginate(3);

        }else{

            $data = DB::table('order')->where('express',$k)->paginate(3);
        }

        foreach($data as $v)
        {
            switch($v->status)
            {
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

        $data = DB::table('order_detail')->where('id','=',$id)->first();
        




       return view("Admin.order.aorder_detail",['data'=>$data]);
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
        if($request->input('name') != null)
        {
         $data=$request->input('name');
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
