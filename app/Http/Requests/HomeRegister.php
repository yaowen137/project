<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'=>'required|regex:/\d{11}/',
            'username'=>'required|regex:/\w{4,8}/',
            'password'=>'required|regex:/\w{6,18}/',
            'repassword'=>'same:password',
            'code'=>'required',
            
        ];
    }


    public function messages()
    {
        return [
            'phone.required'=>'手机号码不能为空',
            'username.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'repassword.same'=>'两次密码不一致',
            'phone.regex'=>'电话号长度为11位数字',
            'password.regex'=>'密码必须为6-18位任意的数字字母下划线',
            'code.required'=>'验证码不能为空',
            'phone.regex:'=>'手机号码格式不正确'
        ];
    }
}
