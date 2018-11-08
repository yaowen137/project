<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Goodsinsert extends FormRequest
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
            'tid' => 'required',
            'title' => 'required',
            'photo' => 'required',
            'content' => 'required',
            'price' => 'required|regex:/\d/',
            'stock' => 'required|regex:/\d/',
        ];
    }

    // 自定义错误消息
    public function messages()
    {
        return [
            'tid.required' => '必须选择三级分类才能提交', 
            'title.required' => '必须填写标题才能提交',  
            'photo.required' => '必须上传图片才能提交',  
            'content.required' => '必须填写商品介绍才能提交',  
            'price.required' => '必须填写价格才能提交', 
            'price.regex' => '价格必须为数字',
            'stock.required' => '必须填写库存才能提交', 
            'stock.regex' => '库存必须为数字', 
        ];
    }
}
