<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
    
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //加载模板
        return view('Admin.login');
    }

    //处理登录
    public function dologin(Request $request)
    {
           //获取数据
           // $data = $request->except('_token');
           $username = $request->input('username');
           
           // dd($password);
           
          // $res=DB::table('user')->select('id','username','level','status','nickname','addtime','authority')->where('username','=',$username)->first();
          $res=DB::table('user')->where('username','=',$username)->first();
          // dd($res);
          // 判断密码是否有误
          if(!(Hash::check($request->input('password'), $res->password))){
                //错误跳转登录
                // return redirect('/alogin')->with('error','*密码有误');
                return back()->with('error','*密码有误');

          }else{
            //判断用户名是否有误
            if(!$res){
                //错误跳转登录
                return redirect('/alogin')->with('error','*用户名有误');
            }else{
                //判断用户等级
                if(!($res->level > 1)){
                    //小于等于1的 是普通用户，不能登录后台
                    // return redirect('/alogin')->with('error','*你不是后台管理员用户');
                    return back()->with('error','*你不是后台管理员用户');
                    // session(['admin'=>$res]);
                    // return redirect('/admin');
                }else{
                    // echo 'aaaaaaaaaaaa';
                    // dd($res);
                    $data=DB::table('user')->select('id','username','level','status','nickname','addtime','authority')->where('username','=',$username)->first();

                    session(['admin'=>$data]);
                    session('admin')->authority = explode(',', session('admin')->authority);
                    return redirect('/admin');
                    
                }
                
            }
          }
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
        //
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


    public function logout (Request $request)
    {
        $request->session()->pull('admin');
        return redirect('/alogin');
    }
}
