<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
	 protected $table = 'orders';
    // protected $fillable = ['name', 'description'];
    protected $fillable = ["*"];
    public $timestamps = true;

    public function orderDetails() {
        return $this->hasMany('App\Model\OrderDetail', 'order_id');
    }    

    public function customers(){
        return $this->belongTo('App\Model\User');
    }

    public function getItems(){
           return DB::table('users')
           ->join('orders', 'orders.customer_id', '=', 'users.id')
           ->orderBy('orders.id','DESC')
           ->get();
    }

    public function addItem($request){
        $this->name = $request->name;
        $this->price = $request->price;
        $this->description = $request->description;
        $this->discount = $request->discount;
        $this->total = $request->total;
        $this->user_id = 1;
        $this->cate_id = $request->cate_id;
        $this->images = $request->fileName;
        $this->status = 1;
        $this->detail = $request->detail;
        return $this->save();
    }
    public function getItem($id){    
        return $this->findOrFail($id);
    }

    public function editItem($request,$id){
        // dd($request->image);
        $objProduct = $this->find($id);
        $objProduct->name = $request->name;
        $objProduct->price = $request->price;
        $objProduct->description = $request->description;
        // $objProduct->images = $request->images;
        $objProduct->discount = $request->discount;
        $objProduct->total = $request->total;
        $objProduct->user_id = 1;
        $objProduct->cate_id = $request->cate_id;
        $objProduct->detail = $request->detail;
        // dd(($request->file('image')));
        if(!empty($request->file('image'))){
            if($request->image != " " ){
                $objProduct->images = $request->image;
            }
            
        }
        return $objProduct->save();
    }

    public function delItem($id)
    {
       $objItem = $this->findOrFail($id);
        return $objItem->delete();
    }

    public function orderDetail($id){
        // dd($id);ss
        return DB::table('orders')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->select('products.*','orders.id as order_id')
        ->where('orders.id','=',$id)
        ->get();

    }


}
