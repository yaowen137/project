<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admininsert extends FormRequest
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
    // 设置规则
    public function rules()
    {
        return [
            'username' => 'required|regex:/\w{4,8}/|unique:user',
            'password' => 'required|regex:/\w{6,18}/',
            'repassword' => 'same:password',
        ];
    }

    // 自定义错误消息
    public function messages()
    {
        return [
            'username.required' => '用户名不能为空', 
            'username.regex' => '用户名必须为4-8位任意的数字字母下划线', 
            'username.unique' => '用户名重复', 
            'password.required' => '密码不能为空', 
            'password.regex' => '密码必须为6-18位任意的数字字母下划线', 
            'repassword.same' => '两次密码不一致',
        ];
    }
}
