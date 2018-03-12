<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'customers';
    // protected $fillable = ['name', 'description'];
    protected $fillable = ["*"];
    public $timestamps = true;

    
    public function orders() {
        return $this->hasMany('App\Model\Orders', 'customer_id');
    }
}
