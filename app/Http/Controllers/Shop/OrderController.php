<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class OrderController extends Controller
{
	public function indexOrder()
	{
		return view('shop.news.order');
	}

	public function capnhat($rowid,$qty){  
      $result =  Cart::update($rowid, $qty); // Will update the quantity
  } 
}
