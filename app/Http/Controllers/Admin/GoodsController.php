<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入请求校验类
use App\Http\Requests\Goodsinsert;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $word = $request->input('keyworks')??'';
        $data = DB::table('goods')->where('title', 'like', '%'.$word.'%')->OrderBy('id','desc')->paginate(5);
        foreach ($data as $key => $value) {
            $tid = $value->tid;
            $type3 = DB::table('type')->select('name','parentid')->where('id', $tid)->first();
            $type3name = $type3->name;
            $type3id = $type3->parentid;
            $type2 = DB::table('type')->select('name','parentid')->where('id', $type3id)->first();
            $type2name = $type2->name;
            $type2id = $type2->parentid;
            $type1 = DB::table('type')->select('name','parentid')->where('id', $type2id)->first();
            $type1name = $type1->name;
            $data[$key]->tid = $type1name.' -> '.$type2name.' -> '.$type3name;
        }
        $num = 1;
        return view('Admin.goods.index', ['data' => $data, 'num' => $num, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.goods.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Goodsinsert $request)
    {   
        $data = $request->except('photo', '_token', '_method');
        $type = array('jpg', 'jpeg', 'png');
        $ext = $request->file('photo')->getClientOriginalExtension();
        if (in_array($ext, $type)) {
            $request->file('photo')->move('./uploads/goods/'.date('Ymd',time()), md5(time()).'.jpg');
            $data['pic'] = '/uploads/goods/'.date('Ymd',time()).'/'.md5(time()).'.jpg';
            $data['sell'] = 0;
        }else{
            echo '<script>alert("图片格式不符！");location="/agoods/create"</script>';
        }
        if (DB::table('goods')->insert($data)) {
            // 添加分词
            return redirect('/agoods')->with('success','添加成功');
        } else {
            return redirect('/agoods/create')->with('error','添加失败');
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
        $data = DB::table('goods')->where('id', '=', $id)->first(); 
        return view('Admin.goods.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = DB::table('goods')->where('id', $id)->first();
        $tid = $data->tid;
        $type = explode(',', DB::table('type')->select('path')->where('id', $tid)->first()->path) ;
        unset($type[0]);
        return view('Admin.goods.edit', ['data' => $data, 'type' => $type]);
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
        $data = $request->except('photo', '_token', '_method');
        if ($request->hasFile('photo')) {
            $type = array('jpg', 'jpeg', 'png');
            $ext = $request->file('photo')->getClientOriginalExtension();
            if (in_array($ext, $type)) {
                $request->file('photo')->move('./uploads/goods/'.date('Ymd',time()), md5(time()).'.jpg');
                unlink('.'.$data['pic']);
                $data['pic'] = '/uploads/goods/'.date('Ymd',time()).'/'.md5(time()).'.jpg';
            }
        }
        if (DB::table('goods')->where('id','=',$id)->update($data)) {
            // 删除分词重新添加
            return redirect('/agoods')->with('success','修改成功');
        } else {
            return redirect('/agoods/'.$id.'/edit')->with('error','修改失败');
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
        $data = DB::table('goods')->select('pic')->where('id', $id)->first()->pic;
        if (DB::table('goods')->where('id', $id)->delete()) {
            unlink('.'.$data);
            return redirect('/agoods')->with('success','删除成功');
        } else {
            return redirect('/agoods')->with('error','删除失败');
        }
    }
}
