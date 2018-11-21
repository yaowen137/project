<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    // 设置是否需要自动维护时间戳 created_at updated_at
	public $timestamps = false;
}
