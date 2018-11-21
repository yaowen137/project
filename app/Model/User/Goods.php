<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    // 设置是否需要自动维护时间戳 created_at updated_at
	public $timestamps = false;
}
