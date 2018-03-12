<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   	protected $table = 'products';
    protected $fillable = ["*"];
    public $timestamps = true;

    public function orderDetail() {
        return $this->belongTo('App\Model\OrderDetail');
    }
 	public function category() {
        return $this->hasMany('App\Model\Category', 'cate_id');
    } 	
    public function user() {
        return $this->belongTo('App\Model\User');
    }
}
