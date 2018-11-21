<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRegister;
//引用model
use App\Models\User;
use App\Models\Userinfo;
use DB;
use Hash;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd(\Cookie::get('params'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        // echo '111111';
        return view('User.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //发送验证码
    public function getCode(Request $request)
    {

       return sendPhone($request->phone); 
    }

    //检验校验码
    public function check(Request $request)
    {
        $code = $request->input('code');
        // return \Cookie::get('params');
        if(null !== \Cookie::get('params')){
        //把输入的校验码和手机接收到的校验码做对比
            if($code==\Cookie::get('params')){
                echo 1;//校验码一致
            }else{
                echo 2;//校验码不一致
            }
        }elseif(empty($code)){
            echo 3;//校验码为空
        }else{
            echo 4;//校验码已经过期
        }
    }

    //检验注册用户名
    public function namecheck(Request $request)
    {
        //接收提交的用户名
        $username = $request->input('name');
        if (User::where('username',$username)->first()){
            //1 用户已存在
            return 1;
        }
    }

    //检验注册手机号
    public function phonecheck(Request $request)
    {
        //接收提交的用户名
        $phone = $request->input('phone');
        if (Userinfo::where('phone',$phone)->first()){
            //1 手机号已存在
            return 1;
        }
    }


    //处理注册表单数据
    public function store(HomeRegister $request)
    {
         
        //接收数据
        $data = $request->except('_token');
        // dd($data);
        // sendPhone($request->phone);
        //准备user表数据
        $user['username'] = $data['username'];
        $user['password'] = Hash::make($data['password']);
        $user['level'] = 1;
        $user['status'] = 1;
        $user['addtime'] = time();
        $user['nickname'] = 'rpn'.rand(1,1000);

        // $obj = new User();
        //得到成功插入的id序号
        // $num = $obj->insertGetId($user);
        $num = DB::table('user')->inserGetId($user);

        if ($num){
            // 准备userinfo表数据
            // 获取user表的id作为userinfo表的uid
            $userinfo['uid'] = $num;
            $userinfo['phone'] = $data['phone'];
            $userinfo['status'] = 1;

            // $info = new Userinfo();
            // $result = $info->addInfo($userinfo);
            // 添加用户userinfo信息表数据
            $result = DB::table('userinfo')->insertGetId($userinfo);
            
            if ($result){
                //注册成功 跳转登录页
                return redirect('/ulogin');
            }else{
                //不成功，重新注册
                return redirect('/register/create');
            }

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
}
