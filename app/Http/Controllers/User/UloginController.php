<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ulogin;
//引用model
use App\Models\User;
use App\Models\Userinfo;
use DB; 
use Hash;
class UloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //登录页面
    public function create()
    {
        //加载模板，登录页面
        return view('User.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //处理登录页面
    public function store(Ulogin $request)
    {
        //接收数据
        // dd($request->all());
        $action = $request->input('action');
        $password = $request->input('password');
        
        //判断用是以昵称或手机号登录
        //正确以手机号登录
        if (strlen($action) == 11){

            $res = Userinfo::where('phone',$action)->first();
            //判断用户名是否存在
            if (!$res){
                //不存在跳转登录页面
                return redirect('/ulogin/create')->with('error','账号或密码不正确');
            }
            //存在获取用户id
            $id = $res->uid;
            //通过id查询用户信息
            $data = User::where('id',$id)->first();

            //判断用户信息的密码是否正确
            if (Hash::check($password,$data->password)){
                //正确将用户信息存入sesseion用于登录
                session(['user'=>$data]);
                return redirect('/');
            }else{
                //密码错误就返回登录页面在
                return back()->with('error','账号或密码不正确');
            } 
        }else{
            //以昵称登录
            $res = User::where('nickname',$action)->first();
            //判断用户是否存在
            if (!$res){
                return redirect('/ulogin/create')->with('error','账号或密码不正确');
            }

            $data = User::where('nickname',$action)->first();
            //判断用户密码是否正确
            if (Hash::check($password,$data->password)){
                //正确写入session
                session(['user'=>$data]);
                $page = session('page')??'/'; 
                return redirect($page);
            }else{
                return back()->with('error','账号或密码不正确');
            } 
        }

    }


    //找回密码
    public function forget()
    {
        //加载找回密码模板
        return view('User.forget');
    }

    //判断手机号与验证码是否正确
    public function doforget(Request $request)
    {
        //通过手机号查询userinfo表，是否存在此手机号
        if(!DB::table('usreinfo')->where('phone',$request->input('phone'))){
            return back()->with('error','请确认手机号码是否正确');
        }
        //将手机存入session，用于调用接收验证码
        session(['phone'=>$request->input('phone')]);
        return view('User.find');
    }

    //重置密码
    public function dofind(Request $request)
    {
        //获取手机号
        $phone = session('phone');
        //接收两次密码
        $password = $request->input('password');
        $repassword = $request->input('repassword');

        //判断两次输入是否一致
        if ($password == $repassword){
            //一致 密码加密
            $newpwd = Hash::make($password);
            //取出uid
            $res = DB::table('userinfo')->where('phone','=',$phone)->first();
            //修改密码
            DB::table('user')->where('id','=',$res->uid)->update(['password'=>$newpwd]);
            //消除session('phone')
            $request->session()->pull('phone');
            return redirect('/ulogin/create');
        }else{
           // 不一致返回重新设置 
            return redirect('/forget')->with('info','重置密码失败');
        }
    }

    //退出登录
    public function logout(Request $request)
    {
        //清除session('user')
        $request->session()->pull('user');
        //跳转首面
        return redirect('/');
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
        
        
    }
}
