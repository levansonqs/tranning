<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\OrderDetail;

class OrderDetailController extends Controller
{
   	public function __construct(OrderDetail $objmOrderDetail){
   		$this->objmOrderDetail = $objmOrderDetail;
   	}

   	public function index(){
   		$objOrderDetail = $this->objmOrderDetail->getItems();
   		return view('admin.orderdetail.index',compact('objOrderDetail'));
   	}
}
