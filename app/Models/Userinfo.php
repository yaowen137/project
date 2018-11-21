<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //模型类对应的数据表
    protected $table = 'userinfo';

    //关闭自动维护时间戳
    public $timestamps = false;

    //可以被批理赋值的属性字段
    protected $fillable = ['uid','status','phone'];


    //添加数据方法
    public function addInfo($data)
    {
    	$res = $this->insertGetId($data);
    	if ($res){
    		return 1;
    	}else{
    		return 0;
    	}
    }


}
