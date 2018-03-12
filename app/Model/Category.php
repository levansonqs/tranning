<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    // protected $fillable = ['name', 'description'];
    protected $fillable = ["*"];
    public $timestamps = true;

    public function users() {
        return $this->belongTo('App\Model\users');
    }
    public function product() {
        return $this->hasMany('App\Model\Product', 'cate_id');
    }
}
