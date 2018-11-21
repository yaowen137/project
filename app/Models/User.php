<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Userinfo;
class User extends Model
{
    //模型类对应的数据表
    protected $table = 'user';

    //关闭自动维护时间戳 
    public $timestamps = false;

    //可以被批量赋值的属性字段
    // protected $fillable = ['username','password','level','status','addtime'];
    protected $guarded = [];

    //获取会员模块对应的详情信息 hasOne 1对1
    public function info()
    {
    	return $this->hasOne('App\Models\Userinfo','uid');
    }

    //前台注册会员添加方法
    public function add($data)
    {
    	$res = $this->insertGetId($data);
    	if ($res){
    		return 1;
    	}else{
    		return 0;
    	}
    }

    //查询所有
    public function getAll()
    {
    	return $this->get();
    }

    //单条查询会员信息
    public function getFind($id)
    {
    	return $this->where('id',$id)->first();
    }
   

}
