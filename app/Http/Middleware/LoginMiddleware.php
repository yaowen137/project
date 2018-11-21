<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // $request  请求报文 请求对象
    public function handle($request, Closure $next)
    {   
        //判断 过滤规则
        //检测是否具有用户登录的session信息
        if($request->session()->has('admin')){
            // 检查管理员权限
            // 获取请求路径
            $path = explode('/', $request->path())[0];
            // 请求路劲转化为数字
            switch ($path) {
                case 'auser':
                    $path = 1;
                    break;
                
                case 'atype':
                    $path = 2;
                    break;

                case 'agoods':
                    $path = 3;
                    break;

                case 'aorder':
                    $path = 4;
                    break;

                case 'aadvert':
                    $path = 5;
                    break;

                case 'alink':
                    $path = 6;
                    break;

                case 'aauthority':
                    $path = 7;
                    break;

                default:
                    $path = 8;
                    break;
            }
            // 获取管理员权限
            $authority = session('admin')->authority;
            // 判断管理员是否拥有权限
            if ($path != 7 && $path != 8) {
                if (in_array($path, $authority)) {
                    // 经过中间件过滤 执行下一个请求
                    return $next($request);
                } else {
                    return redirect('/admin')->with('error', '您没有权限访问此模块，请联系超极管理员！');
                }
            } elseif ($path == 7) {
                // 获取管理员等级
                $level = session('admin')->level;
                if ($level == 3) {
                    // 经过中间件过滤 执行下一个请求
                    return $next($request);
                } else {
                    return redirect('/admin')->with('error', '只有超极管理员可以访问权限管理模块！');
                }
            } else {
                return $next($request);
            }
        }else{
            // 直接跳转到登录界面 redirect 跳转  /login 路由规则
            return redirect('/alogin');
        }
        
    }
}
