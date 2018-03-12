<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
	public function __construct(Category $objmCategory){
		$this->objmCategory = $objmCategory;
	}

	public function index(){
		$objCategory = $this->objmCategory->getItems();
		return view('admin.category.index',compact('objCategory'));
	}

	public function add(Request $request){    	
		if($this->objmCategory->addItem($request)){
			echo 'ok';
		}
	}

	public function del(Request $request, $id){
		if($this->objmCategory->delItem($id)){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.category.index');
		}else{
			$request->session()->flash('msg','Lỗi khi xóa');
			return redirect()->route('admin.category.index');
		}			
	}
}
