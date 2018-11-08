<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Storage;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = DB::table('advert')->paginate(3);
        // dd($data);
        foreach($data as $v)
            {
                switch($v->display)
                {
                    case 1:
                    $v->display = '主页轮播图';
                    break;

                    case 2:
                    $v->display = '商品列表';
                    break;

                    case 3:
                    $v->display = '个人中心';
                    break;
                }


            }
            $num = 1;
        return view("Admin.advert.advert",['data'=>$data,'num'=>$num,'request'=>$request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view("Admin.advert.addadvert");

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
        
        $l = $request->only('display');
        if($l['display'] == '主页轮播图'){
            $l = 1;
            
        }elseif($l['display'] == '商品列表'){
            $l = 2;
        }else{
            $l = 3;
        }
        // dd($l);
        $val = $request->only(['route']) ;
        $val['display'] = $l;
        if($request->hasFile('pic')){
            
            //初始化名字
            $name=time()+rand(1,10000);

            //获取上传文件后缀

            $request->file('pic')->move('./uploads/advert/'.date('Ymd',time()), md5(time()).'.jpg');
             // //移动到指定目录下
            $val['pic'] = '/uploads/advert/'.date('Ymd',time()).'/'.md5(time()).'.jpg';
            
            $o = DB::table('advert')->insert($val);

            

        }else{
           
            return redirect("/aadvert");

        }
       
        return redirect("/aadvert");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vl = DB::table('advert')->where('id','=',$id)->first();

        $pic = '.'.$vl->pic;
       
       $re = unlink($pic);
       
         $del = DB::table('advert')->where('id','=',$id)->delete();

         return redirect("/aadvert");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $vl = DB::table('advert')->where('id','=',$id)->first();

        // dd($vl->display);
       switch ($vl->display) {
                    case 1:
                    $vl->display = '主页轮播图';
                    break;

                    case 2:
                    $vl->display = '商品列表';
                    break;

                    case 3:
                    $vl->display = '个人中心';
                    break;
       }



        return view("Admin.advert.updadvert",['vl'=>$vl]);

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




        $id = $id;
        if($request->hasFile('pic')){

            //先删除原有图片
            $vl = DB::table('advert')->where('id','=',$id)->first();

             $pic = '.'.$vl->pic;
       
             $re = unlink($pic);
            

            //如果有文件上传

            //获取上传文件后缀

            $request->file('pic')->move('./uploads/advert/'.date('Ymd',time()), md5(time()).'.jpg');
             // //移动到指定目录下
            $val['pic'] = '/uploads/advert/'.date('Ymd',time()).'/'.md5(time()).'.jpg';
            
            $o = DB::table('advert')->where('id','=',$id)->update($val);

            return redirect("/aadvert");
        }else{



             $da = $request->only('route','display');

             $vl = DB::table('advert')->where('id','=',$id)->first();
             
             
             
             

             if($da['display'] == '主页轮播图')
             {
                $da['display'] = 1;
             }elseif($da['display'] == '商品列表')
             {
               $da['display'] = 2;
             }else{
                 $da['display'] = 3;
             }


             if($da['route'] == null){

                $da['route'] = $vl->route;

             }
           
             
             
             



             DB::table('advert')->where('id','=',$id)->update($da);






             return redirect("/aadvert");

        }

        // $data = $request->all();

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
