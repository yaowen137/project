<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * DESC: 重写 AuthenticatesUsers 登录验证方法，并自定义提示信息;
     * 原验证方法 Illuminate\Foundation\Auth\AuthenticatesUsers
     * @param Request $request
    */
    protected function validateLogin(Request $request){
        $this->validate($request, [
            $this->username() => 'required|string',
            // 'username' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ],[
            'username' => '请填用户名',
            'password' => '请填写密码',
            'captcha.required' => '请填写验证码',
            'captcha.captcha' => '验证码错误',
        ]);
    }
}
