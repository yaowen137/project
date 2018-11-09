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
        foreach($data as $v) {
            $v->route = substr($v->route, strrpos($v->route, '/')+1);   
            if ($v->display == 3) {
                $v->route = DB::table('goods')->select('title')->where('id', $v->route)->first()->title;
            } elseif ($v->display == 1 || $v->display == 2) {
                $type = DB::table('type')->where('id', $v->route)->first();
                $type->path = explode(',', $type->path);
                unset($type->path[0]);
                $str = '';
                foreach ($type->path as $key => $value) {
                   $name = DB::table('type')->select('name')->where('id', $value)->first()->name;
                   $str .= $name.' -> ';
                }
                $str .= $type->name;
                $v->route = $str;
            }
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
        $data = $request->only('route', 'display');
        $type = array('jpg', 'jpeg', 'png');
        $ext = $request->file('photo')->getClientOriginalExtension();
        if (in_array($ext, $type)) {
            $request->file('photo')->move('./uploads/advert/'.date('Ymd',time()), md5(time()).'.jpg');
            $data['pic'] = '/uploads/advert/'.date('Ymd',time()).'/'.md5(time()).'.jpg';
        }else{
            echo '<script>alert("图片格式不符！");location="/agoods/create"</script>';
        }
        if (DB::table('advert')->insert($data)) {
            // 添加分词
            return redirect('/aadvert')->with('success','添加成功');
        } else {
            return redirect('/aadvert/create')->with('error','添加失败');
        }
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
                    $vl->display = array('selected', '', '');
                    break;

                    case 2:
                    $vl->display = array('', 'selected', '');
                    break;

                    case 3:
                    $vl->display = array('', '', 'selected');
                    break;
       }
        return view("Admin.advert.updadvert", ['vl'=>$vl]);
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
        $val = $request->only('route', 'display');
        $type = array('jpg', 'jpeg', 'png');
        $ext = $request->file('photo')->getClientOriginalExtension();
        if($request->hasFile('photo') && in_array($ext, $type)){

            //先删除原有图片
            $vl = DB::table('advert')->where('id','=',$id)->first();

            $pic = '.'.$vl->pic;
       
            unlink($pic);

            $request->file('photo')->move('./uploads/advert/'.date('Ymd',time()), md5(time()).'.jpg');
            //移动到指定目录下
            $val['pic'] = '/uploads/advert/'.date('Ymd',time()).'/'.md5(time()).'.jpg';
        }
        if (DB::table('advert')->where('id', $id)->update($val)) {
            return redirect('/aadvert')->with('success','添加成功');
        } else {
            return redirect('/aadvert/'.$id.'/edit')->with('error','添加失败');
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
