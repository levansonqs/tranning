<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use DB;

class OrderController extends Controller
{
    public function __construct(Order $objmOrder){
		$this->objmOrder = $objmOrder;
	}

	public function index(){
		$objOrder = $this->objmOrder->getItems();
		return view('admin.order.index',compact('objOrder'));
	}
	public function getAdd(){
		$objCats = $this->objmCategory->getItems();
		return view('admin.order.add',['objCats'=>$objCats]);
	}

	public function postAdd(Request $request){
		if($request->hasFile('image')){			
			$path = $request->file('image')->store('public/images') ;			
			$tmp = explode('/',$path);
			$fileName = end($tmp);
			$request->fileName = $fileName;
		}else{
			echo "Lỗi upload";
		}	

		if($this->objmOrder->addItem($request)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('admin.order.index');
		}
	}

	public function getEdit($id){

		// $objmCategory = $this->objmCategory->getItems();
		// $objOrder = Order::join('categories', 'Orders.cate_id', '=', 'categories.id')
		// 			->select('Orders.*', 'categories.name as catName', 'categories.parent_id as parent_id')
		// 			->find($id);
		// return view('admin.order.edit',compact('objmCategory','objOrder'));
	}

	public function postEdit(Request $request, $id){	
		// $image = $request->file('image');
		// if(!empty($image)){
		// 	$objProject = $this->objmOrder->getItem($id);
		// 	$fileName = $objProject->image;
		// 	if(!empty($fileName)){
		// 		Storage::delete('public/images/'.$fileName);	
		// 	}
		// 	//up hình mới vào
		// 	$path = $request->file('image')->store('public/images/');
		// 	$tmp = explode('/',$path);
		// 	$nameNewimg = end($tmp);
		// 	$request->image = $nameNewimg;
		// }

		// if($this->objmOrder->editItem($request,$id)){
		// 	$request->session()->flash('msg','Cập nhật thành công');
		// 	return redirect()->route('admin.order.index');
		// }
	}

	public function delete(Request $request, $id){
		if($this->objmOrder->delItem($id)){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.order.index');
		}else{
			$request->session()->flash('msg','Lỗi khi xóa');
			return redirect()->route('admin.order.index');
		}			
	}

	public function getOrderDetail($id){
		$objOrderDetail = $this->objmOrder->orderDetail($id);
		return view('admin.order.orderdetail',compact('objOrderDetail'));
	}

}
