<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = 'order_detais';
    protected $fillable = ["*"];
    public $timestamps = true;

    public function orders() {
        return $this->belongTo('App\Model\Orders');
    }
 	public function products() {
        return $this->hasMany('App\Model\Product', 'product_id');
    }

}
