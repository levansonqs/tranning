<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

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

	public function getItems(){
		return DB::table('order_details')
		->join('orders', 'orders.id', '=', 'order_details.order_id')
		->join('products', 'products.id', '=', 'order_details.product_id')
        ->select('products.*', 'orders.id as id_order')
		->orderBy('order_details.id','DESC')
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

	public function order_detail(){
		
	}

}
