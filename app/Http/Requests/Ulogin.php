<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ulogin extends FormRequest
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
            'action'   => 'required',
            'password' => 'required',
            'captcha'  => 'required|captcha',
        ];
    }

    //自定义错误消息
    public function messages()
    {
        return [
            'action.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'captcha.required'  => '请填写验证码',
            'captcha.captcha'   => '验证码错误',
            ];
    }
}
