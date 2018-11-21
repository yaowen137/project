<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Order_detail;

class Order extends Model
{
    protected $table = 'order';
    // 设置是否需要自动维护时间戳 created_at updated_at
	public $timestamps = false;
	// public function order_detail ()
	// {
	// 	return $this->order_detail('App\Model\User\Order_detail');
	// }
}