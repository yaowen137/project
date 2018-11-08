<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 查询user表所有数据
    public function index()
    {   
        dd(session('admin')->authority);
        // dd(session('admin'));
        $level = 3;
        // 查询user表
        $data = DB::table('user')->where('level', '<', $level)->where('status', '!=', 3)->orderBy('id','desc')->paginate(5);
        // 加工数据
        foreach ($data as $value) {
            // 加工level数据
            switch ($value->level) {
                case '1':
                    $value->level = '普通用户';
                    break;
                
                case '2':
                    $value->level = '管理员';
                    break;

                case '3':
                    $value->level = '超极管理员';
                    break;
            }
            // 加工status数据
            switch ($value->status) {
                case '1':
                    $value->status = '正常';
                    break;
                
                case '2':
                    $value->status = '已禁用';
                    break;
            }
        }
        // 创建一个变量用于排序
        $num = 1;
        return view('Admin.user.index',['data' => $data, 'num' => $num]);
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
        // 调出相应数据
        $data = DB::table('userinfo')->where('uid', '=', $id)->first();
        // 数据加工
        $data->truename = $data->truename??'用户暂无填写资料';
        switch ($data->sex) {
            case '0':
                $data->sex = '女';
                break;
            
            case '1':
                $data->sex = '男';
                break;

            case '2':
                $data->sex = '保密';
                break;

            default:
                $data->sex = '用户暂无填写资料';
                break;
        }
        $data->age = $data->age??'用户暂无填写资料';
        $data->phone = $data->phone??'用户暂无填写资料';
        // 引入模板
        return view('Admin.user.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
