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
		$objParent = $this->objmCategory->getParent();
		return view('admin.category.index',compact('objCategory','objParent'));
	}

	public function getAdd(){
		$objParent = $this->objmCategory->getParent();
		return view('admin.category.add',compact('objParent'));
	}

	public function postAdd(Request $request){    	
		if($this->objmCategory->addItem($request)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('admin.category.index');
		}
	}


	public function getEdit($id){
		$objCat = $this->objmCategory->getItem($id);
		$objParent = $this->objmCategory->getParent();
		return view('admin.category.edit',compact('objCat','objParent'));
	}

	public function postEdit($id){
	 if($this->objmCategory->editItem($id)){
	 	$request->session()->flash('msg','Sửa thành công !');
	 	return redirect()->route('admin.category.index');
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
