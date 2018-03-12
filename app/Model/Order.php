<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 protected $table = 'orders';
    // protected $fillable = ['name', 'description'];
    protected $fillable = ["*"];
    public $timestamps = true;

    public function orderDetails() {
        return $this->hasMany('App\Model\OrderDetail', 'order_id');
    }    
    public function customers() {
        return $this->belongTo('App\Model\Customer');
    }
}
