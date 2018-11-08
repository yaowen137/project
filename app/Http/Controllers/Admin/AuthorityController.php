<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 导入请求校验类
use App\Http\Requests\Admininsert;
// 导入DB
use DB;
// 导入Hash
use Hash;

class AuthorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        // 调取普通管理员数据
        $data = DB::table('user')->where('level', '=', 2)->where('status', '!=', 3)->orderBy('id','desc')->paginate(5);
        // 数据加工
        foreach ($data as $value) {
            // 将authority内容转化为数组
            $value->authority = explode(',', $value->authority);
            // 将数组中的数组改为文字
            foreach ($value->authority as $key => $val) {
                switch ($val) {
                    case '1':
                        $value->authority[$key] = '用户管理';
                        break;
                    
                    case '2':
                        $value->authority[$key] = '分类管理';
                        break;

                    case '3':
                        $value->authority[$key] = '商品管理';
                        break;

                    case '4':
                        $value->authority[$key] = '订单管理';
                        break;

                    case '5':
                        $value->authority[$key] = '广告管理';
                        break;

                    case '6':
                        $value->authority[$key] = '链接管理';
                        break;
                }
            }
            // 将数组转为字符串
            $value->authority = implode(' , ', $value->authority);
        }
        // 准备一个序号数
        $num = 1;
        return view('Admin.authority.index',['data' => $data, 'num' => $num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.authority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Admininsert $request)
    {   
        $data = $request->except('_token');
        $data['authority'] = implode(',',$data['authority']);
        $data['status'] = 1;
        $data['level'] = 2;
        $data['nickname'] = $data['username'];
        $data['addtime'] = time();
        $data['password'] = Hash::make($data['password']);
        unset($data['repassword']);
        if (DB::table('user')->insert($data)) {
            return redirect('/aauthority')->with('success','添加成功');
        } else {
            return redirect('/aauthority/crate')->with('error','添加失败');
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
        $data['status'] = 3;
        if (DB::table('user')->where('id','=',$id)->update($data)) {
            return redirect('/aauthority')->with('success','删除成功');
        } else {
            return redirect('/aauthority')->with('error','删除失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = DB::table('user')->where('id', '=', $id)->first();
        $checked = array('','','','','','');
        $arr = explode(',',$data->authority);
        foreach ($arr as $value) {
            $checked[$value-1] = 'checked';
        }
        return view('Admin.authority.edit',['data' => $data, 'checked' => $checked]);
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
        $data['authority'] = implode(',',$request->input('authority'));
        if (DB::table('user')->where('id','=',$id)->update($data)) {
            return redirect('/aauthority')->with('success','修改成功');
        } else {
            return redirect('/aauthority/'.$id.'/edit')->with('error','修改失败');
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
        //
    }
}
